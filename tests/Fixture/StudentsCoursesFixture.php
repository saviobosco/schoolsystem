<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StudentsCoursesFixture
 *
 */
class StudentsCoursesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'student_id' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'course_id' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'total' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'grade' => ['type' => 'string', 'fixed' => true, 'length' => 10, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'session_id' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'BY_STUDENT_ID' => ['type' => 'index', 'columns' => ['student_id'], 'length' => []],
            'BY_COURSE_ID' => ['type' => 'index', 'columns' => ['course_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'students_courses_Coursefk_1' => ['type' => 'foreign', 'columns' => ['course_id'], 'references' => ['courses', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'students_courses_Studentfk_1' => ['type' => 'foreign', 'columns' => ['student_id'], 'references' => ['students', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */

    public $records = [
        [
            'id' => 1,
            'student_id' => 'SON/2016/NUR/001',
            'course_id' => 'CSE101',
            'total' => 50,
            'grade' => 'C',
            'session_id' => 1
        ],
        [
            'id' => 2,
            'student_id' => 'SON/2016/NUR/001',
            'course_id' => 'CSE121',
            'total' => 50,
            'grade' => 'C',
            'session_id' => 1
        ],
        [
            'id' => 3,
            'student_id' => 'SON/2016/NUR/002',
            'course_id' => 'CSE101',
            'total' => 50,
            'grade' => 'C',
            'session_id' => 1
        ],
        [
            'id' => 4,
            'student_id' => 'SON/2016/NUR/003',
            'course_id' => 'CSE101',
            'total' => 50,
            'grade' => 'C',
            'session_id' => 1
        ],
        [
            'id' => 5,
            'student_id' => 'SON/2016/NUR/004',
            'course_id' => 'CSE101',
            'total' => '',
            'grade' => '',
            'session_id' => 1
        ],
        [
            'id' => 6,
            'student_id' => 'SON/2016/NUR/005',
            'course_id' => 'CSE101',
            'total' => '',
            'grade' => '',
            'session_id' => 1
        ],
    ];
}
