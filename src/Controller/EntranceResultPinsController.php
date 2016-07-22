<?php
namespace App\Controller;

use App\Controller\AppController;
use RandomLib\Factory;
use SecurityLib\Strength;

/**
 * EntranceResultPins Controller
 *
 * @property \App\Model\Table\EntranceResultPinsTable $EntranceResultPins
 */
class EntranceResultPinsController extends AppController
{

    public $helpers = ['Cewi/Excel.Excel'];
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function printPin()
    {
        $this->paginate = [
            'conditions' => ['applicant_id IS NULL']
        ];
        $entranceResultPins = $this->paginate($this->EntranceResultPins);

        $this->set(compact('entranceResultPins'));
        $this->set('_serialize', ['entranceResultPins']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Entrance Result Pin id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $entranceResultPin = $this->EntranceResultPins->get($id);
        if ($this->EntranceResultPins->delete($entranceResultPin)) {
            $this->Flash->success(__('The entrance result pin has been deleted.'));
        } else {
            $this->Flash->error(__('The entrance result pin could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
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
                    $this->EntranceResultPins->savePin($serial_number,$pin); }
                array_push($pins,$pin);
            }
            $this->Flash->success(__('{0} pins were sucessfully generated',count($pins)));
        }
        $title = 'Generate New Pins';
        $this->set(compact('pins','title'));
        $this->set('_serialize', ['pins']);
    }

    public function excelFormat()
    {
        $entranceResultPins = $this->EntranceResultPins->find('all')->select(['serial_number','pin'])->where(['applicant_id IS NULL']);

        $this->set(compact('entranceResultPins'));
        $this->set('_serialize', ['entranceResultPins']);
    }
}
