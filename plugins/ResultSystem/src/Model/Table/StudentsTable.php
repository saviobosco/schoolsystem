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
 * @property \Cake\ORM\Association\BelongsTo $ClassDemarcations
 * @property \Cake\ORM\Association\HasMany $StudentAnnualPositionOnClassDemarcations
 * @property \Cake\ORM\Association\HasMany $StudentAnnualPositions
 * @property \Cake\ORM\Association\HasMany $StudentAnnualResults
 * @property \Cake\ORM\Association\HasMany $StudentAnnualSubjectPositionOnClassDemarcations
 * @property \Cake\ORM\Association\HasMany $StudentAnnualSubjectPositions
 * @property \Cake\ORM\Association\HasMany $StudentTermlyPositionOnClassDemarcations
 * @property \Cake\ORM\Association\HasMany $StudentTermlyPositions
 * @property \Cake\ORM\Association\HasMany $StudentTermlyResults
 * @property \Cake\ORM\Association\HasMany $StudentTermlySubjectPositionOnClassDemarcations
 * @property \Cake\ORM\Association\HasMany $StudentTermlySubjectPositions
 * @property \Cake\ORM\Association\HasMany $StudentResultPins
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
        $this->belongsTo('ClassDemarcations', [
            'foreignKey' => 'class_demarcation_id',
            'joinType' => 'INNER',
            'className' => 'App.ClassDemarcations'
        ]);
        $this->hasMany('StudentAnnualPositionOnClassDemarcations', [
            'foreignKey' => 'student_id',
            'className' => 'ResultSystem.StudentAnnualPositionOnClassDemarcations'
        ]);
        $this->hasMany('StudentAnnualPositions', [
            'foreignKey' => 'student_id',
            'className' => 'ResultSystem.StudentAnnualPositions'
        ]);
        $this->hasMany('StudentAnnualResults', [
            'foreignKey' => 'student_id',
            'className' => 'ResultSystem.StudentAnnualResults'
        ]);
        $this->hasMany('StudentAnnualSubjectPositionOnClassDemarcations', [
            'foreignKey' => 'student_id',
            'className' => 'ResultSystem.StudentAnnualSubjectPositionOnClassDemarcations'
        ]);
        $this->hasMany('StudentAnnualSubjectPositions', [
            'foreignKey' => 'student_id',
            'className' => 'ResultSystem.StudentAnnualSubjectPositions'
        ]);
        $this->hasMany('StudentTermlyPositionOnClassDemarcations', [
            'foreignKey' => 'student_id',
            'className' => 'ResultSystem.StudentTermlyPositionOnClassDemarcations'
        ]);
        $this->hasMany('StudentTermlyPositions', [
            'foreignKey' => 'student_id',
            'className' => 'ResultSystem.StudentTermlyPositions'
        ]);
        $this->hasMany('StudentTermlyResults', [
            'foreignKey' => 'student_id',
            'className' => 'ResultSystem.StudentTermlyResults'
        ]);
        $this->hasMany('StudentTermlySubjectPositionOnClassDemarcations', [
            'foreignKey' => 'student_id',
            'className' => 'ResultSystem.StudentTermlySubjectPositionOnClassDemarcations'
        ]);
        $this->hasMany('StudentTermlySubjectPositions', [
            'foreignKey' => 'student_id',
            'className' => 'ResultSystem.StudentTermlySubjectPositions'
        ]);

        $this->hasMany('StudentResultPins',[
            'className' => 'ResultSystem.StudentResultPins',
            'foreignKey' => 'student_id'
        ]);

        $this->hasMany('StudentGeneralRemarks',[
            'className' => 'ResultSystem.StudentGeneralRemarks',
            'foreignKey' => 'student_id',
            'joinType'  => 'INNER'
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
        $rules->add($rules->existsIn(['class_demarcation_id'], 'ClassDemarcations'));

        return $rules;
    }
}
