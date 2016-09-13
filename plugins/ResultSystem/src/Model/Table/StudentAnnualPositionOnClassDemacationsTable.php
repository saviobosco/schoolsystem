<?php
namespace ResultSystem\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StudentAnnualPositionOnClassDemacations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Students
 * @property \Cake\ORM\Association\BelongsTo $Classes
 * @property \Cake\ORM\Association\BelongsTo $ClassDemacations
 * @property \Cake\ORM\Association\BelongsTo $Sessions
 *
 * @method \ResultSystem\Model\Entity\StudentAnnualPositionOnClassDemacation get($primaryKey, $options = [])
 * @method \ResultSystem\Model\Entity\StudentAnnualPositionOnClassDemacation newEntity($data = null, array $options = [])
 * @method \ResultSystem\Model\Entity\StudentAnnualPositionOnClassDemacation[] newEntities(array $data, array $options = [])
 * @method \ResultSystem\Model\Entity\StudentAnnualPositionOnClassDemacation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \ResultSystem\Model\Entity\StudentAnnualPositionOnClassDemacation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \ResultSystem\Model\Entity\StudentAnnualPositionOnClassDemacation[] patchEntities($entities, array $data, array $options = [])
 * @method \ResultSystem\Model\Entity\StudentAnnualPositionOnClassDemacation findOrCreate($search, callable $callback = null)
 */
class StudentAnnualPositionOnClassDemacationsTable extends Table
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

        $this->table('student_annual_position_on_class_demacations');
        $this->displayField('id');
        $this->primaryKey(['student_id','class_id','class_demacation_id','session_id']);

        $this->belongsTo('Students', [
            'foreignKey' => 'student_id',
            'joinType' => 'INNER',
            'className' => 'ResultSystem.Students'
        ]);
        $this->belongsTo('Classes', [
            'foreignKey' => 'class_id',
            'joinType' => 'INNER',
            'className' => 'ResultSystem.Classes'
        ]);
        $this->belongsTo('ClassDemacations', [
            'foreignKey' => 'class_demacation_id',
            'joinType' => 'INNER',
            'className' => 'ResultSystem.ClassDemacations'
        ]);

        $this->belongsTo('Sessions', [
            'foreignKey' => 'session_id',
            'joinType' => 'INNER',
            'className' => 'ResultSystem.Sessions'
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
            ->integer('total')
            ->requirePresence('total', 'create')
            ->notEmpty('total');

        $validator
            ->integer('average')
            ->requirePresence('average', 'create')
            ->notEmpty('average');

        $validator
            ->integer('position')
            ->requirePresence('position', 'create')
            ->notEmpty('position');

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
        $rules->add($rules->existsIn(['class_id'], 'Classes'));
        $rules->add($rules->existsIn(['class_demacation_id'], 'ClassDemacations'));
        $rules->add($rules->existsIn(['session_id'], 'Sessions'));

        return $rules;
    }
}
