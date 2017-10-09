<?php
$user = ${$tableAlias};
$this->assign('title','Add New User');
?>
<div class="row">
    <div class="col-sm-12">
        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title"> Add New User </h4>
            </div>
            <div class="panel-body">

                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Add Student </a></li>
                    <li><a data-toggle="tab" href="#menu1">Add Teacher </a></li>
                    <li><a data-toggle="tab" href="#menu2">Add Admin </a></li>
                </ul>

                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
                        <?= $this->Form->create($user,['url'=>['action'=>'addStudent']]) ?>
                        <fieldset>
                            <legend><?= __('Add New Student Account') ?></legend>
                            <?php
                            echo $this->Form->input('username',['class'=>'form-control']);
                            echo $this->Form->input('password',['class'=>'form-control']);
                            echo $this->Form->input('record_id', ['label'=>'Student Admission Number','options'=>$students]);
                            echo $this->Form->input('role', ['options'=>$roles,'default'=>'student','class'=>'form-control','escape'=>false,'disabled'=>true]);
                            echo $this->Form->input('active');
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
                        <?= $this->Form->end() ?>
                    </div>

                    <div id="menu1" class="tab-pane fade">
                        <?= $this->Form->create($user,['url'=>['action'=>'addStudent']]) ?>
                        <fieldset>
                            <legend><?= __('Add New Teacher') ?></legend>
                            <?php
                            echo $this->Form->input('username',['class'=>'form-control']);
                            echo $this->Form->input('password',['class'=>'form-control']);
                            echo $this->Form->input('role', [
                                'options' =>$roles,
                                'class'=>'form-control','escape'=>false,
                            ]);
                            echo $this->Form->input('active');
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
                        <?= $this->Form->end() ?>
                    </div>

                    <div id="menu2" class="tab-pane fade">
                        <?= $this->Form->create($user) ?>
                        <fieldset>
                            <legend><?= __('Add New User') ?></legend>
                            <?php
                            echo $this->Form->input('username',['class'=>'form-control']);
                            echo $this->Form->input('password',['class'=>'form-control']);
                            echo $this->Form->input('email',['class'=>'form-control']);
                            echo $this->Form->input('first_name',['class'=>'form-control']);
                            echo $this->Form->input('last_name',['class'=>'form-control']);
                            echo $this->Form->input('role', [
                                'options' => ['student'=>'Student','teacher'=>'Teacher','admin' => 'Admin'],
                                'class'=>'form-control','escape'=>false,
                            ]);
                            echo $this->Form->input('is_superuser',['data-render'=>'switchery']);
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
