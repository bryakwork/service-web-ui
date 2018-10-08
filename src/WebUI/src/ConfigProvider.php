<?php
/**
 * Created by PhpStorm.
 * User: USER_T
 * Date: 01.08.2018
 * Time: 19:59
 */

namespace rollun\webUI;


use rollun\actionrender\Factory\ActionRenderAbstractFactory;
use rollun\webUI\Middleware\NavPageActionMiddleware;
use rollun\webUI\Helper\DojoLoaderViewHelper;
use rollun\webUI\Helper\Factory\NavbarHelperFactory;
use rollun\webUI\Helper\FitScreenHeightHelper;
use rollun\webUI\Helper\LeftSideBarHelper;
use rollun\webUI\Helper\NavbarHelper;
use rollun\webUI\Helper\RgridHelper;
use Zend\Expressive\Template\TemplateRendererInterface;
use Zend\Expressive\ZendView\HelperPluginManagerFactory;
use Zend\Expressive\ZendView\ZendViewRendererFactory;
use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\View\HelperPluginManager;

class ConfigProvider
{
    public function __invoke()
    {
        return [
            'dependencies' => $this->getDependencies(),
            'templates' => $this->getTemplates(),
            ActionRenderAbstractFactory::KEY => $this->getActionRender(),
            //'view_helpers' => $this->getViewHelpers(),
        ];
    }

    protected function getTemplates()
    {
        return [
            'paths' => [
                'webUi' => [__DIR__ . '/../templates/'],
                'webUiLayouts' => [__DIR__ . '/../templates/layouts/'],
                'ebayVehicles' => [__DIR__ . '/../templates/ebayVehicles/'],
                'saas' => [__DIR__ . '/../templates/saas/'],
            ],
            //'layout' => 'webUiLayouts::august-layout',
            'layout' => 'webUiLayouts::september-layout',
            'map' => [
                'error::404' => 'crudError::404',
                'error::error' => 'crudError::error',
            ]
        ];
    }

    protected function getActionRender()
    {
        return [
            'navigationPage' => [
                ActionRenderAbstractFactory::KEY_ACTION_MIDDLEWARE_SERVICE => NavPageActionMiddleware::class,
                ActionRenderAbstractFactory::KEY_RENDER_MIDDLEWARE_SERVICE => 'simpleHtmlJsonRendererLLPipe',
            ],
        ];
    }

    protected function getDependencies()
    {
        return [
            'factories' => [
                NavPageActionMiddleware::class => InvokableFactory::class,
                TemplateRendererInterface::class => ZendViewRendererFactory::class,
                HelperPluginManager::class => HelperPluginManagerFactory::class,
            ]
        ];
    }

    protected function getViewHelpers()
    {
        return [
            'aliases' => [
                'dojoLoader' => DojoLoaderViewHelper::class,
                'addLsb' => LeftSideBarHelper::class,
                'addNavbar' => NavbarHelper::class,
                'fitScreenHeight' => FitScreenHeightHelper::class,
                'rgrid' => RgridHelper::class
            ],
            'factories' => [
                DojoLoaderViewHelper::class => InvokableFactory::class,
                LeftSideBarHelper::class => InvokableFactory::class,
                FitScreenHeightHelper::class => InvokableFactory::class,
                NavbarHelper::class => NavbarHelperFactory::class,
                RgridHelper::class => InvokableFactory::class
            ]
        ];
    }

}