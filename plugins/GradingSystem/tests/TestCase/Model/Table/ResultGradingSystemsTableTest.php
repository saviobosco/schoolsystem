<?php
namespace GradingSystem\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use GradingSystem\Model\Entity\GradeableTrait;
use GradingSystem\Model\Table\ResultGradingSystemsTable;

/**
 * GradingSystem\Model\Table\ResultGradingSystemsTable Test Case
 */
class ResultGradingSystemsTableTest extends TestCase
{

    // including the gradable trait for testing
    use GradeableTrait

    /**
     * Test subject
     *
     * @var \GradingSystem\Model\Table\ResultGradingSystemsTable
     */
    public $ResultGradingSystems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.grading_system.result_grading_systems'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ResultGradingSystems') ? [] : ['className' => 'GradingSystem\Model\Table\ResultGradingSystemsTable'];
        $this->ResultGradingSystems = TableRegistry::get('ResultGradingSystems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ResultGradingSystems);

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

    public function testGetGrades()
    {
        $grade = $this->ResultGradingSystems->getGrades();
        $this->assertCount(count($grade),4);
        $expected = [
            ['score' => '75 - above', 'grade' => 'A'],
            ['score' => '55 - 74', 'grade' => 'B'],
            ['score' => '45 - 54', 'grade' => 'P'],
            ['score' => '45 - below', 'grade' => 'F']
        ];
        $this->assertEquals($expected, $grade);
    }

    public function testCalculateGrade()
    {
        $totals = [100,75,74.55,55,54.5,43];
        $grade = $expected = [
            ['score' => '75 - above', 'grade' => 'A'],
            ['score' => '55 - 74', 'grade' => 'B'],
            ['score' => '45 - 54', 'grade' => 'P'],
            ['score' => '45 - below', 'grade' => 'F']
        ];
        $this->assertEquals($this->calculateGrade($totals[0],$grade),'A');
        $this->assertEquals($this->calculateGrade($totals[1],$grade),'A');
        $this->assertEquals($this->calculateGrade($totals[2],$grade),'B');
        $this->assertEquals($this->calculateGrade($totals[3],$grade),'B');
        $this->assertEquals($this->calculateGrade($totals[4],$grade),'P');
        $this->assertEquals($this->calculateGrade($totals[5],$grade),'F');
    }
}
