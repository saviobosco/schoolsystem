<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Applicant Entity.
 *
 * @property string $id
 * @property string $fullname
 * @property string $maiden_name
 * @property string $sex
 * @property string $marital_status
 * @property string $place_of_birth
 * @property string $state_of_origin
 * @property string $nationality
 * @property string $postal_address
 * @property string $permanent_home_address
 * @property string $next_of_kin
 * @property string $address_of_next_of_kin
 * @property string $relationship_to_next_of_kin
 * @property string $phone_number
 * @property int $school_id
 * @property \App\Model\Entity\School $school
 * @property $photo
 * @property $file_upload_1
 * @property $file_upload_2
 * @property $file_upload_3
 * @property $file_upload_4
 * @property string $sponsor
 * @property string $occupation_of_sponsor
 * @property string $name_of_sponsor
 * @property \App\Model\Entity\ApplicantsEntranceResult[] $applicants_entrance_results
 * @property \App\Model\Entity\ApplicantsInterviewResult[] $applicants_interview_results
 * @property \App\Model\Entity\ApplicantsPin[] $applicants_pins
 * @property \App\Model\Entity\ApplicationFileUpload[] $application_file_uploads
 */
class Applicant extends Entity
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
        'id' => true,
    ];
}
