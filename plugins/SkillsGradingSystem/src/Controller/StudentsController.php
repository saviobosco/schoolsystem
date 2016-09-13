<?php
namespace SkillsGradingSystem\Controller;

use App\Controller\Traits\SearchParameterTrait;
use SkillsGradingSystem\Controller\AppController;

/**
 * Students Controller
 *
 * @property \SkillsGradingSystem\Model\Table\StudentsTable $Students
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

        $this->set(compact('students'));
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
                'ClassDemacations',
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
        $sessions = $this->Students->Sessions->find('list', ['limit' => 200]);
        $classes = $this->Students->Classes->find('list', ['limit' => 200]);
        $terms = $this->Terms->find('list', ['limit' => 200]);
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
        $student = $this->Students->get($id, [
            'contain' => ['StudentsAffectiveDispositionScores','StudentsPsychomotorSkillScores']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $student = $this->Students->patchEntity($student, $this->request->data);

            if ($this->Students->save($student)) {
                $this->Flash->success(__('The student has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The student could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('AffectiveDispositions');
        $this->loadModel('PsychomotorSkills');
        $affectiveSkills = $this->AffectiveDispositions->find('all')->toArray();
        $psychomotorSkills = $this->PsychomotorSkills->find('all')->toArray();
        $sessions = $this->Students->Sessions->find('list', ['limit' => 200]);
        $classes = $this->Students->Classes->find('list', ['limit' => 200]);
        $classDemacations = $this->Students->ClassDemacations->find('list', ['limit' => 200]);
        $this->set(compact('student', 'sessions', 'classes', 'classDemacations','affectiveSkills','psychomotorSkills'));
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
                $this->Flash->success(__('The student has been saved.'));

            } else {
                $this->Flash->error(__('The student could not be saved. Please, try again.'));
            }
        }
        $this->loadModel('AffectiveDispositions');
        $this->loadModel('PsychomotorSkills');
        $this->loadModel('Terms');
        $affectiveSkills = $this->AffectiveDispositions->find('all')->toArray();
        $psychomotorSkills = $this->PsychomotorSkills->find('all')->toArray();
        $sessions = $this->Students->Sessions->find('list', ['limit' => 200]);
        $classes = $this->Students->Classes->find('list', ['limit' => 200]);
        $terms = $this->Terms->find('list', ['limit' => 200]);
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
