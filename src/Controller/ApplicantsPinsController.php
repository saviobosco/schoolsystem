<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ApplicantsPins Controller
 *
 * @property \App\Model\Table\ApplicantsPinsTable $ApplicantsPins
 */
class ApplicantsPinsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [];
        $applicantsPins = $this->paginate($this->ApplicantsPins);

        $this->set(compact('applicantsPins'));
        $this->set('_serialize', ['applicantsPins']);
    }

    /**
     * View method
     *
     * @param string|null $id Applicants Pin id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $applicantsPin = $this->ApplicantsPins->get($id);

        $this->set('applicantsPin', $applicantsPin);
        $this->set('_serialize', ['applicantsPin']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $applicantsPin = $this->ApplicantsPins->newEntity();
        if ($this->request->is('post')) {
            $applicantsPin = $this->ApplicantsPins->patchEntity($applicantsPin, $this->request->data);
            if ($this->ApplicantsPins->save($applicantsPin)) {
                $this->Flash->success(__('The applicants pin has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The applicants pin could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('applicantsPin', 'applicants'));
        $this->set('_serialize', ['applicantsPin']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Applicants Pin id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $applicantsPin = $this->ApplicantsPins->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $applicantsPin = $this->ApplicantsPins->patchEntity($applicantsPin, $this->request->data);
            if ($this->ApplicantsPins->save($applicantsPin)) {
                $this->Flash->success(__('The applicants pin has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The applicants pin could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('applicantsPin', 'applicants'));
        $this->set('_serialize', ['applicantsPin']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Applicants Pin id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $applicantsPin = $this->ApplicantsPins->get($id);
        if ($this->ApplicantsPins->delete($applicantsPin)) {
            $this->Flash->success(__('The applicants pin has been deleted.'));
        } else {
            $this->Flash->error(__('The applicants pin could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
