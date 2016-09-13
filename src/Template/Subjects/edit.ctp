<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $subject->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $subject->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Subjects'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Blocks'), ['controller' => 'Blocks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Block'), ['controller' => 'Blocks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Annual Results'), ['controller' => 'StudentAnnualResults', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Annual Result'), ['controller' => 'StudentAnnualResults', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Termly Results'), ['controller' => 'StudentTermlyResults', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Termly Result'), ['controller' => 'StudentTermlyResults', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="subjects form large-9 medium-8 columns content">
    <?= $this->Form->create($subject) ?>
    <fieldset>
        <legend><?= __('Edit Subject') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('block_id', ['options' => $blocks]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
