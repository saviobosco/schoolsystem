<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Student'), ['action' => 'edit', $student->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Student'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Classes'), ['controller' => 'Classes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Class'), ['controller' => 'Classes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Class Demacations'), ['controller' => 'ClassDemacations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Class Demacation'), ['controller' => 'ClassDemacations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="students view large-9 medium-8 columns content">
    <h3><?= h($student->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($student->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($student->last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Gender') ?></th>
            <td><?= h($student->gender) ?></td>
        </tr>
        <tr>
            <th><?= __('State Of Origin') ?></th>
            <td><?= h($student->state_of_origin) ?></td>
        </tr>
        <tr>
            <th><?= __('Religion') ?></th>
            <td><?= h($student->religion) ?></td>
        </tr>
        <tr>
            <th><?= __('Home Residence') ?></th>
            <td><?= h($student->home_residence) ?></td>
        </tr>
        <tr>
            <th><?= __('Gaurdian') ?></th>
            <td><?= h($student->gaurdian) ?></td>
        </tr>
        <tr>
            <th><?= __('Relationship To Gaurdian') ?></th>
            <td><?= h($student->relationship_to_gaurdian) ?></td>
        </tr>
        <tr>
            <th><?= __('Occupation Of Gaurdian') ?></th>
            <td><?= h($student->occupation_of_gaurdian) ?></td>
        </tr>
        <tr>
            <th><?= __('Gaurdian Phone Number') ?></th>
            <td><?= h($student->gaurdian_phone_number) ?></td>
        </tr>
        <tr>
            <th><?= __('Session') ?></th>
            <td><?= $student->has('session') ? $this->Html->link($student->session->session, ['controller' => 'Sessions', 'action' => 'view', $student->session->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Class') ?></th>
            <td><?= $student->has('class') ? $this->Html->link($student->class->class, ['controller' => 'Classes', 'action' => 'view', $student->class->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Class Demacation') ?></th>
            <td><?= $student->has('class_demacation') ? $this->Html->link($student->class_demacation->name, ['controller' => 'ClassDemacations', 'action' => 'view', $student->class_demacation->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Photo') ?></th>
            <td><?= h($student->photo) ?></td>
        </tr>
        <tr>
            <th><?= __('Photo Dir') ?></th>
            <td><?= h($student->photo_dir) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($student->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Of Birth') ?></th>
            <td><?= h($student->date_of_birth) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($student->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($student->modified) ?></td>
        </tr>
    </table>
</div>
