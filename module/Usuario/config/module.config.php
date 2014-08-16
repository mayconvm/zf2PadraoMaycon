<?php

namespace Usuario;

return array(
    'router' => array(
        'routes' => array(
            'usuario_index' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/Usuario[/][:action][/:id]',
                    'constraints' => array(
                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'usuario_index',
                        'action'     => 'index',
                    ),
                ),
            ),

            'usuario_api' => array(
                'type' => 'Zend\Mvc\Router\Http\Segment',
                'options' => array(
                    'route'    => '/Api/Usuario[/][/:id]',
                    'constraints' => array(
                        'id'     => '[0-9]*',
                    ),
                    'defaults' => array(
                        'controller' => 'usuario_api',
                        // 'action'     => 'index',
                    ),
                ),
            )
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'usuario_index' => 'Usuario\Controller\IndexController',
            'usuario_api' => 'Usuario\Controller\UsuarioApiController'
        ),
    ),
    'service_manager' => array(
        'Authentication\Usuario' => 'Usuario\Model\Auth\Factory\AuthenticationFactory'
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'           => __DIR__ . '/../view/layout/layout.phtml',
        //     'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
        //     'error/404'               => __DIR__ . '/../view/error/404.phtml',
        //     'error/index'             => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
                'ViewJsonStrategy',
        ),
    ),
    'doctrine' => array(
            'driver' => array(
                    __NAMESPACE__ . '_driver' => array(
                            'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                            'cache' => 'array',
                            'paths' => array(__DIR__ . '/../src/' . __NAMESPACE__ . '/Entity')
                    ),
                    'orm_default' => array(
                            'drivers' => array(
                                    __NAMESPACE__ . '\Entity' => __NAMESPACE__ . '_driver'
                            )
                    )
            )
        )
);
