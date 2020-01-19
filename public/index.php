<?php

require_once __DIR__ . '/../bootstrap.php';

// Defina se é ambiente de testes
define('__DEV__', true);

try {
    $router = \Cajudev\RestfulApi\Router::create();

    /**
     * Adicione aqui seus middlewares.
     * Mais informações: http://www.slimframework.com/docs/v4/concepts/middleware.html
     */
    $router->addMiddleware(new \App\Middleware\JsonMiddleware());

    /**
     * Aqui configuramos nosso default error handler,
     * basicamente toda exceção de requisição cairá aqui
     * Mais informações: http://www.slimframework.com/docs/v4/middleware/error-handling.html
     */
    $router->setErrorHandler(function ($request, $e) use ($router) {
        $response = $router->getResponseFactory()->createResponse();
        $data = ['success' => false, 'error' => $e->getMessage()];
        $response->getBody()->write(json_encode($data, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES));
        return $response->withHeader('Content-Type', 'application/json')->withStatus($e->getCode() ?: 500);
    });

    /**
     * Adicione seus serviços aqui. Para cada um, os seguintes endpoints serão criados
     *  GET     /{endpoint}
     *  GET     /{endpoint}/{id}
     *  POST    /{endpoint}
     *  PUT     /{endpoint}/{id}
     *  DELETE  /{endpoint}/{id}
     */
    $router->addEndpoint('customers', new \App\Services\Customer());
    $router->addEndpoint('addresses', new \App\Services\Address());

    $router->run();
} catch (\Exception $e) {
    echo $e->getMessage();
}
