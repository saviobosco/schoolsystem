<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'SkillsGradingSystem',
    ['path' => '/skills-grading-system'],
    function (RouteBuilder $routes) {
        $routes->fallbacks('DashedRoute');
    }
);
