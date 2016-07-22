<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicantsInterviewResultsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicantsInterviewResultsTable Test Case
 */
class ApplicantsInterviewResultsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicantsInterviewResultsTable
     */
    public $ApplicantsInterviewResults;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.applicants_interview_results',
        'app.schools',
        'app.applications_submitted',
        'app.applicants_entrance_results',
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
        $config = TableRegistry::exists('ApplicantsInterviewResults') ? [] : ['className' => 'App\Model\Table\ApplicantsInterviewResultsTable'];
        $this->ApplicantsInterviewResults = TableRegistry::get('ApplicantsInterviewResults', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicantsInterviewResults);

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
