<?php
namespace App\Model\Table;

use App\Model\Entity\ApplicantsPin;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ApplicantsPins Model
 *
 */
class ApplicantsPinsTable extends Table
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

        $this->table('applicants_pins');
        $this->displayField('pin');
        $this->primaryKey('serial_number');
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
            ->allowEmpty('pin', 'create');


        return $validator;
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
}
