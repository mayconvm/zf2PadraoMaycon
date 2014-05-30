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

                        if (!$authentication->hasIdentity()) {
                            return new StdClass();
                        }

                        return $doctrine->find('Usuario\Entity\Usuario', $id);
                    },
                    'Usuario\Acl' => function ($sm) {
                        $usuario = $sm->get("Usuario\Entity");
                        $doctrine = $sm->get("Doctrine\ORM\EntityManager");
                        $reposirotyAcl = $doctrine->getRepository("Usuario\Entity\Acl");
                        $entityAcl = $reposirotyAcl->buscaPermissaoUsuario($usuario);

                        $acl = new \Usuario\Model\Auth\AclUsuario($entityAcl);

                        return $acl;
                    }
                )
            );
    }

    public function authenticationUsuario(MvcEvent $event)
    {
        $serviceManager = $event->getApplication()->getServiceManager();
        $event = new \Usuario\Model\Auth\Event();
        $event->setMvcEvent($event);
        $event->setServiceManage($serviceManager);
        $event->setAcl(new \Usuario\Model\Auth\AclUsuario());

        $event->preDispach();
    }
}
