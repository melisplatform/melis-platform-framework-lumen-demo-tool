<?php

return array(
    'plugins' => array(
        'melisplatformframeworklumendemotool' => array(
            'conf' => array(
                // user rights exclusions
                'rightsDisplay' => 'none',
            ),
            'plugins' => array(
                'LumenDemoToolDisplayTablePlugin' => array(
                    'front' => array(
                        /*
                         * template path
                         */
                        'template_path' => array('MelisLumenDemotool/render-plugin'),
                        'files' => [
                            'css' => [
                                '/MelisPlatformFrameworkLumenDemoTool/plugins/css/lumen-demo-tool-table-plugin.css'
                            ],
                            'js' => [],
                        ],
                    ),
                    'melis' => array(
                        'section' => 'MelisCms',
                        'subcategory' => array(
                            'id' => 'thirdPartyFrameworks',
                            'title' => 'Frameworks'
                        ),
                        'name' => 'tr_melis_platform_framework_lumen_demo_tool_plugin_name',
                        'thumbnail' => '/MelisPlatformFrameworkLumenDemoTool/plugins/images/LumenDemoToolDisplayTable_thumb.jpg',
                        'description' => 'tr_melis_platform_framework_lumen_demo_tool_plugin_description',
                        // List the files to be automatically included for the correct display of the plugin
                        // To overide a key, just add it again in your site module
                        // To delete an entry, use the keyword "disable" instead of the file path for the same key
                        'files' => [
                            'css' => [
                                '/MelisPlatformFrameworkLumenDemoTool/plugins/css/lumen-demo-tool-table-plugin.css'
                            ],
                            'js' => [],
                        ],
                        'js_initialization' => [],
                        'modal_form' => [
                            'tab_title' => 'tr_meliscmsnews_plugin_tab_properties',
                            'tab_icon' => 'fa fa-cog',
                        ]
                    ),
                ),
            ),
        ),
    ),
);