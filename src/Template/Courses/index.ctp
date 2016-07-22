<?php
$edittemplates = [
    'submitContainer' => '{{content}}'
];
$this->Form->templates($edittemplates);
?>
<div class="row m-t-20">
    <div class="col-sm-12">
        <?= $this->Form->create('',['class'=>'form-inline','type'=>'GET']) ?>
        <div class="form-group">
            <?= $this->Form->input('school_id',['options' => $schools,'class'=>'form-control','data-select-id'=>'school','label'=>['text'=>'School '],'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['school_id'])]); ?>
            <?= $this->Form->input('level_id',['options' => $levels,'class'=>'form-control','data-select-id'=>'level','label'=>['text'=>'Level '],'empty'=>true,'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['level_id'])]); ?>
            <?= $this->Form->input('semester_id',['options' => $semesters,'class'=>'form-control','data-select-id'=>'semester','label'=>['text'=>'Semester'],'empty'=>true,'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['semester_id'])]); ?>
            <?= $this->Form->submit(__('change'),['class'=>'btn btn-primary']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <h3><?= __('Courses') ?></h3>
        <table class="table table-responsive table-bordered">
            <thead>
            <tr>
                <th><?= h('course code') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= h('semester') ?></th>
                <th><?= h('level') ?></th>
                <th><?= h('school') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($courses as $course): ?>
                <tr>
                    <td><?= h($course->id) ?></td>
                    <td><?= h($course->name) ?></td>
                    <td><?= h($course->semester->name) ?></td>
                    <td><?= h($course->level->name) ?></td>
                    <td><?= h($course->school->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('<i class="fa fa-eye"></i>', ['action' => 'view', $course->id],['escape'=>false,'class'=>'btn btn-sm btn-default','title'=>'view course','data-toggle'=>"tooltip" ]) ?>
                        <?= $this->Html->link('<i class="fa fa-edit"></i>', ['action' => 'edit', $course->id],['escape'=>false,'class'=>'btn btn-sm btn-primary','data-toggle'=>"tooltip",'title'=>'edit course']) ?>
                        <?= $this->Html->link('<i class="fa fa-book"></i>', ['action' => 'enter_result', $course->id,],['escape'=>false,'class'=>'btn btn-sm btn-info','title'=>'Result','data-toggle'=>"tooltip"]) ?>
                        <?= $this->Html->link('<i class="fa fa-upload"></i>', ['action' => 'upload_result', $course->id,],['escape'=>false,'class'=>'btn btn-sm btn-primary','title'=>'upload excel Course','data-toggle'=>"tooltip"]) ?>
                        <?= $this->Form->postLink('<i class="fa fa-trash-o"></i>', ['action' => 'delete', $course->id], ['confirm' => __('Are you sure you want to delete # {0}?', $course->id),'escape'=>false,'class'=>'btn btn-sm btn-danger','title'=>'delete Course','data-toggle'=>"tooltip"]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
            </ul>
            <p><?= $this->Paginator->counter() ?></p>
        </div>
    </div>
</div>