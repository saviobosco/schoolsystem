<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Student'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Classes'), ['controller' => 'Classes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Class'), ['controller' => 'Classes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Class Demacations'), ['controller' => 'ClassDemacations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Class Demacation'), ['controller' => 'ClassDemacations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Annual Position On Class Demacations'), ['controller' => 'StudentAnnualPositionOnClassDemacations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Annual Position On Class Demacation'), ['controller' => 'StudentAnnualPositionOnClassDemacations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Annual Positions'), ['controller' => 'StudentAnnualPositions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Annual Position'), ['controller' => 'StudentAnnualPositions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Annual Results'), ['controller' => 'StudentAnnualResults', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Annual Result'), ['controller' => 'StudentAnnualResults', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Annual Subject Position On Class Demacations'), ['controller' => 'StudentAnnualSubjectPositionOnClassDemacations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Annual Subject Position On Class Demacation'), ['controller' => 'StudentAnnualSubjectPositionOnClassDemacations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Annual Subject Positions'), ['controller' => 'StudentAnnualSubjectPositions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Annual Subject Position'), ['controller' => 'StudentAnnualSubjectPositions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Termly Position On Class Demacations'), ['controller' => 'StudentTermlyPositionOnClassDemacations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Termly Position On Class Demacation'), ['controller' => 'StudentTermlyPositionOnClassDemacations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Termly Positions'), ['controller' => 'StudentTermlyPositions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Termly Position'), ['controller' => 'StudentTermlyPositions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Termly Results'), ['controller' => 'StudentTermlyResults', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Termly Result'), ['controller' => 'StudentTermlyResults', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Termly Subject Position On Class Demacations'), ['controller' => 'StudentTermlySubjectPositionOnClassDemacations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Termly Subject Position On Class Demacation'), ['controller' => 'StudentTermlySubjectPositionOnClassDemacations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Termly Subject Positions'), ['controller' => 'StudentTermlySubjectPositions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Termly Subject Position'), ['controller' => 'StudentTermlySubjectPositions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="students index large-9 medium-8 columns content">
    <?= $this->Form->create('',['class'=>'form-inline','type'=>'GET']) ?>
    <div class="form-group">
        <?= $this->Form->input('school_id',['options' => $sessions,'class'=>'form-control','data-select-id'=>'school','label'=>['text'=>'Session '],'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['school_id'])]); ?>
        <?= $this->Form->input('session_id',['options' => $classes,'class'=>'form-control','data-select-id'=>'level','label'=>['text'=>'Class'],'empty'=>true,'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['session_id'])]); ?>
        <?= $this->Form->submit(__('change'),['class'=>'btn btn-primary']) ?>
    </div>
    <?= $this->Form->end() ?>
    <h3><?= __('Students') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('first_name') ?></th>
                <th><?= $this->Paginator->sort('last_name') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
            <tr>
                <td><?= $this->Number->format($student->id) ?></td>
                <td><?= h($student->first_name) ?></td>
                <td><?= h($student->last_name) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('ViewResult'), ['action' => 'view', $student->id]) ?>
                    <?= $this->Html->link(__('EditResult'), ['action' => 'editResult', $student->id]) ?>
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
