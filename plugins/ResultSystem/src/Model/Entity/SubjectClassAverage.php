<?php
namespace ResultSystem\Model\Entity;

use Cake\ORM\Entity;

/**
 * SubjectClassAverage Entity
 *
 * @property int $id
 * @property int $subject_id
 * @property int $student_count
 * @property float $class_average
 * @property int $class_id
 * @property int $term_id
 * @property int $session_id
 *
 * @property \ResultSystem\Model\Entity\Subject $subject
 * @property \ResultSystem\Model\Entity\Class $class
 * @property \ResultSystem\Model\Entity\Term $term
 * @property \ResultSystem\Model\Entity\Session $session
 */
class SubjectClassAverage extends Entity
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
        'id' => false
    ];
}
