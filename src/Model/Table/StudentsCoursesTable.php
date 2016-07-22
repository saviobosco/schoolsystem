<?php
namespace App\Model\Table;

use App\Model\Entity\StudentsCourse;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StudentsCourses Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Students
 * @property \Cake\ORM\Association\BelongsTo $Courses
 * @property \Cake\ORM\Association\BelongsTo $Sessions
 */
class StudentsCoursesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('students_courses');
        $this->displayField('id');
        $this->primaryKey(['student_id','course_id']);

        $this->belongsTo('Students', [
            'className' => 'Students',
            'foreignKey' => 'student_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Courses', [
            'className' => 'Courses',
            'foreignKey' => 'course_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Sessions', [
            'className' => 'Sessions',
            'foreignKey' => 'session_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
           /* ->integer('total')*/
            ->allowEmpty('total');

        $validator
            ->allowEmpty('grade');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['student_id'], 'Students'));
        $rules->add($rules->existsIn(['course_id'], 'Courses'));
        return $rules;
    }


    public function beforeSave( Event $event , Entity $entity , $options )
    {
        if ($entity->isNew()) {
            $student = $this->Students->get($entity->student_id,['fields'=>'session_id']);
            $entity->session_id = $student->session_id;
        }
    }


    public function saveResult($results)
    {
        if (isset($results)) {
            foreach ($results as $result) {
                $this->save($result);
            }
            return true;
        }
        return false;
    }
}
