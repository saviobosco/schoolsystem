<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $applicationsSubmitted->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $applicationsSubmitted->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Applications Submitted'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Schools'), ['controller' => 'Schools', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New School'), ['controller' => 'Schools', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="applicationsSubmitted form large-9 medium-8 columns content">
    <?= $this->Form->create($applicationsSubmitted) ?>
    <fieldset>
        <legend><?= __('Edit Applications Submitted') ?></legend>
        <?php
            echo $this->Form->input('fullname');
            echo $this->Form->input('maiden_name');
            echo $this->Form->input('sex');
            echo $this->Form->input('marital_status');
            echo $this->Form->input('place_of_birth');
            echo $this->Form->input('state_of_origin');
            echo $this->Form->input('nationality');
            echo $this->Form->input('postal_address');
            echo $this->Form->input('permanent_home_address');
            echo $this->Form->input('next_of_kin');
            echo $this->Form->input('address_of_next_of_kin');
            echo $this->Form->input('relationship_to_next_of_kin');
            echo $this->Form->input('phone_number');
            echo $this->Form->input('school_id', ['options' => $schools]);
            echo $this->Form->input('photo');
            echo $this->Form->input('file_upload_1');
            echo $this->Form->input('file_upload_2');
            echo $this->Form->input('file_upload_3');
            echo $this->Form->input('file_upload_4');
            echo $this->Form->input('sponsor');
            echo $this->Form->input('occupation_of_sponsor');
            echo $this->Form->input('name_of_sponsor');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
