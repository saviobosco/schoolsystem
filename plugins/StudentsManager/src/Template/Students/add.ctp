<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Students'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Classes'), ['controller' => 'Classes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Class'), ['controller' => 'Classes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Class Demarcations'), ['controller' => 'ClassDemarcations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Class Demarcation'), ['controller' => 'ClassDemarcations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Annual Position On Class Demarcations'), ['controller' => 'StudentAnnualPositionOnClassDemarcations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Annual Position On Class Demarcation'), ['controller' => 'StudentAnnualPositionOnClassDemarcations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Annual Positions'), ['controller' => 'StudentAnnualPositions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Annual Position'), ['controller' => 'StudentAnnualPositions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Annual Results'), ['controller' => 'StudentAnnualResults', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Annual Result'), ['controller' => 'StudentAnnualResults', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Annual Subject Position On Class Demarcations'), ['controller' => 'StudentAnnualSubjectPositionOnClassDemarcations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Annual Subject Position On Class Demarcation'), ['controller' => 'StudentAnnualSubjectPositionOnClassDemarcations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Annual Subject Positions'), ['controller' => 'StudentAnnualSubjectPositions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Annual Subject Position'), ['controller' => 'StudentAnnualSubjectPositions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student General Remarks'), ['controller' => 'StudentGeneralRemarks', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student General Remark'), ['controller' => 'StudentGeneralRemarks', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Publish Results'), ['controller' => 'StudentPublishResults', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Publish Result'), ['controller' => 'StudentPublishResults', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Result Pins'), ['controller' => 'StudentResultPins', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Result Pin'), ['controller' => 'StudentResultPins', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Termly Position On Class Demarcations'), ['controller' => 'StudentTermlyPositionOnClassDemarcations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Termly Position On Class Demarcation'), ['controller' => 'StudentTermlyPositionOnClassDemarcations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Termly Positions'), ['controller' => 'StudentTermlyPositions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Termly Position'), ['controller' => 'StudentTermlyPositions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Termly Results'), ['controller' => 'StudentTermlyResults', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Termly Result'), ['controller' => 'StudentTermlyResults', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Termly Subject Position On Class Demarcations'), ['controller' => 'StudentTermlySubjectPositionOnClassDemarcations', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Termly Subject Position On Class Demarcation'), ['controller' => 'StudentTermlySubjectPositionOnClassDemarcations', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Student Termly Subject Positions'), ['controller' => 'StudentTermlySubjectPositions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student Termly Subject Position'), ['controller' => 'StudentTermlySubjectPositions', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Students Affective Disposition Scores'), ['controller' => 'StudentsAffectiveDispositionScores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Students Affective Disposition Score'), ['controller' => 'StudentsAffectiveDispositionScores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Students Psychomotor Skill Scores'), ['controller' => 'StudentsPsychomotorSkillScores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Students Psychomotor Skill Score'), ['controller' => 'StudentsPsychomotorSkillScores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="students form large-9 medium-8 columns content">
    <?= $this->Form->create($student) ?>
    <fieldset>
        <legend><?= __('Add Student') ?></legend>
        <?php
            echo $this->Form->input('first_name');
            echo $this->Form->input('last_name');
            echo $this->Form->input('date_of_birth');
            echo $this->Form->input('gender');
            echo $this->Form->input('state_of_origin');
            echo $this->Form->input('religion');
            echo $this->Form->input('home_residence');
            echo $this->Form->input('guardian');
            echo $this->Form->input('relationship_to_guardian');
            echo $this->Form->input('occupation_of_guardian');
            echo $this->Form->input('guardian_phone_number');
            echo $this->Form->input('session_id', ['options' => $sessions]);
            echo $this->Form->input('class_id', ['options' => $classes]);
            echo $this->Form->input('class_demarcation_id', ['options' => $classDemarcations, 'empty' => true]);
            echo $this->Form->input('photo');
            echo $this->Form->input('photo_dir');
            echo $this->Form->input('status');
            echo $this->Form->input('session_admitted_id');
            echo $this->Form->input('graduated');
            echo $this->Form->input('graduated_session_id');
            echo $this->Form->input('state_id', ['options' => $states, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
