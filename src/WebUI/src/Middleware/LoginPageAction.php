<?php
/**
 * Created by PhpStorm.
 * User: USER_T
 * Date: 10.09.2018
 * Time: 11:20
 */

namespace rollun\webUI\Middleware;


use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use rollun\actionrender\Renderer\AbstractRenderer;

class LoginPageAction implements MiddlewareInterface
{

    /**
     * Process an incoming server request and return a response, optionally delegating
     * to the next middleware component to create the response.
     *
     * @param ServerRequestInterface $request
     * @param DelegateInterface $delegate
     *
     * @return ResponseInterface
     */
    public function process(ServerRequestInterface $request, DelegateInterface $delegate)
    {
        $responseData = $request->getAttribute(AbstractRenderer::RESPONSE_DATA);
        if($responseData === null) {
            $responseData = [];
        }
        $viewParams = ['layout' => false];
        $newResponseParams = array_merge($responseData, $viewParams);
        $request = $request->withAttribute(AbstractRenderer::RESPONSE_DATA, $newResponseParams);
        $response = $delegate->process($request);
        return $response;
    }
}