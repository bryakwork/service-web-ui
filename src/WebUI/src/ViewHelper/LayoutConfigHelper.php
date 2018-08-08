<?php
/**
 * Created by PhpStorm.
 * User: USER_T
 * Date: 06.08.2018
 * Time: 16:12
 */

namespace rollun\webUI\ViewHelper;

use Zend\View\Helper\AbstractHelper;

class LayoutConfigHelper extends AbstractHelper
{
    /**
     * @param $navbarConfig {array}
     * @param $lsbConfig {array}
     */
    public function __invoke($navbarConfig, $lsbConfig)
    {
        $view = $this->getView();
        $navbarConfigJson = json_encode($navbarConfig);
        $leftSideBarConfigJson = json_encode($lsbConfig);
        $script =
            "require(['dojo/dom','rgrid/NavPanes', 'rgrid/NavMenu'], (dom,NavPanes,NavMenu) => {
                const navbarConfig = JSON.parse('$navbarConfigJson'),
                lsbConfig = JSON.parse('$leftSideBarConfigJson'),
                navMenu= new NavMenu({menuConfig: navbarConfig});
                navMenu.placeAt(dom.byId('r-nav-dropdowns'));
                navPanes = new NavPanes({layoutConfig: lsbConfig});
	            navPanes.placeAt(dom.byId('r-nav-list'));
	        });
	    ";
        $view->headScript()->appendScript($script);

    }
}