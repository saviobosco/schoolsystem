<?php
namespace SkillsGradingSystem\Controller;

use App\Controller\Traits\SearchParameterTrait;
use SkillsGradingSystem\Controller\AppController;

/**
 * Students Controller
 *
 * @property \SkillsGradingSystem\Model\Table\StudentsTable $Students
 * @property \SkillsGradingSystem\Model\Table\AffectiveDispositionsTable $AffectiveDispositions
 * @property \SkillsGradingSystem\Model\Table\PsychomotorSkillsTable $PsychomotorSkills
 * @property \ResultSystem\Model\Table\TermsTable $Terms
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
        if ( empty($this->request->query['class_id'])) {
            $this->paginate = [
                'limit' => 50,
                'contain' => ['Sessions', 'Classes',],
                'conditions' => [
                    'Students.status'   => 1,
                    'Students.graduated'   => 0
                ],
                // Place the result in ascending order according to the class.
                'order' => [
                    'class_id' => 'asc'
                ]
            ];
        }
        else {
            $this->paginate = [
                'limit' => 50,
                'contain' => ['Sessions', 'Classes'],
                'conditions' => [
                    'Students.status'   => 1,
                    'Students.graduated'   => 0,
                    'Students.class_id' => $this->_getDefaultValue($this->request->query['class_id'],1)
                ]
            ];
        }
        $students = $this->paginate($this->Students);

        $sessions = $this->Students->Sessions->find('list', ['limit' => 200]);
        $classes = $this->Students->Classes->find('list', ['limit' => 200]);
        $this->set(compact('students','sessions','classes'));
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
            'contain' => [
                'Sessions',
                'Classes',
                'StudentsAffectiveDispositionScores' => [
                    'conditions' => [
                        'StudentsAffectiveDispositionScores.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                        'StudentsAffectiveDispositionScores.class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1),
                        'StudentsAffectiveDispositionScores.term_id' => @$this->_getDefaultValue($this->request->query['term_id'],1)
                    ]
                ],
                'StudentsPsychomotorSkillScores' => [
                    'conditions' => [
                        'StudentsPsychomotorSkillScores.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                        'StudentsPsychomotorSkillScores.class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1),
                        'StudentsPsychomotorSkillScores.term_id' => @$this->_getDefaultValue($this->request->query['term_id'],1)
                    ]
                ]
            ]
        ]);

        $this->loadModel('AffectiveDispositions');
        $this->loadModel('PsychomotorSkills');
        $this->loadModel('Terms');
        $affectiveSkills = $this->AffectiveDispositions->find('list')->toArray();
        $psychomotorSkills = $this->PsychomotorSkills->find('list')->toArray();
        $sessions = $this->Students->Sessions->find('list')->toArray();
        $classes = $this->Students->Classes->find('list')->toArray();
        $terms = $this->Terms->find('list')->toArray();
        $this->set(compact('student', 'sessions', 'classes','affectiveSkills','psychomotorSkills','terms'));
        $this->set('_serialize', ['student']);
    }

    /**
     * Add method
     * @param string|null $id Student id.
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($id = null)
    {
        $student = $this->Students->get($id, []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $this->Students->patchEntity($student, $this->request->data);

            if ($this->Students->save($student)) {
                $this->Flash->success(__('The student effective skills has been saved.'));

            } else {
                $this->Flash->error(__('The student effective skills could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('AffectiveDispositions');
        $this->loadModel('PsychomotorSkills');
        $this->loadModel('Terms');
        $affectiveSkills = $this->AffectiveDispositions->find('all')->toArray();
        $psychomotorSkills = $this->PsychomotorSkills->find('all')->toArray();
        $sessions = $this->Students->Sessions->find('list')->toArray();
        $classes = $this->Students->Classes->find('list')->toArray();
        $terms = $this->Terms->find('list')->toArray();
        $this->set(compact('student', 'sessions', 'classes','affectiveSkills','psychomotorSkills','terms'));
        $this->set('_serialize', ['student']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Student id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $student = $this->Students->get($id, [
            'contain' => [
                'StudentsAffectiveDispositionScores' => [
                    'conditions' => [
                        'StudentsAffectiveDispositionScores.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                        'StudentsAffectiveDispositionScores.class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1),
                        'StudentsAffectiveDispositionScores.term_id' => @$this->_getDefaultValue($this->request->query['term_id'],1)
                    ]
                ],
                'StudentsPsychomotorSkillScores' => [
                    'conditions' => [
                        'StudentsPsychomotorSkillScores.session_id' => @$this->_getDefaultValue($this->request->query['session_id'],1),
                        'StudentsPsychomotorSkillScores.class_id' => @$this->_getDefaultValue($this->request->query['class_id'],1),
                        'StudentsPsychomotorSkillScores.term_id' => @$this->_getDefaultValue($this->request->query['term_id'],1)
                    ]
                ]]
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $this->Students->patchEntity($student, $this->request->data);

            if ($this->Students->save($student)) {
                $this->Flash->success(__('The student effective skills has been saved.'));

            } else {
                $this->Flash->error(__('The student effective skills could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('AffectiveDispositions');
        $this->loadModel('PsychomotorSkills');
        $this->loadModel('Terms');
        $affectiveSkills = $this->AffectiveDispositions->find('all')->toArray();
        $psychomotorSkills = $this->PsychomotorSkills->find('all')->toArray();
        $sessions = $this->Students->Sessions->find('list', ['limit' => 200])->toArray();
        $classes = $this->Students->Classes->find('list', ['limit' => 200])->toArray();
        $terms = $this->Terms->find('list', ['limit' => 200])->toArray();
        $this->set(compact('student', 'sessions', 'classes','affectiveSkills','psychomotorSkills','terms'));
        $this->set('_serialize', ['student']);
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
