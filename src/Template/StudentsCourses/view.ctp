<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Students Course'), ['action' => 'edit', $studentsCourse->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Students Course'), ['action' => 'delete', $studentsCourse->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentsCourse->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Students Courses'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Students Course'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Courses'), ['controller' => 'Courses', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Course'), ['controller' => 'Courses', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Semesters'), ['controller' => 'Semesters', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Semester'), ['controller' => 'Semesters', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="studentsCourses view large-9 medium-8 columns content">
    <h3><?= h($studentsCourse->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Student') ?></th>
            <td><?= $studentsCourse->has('student') ? $this->Html->link($studentsCourse->student->username, ['controller' => 'Students', 'action' => 'view', $studentsCourse->student->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Course') ?></th>
            <td><?= $studentsCourse->has('course') ? $this->Html->link($studentsCourse->course->name, ['controller' => 'Courses', 'action' => 'view', $studentsCourse->course->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Session') ?></th>
            <td><?= $studentsCourse->has('session') ? $this->Html->link($studentsCourse->session->name, ['controller' => 'Sessions', 'action' => 'view', $studentsCourse->session->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Grade') ?></th>
            <td><?= h($studentsCourse->grade) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($studentsCourse->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Total') ?></th>
            <td><?= $this->Number->format($studentsCourse->total) ?></td>
        </tr>
    </table>
</div>
