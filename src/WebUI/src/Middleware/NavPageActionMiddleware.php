<?php
/**
 * Created by PhpStorm.
 * User: USER_T
 * Date: 01.08.2018
 * Time: 19:19
 */

namespace rollun\webUI\Middleware;


class NavPageActionMiddleware extends AbstractViewActionMiddleware
{
    /**
     * @return mixed array -  params that will be passed to view helpers
     */
    protected function getViewParams()
    {
        return [
            'lsbParams' => [
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
                ],
                [
                    'label' => 'pane 3',
                    'content' => [
                        [
                            'label' => 'service 3',
                            'uri' => 'service/1/uri'
                        ],
                        [
                            'label' => 'service 4',
                            'uri' => 'subservice/1/uri'
                        ]
                    ],
                ]
            ],
        ];
    }
}