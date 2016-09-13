<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Student'), ['action' => 'edit', $student->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Student'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="students view large-9 medium-8 columns content">

    <?= $this->Form->create('',['class'=>'form-inline','type'=>'GET']) ?>
    <div class="form-group">
        <?= $this->Form->input('session_id',['options' => $sessions,'class'=>'form-control','data-select-id'=>'school','label'=>['text'=>'Session '],'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['session_id'],1)]); ?>
        <?= $this->Form->input('term_id',['options' => $terms,'class'=>'form-control','data-select-id'=>'level','label'=>['text'=>'Term'],'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['term_id'],1)]); ?>
        <?= $this->Form->input('class_id',['options' => $classes,'class'=>'form-control','data-select-id'=>'level','label'=>['text'=>'Class'],'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['class_id'],1)]); ?>
        <?= $this->Form->submit(__('change'),['class'=>'btn btn-primary']) ?>
    </div>
    <?= $this->Form->end() ?>

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
            <th><?= __('Session') ?></th>
            <td><?= $student->session->session  ?></td>
        </tr>
        <tr>
            <th><?= __('Class') ?></th>
            <td><?= $student->class->class ?></td>
        </tr>
        <tr>
            <th><?= __('Class Demacation') ?></th>
            <td><?= $student->class_demacation->name ?></td>
        </tr>
        <tr>
            <th><?= __('Photo') ?></th>
            <td><?= h($student->photo) ?></td>
        </tr>
        <tr>
            <th><?= __('Photo Dir') ?></th>
            <td><?= h($student->photo_dir) ?></td>
        </tr>
    </table>

    <div class="related">
        <h4><?= __('Student Affective Disposition Scores') ?></h4>
        <?php if (!empty($student->students_affective_disposition_scores)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Affective') ?></th>
                <th><?= __('Score') ?></th>
            </tr>
            <?php foreach ($student->students_affective_disposition_scores as $studentsAffectiveDispositionScores): ?>
            <tr>

                <td><?= h($affectiveSkills[$studentsAffectiveDispositionScores->affective_id]) ?></td>
                <td><?= h($studentsAffectiveDispositionScores->score) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __(' Student Psychomotor Skill Scores') ?></h4>
        <?php if (!empty($student->students_psychomotor_skill_scores)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Psychomotor') ?></th>
                <th><?= __('Score') ?></th>
            </tr>
            <?php foreach ($student->students_psychomotor_skill_scores as $studentsPsychomotorSkillScores): ?>
            <tr>
                <td><?= h($psychomotorSkills[$studentsPsychomotorSkillScores->psychomotor_id]) ?></td>
                <td><?= h($studentsPsychomotorSkillScores->score) ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
