<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Class Demacation'), ['action' => 'edit', $classDemacation->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Class Demacation'), ['action' => 'delete', $classDemacation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classDemacation->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Class Demacations'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Class Demacation'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Classes'), ['controller' => 'Classes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Class'), ['controller' => 'Classes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="classDemacations view large-9 medium-8 columns content">
    <h3><?= h($classDemacation->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($classDemacation->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Class') ?></th>
            <td><?= $classDemacation->has('class') ? $this->Html->link($classDemacation->class->class, ['controller' => 'Classes', 'action' => 'view', $classDemacation->class->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($classDemacation->id) ?></td>
        </tr>
    </table>
</div>
