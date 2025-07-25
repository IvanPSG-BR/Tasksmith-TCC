<?php

require_once __DIR__ . '/../vendor/autoload.php';

define('ROOT_PATH', __DIR__ . "/../");
define('WEBROOT', "/");
$dotenv = Dotenv\Dotenv::createImmutable(ROOT_PATH);
$dotenv->load();