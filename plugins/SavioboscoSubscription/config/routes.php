<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'SavioboscoSubscription',
    ['path' => '/saviobosco-subscription'],
    function (RouteBuilder $routes) {
        $routes->fallbacks('DashedRoute');
    }
);
