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
                       'lumen_url'  => '/lumen'
                   ]
               ]
           ]
       ]
   ]
];