<?php
namespace ResultSystem\Model\Table;

use Cake\Event\Event;
use Cake\Log\Log;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use ResultSystem\Model\Entity\GradeableTrait;

/**
 * StudentTermlyResults Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Students
 * @property \Cake\ORM\Association\BelongsTo $Subjects
 * @property \Cake\ORM\Association\BelongsTo $Classes
 * @property \Cake\ORM\Association\BelongsTo $Terms
 * @property \Cake\ORM\Association\BelongsTo $Sessions
 *
 * @method \ResultSystem\Model\Entity\StudentTermlyResult get($primaryKey, $options = [])
 * @method \ResultSystem\Model\Entity\StudentTermlyResult newEntity($data = null, array $options = [])
 * @method \ResultSystem\Model\Entity\StudentTermlyResult[] newEntities(array $data, array $options = [])
 * @method \ResultSystem\Model\Entity\StudentTermlyResult|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \ResultSystem\Model\Entity\StudentTermlyResult patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \ResultSystem\Model\Entity\StudentTermlyResult[] patchEntities($entities, array $data, array $options = [])
 * @method \ResultSystem\Model\Entity\StudentTermlyResult findOrCreate($search, callable $callback = null)
 */
class StudentTermlyResultsTable extends Table
{
    use GradeableTrait;

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('student_termly_results');
        $this->displayField('id');
        $this->primaryKey(['student_id','subject_id','term_id','class_id','session_id']);

        $this->belongsTo('Students', [
            'className' => 'ResultSystem.Students',
            'foreignKey' => 'student_id',
            'joinType' => 'INNER',
        ]);

        $this->belongsTo('Subjects', [
            'foreignKey' => 'subject_id',
            'joinType' => 'INNER',
            'className' => 'ResultSystem.Subjects'
        ]);
        $this->belongsTo('Classes', [
            'foreignKey' => 'class_id',
            'joinType' => 'INNER',
            'className' => 'App.Classes'
        ]);
        $this->belongsTo('Terms', [
            'foreignKey' => 'term_id',
            'joinType' => 'INNER',
            'className' => 'ResultSystem.Terms'
        ]);
        $this->belongsTo('Sessions', [
            'foreignKey' => 'session_id',
            'joinType' => 'INNER',
            'className' => 'App.Sessions'
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
            ->allowEmpty('first_test');

        $validator
            ->allowEmpty('second_test');

        $validator
            ->allowEmpty('third_test');

        $validator
            ->allowEmpty('exam');

        $validator
            ->allowEmpty('total');

        $validator
            ->allowEmpty('grade');

        $validator
            ->allowEmpty('remark');

        $validator
            ->allowEmpty('principal_comment');

        $validator
            ->allowEmpty('head_teacher_comment');

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
        $rules->add($rules->existsIn(['subject_id'], 'Subjects'));
        $rules->add($rules->existsIn(['class_id'], 'Classes'));
        $rules->add($rules->existsIn(['term_id'], 'Terms'));
        $rules->add($rules->existsIn(['session_id'], 'Sessions'));

        return $rules;
    }

    public function beforeSave(Event $event , Entity $entity )
    {
            $entity->total = $entity->first_test + $entity->second_test + $entity->third_test + $entity->exam ;

            // loads the grade and remark table
            $resultGradingTable = TableRegistry::get('GradingSystem.ResultGradingSystems');

            // gets the grade from the table
            $resultGradingTableQuery = $resultGradingTable->find('all');

            $grades = $resultGradingTableQuery->combine('score','grade')->toArray();

            // calculates the grade
            $entity->grade = $this->calculateGrade($entity->total,$grades);

            // gets the remark from the table.
            $remarks = $resultGradingTableQuery->combine('grade','remark')->toArray();

            // create the remark property
            $entity->remark = $remarks[$entity->grade];

    }

    /**
     * @param Event $event
     * @param Entity $entity
     */
    public function afterSave(Event $event , Entity $entity)
    {
            // upload the result to the annual result table
            $studentAnnualResultTable = TableRegistry::get('StudentAnnualResults');

            $studentAnnualResult = $studentAnnualResultTable->find('all')
                ->where(['student_id' => $event->data['entity']['student_id'],
                        'subject_id' => $event->data['entity']['subject_id'],
                        'class_id' => $event->data['entity']['class_id'],
                        'session_id' => $event->data['entity']['session_id']
                ])->first();

            if ( $studentAnnualResult == null ) {

                $studentAnnualResult = $studentAnnualResultTable->newEntity([
                    'student_id' => $entity->student_id,
                    'subject_id' => $entity->subject_id,
                    'class_id'   => $entity->class_id,
                    'session_id' => $entity->session_id
                ]);

                switch ( $event->data['entity']['term_id'] ) {
                    case 1:
                        $studentAnnualResult['first_term'] = $event->data['entity']['total'];
                        break;
                    case 2 :
                        $studentAnnualResult['second_term'] = $event->data['entity']['total'];
                        break;
                    case 3 :
                        $studentAnnualResult['third_term'] = $event->data['entity']['total'];
                        break;
                }
            } else {

                switch ( $event->data['entity']['term_id'] ) {
                    case 1:
                        $studentAnnualResult['first_term'] = $event->data['entity']['total'];
                        break;
                    case 2 :
                        $studentAnnualResult['second_term'] = $event->data['entity']['total'];
                        break;
                    case 3 :
                        $studentAnnualResult['third_term'] = $event->data['entity']['total'];
                        break;
                }

                $newData = [
                    'student_id' => $entity->student_id,
                    'subject_id' => $entity->subject_id,
                    'class_id'   => $entity->class_id,
                    'session_id' => $entity->session_id
                ];

                $studentAnnualResult = $studentAnnualResultTable->patchEntity($studentAnnualResult,$newData);
            }

            $studentAnnualResultTable->save($studentAnnualResult);
            //Log::debug($studentAnnualResult);
    }

    /**
     * @param $results
     * @param array $data
     * @return array|bool
     * saveResult function saves the student results in the database.
     * it checks the status of each uploaded student result , if $this->save();
     * returns false the current() student_id is add to the $data['error'] array
     * then,before  moving to the next() student in the array .
     */
    public function saveResult($results, &$data = [])
    {
        if (is_array($results)) {
            for ($num = 0; $num < count($results); $num++) {

                if (!$this->save(current($results)) ) {
                    $currentPosition = current($results);
                    $data['error'][] = $currentPosition['student_id'];
                }
                next($results);
            }
            return $data;
        }
    }

    public function beforeMarshal(Event $event, $data)
    {

    }
}
