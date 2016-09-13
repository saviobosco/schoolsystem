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
        <li><?= $this->Html->link(__('List Students Affective Disposition Scores'), ['controller' => 'StudentsAffectiveDispositionScores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Students Affective Disposition Score'), ['controller' => 'StudentsAffectiveDispositionScores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Students Psychomotor Skill Scores'), ['controller' => 'StudentsPsychomotorSkillScores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Students Psychomotor Skill Score'), ['controller' => 'StudentsPsychomotorSkillScores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="students index large-9 medium-8 columns content">
    <h3><?= __('Students') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('first_name') ?></th>
                <th><?= $this->Paginator->sort('last_name') ?></th>
                <th><?= $this->Paginator->sort('date_of_birth') ?></th>
                <th><?= $this->Paginator->sort('gender') ?></th>
                <th><?= $this->Paginator->sort('state_of_origin') ?></th>
                <th><?= $this->Paginator->sort('religion') ?></th>
                <th><?= $this->Paginator->sort('home_residence') ?></th>
                <th><?= $this->Paginator->sort('gaurdian') ?></th>
                <th><?= $this->Paginator->sort('relationship_to_gaurdian') ?></th>
                <th><?= $this->Paginator->sort('occupation_of_gaurdian') ?></th>
                <th><?= $this->Paginator->sort('gaurdian_phone_number') ?></th>
                <th><?= $this->Paginator->sort('session_id') ?></th>
                <th><?= $this->Paginator->sort('class_id') ?></th>
                <th><?= $this->Paginator->sort('class_demacation_id') ?></th>
                <th><?= $this->Paginator->sort('photo') ?></th>
                <th><?= $this->Paginator->sort('photo_dir') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
            <tr>
                <td><?= $this->Number->format($student->id) ?></td>
                <td><?= h($student->first_name) ?></td>
                <td><?= h($student->last_name) ?></td>
                <td><?= h($student->date_of_birth) ?></td>
                <td><?= h($student->gender) ?></td>
                <td><?= h($student->state_of_origin) ?></td>
                <td><?= h($student->religion) ?></td>
                <td><?= h($student->home_residence) ?></td>
                <td><?= h($student->gaurdian) ?></td>
                <td><?= h($student->relationship_to_gaurdian) ?></td>
                <td><?= h($student->occupation_of_gaurdian) ?></td>
                <td><?= h($student->gaurdian_phone_number) ?></td>
                <td><?= $student->has('session') ? $this->Html->link($student->session->id, ['controller' => 'Sessions', 'action' => 'view', $student->session->id]) : '' ?></td>
                <td><?= $student->has('class') ? $this->Html->link($student->class->id, ['controller' => 'Classes', 'action' => 'view', $student->class->id]) : '' ?></td>
                <td><?= $student->has('class_demacation') ? $this->Html->link($student->class_demacation->name, ['controller' => 'ClassDemacations', 'action' => 'view', $student->class_demacation->id]) : '' ?></td>
                <td><?= h($student->photo) ?></td>
                <td><?= h($student->photo_dir) ?></td>
                <td><?= h($student->created) ?></td>
                <td><?= h($student->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $student->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $student->id]) ?>
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
