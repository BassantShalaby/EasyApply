<?php

use Framework\Database;
use Framework\Router;

require __DIR__ . '/../vendor/autoload.php';
require_once ('../helpers.php');
require basePath('Framework/Database.php');
$config = require basePath('config/db.php');
$db = new Database($config);
require basePath('Framework/Router.php');
$router = new Router();

require basePath('routes.php');
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];



$router->route($uri, $method);



