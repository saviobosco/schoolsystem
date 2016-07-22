<?php
namespace App\Controller;

use App\Controller\AppController;
use RandomLib\Factory;
use SecurityLib\Strength;

/**
 * StudentResultPins Controller
 *
 * @property \App\Model\Table\StudentResultPinsTable $StudentResultPins
 */
class StudentResultPinsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function printPin()
    {
        $this->paginate = [
            'conditions' => ['student_id IS NULL']
        ];
        $studentResultPins = $this->paginate($this->StudentResultPins);

        $this->set(compact('studentResultPins'));
        $this->set('_serialize', ['studentResultPins']);
    }

    public function generatePin()
    {
        $factory = new Factory();
        $generator = $factory->getGenerator(new Strength(Strength::MEDIUM));
        $this->loadModel('ApplicantsPins');
        $pins = array();
        if ($this->request->is(['patch', 'post', 'put'])) {
            $number = $this->request->data('number_to_generate');
            for ($num = 0; $num < $number ; $num++ ){
                $pin =  $generator->generateInt(1000000000,2100000000);
                $serial_number = $generator->generateInt(13451,58794);
                if($this->request->data['save_to_database']){
                    $this->StudentResultPins->savePin($serial_number,$pin); }
                array_push($pins,$pin);
            }
            $this->Flash->success(__('{0} pins were sucessfully generated',count($pins)));
        }
        $title = 'Generate New Pins';
        $this->set(compact('pins','title'));
        $this->set('_serialize', ['pins']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Student Result Pin id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $studentResultPin = $this->StudentResultPins->get($id);
        if ($this->StudentResultPins->delete($studentResultPin)) {
            $this->Flash->success(__('The student result pin has been deleted.'));
        } else {
            $this->Flash->error(__('The student result pin could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
