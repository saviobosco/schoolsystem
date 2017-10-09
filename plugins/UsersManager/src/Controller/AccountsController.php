<?php
/**
 * Created by PhpStorm.
 * User: saviobosco
 * Date: 10/5/17
 * Time: 4:18 PM
 */

namespace UsersManager\Controller;

use Cake\Event\Event;
use CakeDC\Users\Controller\Traits\LoginTrait;
use CakeDC\Users\Controller\Traits\ProfileTrait;
use CakeDC\Users\Controller\Traits\ReCaptchaTrait;
use CakeDC\Users\Controller\Traits\RegisterTrait;
use CakeDC\Users\Controller\Traits\SimpleCrudTrait;

/**
 * MyUsers Controller
 *
 * @property \UsersManager\Model\Table\AccountsTable $Accounts
 */
class AccountsController extends AppController
{
    use LoginTrait;
    use ProfileTrait;
    use ReCaptchaTrait;
    use RegisterTrait;
    use SimpleCrudTrait;

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('UsersManager.Accounts');
    }

    public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['logout']);
        $this->Auth->deny(['register']);
    }

    public function add()
    {
        $table = $this->loadModel();
        $tableAlias = $table->getAlias();
        $entity = $table->newEntity();
        $roles = $this->Accounts->getRoles();
        $this->loadModel('StudentsManager.Students');
        $students = $this->Students->find('list');
        $this->set(compact('roles','students'));
        $this->set($tableAlias, $entity);
        $this->set('tableAlias', $tableAlias);
        $this->set('_serialize', [$tableAlias, 'tableAlias']);
        if (!$this->request->is('post')) {
            return;
        }
        $entity = $table->patchEntity($entity, $this->request->data);
        $singular = Inflector::singularize(Inflector::humanize($tableAlias));
        if ($table->save($entity)) {
            $this->Flash->success(__d('CakeDC/Users', 'The {0} has been saved', $singular));

            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__d('CakeDC/Users', 'The {0} could not be saved', $singular));
    }

    public function addStudent()
    {
        if ( $this->request->is('post')) {
            if ( $this->Accounts->checkIfRecordExists($this->request->getData('record_id'))) {
                $this->Flash->error(__('This user already has a login credentials '));
                return $this->redirect(['action'=>'add']);
            }
            $newAccount = $this->Accounts->newEntity();
            $newAccount = $this->Accounts->patchEntity($newAccount,$this->request->getData());
            $newAccount->role = 'student';
            if ( $this->Accounts->save($newAccount)) {
                $this->Flash->success(__('The student Account was successfully added'));
            } else {
                $this->Flash->error(__('The student Account could not be added'));
            }
        }
        return $this->redirect(['action'=>'add']);
    }


    public function teachers()
    {
        $this->paginate = [
            'conditions' => [
                'MyUsers.role'   => 'teacher',
            ],
        ];
        $users = $this->paginate($this->Accounts);

        $title = 'All Admins';
        $this->set(compact('users','schools','title'));
        $this->set('_serialize', ['users']);
    }

    public function students()
    {
        $this->paginate = [
            'conditions' => [
                'MyUsers.role'   => 'student',
            ],
        ];
        $users = $this->paginate($this->Accounts);

        $title = 'All Admins';
        $this->set(compact('users','schools','title'));
        $this->set('_serialize', ['users']);
    }

    public function parents()
    {
        $this->paginate = [
            'conditions' => [
                'MyUsers.role'   => 'parent',
            ],
        ];
        $users = $this->paginate($this->Accounts);

        $title = 'All Admins';
        $this->set(compact('users','schools','title'));
        $this->set('_serialize', ['users']);
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
        $user = $this->Accounts->get($id);
        if ($this->Accounts->delete($user)) {
            $this->Flash->success(__('The Admin has been deleted.'));
        } else {
            $this->Flash->error(__('The Admin could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

}