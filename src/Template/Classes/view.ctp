<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Class'), ['action' => 'edit', $class->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Class'), ['action' => 'delete', $class->id], ['confirm' => __('Are you sure you want to delete # {0}?', $class->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Classes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Class'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Class Demacations'), ['controller' => 'ClassDemacations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Class Demacation'), ['controller' => 'ClassDemacations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="classes view large-9 medium-8 columns content">
    <h3><?= h($class->class) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Class') ?></th>
            <td><?= h($class->class) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($class->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Block Id') ?></th>
            <td><?= $this->Number->format($class->block_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($class->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($class->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Class Demacations') ?></h4>
        <?php if (!empty($class->class_demacations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Name') ?></th>
                <th><?= __('Class Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($class->class_demacations as $classDemacations): ?>
            <tr>
                <td><?= h($classDemacations->id) ?></td>
                <td><?= h($classDemacations->name) ?></td>
                <td><?= h($classDemacations->class_id) ?></td>
                <td><?= h($classDemacations->created) ?></td>
                <td><?= h($classDemacations->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ClassDemacations', 'action' => 'view', $classDemacations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ClassDemacations', 'action' => 'edit', $classDemacations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ClassDemacations', 'action' => 'delete', $classDemacations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $classDemacations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Students') ?></h4>
        <?php if (!empty($class->students)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('First Name') ?></th>
                <th><?= __('Last Name') ?></th>
                <th><?= __('Date Of Birth') ?></th>
                <th><?= __('Gender') ?></th>
                <th><?= __('State Of Origin') ?></th>
                <th><?= __('Religion') ?></th>
                <th><?= __('Home Residence') ?></th>
                <th><?= __('Gaurdian') ?></th>
                <th><?= __('Relationship To Gaurdian') ?></th>
                <th><?= __('Occupation Of Gaurdian') ?></th>
                <th><?= __('Gaurdian Phone Number') ?></th>
                <th><?= __('Session Id') ?></th>
                <th><?= __('Class Id') ?></th>
                <th><?= __('Class Demacation Id') ?></th>
                <th><?= __('Photo') ?></th>
                <th><?= __('Photo Dir') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($class->students as $students): ?>
            <tr>
                <td><?= h($students->id) ?></td>
                <td><?= h($students->first_name) ?></td>
                <td><?= h($students->last_name) ?></td>
                <td><?= h($students->date_of_birth) ?></td>
                <td><?= h($students->gender) ?></td>
                <td><?= h($students->state_of_origin) ?></td>
                <td><?= h($students->religion) ?></td>
                <td><?= h($students->home_residence) ?></td>
                <td><?= h($students->gaurdian) ?></td>
                <td><?= h($students->relationship_to_gaurdian) ?></td>
                <td><?= h($students->occupation_of_gaurdian) ?></td>
                <td><?= h($students->gaurdian_phone_number) ?></td>
                <td><?= h($students->session_id) ?></td>
                <td><?= h($students->class_id) ?></td>
                <td><?= h($students->class_demacation_id) ?></td>
                <td><?= h($students->photo) ?></td>
                <td><?= h($students->photo_dir) ?></td>
                <td><?= h($students->created) ?></td>
                <td><?= h($students->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Students', 'action' => 'view', $students->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Students', 'action' => 'edit', $students->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Students', 'action' => 'delete', $students->id], ['confirm' => __('Are you sure you want to delete # {0}?', $students->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
