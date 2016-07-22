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
?>
<div class="container m-t-40">
    <div class="row">
        <div class="col-sm-12">
            <div class="login">
                <?= $this->Flash->render('auth') ?>
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h5><?= __d('Users', 'Resend Validation email') ?></h5>
                    </div>
                    <div class="panel-body">
                        <?= $this->Form->create($user); ?>
                        <fieldset>
                            <?php
                            echo $this->Form->input('reference', ['label' => __d('Users', 'Email or username'),'class'=>'form-control']);
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__d('Users', 'Submit'),['class'=>'btn btn-primary']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                    <div class="panel-footer text-center ">copyright <a class="text-orange" href="http://crack-reactor.com" target="_blank" >CrackReactor</a></div>
                </div>
            </div>
        </div>
    </div>
</div>





