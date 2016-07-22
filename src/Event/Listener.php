<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 5/30/16
 * Time: 3:21 PM
 */

namespace App\Event;


use App\Controller\AppController;
use Cake\Event\Event;
use CakeDC\Users\Controller\Component\UsersAuthComponent;
use Cake\Log\Log;
use Cake\Datasource\ConnectionManager;


class Listener extends AppController
{
    public function implementedEvents()
    {
        return [
            UsersAuthComponent::EVENT_BEFORE_LOGOUT => 'beforeLogout',
            UsersAuthComponent::EVENT_AFTER_LOGOUT => 'logoutRedirect',
            //UsersAuthComponent::EVENT_AFTER_LOGIN => 'afterLoginRedirect'
        ];
    }

    /**
     * @param $event
     */
    public function beforeLogout($event)
    {
        $connection = ConnectionManager::get('default');
        $connection->update('users', ['last_seen' => date('Y-m-d H:i:s')],['id' => $this->request->session()->read('Auth.User.id')]);
        Log::write(
            'info',
            'The user '.$this->request->session()->read('Auth.User.id').' has logged out'
        );
    }

    public function logoutRedirect()
    {
        return [
            'plugin' => null,
            'controller'=>'Admins',
            'action' => 'login'
        ];
    }

    public function afterLoginRedirect()
    {
        $role = $this->request->session()->read('Auth.User.role');
        switch ($role) {
            case 'student' :
                return [
                    'plugin' => null,
                    'controller'=>'Students',
                    'action' => 'home'
                ];
            break;
            case 'admin' :
                return [
                    'plugin' => null,
                    'controller'=>'Admins',
                    'action' => 'login'
                ];
            break;
            default:
                return [
                    'plugin' => null,
                    'controller'=>'Admins',
                    'action' => 'login'
                ];
        }
    }
}