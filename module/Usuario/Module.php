<?php
namespace Usuario;

use Zend\Mvc\MvcEvent;
use Zend\Mvc\ModuleRouteListener;

class Module
{

    public function onBootstrap(MvcEvent $e)
    {
        $eventManager        = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        // Deve validar se o aplicativo está sendo chamado do terminal.
        
        $eventManager->attach(MvcEvent::EVENT_DISPATCH, array($this, 'authenticationUsuario'), 11);
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                    'Authentication\Usuario' => function ($sm) {
                        $authentication = new \Zend\Authentication\AuthenticationService();
                        $adapter = new \Usuario\Model\Auth\Adapter($sm->get('Doctrine\ORM\EntityManager'));
                        $storage = new \Usuario\Model\Auth\Storage();

                        $authentication->setAdapter($adapter);
                        $authentication->setStorage($storage);

                        return $authentication;
                    },
                    'Usuario\Entity' => function ($sm) {
                        $authentication = $sm->get('Authentication\Usuario');
                        $doctrine = $sm->get('Doctrine\ORM\EntityManager');

                        $id = $authentication->getIdentity();

                        return $doctrine->find('Usuario\Entity\Usuario', $id);
                    },
                    'Usuario\Acl' => function ($sm) {
                        $acl = new \Usuario\Model\Auth\AclUsuario();
                        $acl->setDoctrine($sm->get("Doctrine\ORM\EntityManager"));
                        $acl->setUsuario($sm->get("Usuario\Entity"));
                        $acl->execAcl();

                        return $acl;
                    },
                    'Usuario\Model' => function ($sm) {
                        $usuarioModel = new \Usuario\Model\Usuario();
                        $usuarioModel->setDoctrine($sm->get("Doctrine\ORM\EntityManager"));
                        $usuarioModel->setEntity(new \Usuario\Entity\Usuario);

                        return $usuarioModel;
                    }
                )
            );
    }

    public function authenticationUsuario(MvcEvent $eventMVC)
    {
        $serviceManager = $eventMVC->getApplication()->getServiceManager();
        $authentication = $serviceManager->get("Authentication\Usuario");
        $rota = $eventMVC->getRouteMatch();

        // Valida se o usuário está logado
        if (!$authentication->hasIdentity()) {
            if ($rota->getParam("controller") != "Application\Controller\Index") {
                $eventMVC->getApplication()->redirect()->toRouter("home");
            }
            return;
        }

        $event = new \Usuario\Model\Auth\Event();
        $event->setMvcEvent($eventMVC);
        $event->setServiceDoctrine($serviceManager->get("Doctrine\ORM\EntityManager"));
        $event->setAcl($serviceManager->get("Usuario\Acl"));

        $event->preDispach();
    }
}
