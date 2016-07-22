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
            <?= $this->Form->input('session_id',['options' => $sessions,'class'=>'form-control','data-select-id'=>'level','label'=>['text'=>'Session 0r Batch '],'empty'=>true,'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['session_id'])]); ?>
            <label style="margin-left: 20px">Year</label>
            <?= $this->Form->year('year',['class'=>'form-control','data-select-id'=>'session','orderYear'=>'asc','minYear'=>'2016','maxYear'=>date('Y'),'empty'=>false,'value'=>@$this->SearchParameter->getDefaultYear($this->request->query['year']['year'])]); ?>
            <?= $this->Form->submit(__('change'),['class'=>'btn btn-primary']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <h3><?= __('Students') ?></h3>
        <table class="table table-responsive table-hover table-bordered">
            <thead>
            <tr>
                <th><?= h('Reg Number') ?></th>
                <th><?= $this->Paginator->sort('fullname') ?></th>
                <th><?= $this->Paginator->sort('school_id') ?></th>
                <th><?= h('year') ?></th>
                <th><?= $this->Paginator->sort('level_id') ?></th>
                <th><?= $this->Paginator->sort('session_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= h($student->id) ?></td>
                    <td><?= h($student->fullname) ?></td>
                    <td><?= $student->has('school') ? $this->Html->link($student->school->name, ['controller' => 'Schools', 'action' => 'view', $student->school->id]) : '' ?></td>
                    <td><?= $student->year ?></td>
                    <td><?= h($student->level->name) ?></td>
                    <td><?= h($student->session->session) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $student->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $student->id]) ?>
                        <?= $this->Html->link(__('Remark'), ['action' => 'enter_remark', $student->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id)]) ?>
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