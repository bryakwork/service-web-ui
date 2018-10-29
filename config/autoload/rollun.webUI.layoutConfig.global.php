<?php
/**
 * Created by PhpStorm.
 * User: USER_T
 * Date: 09.08.2018
 * Time: 14:15
 */

use rollun\webUI\Helper\Factory\NavbarHelperFactory;

return [
    NavbarHelperFactory::KEY => [
        [
            'label' => 'Тестовые страницы',
            'content' => [
                [
                    'label' => 'Тестовая главная',
                    'uri' => '/'
                ],
                [
                    'label' => 'Тестовая таблица',
                    'uri' => '/example-grid'
                ],
            ]
        ],
        [
            'label' => 'pane 2',
            'content' => [
                [
                    'label' => 'service 3',
                    'uri' => 'service/1/uri'
                ],
                [
                    'label' => 'service 4',
                    'content' => [
                        [
                            'label' => 'subservice 1',
                            'uri' => 'subservice/1/uri'
                        ],
                        [
                            'label' => 'subservice 2',
                            'uri' => 'subservice/1/uri'
                        ],
                    ]
                ],
            ]
        ],
        [
            'label' => 'pane 3',
            'content' => [
                [
                    'label' => 'service 1',
                    'uri' => 'service/1/uri'
                ],
                [
                    'label' => 'service 2',
                    'uri' => 'service/1/uri'
                ],
            ]
        ],
        [
            'label' => 'pane 4',
            'content' => [
                [
                    'label' => 'service 1',
                    'uri' => 'service/1/uri'
                ],
                [
                    'label' => 'service 2',
                    'uri' => 'service/1/uri'
                ],
            ]
        ],
        [
            'label' => 'pane 4',
            'content' => [
                [
                    'label' => 'service 1',
                    'uri' => 'service/1/uri'
                ],
                [
                    'label' => 'service 2',
                    'uri' => 'service/1/uri'
                ],
            ]
        ],
        [
            'label' => 'pane 5',
            'content' => [
                [
                    'label' => 'service 1',
                    'uri' => 'service/1/uri'
                ],
                [
                    'label' => 'service 2',
                    'uri' => 'service/1/uri'
                ],
            ]
        ],
        [
            'label' => 'pane 6',
            'content' => [
                [
                    'label' => 'service 1',
                    'uri' => 'service/1/uri'
                ],
                [
                    'label' => 'service 2',
                    'uri' => 'service/1/uri'
                ],
            ]
        ],
    ],
];