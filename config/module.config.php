<?php
return [
    'router' => [
        'routes' => [

            'melis-backoffice' => [
                'child_routes' => [
                    'application-MelisPlatformFrameworkLumenDemoTool' => array(
                        'type'    => 'Literal',
                        'options' => array(
                            'route'    => 'MelisPlatformFrameworkLumenDemoTool',
                            'defaults' => array(
                                '__NAMESPACE__' => 'MelisPlatformFrameworkLumenDemoTool\Controller',
                                'controller'    => 'LumenDemoTool',
                                'action'        => '',
                            ),
                        ),
                        // this route will be accessible in the browser by browsing
                        // www.domain.com/melis/MelisCmsUserAccount/controller/action
                        'may_terminate' => true,
                        'child_routes' => array(
                            'default' => array(
                                'type'    => 'Segment',
                                'options' => array(
                                    'route'    => '/[:controller[/:action]]',
                                    'constraints' => array(
                                        'controller' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                        'action'     => '[a-zA-Z][a-zA-Z0-9_-]*',
                                    ),
                                    'defaults' => array(
                                    ),
                                ),
                            ),
                        ),
                    )
                ],
            ],
        ],
    ],
    'translator' => [
        'loacle' => 'en_EN'
    ],
    'controllers' => [
        'invokables' => [
            'MelisPlatformFrameworkLumenDemoTool\Controller\LumenDemoTool' => 'MelisPlatformFrameworkLumenDemoTool\Controller\LumenDemoToolController',
        ]
    ],
    'service_manager' => [
        'invokables' => [],
        'aliases' => [],
        'factories' => [
            'MelisServiceTest' => 'MelisCodeExampleLumen\Service\Factory\MelisServiceTestFactory',
        ],
    ],
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'template_map' => array(
            'empty/error' => __DIR__ . '/../view/error/no-route-match-zend.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),

];