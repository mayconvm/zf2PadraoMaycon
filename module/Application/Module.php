<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2014 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $eventShare   = $eventManager->getSharedManager();
        $eventShare->attach(
            'Zend\Mvc\Controller\AbstractActionController',
            'dispatch',
            function ($e) {
                $result = $e->getResult();
                if ($result instanceof \Zend\View\Model\ViewModel) {
                    // $result->setTerminal($e->getRequest()->isXmlHttpRequest());
                }

            }
        ); //Caso a requisição seja feita por ajax
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

    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'menuList' => function ($helpers) {
                    $locator = $helpers->getServiceLocator();
                    $viewHelperMenu = new \Application\View\Menu();
                    $viewHelperMenu->setDoctrine($locator->get("Doctrine\ORM\EntityManager"));
                    $viewHelperMenu->setAcl($locator->get("Usuario\Acl"));
                    
                    return $viewHelperMenu;
                },
            )
        );
    }
}
