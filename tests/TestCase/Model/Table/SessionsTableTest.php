<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SessionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SessionsTable Test Case
 */
class SessionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SessionsTable
     */
    public $Sessions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.sessions',
        'app.student_subject_annual_results',
        'app.students',
        'app.classes',
        'app.class_demacations',
        'app.students_affective_dispositions',
        'app.students_psychomotor_skills'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Sessions') ? [] : ['className' => 'App\Model\Table\SessionsTable'];
        $this->Sessions = TableRegistry::get('Sessions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Sessions);

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
