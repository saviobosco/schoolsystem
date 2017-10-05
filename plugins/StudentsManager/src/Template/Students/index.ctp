<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Student'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Classes'), ['controller' => 'Classes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Class'), ['controller' => 'Classes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Class Demarcations'), ['controller' => 'ClassDemarcations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Class Demarcation'), ['controller' => 'ClassDemarcations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Annual Position On Class Demarcations'), ['controller' => 'StudentAnnualPositionOnClassDemarcations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Annual Position On Class Demarcation'), ['controller' => 'StudentAnnualPositionOnClassDemarcations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Annual Positions'), ['controller' => 'StudentAnnualPositions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Annual Position'), ['controller' => 'StudentAnnualPositions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Annual Results'), ['controller' => 'StudentAnnualResults', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Annual Result'), ['controller' => 'StudentAnnualResults', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Annual Subject Position On Class Demarcations'), ['controller' => 'StudentAnnualSubjectPositionOnClassDemarcations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Annual Subject Position On Class Demarcation'), ['controller' => 'StudentAnnualSubjectPositionOnClassDemarcations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Annual Subject Positions'), ['controller' => 'StudentAnnualSubjectPositions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Annual Subject Position'), ['controller' => 'StudentAnnualSubjectPositions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student General Remarks'), ['controller' => 'StudentGeneralRemarks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student General Remark'), ['controller' => 'StudentGeneralRemarks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Publish Results'), ['controller' => 'StudentPublishResults', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Publish Result'), ['controller' => 'StudentPublishResults', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Result Pins'), ['controller' => 'StudentResultPins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Result Pin'), ['controller' => 'StudentResultPins', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Termly Position On Class Demarcations'), ['controller' => 'StudentTermlyPositionOnClassDemarcations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Termly Position On Class Demarcation'), ['controller' => 'StudentTermlyPositionOnClassDemarcations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Termly Positions'), ['controller' => 'StudentTermlyPositions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Termly Position'), ['controller' => 'StudentTermlyPositions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Termly Results'), ['controller' => 'StudentTermlyResults', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Termly Result'), ['controller' => 'StudentTermlyResults', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Termly Subject Position On Class Demarcations'), ['controller' => 'StudentTermlySubjectPositionOnClassDemarcations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Termly Subject Position On Class Demarcation'), ['controller' => 'StudentTermlySubjectPositionOnClassDemarcations', 'action' => 'add']) ?></li>
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
                <th><?= $this->Paginator->sort('guardian') ?></th>
                <th><?= $this->Paginator->sort('relationship_to_guardian') ?></th>
                <th><?= $this->Paginator->sort('occupation_of_guardian') ?></th>
                <th><?= $this->Paginator->sort('guardian_phone_number') ?></th>
                <th><?= $this->Paginator->sort('session_id') ?></th>
                <th><?= $this->Paginator->sort('class_id') ?></th>
                <th><?= $this->Paginator->sort('class_demarcation_id') ?></th>
                <th><?= $this->Paginator->sort('photo') ?></th>
                <th><?= $this->Paginator->sort('photo_dir') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('session_admitted_id') ?></th>
                <th><?= $this->Paginator->sort('graduated') ?></th>
                <th><?= $this->Paginator->sort('graduated_session_id') ?></th>
                <th><?= $this->Paginator->sort('state_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
            <tr>
                <td><?= h($student->id) ?></td>
                <td><?= h($student->first_name) ?></td>
                <td><?= h($student->last_name) ?></td>
                <td><?= h($student->date_of_birth) ?></td>
                <td><?= h($student->gender) ?></td>
                <td><?= h($student->state_of_origin) ?></td>
                <td><?= h($student->religion) ?></td>
                <td><?= h($student->home_residence) ?></td>
                <td><?= h($student->guardian) ?></td>
                <td><?= h($student->relationship_to_guardian) ?></td>
                <td><?= h($student->occupation_of_guardian) ?></td>
                <td><?= h($student->guardian_phone_number) ?></td>
                <td><?= $student->has('session') ? $this->Html->link($student->session->id, ['controller' => 'Sessions', 'action' => 'view', $student->session->id]) : '' ?></td>
                <td><?= $student->has('class') ? $this->Html->link($student->class->id, ['controller' => 'Classes', 'action' => 'view', $student->class->id]) : '' ?></td>
                <td><?= $student->has('class_demarcation') ? $this->Html->link($student->class_demarcation->name, ['controller' => 'ClassDemarcations', 'action' => 'view', $student->class_demarcation->id]) : '' ?></td>
                <td><?= h($student->photo) ?></td>
                <td><?= h($student->photo_dir) ?></td>
                <td><?= h($student->created) ?></td>
                <td><?= h($student->modified) ?></td>
                <td><?= $this->Number->format($student->status) ?></td>
                <td><?= $this->Number->format($student->session_admitted_id) ?></td>
                <td><?= $this->Number->format($student->graduated) ?></td>
                <td><?= $this->Number->format($student->graduated_session_id) ?></td>
                <td><?= $student->has('state') ? $this->Html->link($student->state->id, ['controller' => 'States', 'action' => 'view', $student->state->id]) : '' ?></td>
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
