<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicantsEntranceResultsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicantsEntranceResultsTable Test Case
 */
class ApplicantsEntranceResultsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicantsEntranceResultsTable
     */
    public $ApplicantsEntranceResults;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.applicants_entrance_results',
        'app.applications_submitted'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ApplicantsEntranceResults') ? [] : ['className' => 'App\Model\Table\ApplicantsEntranceResultsTable'];
        $this->ApplicantsEntranceResults = TableRegistry::get('ApplicantsEntranceResults', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicantsEntranceResults);

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
