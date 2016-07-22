<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ApplicantsPinsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ApplicantsPinsTable Test Case
 */
class ApplicantsPinsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ApplicantsPinsTable
     */
    public $ApplicantsPins;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.applicants_pins',
        'app.applications_submitted',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ApplicantsPins') ? [] : ['className' => 'App\Model\Table\ApplicantsPinsTable'];
        $this->ApplicantsPins = TableRegistry::get('ApplicantsPins', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApplicantsPins);

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
