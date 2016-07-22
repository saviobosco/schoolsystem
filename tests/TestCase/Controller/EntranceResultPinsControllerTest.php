<?php
namespace App\Test\TestCase\Controller;

use App\Controller\EntranceResultPinsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\EntranceResultPinsController Test Case
 */
class EntranceResultPinsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.entrance_result_pins',
        'app.schools',
        'app.applications_submitted',
        'app.applicants_pins'
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
        $this->get('/entrance-result-pins/print-pin');
        $this->assertResponseOk();
        $this->assertResponseContains('Pin');
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
        $this->post('/entrance-result-pins/generate-pin',$data);
        $this->assertResponseSuccess();
    }


}
