<?php

require_once __DIR__ . '/vendor/autoload.php';

// registra o loader doctrine annotations
\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader('class_exists');

define('__ROOT__', __DIR__);
