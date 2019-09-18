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
                        'section' => 'MelisCore',
                        'name' => 'Lumen Demo Tool Table Plugin',
//                        'thumbnail' => '/MelisFront/plugins/images/MelisFrontBlockPlugin_thumb.jpg',
                        'description' => 'Lumen demo tool display table plugin',
                        // List the files to be automatically included for the correct display of the plugin
                        // To overide a key, just add it again in your site module
                        // To delete an entry, use the keyword "disable" instead of the file path for the same key
                        'files' => [
                            'css' => [],
                            'js' => [],
                        ],
                        'js_initialization' => [],
                        /*'modal_form' => [
                            // <editor-fold desc="Modal Settings">
                            'melis_framework_lumen_demo_tool_list_plugin_template_form' => [
                                'tab_title' => 'tr_front_plugin_tab_properties',
                                'tab_icon'  => 'fa fa-cog',
                                'tab_form_layout' => 'MelisCmsNews/plugin/modal/modal-template-form',
                                'attributes' => [
                                    'name' => 'melis_framework_lumen_demo_tool_list_plugin_template_form',
                                    'class' => 'melis_framework_lumen_demo_tool_list_plugin_template_form',
                                    'method' => '',
                                    'action' => '',
                                ],
                                'elements' => [
                                    [
                                        'spec' => [
                                            'name' => 'template_path',
                                            'type' => 'MelisEnginePluginTemplateSelect',
                                            'options' => [
                                                'label' => 'tr_melis_Plugins_Template',
                                                'tooltip' => 'tr_melis_Plugins_Template tooltip',
                                                'empty_option' => 'tr_melis_Plugins_Choose',
                                                'disable_inarray_validator' => true,
                                            ],
                                            'attributes' => [
                                                'id' => 'id_page_tpl_id',
                                                'class' => 'form-control',
                                                'required' => 'required',
                                            ]
                                        ]
                                    ],
                                    [
                                        'spec' => [
                                            'name' => 'lumen_route',
                                            'type' => 'text',
                                            'options' => [
                                                'label' => 'Lumen route',
                                                'tooltip' => 'Url that is based from Lumen',
                                                'empty_option' => 'tr_melis_Plugins_Choose',
                                                'disable_inarray_validator' => true,
                                            ],
                                            'attributes' => [
                                                'id' => 'lumen_route',
                                                'class' => 'form-control',
                                                'required' => 'required'
                                            ]
                                        ]
                                    ],
                                    'input_filter' => [
                                        'template_path' => [
                                            'name' => 'template_path',
                                            'required' => true,
                                            'validators' => [
                                                [
                                                    'name' => 'NotEmpty',
                                                    'options' => [
                                                        'messages' => [
                                                            \Zend\Validator\NotEmpty::IS_EMPTY => 'tr_front_template_path_empty',
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'filters' => [],
                                        ],
                                        'lumen_route' => [
                                            'name' => 'lumen_route',
                                            'required' => true,
                                            'validators' => [
                                                [
                                                    'name' => 'String',
                                                    'options' => [
                                                        'messages' => [
                                                            \Zend\Validator\Digits::STRING_EMPTY => 'tr_front_common_input_empty',
                                                        ],
                                                    ],
                                                ],
                                            ],
                                            'filters' => [],
                                        ],
                                    ]
                                ]
                            ]
                            // </editor-fold>
                        ]*/
                    ),
                ),
            ),
        ),
    ),
);