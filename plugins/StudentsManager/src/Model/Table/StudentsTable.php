<?php
namespace StudentsManager\Model\Table;

use Cake\Event\Event;
use Cake\I18n\Date;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use StudentsManager\Model\Entity\Student;

/**
 * Students Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Sessions
 * @property \Cake\ORM\Association\BelongsTo $Classes
 * @property \Cake\ORM\Association\BelongsTo $ClassDemarcations
 * @property \Cake\ORM\Association\BelongsTo $SessionAdmitteds
 * @property \Cake\ORM\Association\BelongsTo $GraduatedSessions
 * @property \Cake\ORM\Association\BelongsTo $States
 * @property \Cake\ORM\Association\HasMany $StudentAnnualPositionOnClassDemarcations
 * @property \Cake\ORM\Association\HasMany $StudentAnnualPositions
 * @property \Cake\ORM\Association\HasMany $StudentAnnualResults
 * @property \Cake\ORM\Association\HasMany $StudentAnnualSubjectPositionOnClassDemarcations
 * @property \Cake\ORM\Association\HasMany $StudentAnnualSubjectPositions
 * @property \Cake\ORM\Association\HasMany $StudentGeneralRemarks
 * @property \Cake\ORM\Association\HasMany $StudentPublishResults
 * @property \Cake\ORM\Association\HasMany $StudentResultPins
 * @property \Cake\ORM\Association\HasMany $StudentTermlyPositionOnClassDemarcations
 * @property \Cake\ORM\Association\HasMany $StudentTermlyPositions
 * @property \Cake\ORM\Association\HasMany $StudentTermlyResults
 * @property \Cake\ORM\Association\HasMany $StudentTermlySubjectPositionOnClassDemarcations
 * @property \Cake\ORM\Association\HasMany $StudentTermlySubjectPositions
 * @property \Cake\ORM\Association\HasMany $StudentsAffectiveDispositionScores
 * @property \Cake\ORM\Association\HasMany $StudentsPsychomotorSkillScores
 *
 * @method \StudentsManager\Model\Entity\Student get($primaryKey, $options = [])
 * @method \StudentsManager\Model\Entity\Student newEntity($data = null, array $options = [])
 * @method \StudentsManager\Model\Entity\Student[] newEntities(array $data, array $options = [])
 * @method \StudentsManager\Model\Entity\Student|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \StudentsManager\Model\Entity\Student patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \StudentsManager\Model\Entity\Student[] patchEntities($entities, array $data, array $options = [])
 * @method \StudentsManager\Model\Entity\Student findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
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

        $this->setTable('students');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Sessions', [
            'foreignKey' => 'session_id',
            'joinType' => 'INNER',
            'className' => 'StudentsManager.Sessions'
        ]);
        $this->belongsTo('Classes', [
            'foreignKey' => 'class_id',
            'joinType' => 'INNER',
            'className' => 'StudentsManager.Classes'
        ]);
        $this->belongsTo('ClassDemarcations', [
            'foreignKey' => 'class_demarcation_id',
            'className' => 'StudentsManager.ClassDemarcations'
        ]);

        $this->belongsTo('SessionAdmitted', [
            'className' => 'App.Sessions',
            'foreignKey' => 'session_admitted_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('SessionGraduated',[
            'className' => 'App.Sessions',
            'foreignKey' => 'graduated_session_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('States',[
            'className' => 'States',
            'foreignKey' => 'state_id',
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
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->date('date_of_birth')
            ->requirePresence('date_of_birth', 'create')
            ->notEmpty('date_of_birth');

        $validator
            ->requirePresence('gender', 'create')
            ->notEmpty('gender');

        $validator
            ->allowEmpty('state_of_origin');

        $validator
            ->requirePresence('religion', 'create')
            ->notEmpty('religion');

        $validator
            ->requirePresence('home_residence', 'create')
            ->notEmpty('home_residence');

        $validator
            ->allowEmpty('guardian');

        $validator
            ->allowEmpty('relationship_to_guardian');

        $validator
            ->allowEmpty('occupation_of_guardian');

        $validator
            ->allowEmpty('guardian_phone_number');

        $validator
            ->allowEmpty('photo');

        $validator
            ->allowEmpty('photo_dir');

        $validator
            ->integer('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->integer('graduated')
            ->allowEmpty('graduated');

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
        $rules->add($rules->existsIn(['session_id'], 'Sessions'));
        $rules->add($rules->existsIn(['class_id'], 'Classes'));
        //$rules->add($rules->existsIn(['class_demarcation_id'], 'ClassDemarcations'));
        //$rules->add($rules->existsIn(['state_id'], 'States'));

        return $rules;
    }

    public function beforeSave(Event $event, Entity $entity ) {
        if ($entity->isNew()) {
            if ( empty($entity->session_admitted_id ))
                $entity->session_admitted_id = $entity->session_id ;
        }
        return true;
    }

    public function findGraduatedStudents()
    {
        return $this->find('all')
            ->where(['graduated' => 1])
            ->contain(['Sessions','SessionGraduated'])
            ->orderDesc('graduated_session_id');
    }

    public function findUnActiveStudents()
    {
        return $this->find('all')
            ->where(['status' => 0])
            ->contain(['Sessions','ClassDemarcations']);
        //->orderAsc('class_id');
    }

    /***
     * @param Event $event
     * @param $data
     * The function is fired by the cakephp system automatically before a
     * request data is converted to entities
     */
    public function beforeMarshal(Event $event, $data )
    {
        if ( !empty($data['date_of_birth'] )) {
            $data['date_of_birth'] = new Date($data['date_of_birth']); // Converts the birth date Date properly
        }
    }

    public function deactivateStudent(Student $student )
    {
        $student->status = 0;
        if ($this->save($student)) {
            return true;
        }
        return false;
    }

    public function activateStudent(Student $student)
    {
        $student->status = 1;
        if ($this->save($student)) {
            return true;
        }
        return false;
    }
}
