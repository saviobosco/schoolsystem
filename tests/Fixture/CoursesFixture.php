<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CoursesFixture
 *
 */
class CoursesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'string', 'length' => 15, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'name' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'semester_id' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'level_id' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'school_id' => ['type' => 'integer', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'BY_LEVEL_ID' => ['type' => 'index', 'columns' => ['level_id'], 'length' => []],
            'BY_SCHOOL_ID' => ['type' => 'index', 'columns' => ['school_id'], 'length' => []],
            'BY_SEMESTER_ID' => ['type' => 'index', 'columns' => ['semester_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'UNIQUE_ID' => ['type' => 'unique', 'columns' => ['id'], 'length' => []],
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
            'id' => 'CSE101',
            'name' => 'Computer Engineering',
            'semester_id' => 1,
            'level_id' => 1,
            'school_id' => 1,
            'created' => '2016-06-27 13:28:28',
            'modified' => '2016-06-27 13:28:28'
        ],
        [
            'id' => 'CSE121',
            'name' => 'Computer Engineering',
            'semester_id' => 2,
            'level_id' => 1,
            'school_id' => 1,
            'created' => '2016-06-27 13:28:28',
            'modified' => '2016-06-27 13:28:28'
        ],
        [
            'id' => 'CSE211',
            'name' => 'Computer Engineering',
            'semester_id' => 1,
            'level_id' => 2,
            'school_id' => 1,
            'created' => '2016-06-27 13:28:28',
            'modified' => '2016-06-27 13:28:28'
        ],
        [
            'id' => 'MID101',
            'name' => 'Computer Engineering',
            'semester_id' => 1,
            'level_id' => 1,
            'school_id' => 2,
            'created' => '2016-06-27 13:28:28',
            'modified' => '2016-06-27 13:28:28'
        ],
        [
            'id' => 'MID121',
            'name' => 'Computer Engineering',
            'semester_id' => 2,
            'level_id' => 1,
            'school_id' => 2,
            'created' => '2016-06-27 13:28:28',
            'modified' => '2016-06-27 13:28:28'
        ],
        [
            'id' => 'MID211',
            'name' => 'Computer Engineering',
            'semester_id' => 1,
            'level_id' => 2,
            'school_id' => 2,
            'created' => '2016-06-27 13:28:28',
            'modified' => '2016-06-27 13:28:28'
        ],
    ];
}
