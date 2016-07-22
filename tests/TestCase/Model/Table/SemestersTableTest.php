<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SemestersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SemestersTable Test Case
 */
class SemestersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SemestersTable
     */
    public $Semesters;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.semesters',
        'app.courses',
        'app.levels',
        'app.students',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Semesters') ? [] : ['className' => 'App\Model\Table\SemestersTable'];
        $this->Semesters = TableRegistry::get('Semesters', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Semesters);

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
}
