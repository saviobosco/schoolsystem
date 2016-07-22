<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ApplicantsEntranceResults Controller
 *
 * @property \App\Model\Table\ApplicantsEntranceResultsTable $ApplicantsEntranceResults
 */
class ApplicantsEntranceResultsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ApplicationsSubmitted']
        ];
        $applicantsEntranceResults = $this->paginate($this->ApplicantsEntranceResults);

        $this->set(compact('applicantsEntranceResults'));
        $this->set('_serialize', ['applicantsEntranceResults']);
    }

    /**
     * View method
     *
     * @param string|null $id Applicants Entrance Result id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $applicantsEntranceResult = $this->ApplicantsEntranceResults->get($id, [
            'contain' => ['ApplicationsSubmitted']
        ]);

        $this->set('applicantsEntranceResult', $applicantsEntranceResult);
        $this->set('_serialize', ['applicantsEntranceResult']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        if ($this->request->is('post')) {
            try {
                $data = $this->Import->prepareEntityData($this->request->data['result']['tmp_name'],['worksheet'=>'Sheet1']);
                $applicantsEntranceResult = $this->ApplicantsEntranceResults->newEntities($data);
                if($this->ApplicantsEntranceResults->saveResult($applicantsEntranceResult)){
                    $this->Flash->success(__('The applicants entrance result file was successfully uploaded.'));
                } else {
                    $this->Flash->error(__('The applicants entrance result file could not be uploaded. Please, try again.'));
                }}
            catch (\Exception $e) {
                $this->Flash->error(__('An error occurred while uploading the excel file.'));
            }
        }
        $this->set(compact('applicantsEntranceResult', 'result'));
        $this->set('_serialize', ['applicantsEntranceResult']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Applicants Entrance Result id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $applicantsEntranceResult = $this->ApplicantsEntranceResults->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $applicantsEntranceResult = $this->ApplicantsEntranceResults->patchEntity($applicantsEntranceResult, $this->request->data);
            if ($this->ApplicantsEntranceResults->save($applicantsEntranceResult)) {
                $this->Flash->success(__('The applicant entrance result has been saved.'));
                //return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The applicant entrance result could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('applicantsEntranceResult'));
        $this->set('_serialize', ['applicantsEntranceResult']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Applicants Entrance Result id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $applicantsEntranceResult = $this->ApplicantsEntranceResults->get($id);
        if ($this->ApplicantsEntranceResults->delete($applicantsEntranceResult)) {
            $this->Flash->success(__('The applicants entrance result has been deleted.'));
        } else {
            $this->Flash->error(__('The applicants entrance result could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
