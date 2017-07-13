<?php
namespace ResultSystem\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use ResultSystem\Model\Table\StudentTermlySubjectPositionOnClassDemacationsTable;

/**
 * ResultSystem\Model\Table\StudentTermlySubjectPositionOnClassDemacationsTable Test Case
 */
class StudentTermlySubjectPositionOnClassDemacationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \ResultSystem\Model\Table\StudentTermlySubjectPositionOnClassDemacationsTable
     */
    public $StudentTermlySubjectPositionOnClassDemacations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.result_system.student_termly_subject_position_on_class_demacations',
        'plugin.result_system.subjects',
        'plugin.result_system.students',
        'plugin.result_system.classes',
        'plugin.result_system.class_demacations',
        'plugin.result_system.terms',
        'plugin.result_system.student_termly_results',
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
        $config = TableRegistry::exists('StudentTermlySubjectPositionOnClassDemacations') ? [] : ['className' => 'ResultSystem\Model\Table\StudentTermlySubjectPositionOnClassDemacationsTable'];
        $this->StudentTermlySubjectPositionOnClassDemacations = TableRegistry::get('StudentTermlySubjectPositionOnClassDemacations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->StudentTermlySubjectPositionOnClassDemacations);

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
