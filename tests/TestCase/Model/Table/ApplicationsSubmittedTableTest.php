<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicationsSubmittedTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicationsSubmittedTable Test Case
 */
class ApplicationsSubmittedTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicationsSubmittedTable
     */
    public $ApplicationsSubmitted;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.applications_submitted',
        'app.schools',
        'app.applicants_interview_results',
        'app.applicants_pins'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ApplicationsSubmitted') ? [] : ['className' => 'App\Model\Table\ApplicationsSubmittedTable'];
        $this->ApplicationsSubmitted = TableRegistry::get('ApplicationsSubmitted', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicationsSubmitted);

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

    public function testGenerateRegNumber()
    {
        $result = $this->ApplicationsSubmitted->generateRegNumber($this->ApplicationsSubmitted->query());
        $this->assertContains('UGC/2016/', $result);
    }

    public function testDeterminePreceedingZeros()
    {
        $result = $this->ApplicationsSubmitted->determinePreceedingZeros(99);
        $this->assertEquals(0,$result);
    }

}
