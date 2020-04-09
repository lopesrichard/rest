<?php

require_once __DIR__ . '/../bootstrap.php';

define('__DEV__', true);

try {
    $router = \Cajudev\RestfulApi\Router::create();

    /**
     *  GET     /{endpoint}
     *  GET     /{endpoint}/{id}
     *  POST    /{endpoint}
     *  PUT     /{endpoint}/{id}
     *  DELETE  /{endpoint}/{id}
     */
    
    $router->crud('customers', new \App\Services\Customer());
    $router->crud('addresses', new \App\Services\Address());

    $router->run();
} catch (\Exception $e) {
    echo $e->getMessage();
}
