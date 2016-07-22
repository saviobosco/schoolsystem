<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * StudentsCourses Controller
 *
 * @property \App\Model\Table\StudentsCoursesTable $StudentsCourses
 */
class StudentsCoursesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Students', 'Courses']
        ];
        $studentsCourses = $this->paginate($this->StudentsCourses);

        $this->set(compact('studentsCourses'));
        $this->set('_serialize', ['studentsCourses']);
    }

    /**
     * View method
     *
     * @param string|null $id Students Course id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $studentsCourse = $this->StudentsCourses->get($id, [
            'contain' => ['Students', 'Courses', 'Semesters', 'Sessions']
        ]);

        $this->set('studentsCourse', $studentsCourse);
        $this->set('_serialize', ['studentsCourse']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $studentsCourse = $this->StudentsCourses->newEntity();
        if ($this->request->is('post')) {
            $studentsCourse = $this->StudentsCourses->patchEntity($studentsCourse, $this->request->data);
            if ($this->StudentsCourses->save($studentsCourse)) {
                $this->Flash->success(__('The students course has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The students course could not be saved. Please, try again.'));
            }
        }
        $students = $this->StudentsCourses->Students->find('list', ['limit' => 200]);
        $courses = $this->StudentsCourses->Courses->find('list', ['limit' => 200]);
        $semesters = $this->StudentsCourses->Semesters->find('list', ['limit' => 200]);
        $sessions = $this->StudentsCourses->Sessions->find('list', ['limit' => 200]);
        $this->set(compact('studentsCourse', 'students', 'courses', 'semesters', 'sessions'));
        $this->set('_serialize', ['studentsCourse']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Students Course id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $studentsCourse = $this->StudentsCourses->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $studentsCourse = $this->StudentsCourses->patchEntity($studentsCourse, $this->request->data);
            /*if ($this->StudentsCourses->save($studentsCourse)) {
                $this->Flash->success(__('The students course has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The students course could not be saved. Please, try again.'));
            }*/
        }
        $students = $this->StudentsCourses->Students->find('list', ['limit' => 200]);
        $courses = $this->StudentsCourses->Courses->find('list', ['limit' => 200]);
        $this->set(compact('studentsCourse', 'students', 'courses', 'semesters', 'sessions'));
        $this->set('_serialize', ['studentsCourse']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Students Course id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $studentsCourse = $this->StudentsCourses->get($id);
        if ($this->StudentsCourses->delete($studentsCourse)) {
            $this->Flash->success(__('The students course has been deleted.'));
        } else {
            $this->Flash->error(__('The students course could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
