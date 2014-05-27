<?php
namespace Usuario;

class Module
{
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
                    'Authentication\Usuario' => function($sm) {
                        $authentication = new \Zend\Authentication\AuthenticationService();
                        $adapter = new \Usuario\Model\Auth\Adapter($sm->get('Doctrine\ORM\EntityManager'));
                        $storage = new \Usuario\Model\Auth\Storage();

                        $authentication->setAdapter($adapter);
                        $authentication->setStorage($storage);

                        return $authentication;
                    },
                    'Usuario' => function($sm) {
                        $authentication = $sm->get('Authentication\Usuario');
                        $doctrine = $sm->get('Doctrine\ORM\EntityManager');

                        $id = $authentication->getIdentity();

                        if (!$authentication->hasIdentity()) {
                            return null;
                        }

                        return $doctrine->find('Usuario\Entity\Usuario', $id);

                    }
                )
            );
    }
}
