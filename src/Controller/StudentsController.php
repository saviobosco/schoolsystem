<?php
/**
 * ====================================
 * @company Crack Reactor
 * @developer Saviobosco
 * ====================================
 */
namespace App\Controller;

use App\Controller\AppController;
use Cake\Collection\Collection;
use Cake\Event\Event;
use App\Controller\Traits\SearchParameterTrait;

/**
 * Students Controller
 *
 * @property \App\Model\Table\StudentsTable $Students
 */
class StudentsController extends AppController
{
    use SearchParameterTrait;

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow([
            'checkResult',
            'studentResult',
            'add',
            'newStudent',
            'studentData'
        ]);
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        if (empty($this->request->query['session_id'])) {
            $this->paginate = [
                'contain' => ['Schools','Levels','Sessions'],
                'conditions' => ['school_id'=>@$this->_getSchool($this->request->query['school_id']),
                    'year'=>@$this->_getYear($this->request->query['year']['year']),
                ]
            ];
        }else {
            $this->paginate = [
                'contain' => ['Schools','Levels','Sessions'],
                'conditions' => ['school_id'=>@$this->_getSchool($this->request->query['school_id']),
                    'year'=>@$this->_getYear($this->request->query['year']['year']),
                    'session_id'=>@$this->_getSession($this->request->query['session_id'])]
            ];
        }
        $students = $this->paginate($this->Students);

        $schools = $this->Students->Schools->find('list', ['limit' => 200]);
        $levels = $this->Students->Levels->find('list', ['limit' => 200]);
        $sessions = $this->Students->Sessions->find('list', ['limit' => 200]);
        $this->set(compact('students','schools','levels','sessions'));
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
        if(empty($id)){
            $this->Flash->error(__('requires an id to view content.'));
            return $this->redirect(['controller'=>'Students','action'=>'index','?' => ['year[year]' => date('Y')]]);
        }

        $student = $this->Students->get($id, [
            'contain' => ['Schools', 'Levels', 'Courses']
        ]);
        $coursesCollection = new Collection($student->courses);
        $coursesByLevel = $coursesCollection->groupBy('level_id');

        $this->set(compact('student','coursesByLevel'));
        $this->set('_serialize', ['student']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $student = $this->Students->newEntity();
        if ($this->request->is('post')) {
            $student = $this->Students->patchEntity($student, $this->request->data);
            $saved = $this->Students->save($student);
            if ($saved) {
                $this->Flash->success(__('The student account was successfully created.'));
                return $this->redirect(['action' => 'student_data',$saved->id]);
            } else {
                $this->Flash->error(__('The student account could not be created. Please, try again.'));
            }
        }
        $schools = $this->Students->Schools->find('list', ['limit' => 200]);
        $levels = $this->Students->Levels->find('list',['limit' => 200,]);
        $courses = $this->Students->Courses->find('list', ['limit' => 200]);
        $sessions = $this->Students->Sessions->find('list', ['limit' => 200]);
        $title = 'Create your profile for old student';
        $this->set(compact('student', 'schools', 'levels', 'courses','title','sessions'));
        $this->set('_serialize', ['student']);
    }


    /**
     * @return \Cake\Network\Response|null
     */
    public function newStudent()
    {
        if (!$this->request->session()->check('NewStudent.id') && empty($this->request->session()->read('Auth.User.id'))){
            return $this->redirect(['controller'=>'ApplicationsSubmitted','action'=>'check_new_student_registration']);
        }
        $student = $this->Students->newEntity();
        if ($this->request->is('post')) {
            $student->id = $this->Students->generateRegNumber();
            $student = $this->Students->patchEntity($student, $this->request->data);
            $saved = $this->Students->save($student);
            if ($saved) {
                $this->Flash->success(__('The student account was successfully created.'));
                return $this->redirect(['action' => 'student_data',$saved->id]);
            } else {
                $this->Flash->error(__('The student account could not be created. Please, try again.'));
            }
        }
        $schools = $this->Students->Schools->find('list', ['limit' => 200]);
        $levels = $this->Students->Levels->find('list',['limit' => 200,]);
        $courses = $this->Students->Courses->find('list', ['limit' => 200])->where(['level_id' => 1]);
        $sessions = $this->Students->Sessions->find('list', ['limit' => 200]);
        $title = 'Create your profile for new student';
        $this->set(compact('student', 'schools', 'levels', 'courses','title','sessions'));
        $this->set('_serialize', ['student']);
    }


    /**
     * @param null $id
     * @return \Cake\Network\Response|null
     */
    public function studentData($id = null)
    {
        if(empty($id)){
            $this->Flash->error(__('requires an id to view content.'));
            return $this->redirect(['controller'=>'Pages','action'=>'homepage']);
        }

        $student = $this->Students->get($id, [
            'contain' => ['Schools', 'Levels']
        ]);
        $this->set(compact('student'));
        $this->set('_serialize', ['student']);
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
            'contain' => ['Courses']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $this->Students->patchEntity($student, $this->request->data);
            if ($this->Students->save($student)) {
                $this->Flash->success(__('The student has been saved.'));
                return $this->redirect(['action' => 'index','?' => ['year[year]' => date('Y')]]);
            } else {
                $this->Flash->error(__('The student could not be saved. Please, try again.'));
            }
        }
        $schools = $this->Students->Schools->find('list', ['limit' => 200]);
        $levels = $this->Students->Levels->find('list', ['limit' => 200]);
        $sessions = $this->Students->Sessions->find('list', ['limit' => 200]);
        $courses = $this->Students->Courses->find('list', ['limit' => 200])->where(['level_id'=>$student->level_id,'school_id'=>$student->school_id]);
        $title = 'edit student record no :'.$student->id ;
        $this->set(compact('student', 'schools', 'levels', 'courses','title','sessions'));
        $this->set('_serialize', ['student']);
    }



    /**
     * @param null $id
     * @return \Cake\Network\Response|null
     */
    public function enterRemark($id = null)
    {
        $student = $this->Students->find()
            ->contain([
                'Courses' => function ($q) {
                    return $q
                        ->select(['id','semester_id',])
                        ->where(['Courses.semester_id' =>@$this->_getSemester($this->request->query['semester_id']) ])
                        ->andWhere(['Courses.level_id'=>@$this->_getSession($this->request->query['level_id']) ]);
                },
            ])
            ->where(['id'=>$id])
            ->select(['id','fullname','photo','level_id'])->first();
        $remark = $this->Students->Remarks->find()->where(['student_id'=>$id,
            'semester_id' =>@$this->_getSemester($this->request->query['semester_id'])])
            ->andWhere(['level_id'=>@$this->_getSession($this->request->query['level_id']) ])
            ->first();
        if(empty($remark)) {
            $newData = ['student_id'=>$student->id,
                'level_id'=>$student->level_id,
                'semester_id'=>@$student['courses'][0]['semester_id']];
            $remark = $this->Students->Remarks->newEntity($newData);
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $this->Students->Remarks->patchEntity($remark, $this->request->data);
            if ($this->Students->Remarks->save($student)) {
                $this->Flash->success(__('The student remark has been saved.'));
                return $this->redirect(['action' => 'enter_remark',$id]);
            } else {
                $this->Flash->error(__('The student could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('Semesters');
        $title = 'enter student remark :'.$student->id ;
        $levels = $this->Students->Levels->find('list', ['limit' => 200]);
        $semesters = $this->Semesters->find('list', ['limit' => 200]);
        $this->set(compact('student','title','levels','semesters','remark'));
        $this->set('_serialize', ['student']);
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
        return $this->redirect(['action' => 'index','?' => ['year[year]' => date('Y')]]);
    }

    public function checkResult()
    {
        //$this->request->session()->destroy();
        $this->loadModel('Semesters');
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pin = $this->Students->StudentResultPins->checkPin($this->request->data('pin')); // checks if the pin is in the table.
            /* checks if the variable contains a value */
            if($pin != null){
                if($this->_checkStudentResultKeys($pin->student_id,$pin->school_id,$pin->level_id,$pin->semester_id,$pin->pin)){
                    // if everything is ok redirect to result page
                    return $this->redirect(['action' => 'studentResult']);
                }
            } else {
                $this->Flash->error(__('Incorrect registration number or Invalid pin'));
            }
        }

        $schools = $this->Students->Schools->find('list', ['limit' => 200]);
        $levels = $this->Students->Levels->find('list', ['limit' => 200]);
        $semesters = $this->Semesters->find('list', ['limit' => 200]);
        $this->set(compact('student', 'schools', 'levels', 'courses','semesters'));
    }

    /**
     * @param $student_id
     * @param $school_id
     * @param $level_id
     * @param $semester_id
     * @param $pin
     * @return bool
     */
    protected function _checkStudentResultKeys($student_id,$school_id,$level_id,$semester_id,$pin)
    {
        $session = $this->request->session();
        if(!empty($student_id)){
            // the submitted number against the stored number
            if ($student_id === $this->request->data('reg_number')) {
                // check the school id
                if ($school_id == $this->request->data('school_id')) {

                    if ($level_id == $this->request->data('level_id')) {

                        if ($semester_id == $this->request->data('semester_id')) {
                            $session->write([
                                'Student.id' => $student_id,
                                'Student.school_id' => $school_id ,
                                'Student.level_id' => $level_id,
                                'Student.semester_id' => $semester_id,
                            ]); // write to session and return true
                            return true;
                        } else {
                            $this->Flash->error(__('This pin belongs to you but the semester is incorrect. Check and try again'));
                            return false;
                        }
                    } else {
                        $this->Flash->error(__('This pin belongs to you but the Level is incorrect. Check and try again'));
                        return false;
                    }
                } else {
                    $this->Flash->error(__('This pin belongs to you but the school is incorrect. Check and try again'));
                    return false;
                }
            }else{
                $this->Flash->error(__('Incorrect registration number or Invalid pin'));
                return false;
            }
        }else{
            $student = $this->Students->find()->where(['id'=>$this->request->data('reg_number')])->first();
            if(!empty($student)){
                //update student in resultPins table
                if($this->Students->StudentResultPins->updateStudentPin($pin,$student->id,$student->school_id,$this->request->data('level_id'),$this->request->data('semester_id'))) {
                    $session->write(['Student.id'=> $student->id,
                        'Student.school_id' => $student->school_id ,
                        'Student.level_id' => $this->request->data('level_id'),
                        'Student.semester_id' => $this->request->data('semester_id'),
                    ]);
                    return true;
                }
            }
            return false;
        }
    }

    public function studentResult()
    {
        if (!$this->request->session()->check('Student')){
            return $this->redirect(['controller'=>'Students','action'=>'checkResult']);
        }
        $session = $this->request->session();
        $student = $this->Students->find()
            ->contain([
                'Courses' => function ($q) {
                    return $q
                        ->select(['id','name'])
                        ->where(['Courses.school_id' =>$this->request->session()->read('Student.school_id'),
                                'Courses.semester_id' =>$this->request->session()->read('Student.semester_id') ])
                        ->andWhere(['Courses.level_id'=>$this->request->session()->read('Student.level_id') ]);
                },
                'Remarks' => function ($q) {
                    return $q
                        ->where(['Remarks.student_id' =>$this->request->session()->read('Student.id'),
                            'Remarks.semester_id' =>$this->request->session()->read('Student.semester_id') ])
                        ->andWhere(['Remarks.level_id'=>$this->request->session()->read('Student.level_id') ]);
                }
            ])
            ->where(['id'=>$session->read('Student.id')])
            ->select(['id','fullname','photo'])->first();

        $this->set(compact('student'));
    }
}
