<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Remark Entity.
 *
 * @property int $id
 * @property string $remark
 * @property string $student_id
 * @property \App\Model\Entity\Student $student
 * @property int $session_id
 * @property \App\Model\Entity\Session $session
 * @property int $semester_id
 * @property \App\Model\Entity\Semester $semester
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Remark extends Entity
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
