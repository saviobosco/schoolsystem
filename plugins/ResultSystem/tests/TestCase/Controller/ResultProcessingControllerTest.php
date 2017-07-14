<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/13/17
 * Time: 3:35 PM
 */

namespace ResultSystem\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestCase;
use ResultSystem\Controller\ResultGradingSystemsController;

/**
 * ResultSystem\Controller\ResultProcessingController Test Case
 */
class ResultProcessingControllerTest extends IntegrationTestCase
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
        'app.states',
        'app.class_demarcations'
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
        $data = [
            'session_id' => 1,
            'class_id' => 1,
            'term_id' => 1,
            'no_of_subjects' => true
        ];
        $this->post('result-system/result-processing',$data);
        $this->assertResponseOk();
        $this->assertResponseContains('Successfully Calculated the students termly results');
    }

    /**
     * Test index ResultProcessingWithStudentPosition
     *
     * @return void
     */
    public function testResultProcessingWithStudentPosition()
    {
        $data = [
            'session_id' => 1,
            'class_id' => 1,
            'term_id' => 1,
            'no_of_subjects' => true,
            'cal_student_position' => true
        ];
        $this->post('result-system/result-processing',$data);
        $this->assertResponseOk();
        $this->assertResponseContains('Successfully Calculated the students termly results');
    }

    /**
     * Test index ResultProcessingWithSubjectPosition
     *
     * @return void
     */
    public function testResultProcessingWithSubjectPosition()
    {
        $data = [
            'session_id' => 1,
            'class_id' => 1,
            'term_id' => 1,
            'no_of_subjects' => true,
            'cal_subject_position' => true
        ];
        $this->post('result-system/result-processing',$data);
        $this->assertResponseOk();
        $this->assertResponseContains('Successfully Calculated the students termly results');
    }

    /**
     * Test index ResultProcessingWithClassAverage
     *
     * @return void
     */
    public function testResultProcessingWithClassAverage()
    {
        $data = [
            'session_id' => 1,
            'class_id' => 1,
            'term_id' => 1,
            'no_of_subjects' => true,
            'cal_class_average' => true
        ];
        $this->post('result-system/result-processing',$data);
        $this->assertResponseOk();
        $this->assertResponseContains('Successfully Calculated the students termly results');
    }

}