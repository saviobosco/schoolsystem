<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudentResultPinsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StudentResultPinsTable Test Case
 */
class StudentResultPinsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StudentResultPinsTable
     */
    public $StudentResultPins;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.student_result_pins',
        'app.students',
        'app.schools',
        'app.levels',
        'app.courses',
        'app.semesters',
        'app.students_courses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('StudentResultPins') ? [] : ['className' => 'App\Model\Table\StudentResultPinsTable'];
        $this->StudentResultPins = TableRegistry::get('StudentResultPins', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StudentResultPins);

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
     * Test checkPin method
     *
     * @return void
     */
    public function testCheckPin()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test savePin method
     *
     * @return void
     */
    public function testSavePin()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test updateStudentPin method
     *
     * @return void
     */
    public function testUpdateStudentPin()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
