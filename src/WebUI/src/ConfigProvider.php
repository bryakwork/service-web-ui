<?php
/**
 * Created by PhpStorm.
 * User: USER_T
 * Date: 01.08.2018
 * Time: 19:59
 */

namespace rollun\webUI;


use rollun\actionrender\Factory\ActionRenderAbstractFactory;
use rollun\webUI\Helpers\DojoLoaderViewHelper;
use rollun\webUI\Helpers\LeftNavbarHelper;
use rollun\webUI\Helpers\TopNavbarHelper;
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
                'web-ui' => [__DIR__ . '/../templates/'],
                'web-ui-layouts' => [__DIR__ . '/../templates/layouts/']
            ],
            'layout' => 'web-ui-layouts::august-layout',
        ];
    }

    protected function getActionRender()
    {
        return [
            'navigationPage' => [
                ActionRenderAbstractFactory::KEY_ACTION_MIDDLEWARE_SERVICE => NavPageMiddleware::class,
                ActionRenderAbstractFactory::KEY_RENDER_MIDDLEWARE_SERVICE => 'simpleHtmlJsonRendererLLPipe',
            ],
        ];
    }

    protected function getDependencies()
    {
        return [
            'factories' => [
                NavPageMiddleware::class => InvokableFactory::class,
                TemplateRendererInterface::class => ZendViewRendererFactory::class,
                HelperPluginManager::class => HelperPluginManagerFactory::class,
            ]
        ];
    }

    protected function getViewHelpers(){
        return [
            'aliases' => [
                'dojo' => DojoLoaderViewHelper::class,
                'addTopNavbarContent' => TopNavbarHelper::class,
                'addLeftNavbarContent' => LeftNavbarHelper::class,
            ],
            'factories' => [
                DojoLoaderViewHelper::class => InvokableFactory::class,
                TopNavbarHelper::class => InvokableFactory::class,
                LeftNavbarHelper::class => InvokableFactory::class,

            ]
        ];
    }

}