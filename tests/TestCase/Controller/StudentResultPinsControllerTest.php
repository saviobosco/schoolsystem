<?php
namespace App\Test\TestCase\Controller;

use App\Controller\StudentResultPinsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\StudentResultPinsController Test Case
 */
class StudentResultPinsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.student_result_pins',
        'app.students',
        'app.schools',
    ];

    public function setUp()
    {
        parent::setUp();
        // Set session data
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'testing',
                    'role' => 'admin'
                    // other keys.
                ]
            ]
        ]);
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/student-result-pins/print-pin');
        $this->assertResponseOk();
    }


    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $data = [
            'number_to_generate' => 15,
            'save_to_database' => true
        ];
        $this->post('/student-result-pins/generate-pin',$data);
        $this->assertResponseSuccess();
    }
}
