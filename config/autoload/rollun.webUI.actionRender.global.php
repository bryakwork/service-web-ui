<?php
/**
 * Created by PhpStorm.
 * User: USER_T
 * Date: 07.09.2018
 * Time: 13:33
 */

use rollun\actionrender\Factory\ActionRenderAbstractFactory;
use rollun\webUI\Middleware\ExampleGridPageActionMiddleware;
use rollun\webUI\Middleware\LoginPageAction;
use rollun\webUI\Middleware\NoopAction;
use Zend\ServiceManager\Factory\InvokableFactory;

return [

    'dependencies' => [
        'factories' => [
            ExampleGridPageActionMiddleware::class => InvokableFactory::class,
            NoopAction::class => InvokableFactory::class,
            LoginPageAction::class => InvokableFactory::class
        ]
    ],
    ActionRenderAbstractFactory::KEY => [
        'exampleGridPage' => [
            ActionRenderAbstractFactory::KEY_ACTION_MIDDLEWARE_SERVICE => ExampleGridPageActionMiddleware::class,
            ActionRenderAbstractFactory::KEY_RENDER_MIDDLEWARE_SERVICE => 'simpleHtmlJsonRendererLLPipe'
        ],
        'loginPage' => [
            ActionRenderAbstractFactory::KEY_ACTION_MIDDLEWARE_SERVICE => LoginPageAction::class,
            ActionRenderAbstractFactory::KEY_RENDER_MIDDLEWARE_SERVICE => 'simpleHtmlJsonRendererLLPipe'
        ],
        'compareVehiclesPage' => [
            ActionRenderAbstractFactory::KEY_ACTION_MIDDLEWARE_SERVICE => NoopAction::class,
            ActionRenderAbstractFactory::KEY_RENDER_MIDDLEWARE_SERVICE => 'simpleHtmlJsonRendererLLPipe'
        ],
        'vehicleListProcessorPage' => [
            ActionRenderAbstractFactory::KEY_ACTION_MIDDLEWARE_SERVICE => NoopAction::class,
            ActionRenderAbstractFactory::KEY_RENDER_MIDDLEWARE_SERVICE => 'simpleHtmlJsonRendererLLPipe'
        ],
        'vehiclesComparisonResult' => [
            ActionRenderAbstractFactory::KEY_ACTION_MIDDLEWARE_SERVICE => NoopAction::class,
            ActionRenderAbstractFactory::KEY_RENDER_MIDDLEWARE_SERVICE => 'simpleHtmlJsonRendererLLPipe'
        ]
    ]
];