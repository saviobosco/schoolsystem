<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Semesters Controller
 *
 * @property \App\Model\Table\SemestersTable $Semesters
 */
class SemestersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $semesters = $this->paginate($this->Semesters);

        $this->set(compact('semesters'));
        $this->set('_serialize', ['semesters']);
    }

    /**
     * View method
     *
     * @param string|null $id Semester id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $semester = $this->Semesters->get($id, [
            'contain' => []
        ]);

        $this->set('semester', $semester);
        $this->set('_serialize', ['semester']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $semester = $this->Semesters->newEntity();
        if ($this->request->is('post')) {
            $semester = $this->Semesters->patchEntity($semester, $this->request->data);
            if ($this->Semesters->save($semester)) {
                $this->Flash->success(__('The semester has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The semester could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('semester'));
        $this->set('_serialize', ['semester']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Semester id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $semester = $this->Semesters->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $semester = $this->Semesters->patchEntity($semester, $this->request->data);
            if ($this->Semesters->save($semester)) {
                $this->Flash->success(__('The semester has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The semester could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('semester'));
        $this->set('_serialize', ['semester']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Semester id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $semester = $this->Semesters->get($id);
        if ($this->Semesters->delete($semester)) {
            $this->Flash->success(__('The semester has been deleted.'));
        } else {
            $this->Flash->error(__('The semester could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
