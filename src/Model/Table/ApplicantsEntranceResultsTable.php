<?php
namespace App\Model\Table;

use App\Model\Entity\ApplicantsEntranceResult;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * ApplicantsEntranceResults Model
 *
 * @property \Cake\ORM\Association\BelongsTo $ApplicationSubmitteds
 */
class ApplicantsEntranceResultsTable extends Table
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

        $this->table('applicants_entrance_results');
        $this->displayField('id');
        $this->primaryKey('applicant_id');

        $this->belongsTo('ApplicationsSubmitted', [
            'foreignKey' => 'applicant_id',
            'joinType' => 'INNER'
        ]);

        $this->hasMany('ResultFiles');
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
            //->integer('total')
            ->requirePresence('total', 'create')
            ->notEmpty('total');

        $validator
            ->requirePresence('grade', 'create')
            ->notEmpty('grade');

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
        $rules->add($rules->existsIn(['applicant_id'], 'ApplicationsSubmitted'));
        return $rules;
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
