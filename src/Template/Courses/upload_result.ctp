<?php
//$this->layout = 'default';
?>
<div class="row m-t-20">
    <div class="col-sm-6">

        <?= $this->Form->create(null,['url'=>'','enctype' => 'multipart/form-data']) ?>
        <fieldset>
            <legend><?= __('Select the  file') ?></legend>
            <div class="form-group">
                <?= $this->Form->input('session_id',['options' => $sessions,'class'=>'form-control','data-select-id'=>'level','label'=>['text'=>'Select Session or Batch '],'empty'=>true,'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['session_id'])]); ?>
            </div>
            <?php
            echo $this->Form->file('result',['required'=>true]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
        <?= $this->Form->end() ?>
    </div>
    <div class="col-sm-6">
        <div class="thumbnail">
            <?= $this->Html->image('systemfiles/file_upload_format.png',['alt' => 'format of upload']) ?>
            <h5>This is the expected format and arrangement of the excel file for proper and correct upload </h5>
        </div>
    </div>
</div>