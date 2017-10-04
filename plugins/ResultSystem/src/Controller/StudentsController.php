<?php
namespace ResultSystem\Controller;

use Cake\Collection\Collection;
use Cake\Datasource\Exception\RecordNotFoundException;
use Cake\Event\Event;
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

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow([
            'checkResult',
            'ViewStudentResult'
        ]);
    }
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
        try {

            if ( isset($this->request->query['term_id']) && $this->request->query['term_id'] == 4  ) {

                $student = $this->Students->get($id, [
                    'contain' => [
                        'Classes',
                        /*'ClassDemarcations',*/
                        'StudentAnnualResults' => ['conditions' => [
                            'StudentAnnualResults.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                            'StudentAnnualResults.class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1),
                        ]
                        ],
                        'StudentGeneralRemarks' => [
                            'conditions' => [
                                'StudentGeneralRemarks.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                                'StudentGeneralRemarks.class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1),
                                'StudentGeneralRemarks.term_id' => @$this->_getDefaultValue($this->request->query['term_id'],1)
                            ]
                        ],
                        'StudentAnnualPositions' =>  [
                            'conditions' => [
                                'StudentAnnualPositions.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                                'StudentAnnualPositions.class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1),
                            ]
                        ],
                        'StudentPublishResults' => [
                            'conditions' => [
                                'StudentPublishResults.term_id' => @$this->_getDefaultValue($this->request->query['term_id'],1),
                                'StudentPublishResults.class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1),
                                'StudentPublishResults.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
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
                $terms = $this->Terms->find('list')->toArray();
                $this->set(compact('student', 'sessions', 'classes','subjects','terms'));
                $this->set('_serialize', ['student']);
                $this->render('edit_annual_result');

            } else {

                $student = $this->Students->get($id, [
                    'contain' => [
                        'Classes',
                        /*'ClassDemarcations',*/
                        'StudentTermlyResults' => ['conditions' => [
                            'StudentTermlyResults.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                            'StudentTermlyResults.class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1),
                            'StudentTermlyResults.term_id' => @$this->_getDefaultValue($this->request->query['term_id'],1)
                        ]
                        ],
                        'StudentGeneralRemarks' => [
                            'conditions' => [
                                'StudentGeneralRemarks.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                                'StudentGeneralRemarks.class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1),
                                'StudentGeneralRemarks.term_id' => @$this->_getDefaultValue($this->request->query['term_id'],1)
                            ]
                        ],
                        'StudentTermlyPositions' =>  [
                            'conditions' => [
                                'StudentTermlyPositions.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                                'StudentTermlyPositions.class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1),
                                'StudentTermlyPositions.term_id' => @$this->_getDefaultValue($this->request->query['term_id'],1),
                            ]
                        ],
                        'StudentPublishResults' => [
                            'conditions' => [
                                'StudentPublishResults.term_id' => @$this->_getDefaultValue($this->request->query['term_id'],1),
                                'StudentPublishResults.class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1),
                                'StudentPublishResults.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
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
                $terms = $this->Terms->find('list')->toArray();
                $this->set(compact('student', 'sessions', 'classes','subjects','terms'));
                $this->set('_serialize', ['student']);
                $this->render('edit_termly_result');
            }

        } catch (RecordNotFoundException $e ) {
            $this->render('/Element/Error/recordnotfound');
        }

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

            //checks if the $this->request->query[] contains a term_id value
            // it true, check if it contains the right parameter
            if ( isset($this->request->query['term_id']) && !in_array($this->request->query['term_id'],[3,4])) {
                $this->request->session()->delete('Student');
                $this->Flash->set('Your Session has expired ');
                return $this->redirect(['action'=>'checkResult']);
            }

            // writes the session instance to a variable named session
            $session = $this->request->session();

            // check if student result is published
            $this->loadModel('StudentPublishResults');
            $studentResultPublishStatus = $this->StudentPublishResults->find('all')->where([
                'student_id' => $session->read('Student.id'),
                'term_id' => $session->read('Student.term_id'),
                'class_id' => $session->read('Student.class_id'),
                'session_id' => $session->read('Student.session_id')
            ])->first();

            if ( is_null($studentResultPublishStatus) || $studentResultPublishStatus->status === 0 ) {

                // end the execution here and return
                return $this->render('/Element/Result/notPublishedResult','result');
            }

            if ( $session->read('Student.term_id') == 4 || isset($this->request->query['term_id']) && $this->request->query['term_id'] == 4 ) {

                $student = $this->Students->get($session->read('Student.id'), [
                    'contain' => [
                        'Sessions',
                        'Classes',
                        /*'ClassDemarcations',
                        'StudentAnnualPositionOnClassDemarcations',
                        'StudentAnnualPositions',*/
                        'StudentAnnualResults' => [
                            'conditions' => [
                                'StudentAnnualResults.session_id' => @$session->read('Student.session_id'),
                            ]
                        ],
                        /*'StudentAnnualSubjectPositionOnClassDemarcations',
                        'StudentAnnualSubjectPositions',*/
                    ]
                ]);
                // get student annual position
                $studentPosition = $this->Students->StudentAnnualPositions->find('all')
                    ->where(['student_id' => $student->id,
                        'session_id' => @$session->read('Student.session_id'),
                    ])->first();

                // get the number of students in the Class for that particular session
                // This alogrithm is implemented in a bit tricky way.
                // Since this is for Annual , the Number of students for the third term and
                // that of the annual is always the same .
                $this->loadModel('StudentClassCounts');
                $studentsCount = $this->StudentClassCounts->find('all')
                    ->select('student_count')
                    ->where([
                        'class_id' => @$session->read('Student.class_id'),
                        'session_id' => @$session->read('Student.session_id'),
                        'term_id'    => 3
                    ])->first();

                // get student annual subject positions
                $studentAnnualSubjectPositions = $this->Students->StudentAnnualSubjectPositions->find('all')
                    ->where(['student_id' => $student->id,
                        'session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                    ])->combine('subject_id','position')->toArray();

                // Loads the Affective and Psychomotor Skills Table
                $affectiveDispositionTable = TableRegistry::get('SkillsGradingSystem.StudentsAffectiveDispositionScores');
                $psychomotorSkillsTable = TableRegistry::get('SkillsGradingSystem.StudentsPsychomotorSkillScores');

                // Finds the student Record in the Affective score table
                $studentAffectiveDispositions = $affectiveDispositionTable->find('all')
                    ->where(['student_id' => $student->id,
                        'session_id' => @$session->read('Student.session_id'),
                        'term_id'    => @$this->_getDefaultValue($this->request->query['term_id'],4)
                    ])->contain(['Affectives']);

                // Finds the student record in the Psychomotor score table
                $studentPsychomotorSkills = $psychomotorSkillsTable->find('all')
                    ->where(['student_id' => $student->id,
                        'session_id' => @$session->read('Student.session_id'),
                        'term_id'    => @$this->_getDefaultValue($this->request->query['term_id'],4)
                    ])->contain(['Psychomotors']);

                // loads additional table classes ..
                $this->loadModel('App.Subjects');
                $this->loadModel('Terms');

                //$fees = $this->_getSchoolFees(@$session->read('Student.session_id'),$this->request->query['term_id']);

                //$nextTerm = $this->_getTermTimeTable(@$session->read('Student.session_id'),$this->request->query['term_id']);


                $sessions = $this->Students->Sessions->find('list',['limit' => 200])->toArray();
                $classes = $this->Students->Classes->find('list',['limit' => 200])->toArray();
                $subjects = $this->Subjects->find('list',['limit'=> 200])->toArray();
                $terms = $this->Terms->find('list',['limit'=> 200])->toArray();
                $searchTerms = $this->Terms->find('list',['limit'=> 2])->where(['id >= '=> 3 ])->toArray();
                $this->set(compact('student',
                    'studentAnnualSubjectPositions',
                    'fees',
                    'sessions',
                    'classes',
                    'subjects',
                    'terms',
                    'searchTerms',
                    'studentPosition',
                    'studentAffectiveDispositions',
                    'studentPsychomotorSkills',
                    'nextTerm',
                    'studentsCount'));
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

                // get the number of students in the Class
                $this->loadModel('StudentClassCounts');
                $studentsCount = $this->StudentClassCounts->find('all')
                    ->select('student_count')
                    ->where([
                        'class_id' => @$session->read('Student.class_id'),
                        'session_id' => @$session->read('Student.session_id'),
                        'term_id'    => @$this->_getDefaultValue($this->request->query['term_id'],$session->read('Student.term_id'))
                    ])->first();

                $this->loadModel('ResultSystem.Subjects');
                $subjectClassAverages = $this->Subjects->SubjectClassAverages->find('all')->where([
                    'session_id' => @$session->read('Student.session_id'),
                    'class_id'    => @$session->read('Student.class_id'),
                    'term_id'    => @$this->_getDefaultValue($this->request->query['term_id'],$session->read('Student.term_id'))
                ])->combine('subject_id','class_average')->toArray();


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

                $classes = $this->Students->Classes->find('list',['limit' => 200])->toArray();
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
                    'subjectClassAverages',
                    'studentsCount',
                    'studentPsychomotorSkills'));
                $this->set('_serialize', ['student']);

                $this->render('view_student_termly_result');
            }

        } catch ( RecordNotFoundException $e ) {
            $this->render('/Element/Error/recordnotfound');
            debug('Exception Message '.$e->getTraceAsString());
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
        $classes = $this->Students->Classes->find('list',['limit' => 200 ]);
        $sessions = $this->Students->Sessions->find('list',['limit' => 200 ]);
        $this->loadModel('Terms');
        $terms = $this->Terms->find('list',['limit'=> 4 ]);
        $this->set(compact('sessions','terms','classes'));
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


    public function viewStudentResultForAdmin($id = null )
    {

        // writes the session instance to a variable named session
        // $session = $this->request->session();

        if (   isset($this->request->query['term_id']) && $this->request->query['term_id'] == 4 ) {

            $student = $this->Students->get($id, [
                'contain' => ['Sessions',
                    'Classes',
                    /*'ClassDemarcations',
                    'StudentAnnualPositionOnClassDemarcations',
                    'StudentAnnualPositions',*/
                    'StudentAnnualResults' => [
                        'conditions' => [
                            'StudentAnnualResults.session_id' => @$this->request->query['session_id'],
                        ]
                    ],
                    /*'StudentAnnualSubjectPositionOnClassDemarcations',
                    'StudentAnnualSubjectPositions',*/
                ]
            ]);

            // get student annual position
            $studentPosition = $this->Students->StudentAnnualPositions->find('all')
                ->where(['student_id' => $student->id,
                    'session_id' => @$this->request->query['session_id'],
                ])->first();

            // get the number of students in the Class for that particular session
            // This alogrithm is implemented in a bit tricky way.
            // Since this is for Annual , the Number of students for the third term and
            // that of the annual is always the same .
            $this->loadModel('StudentClassCounts');
            $studentsCount = $this->StudentClassCounts->find('all')
                ->select('student_count')
                ->where([
                    'class_id' => @$this->request->query['class_id'],
                    'session_id' => @$this->request->query['session_id'],
                    'term_id'    => @$this->request->query['term_id'],
                ])->first();

            // get student annual subject positions
            $studentAnnualSubjectPositions = $this->Students->StudentAnnualSubjectPositions->find('all')
                ->where(['student_id' => $student->id,
                    'session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                ])->combine('subject_id','position')->toArray();

            // Loads the Affective and Psychomotor Skills Table
            $affectiveDispositionTable = TableRegistry::get('SkillsGradingSystem.StudentsAffectiveDispositionScores');
            $psychomotorSkillsTable = TableRegistry::get('SkillsGradingSystem.StudentsPsychomotorSkillScores');

            // Finds the student Record in the Affective score table
            $studentAffectiveDispositions = $affectiveDispositionTable->find('all')
                ->where(['student_id' => $student->id,
                    'session_id' => @$this->request->query['session_id'],
                    'term_id'    => @$this->_getDefaultValue($this->request->query['term_id'],4)
                ])->contain(['Affectives']);

            // Finds the student record in the Psychomotor score table
            $studentPsychomotorSkills = $psychomotorSkillsTable->find('all')
                ->where(['student_id' => $student->id,
                    'session_id' => @$this->request->query['session_id'],
                    'term_id'    => @$this->_getDefaultValue($this->request->query['term_id'],4)
                ])->contain(['Psychomotors']);

            // Result Publish Status
            // check if student result is published
            $this->loadModel('StudentPublishResults');

            $studentResultPublishStatus = $this->StudentPublishResults->find('all')->where([
                'student_id' => $student->id ,
                'term_id' => @$this->_getDefaultValue($this->request->query['term_id'],1),
                'class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1),
                'session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1)
            ])->first();

            // loads additional table classes ..
            $this->loadModel('App.Subjects');
            $this->loadModel('Terms');

            //$fees = $this->_getSchoolFees($this->request->query['session_id'],$this->request->query['term_id']);

            //$nextTerm = $this->_getTermTimeTable($this->request->query['session_id'],$this->request->query['term_id']);

            $sessions = $this->Students->Sessions->find('list',['limit' => 200])->toArray();
            $classes = $this->Students->Classes->find('list',['limit' => 200])->toArray();
            $subjects = $this->Subjects->find('list',['limit'=> 200])->toArray();
            $terms = $this->Terms->find('list',['limit'=> 200])->toArray();
            $searchTerms = $this->Terms->find('list',['limit'=> 2])->where(['id >= '=> 3 ])->toArray();
            $this->set(compact('student',
                'fees',
                'sessions',
                'classes',
                'subjects',
                'studentAnnualSubjectPositions',
                'terms',
                'searchTerms',
                'studentPosition',
                'studentAffectiveDispositions',
                'studentPsychomotorSkills',
                'studentResultPublishStatus',
                'studentsCount',
                'nextTerm'
            ));
            $this->set('_serialize', ['student']);

            $this->render('view_student_annual_result_for_admin');

        } else {

            $student = $this->Students->get($id, [
                'contain' => [
                    'Sessions',
                    'Classes',
                    /*'ClassDemarcations',
                    'StudentTermlyPositionOnClassDemarcations',*/
                    'StudentTermlyResults' => [
                        'conditions' => [
                            'StudentTermlyResults.session_id' => @$this->request->query['session_id'],
                            'StudentTermlyResults.class_id' => @$this->request->query['class_id'],
                            'StudentTermlyResults.term_id' => @$this->request->query['term_id']
                        ]
                    ],
                ]
            ]);
            //get the student remark
            $studentRemark = $this->Students->StudentGeneralRemarks->find('all')->where([
                'student_id' => $student->id,
                'session_id' => @$this->request->query['session_id'],
                'term_id'    => @$this->request->query['term_id'],
                'class_id'    => @$this->request->query['class_id'],
            ])->first();

            // get the student position
            $studentPosition = $this->Students->StudentTermlyPositions->find('all')
                ->where(['student_id' => $student->id,
                    'session_id' => @$this->request->query['session_id'],
                    'class_id' => @$this->request->query['class_id'],
                    'term_id'    => @$this->request->query['term_id']
                ])->first();

            // gets the student subject positions
            $studentSubjectPositions = $this->Students->StudentTermlySubjectPositions->find('all')
                ->where(['student_id' => $student->id,
                    'session_id' => @$this->request->query['session_id'],
                    'class_id' => @$this->request->query['class_id'],
                    'term_id'    => @$this->request->query['term_id']
                ])->combine('subject_id','position')->toArray();


            // Result Publish Status
            // check if student result is published
            $this->loadModel('StudentPublishResults');

            $studentResultPublishStatus = $this->StudentPublishResults->find('all')->where([
                'student_id' => $student->id ,
                'term_id' => @$this->_getDefaultValue($this->request->query['term_id'],1),
                'class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1),
                'session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1)
            ])->first();

            /* get the student subjects positions on class demarcation
            $studentSubjectPositionsOnClassDemarcation =  $this->Students->StudentTermlySubjectPositionOnClassDemarcations->find('all')
                ->where(['student_id' => $student->id,
                    'class_demarcation_id' => $student->class_demarcation_id,
                    'session_id' => @$this->_getDefaultValue($this->request->query['session_id'],$session->read('Student.session_id')),
                    'term_id'    => @$this->_getDefaultValue($this->request->query['term_id'],$session->read('Student.term_id') )
                ])->combine('subject_id','position')->toArray();
            */

            // get student Affective and Psychmotor Scores
            $affectiveDispositionTable = TableRegistry::get('SkillsGradingSystem.StudentsAffectiveDispositionScores');
            $psychomotorSkillsTable = TableRegistry::get('SkillsGradingSystem.StudentsPsychomotorSkillScores');

            $studentAffectiveDispositions = $affectiveDispositionTable->find('all')
                ->where(['student_id' => $student->id,
                    'session_id' => @$this->request->query['session_id'],
                    'class_id' => @$this->request->query['class_id'],
                    'term_id'    => @$this->request->query['term_id']
                ])->contain(['Affectives']);

            $studentPsychomotorSkills = $psychomotorSkillsTable->find('all')
                ->where(['student_id' => $student->id,
                    'session_id' => @$this->request->query['session_id'],
                    'class_id' => @$this->request->query['class_id'],
                    'term_id'    => @$this->request->query['term_id']
                ])->contain(['Psychomotors']);

            // get the number of students in the Class
            $this->loadModel('StudentClassCounts');
            $studentsCount = $this->StudentClassCounts->find('all')
                ->select('student_count')
                ->where([
                    'class_id' => @$this->request->query['class_id'],
                    'session_id' => @$this->request->query['session_id'],
                    'term_id'    => @$this->request->query['term_id']
                ])->first();

            $this->loadModel('ResultSystem.Subjects');
            $subjectClassAverages = $this->Subjects->SubjectClassAverages->find('all')->where([
                'session_id' => @$this->request->query['session_id'],
                'class_id'    => @$this->request->query['class_id'],
                'term_id'    => @$this->request->query['term_id']
            ])->combine('subject_id','class_average')->toArray();

            // loads additional table classes ..
            $this->loadModel('Terms');

            //$fees = $this->_getSchoolFees($this->request->query['session_id'],$this->request->query['term_id']);

            // Next Term
            //$nextTerm = $this->_getTermTimeTable($this->request->query['session_id'],$this->request->query['term_id']);

            $sessions = $this->Students->Sessions->find('list',['limit' => 1 ])->where(['id' => $this->request->query['session_id']])->toArray();
            $subjects = $this->Subjects->find('list',['limit'=> 200])->toArray();
            $terms = $this->Terms->find('list',['limit'=> 4])->toArray();
            $classes = $this->Students->Classes->find('list',['limit' => 200])->toArray();
            $searchTerms = $this->Terms->find('list',['limit'=> 4])->toArray();
            $this->set(compact('student',
                'sessions',
                'subjects',
                'terms',
                'classes',
                'searchTerms',
                'studentSubjectPositions',
                'studentPosition',
                'studentAffectiveDispositions',
                'studentPsychomotorSkills',
                'studentsCount',
                'fees',
                'studentRemark',
                'subjectClassAverages',
                'studentResultPublishStatus',
                'nextTerm'));
            $this->set('_serialize', ['student']);

            $this->render('view_student_termly_result_for_admin');
        }
    }

    protected function _getSchoolFees($session_id,$term_id)
    {
        $this->loadModel('SchoolFees.Fees');
        if ( $term_id < 4) {
            $fees = $this->Fees->find('all')
                ->where([
                    'term_id' => $term_id + 1 ,
                    'session_id' => $session_id
                ]);
        } elseif($term_id == 4 ) {
            $fees = $this->Fees->find('all')
                ->where([
                    'term_id' => 1,
                    'session_id' => $session_id + 1
                ]);
        }
        return $fees ;

    }

    // Todo :  Improve this algo well. Change the sequence ..........
    protected function _getTermTimeTable($session_id,$term_id)
    {
        $this->loadModel('TimesTable.TermTimeTables');
        if ( $term_id < 3 ) {
            $nextTerm = $this->TermTimeTables->find('all')
                ->where([
                    'term_id' => $term_id + 1,
                    'session_id' => $session_id,
                ])->first();
        } elseif ( $term_id >= 3 ) {
            $nextTerm = $this->TermTimeTables->find('all')
                ->where([
                    'term_id' => 1,
                    'session_id' => $session_id + 1,
                ])->first();
        }
        return $nextTerm ;
    }



    public function publishResults()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->loadModel('StudentPublishResults');
            if(is_array($this->request->data('student_ids'))){
                //debug($this->request->data('student_ids')); exit;
                for ($num =0; $num < count($this->request->data('student_ids')); $num++ ) {
                    // for each request in this save with the default class, term and session
                    $publishResultStatus = $this->StudentPublishResults->findorCreate(['student_id'=>$this->request->data['student_ids'][$num],
                        'term_id' => @$this->_getDefaultValue($this->request->query['term_id'],1),
                        'class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1),
                        'session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                    ]);
                    $newData = [
                        'status' => 1,
                        'term_id' => @$this->_getDefaultValue($this->request->query['term_id'],1),
                        'class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1),
                        'session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                    ];
                    //debug($publishResultStatus);
                    $publishResultStatus = $this->StudentPublishResults->patchEntity($publishResultStatus,$newData);
                    $this->StudentPublishResults->save($publishResultStatus);
                }
                //exit;

                $this->Flash->success(__('{0} results were successfully published',count($this->request->data('student_ids'))));
            }
        }

        if ( empty($this->request->query['class_id'])) {
            $this->paginate = [
                'limit' => 100,
                'contain' => ['Sessions', 'Classes',
                    'StudentPublishResults' => [
                        'conditions' => [
                            'StudentPublishResults.term_id' => @$this->_getDefaultValue($this->request->query['term_id'],1),
                            'StudentPublishResults.class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1),
                            'StudentPublishResults.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                        ]
                    ]
                ],
                'conditions' => [
                    'Students.status'   => 1,
                    'Students.graduated'   => 0,
                ],
                // Place the result in ascending order according to the class.
                'order' => [
                    'Students.class_id' => 'asc'
                ]
            ];
        }
        else {
            $this->paginate = [
                'limit' => 100,
                'contain' => ['Sessions', 'Classes',
                    'StudentPublishResults' => [
                        'conditions' => [
                            'StudentPublishResults.term_id' => @$this->_getDefaultValue($this->request->query['term_id'],1),
                            'StudentPublishResults.class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1),
                            'StudentPublishResults.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                        ]
                    ]
                ],
                'conditions' => [
                    'Students.status'   => 1,
                    'Students.graduated'   => 0,
                    'Students.class_id' => $this->_getDefaultValue($this->request->query['class_id'],1),
                ]
            ];
        }

        $students = $this->paginate($this->Students);

        $sessions = $this->Students->Sessions->find('list',['limit' => 200]);
        $classes = $this->Students->Classes->find('list',['limit' => 200]);
        $this->loadModel('ResultSystem.Terms');
        $terms = $this->Terms->find('list');
        $this->set(compact('students','classes','sessions','terms'));
        $this->set('_serialize', ['students']);
    }
}
