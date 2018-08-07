<?php
/**
 * Created by PhpStorm.
 * User: USER_T
 * Date: 01.08.2018
 * Time: 19:19
 */

namespace rollun\webUI;

class NavPageMiddleware extends AbstractViewMiddleware
{
    /**
     * @return string
     */
    protected function getTemplateName()
    {
        return 'web-ui::homepage.phtml';
    }

    /**
     * @return mixed array -  params that will be passed to view helpers
     */
    protected function getViewParams()
    {
        return [
            'leftNavbarParams' => [
                [
                    'label' => 'pane 1',
                    'content' => [
                        [
                            'label' => 'page 1',
                            'uri' => 'service/1/uri'
                        ],
                        [
                            'label' => 'page 2',
                            'uri' => 'service/2/uri'
                        ],
                    ]
                ],
                [
                    'label' => 'pane 2',
                    'content' => [
                        [
                            'label' => 'page 1',
                            'uri' => 'service/1/uri'
                        ],
                        [
                            'label' => 'page 2',
                            'uri' => 'service/2/uri'
                        ],
                    ]
                ]
            ],
            'topNavbarParams' => [
                [
                    'label' => 'pane 1',
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
            ]]

            ],
        ];
    }
}