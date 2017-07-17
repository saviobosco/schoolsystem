<?php
namespace SkillsGradingSystem\Test\TestCase\Controller;

use Cake\TestSuite\IntegrationTestCase;
use SkillsGradingSystem\Controller\StudentsController;

/**
 * SkillsGradingSystem\Controller\StudentsController Test Case
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
        'plugin.result_system.terms',
        'app.classes',
        'plugin.skills_grading_system.psychomotor_skills',
        'plugin.skills_grading_system.affective_dispositions',
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/skills-grading-system/students');
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
        $this->get('/skills-grading-system/view-student-skill/SMS/2017/001?session_id=1&class_id=1');
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
                'score' => '4',
                'affective_id' => '1',
                'student_id' => 'SMS/2017/002',
                'class_id' => '2',
                'term_id' => '1',
                'session_id' => '1'
            ],
            1 => [
                'score' => '4',
                'affective_id' => '2',
                'student_id' => 'SMS/2017/002',
                'class_id' => '2',
                'term_id' => '1',
                'session_id' => '1'
            ],
        ];
        $this->post('/skills-grading-system/add-student-skill',$data);
        $this->assertResponseSuccess();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->get('/skills-grading-system/edit-student-skill/SMS/2017/001');
        $this->assertResponseOk();
        $this->assertResponseContains('Hand Writing');

        $data = [
            'id' => 1,
            'name' => 'Painting',
            'created' => '2016-09-12 15:34:16',
            'modified' => '2016-09-12 15:34:16'
        ];

        $this->post('/skills-grading-system/edit-student-skill/SMS/2017/001',$data);
        $this->assertResponseSuccess();
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->delete('/skills-grading-system/delete-student-skill/SMS/2017/001');
        $this->assertResponseSuccess();
        $this->assertRedirect();
    }
}
