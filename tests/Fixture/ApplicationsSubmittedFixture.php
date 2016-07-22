<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ApplicationsSubmittedFixture
 *
 */
class ApplicationsSubmittedFixture extends TestFixture
{

    /**
     * Table name
     *
     * @var string
     */
    public $table = 'applications_submitted';

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'string', 'length' => 15, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'fullname' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'maiden_name' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'sex' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'marital_status' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'religion' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'place_of_birth' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'state_of_origin' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'l_g_a' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'nationality' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'postal_address' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'permanent_home_address' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'next_of_kin' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'address_of_next_of_kin' => ['type' => 'string', 'length' => 150, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'relationship_to_next_of_kin' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'phone_number' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'school_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'photo' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'file_upload_1' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'file_upload_2' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'file_upload_3' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'file_upload_4' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'sponsor' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'occupation_of_sponsor' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'name_of_sponsor' => ['type' => 'string', 'length' => 100, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
        'admission_status' => ['type' => 'integer', 'length' => 2, 'unsigned' => false, 'null' => true, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'year' => ['type' => 'text', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
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
            'id' => 'AF/2016/001',
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
            'school_id' => 1,
            'photo' => 'Lorem ipsum dolor sit amet',
            'file_upload_1' => 'Lorem ipsum dolor sit amet',
            'file_upload_2' => 'Lorem ipsum dolor sit amet',
            'file_upload_3' => 'Lorem ipsum dolor sit amet',
            'file_upload_4' => 'Lorem ipsum dolor sit amet',
            'sponsor' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'occupation_of_sponsor' => 'Lorem ipsum dolor sit amet',
            'name_of_sponsor' => 'Lorem ipsum dolor sit amet',
            'admission_status' => 1,
            'year' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
        ],
        [
            'id' => 'AF/2016/002',
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
            'school_id' => 1,
            'photo' => 'Lorem ipsum dolor sit amet',
            'file_upload_1' => 'Lorem ipsum dolor sit amet',
            'file_upload_2' => 'Lorem ipsum dolor sit amet',
            'file_upload_3' => 'Lorem ipsum dolor sit amet',
            'file_upload_4' => 'Lorem ipsum dolor sit amet',
            'sponsor' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'occupation_of_sponsor' => 'Lorem ipsum dolor sit amet',
            'name_of_sponsor' => 'Lorem ipsum dolor sit amet',
            'admission_status' => 0,
            'year' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
        ],
        [
            'id' => 'AF/2016/003',
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
            'school_id' => 1,
            'photo' => 'Lorem ipsum dolor sit amet',
            'file_upload_1' => 'Lorem ipsum dolor sit amet',
            'file_upload_2' => 'Lorem ipsum dolor sit amet',
            'file_upload_3' => 'Lorem ipsum dolor sit amet',
            'file_upload_4' => 'Lorem ipsum dolor sit amet',
            'sponsor' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
            'occupation_of_sponsor' => 'Lorem ipsum dolor sit amet',
            'name_of_sponsor' => 'Lorem ipsum dolor sit amet',
            'admission_status' => 0,
            'year' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.'
        ],
    ];
}
