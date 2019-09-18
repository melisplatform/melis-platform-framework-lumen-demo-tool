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
                    ),
                    'melis' => array(
                        'subcategory' => array(
                            'id' => 'thirdPartyFrameworks',
                            'title' => 'Frameworks'
                        ),
                        'name' => 'Lumen Demo Tool Table Plugin',
                        'thumbnail' => '/MelisPlatformFrameworkLumenDemoTool/plugins/images/LumenDemoToolDisplayTable_thumb.jpg',
                        'description' => 'Lumen demo tool display table plugin',
                        // List the files to be automatically included for the correct display of the plugin
                        // To overide a key, just add it again in your site module
                        // To delete an entry, use the keyword "disable" instead of the file path for the same key
                        'files' => [
                            'css' => [],
                            'js' => [],
                        ],
                        'js_initialization' => [],
                    ),
                ),
            ),
        ),
    ),
);