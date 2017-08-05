<?php
namespace ResultSystem\Controller;

use Cake\Collection\Collection;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\ORM\TableRegistry;
use ResultSystem\Controller\Traits\SearchParameterTrait;
use ResultSystem\Controller\AppController;
use ResultSystem\Model\Entity\StudentResultPin;

/**
 * Students Controller
 *
 * @property \ResultSystem\Model\Table\StudentsTable $Students
 * @property \ResultSystem\Model\Table\StudentResultPinsTable $StudentResultPins
 * @property \ResultSystem\Model\Table\TermsTable $Terms
 * @property \App\Model\Table\SessionsTable $Sessions
 * @property \App\Model\Table\ClassesTable $Classes
 * @property \App\Model\Table\SubjectsTable $Subjects
 */
class StudentsController extends AppController
{
    use SearchParameterTrait ;
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        if ( empty($this->request->query['class_id'])) {
            $this->paginate = [
                'limit' => 50,
                'contain' => ['Sessions', 'Classes',],
                'conditions' => [
                    'Students.status'   => 1,
                    'Students.graduated'   => 0
                ],
                // Place the result in ascending order according to the class.
                'order' => [
                    'class_id' => 'asc'
                ]
            ];
        }
        else {
            $this->paginate = [
                'limit' => 50,
                'contain' => ['Sessions', 'Classes'],
                'conditions' => [
                    'Students.status'   => 1,
                    'Students.graduated'   => 0,
                    'Students.class_id' => $this->_getDefaultValue($this->request->query['class_id'],1)
                ]
            ];
        }
        $students = $this->paginate($this->Students);

        $sessions = $this->Students->Sessions->find('list',['limit' => 200]);
        $classes = $this->Students->Classes->find('list',['limit' => 200]);
        $this->set(compact('students','classes','sessions'));
        $this->set('_serialize', ['students']);
    }

    /**
     * View method
     *
     * @param string|null $id Student id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        try {
            if (  isset($this->request->query['term_id']) && $this->request->query['term_id'] == 4 ) {

                $student = $this->Students->get($id, [
                    'contain' => ['Sessions',
                        'Classes',
                        /*'StudentAnnualPositionOnClassDemarcations',
                        'StudentAnnualPositions',*/
                        'StudentAnnualResults' => [
                            'conditions' => [
                                'StudentAnnualResults.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                                'StudentAnnualResults.class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1)
                            ]
                        ],
                        /*'StudentAnnualSubjectPositionOnClassDemarcations',
                        'StudentAnnualSubjectPositions',*/
                    ]
                ]);

                // get student annual position
                $studentPosition = $this->Students->StudentAnnualPositions->find('all')
                    ->where(['student_id' => $student->id,
                        'session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                        'class_id'   => @$this->_getDefaultValue($this->request->query['class_id'],1),
                    ])->first();

                // get student annual subject positions
                $studentAnnualSubjectPositions = $this->Students->StudentAnnualSubjectPositions->find('all')
                    ->where(['student_id' => $student->id,
                        'session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                        'class_id'   => @$this->_getDefaultValue($this->request->query['class_id'],1),
                    ])->combine('subject_id','position')->toArray();

                $sessions = $this->Students->Sessions->find('list',['limit' => 200])->toArray();
                $classes = $this->Students->Classes->find('list',['limit' => 200])->toArray();

                // loads additional table classes ..
                $this->loadModel('App.Subjects');
                $this->loadModel('Terms');

                $subjects = $this->Subjects->find('list',['limit'=> 200])->toArray();
                $terms = $this->Terms->find('list',['limit'=> 200])->toArray();
                $this->set(compact('student','sessions','classes','subjects','terms','studentAnnualSubjectPositions','studentPosition'));
                $this->set('_serialize', ['student']);

                $this->render('view_annual_result');

            } else {

                $student = $this->Students->get($id, [
                    'contain' => [
                        'Sessions',
                        'Classes',
                        /*'StudentTermlyPositionOnClassDemarcations',*/
                        'StudentTermlyResults' => [
                            'conditions' => [
                                'StudentTermlyResults.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                                'StudentTermlyResults.class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1),
                                'StudentTermlyResults.term_id' => @$this->_getDefaultValue($this->request->query['term_id'],1)
                            ]
                        ],
                    ]
                ]);
                // get the student position
                $studentPosition = $this->Students->StudentTermlyPositions->find('all')
                    ->where(['student_id' => $student->id,
                        'session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                        'class_id'   => @$this->_getDefaultValue($this->request->query['class_id'],1),
                        'term_id'    => @$this->_getDefaultValue($this->request->query['term_id'],1)
                    ])->first();

                // gets the student subject positions
                $studentSubjectPositions = $this->Students->StudentTermlySubjectPositions->find('all')
                    ->where(['student_id' => $student->id,
                        'session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                        'class_id'   => @$this->_getDefaultValue($this->request->query['class_id'],1),
                        'term_id'    => @$this->_getDefaultValue($this->request->query['term_id'],1)
                    ])->combine('subject_id','position')->toArray();

                // get the student subjects positions on class demarcation
                $studentSubjectPositionsOnClassDemarcation =  $this->Students->StudentTermlySubjectPositionOnClassDemarcations->find('all')
                    ->where(['student_id' => $student->id,
                        'class_demarcation_id' => $student->class_demarcation_id,
                        'session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                        'class_id'   => @$this->_getDefaultValue($this->request->query['class_id'],1),
                        'term_id'    => @$this->_getDefaultValue($this->request->query['term_id'],1)
                    ])->combine('subject_id','position')->toArray();

                $sessions = $this->Students->Sessions->find('list',['limit' => 200])->toArray();
                $classes = $this->Students->Classes->find('list',['limit' => 200])->toArray();

                // loads additional table classes ..
                $this->loadModel('App.Subjects');
                $this->loadModel('Terms');

                $subjects = $this->Subjects->find('list',['limit'=> 200])->toArray();
                $terms = $this->Terms->find('list',['limit'=> 200])->toArray();
                $this->set(compact('student','sessions','classes','subjects','terms','studentSubjectPositions','studentSubjectPositionsOnClassDemarcation','studentPosition'));
                $this->set('_serialize', ['student']);

                $this->render('view_termly_result');

            }

        } catch (RecordNotFoundException $e ) {
            $this->render('/Element/Error/recordnotfound');
        }
    }

    /**
     * Add method
     * @param string|null $id Student id.
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add( $id = null)
    {
        $student = $this->Students->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $this->Students->patchEntity($student, $this->request->data);

            if ($this->Students->save($student)) {
                $this->Flash->success(__('The student has been saved.'));

            } else {
                $this->Flash->error(__('The student could not be saved. Please, try again.'));
            }
        }
        $sessions = $this->Students->Sessions->find('list', ['limit' => 200])->toArray();
        $classes = $this->Students->Classes->find('list', ['limit' => 200])->toArray();
        $studentBlock = $this->Students->Classes->find()->where(['id'=>$student->class_id])->first();
        $this->loadModel('App.Subjects');
        $subjects = $this->Subjects->find('list')->where(['block_id'=>$studentBlock->id])->toArray();
        $this->loadModel('Terms');
        $terms = $this->Terms->find('list',['limit'=> 3])->toArray();
        $this->set(compact('student', 'sessions', 'classes','subjects','terms'));
        $this->set('_serialize', ['student']);
        $this->render('add_termly_result');
    }

    /**
     * Edit method
     *
     * @param string|null $id Student id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => [
                'Classes',
                'StudentTermlyResults' => [
                    'conditions' => [
                    'StudentTermlyResults.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                    'StudentTermlyResults.class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1),
                    'StudentTermlyResults.term_id' => @$this->_getDefaultValue($this->request->query['term_id'],1)
                    ],
                ],
                'StudentGeneralRemarks' => [
                    'conditions' => [
                        'StudentGeneralRemarks.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                        'StudentGeneralRemarks.class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1),
                        'StudentGeneralRemarks.term_id' => @$this->_getDefaultValue($this->request->query['term_id'],1)
                    ]
                ]
            ]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $this->Students->patchEntity($student, $this->request->data);

            if ($this->Students->save($student)) {
                $this->Flash->success(__('The student has been saved.'));

            } else {
                $this->Flash->error(__('The student could not be saved. Please, try again.'));
            }
        }
        $sessions = $this->Students->Sessions->find('list', ['limit' => 200])->toArray();
        $classes = $this->Students->Classes->find('list', ['limit' => 200])->toArray();
        $this->loadModel('App.Subjects');
        $subjects = $this->Subjects->find('list',['limit'=> 200])->toArray();
        $this->loadModel('Terms');
        $terms = $this->Terms->find('list',['limit'=> 3])->toArray();
        $this->set(compact('student', 'sessions', 'classes', 'classDemacations','subjects','terms'));
        $this->set('_serialize', ['student']);
        $this->render('edit_termly_result');

    }

    /**
     * Delete method
     *
     * @param string|null $id Student id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $student = $this->Students->get($id);
        if ($this->Students->delete($student)) {
            $this->Flash->success(__('The student has been deleted.'));
        } else {
            $this->Flash->error(__('The student could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }



    public function viewStudentResult($id = null )
    {
        if (!$this->request->session()->check('Student')){
            return $this->redirect(['action'=>'checkResult']);
        }

        try {

            // writes the session instance to a variable named session
            $session = $this->request->session();

            if (  isset($this->request->query['term_id']) && $this->request->query['term_id'] == 4 ) {

                $student = $this->Students->get($session->read('Student.id'), [
                    'contain' => [
                        'Sessions',
                        'Classes',
                        //'ClassDemarcations',
                        /*'StudentAnnualPositionOnClassDemarcations',
                        'StudentAnnualPositions',*/
                        'StudentAnnualResults' => [
                            'conditions' => [
                                'StudentAnnualResults.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],$session->read('Student.session_id') ),
                            ]
                        ],
                        /*'StudentAnnualSubjectPositionOnClassDemacations',
                        'StudentAnnualSubjectPositions',*/
                    ]
                ]);
                // get student annual position
                $studentPosition = $this->Students->StudentAnnualPositions->find('all')
                    ->where(['student_id' => $student->id,
                        'session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                    ])->first();

                // get student annual subject positions
                $studentAnnualSubjectPositions = $this->Students->StudentAnnualSubjectPositions->find('all')
                    ->where(['student_id' => $student->id,
                        'session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                    ])->combine('subject_id','position')->toArray();

                $affectiveDispositionTable = TableRegistry::get('SkillsGradingSystem.StudentsAffectiveDispositionScores');
                $psychomotorSkillsTable = TableRegistry::get('SkillsGradingSystem.StudentsPsychomotorSkillScores');

                $studentAffectiveDispositions = $affectiveDispositionTable->find('all')
                    ->where(['student_id' => $student->id,
                        'session_id' => @$this->_getDefaultValue($this->request->query['session_id'],4),
                        'term_id'    => @$this->_getDefaultValue($this->request->query['term_id'],4)
                    ])->contain(['Affectives']);

                $studentPsychomotorSkills = $psychomotorSkillsTable->find('all')
                    ->where(['student_id' => $student->id,
                        'session_id' => @$this->_getDefaultValue($this->request->query['session_id'],4),
                        'term_id'    => @$this->_getDefaultValue($this->request->query['term_id'],4)
                    ])->contain(['Psychomotors']);

                // loads additional table classes ..
                $this->loadModel('App.Subjects');
                $this->loadModel('Terms');

                $sessions = $this->Students->Sessions->find('list',['limit' => 200])->toArray();
                $classes = $this->Students->Classes->find('list',['limit' => 200])->toArray();
                $subjects = $this->Subjects->find('list',['limit'=> 200])->toArray();
                $terms = $this->Terms->find('list',['limit'=> 200])->toArray();
                $searchTerms = $this->Terms->find('list',['limit'=> 2])->where(['id >= '=> 3 ])->toArray();
                $this->set(compact('student','sessions','classes','subjects','terms','searchTerms','studentAnnualSubjectPositions','studentPosition','studentAffectiveDispositions','studentPsychomotorSkills'));
                $this->set('_serialize', ['student']);

                $this->render('view_student_annual_result');

            } else {

                $student = $this->Students->get($session->read('Student.id'), [
                    'contain' => [
                        'Sessions',
                        'Classes',
                        //'ClassDemarcations',
                        /*'StudentTermlyPositionOnClassDemarcations',*/
                        'StudentTermlyResults' => [
                            'conditions' => [
                                'StudentTermlyResults.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],$session->read('Student.session_id')),
                                'StudentTermlyResults.class_id' => @$this->_getDefaultValue($this->request->query['class_id'],$session->read('Student.class_id')),
                                'StudentTermlyResults.term_id' => @$this->_getDefaultValue($this->request->query['term_id'],$session->read('Student.term_id'))
                            ]
                        ],
                    ]
                ]);
                // get the student position
                $studentPosition = $this->Students->StudentTermlyPositions->find('all')
                    ->where(['student_id' => $student->id,
                        'session_id' => @$this->_getDefaultValue($this->request->query['session_id'],$session->read('Student.session_id')),
                        'class_id' => @$this->_getDefaultValue($this->request->query['class_id'],$session->read('Student.class_id')),
                        'term_id'    => @$this->_getDefaultValue($this->request->query['term_id'],$session->read('Student.term_id'))
                    ])->first();

                // gets the student subject positions
                $studentSubjectPositions = $this->Students->StudentTermlySubjectPositions->find('all')
                    ->where(['student_id' => $student->id,
                        'session_id' => @$this->_getDefaultValue($this->request->query['session_id'],$session->read('Student.session_id')),
                        'class_id' => @$this->_getDefaultValue($this->request->query['class_id'],$session->read('Student.class_id')),
                        'term_id'    => @$this->_getDefaultValue($this->request->query['term_id'],$session->read('Student.term_id'))
                    ])->combine('subject_id','position')->toArray();

                // get the student subjects positions on class demarcation
                /*$studentSubjectPositionsOnClassDemarcation =  $this->Students->StudentTermlySubjectPositionOnClassDemarcations->find('all')
                    ->where(['student_id' => $student->id,
                        'class_demarcation_id' => $student->class_demacation_id,
                        'session_id' => @$this->_getDefaultValue($this->request->query['session_id'],$session->read('Student.session_id')),
                        'term_id'    => @$this->_getDefaultValue($this->request->query['term_id'],$session->read('Student.term_id') )
                    ])->combine('subject_id','position')->toArray();

                */



                $affectiveDispositionTable = TableRegistry::get('SkillsGradingSystem.StudentsAffectiveDispositionScores');
                $psychomotorSkillsTable = TableRegistry::get('SkillsGradingSystem.StudentsPsychomotorSkillScores');

                $studentAffectiveDispositions = $affectiveDispositionTable->find('all')
                    ->where(['student_id' => $student->id,
                        'session_id' => @$this->_getDefaultValue($this->request->query['session_id'],$session->read('Student.session_id')),
                        'class_id' => @$this->_getDefaultValue($this->request->query['class_id'],$session->read('Student.class_id')),
                        'term_id'    => @$this->_getDefaultValue($this->request->query['term_id'],$session->read('Student.term_id'))
                    ])->contain(['Affectives']);

                $studentPsychomotorSkills = $psychomotorSkillsTable->find('all')
                    ->where(['student_id' => $student->id,
                        'session_id' => @$this->_getDefaultValue($this->request->query['session_id'],$session->read('Student.session_id')),
                        'class_id' => @$this->_getDefaultValue($this->request->query['class_id'],$session->read('Student.class_id')),
                        'term_id'    => @$this->_getDefaultValue($this->request->query['term_id'],$session->read('Student.term_id'))
                    ])->contain(['Psychomotors']);



                // loads additional table classes ..
                $this->loadModel('App.Subjects');
                $this->loadModel('Terms');

                $sessions = $this->Students->Sessions->find('list',['limit' => 1 ])->where(['id' => $session->read('Student.session_id')])->toArray();
                $subjects = $this->Subjects->find('list',['limit'=> 200])->toArray();
                $terms = $this->Terms->find('list',['limit'=> 4])->toArray();
                $searchTerms = $this->Terms->find('list',['limit'=> 2])->where(['id >= '=> 3 ])->toArray();
                $this->set(compact('student',
                    'sessions',
                    'classes',
                    'subjects',
                    'terms',
                    'searchTerms',
                    'studentSubjectPositions',
                    'studentSubjectPositionsOnClassDemarcation',
                    'studentPosition',
                    'studentAffectiveDispositions',
                    'studentPsychomotorSkills'));
                $this->set('_serialize', ['student']);

                $this->render('view_student_termly_result');
            }

        } catch ( \Exception $e ) {
            $this->render('/Element/Error/recordnotfound');
            //debug('Exception Message '.$e->getTraceAsString());
        }
    }

    public function checkResult()
    {
        if ($this->request->is(['patch', 'post', 'put']) ) {
            $pin = $this->Students->StudentResultPins->checkPin($this->request->data('pin'));
            /* checks if the variable contains a value */
            if($pin != null){
                if($this->_checkStudentResultAuthenticationKeys($pin)){
                    // if everything is ok redirect to result page
                    return $this->redirect(['action' => 'viewStudentResult']);
                    //$this->Flash->success(__('Good'));
                }
            } else {
                $this->Flash->error(__('Incorrect registration number or Invalid pin'));
            }
        }
        $sessions = $this->Students->Sessions->find('list',['limit' => 200 ]);
        $this->loadModel('Terms');
        $terms = $this->Terms->find('list',['limit'=> 4 ]);
        $this->set(compact('sessions','terms'));
    }

    /**
     * @param StudentResultPin $pin
     * @return bool
     * This function is the used to authenticate the students without terms
     */
    protected function _checkStudentResultAuthenticationKeysWithOutTerm(StudentResultPin $pin)
    {
        $session = $this->request->session();
        if(!empty($pin->student_id)){
            // the submitted number against the stored number
            if ($pin->student_id != $this->request->data('reg_number')) {
                $this->Flash->error(__('Incorrect registration number or Invalid pin'));
                return false;
            }
            // check if the session is Ok
            if ($pin->session_id !==  (int) $this->request->data('session_id')) {
                $this->Flash->error(__('This pin belongs to you but the session is incorrect. Check and try again'));
                return false;
            }
            // Check if the class is ok
            if ( $pin->class_id !== (int) $this->request->data('class_id') ) {
                $this->Flash->error(__('This pin belongs to you but the class is incorrect. Check and try again'));
                return false;
            }

            // If all checks are true(OK) set the user sessions .
            $session->write([
                'Student.id' => $pin->student_id,
                'Student.session_id' => $pin->session_id,
                'Student.class_id' => $pin->class_id,
                'Student.term_id' => $pin->term_id,
            ]); // write to session and return true
            return true;

        }else{
            $student = $this->Students->find()->where(['id'=>$this->request->data('reg_number')])->first();
            if (empty($student)){
                $this->Flash->error(__('Incorrect registration number or Invalid pin'));
                return false;
            }
            //update student in resultPins table
            if ($this->Students->StudentResultPins->updateStudentPin($pin,$student->id,$this->request->data('session_id'),$this->request->data('class_id'),$this->request->data('term_id'))) {
                $session->write(['Student.id'=> $student->id,
                    'Student.session_id' => $this->request->data('session_id'),
                    'Student.class_id' => $this->request->data('class_id'),
                    'Student.term_id' => $this->request->data('term_id'),
                ]);
                return true;
            }
            return false;
        }
    }

    protected function _checkStudentResultAuthenticationKeys(StudentResultPin $pin)
    {
        $session = $this->request->session();
        if(!empty($pin->student_id)){
            // the submitted number against the stored number
            if ($pin->student_id != $this->request->data('reg_number')) {
                $this->Flash->error(__('Incorrect registration number or Invalid pin'));
                return false;
            }
            // check if the session is Ok
            if ($pin->session_id !==  (int) $this->request->data('session_id')) {
                $this->Flash->error(__('This pin belongs to you but the session is incorrect. Check and try again'));
                return false;
            }
            // Check if the class is ok
            if ( $pin->class_id !== (int) $this->request->data('class_id') ) {
                $this->Flash->error(__('This pin belongs to you but the class is incorrect. Check and try again'));
                return false;
            }

            // Check if the term is Ok
            if ($pin->term_id !== (int) $this->request->data('term_id')) {
                $this->Flash->error(__('This pin belongs to you but the term is incorrect. Check and try again'));
                return false;
            }
            // If all checks are true(OK) set the user sessions .
            $session->write([
                'Student.id' => $pin->student_id,
                'Student.session_id' => $pin->session_id,
                'Student.class_id' => $pin->class_id,
                'Student.term_id' => $pin->term_id,
            ]); // write to session and return true
            return true;

        }else{
            $student = $this->Students->find()->where(['id'=>$this->request->data('reg_number')])->first();
            if (empty($student)){
                $this->Flash->error(__('Incorrect registration number or Invalid pin'));
                return false;
            }
            //update student in resultPins table
            if ($this->Students->StudentResultPins->updateStudentPin($pin,$student->id,$this->request->data('session_id'),$this->request->data('class_id'),$this->request->data('term_id'))) {
                $session->write(['Student.id'=> $student->id,
                    'Student.session_id' => $this->request->data('session_id'),
                    'Student.class_id' => $this->request->data('class_id'),
                    'Student.term_id' => $this->request->data('term_id'),
                ]);
                return true;
            }
            return false;
        }
    }
}
