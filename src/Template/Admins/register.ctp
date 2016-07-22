<?php
/**
 * Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright 2010 - 2015, Cake Development Corporation (http://cakedc.com)
 * @license MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
 $this->assign('title',$title);
use Cake\Core\Configure;
?>
<div class="container m-t-5">
    <div class="row">
        <div class="col-sm-12">
            <div class="login">
                <?= $this->Flash->render('auth') ?>
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h5>Create an account</h5>
                    </div>
                    <div class="panel-body">
                        <?= $this->Form->create($user); ?>
                        <fieldset>
                            <?php
                            echo $this->Form->input('username',['class'=>'form-control']);
                            echo $this->Form->input('email',['class'=>'form-control']);
                            echo $this->Form->input('password',['class'=>'form-control']);
                            echo $this->Form->input('password_confirm', ['type' => 'password','class'=>'form-control']);
                            echo $this->Form->input('first_name',['class'=>'form-control']);
                            echo $this->Form->input('last_name',['class'=>'form-control']);
                            if (Configure::read('Users.Tos.required')) {
                                echo $this->Form->input('tos', ['type' => 'checkbox', 'label' => __d('Users', 'Accept TOS conditions?'), 'required' => true]);
                            }
                            if (Configure::read('Users.reCaptcha.registration')) {
                                echo $this->User->addReCaptcha();
                            }
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__d('Users', 'Submit')) ?>
                        <?= $this->Form->end() ?>
                    </div>
                    <div class="panel-footer text-center ">copyright <a class="text-orange" href="http://crack-reactor.com" target="_blank" >CrackReactor</a></div>
                </div>
            </div>
        </div>
    </div>
</div>



