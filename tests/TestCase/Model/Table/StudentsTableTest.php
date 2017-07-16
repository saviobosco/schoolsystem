<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StudentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StudentsTable Test Case
 */
class StudentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StudentsTable
     */
    public $Students;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.students',
        'app.sessions',
        'app.classes',
        'app.blocks',
        'app.class_demarcations',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Students') ? [] : ['className' => 'App\Model\Table\StudentsTable'];
        $this->Students = TableRegistry::get('Students', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Students);

        parent::tearDown();
    }

    public function testFindUnActiveStudents()
    {
        $query = $this->Students->find('UnActiveStudents');
        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();
        $expected = [
            0 => [
                'id' => 'SMS/2017/004',
                'first_name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'date_of_birth' => '2017-07-13',
                'gender' => 'Lorem ip',
                'state_of_origin' => 'Lorem ipsum dolor sit amet',
                'religion' => 'Lorem ipsum dolor sit amet',
                'home_residence' => 'Lorem ipsum dolor sit amet',
                'guardian' => 'Lorem ipsum dolor sit amet',
                'relationship_to_guardian' => 'Lorem ipsum dolor sit amet',
                'occupation_of_guardian' => 'Lorem ipsum dolor sit amet',
                'guardian_phone_number' => 'Lorem ipsum d',
                'session_id' => 'Lorem ips',
                'class_id' => 3,
                'class_demarcation_id' => 1,
                'photo' => 'Lorem ipsum dolor sit amet',
                'photo_dir' => 'Lorem ipsum dolor sit amet',
                'created' => '2017-07-13 04:17:58',
                'modified' => '2017-07-13 04:17:58',
                'status' => 0,
                'session_admitted_id' => 1,
                'graduated' => 0,
                'graduated_session_id' => null,
                'state_id' => 1
            ]
        ];
        $this->assertEquals($expected, $result);
    }

    public function testFindGraduatedStudents()
    {
        $query = $this->Students->find('GraduatedStudents');
        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();
        $expected = [
            0 => [
                'id' => 'SMS/2017/005',
                'first_name' => 'Lorem ipsum dolor sit amet',
                'last_name' => 'Lorem ipsum dolor sit amet',
                'date_of_birth' => '2017-07-13',
                'gender' => 'Lorem ip',
                'state_of_origin' => 'Lorem ipsum dolor sit amet',
                'religion' => 'Lorem ipsum dolor sit amet',
                'home_residence' => 'Lorem ipsum dolor sit amet',
                'guardian' => 'Lorem ipsum dolor sit amet',
                'relationship_to_guardian' => 'Lorem ipsum dolor sit amet',
                'occupation_of_guardian' => 'Lorem ipsum dolor sit amet',
                'guardian_phone_number' => 'Lorem ipsum d',
                'session_id' => 'Lorem ips',
                'class_id' => 3,
                'class_demarcation_id' => 1,
                'photo' => 'Lorem ipsum dolor sit amet',
                'photo_dir' => 'Lorem ipsum dolor sit amet',
                'created' => '2017-07-13 04:17:58',
                'modified' => '2017-07-13 04:17:58',
                'status' => 1,
                'session_admitted_id' => 1,
                'graduated' => 1,
                'graduated_session_id' => 1,
                'state_id' => 1
            ]
        ];
        $this->assertEquals($expected, $result);
    }
}
