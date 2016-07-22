<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $applicantsPin->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $applicantsPin->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Applicants Pins'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Applicants'), ['controller' => 'Applicants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Applicant'), ['controller' => 'Applicants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="applicantsPins form large-9 medium-8 columns content">
    <?= $this->Form->create($applicantsPin) ?>
    <fieldset>
        <legend><?= __('Edit Applicants Pin') ?></legend>
        <?php
            echo $this->Form->input('serial_number');
            echo $this->Form->input('pin');
            echo $this->Form->input('status');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
