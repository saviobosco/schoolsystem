<?php
namespace ResultSystem\Controller;

use ResultSystem\Controller\Traits\SearchParameterTrait;
use ResultSystem\Controller\AppController;

/**
 * Students Controller
 *
 * @property \ResultSystem\Model\Table\StudentsTable $Students
 */
class StudentsController extends AppController
{
    use SearchParameterTrait ;
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Sessions', 'Classes', 'ClassDemacations']
        ];
        $students = $this->paginate($this->Students);

        $sessions = $this->Students->Sessions->find('list',['limit' => 200]);
        $classes = $this->Students->Classes->find('list',['limit' => 200]);
        $this->set(compact('students','classes','sessions'));
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
        $student = $this->Students->get($id, [
            'contain' => ['Sessions',
                'Classes',
                'ClassDemacations',
                'StudentAnnualPositionOnClassDemacations',
                'StudentAnnualPositions',
                'StudentAnnualResults',
                'StudentAnnualSubjectPositionOnClassDemacations',
                'StudentAnnualSubjectPositions',
                'StudentTermlyPositionOnClassDemacations',
                'StudentTermlyPositions',
                'StudentTermlyResults',
                'StudentTermlySubjectPositionOnClassDemacations',
                'StudentTermlySubjectPositions']
        ]);

        $sessions = $this->Students->Sessions->find('list',['limit' => 200])->toArray();
        $classes = $this->Students->Classes->find('list',['limit' => 200])->toArray();
        $this->loadModel('App.Subjects');
        $subjects = $this->Subjects->find('list',['limit'=> 200])->toArray();
        $this->set(compact('student','sessions','classes','subjects'));
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
            if ($this->Students->save($student)) {
                $this->Flash->success(__('The student has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The student could not be saved. Please, try again.'));
            }
        }
        $sessions = $this->Students->Sessions->find('list', ['limit' => 200]);
        $classes = $this->Students->Classes->find('list', ['limit' => 200]);
        $classDemacations = $this->Students->ClassDemacations->find('list', ['limit' => 200]);
        $this->set(compact('student', 'sessions', 'classes', 'classDemacations'));
        $this->set('_serialize', ['student']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Student id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function editResult($id = null)
    {
        if ( isset($this->request->query['term_id']) && $this->request->query['term_id'] == 4 ) {

            $student = $this->Students->get($id, [
                'contain' => [
                    'StudentAnnualResults' => ['conditions' => [
                        'StudentAnnualResults.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                        'StudentAnnualResults.class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1)
                        ]
                    ],
                ],
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $student = $this->Students->patchEntity($student, $this->request->data);
                if ($this->Students->save($student)) {
                    $this->Flash->success(__('The student has been saved.'));

                } else {
                    $this->Flash->error(__('The student could not be saved. Please, try again.'));
                }
            }
            $sessions = $this->Students->Sessions->find('list', ['limit' => 200])->toArray();
            $classes = $this->Students->Classes->find('list', ['limit' => 200])->toArray();

            // loads the subjects Model Table
            $this->loadModel('App.Subjects');
            $subjects = $this->Subjects->find('list',['limit'=> 200])->toArray();
            // loads the terms Model Table
            $this->loadModel('Terms');
            $terms = $this->Terms->find('list',['limit'=> 200])->toArray();
            $this->set(compact('student', 'sessions', 'classes', 'classDemacations','subjects','terms'));
            $this->set('_serialize', ['student']);
            $this->render('edit_annual_result');

        } else {

            $student = $this->Students->get($id, [
                'contain' => [
                    'StudentTermlyResults' => ['conditions' => [
                        'StudentTermlyResults.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                        'StudentTermlyResults.class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1),
                        'StudentTermlyResults.term_id' => @$this->_getDefaultValue($this->request->query['term_id'],1)
                         ]
                    ],
                ]
            ]);
            if ($this->request->is(['patch', 'post', 'put'])) {
                $student = $this->Students->patchEntity($student, $this->request->data);
                if ($this->Students->save($student)) {
                    $this->Flash->success(__('The student has been saved.'));

                } else {
                    $this->Flash->error(__('The student could not be saved. Please, try again.'));
                }
            }
            $sessions = $this->Students->Sessions->find('list', ['limit' => 200])->toArray();
            $classes = $this->Students->Classes->find('list', ['limit' => 200])->toArray();
            $this->loadModel('App.Subjects');
            $subjects = $this->Subjects->find('list',['limit'=> 200])->toArray();
            $this->loadModel('Terms');
            $terms = $this->Terms->find('list',['limit'=> 200])->toArray();
            $this->set(compact('student', 'sessions', 'classes', 'classDemacations','subjects','terms'));
            $this->set('_serialize', ['student']);
            $this->render('edit_termly_result');
        }

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

        return $this->redirect(['action' => 'index']);
    }
}
