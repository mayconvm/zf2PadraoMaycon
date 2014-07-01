<?php
namespace Terceiros;

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
                'Model\ServicoTerceiros' => function ($sm) {
                    $model = new \Terceiros\Model\ServicoTerceiro($sm->get("Doctrine\ORM\EntityManager"));

                    return $model;
                }
            )
        );
    }
}
