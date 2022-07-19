<?php

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::defaultRouteClass(DashedRoute::class);
Router::scope('/', function (RouteBuilder $routes) {
    $routes->extensions(['json']);
    $routes->connect('/', ['controller' => 'Homes', 'action' => 'site']);
    $routes->connect('/site', ['controller' => 'Homes', 'action' => 'site']);
    $routes->connect('/login', ['controller' => 'Users', 'action' => 'login', 'login']);
    $routes->connect('/admin', ['controller' => 'Users', 'action' => 'mainmenu']);
    $routes->connect('/stripe', ['controller' => 'Stripes', 'action' => 'stripe']);
    $routes->connect('/payment', ['controller' => 'Stripes', 'action' => 'payment']);
    $routes->connect('/error', ['controller' => 'Pages', 'action' => 'error']);
    $routes->connect('/configs', ['controller' => 'Configs', 'action' => 'view']);
    $routes->connect('/configs/add', ['controller' => 'Configs', 'action' => 'view']);
    $routes->fallbacks(DashedRoute::class);
});

Plugin::routes();
