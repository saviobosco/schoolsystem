<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\Network\Exception\NotFoundException;

/**
 * Applicants Controller
 *
 * @property \App\Model\Table\ApplicantsTable $Applicants
 */
class ApplicantsController extends AppController
{
    public function applicantLogin()
    {
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pin = $this->Applicants->checkpin($this->request->data['pin']);
            if ($pin != null) {
                // set applicant id to user session
                $this->request->session()->write(['Applicant.id'=> $pin->serial_number]);

                $this->redirect(['controller'=>'ApplicationsSubmitted','action'=> 'add']);
            } else {
                $this->Flash->error(__(' Invalid pin'));
            }
        }
        $this->set(['title'=>'Start New Application']);
    }



    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['applicantLogin']);
    }

}
