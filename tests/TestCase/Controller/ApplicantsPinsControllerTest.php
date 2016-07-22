<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ApplicantsPinsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ApplicantsPinsController Test Case
 */
class ApplicantsPinsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.applicants_pins',
        'app.schools',
        'app.applicants_interview_results'
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
        $this->get('/admins/print-pin');
        $this->assertResponseOk();
        $this->assertResponseContains('pins');
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
        $this->post('/admins/generate-pin',$data);
        $this->assertResponseSuccess();
    }


}
