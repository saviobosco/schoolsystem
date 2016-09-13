<?php
namespace ResultSystem\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use ResultSystem\Model\Table\StudentAnnualSubjectPositionOnClassDemacationsTable;

/**
 * ResultSystem\Model\Table\StudentAnnualSubjectPositionOnClassDemacationsTable Test Case
 */
class StudentAnnualSubjectPositionOnClassDemacationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \ResultSystem\Model\Table\StudentAnnualSubjectPositionOnClassDemacationsTable
     */
    public $StudentAnnualSubjectPositionOnClassDemacations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.result_system.student_annual_subject_position_on_class_demacations',
        'plugin.result_system.subjects',
        'plugin.result_system.students',
        'plugin.result_system.classes',
        'plugin.result_system.class_demacations',
        'plugin.result_system.sessions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('StudentAnnualSubjectPositionOnClassDemacations') ? [] : ['className' => 'ResultSystem\Model\Table\StudentAnnualSubjectPositionOnClassDemacationsTable'];
        $this->StudentAnnualSubjectPositionOnClassDemacations = TableRegistry::get('StudentAnnualSubjectPositionOnClassDemacations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StudentAnnualSubjectPositionOnClassDemacations);

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
}
