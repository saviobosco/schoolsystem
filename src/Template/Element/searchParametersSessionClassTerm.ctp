<?php
$edittemplates = [
    'submitContainer' => '{{content}}'
];
$this->Form->templates($edittemplates);

?>
<div class="row">
    <div class="col-sm-12">
        <?= $this->Form->create('',['class'=>'form-inline','type'=>'GET']) ?>
        <div class="form-group">
            <?= $this->Form->input('session_id',['options' => $sessions,'class'=>'form-control','data-select-id'=>'school','label'=>['text'=>'Session '],'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['session_id'])]); ?>
            <?= $this->Form->input('class_id',['options' => $classes,'class'=>'form-control','data-select-id'=>'level','label'=>['text'=>'Class'],'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['class_id'])]); ?>
            <?= $this->Form->input('term_id',['options' => $terms,'class'=>'form-control','data-select-id'=>'level','label'=>['text'=>'Term'],'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['term_id'])]); ?>
            <?= $this->Form->submit(__('change'),['class'=>'btn btn-primary']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>