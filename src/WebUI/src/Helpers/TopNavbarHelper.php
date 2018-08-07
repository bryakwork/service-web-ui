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
        $navParamsJson = json_encode($view->topNavbarParams);
        return "require([
		            'dojo/dom',
		            'rgrid/NavMenu'
	            ], function (
	            	dom,
	            	NavMenu,
	            ) {
	            	const layoutConfig = JSON.parse($navParamsJson),
	            		navPanes = new NavMenu({layoutConfig: layoutConfig});
	            	navPanes.placeAt(dom.byId('r-nav-dropdowns'));
	            })
        ";
    }
}