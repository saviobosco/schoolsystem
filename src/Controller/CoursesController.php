<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\Traits\SearchParameterTrait;
use Cake\Event\Event;

/**
 * Courses Controller
 *
 * @property \App\Model\Table\CoursesTable $Courses
 */
class CoursesController extends AppController
{
    use SearchParameterTrait;


    public function beforeFilter(Event $event)
    {
        $this->Auth->allow([
            'getCourses'
        ]);
    }
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        if(empty($this->request->query['level_id']) && empty($this->request->query['semester_id'])) {
            $this->paginate = [
                'contain' => ['Semesters', 'Levels', 'Schools'],
                'conditions' => ['school_id'=>@$this->_getSchool($this->request->query['school_id'])]
            ];
        } else {
            $this->paginate = [
                'contain' => ['Semesters', 'Levels', 'Schools'],
                'conditions' => ['school_id'=>@$this->_getSchool($this->request->query['school_id']),
                    'level_id'=>@$this->_getSession($this->request->query['level_id']) ,
                    'semester_id'=>@$this->_getSemester($this->request->query['semester_id'])]
            ];
        }

        $courses = $this->paginate($this->Courses);

        $semesters = $this->Courses->Semesters->find('list', ['limit' => 200]);
        $levels = $this->Courses->Levels->find('list', ['limit' => 200]);
        $schools = $this->Courses->Schools->find('list', ['limit' => 200]);
        $this->set(compact('courses','levels','semesters','schools'));
        $this->set('_serialize', ['courses']);
    }

    /**
     * View method
     *
     * @param string|null $id Course id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $course = $this->Courses->get($id, [
            'contain' => ['Semesters', 'Levels', 'Schools']
        ]);

        $this->set('course', $course);
        $this->set('_serialize', ['course']);
    }

    /**
     * @param null $id
     */
    public function enterResult($id = null)
    {
        if (empty($this->request->query['session_id'])) {
            $course = $this->Courses->find()->contain([
                'Students' => function ($q) {
                    return $q
                        ->select(['id']);
                }
            ])->where(['Courses.id'=>$id])->first();
        } else {
            $course = $this->Courses->find()->contain([
                'Students' => function ($q) {
                    return $q
                        ->select(['id'])
                        ->Where(['Students.session_id'=> @$this->_getSession($this->request->query['session_id'])]);
                }
            ])->where(['Courses.id'=>$id])->first();
        }
        if ($this->request->is(['patch', 'post', 'put'])) {
            $course = $this->Courses->patchEntity($course, $this->request->data);
            if ($this->Courses->save($course)) {
                $this->Flash->success(__('The course result has been successfully updated.'));
                //return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The course result could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('Sessions');
        $sessions = $this->Sessions->find('list', ['limit' => 200]);
        $this->set(compact('course','sessions'));
        $this->set('_serialize', ['course']);
    }


    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $course = $this->Courses->newEntity();
        if ($this->request->is('post')) {
            $course = $this->Courses->patchEntity($course, $this->request->data);
            if ($this->Courses->save($course)) {
                $this->Flash->success(__('The course has been saved.'));
                return $this->redirect(['action' => 'add']);
            } else {
                $this->Flash->error(__('The course could not be saved. Please, try again.'));
            }
        }
        $semesters = $this->Courses->Semesters->find('list', ['limit' => 200]);
        $levels = $this->Courses->Levels->find('list', ['limit' => 200])->select(['id','created']);
        $schools = $this->Courses->Schools->find('list', ['limit' => 200]);
        $this->set(compact('course', 'semesters', 'levels', 'schools'));
        $this->set('_serialize', ['course']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Course id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $course = $this->Courses->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $course = $this->Courses->patchEntity($course, $this->request->data);
            if ($this->Courses->save($course)) {
                $this->Flash->success(__('The course has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The course could not be saved. Please, try again.'));
            }
        }
        $semesters = $this->Courses->Semesters->find('list', ['limit' => 200]);
        $levels = $this->Courses->Levels->find('list', ['limit' => 200]);
        $schools = $this->Courses->Schools->find('list', ['limit' => 200]);
        $this->set(compact('course', 'semesters', 'levels', 'schools'));
        $this->set('_serialize', ['course']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Course id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $course = $this->Courses->get($id);
        if ($this->Courses->delete($course)) {
            $this->Flash->success(__('The course has been deleted.'));
        } else {
            $this->Flash->error(__('The course could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function uploadResult($id = null)
    {
        $this->loadModel('StudentsCourses');
        $course = $this->StudentsCourses->find()->where(['Course_id'=>$id]);
        if ($this->request->is('post')) {
            $data = $this->Import->prepareEntityData($this->request->data['result']['tmp_name']);
            $studentsCourses = $this->StudentsCourses->patchEntities($course,$data);

            if ($this->StudentsCourses->saveResult($studentsCourses)) {
                $this->Flash->success(__('The students result file was successfully uploaded.'));
            } else {
                $this->Flash->error(__('The students result file could not be uploaded. Please, try again.'));
            }
        }
        $this->loadModel('Sessions');
        $sessions = $this->Sessions->find('list', ['limit' => 200]);
        $this->set(compact('sessions','course'));
    }

    public function getCourses()
    {
        $courses = $this->Courses->find('list',['limit'=>200])->where(['school_id'=>$this->request->query['school_id'],
            'level_id'=>$this->request->query['level_id']]);
        $this->set('courses',$courses);
    }

    public function courseStudentsExcel($id = null)
    {
        $this->loadModel('StudentsCourses');
        $course = $this->StudentsCourses->find('all')->select(['student_id','course_id','total','grade'])->where(['Course_id'=>$id,'session_id' => $this->request->query['session_id']]);
        $this->set('course',$course);
    }
}
