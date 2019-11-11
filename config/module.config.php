<?php
return [
    'third-party-framework' => [
        'index-path' => [
            '/Lumen/public/index.php'
        ],
        'translations' => [
            \MelisPlatformFrameworkLumenDemoToolLogic\Providers\MelisAddTranslation::class
        ]

    ],
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
    'controller_plugins' => [
        'invokables' => [
            'LumenDemoToolDisplayTablePlugin' => 'MelisPlatformFrameworkLumenDemoTool\Controller\Plugin\LumenDemoToolDisplayTablePlugin'
        ]
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
        'template_map' => [
            'MelisLumenDemotool/render-plugin' => __DIR__ . "/../view/melis-platform-framework-lumen-demo-tool/plugins/render-plugin.phtml",
            'MelisLumenDemotool/modal-plugin' => __DIR__ . "/../view/melis-platform-framework-lumen-demo-tool/plugins/modal-template.phtml"
        ],
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    ),

];