<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ClassDemacations Controller
 *
 * @property \App\Model\Table\ClassDemacationsTable $ClassDemacations
 */
class ClassDemacationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Classes']
        ];
        $classDemacations = $this->paginate($this->ClassDemacations);

        $this->set(compact('classDemacations'));
        $this->set('_serialize', ['classDemacations']);
    }

    /**
     * View method
     *
     * @param string|null $id Class Demacation id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $classDemacation = $this->ClassDemacations->get($id, [
            'contain' => ['Classes']
        ]);

        $this->set('classDemacation', $classDemacation);
        $this->set('_serialize', ['classDemacation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $classDemacation = $this->ClassDemacations->newEntity();
        if ($this->request->is('post')) {
            $classDemacation = $this->ClassDemacations->patchEntity($classDemacation, $this->request->data);
            if ($this->ClassDemacations->save($classDemacation)) {
                $this->Flash->success(__('The class demacation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The class demacation could not be saved. Please, try again.'));
            }
        }
        $classes = $this->ClassDemacations->Classes->find('list', ['limit' => 200]);
        $this->set(compact('classDemacation', 'classes'));
        $this->set('_serialize', ['classDemacation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Class Demacation id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $classDemacation = $this->ClassDemacations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $classDemacation = $this->ClassDemacations->patchEntity($classDemacation, $this->request->data);
            if ($this->ClassDemacations->save($classDemacation)) {
                $this->Flash->success(__('The class demacation has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The class demacation could not be saved. Please, try again.'));
            }
        }
        $classes = $this->ClassDemacations->Classes->find('list', ['limit' => 200]);
        $this->set(compact('classDemacation', 'classes'));
        $this->set('_serialize', ['classDemacation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Class Demacation id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $classDemacation = $this->ClassDemacations->get($id);
        if ($this->ClassDemacations->delete($classDemacation)) {
            $this->Flash->success(__('The class demacation has been deleted.'));
        } else {
            $this->Flash->error(__('The class demacation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
