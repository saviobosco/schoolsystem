<?php
namespace App\Model\Table;

use App\Model\Entity\EntranceResultPin;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * EntranceResultPins Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Applicants
 */
class EntranceResultPinsTable extends Table
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

        $this->table('entrance_result_pins');
        $this->displayField('id');
        $this->primaryKey('pin');

        $this->belongsTo('Applicants', [
            'className' => 'ApplicationsSubmitted',
            'foreignKey' => 'applicant_id',
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
        $rules->add($rules->existsIn(['applicant_id'], 'Applicants'));
        return $rules;
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

    public function checkPin($pin)
    {
        return $this->find()->where(['pin'=>$pin])->first();
    }


    public function updateStudentPin($pin,$applicant_id,$exam_type)
    {
        $pinresult = $this->get($pin);
        $newData = ['applicant_id'=>$applicant_id,'exam_type'=>$exam_type];
        $result = $this->patchEntity($pinresult,$newData);
        
        if($this->save($result)){
            return true;
        }
        return false;
    }
}
