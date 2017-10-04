<?php
namespace Teacher\Model\Entity;

use Cake\ORM\Entity;

/**
 * Teacher Entity
 *
 * @property string $id
 * @property string $first_name
 * @property string $last_name
 * @property string $gender
 * @property string $state_of_origin
 * @property string $l_g_a
 * @property string $home_residence
 * @property string $phone_number
 * @property string $qualifications
 * @property string $photo
 * @property string $photo_dir
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Teacher extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => true
    ];
}
