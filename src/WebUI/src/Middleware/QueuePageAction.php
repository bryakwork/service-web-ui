<?php

namespace rollun\webUI\Middleware;

use Interop\Http\ServerMiddleware\DelegateInterface;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use rollun\actionrender\Renderer\AbstractRenderer;

class QueuePageAction implements MiddlewareInterface
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
        $viewParams = [
            'rgridParams' => [
                [
                    'id' => 'rgrid',
                    'gridTarget' => '/api/datastore/test-queues-csv',
                    'initialQuery' => 'rql{eq(queue_id,2)}',
                ],
//                [
//                    "id" => "conditionsInMenu",
//                    "actionMenuConfig" => [
//                        [
//                            "label" => "Удалить из очереди", // Надпись на кнопке
//                            "action" => [
//                                "action" => "func{deleteFromDatastoreAction}", //Имя функции-обработчика
//                                "params" => ["test-queues-csv"] //Массив параметров, которые будут переданы в обработчик после строки из таблицы
//                            ]
//                        ],
//                    ]
//                ]
            ]
        ];
        if (isset($responseData)) {
            $newResponseParams = array_merge($responseData, $viewParams);
        } else {
            $newResponseParams = $viewParams;
        }
        $request = $request->withAttribute(AbstractRenderer::RESPONSE_DATA, $newResponseParams);
        $response = $delegate->process($request);
        return $response;
    }
}