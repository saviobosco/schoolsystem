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
use Cake\Core\Configure;
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <div class="login">
                <?= $this->Flash->render('auth') ?>
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h5>Login</h5>
                    </div>
                    <div class="panel-body">
                        <?= $this->Form->create() ?>
                        <fieldset>
                            <?= $this->Form->input('username', ['required' => true,'class'=>'form-control']) ?>
                            <?= $this->Form->input('password', ['required' => true,'class'=>'form-control']) ?>
                            <?php
                            if (Configure::read('Users.reCaptcha.login')) {
                                echo $this->User->addReCaptcha();
                            }
                            if (Configure::check('Users.RememberMe.active')) {
                                echo $this->Form->input(Configure::read('Users.Key.Data.rememberMe'), [
                                    'type' => 'checkbox',
                                    'label' => __d('Users', 'Remember me'),
                                    'checked' => 'checked'
                                ]);
                            }
                            ?>
                        </fieldset>
                        <?= implode(' ', $this->User->socialLoginList()); ?>
                        <?= $this->Form->button(__d('Users', 'Login'),['class'=>'btn btn-primary']); ?>
                        <?= $this->Form->end() ?>

                        <p class="pull-right"><?= $this->Html->link(__d('users', 'Reset Password'), ['action' => 'requestResetPassword']) ?></p>
                    </div>
                    <div class="panel-footer text-center ">copyright <a class="text-orange" href="http://crack-reactor.com" target="_blank" >CrackReactor</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
