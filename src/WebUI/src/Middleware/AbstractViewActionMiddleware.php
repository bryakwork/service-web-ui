<?php

namespace rollun\webUI\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use rollun\actionrender\Renderer\Html\HtmlParamResolver;

/**
 * Created by PhpStorm.
 * User: USER_T
 * Date: 31.07.2018
 * Time: 16:35
 */
abstract class AbstractViewActionMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        //добавить сюда слияние с requestParams из запроса
        $responseParams = $request->getAttribute('responseData');
        $responseParams = isset($responseParams)? $responseParams: [];
        $newQueryParams = array_merge($this->getViewParams(), $responseParams);
        $request = $request->withAttribute('responseData', $newQueryParams);

        $response = $delegate->process($request);
        return $response;
    }

    /**
     * @return mixed array -  params that will be passed to view helpers
     */
    abstract protected function getViewParams();

}
