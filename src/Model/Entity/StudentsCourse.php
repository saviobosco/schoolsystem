<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * StudentsCourse Entity.
 *
 * @property int $id
 * @property string $student_id
 * @property \App\Model\Entity\Student $student
 * @property int $course_id
 * @property \App\Model\Entity\Course $course
 * @property int $session_id
 * @property \App\Model\Entity\Session $session
 * @property int $total
 * @property string $grade
 * @property \App\Model\Entity\Semester $semester
 */
class StudentsCourse extends Entity
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
    ];
}
