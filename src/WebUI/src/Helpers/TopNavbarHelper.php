<?php
/**
 * Created by PhpStorm.
 * User: USER_T
 * Date: 07.08.2018
 * Time: 13:22
 */

namespace rollun\webUI\Helpers;

use Zend\View\Helper\AbstractHelper;

class TopNavbarHelper extends AbstractHelper
{
    public function __invoke()
    {
        $view = $this->getView();
        $view->headScript()->appendScript($this->getNavbarScript($view));
    }

    public function getNavbarScript($view)
    {
        $topNavParamsJson = json_encode($view->topNavbarParams);
        return "require(['dojo/dom','rgrid/NavMenu'], function (dom, NavMenu) {
	            	const menuConfig = JSON.parse('$topNavParamsJson'),
	            		navMenu= new NavMenu({menuConfig: menuConfig});
	            	navMenu.placeAt(dom.byId('r-nav-dropdowns'));
	            });";
    }
}