<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\EntranceResultPinsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\EntranceResultPinsTable Test Case
 */
class EntranceResultPinsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\EntranceResultPinsTable
     */
    public $EntranceResultPins;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.entrance_result_pins',
        'app.schools',
        'app.applications_submitted',
        'app.applicants_entrance_results',
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
        $config = TableRegistry::exists('EntranceResultPins') ? [] : ['className' => 'App\Model\Table\EntranceResultPinsTable'];
        $this->EntranceResultPins = TableRegistry::get('EntranceResultPins', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->EntranceResultPins);

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
