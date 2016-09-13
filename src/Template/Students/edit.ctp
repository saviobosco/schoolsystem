<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $student->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $student->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Students'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Classes'), ['controller' => 'Classes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Class'), ['controller' => 'Classes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Class Demacations'), ['controller' => 'ClassDemacations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Class Demacation'), ['controller' => 'ClassDemacations', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="students form large-9 medium-8 columns content">
    <?= $this->Form->create($student) ?>
    <fieldset>
        <legend><?= __('Edit Student') ?></legend>
        <?php
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('date_of_birth');
            echo $this->Form->input('gender');
            echo $this->Form->input('state_of_origin');
            echo $this->Form->input('religion');
            echo $this->Form->input('home_residence');
            echo $this->Form->input('gaurdian');
            echo $this->Form->input('relationship_to_gaurdian');
            echo $this->Form->input('occupation_of_gaurdian');
            echo $this->Form->input('gaurdian_phone_number');
            echo $this->Form->input('session_id', ['options' => $sessions]);
            echo $this->Form->input('class_id', ['options' => $classes]);
            echo $this->Form->input('class_demacation_id', ['options' => $classDemacations]);
            echo $this->Form->input('photo');
            echo $this->Form->input('photo_dir');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
