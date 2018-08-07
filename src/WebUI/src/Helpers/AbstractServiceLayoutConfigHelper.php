<?php
/**
 * Created by PhpStorm.
 * User: USER_T
 * Date: 06.08.2018
 * Time: 16:12
 */

namespace rollun\webUI;

use Zend\View\Helper\AbstractHelper;

abstract class AbstractServiceLayoutConfigHelper extends AbstractHelper
{

    /**
     * @return array
     * Return value must look like:
     * [
     *    'My section' => [
     *      [
     *         'title' => 'My page link title'
     *         'link' => '/my/page'
     *      ],
     *      [
     *         'title' => 'My second page link title'
     *         'link' => '/my/page/number/two'
     *      ],
     *    ]
     * '  My second section' => [
     *      [
     *         'title' => 'My last page link title'
     *         'link' => '/my/last/page'
     *      ],
     *    ]
     * ]
     */
    abstract protected function getNavbarConfig();

    /**
     * @return array
     * Return value must look like
     *  [
     *      'label' => 'pane 1',
     *      'content' => [
     *        [
     *          'label' => 'service 1',
     *          'uri' => 'service/1/uri'
     *        ],
     *      ]
     *  ]
     */
    abstract protected function getLeftSidebarConfig();

    public function __invoke()
    {
        $
$htmlFragment =
    }


}