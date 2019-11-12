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
                                  'conf' => [
                                         'id' => 'id_meliscore_tool_creatrion_designs',
                                         'melisKey' => 'meliscore_tool_creatrion_designs',
                                         'name' => 'tr_meliscore_tool_creatrion_designs',
                                         'icon' => 'fa fa-paint-brush',
                                     ],
                                   'interface' => [
                                       'meliscore_tool_tools' => [
                                           'conf' => [
                                               'id' => 'id_meliscore_tool_tools',
                                               'melisKey' => 'meliscore_tool_tools',
                                               'name' => 'tr_meliscore_tool_tools',
                                               'icon' => 'fa fa-magic',
                                           ],
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
                  //'disable_bundle' => true,
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
                   ],
                   'forward' => [
                       'module' => 'MelisPlatformFrameworkLumenDemoTool',
                       'controller' => 'LumenDemoTool',
                       'action'     => 'render-lumen',
                   ]
               ],
               'melis_platform_framework_lumen_demo_tool_modal' => [
                   'conf' => [
                       'id' => 'melis_platform_framework_lumen_demo_tool_modal',
                       'melisKey' => 'melis_platform_framework_lumen_demo_tool_modal',
                       'name' => 'tr_melis_platform_framework_lumen_demo_tool_modal',
                   ],
                   'forward' => [
                       'module' => 'MelisPlatformFrameworkLumenDemoTool',
                       'controller' => 'LumenDemoTool',
                       'action'     => 'render-lumen-album-modal',
                   ],
                   'interface' => [
                       'melis_platform_framework_lumen_demo_tool_modal_content' => [
                           'conf' => [
                               'id' => 'melis_platform_framework_lumen_demo_tool_modal_content',
                               'melisKey' => 'melis_platform_framework_lumen_demo_tool_modal_content',
                               'name' => 'tr_melis_platform_framework_lumen_demo_tool_modal_content',
                           ],
                           'forward' => [
                               'module' => 'MelisPlatformFrameworkLumenDemoTool',
                               'controller' => 'LumenDemoTool',
                               'action'     => 'render-lumen-album-modal-content',
                           ]
                       ]
                   ]
               ]
           ]
       ]
   ]
];
