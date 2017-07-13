<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/21/16
 * Time: 4:15 AM
 */

namespace ResultSystem\Controller;

use ResultSystem\Controller\AppController;
use ResultSystem\ResultProcessing\AnnualResultProcessing;
use ResultSystem\ResultProcessing\TermlyResultProcessing;
use ResultSystem\ResultProcessing\ClassCount;
use ResultSystem\Model\Entity\GradeableTrait;

class ResultProcessingController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Queue.QueuedTasks');
    }

    // Todo : Complete this result processing algorithm (manually use no of subjects for average calculation)
    public function index()
    {

        if ( $this->request->is(['patch', 'post', 'put']) ) {
            //debug($this->request->data); exit;

            $this->processResult($this->request->data['class_id'],$this->request->data['term_id'],$this->request->data['session_id'],$this->request->data['no_of_subjects']);
            /*if ($this->QueuedTasks->createJob('ResultProcessing',$this->request->data)) {

                $this->Flash->greatSuccess(__('The task was successfully added'));
            } else {
                $this->Flash->error(__('The student could not be saved. Please, try again.'));
            }*/

        }

        $this->loadModel('App.Sessions');
        $this->loadModel('App.Classes');
        $this->loadModel('Terms');

        $sessions = $this->Sessions->find('list',['limit' => 200]);
        $classes = $this->Classes->find('list',['limit' => 10 ]);
        $terms = $this->Terms->find('list',['limit' => 3 ]);
        $this->set(compact('sessions','classes','terms'));
    }


    protected function processResult($class_id,$term_id,$session_id,$no_of_subjects)
    {
        // initialize the ClassCount Class .
        $classCount = new ClassCount();


            // process the result with the supplied parameters
            $termlyResultProcessing  = new TermlyResultProcessing();

            $termlyResultProcessing->calculateTermlyTotalAndAverage($class_id,$term_id,$session_id,$no_of_subjects);
        // check is the cal_student_position is checked and calculate student positions
        if ($this->request->data['cal_student_position']) {
            $termlyResultProcessing->calculateTermlyPosition($class_id,$term_id,$session_id);
        }

        if ($this->request->data['cal_subject_position']) {
            $termlyResultProcessing->calculateStudentTermlySubjectPosition($class_id,$term_id,$session_id);
        }

        if ($this->request->data['cal_class_average']) {
            $termlyResultProcessing->calculateSubjectClassAverage($class_id,$term_id,$session_id);
        }

            if ($termlyResultProcessing->getStatus()) {
                $this->Flash->success('Successfully Calculated the students termly results ');
            }
            if ( isset($term_id ) && $term_id == 3  ) {

                $annualResultProcessing = new AnnualResultProcessing($class_id,$session_id);
                if ($annualResultProcessing->getStatus()) {
                    $this->Flash->success('Successfully Calculated the students annual results');
                }
            }
            $classCount->getStudentNumberInClasses($class_id,$session_id,$term_id);

    }

}