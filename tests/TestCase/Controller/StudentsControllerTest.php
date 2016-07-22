<?php
namespace App\Test\TestCase\Controller;

use App\Controller\StudentsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\StudentsController Test Case
 */
class StudentsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.students',
        'app.schools',
        'app.levels',
        'app.courses',
        'app.semesters',
        'app.students_courses',
        'app.remarks',
        'app.student_result_pins',
        'app.sessions'
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
        $this->get('students');
        $this->assertResponseOk();
        $this->assertResponseContains('Students');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->get('/viewstudent/SON/2016/NUR/001');
        $this->assertResponseOk();
        $this->assertResponseContains('student');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $data = [
            'id' => 'SON/2016/NUR/005',
            'fullname' => 'Lorem ipsum dolor sit amet',
            'maiden_name' => 'Lorem ipsum dolor sit amet',
            'sex' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'marital_status' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'religion' => 'Lorem ipsum dolor sit amet',
            'place_of_birth' => 'Lorem ipsum dolor sit amet',
            'state_of_origin' => 'Lorem ipsum dolor sit amet',
            'l_g_a' => 'Lorem ipsum dolor sit amet',
            'nationality' => 'Lorem ipsum dolor sit amet',
            'postal_address' => 'Lorem ipsum dolor sit amet',
            'permanent_home_address' => 'Lorem ipsum dolor sit amet',
            'next_of_kin' => 'Lorem ipsum dolor sit amet',
            'address_of_next_of_kin' => 'Lorem ipsum dolor sit amet',
            'relationship_to_next_of_kin' => 'Lorem ipsum dolor sit amet',
            'phone_number' => 'Lorem ipsum dolor sit amet',
            'photo' => 'Lorem ipsum dolor sit amet',
            'sponsor' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'occupation_of_sponsor' => 'Lorem ipsum dolor sit amet',
            'name_of_sponsor' => 'Lorem ipsum dolor sit amet',
            'school_id' => 1,
            'level_id' => 1,
            'year' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'created' => '2016-07-16 16:21:21',
            'modified' => '2016-07-16 16:21:21',
            'courses' => [
                '_ids' => ['CSE101','CSE 121']
            ]
        ];

        $this->post('students/add',$data);
        $this->assertResponseSuccess();
    }

    /**
     * Test newStudent method
     *
     * @return void
     */
    public function testNewStudent()
    {
        $data = [
            'id' => 'SON/2016/NUR/005',
            'fullname' => 'Lorem ipsum dolor sit amet',
            'maiden_name' => 'Lorem ipsum dolor sit amet',
            'sex' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'marital_status' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'religion' => 'Lorem ipsum dolor sit amet',
            'place_of_birth' => 'Lorem ipsum dolor sit amet',
            'state_of_origin' => 'Lorem ipsum dolor sit amet',
            'l_g_a' => 'Lorem ipsum dolor sit amet',
            'nationality' => 'Lorem ipsum dolor sit amet',
            'postal_address' => 'Lorem ipsum dolor sit amet',
            'permanent_home_address' => 'Lorem ipsum dolor sit amet',
            'next_of_kin' => 'Lorem ipsum dolor sit amet',
            'address_of_next_of_kin' => 'Lorem ipsum dolor sit amet',
            'relationship_to_next_of_kin' => 'Lorem ipsum dolor sit amet',
            'phone_number' => 'Lorem ipsum dolor sit amet',
            'photo' => 'Lorem ipsum dolor sit amet',
            'sponsor' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'occupation_of_sponsor' => 'Lorem ipsum dolor sit amet',
            'name_of_sponsor' => 'Lorem ipsum dolor sit amet',
            'school_id' => 1,
            'level_id' => 1,
            'year' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'created' => '2016-07-16 16:21:21',
            'modified' => '2016-07-16 16:21:21',
            'courses' => [
                '_ids' => ['CSE101','CSE 121']
            ]
        ];

        $this->post('students/new_student',$data);
        $this->assertResponseSuccess();
    }

    /**
     * Test studentData method
     *
     * @return void
     */
    public function testStudentData()
    {
        $this->get('/student_data_profile/SON/2016/NUR/001');
        $this->assertResponseOk();
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->get('/editstudent/SON/2016/NUR/001');
        $this->assertResponseOk();

        $data = [
            'id' => 'AF/2016/NUR/001',
            'fullname' => 'Lorem ipsum dolor sit amet',
            'maiden_name' => 'Lorem ipsum dolor sit amet',
            'sex' => 'm',
            'marital_status' => 'Yes',
            'religion' => 'Lorem ipsum dolor sit amet',
            'place_of_birth' => 'Lorem ipsum dolor sit amet',
            'state_of_origin' => 'Lorem ipsum dolor sit amet',
            'l_g_a' => 'Lorem ipsum dolor sit amet',
            'nationality' => 'Lorem ipsum dolor sit amet',
            'postal_address' => 'Lorem ipsum dolor sit amet',
            'permanent_home_address' => 'Lorem ipsum dolor sit amet',
            'next_of_kin' => 'Lorem ipsum dolor sit amet',
            'address_of_next_of_kin' => 'Lorem ipsum dolor sit amet',
            'relationship_to_next_of_kin' => 'Lorem ipsum dolor sit amet',
            'phone_number' => 'Lorem ipsum dolor sit amet',
            'photo' => 'Lorem ipsum dolor sit amet',
            'file_upload_1' => 'Lorem ipsum dolor sit amet',
            'file_upload_2' => 'Lorem ipsum dolor sit amet',
            'file_upload_3' => 'Lorem ipsum dolor sit amet',
            'file_upload_4' => 'Lorem ipsum dolor sit amet',
            'sponsor' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'occupation_of_sponsor' => 'Lorem ipsum dolor sit amet',
            'name_of_sponsor' => 'Lorem ipsum dolor sit amet',
            'school_id' => 1,
            'session_id' => 1,
            'year' => '2016',
            'created' => '2016-07-02 09:18:03',
            'modified' => '2016-07-02 09:18:03',
            'courses' => [
                '_ids' => ['CSE101', 'CSE121','CSE211']
            ]
        ];
        $this->post('/editstudent/SON/2016/NUR/001',$data);
        $this->assertResponseSuccess();
    }

    /**
     * Test enterRemark method
     *
     * @return void
     */
    public function testEnterRemark()
    {
        $this->get('/enterstudentremark/SON/2016/NUR/001');
        $this->assertResponseContains('student','Students variable is not contained in response');
        $this->assertResponseOk();
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->delete('deletestudent/SON/2016/NUR/001');
        $this->assertResponseSuccess();
        $this->assertRedirect();
    }

    /**
     *  testCheckResultwithPostData
     */
    public function testCheckResultWithPostData()
    {
        $data = [
            'reg_number' => 'SON/2016/NUR/001',
            'pin' => 1234567890,
            'school_id' =>1,
            'level_id' => 1,
            'semester_id' => 1
        ];
        $this->post('students/check-result',$data);
        $this->assertRedirect(['controller'=>'Students','action'=>'student-result']);
    }

    public function testCheckResultWithDataFromTable()
    {
        $data = [
            'reg_number' => 'SON/2016/NUR/002',
            'pin' => 1234567891,
            'school_id' =>1,
            'level_id' => 1,
            'semester_id' => 1
        ];
        $this->post('students/check-result',$data);
        $this->assertRedirect(['controller'=>'Students','action'=>'student-result']);
    }

    /**
     * Test studentResult method
     *
     * @return void
     */
    public function testStudentResult()
    {
        $this->session([
            'Student' => [
                'id' => 'SON/2016/NUR/001',
                'school_id' => 1,
                'level_id' => 1,
                'semester_id' => 1
            ]
        ]);
        $this->get('students/student-result');
        $this->assertResponseOk();
        $this->assertResponseContains('Student','Students variable is not contained in response');

    }

    public function testStudentResultFailed()
    {
        $this->get('students/student-result');
        $this->assertRedirect(['controller'=>'students','action'=>'check-result']);
    }
}
