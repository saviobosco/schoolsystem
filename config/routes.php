<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */
Router::defaultRouteClass('DashedRoute');

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Pages', 'action' => 'display','home']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
    $routes->connect('/pages/*', ['controller' => 'Pages', 'action' => 'display']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks('DashedRoute');
});
/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();
Router::connect('/login',['controller'=>'Admins','action'=>'login']);
Router::connect('/apply',['controller'=>'Applicants','action'=>'applicant_login']);
Router::connect('/new_application',['controller'=>'ApplicationsSubmitted','action'=>'add']);
Router::connect('/success/**',['controller'=>'ApplicationsSubmitted','action'=>'success']);
Router::connect('/viewapplicant/**',['controller'=>'ApplicationsSubmitted','action'=>'view']);
Router::connect('/deleteapplicant/**',['controller'=>'ApplicationsSubmitted','action'=>'delete']);
Router::connect('/check_entrance_result',['controller'=>'ApplicationsSubmitted','action'=>'check-entrance-result']);
Router::connect('/check_interview_result',['controller'=>'ApplicationsSubmitted','action'=>'check-interview-result']);
Router::connect('/view_applicant_entrance_result/**',['controller'=>'ApplicantsEntranceResults','action'=>'view']);
Router::connect('/edit_applicant_entrance_result/**',['controller'=>'ApplicantsEntranceResults','action'=>'edit']);
Router::connect('/delete_applicant_entrance_result/**',['controller'=>'ApplicantsEntranceResults','action'=>'delete']);
Router::connect('/view_applicant_interview_result/**',['controller'=>'ApplicantsInterviewResults','action'=>'view']);
Router::connect('/edit_applicant_interview_result/**',['controller'=>'ApplicantsInterviewResults','action'=>'edit']);
Router::connect('/delete_applicant_interview_result/**',['controller'=>'ApplicantsInterviewResults','action'=>'delete']);
Router::connect('/viewstudent/**',['controller'=>'Students','action'=>'view']);
Router::connect('/editstudent/**',['controller'=>'Students','action'=>'edit']);
Router::connect('/deletestudent/**',['controller'=>'Students','action'=>'delete']);
Router::connect('/enterstudentremark/**',['controller'=>'Students','action'=>'enter_remark']);
Router::connect('/new_student_registration',['controller'=>'Students','action'=>'new_student']);
Router::connect('/old_student_registration',['controller'=>'Students','action'=>'add']);
Router::connect('/student_data_profile/**',['controller'=>'Students','action'=>'student_data']);

Router::extensions(['xlsx']);
Router::connect('/generate_excel',['controller'=>'EntranceResultPins','action'=>'excel_format']);
Router::connect('/students_course_excel/**',['controller'=>'Courses','action'=>'course_students_excel']);

