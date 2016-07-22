<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Applicants Pin'), ['action' => 'edit', $applicantsPin->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Applicants Pin'), ['action' => 'delete', $applicantsPin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applicantsPin->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Applicants Pins'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Applicants Pin'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Applicants'), ['controller' => 'Applicants', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Applicant'), ['controller' => 'Applicants', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="applicantsPins view large-9 medium-8 columns content">
    <h3><?= h($applicantsPin->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Serial Number') ?></th>
            <td><?= h($applicantsPin->serial_number) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($applicantsPin->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Pin') ?></th>
            <td><?= $this->Number->format($applicantsPin->pin) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($applicantsPin->status) ?></td>
        </tr>
    </table>
</div>
