<?php
return [
    'controllers' => [
        'factories' => [
            'XML_Data_Extract\Controller\Index' => 'XML_Data_Extract\Service\Controller\IndexControllerFactory',
        ],
    ],
    'api_adapters' => [
        'invokables' => [
            'XML_Data_Extract_entities' => 'XML_Data_Extract\Api\Adapter\EntityAdapter',
            'XML_Data_Extract_imports' => 'XML_Data_Extract\Api\Adapter\ImportAdapter',
        ],
    ],
    'translator' => [
        'translation_file_patterns' => [
            [
                'type' => 'gettext',
                'base_dir' => OMEKA_PATH . '/modules/XML_Data_Extract/language',
                'pattern' => '%s.mo',
                'text_domain' => null,
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            OMEKA_PATH . '/modules/XML_Data_Extract/view',
        ],
    ],
    'view_helpers' => [
        'invokables' => [
            'xmlPropertySelector' => 'XML_Data_Extract\View\Helper\PropertySelector',
        ],
        'factories' => [
            'mediaSidebar' => 'XML_Data_Extract\Service\ViewHelper\MediaSidebarFactory',
            'itemSidebar' => 'XML_Data_Extract\Service\ViewHelper\ItemSidebarFactory',
        ],
    ],
    'entity_manager' => [
        'mapping_classes_paths' => [
            OMEKA_PATH . '/modules/XML_Data_Extract/src/Entity',
        ],
    ],
    'form_elements' => [
        'factories' => [
            'XML_Data_Extract\Form\ImportForm' => 'XXML_Data_Extract\Service\Form\ImportFormFactory',
            'XML_Data_Extract\Form\MappingForm' => 'XML_Data_Extract\Service\Form\MappingFormFactory',
        ],
    ],
    'xml_import1_mappings' => [
        'items' => [
            '\XML_Data_Extract\Mapping\PropertyMapping',
            '\XML_Data_Extract\Mapping\MediaMapping',
            '\XML_Data_Extract\Mapping\ItemMapping',
        ],
        'users' => [
            '\XML_Data_Extract\Mapping\UserMapping',
        ],
    ],
    'xml_import1_media_ingester_adapter' => [
        'url' => 'XML_Data_Extract\MediaIngesterAdapter\UrlMediaIngesterAdapter',
        'html' => 'XML_Data_Extract\MediaIngesterAdapter\HtmlMediaIngesterAdapter',
        'iiif' => null,
        'oembed' => null,
        'youtube' => null,
    ],
    'router' => [
        'routes' => [
            'admin' => [
                'child_routes' => [
                    'XML_Data_Extract' => [
                        'type' => 'Literal',
                        'options' => [
                            'route' => '/XML_Data_Extract',
                            'defaults' => [
                                '__NAMESPACE__' => 'XML_Data_Extract\Controller',
                                'controller' => 'Index',
                                'action' => 'index',
                            ],
                        ],
                        'may_terminate' => true,
                        'child_routes' => [
                            'past-imports' => [
                                'type' => 'Literal',
                                'options' => [
                                    'route' => '/past-imports',
                                    'defaults' => [
                                        '__NAMESPACE__' => 'XML_Data_Extract\Controller',
                                        'controller' => 'Index',
                                        'action' => 'past-imports',
                                    ],
                                ],
                            ],
                            'map' => [
                                'type' => 'Literal',
                                'options' => [
                                    'route' => '/map',
                                    'defaults' => [
                                        '__NAMESPACE__' => 'XML_Data_Extract\Controller',
                                        'controller' => 'Index',
                                        'action' => 'map',
                                    ],
                                ],
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'navigation' => [
        'AdminModule' => [
            
            [
                'label' => 'XML_Data_Extract Import1',
                'route' => 'admin/XML_Data_Extract',
                'resource' => 'XML_Data_Extract\Controller\Index',
                'pages' => [
                    [
                        'label'      => 'Import', // @translate
                        'route'      => 'admin/XML_Data_Extract',
                        'resource'   => 'XML_Data_Extract\Controller\Index',
                    ],
                    [
                        'label'      => 'Import', // @translate
                        'route'      => 'admin/XML_Data_Extract/map',
                        'resource'   => 'XML_Data_Extract\Controller\Index',
                        'visible'    => false,
                    ],
                    [
                        'label'      => 'Past Imports', // @translate
                        'route'      => 'admin/XML_Data_Extract/past-imports',
                        'controller' => 'Index',
                        'action' => 'past-imports',
                        'resource' => 'XML_Data_Extract\Controller\Index',
                    ],
                ],
            ],
        ],
    ],
    'js_translate_strings' => [
        'Remove mapping', // @translate
        'Undo remove mapping', // @translate
        'Select an item type at the left before choosing a resource class.', // @translate
        'Select an element at the left before choosing a property.', // @translate
        'Please enter a valid language tag.', // @translate
    ],
];