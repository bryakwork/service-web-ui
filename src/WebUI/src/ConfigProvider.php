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
use rollun\webUI\ViewHelper\DojoLoaderViewHelper;
use rollun\webUI\ViewHelper\FitScreenHeightHelper;
use rollun\webUI\ViewHelper\LayoutConfigHelper;
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
            'view_helpers' => $this->getViewHelpers(),
        ];
    }

    protected function getTemplates()
    {
        return [
            'paths' => [
                'webUi' => [__DIR__ . '/../templates/'],
                'webUiLayouts' => [__DIR__ . '/../templates/layouts/']
            ],
            'layout' => 'webUiLayouts::august-layout',
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
                'dojo' => DojoLoaderViewHelper::class,
                'addLayout' => LayoutConfigHelper::class,
                'fitScreenHeight' => FitScreenHeightHelper::class,
            ],
            'factories' => [
                DojoLoaderViewHelper::class => InvokableFactory::class,
                LayoutConfigHelper::class => InvokableFactory::class,
                FitScreenHeightHelper::class => InvokableFactory::class
            ]
        ];
    }

}