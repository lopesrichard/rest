<?php

/**
 * -----------------------------------------------------------------------------
 * Require Composer Autoloader
 * -----------------------------------------------------------------------------
 */
require_once __DIR__ . '/vendor/autoload.php';

/**
 * -----------------------------------------------------------------------------
 * Register Doctrine Loader
 * -----------------------------------------------------------------------------
 */
\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader('class_exists');

/**
 * -----------------------------------------------------------------------------
 * Define Environment Constants
 * -----------------------------------------------------------------------------
 */
define('__ROOT__', __DIR__);

define('__DEV__', true);
