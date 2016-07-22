<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ApplicationsSubmittedController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ApplicationsSubmittedController Test Case
 */
class ApplicationsSubmittedControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.applications_submitted',
        'app.schools',
        'app.applicants_interview_results',
        'app.applicants_entrance_results',
        'app.applicants_pins',
        'app.entrance_result_pins',
    ];

    public function setUp()
    {
        $this->session([
            'Auth' => [
                'User' => [
                    'id' => 1,
                    'username' => 'testing',
                    'role' => 'admin'
// other keys.
                ]
            ],
        ]);
        parent::setUp();
    }
    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->get('/applications-submitted/index');
        $this->assertResponseOk();
        $this->assertResponseContains('Fullname');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/viewapplicant/AF/2016/001');
        $this->assertResponseOk();
        $this->assertResponseContains('Fullname');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAddUnauthenticated()
    {
        $this->get('/applications-submitted/add');
        $this->assertRedirect(['controller' => 'Applicants', 'action' => 'applicant_login']);
    }

    public function testAddAuthenticated()
    {
        $this->session([
            'Applicant' => [
                'id' => 12344,
            ]
        ]);
        $this->get('/applications-submitted/add');
        $this->assertResponseOk();
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->delete('/deleteapplicant/AF/2016/001');
        $this->assertResponseSuccess();
    }

    public function testCheckEntranceResult()
    {
        $data = [
            'reg_number' => 'AF/2016/001',
            'pin' => 12345,
            'exam_type' => '1'
        ];
        $this->post('/applications-submitted/check-entrance-result',$data);
        $this->assertResponseSuccess();
        $this->assertRedirect(['controller' => 'Applications-submitted', 'action' => 'entranceResult']);
    }

    public function testCheckInterviewResult()
    {
        $data = [
            'reg_number' => 'AF/2016/001',
            'pin' => 12346,
            'exam_type' => 2
        ];
        $this->post('/applications-submitted/check-entrance-result',$data);
        $this->assertResponseSuccess();
        $this->assertRedirect(['controller' => 'Applications-submitted', 'action' => 'interviewResult']);

    }

    public function testEntranceResultRedirect()
    {
        $this->get('/applications-submitted/entrance-result');
        $this->assertRedirect(['controller' => 'Applications-submitted', 'action' => 'checkEntranceResult']);
    }

    public function testInterviewResultRedirect()
    {
        $this->get('/applications-submitted/interview-result');
        $this->assertRedirect(['controller' => 'Applications-submitted', 'action' => 'checkEntranceResult']);
    }

    public function testEntranceResultOk()
    {
        $this->session([
            'Applicant' => [
                '1' => [
                    'id' => ['AF/2016/001']
                ]
            ]
        ]);
        $this->get('/applications-submitted/entrance-result');
        $this->assertResponseOk();
        $this->assertResponseNotEmpty();
    }

    public function testInterviewResultOk()
    {
        $this->session([
            'Applicant' => [
                '2' => [
                    'id' => ['AF/2016/001']
                ]
            ]
        ]);
        $this->get('/applications-submitted/interview-result');
        $this->assertResponseOk();
        $this->assertResponseNotEmpty();
    }

    public function testEntranceResultFailed()
    {
        $this->session([
            'Applicant' => [
                'Entrance' => [
                    'id' => ['AF/2016/001']
                ]
            ]
        ]);
        $this->get('/applications-submitted/entrance-result');
        $this->assertRedirect(['controller' => 'Applications-submitted', 'action' => 'checkEntranceResult']);
    }

    public function testInterviewResultFailed()
    {
        $this->session([
            'Applicant' => [
                'Interview' => [
                    'id' => ['AF/2016/001']
                ]
            ]
        ]);
        $this->get('/applications-submitted/interview-result');
        $this->assertRedirect(['controller' => 'Applications-submitted', 'action' => 'checkEntranceResult']);
    }

    public function testCheckEntranceResultPostDataFailed()
    {
        $data = [
            'reg_number' => 'AF/2016/001',
            'pin' => 12345,
            'exam_type' => '2'
        ];
        $this->post('/applications-submitted/check-entrance-result',$data);
        $this->assertResponseSuccess();
        $this->assertNoRedirect();
    }

    public function  testCheckNewStudentRegistration()
    {
        $data = [
            'reg_number' => 'AF/2016/001',
        ];
        $this->post('/applications-submitted/check-new-student-registration',$data);
        $this->assertRedirect(['controller' => 'Students', 'action' => 'new_student']);
    }

    public function  testCheckNewStudentRegistrationFailed()
    {
        $data = [
            'reg_number' => 'AF/2016/002',
        ];
        $this->post('/applications-submitted/check-new-student-registration',$data);
        $this->assertNoRedirect();
        $this->assertResponseContains('No admission yet');
    }

    public function  testCheckNewStudentRegistrationFailedBecauseOfBadRegNumber()
    {
        $data = [
            'reg_number' => 'AF/2016/004',
        ];
        $this->post('/applications-submitted/check-new-student-registration',$data);
        $this->assertNoRedirect();
        $this->assertResponseContains('Incorrect registration number');
    }

    public function testAdmissionLetter()
    {
        $this->session([
            'Admission' => [
                'id' => 'AF/2016/001'
            ]
        ]);
        $this->get('/applications-submitted/admission_letter');
        $this->assertResponseOk();
        $this->assertResponseContains('ADMISSION LETTER');
    }

    public function testAdmissionLetterFailed()
    {
        $this->get('/applications-submitted/admission_letter');
        $this->assertRedirect(['controller' => 'applications-submitted', 'action' => 'check_admission_status']);
    }
}
