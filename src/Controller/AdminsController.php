<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/20/16
 * Time: 11:13 PM
 */

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Event\Event;
use RandomLib\Factory;
use SecurityLib\Strength;
use CakeDC\Users\Controller\Traits\LoginTrait;
use CakeDC\Users\Controller\Traits\RegisterTrait;
use CakeDC\Users\Controller\Traits\ProfileTrait;
/**
 * Admins Controller
 *
 * @property \App\Model\Table\MyUsersTable $MyUsers
 */
class AdminsController extends AppController
{

    use LoginTrait;
    use RegisterTrait;
    use ProfileTrait;
    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadModel('MyUsers');
    }

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['logout']);
    }
    public function index()
    {
        $users = $this->paginate($this->MyUsers);

        $title = 'All Admins';
        $this->set(compact('users','schools','title'));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->MyUsers->get($id);

        $title = 'Viewing Admin '.$user->id;
        $this->set(compact('user','title'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->MyUsers->newEntity();
        if ($this->request->is('post')) {
            $user = $this->MyUsers->patchEntity($user, $this->request->data);
            if ($this->MyUsers->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $title = 'Add New Admin';
        $this->set(compact('user','title'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->MyUsers->get($id);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->MyUsers->patchEntity($user, $this->request->data);
            if ($this->MyUsers->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $title = 'Editing Admin '.$user->id;
        $this->set(compact('user','title'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->MyUsers->get($id);
        if ($this->MyUsers->delete($user)) {
            $this->Flash->success(__('The teacher has been deleted.'));
        } else {
            $this->Flash->error(__('The teacher could not be deleted. Please, try again.'));
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
                $pin =  $generator->generateInt(1000000000,2000000000);
                $serial_number = $generator->generateInt(12345, 56743);
                if($this->request->data['save_to_database']){
                $this->ApplicantsPins->savePin($serial_number,$pin); }
                array_push($pins,$pin);
            }
            $this->Flash->success(__('{0} pins were sucessfully generated',count($pins)));
        }
        $title = 'Generate New Pins';
        $this->set(compact('pins','title'));
        $this->set('_serialize', ['pins']);
    }

    public function printPin()
    {
        $this->loadModel('ApplicantsPins');
        $pins = $this->ApplicantsPins->find('all');

        $title = 'Generated Pins';
        $this->set(compact('pins','title'));
        $this->set('_serialize', ['pins']);
    }

    public function addApplicant()
    {
        $this->loadModel('ApplicationsSubmitted');
        $applicant = $this->ApplicationsSubmitted->newEntity();

        if ($this->request->is('post')) {
            $applicant = $this->ApplicationsSubmitted->patchEntity($applicant, $this->request->data);
            if ($result = $this->ApplicationsSubmitted->save($applicant)) {
                $this->Flash->success(__('The application has been successfully created'));
                return $this->redirect(['action' => 'addApplicant']);
            } else {
                $this->Flash->error(__('The application could not be created. Please, try again.'));
            }
        }
        $schools = $this->ApplicationsSubmitted->Schools->find('list', ['limit' => 200]);
        $title = 'New Application';
        $this->set(compact('applicant', 'schools','title'));
        $this->set('_serialize', ['applicant']);
    }

    public function siteConfig()
    {

    }

    public function dashboard()
    {

    }
}