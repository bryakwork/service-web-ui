<?php

namespace rollun\webUI\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use rollun\actionrender\Renderer\AbstractRenderer;
use rollun\webUI\ParamNameIntersectionException;

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
        $responseData = $request->getAttribute(AbstractRenderer::RESPONSE_DATA);
        $viewParams = $this->getViewParams();
        if (isset($responseData)) {
            $this->checkForParamsIntersection($responseData,$viewParams);
            $newResponseParams = array_merge($responseData, $viewParams);
        } else {
            $newResponseParams = $viewParams;
        }
        $request = $request->withAttribute(AbstractRenderer::RESPONSE_DATA, $newResponseParams);
        $response = $delegate->process($request);
        return $response;
    }

    /**
     * @return mixed array -  params that will be passed to view helpers
     */
    abstract protected function getViewParams();

    protected function checkForParamsIntersection($responseData, $viewParams)
    {
        $intersections = array_intersect(array_keys($responseData), array_keys($viewParams));
        if (count($intersections) > 0) {
            $paramNamesThatIntersect = '';
            foreach ($intersections as $paramName => $paramValue) {
                $paramNamesThatIntersect .= "$paramName, ";
            }
            $paramNamesThatIntersect = rtrim($paramNamesThatIntersect, ', ');
            throw new ParamNameIntersectionException(
                'Following param names are already used by another middleware' . $paramNamesThatIntersect);
        }
    }
}
