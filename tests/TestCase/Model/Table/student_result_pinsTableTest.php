<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\student_result_pinsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\student_result_pinsTable Test Case
 */
class student_result_pinsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\student_result_pinsTable
     */
    public $student_result_pins;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('student_result_pins') ? [] : ['className' => 'App\Model\Table\student_result_pinsTable'];
        $this->student_result_pins = TableRegistry::get('student_result_pins', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->student_result_pins);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
