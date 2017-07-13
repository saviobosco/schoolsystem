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
Router::connect('/student-results-upload',
    ['plugin'=> 'ResultSystem',
        'controller'=>'StudentTermlyResults',
        'action'=>'upload_result'
    ]);

Router::connect('/student-result/*',
    ['plugin'=> 'ResultSystem',
        'controller'=>'Students',
        'action'=>'view_student_result'
    ]);

Router::connect('/check-student-result',
    ['plugin'=> 'ResultSystem',
        'controller'=>'Students',
        'action'=>'check_result'
    ]);
Router::connect('/view-student-result/**',
    ['plugin'=> 'ResultSystem',
        'controller'=>'Students',
        'action'=>'view'
    ]);
Router::connect('/edit-student-result/**',
    ['plugin'=> 'ResultSystem',
        'controller'=>'Students',
        'action'=>'edit'
    ]);