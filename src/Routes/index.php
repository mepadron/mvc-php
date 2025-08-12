<?php
namespace App\Routes;

use App\Controllers\HomeController;
use App\Router;

$router = new Router();
$router->get('/', HomeController::class, 'index');
$router->processRoute();
