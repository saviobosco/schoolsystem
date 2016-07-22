<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * EntranceResultPin Entity.
 *
 * @property int $id
 * @property string $serial_number
 * @property int $pin
 * @property string $applicant_id
 * @property \App\Model\Entity\Applicant $applicant
 */
class EntranceResultPin extends Entity
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
        'id' => false,
        'applicant_id' => true,
    ];
}
