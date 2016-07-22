<?= $this->assign('title',$title); ?>
<section>
    <div class="row">
        <div class="col-sm-9">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Add New Teacher') ?></legend>
                <?php
                echo $this->Form->input('username',['class'=>'form-control']);
                echo $this->Form->input('password',['class'=>'form-control']);
                echo $this->Form->input('email',['class'=>'form-control']);
                echo $this->Form->input('first_name',['class'=>'form-control']);
                echo $this->Form->input('last_name',['class'=>'form-control']);
                echo $this->Form->input('role', [
                    'options' => ['admin' => 'Admin','superadmin'=>'SuperAdmin'],
                        'class'=>'form-control','escape'=>false,
                ]);
                echo $this->Form->input('is_superuser',['data-render'=>'switchery']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
        <div class="col-sm-3 m-t-50 teacher-right">
            <aside>
                <div class="well">
                    <h5 class="text-danger"> Note </h5>
                    <ul>
                        <li> Every teacher has an admin role right by default</li>
                        <li> Teacher with superuser role have access to all </li>
                        <li> A Teacher is not active by default. You will need to activate the
                              teacher's account after registering.</li>
                    </ul>
                </div>
            </aside>
        </div>
    </div>

</section>