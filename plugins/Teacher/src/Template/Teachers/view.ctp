<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Teacher'), ['action' => 'edit', $teacher->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Teacher'), ['action' => 'delete', $teacher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teacher->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Teachers'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Teacher'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="teachers view large-9 medium-8 columns content">
    <h3><?= h($teacher->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= h($teacher->id) ?></td>
        </tr>
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($teacher->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($teacher->last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Gender') ?></th>
            <td><?= h($teacher->gender) ?></td>
        </tr>
        <tr>
            <th><?= __('State Of Origin') ?></th>
            <td><?= h($teacher->state_of_origin) ?></td>
        </tr>
        <tr>
            <th><?= __('L G A') ?></th>
            <td><?= h($teacher->l_g_a) ?></td>
        </tr>
        <tr>
            <th><?= __('Home Residence') ?></th>
            <td><?= h($teacher->home_residence) ?></td>
        </tr>
        <tr>
            <th><?= __('Phone Number') ?></th>
            <td><?= h($teacher->phone_number) ?></td>
        </tr>
        <tr>
            <th><?= __('Qualifications') ?></th>
            <td><?= h($teacher->qualifications) ?></td>
        </tr>
        <tr>
            <th><?= __('Photo') ?></th>
            <td><?= h($teacher->photo) ?></td>
        </tr>
        <tr>
            <th><?= __('Photo Dir') ?></th>
            <td><?= h($teacher->photo_dir) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($teacher->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($teacher->modified) ?></td>
        </tr>
    </table>
</div>
