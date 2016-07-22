<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * EntranceResultPinsFixture
 *
 */
class EntranceResultPinsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'serial_number' => ['type' => 'string', 'length' => 15, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'pin' => ['type' => 'integer', 'length' => 10, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'applicant_id' => ['type' => 'string', 'length' => 20, 'null' => false, 'default' => '', 'comment' => '', 'precision' => null, 'fixed' => null],
        'exam_type' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => true, 'default' => null, 'comment' => 'exam type(1 for entrance and 2 for interview)', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'pins' => ['type' => 'index', 'columns' => ['serial_number'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id', 'pin'], 'length' => []],
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
            'serial_number' => 'Lorem ipsum d',
            'pin' => 12345,
            'applicant_id' => 'AF/2016/001',
            'exam_type' => 1
        ],
        [
            'id' => 1,
            'serial_number' => 'Lorem ipsum d',
            'pin' => 12346,
            'applicant_id' => '',
            'exam_type' => ''
        ],
    ];
}
