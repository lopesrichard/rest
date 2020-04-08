<?php

require_once __DIR__ . '/bootstrap.php';

$em = \Cajudev\RestfulApi\EntityManager::getInstance();

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($em);
