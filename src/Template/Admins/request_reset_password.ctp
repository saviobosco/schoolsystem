<div class="container m-t-40">
    <div class="row">
        <div class="col-sm-12">
            <div class="login">
                <?= $this->Flash->render('auth') ?>
                <div class="panel panel-default">
                    <div class="panel-heading text-center">
                        <h5>Reset password</h5>
                    </div>
                    <div class="panel-body">
                        <?= $this->Flash->render('auth') ?>
                        <?= $this->Form->create('User') ?>
                        <fieldset>
                            <?= $this->Form->input('reference',['class'=>'form-control','label'=>['text'=>'Enter your Email']]) ?>
                        </fieldset>
                        <?= $this->Form->button(__d('Users', 'Reset password'),['class'=>'btn btn-info']); ?>
                        <?= $this->Form->end() ?>
                    </div>
                    <div class="panel-footer text-center ">copyright <a class="text-orange" href="http://crack-reactor.com" target="_blank" >CrackReactor</a></div>
                </div>
            </div>
        </div>
    </div>
</div>




