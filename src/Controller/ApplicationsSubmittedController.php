<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * ApplicationsSubmitted Controller
 *
 * @property \App\Model\Table\ApplicationsSubmittedTable $ApplicationsSubmitted
 */
class ApplicationsSubmittedController extends AppController
{

    public $helpers = ['Cewi/Excel.Excel'];

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */

    /**
     * @param Event $event
     */
    public function beforeFilter(Event $event)
    {
        $this->Auth->allow([
            'add',
            'checkEntranceResult',
            'success',
            'entranceResult',
            'interviewResult',
            'checkAdmissionStatus',
            'admissionLetter',
            'checkNewStudentRegistration',
            'pdfViewing'
        ]);

    }

    public function add()
    {
        if (!$this->request->session()->check('Applicant')){
            return $this->redirect(['controller'=>'Applicants','action'=>'applicant_login']);
        }

        $applicant = $this->ApplicationsSubmitted->newEntity();

        if ($this->request->is('post')) {
            $applicant = $this->ApplicationsSubmitted->patchEntity($applicant, $this->request->data,['associated'=>'Files']);
            $result = $this->ApplicationsSubmitted->save($applicant);
            if ($result) {
                $this->ApplicationsSubmitted->deletePin($this->request->session()->read('Applicant.id'));
                $this->killSession();
                $this->Flash->success(__('Your application has been successfully submitted'));
                return $this->redirect(['action' => 'success',$result->id]);
            } else {
                $this->Flash->error(__('The application could not be submitted. Please, try again.'));
            }
        }
        $schools = $this->ApplicationsSubmitted->Schools->find('list', ['limit' => 200]);
        $title = 'New Application';
        $this->set(compact('applicant', 'schools','title'));
        $this->set('_serialize', ['applicant']);
    }

    public function killSession()
    {
        $this->request->session()->destroy();
    }

    public function index()
    {
        $this->paginate = [
            'contain' => ['Schools']
        ];
        $applicationsSubmitted = $this->paginate($this->ApplicationsSubmitted);
        $title = 'List of Applicants';
        $this->set(compact('applicationsSubmitted','title'));
        $this->set('_serialize', ['applicationsSubmitted']);
    }

    /**
     * View method
     *
     * @param string|null $id Applications Submitted id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $applicationsSubmitted = $this->ApplicationsSubmitted->get($id, [
            'contain' => ['Schools', 'EntranceResults']
        ]);
        $title = 'Viewing Applicant '.$applicationsSubmitted->id;
        $this->set(compact('applicationsSubmitted','title'));
        $this->set('_serialize', ['applicationsSubmitted']);
    }


    /**
     * Delete method
     *
     * @param string|null $id Applications Submitted id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $applicationsSubmitted = $this->ApplicationsSubmitted->get($id);
        if ($this->ApplicationsSubmitted->delete($applicationsSubmitted)) {
            $this->Flash->success(__('The applicant has been deleted.'));
        } else {
            $this->Flash->error(__('The applicant could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }


    public function success($id = null)
    {
        $applicationsSubmitted = $this->ApplicationsSubmitted->get($id, [
            'contain' => ['Schools', 'ApplicantsEntranceResults']
        ]);
        $title = 'Application was successful';
        $this->set(compact('applicationsSubmitted','title'));
        $this->set('_serialize', ['applicationsSubmitted']);
    }

    public function checkEntranceResult()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pin = $this->ApplicationsSubmitted->EntrancePins->checkPin($this->request->data('pin')); // checks if the pin is in the database.
            /* checks if the variable contains a value */
            if($pin != null){
                if($this->_checkApplicantIdResult($pin->applicant_id,$pin->pin,$pin->exam_type)){
                    // if everything is ok redirect to result page
                    // check the exam type
                    if($this->request->data('exam_type') == 1) {
                        return $this->redirect(['action' => 'entranceResult']);
                    } elseif ($this->request->data('exam_type') == 2 ) {
                        return $this->redirect(['action' => 'interviewResult']);
                    }
                } 
            } else {
                $this->Flash->error(__('Incorrect registration number or Invalid pin'));
            }
        }
        $this->set(compact('student'));
        $this->set('_serialize', ['student']);
    }

    protected function _checkApplicantIdResult($student_id,$pin,$exam_type)
    {
        $session = $this->request->session();
        if(!empty($student_id)){
            // the submitted number against the stored number
            if($student_id === $this->request->data('reg_number')){
                if ($exam_type == $this->request->data('exam_type')) {
                    $session->write(['Applicant.'.$exam_type.'.id'=> $student_id]);
                    return true;
                } else {
                    if ($exam_type == 1) {
                        $this->Flash->error(__('This pin has been used by you to check your entrance result'));
                    } else { $this->Flash->error(__('This pin has been used by you to check interview result')); }
                    return false;
                }
            }else{
                $this->Flash->error(__('Incorrect registration number or pin'));
                return false;
            }
        }else{
            $applicant = $this->ApplicationsSubmitted->find()->where(['id'=>$this->request->data('reg_number')])->first();
            if(!empty($applicant)){
                //update student in resultPins table
                $this->ApplicationsSubmitted->EntrancePins->updateStudentPin($pin,$applicant->id,$this->request->data('exam_type'));
                $session->write(['Applicant.'.$this->request->data('exam_type').'.id'=> $applicant->id]);
                return true; 
            }
            return false;
        }
    }

    public function entranceResult()
    {
        if (!$this->request->session()->check('Applicant.1.id')){
            return $this->redirect(['controller'=>'ApplicationsSubmitted','action'=>'checkEntranceResult']);
        }
        $result = $this->ApplicationsSubmitted->getEntranceResult($this->request->session()->read('Applicant.1.id'));
        $this->set(compact('result'));
    }

    public function interviewResult()
    {
        if (!$this->request->session()->check('Applicant.2.id')){
            return $this->redirect(['controller'=>'ApplicationsSubmitted','action'=>'checkEntranceResult']);
        }
        $result = $this->ApplicationsSubmitted->getInterviewResult($this->request->session()->read('Applicant.2.id'));
        $this->set(compact('result'));
    }

    public function admission()
    {
        $this->paginate = [
            'contain' => ['EntranceResults','InterviewResults'],
            'conditions' => ['admission_status' => '0']
        ];

        if ($this->request->is(['patch', 'post', 'put'])) {
            if(is_array($this->request->data('id'))){
                for ($num =0; $num < count($this->request->data('id')); $num++ ) {
                    $this->ApplicationsSubmitted->offerAdmission($this->request->data['id'][$num]);
                }
                $this->Flash->success(__('{0} students admitted',count($this->request->data('id'))));
            }
        }
        try {
            $applicants = $this->paginate($this->ApplicationsSubmitted);
        } catch (\Exception $e)
        {}
        $this->set(compact('applicants'));
        $this->set('_serialize', ['applicants']);
    }

    public function admittedStudents()
    {
        $this->paginate = [
            'contain' => [],
            'conditions' => ['admission_status' => '1']
        ];
        try {
            $applicants = $this->paginate($this->ApplicationsSubmitted);
        } catch (\Exception $e)
        { }
        $this->set(compact('applicants'));
        $this->set('_serialize', ['applicants']);
    }

    public function checkAdmissionStatus()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $status = $this->ApplicationsSubmitted->checkAdmissionStatus($this->request->data('reg_number'));
            /* checks if the variable contains a value */
            if ($status) {
                if ($status->admission_status) {
                    $this->request->session()->write(['Admission.id'=>$status->id]);
                    return $this->redirect(['controller' => 'ApplicationsSubmitted','action' => 'admission_letter']);
                }
                $this->Flash->error(__('No admission yet'));
            } else {
                $this->Flash->error(__('Incorrect registration number'));
            }
        }
        $this->set(compact('student'));
        $this->set('_serialize', ['student']);
    }

    public function admissionLetter()
    {
        if (!$this->request->session()->check('Admission.id')){
            return $this->redirect(['controller'=>'ApplicationsSubmitted','action'=>'check_admission_status']);
        }
        $result = $this->ApplicationsSubmitted->get($this->request->session()->read('Admission.id'));
        $this->set(compact('result'));
    }

    public function checkNewStudentRegistration()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $status = $this->ApplicationsSubmitted->checkAdmissionStatus($this->request->data('reg_number'));
            /* checks if the variable contains a value */
            if ($status) {
                if ($status->admission_status) {
                    $this->request->session()->write(['NewStudent.id'=>$status->id]);
                    return $this->redirect(['controller' => 'Students','action' => 'new_student']);
                }
                $this->Flash->error(__('No admission yet'));
            } else {
                $this->Flash->error(__('Incorrect registration number'));
            }
        }
        $this->set(compact('student'));
        $this->set('_serialize', ['student']);
    }
}
