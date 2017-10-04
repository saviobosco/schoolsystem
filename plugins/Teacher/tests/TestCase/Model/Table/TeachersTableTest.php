<?php
namespace Teacher\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;
use Teacher\Model\Table\TeachersTable;

/**
 * Teacher\Model\Table\TeachersTable Test Case
 */
class TeachersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \Teacher\Model\Table\TeachersTable
     */
    public $Teachers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'plugin.teacher.teachers'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Teachers') ? [] : ['className' => 'Teacher\Model\Table\TeachersTable'];
        $this->Teachers = TableRegistry::get('Teachers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Teachers);

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
