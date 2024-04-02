<?php
require __DIR__ . '/../vendor/autoload.php';
use Framework\Router;
use Framework\Session;

Session::start();

require '../helpers.php';


// $router = new Router();

// require basePath('routes.php');
// $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// $method = $_SERVER['REQUEST_METHOD'];



// $router->route($uri, $method);

// include the following code in the controller you want to get data from database in it

// use Framework\Database;
// $config = require basePath('config/db.php');
// $db = new Database($config);
// $jobs = $db->query('your query here')->fetchAll(PDO::FETCH_ASSOC);


// ex using prepared statements
/*
use Framework\Database;
$config = require basePath('config/db.php');
$db = new Database($config);
$jobs = $db->query('select * from jobs where id = ?', [1])->fetchAll(PDO::FETCH_ASSOC);
dd($jobs);
*/


$router = new Router();

require basePath('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$router->route($uri);



