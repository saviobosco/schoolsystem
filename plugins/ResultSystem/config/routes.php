<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'ResultSystem',
    ['path' => '/result-system'],
    function (RouteBuilder $routes) {
        $routes->fallbacks('DashedRoute');
    }
);
