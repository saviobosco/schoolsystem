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
        'plugin.skills_grading_system.students',
        'plugin.skills_grading_system.sessions',
        'plugin.skills_grading_system.classes',
        'plugin.skills_grading_system.blocks',
        'plugin.skills_grading_system.class_demacations',
        'plugin.skills_grading_system.student_annual_results',
        'plugin.skills_grading_system.student_termly_results'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
