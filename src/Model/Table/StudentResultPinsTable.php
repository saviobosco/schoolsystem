<?php
namespace App\Model\Table;

use App\Model\Entity\StudentResultPin;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StudentResultPins Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Students
 * @property \Cake\ORM\Association\BelongsTo $Sessions
 * @property \Cake\ORM\Association\BelongsTo $Semesters
 */
class StudentResultPinsTable extends Table
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

        $this->table('student_result_pins');
        $this->displayField('id');
        $this->primaryKey('pin');

        $this->belongsTo('Students', [
            'foreignKey' => 'student_id'
        ]);
        $this->belongsTo('Levels', [
            'foreignKey' => 'level_id'
        ]);
        $this->belongsTo('Semesters', [
            'foreignKey' => 'semester_id'
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
            ->requirePresence('serial_number', 'create')
            ->notEmpty('serial_number');

        $validator
            ->integer('pin')
            ->requirePresence('pin', 'create')
            ->notEmpty('pin');

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
        $rules->add($rules->existsIn(['level_id'], 'Levels'));
        $rules->add($rules->existsIn(['semester_id'], 'Semesters'));
        return $rules;
    }

    public function checkPin($pin)
    {
        return $this->find()->where(['pin'=>$pin])->first();
    }

    public function savePin($serial_number,$pin){
        $saved = $this->newEntity();
        $saved->serial_number = $serial_number;
        $saved->pin = $pin;
        if($this->save($saved)){
            return true;
        }
        return false;
    }

    public function updateStudentPin($pin,$student_id,$school_id,$level_id,$semester_id)
    {
        $pinresult = $this->get($pin);
        $newData = ['student_id'=>$student_id,
                    'school_id' => $school_id,
                    'level_id' => $level_id,
                    'semester_id' => $semester_id];
        $result = $this->patchEntity($pinresult,$newData);
        if($this->save($result)){
            return true;
        }
        return false;
    }
}
