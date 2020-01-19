<?php

// ESSE ARQUIVO SERVE APENAS PARA DESENVOLVIMENTO COM O SERVIDOR INTERNO DO PHP
// php -S localhost:8000 router.php

ini_set('display_errors', 1);

// analisa a url
$uri  = $_SERVER['REQUEST_URI'];
$path = array_values(array_filter(explode('/', $uri)));

// envia sempre para public
if (count($path) === 0 || $path[0] !== 'public') {
    array_unshift($path, 'public');
}

include __DIR__ . '/public/index.php';
