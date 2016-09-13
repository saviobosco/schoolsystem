<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Subject'), ['action' => 'edit', $subject->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Subject'), ['action' => 'delete', $subject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subject->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Subjects'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="subjects view large-9 medium-8 columns content">
    <?= $this->Form->create('',['class'=>'form-inline','type'=>'GET']) ?>
    <div class="form-group">
        <?= $this->Form->input('session_id',['options' => $sessions,'class'=>'form-control','data-select-id'=>'school','label'=>['text'=>'Session '],'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['session_id'])]); ?>
        <?= $this->Form->input('term_id',['options' => $terms,'class'=>'form-control','data-select-id'=>'level','label'=>['text'=>'Class'],'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['term_id'])]); ?>
        <?= $this->Form->input('class_id',['options' => $classes,'class'=>'form-control','data-select-id'=>'level','label'=>['text'=>'Class'],'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['class_id'])]); ?>
        <?= $this->Form->submit(__('change'),['class'=>'btn btn-primary']) ?>
    </div>
    <?= $this->Form->end() ?>

    <h3><?= h($subject->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Block') ?></th>
            <td><?= $subject->has('block') ? $this->Html->link($subject->block->name, ['controller' => 'Blocks', 'action' => 'view', $subject->block->id]) : '' ?></td>
        </tr>
    </table>

    <div class="related">
        <h4><?= __('Related Student Termly Subject Positions') ?></h4>
        <?php if (!empty($subject->student_termly_subject_positions)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th><?= __('Student Id') ?></th>
                    <th><?= __('Total') ?></th>
                    <th><?= __('Position') ?></th>
                </tr>
                <?php foreach ($subject->student_termly_subject_positions as $studentTermlySubjectPositions): ?>
                    <tr>
                        <td><?= h($studentTermlySubjectPositions->student_id) ?></td>
                        <td><?= h($studentTermlySubjectPositions->total) ?></td>
                        <td><?= $this->Position->formatPositionOutput($studentTermlySubjectPositions->position) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>

    <div class="related">
        <h4><?= __('Related Student Termly Subject Position On Class Demacations') ?></h4>
        <?php if (!empty($subject->student_termly_subject_position_on_class_demacations)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th><?= __('Student Id') ?></th>
                    <th><?= __('Total') ?></th>
                    <th><?= __('Position') ?></th>
                    <th><?= __('Class Id') ?></th>
                    <th><?= __('Class Demacation Id') ?></th>
                </tr>
                <?php foreach ($subject->student_termly_subject_position_on_class_demacations as $studentTermlySubjectPositionOnClassDemacations): ?>
                    <tr>
                        <td><?= h($studentTermlySubjectPositionOnClassDemacations->student_id) ?></td>
                        <td><?= h($studentTermlySubjectPositionOnClassDemacations->total) ?></td>
                        <td><?= $this->Position->formatPositionOutput($studentTermlySubjectPositionOnClassDemacations->position) ?></td>
                        <td><?= h($studentTermlySubjectPositionOnClassDemacations->class_id) ?></td>
                        <td><?= h($studentTermlySubjectPositionOnClassDemacations->class_demacation_id) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>

</div>
