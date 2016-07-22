<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudentsCoursesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StudentsCoursesTable Test Case
 */
class StudentsCoursesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StudentsCoursesTable
     */
    public $StudentsCourses;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.students_courses',
        'app.students',
        'app.schools',
        'app.applications_submitted',
        'app.entrance_results',
        'app.result_files',
        'app.interview_results',
        'app.applicants',
        'app.entrance_pins',
        'app.interview_pins',
        'app.levels',
        'app.courses',
        'app.semesters',
        'app.remarks',
        'app.student_result_pins',
        'app.sessions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('StudentsCourses') ? [] : ['className' => 'App\Model\Table\StudentsCoursesTable'];
        $this->StudentsCourses = TableRegistry::get('StudentsCourses', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StudentsCourses);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test beforeSave method
     *
     * @return void
     */
    public function testBeforeSave()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test saveResult method
     *
     * @return void
     */
    public function testSaveResult()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
