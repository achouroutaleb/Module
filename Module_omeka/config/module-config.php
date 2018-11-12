<?php
return [
    'controllers' => [
        'factories' => [
            'PDFDoc\Controller\Index' => 'PDFDoc\Service\Controller\IndexControllerFactory',
        ],
    ],
    'api_adapters' => [
        'invokables' => [
            'PDFDoc_entities' => 'PDFDoc\Api\Adapter\EntityAdapter',
            'PDFDoc_imports' => 'PDFDoc\Api\Adapter\ImportAdapter',
        ],
    ],
    'translator' => [
        'translation_file_patterns' => [
            [
                'type' => 'gettext',
                'base_dir' => OMEKA_PATH . '/modules/PDFDoc/language',
                'pattern' => '%s.mo',
                'text_domain' => null,
            ],
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            OMEKA_PATH . '/modules/PDFDoc/view',
        ],
    ],
    'view_helpers' => [
        'invokables' => [
            'xmlPropertySelector' => 'PDFDoc\View\Helper\PropertySelector',
        ],
        'factories' => [
            'mediaSidebar' => 'PDFDoc\Service\ViewHelper\MediaSidebarFactory',
            'itemSidebar' => 'PDFDoc\Service\ViewHelper\ItemSidebarFactory',
        ],
    ],
    'entity_manager' => [
        'mapping_classes_paths' => [
            OMEKA_PATH . '/modules/PDFDoc/src/Entity',
        ],
    ],
    'form_elements' => [
        'factories' => [
            'PDFDoc\Form\ImportForm' => 'XPDFDoc\Service\Form\ImportFormFactory',
            'PDFDoc\Form\MappingForm' => 'PDFDoc\Service\Form\MappingFormFactory',
        ],
    ],
    'xml_import1_mappings' => [
        'items' => [
            '\PDFDoc\Mapping\PropertyMapping',
            '\PDFDoc\Mapping\MediaMapping',
            '\PDFDoc\Mapping\ItemMapping',
        ],
        'users' => [
            '\PDFDoc\Mapping\UserMapping',
        ],
    ],
    'xml_import1_media_ingester_adapter' => [
        'url' => 'PDFDoc\MediaIngesterAdapter\UrlMediaIngesterAdapter',
        'html' => 'PDFDoc\MediaIngesterAdapter\HtmlMediaIngesterAdapter',
        'iiif' => null,
        'oembed' => null,
        'youtube' => null,
    ],
    'router' => [
        'routes' => [
            'admin' => [
                'child_routes' => [
                    'PDFDoc' => [
                        'type' => 'Literal',
                        'options' => [
                            'route' => '/PDFDoc',
                            'defaults' => [
                                '__NAMESPACE__' => 'PDFDoc\Controller',
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
                                        '__NAMESPACE__' => 'PDFDoc\Controller',
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
                                        '__NAMESPACE__' => 'PDFDoc\Controller',
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
                'label' => 'PDFDoc Import1',
                'route' => 'admin/PDFDoc',
                'resource' => 'PDFDoc\Controller\Index',
                'pages' => [
                    [
                        'label'      => 'Import', // @translate
                        'route'      => 'admin/PDFDoc',
                        'resource'   => 'PDFDoc\Controller\Index',
                    ],
                    [
                        'label'      => 'Import', // @translate
                        'route'      => 'admin/PDFDoc/map',
                        'resource'   => 'PDFDoc\Controller\Index',
                        'visible'    => false,
                    ],
                    [
                        'label'      => 'Past Imports', // @translate
                        'route'      => 'admin/PDFDoc/past-imports',
                        'controller' => 'Index',
                        'action' => 'past-imports',
                        'resource' => 'PDFDoc\Controller\Index',
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