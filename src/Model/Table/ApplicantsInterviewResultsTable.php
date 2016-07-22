<?php
namespace App\Model\Table;

use App\Model\Entity\ApplicantsInterviewResult;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ApplicantsInterviewResults Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Applicants
 */
class ApplicantsInterviewResultsTable extends Table
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

        $this->table('applicants_interview_results');
        $this->displayField('id');
        $this->primaryKey('applicant_id');

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
        $rules->add($rules->existsIn(['applicant_id'], 'Applicants'));
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
