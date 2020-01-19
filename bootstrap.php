<?php

require_once __DIR__ . '/vendor/autoload.php';

// registra o loader doctrine annotations
\Doctrine\Common\Annotations\AnnotationRegistry::registerLoader('class_exists');

define('PATH_ROOT', __DIR__);
