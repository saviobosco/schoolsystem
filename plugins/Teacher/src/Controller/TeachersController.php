<?php
namespace Teacher\Controller;

use Teacher\Controller\AppController;

/**
 * Teachers Controller
 *
 * @property \Teacher\Model\Table\TeachersTable $Teachers
 */
class TeachersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $teachers = $this->paginate($this->Teachers);

        $this->set(compact('teachers'));
        $this->set('_serialize', ['teachers']);
    }

    /**
     * View method
     *
     * @param string|null $id Teacher id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $teacher = $this->Teachers->get($id, [
            'contain' => []
        ]);

        $this->set('teacher', $teacher);
        $this->set('_serialize', ['teacher']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $teacher = $this->Teachers->newEntity();
        if ($this->request->is('post')) {
            $teacher = $this->Teachers->patchEntity($teacher, $this->request->data);
            if ($this->Teachers->save($teacher)) {
                $this->Flash->success(__('The teacher has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The teacher could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('teacher'));
        $this->set('_serialize', ['teacher']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Teacher id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $teacher = $this->Teachers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $teacher = $this->Teachers->patchEntity($teacher, $this->request->data);
            if ($this->Teachers->save($teacher)) {
                $this->Flash->success(__('The teacher has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The teacher could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('teacher'));
        $this->set('_serialize', ['teacher']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Teacher id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $teacher = $this->Teachers->get($id);
        if ($this->Teachers->delete($teacher)) {
            $this->Flash->success(__('The teacher has been deleted.'));
        } else {
            $this->Flash->error(__('The teacher could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
