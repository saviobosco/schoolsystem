<?php
namespace App\Test\TestCase\Controller;

use App\Controller\CoursesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\CoursesController Test Case
 */
class CoursesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.courses',
        'app.semesters',
        'app.students_courses',
        'app.students',
        'app.schools',
        'app.levels',
        'app.sessions'

    ];

    public function setUp()
    {
        parent::setUp();
        // Set session data
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'testing',
                    'role' => 'admin'
                    // other keys.
                ]
            ]
        ]);
    }


    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/courses/index');
        $this->assertResponseOk();
        $this->assertResponseContains('courses');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/courses/view/CSE101');
        $this->assertResponseOk();
        //$this->assertEquals('CSE101', $this->viewVariable('course.id'));
        $this->assertResponseContains('course');
    }

    /**
     * Test enterResult method
     *
     * @return void
     */
    public function testEnterResult()
    {
        $this->get('/courses/enter-result/CSE101?year[year]=2016');
        $this->assertResponseOk();
        $this->assertResponseContains('students');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $data = [
            'id' => 'CSE305',
            'name' => 'Computer Engineering',
            'semester_id' => 1,
            'level_id' => 1,
            'school_id' => 1,
            'created' => '2016-06-27 13:28:28',
            'modified' => '2016-06-27 13:28:28'
        ];
        $this->post('/courses/add',$data);
        $this->assertResponseSuccess();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->get('/courses/edit/CSE101');
        $this->assertResponseOk();
        $this->assertResponseContains('course');
        $data = [
            'id' => 'CSE101',
            'name' => 'Computer Engineering',
            'semester_id' => 1,
            'level_id' => 1,
            'school_id' => 1,
            'session_id' => 1,
            'created' => '2016-06-27 13:28:28',
            'modified' => '2016-06-27 13:28:28'
        ];
        $this->post('/courses/edit/CSE101',$data);
        $this->assertResponseSuccess();
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->delete('/courses/delete/CSE121');
        $this->assertResponseSuccess();
        $this->assertRedirect();
    }


    /**
     * Test getCourses method
     *
     * @return void
     */
    public function testGetCourses()
    {
        $this->get('courses/get-courses?level_id=1&school_id=1');
        $this->assertResponseOk();
        $this->assertResponseContains('courses');
    }

}
