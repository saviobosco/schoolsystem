<?php
namespace App\Model\Table;

use App\Model\Entity\ApplicationsSubmitted;
use Cake\Event\Event;
use Cake\Network\Request;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;

/**
 * ApplicationsSubmitted Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Schools
 */
class ApplicationsSubmittedTable extends Table
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

        $this->table('applications_submitted');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Schools', [
            'foreignKey' => 'school_id',
            'joinType' => 'INNER'
        ]);

        $this->hasOne('EntranceResults',[
            'className' => 'ApplicantsEntranceResults',
            'foreignKey' => 'Applicant_id',
            'bindingKey' => 'id',
            'propertyName' => 'entrance_result'
        ]);

        $this->hasOne('InterviewResults',[
            'className' => 'ApplicantsInterviewResults',
            'foreignKey' => 'Applicant_id',
            'bindingKey' => 'id',
            'propertyName' => 'interview_result'
        ]);

        $this->hasMany('EntrancePins',[
            'className' => 'EntranceResultPins',
            'foreignKey' => 'Applicant_id',
            'bindingKey' => 'id'
        ]);

        $this->hasMany('InterviewPins',[
            'className' => 'InterviewResultPins',
            'foreignKey' => 'Applicant_id',
            'bindingKey' => 'id'
        ]);

        $this->addBehavior('Josegonzalez/Upload.Upload',[
            'photo' => [
                'path' => 'webroot{DS}img{DS}photos{DS}',
                'fields'=>[
                    'dir' => '/img/photos/'
                ]
            ],
            /*'file_upload_1' => [
                'path' => 'webroot{DS}img{DS}files{DS}',
                'fields'=>[
                ]
            ],
            'file_upload_2' => [
                'path' => 'webroot{DS}img{DS}files{DS}',
                'fields'=>[
                ]
            ],
            'file_upload_3' => [
                'path' => 'webroot{DS}img{DS}files{DS}',
                'fields'=>[
                ]
            ],
            'file_upload_4' => [
                'path' => 'webroot{DS}img{DS}files{DS}',
                'fields'=>[
                ],
            ],*/
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
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->requirePresence('fullname', 'create')
            ->notEmpty('fullname');

        /*$validator
            ->requirePresence('maiden_name', 'create')
            ->notEmpty('maiden_name');

        $validator
            ->requirePresence('sex', 'create')
            ->notEmpty('sex');

        $validator
            ->requirePresence('marital_status', 'create')
            ->notEmpty('marital_status');

        $validator
            ->requirePresence('religion', 'create')
            ->notEmpty('religion');

        $validator
            ->requirePresence('place_of_birth', 'create')
            ->notEmpty('place_of_birth');

        $validator
            ->requirePresence('state_of_origin', 'create')
            ->notEmpty('state_of_origin');

        $validator
            ->requirePresence('l_g_a', 'create')
            ->notEmpty('l_g_a');

        $validator
            ->requirePresence('nationality', 'create')
            ->notEmpty('nationality');

        $validator
            ->requirePresence('postal_address', 'create')
            ->notEmpty('postal_address');

        $validator
            ->requirePresence('permanent_home_address', 'create')
            ->notEmpty('permanent_home_address');

        $validator
            ->requirePresence('next_of_kin', 'create')
            ->notEmpty('next_of_kin');

        $validator
            ->requirePresence('address_of_next_of_kin', 'create')
            ->notEmpty('address_of_next_of_kin');

        $validator
            ->requirePresence('relationship_to_next_of_kin', 'create')
            ->notEmpty('relationship_to_next_of_kin');

        $validator
            ->requirePresence('phone_number', 'create')
            ->notEmpty('phone_number');


        $validator
            ->allowEmpty('file_upload_1');

        $validator
            ->allowEmpty('file_upload_2');

        $validator
            ->allowEmpty('file_upload_3');

        $validator
            ->allowEmpty('file_upload_4');

        $validator
            ->requirePresence('sponsor', 'create')
            ->notEmpty('sponsor');

        $validator
            ->requirePresence('occupation_of_sponsor', 'create')
            ->notEmpty('occupation_of_sponsor');

        $validator
            ->requirePresence('name_of_sponsor', 'create')
            ->notEmpty('name_of_sponsor'); */

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

    public function beforeSave( Event $event , Entity $entity , $options )
    {
        if($entity->isNew()){
            //$entity->id = $this->generateRegNumber($this->query());
            $entity->session = date('Y');
        }
    }

    public function generateRegNumber(Query $query)
    {
        $year = date('Y');
        $query->find('all')->execute();
        $id =  $query->count()+1 ;
        return 'UGC'.'/'.$year.'/'.$this->determinePreceedingZeros($id).$id ;
    }

    /**
     * @param $count
     * @return string
     */
    public function determinePreceedingZeros($count)
    {
        if($count <= 9){
            return '00';
        }elseif($count >= 10 && $count <= 99){
            return '0';
        }elseif($count > 99){
            return'';
        }
    }


    public function getUser($id)
    {
        $applicant = TableRegistry::get('Applicants');
        return $applicant->get($id);
    }

    public function getEntranceResult($id)
    {
        return $this->get($id,['fields'=>['id','fullname','photo','school_id'],'contain'=>['EntranceResults'=>['fields'=>['applicant_id','total','grade']]]]);
    }

    public function getInterviewResult($id)
    {
        return $this->get($id,['fields'=>['id','fullname','photo','school_id'],'contain'=>['InterviewResults'=>['fields'=>['applicant_id','total','grade']]]]);
    }

    public function deletePin($id){
        $Pintable = TableRegistry::get('ApplicantsPins');
        $pin = $Pintable->get($id);
        if ($Pintable->delete($pin)) {
            return true;
        }
        return false;
    }

    public function offerAdmission($id)
    {
        $applicant = $this->get($id);
        $newData = ['admission_status' => 1];
        $applicant = $this->patchEntity($applicant,$newData);
        if($this->save($applicant)){
            return true;
        }
        return false;
    }

    public function checkAdmissionStatus($id)
    {
        $status = $this->find('all')->where(['id'=>$id])->first();
        return $status;
    }
}
