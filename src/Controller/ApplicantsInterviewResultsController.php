<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ApplicantsInterviewResults Controller
 *
 * @property \App\Model\Table\ApplicantsInterviewResultsTable $ApplicantsInterviewResults
 */
class ApplicantsInterviewResultsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Applicants']
        ];
        $applicantsInterviewResults = $this->paginate($this->ApplicantsInterviewResults);

        $this->set(compact('applicantsInterviewResults'));
        $this->set('_serialize', ['applicantsInterviewResults']);
    }

    /**
     * View method
     *
     * @param string|null $id Applicants Interview Result id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $applicantsInterviewResult = $this->ApplicantsInterviewResults->get($id, [
            'contain' => ['Applicants']
        ]);

        $this->set('applicantsInterviewResult', $applicantsInterviewResult);
        $this->set('_serialize', ['applicantsInterviewResult']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->request->is('post')) {
            try {$data = $this->Import->prepareEntityData($this->request->data['result']['tmp_name'],['worksheet'=>'Sheet1']);
            $applicantsInterviewResult = $this->ApplicantsInterviewResults->newEntities($data);
            if($this->ApplicantsInterviewResults->saveResult($applicantsInterviewResult)){
                $this->Flash->success(__('The applicants interview result file was successfully uploaded.'));
            } else {
                $this->Flash->error(__('The applicants interview result file could not be uploaded. Please, try again.'));
            } }
            catch (\Exception $e) {
                $this->Flash->error(__('An error occurred while uploading the excel file.'));
            }
        }
        $this->set(compact('applicantsInterviewResult'));
        $this->set('_serialize', ['applicantsInterviewResult']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Applicants Interview Result id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $applicantsInterviewResult = $this->ApplicantsInterviewResults->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $applicantsInterviewResult = $this->ApplicantsInterviewResults->patchEntity($applicantsInterviewResult, $this->request->data);
            if ($this->ApplicantsInterviewResults->save($applicantsInterviewResult)) {
                $this->Flash->success(__('The applicants interview result has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The applicants interview result could not be saved. Please, try again.'));
            }
        }
        $applicants = $this->ApplicantsInterviewResults->Applicants->find('list', ['limit' => 200]);
        $this->set(compact('applicantsInterviewResult', 'applicants'));
        $this->set('_serialize', ['applicantsInterviewResult']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Applicants Interview Result id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $applicantsInterviewResult = $this->ApplicantsInterviewResults->get($id);
        if ($this->ApplicantsInterviewResults->delete($applicantsInterviewResult)) {
            $this->Flash->success(__('The applicants interview result has been deleted.'));
        } else {
            $this->Flash->error(__('The applicants interview result could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
