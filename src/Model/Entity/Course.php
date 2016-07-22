<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Course Entity.
 *
 * @property string $id
 * @property string $name
 * @property int $semester_id
 * @property \App\Model\Entity\Semester $semester
 * @property int $session_id
 * @property \App\Model\Entity\Session $session
 * @property int $school_id
 * @property \App\Model\Entity\School $school
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\Student[] $students
 */
class Course extends Entity
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
