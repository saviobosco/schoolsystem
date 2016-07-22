<?php
$this->layout = 'default';
?>
<div class="row m-t-20">
    <div class="col-sm-12">
        <?= $this->Form->create(null,['url'=>[],'enctype' => 'multipart/form-data']) ?>
        <fieldset>
            <legend><?= __('Select the  file') ?></legend>
            <?php
            echo $this->Form->file('result');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>