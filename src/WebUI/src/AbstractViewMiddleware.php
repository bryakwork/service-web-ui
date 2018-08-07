<?php

namespace rollun\webUI;

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
abstract class AbstractViewMiddleware implements MiddlewareInterface
{
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $queryParams = $request->getQueryParams();
        $newQueryParams = array_merge($this->getViewParams(), $queryParams);
        $request = $request->withAttribute('responseData', $newQueryParams);
        $request = $request->withAttribute(HtmlParamResolver::KEY_ATTRIBUTE_TEMPLATE_NAME, $this->getTemplateName());

        $response = $delegate->process($request);
        return $response;
    }

    /**
     * @return string
     */
    abstract protected function getTemplateName();

    /**
     * @return mixed array -  params that will be passed to view helpers
     */
    abstract protected function getViewParams();

}
