<?php
namespace App\Test\TestCase\Controller;

use App\Controller\LevelsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\LevelsController Test Case
 */
class LevelsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.levels',
        'app.courses',
        'app.semesters',
        'app.students_courses',
        'app.students',
        'app.schools',
        'app.remarks',
        'app.student_result_pins'
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
        $this->get('levels/index');
        $this->assertResponseOk();
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/levels/view/1');
        $this->assertResponseOk();
        $this->assertResponseContains('Name');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $data = [
            'id' => 2,
            'name' => 'First Year',
            'created' => '2016-07-16 15:40:37',
            'modified' => '2016-07-16 15:40:37'
        ];
        $this->post('/levels/add',$data);
        $this->assertResponseSuccess();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->get('/levels/edit/1');
        $this->assertResponseOk();
        $this->assertResponseContains('level');
        $data = [
            'id' => 1,
            'name' => 'First Year',
            'created' => '2016-07-16 15:40:37',
            'modified' => '2016-07-16 15:40:37'
        ];
        $this->post('/levels/edit/1',$data);
        $this->assertResponseSuccess();
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->delete('levels/delete/1');
        $this->assertResponseSuccess();
    }
}
