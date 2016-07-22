<?= $this->assign('title',$title); ?>
<div>
    <div class="col-sm-12">
        <?= $this->Form->create($user) ?>
        <fieldset>
            <legend><?= __('Edit Teacher') ?></legend>
            <?php
            echo $this->Form->input('first_name',['class'=>'form-control']);
            echo $this->Form->input('last_name',['class'=>'form-control']);
            echo $this->Form->input('role');
            echo $this->Form->input('is_superuser',['data-render'=>'switchery']);
            echo $this->Form->input('active',['type'=>'checkbox','data-render'=>'switchery']);
            ?>

        </fieldset>
        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>



