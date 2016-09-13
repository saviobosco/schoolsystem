<?php
namespace ResultSystem\Controller;

use ResultSystem\Controller\AppController;

/**
 * StudentTermlyResults Controller
 *
 * @property \ResultSystem\Model\Table\StudentTermlyResultsTable $StudentTermlyResults
 */
class StudentTermlyResultsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('ResultSystem.ResultSystem');
    }

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Students', 'Subjects', 'Classes', 'Terms', 'Sessions']
        ];
        $studentTermlyResults = $this->paginate($this->StudentTermlyResults);

        $this->set(compact('studentTermlyResults'));
        $this->set('_serialize', ['studentTermlyResults']);
    }

    /**
     * View method
     *
     * @param string|null $id Student Termly Result id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $studentTermlyResult = $this->StudentTermlyResults->get($id, [
            'contain' => ['Students', 'Subjects', 'Classes', 'Terms', 'Sessions']
        ]);

        $this->set('studentTermlyResult', $studentTermlyResult);
        $this->set('_serialize', ['studentTermlyResult']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $studentTermlyResult = $this->StudentTermlyResults->newEntity();
        if ($this->request->is('post')) {
            $studentTermlyResult = $this->StudentTermlyResults->patchEntity($studentTermlyResult, $this->request->data);
            if ($this->StudentTermlyResults->save($studentTermlyResult)) {
                $this->Flash->success(__('The student termly result has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The student termly result could not be saved. Please, try again.'));
            }
        }
        $students = $this->StudentTermlyResults->Students->find('list', ['limit' => 200]);
        $subjects = $this->StudentTermlyResults->Subjects->find('list', ['limit' => 200]);
        $classes = $this->StudentTermlyResults->Classes->find('list', ['limit' => 200]);
        $terms = $this->StudentTermlyResults->Terms->find('list', ['limit' => 200]);
        $sessions = $this->StudentTermlyResults->Sessions->find('list', ['limit' => 200]);
        $this->set(compact('studentTermlyResult', 'students', 'subjects', 'classes', 'terms', 'sessions'));
        $this->set('_serialize', ['studentTermlyResult']);
    }

    public function uploadResult()
    {
        if ($this->request->is('post')) {
            $studentTermlyResult = $this->StudentTermlyResults->find('all')
                ->where([
                    'class_id' => $this->request->data['class_id'],
                    'term_id'=>$this->request->data['term_id'],
                    'session_id' => $this->request->data['session_id']
                ]);

            $datas = $this->Import->prepareEntityData($this->request->data['result']['tmp_name']);

            $arrays = $this->ResultSystem->formatArrayData($datas,$this->request->data['type'],
                                                            $this->request->data['class_id'],
                                                            $this->request->data['term_id']
                                                            ,$this->request->data['session_id']);

            $studentTermlyResult = $this->StudentTermlyResults->patchEntities($studentTermlyResult, $arrays);

            if ($this->StudentTermlyResults->saveMany($studentTermlyResult)) {
                $this->Flash->success(__('The student termly result has been saved.'));

            } else {
                $this->Flash->error(__('The student termly result could not be saved. Please, try again.'));
            }
        }
        $classes = $this->StudentTermlyResults->Classes->find('list', ['limit' => 6]);
        $terms = $this->StudentTermlyResults->Terms->find('list', ['limit' => 3]);
        $sessions = $this->StudentTermlyResults->Sessions->find('list', ['limit' => 200]);
        $this->set(compact('classes', 'terms', 'sessions'));
        $this->set('_serialize', ['studentTermlyResult']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Student Termly Result id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $studentTermlyResult = $this->StudentTermlyResults->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $studentTermlyResult = $this->StudentTermlyResults->patchEntity($studentTermlyResult, $this->request->data);
            if ($this->StudentTermlyResults->save($studentTermlyResult)) {
                $this->Flash->success(__('The student termly result has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The student termly result could not be saved. Please, try again.'));
            }
        }
        $students = $this->StudentTermlyResults->Students->find('list', ['limit' => 200]);
        $subjects = $this->StudentTermlyResults->Subjects->find('list', ['limit' => 200]);
        $classes = $this->StudentTermlyResults->Classes->find('list', ['limit' => 200]);
        $terms = $this->StudentTermlyResults->Terms->find('list', ['limit' => 200]);
        $sessions = $this->StudentTermlyResults->Sessions->find('list', ['limit' => 200]);
        $this->set(compact('studentTermlyResult', 'students', 'subjects', 'classes', 'terms', 'sessions'));
        $this->set('_serialize', ['studentTermlyResult']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Student Termly Result id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $studentTermlyResult = $this->StudentTermlyResults->get($id);
        if ($this->StudentTermlyResults->delete($studentTermlyResult)) {
            $this->Flash->success(__('The student termly result has been deleted.'));
        } else {
            $this->Flash->error(__('The student termly result could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
