<?php
session_start();
require __DIR__ . '/../vendor/autoload.php';
require '../App/helpers/helpers.php';

use Framework\Router;
use Dotenv\Dotenv as Dotenv;

$dotenv = Dotenv::createImmutable('../');
$dotenv->load();

// Instantiate the router
$router = new Router();

// Get the routes 
$routes = require basePath('../routes.php');

// Get currient uri and http method
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Route the request
$router->route($uri);
