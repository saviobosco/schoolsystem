<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Student Termly Result'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Subjects'), ['controller' => 'Subjects', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Subject'), ['controller' => 'Subjects', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Classes'), ['controller' => 'Classes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Class'), ['controller' => 'Classes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Terms'), ['controller' => 'Terms', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Term'), ['controller' => 'Terms', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="studentTermlyResults index large-9 medium-8 columns content">
    <h3><?= __('Student Termly Results') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('student_id') ?></th>
                <th><?= $this->Paginator->sort('subject_id') ?></th>
                <th><?= $this->Paginator->sort('first_test') ?></th>
                <th><?= $this->Paginator->sort('second_test') ?></th>
                <th><?= $this->Paginator->sort('third_test') ?></th>
                <th><?= $this->Paginator->sort('exam') ?></th>
                <th><?= $this->Paginator->sort('total') ?></th>
                <th><?= $this->Paginator->sort('grade') ?></th>
                <th><?= $this->Paginator->sort('remark') ?></th>
                <th><?= $this->Paginator->sort('principal_comment') ?></th>
                <th><?= $this->Paginator->sort('head_teacher_comment') ?></th>
                <th><?= $this->Paginator->sort('class_id') ?></th>
                <th><?= $this->Paginator->sort('term_id') ?></th>
                <th><?= $this->Paginator->sort('session_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($studentTermlyResults as $studentTermlyResult): ?>
            <tr>
                <td><?= $this->Number->format($studentTermlyResult->id) ?></td>
                <td><?= $studentTermlyResult->has('student') ? $this->Html->link($studentTermlyResult->student->id, ['controller' => 'Students', 'action' => 'view', $studentTermlyResult->student->id]) : '' ?></td>
                <td><?= $studentTermlyResult->has('subject') ? $this->Html->link($studentTermlyResult->subject->name, ['controller' => 'Subjects', 'action' => 'view', $studentTermlyResult->subject->id]) : '' ?></td>
                <td><?= $this->Number->format($studentTermlyResult->first_test) ?></td>
                <td><?= $this->Number->format($studentTermlyResult->second_test) ?></td>
                <td><?= $this->Number->format($studentTermlyResult->third_test) ?></td>
                <td><?= $this->Number->format($studentTermlyResult->exam) ?></td>
                <td><?= $this->Number->format($studentTermlyResult->total) ?></td>
                <td><?= h($studentTermlyResult->grade) ?></td>
                <td><?= h($studentTermlyResult->remark) ?></td>
                <td><?= h($studentTermlyResult->principal_comment) ?></td>
                <td><?= h($studentTermlyResult->head_teacher_comment) ?></td>
                <td><?= $studentTermlyResult->has('class') ? $this->Html->link($studentTermlyResult->class->class, ['controller' => 'Classes', 'action' => 'view', $studentTermlyResult->class->id]) : '' ?></td>
                <td><?= $studentTermlyResult->has('term') ? $this->Html->link($studentTermlyResult->term->name, ['controller' => 'Terms', 'action' => 'view', $studentTermlyResult->term->id]) : '' ?></td>
                <td><?= $studentTermlyResult->has('session') ? $this->Html->link($studentTermlyResult->session->session, ['controller' => 'Sessions', 'action' => 'view', $studentTermlyResult->session->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $studentTermlyResult->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $studentTermlyResult->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $studentTermlyResult->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentTermlyResult->id)]) ?>
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
