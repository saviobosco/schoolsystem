<?php
namespace App\Model\Table;

use App\Model\Entity\Student;
use Cake\Event\Event;
use Cake\Network\Request;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * Students Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Schools
 * @property \Cake\ORM\Association\BelongsTo $Sessions
 * @property \Cake\ORM\Association\BelongsToMany $Courses
 */
class StudentsTable extends Table
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

        $this->table('students');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Schools', [
            'foreignKey' => 'school_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Levels', [
            'foreignKey' => 'level_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Sessions', [
            'foreignKey' => 'session_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsToMany('Courses', [
            'through' => 'StudentsCourses',
            'saveStrategy' => 'append',
            'dependent' => true
        ]);

        $this->hasMany('StudentResultPins',[
            'className'=>'StudentResultPins',
        ]);

        $this->HasMany('Remarks',[
            'className' => 'Remarks',
            'foreignKey' => 'student_id',
            'dependent' => true
        ]);

        $this->addBehavior('Josegonzalez/Upload.Upload',[
            'photo' => [
                'path' => 'webroot{DS}img{DS}photos{DS}',
                'fields'=>[
                    'dir' => '/img/photos/'
                ]
            ],
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
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('fullname', 'create')
            ->notEmpty('fullname');

        $validator
            ->requirePresence('maiden_name', 'create')
            ->notEmpty('maiden_name');

        $validator
            ->requirePresence('sex', 'create')
            ->notEmpty('sex');

        $validator
            ->requirePresence('marital_status', 'create')
            ->notEmpty('marital_status');

        $validator
            ->requirePresence('religion', 'create')
            ->notEmpty('religion');

        $validator
            ->requirePresence('place_of_birth', 'create')
            ->notEmpty('place_of_birth');

        $validator
            ->requirePresence('state_of_origin', 'create')
            ->notEmpty('state_of_origin');

        $validator
            ->requirePresence('l_g_a', 'create')
            ->notEmpty('l_g_a');

        $validator
            ->requirePresence('nationality', 'create')
            ->notEmpty('nationality');

        $validator
            ->requirePresence('postal_address', 'create')
            ->notEmpty('postal_address');

        $validator
            ->requirePresence('permanent_home_address', 'create')
            ->notEmpty('permanent_home_address');

        $validator
            ->requirePresence('next_of_kin', 'create')
            ->notEmpty('next_of_kin');

        $validator
            ->requirePresence('address_of_next_of_kin', 'create')
            ->notEmpty('address_of_next_of_kin');

        $validator
            ->requirePresence('relationship_to_next_of_kin', 'create')
            ->notEmpty('relationship_to_next_of_kin');

        $validator
            ->requirePresence('phone_number', 'create')
            ->notEmpty('phone_number');

        $validator
            ->requirePresence('photo', 'create')
            ->notEmpty('photo');

        $validator
            ->requirePresence('sponsor', 'create')
            ->notEmpty('sponsor');

        $validator
            ->requirePresence('occupation_of_sponsor', 'create')
            ->notEmpty('occupation_of_sponsor');

        $validator
            ->requirePresence('name_of_sponsor', 'create')
            ->notEmpty('name_of_sponsor');


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
        $rules->add($rules->isUnique(['id']));
        $rules->add($rules->existsIn(['school_id'], 'Schools'));
        $rules->add($rules->existsIn(['session_id'], 'Sessions'));
        return $rules;
    }

    public function beforeSave( Event $event , Entity $entity , $options )
    {
         if($entity->isNew()){
             $entity->year = date('Y');
         }
    }

    public function beforeMarshal(Event $event, \ArrayObject $data, \ArrayObject $options)
    {
        @$data['courses']['_ids'] = $this->getStudentOtherCourses($data['id'],$data['courses']['_ids']);
    }

    /**
     * @param $id
     * @param $submittedcourses
     * @return array
     *
     * This getStudentOtherCourses method is binded to the table beforeMarshal
     * Method. it accept two parameters the student id and the submitted courses.
     * This method trys to match the submitted courses against the ones in the database
     * using the student id. if any exists, it is removed and non-existing ones are written to
     * the database.
     * ========================================================================
     * the method contains a try and catch statement to subdue all error outputted
     * if the student id does not exist in the database ( That is in the case of a
     * new student registration.
     */
    public function getStudentOtherCourses($id,$submittedcourses)
    {
        try {
            $student = $this->get($id,['contain'=>['Courses']]);
            if(!empty($student)) {
                $courses['_ids'] = [];
                for ($num = 0; $num < count($student->courses) ; $num++ ) {
                    array_push($courses['_ids'],$student['courses'][$num]['id']);
                }
                return @array_diff($submittedcourses,$courses['_ids']);
            }

        } catch(\Exception $e) {
        // subdued any return error ...
            return $submittedcourses ;
        }
    }

    /**
     * @param Query $query
     * @param Entity $entity
     * @return string
     */
    public function generateRegNumber()
    {
        $year = date('Y');
        $query = $this->find('all')->where(['id LIKE'=>'AF/'.$year.'/SCH/%']);
        $id =  $query->count() + 1 ;
        return 'AF/'.$year.'/SCH/'.$this->determinePreceedingZeros($id).$id ;
    }

    /**
     * @param $count
     * @return string
     */
    protected function determinePreceedingZeros($count)
    {
        if($count < 10){
            return '00';
        }elseif($count > 10 && $count < 99){
            return '0';
        }elseif($count > 99){
            return'';
        }
    }
}
