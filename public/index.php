<?php

/**
 * -----------------------------------------------------------------------------
 * Require Main Configuration
 * -----------------------------------------------------------------------------
 */
require_once __DIR__ . '/../bootstrap.php';

/**
 * -----------------------------------------------------------------------------
 * Initialize Application
 * -----------------------------------------------------------------------------
 */

$app = \Cajudev\Rest\App::create();

/**
 * -----------------------------------------------------------------------------
 * Create Routes
 * -----------------------------------------------------------------------------
 *
 *  GET     /{endpoint}
 *  GET     /{endpoint}/{id}
 *  GET     /{endpoint}/options
 *  POST    /{endpoint}
 *  PUT     /{endpoint}/{id}
 *  DELETE  /{endpoint}/{id}
 */

$app->crud('products', new \App\Services\Product());
$app->crud('categories', new \App\Services\Category());
$app->crud('tags', new \App\Services\Tag());
$app->crud('colors', new \App\Services\Color());

/**
 * -----------------------------------------------------------------------------
 * Run Application
 * -----------------------------------------------------------------------------
 */

$app->run();
