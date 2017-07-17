<?php
namespace ResultSystem\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestCase;
use ResultSystem\Controller\StudentsController;

/**
 * ResultSystem\Controller\StudentsController Test Case
 */
class StudentsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.students',
        'app.sessions',
        'app.classes',
        'app.blocks',
        'app.class_demarcations',
        'plugin.result_system.student_annual_results',
        'plugin.result_system.student_termly_results',
        'plugin.result_system.student_result_pins',
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
                    'role' => 'admin',
                    'super_user' => 1
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
        $this->get('/result-system/students');
        $this->assertResponseOk();
        $this->assertResponseContains('Students');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/result-system/view-student-result/SMS/2017/001?session_id=1&class_id=1');
        $this->assertResponseOk();
        $this->assertResponseContains('SMS/2017/001');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $data = [
            0 => [
                'first_test' => '6',
                'second_test' => '6.5',
                'third_test' => '3',
                'exam' => '23',
                'student_id' => 'SMS/2017/003',
                'subject_id' => '5',
                'class_id' => '1',
                'term_id' => '1',
                'session_id' => '1'
            ],
            1 => [
                'first_test' => '5',
                'second_test' => '8',
                'third_test' => '9',
                'exam' => '10',
                'student_id' => 'SMS/2017/003',
                'subject_id' => '6',
                'class_id' => '1',
                'term_id' => '1',
                'session_id' => '1'
            ],
        ];
        $this->post('/result-system/students/add',$data);
        $this->assertResponseSuccess();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->get('/result-system/edit-student-result/SMS/2017/001?session_id=1&class_id=1');
        $this->assertResponseOk();
        $this->assertResponseContains('SMS/2017/001');

        $data = [
            0 => [
                'first_test' => '6',
                'second_test' => '6.5',
                'third_test' => '3',
                'exam' => '23',
                'student_id' => 'SMS/2017/001',
                'subject_id' => '5',
                'class_id' => '1',
                'term_id' => '1',
                'session_id' => '1'
            ],
            1 => [
                'first_test' => '5',
                'second_test' => '8',
                'third_test' => '9',
                'exam' => '10',
                'student_id' => 'SMS/2017/001',
                'subject_id' => '6',
                'class_id' => '1',
                'term_id' => '1',
                'session_id' => '1'
            ],
        ];
        $this->post('/result-system/edit-student-result/SMS/2017/001?session_id=1&class_id=1',$data);
        $this->assertResponseSuccess();
    }

    public function testViewStudentResult()
    {
        $this->session([
            'Student' => [
                'id' => 'SMS/2017/001',
                'session_id' => 1,
                'term_id' => 1
            ]
        ]);
        $this->get('/result-system/view-student-result');
        $this->assertResponseOk();
        $this->assertResponseContains('SMS/2017/001');
    }

    public function testCheckResult()
    {
        $data = [
            'reg_number' => 'SMS/2017/001',
            'pin' => 123456,
            'session_id' => 1,
            'term_id' => 1
        ];
        $this->post('/result-system/check-result',$data);
        $this->assertRedirect(['action' => 'viewStudentResult']);
    }

}
