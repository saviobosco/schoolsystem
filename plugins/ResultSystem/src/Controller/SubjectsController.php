<?php
namespace ResultSystem\Controller;

use ResultSystem\Controller\AppController;
use ResultSystem\Controller\Traits\SearchParameterTrait;

/**
 * Subjects Controller
 *
 * @property \ResultSystem\Model\Table\SubjectsTable $Subjects
 */
class SubjectsController extends AppController
{
    use SearchParameterTrait;

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Blocks']
        ];
        $subjects = $this->paginate($this->Subjects);

        $this->set(compact('subjects'));
        $this->set('_serialize', ['subjects']);
    }

    /**
     * View method
     *
     * @param string|null $id Subject id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $subject = $this->Subjects->get($id, [
            'contain' => ['Blocks',
                'StudentAnnualResults',
                'StudentAnnualSubjectPositionOnClassDemacations',
                'StudentAnnualSubjectPositions',
                'StudentTermlyResults',
                'StudentTermlySubjectPositionOnClassDemacations',
                'StudentTermlySubjectPositions']
        ]);

        $this->set('subject', $subject);
        $this->set('_serialize', ['subject']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $subject = $this->Subjects->newEntity();
        if ($this->request->is('post')) {
            $subject = $this->Subjects->patchEntity($subject, $this->request->data);
            if ($this->Subjects->save($subject)) {
                $this->Flash->success(__('The subject has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The subject could not be saved. Please, try again.'));
            }
        }
        $blocks = $this->Subjects->Blocks->find('list', ['limit' => 200]);
        $this->set(compact('subject', 'blocks'));
        $this->set('_serialize', ['subject']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Subject id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function editResult($id = null)
    {
        $subject = $this->Subjects->get($id, [
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
            $subject = $this->Subjects->patchEntity($subject, $this->request->data);
            if ($this->Subjects->save($subject)) {
                $this->Flash->success(__('The subject has been saved.'));

            } else {
                $this->Flash->error(__('The subject could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('Classes');
        $this->loadModel('Sessions');
        $this->loadModel('Terms');
        $sessions = $this->Sessions->find('list',['limit' => 200 ]);
        $classes = $this->Classes->find('list',['limit' => 3 ])->where(['block_id' => $subject->block_id]);
        $terms  = $this->Terms->find('list',['limit' => 3 ]);
        $blocks = $this->Subjects->Blocks->find('list', ['limit' => 200]);
        $this->set(compact('subject', 'blocks','sessions','classes','terms'));
        $this->set('_serialize', ['subject']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Subject id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $subject = $this->Subjects->get($id);
        if ($this->Subjects->delete($subject)) {
            $this->Flash->success(__('The subject has been deleted.'));
        } else {
            $this->Flash->error(__('The subject could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function viewPosition($id = null )
    {
        if ( isset($this->request->query['term_id']) && $this->request->query['term_id'] == 4 ) {
            $subject = $this->Subjects->get($id, [
                'contain' => [
                    'Blocks',
                    'StudentAnnualSubjectPositionOnClassDemacations' => ['conditions' => [
                        'StudentAnnualSubjectPositionOnClassDemacations.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                        'StudentAnnualSubjectPositionOnClassDemacations.class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1)
                        ]
                    ],
                    'StudentAnnualSubjectPositions' => ['conditions' => [
                        'StudentAnnualSubjectPositions.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                        'StudentAnnualSubjectPositions.class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1)
                        ]
                    ],
                ]
            ]);

            $this->loadModel('Classes');
            $this->loadModel('Sessions');
            $this->loadModel('Terms');
            $sessions = $this->Sessions->find('list',['limit' => 200 ])->toArray();
            $classes = $this->Classes->find('list',['limit' => 3 ])->where(['block_id' => $subject->block_id])->toArray();
            $terms  = $this->Terms->find('list',['limit' => 4 ])->toArray();
            $this->set(compact('subject','sessions','classes','terms'));
            $this->set('_serialize', ['subject']);

            $this->render('view_annual_position');
        } else {

            $subject = $this->Subjects->get($id, [
                'contain' => [
                    'Blocks',
                    'StudentTermlySubjectPositionOnClassDemacations' => ['conditions' => [
                        'StudentTermlySubjectPositionOnClassDemacations.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                        'StudentTermlySubjectPositionOnClassDemacations.class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1),
                        'StudentTermlySubjectPositionOnClassDemacations.term_id' => @$this->_getDefaultValue($this->request->query['term_id'],1)

                    ]
                    ],
                    'StudentTermlySubjectPositions' => ['conditions' => [
                        'StudentTermlySubjectPositions.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                        'StudentTermlySubjectPositions.class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1),
                        'StudentTermlySubjectPositions.term_id' => @$this->_getDefaultValue($this->request->query['term_id'],1)

                    ]
                    ],
                ]
            ]);

            $this->loadModel('Classes');
            $this->loadModel('Sessions');
            $this->loadModel('Terms');
            $sessions = $this->Sessions->find('list',['limit' => 200 ])->toArray();
            $classes = $this->Classes->find('list',['limit' => 3 ])->where(['block_id' => $subject->block_id])->toArray();
            $terms  = $this->Terms->find('list',['limit' => 4 ])->toArray();
            $this->set(compact('subject','sessions','classes','terms'));
            $this->set('_serialize', ['subject']);

            $this->render('view_termly_position');
        }

    }
}
