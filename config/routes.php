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

    /**
     * Citys <<
     */
    $routes->connect('/citys', ['controller' => 'Pages', 'action' => 'index']);
    $routes->connect('/citys/add', ['controller' => 'Pages', 'action' => 'index']);
    $routes->connect('/citys/edit', ['controller' => 'Pages', 'action' => 'index']);
    $routes->connect('/citys/delete', ['controller' => 'Pages', 'action' => 'index']);
    /**
     * Citys >>
     */

    /**
     * Estados <<
     */
    $routes->connect('/states', ['controller' => 'Pages', 'action' => 'index']);
    $routes->connect('/states/add', ['controller' => 'Pages', 'action' => 'index']);
    $routes->connect('/states/edit', ['controller' => 'Pages', 'action' => 'index']);
    $routes->connect('/states/delete', ['controller' => 'Pages', 'action' => 'index']);
    /**
     * Estados >>
     */

    $routes->fallbacks(DashedRoute::class);
});

Plugin::routes();
