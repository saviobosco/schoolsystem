<?php
namespace App\Model\Table;

use App\Model\Entity\Applicant;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Applicants Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Schools
 * @property \Cake\ORM\Association\HasMany $ApplicantsInterviewResults
 * @property \Cake\ORM\Association\HasMany $ApplicantsPins
 */
class ApplicantsTable extends Table
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

        $this->table('applicants');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Schools', [
            'foreignKey' => 'school_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('ApplicantsInterviewResults', [
            'foreignKey' => 'applicant_id'
        ]);
        $this->hasMany('ApplicantsPins', [
            'foreignKey' => 'applicant_id'
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
        $validator->provider('upload', \Josegonzalez\Upload\Validation\DefaultValidation::class);

        $validator
            ->allowEmpty('id', 'create');

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
        return $rules;
    }

    public function checkpin($pin)
    {
        return $this->ApplicantsPins->find()->where(['pin'=>$pin])->first();
    }
}
