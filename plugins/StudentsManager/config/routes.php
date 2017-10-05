<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'StudentsManager',
    ['path' => '/students-manager'],
    function (RouteBuilder $routes) {
        $routes->fallbacks('DashedRoute');
    }
);
