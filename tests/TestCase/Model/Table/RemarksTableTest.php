<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RemarksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RemarksTable Test Case
 */
class RemarksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RemarksTable
     */
    public $Remarks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.remarks',
        'app.students',
        'app.schools',
        'app.levels',
        'app.courses',
        'app.semesters',

    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Remarks') ? [] : ['className' => 'App\Model\Table\RemarksTable'];
        $this->Remarks = TableRegistry::get('Remarks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Remarks);

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
