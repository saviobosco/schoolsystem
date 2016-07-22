<?php
namespace App\Model\Table;

use App\Model\Entity\ApplicantsFileUpload;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ApplicantsFileUploads Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Applicants
 */
class ApplicantsFileUploadsTable extends Table
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

        $this->table('applicants_file_uploads');
        $this->displayField('applicant_id');
        $this->primaryKey('applicant_id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Applicants', [
            'className' => 'ApplicationsSubmitted',
            'foreignKey' => 'applicant_id',
            'joinType' => 'INNER',
            'dependent' => true
        ]);

        $this->addBehavior('Josegonzalez/Upload.Upload',[
            'file' => [
                'path' => 'webroot{DS}img{DS}files{DS}',
                'fields'=>[
                    'dir' => 'dir'
                ],
                'keepFilesOnDelete'=>false
            ]
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
            ->allowEmpty('file');

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
}
