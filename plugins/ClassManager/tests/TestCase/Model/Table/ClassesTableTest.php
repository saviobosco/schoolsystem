<?php
namespace ClassManager\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use ClassManager\Model\Table\ClassesTable;

/**
 * ClassManager\Model\Table\ClassesTable Test Case
 */
class ClassesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \ClassManager\Model\Table\ClassesTable
     */
    public $Classes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.class_manager.classes',
        'plugin.class_manager.blocks',
        'plugin.class_manager.class_demarcations',
        'plugin.class_manager.student_annual_position_on_class_demarcations',
        'plugin.class_manager.student_annual_positions',
        'plugin.class_manager.student_annual_results',
        'plugin.class_manager.student_annual_subject_position_on_class_demarcations',
        'plugin.class_manager.student_annual_subject_positions',
        'plugin.class_manager.student_class_counts',
        'plugin.class_manager.student_general_remarks',
        'plugin.class_manager.student_publish_results',
        'plugin.class_manager.student_result_pins',
        'plugin.class_manager.student_termly_position_on_class_demarcations',
        'plugin.class_manager.student_termly_positions',
        'plugin.class_manager.student_termly_results',
        'plugin.class_manager.student_termly_subject_position_on_class_demarcations',
        'plugin.class_manager.student_termly_subject_positions',
        'plugin.class_manager.students',
        'plugin.class_manager.students_affective_disposition_scores',
        'plugin.class_manager.students_psychomotor_skill_scores',
        'plugin.class_manager.subject_class_averages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Classes') ? [] : ['className' => ClassesTable::class];
        $this->Classes = TableRegistry::get('Classes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Classes);

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