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
                            'label' => 'service 1',
                            'uri' => 'service/1/uri'
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
                    ]
                ]
            ],
        ];
    }
}