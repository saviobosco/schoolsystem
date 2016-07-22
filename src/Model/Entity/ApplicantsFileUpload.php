<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ApplicantsFileUpload Entity.
 *
 * @property string $applicant_id
 * @property \App\Model\Entity\Applicant $applicant
 * @property string $file
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class ApplicantsFileUpload extends Entity
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
        'applicant_id' => true,
    ];
}
