<?php
namespace ResultSystem\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Students Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Sessions
 * @property \Cake\ORM\Association\BelongsTo $Classes
 * @property \Cake\ORM\Association\BelongsTo $ClassDemacations
 * @property \Cake\ORM\Association\HasMany $StudentAnnualPositionOnClassDemacations
 * @property \Cake\ORM\Association\HasMany $StudentAnnualPositions
 * @property \Cake\ORM\Association\HasMany $StudentAnnualResults
 * @property \Cake\ORM\Association\HasMany $StudentAnnualSubjectPositionOnClassDemacations
 * @property \Cake\ORM\Association\HasMany $StudentAnnualSubjectPositions
 * @property \Cake\ORM\Association\HasMany $StudentTermlyPositionOnClassDemacations
 * @property \Cake\ORM\Association\HasMany $StudentTermlyPositions
 * @property \Cake\ORM\Association\HasMany $StudentTermlyResults
 * @property \Cake\ORM\Association\HasMany $StudentTermlySubjectPositionOnClassDemacations
 * @property \Cake\ORM\Association\HasMany $StudentTermlySubjectPositions
 *
 * @method \ResultSystem\Model\Entity\Student get($primaryKey, $options = [])
 * @method \ResultSystem\Model\Entity\Student newEntity($data = null, array $options = [])
 * @method \ResultSystem\Model\Entity\Student[] newEntities(array $data, array $options = [])
 * @method \ResultSystem\Model\Entity\Student|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \ResultSystem\Model\Entity\Student patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \ResultSystem\Model\Entity\Student[] patchEntities($entities, array $data, array $options = [])
 * @method \ResultSystem\Model\Entity\Student findOrCreate($search, callable $callback = null)
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

        $this->table('students');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Sessions', [
            'foreignKey' => 'session_id',
            'joinType' => 'INNER',
            'className' => 'App.Sessions'
        ]);
        $this->belongsTo('Classes', [
            'foreignKey' => 'class_id',
            'joinType' => 'INNER',
            'className' => 'App.Classes'
        ]);
        $this->belongsTo('ClassDemacations', [
            'foreignKey' => 'class_demacation_id',
            'joinType' => 'INNER',
            'className' => 'ResultSystem.ClassDemacations'
        ]);
        $this->hasMany('StudentAnnualPositionOnClassDemacations', [
            'foreignKey' => 'student_id',
            'className' => 'ResultSystem.StudentAnnualPositionOnClassDemacations'
        ]);
        $this->hasMany('StudentAnnualPositions', [
            'foreignKey' => 'student_id',
            'className' => 'ResultSystem.StudentAnnualPositions'
        ]);
        $this->hasMany('StudentAnnualResults', [
            'foreignKey' => 'student_id',
            'className' => 'ResultSystem.StudentAnnualResults'
        ]);
        $this->hasMany('StudentAnnualSubjectPositionOnClassDemacations', [
            'foreignKey' => 'student_id',
            'className' => 'ResultSystem.StudentAnnualSubjectPositionOnClassDemacations'
        ]);
        $this->hasMany('StudentAnnualSubjectPositions', [
            'foreignKey' => 'student_id',
            'className' => 'ResultSystem.StudentAnnualSubjectPositions'
        ]);
        $this->hasMany('StudentTermlyPositionOnClassDemacations', [
            'foreignKey' => 'student_id',
            'className' => 'ResultSystem.StudentTermlyPositionOnClassDemacations'
        ]);
        $this->hasMany('StudentTermlyPositions', [
            'foreignKey' => 'student_id',
            'className' => 'ResultSystem.StudentTermlyPositions'
        ]);
        $this->hasMany('StudentTermlyResults', [
            'foreignKey' => 'student_id',
            'className' => 'ResultSystem.StudentTermlyResults'
        ]);
        $this->hasMany('StudentTermlySubjectPositionOnClassDemacations', [
            'foreignKey' => 'student_id',
            'className' => 'ResultSystem.StudentTermlySubjectPositionOnClassDemacations'
        ]);
        $this->hasMany('StudentTermlySubjectPositions', [
            'foreignKey' => 'student_id',
            'className' => 'ResultSystem.StudentTermlySubjectPositions'
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
            ->requirePresence('state_of_origin', 'create')
            ->notEmpty('state_of_origin');

        $validator
            ->requirePresence('religion', 'create')
            ->notEmpty('religion');

        $validator
            ->requirePresence('home_residence', 'create')
            ->notEmpty('home_residence');

        $validator
            ->requirePresence('gaurdian', 'create')
            ->notEmpty('gaurdian');

        $validator
            ->requirePresence('relationship_to_gaurdian', 'create')
            ->notEmpty('relationship_to_gaurdian');

        $validator
            ->requirePresence('occupation_of_gaurdian', 'create')
            ->notEmpty('occupation_of_gaurdian');

        $validator
            ->requirePresence('gaurdian_phone_number', 'create')
            ->notEmpty('gaurdian_phone_number');

        $validator
            ->requirePresence('photo', 'create')
            ->notEmpty('photo');

        $validator
            ->requirePresence('photo_dir', 'create')
            ->notEmpty('photo_dir');

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
        $rules->add($rules->existsIn(['session_id'], 'Sessions'));
        $rules->add($rules->existsIn(['class_id'], 'Classes'));
        $rules->add($rules->existsIn(['class_demacation_id'], 'ClassDemacations'));

        return $rules;
    }
}
