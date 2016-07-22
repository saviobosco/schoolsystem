<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Students Course'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Semesters'), ['controller' => 'Semesters', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Semester'), ['controller' => 'Semesters', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="studentsCourses index large-9 medium-8 columns content">
    <h3><?= __('Students Courses') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('student_id') ?></th>
                <th><?= $this->Paginator->sort('course_id') ?></th>
                <th><?= $this->Paginator->sort('session_id') ?></th>
                <th><?= $this->Paginator->sort('total') ?></th>
                <th><?= $this->Paginator->sort('grade') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($studentsCourses as $studentsCourse): ?>
            <tr>
                <td><?= $this->Number->format($studentsCourse->id) ?></td>
                <td><?= $studentsCourse->has('student') ? $this->Html->link($studentsCourse->student->username, ['controller' => 'Students', 'action' => 'view', $studentsCourse->student->id]) : '' ?></td>
                <td><?= $studentsCourse->has('course') ? $this->Html->link($studentsCourse->course->name, ['controller' => 'Courses', 'action' => 'view', $studentsCourse->course->id]) : '' ?></td>
                <td><?= $studentsCourse->has('session') ? $this->Html->link($studentsCourse->session->name, ['controller' => 'Sessions', 'action' => 'view', $studentsCourse->session->id]) : '' ?></td>
                <td><?= $this->Number->format($studentsCourse->total) ?></td>
                <td><?= h($studentsCourse->grade) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $studentsCourse->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $studentsCourse->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $studentsCourse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentsCourse->id)]) ?>
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
