<?php

return [
   'plugins' => [
       'meliscore' => [
           'interface' => [
               'meliscore_leftmenu' => [
                   'interface' => [
                       'meliscore_toolstree_section' => [
                           'interface' => [
                               'meliscore_tool_creatrion_designs' => [
                                   'interface' => [
                                       'meliscore_tool_tools' => [
                                           'interface' => [
                                               'melis_platform_framework_lumen_demo' =>  [
                                                    'conf' => [
                                                        'type' => '/melis_platform_framework_lumen_demo/interface/melis_platform_framework_lumen_demo_tool'
                                                    ],
                                               ],
                                           ],
                                       ]
                                   ]
                               ]
                           ]
                       ]
                   ]
               ]
           ],
       ],
       'melis_platform_framework_lumen_demo' => [
           'conf' => [
               'id' => '',
               'name' => 'tr_melis_code_example_lumen',
               'rightsDisplay' => 'none'
           ],
           'ressources' => array(
               'js' => array(
                   '/MelisPlatformFrameworkLumenDemoTool/js/lumen-demo-tool-script.js'
               ),
               'css' => array(
                   '/MelisPlatformFrameworkLumenDemoTool/css/lumen-demo-tool-style.css',
               ),
               /**
                * the "build" configuration compiles all assets into one file to make
                * lesser requests
                */
               'build' => [
                   'disable_bundle' => false,
                   // lists of assets that will be loaded in the layout
                   'css' => [
                       '/MelisPlatformFrameworkLumenDemoTool/build/css/bundle.css',

                   ],
                   'js' => [
                       '/MelisPlatformFrameworkLumenDemoTool/build/js/bundle.js',
                   ]
               ]

           ),
           'interface' => [
               'melis_platform_framework_lumen_demo_tool' => [
                   'conf' => [
                       'id' => 'id_melis_platform_framework_lumen_demo_tool',
                       'melisKey' => 'melis_platform_framework_lumen_demo_tool',
                       'name' => 'tr_melis_code_example_lumen_tool_title',
                       'icon' => 'fa fa-lightbulb-o',
                       'useLumenDb' => false,
                   ],
                   'forward' => [
                       'module' => 'MelisPlatformFrameworkLumenDemoTool',
                       'controller' => 'LumenDemoTool',
                       'action'     => 'render-lumen',
                   ]
               ]
           ]
       ]
   ]
];