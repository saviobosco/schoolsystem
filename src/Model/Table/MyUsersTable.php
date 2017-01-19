<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 10/5/16
 * Time: 5:54 PM
 */

namespace App\Model\Table;


use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use CakeDC\Users\Model\Table\UsersTable;

class MyUsersTable extends UsersTable
{
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->hasOne('Teacher',[
            'className' => 'Teacher.Teachers',
            'foreignKey' => 'id'
        ]);
    }

    public function afterSave(Event $event, Entity $entity)
    {

        // checks if it is the creation of a new user
        if ( $entity->isNew() ) {


            // check if the role is teacher
            if ( $entity['role'] === 'teacher' ) {
                $teachersTable = TableRegistry::get('Teacher.Teachers');
                $newTeacher = $teachersTable->newEntity(['id' => $entity->id,
                                                        'first_name' => $entity->first_name,
                                                        'last_name' => $entity->last_name
                ]);
                $teachersTable->save($newTeacher);
            }
        }
    }

}