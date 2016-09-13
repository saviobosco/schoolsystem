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

}