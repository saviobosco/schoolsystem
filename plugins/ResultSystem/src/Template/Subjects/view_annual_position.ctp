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
        <h4><?= __('Related Student Annual Subject Position On Class Demacations') ?></h4>
        <?php if (!empty($subject->student_annual_subject_position_on_class_demacations)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th><?= __('Id') ?></th>
                    <th><?= __('Subject Id') ?></th>
                    <th><?= __('Student Id') ?></th>
                    <th><?= __('Total') ?></th>
                    <th><?= __('Position') ?></th>
                    <th><?= __('Class Id') ?></th>
                    <th><?= __('Class Demacation Id') ?></th>
                    <th><?= __('Session Id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($subject->student_annual_subject_position_on_class_demacations as $studentAnnualSubjectPositionOnClassDemacations): ?>
                    <tr>
                        <td><?= h($studentAnnualSubjectPositionOnClassDemacations->id) ?></td>
                        <td><?= h($studentAnnualSubjectPositionOnClassDemacations->subject_id) ?></td>
                        <td><?= h($studentAnnualSubjectPositionOnClassDemacations->student_id) ?></td>
                        <td><?= h($studentAnnualSubjectPositionOnClassDemacations->total) ?></td>
                        <td><?= h($studentAnnualSubjectPositionOnClassDemacations->position) ?></td>
                        <td><?= h($studentAnnualSubjectPositionOnClassDemacations->class_id) ?></td>
                        <td><?= h($studentAnnualSubjectPositionOnClassDemacations->class_demacation_id) ?></td>
                        <td><?= h($studentAnnualSubjectPositionOnClassDemacations->session_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'StudentAnnualSubjectPositionOnClassDemacations', 'action' => 'view', $studentAnnualSubjectPositionOnClassDemacations->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'StudentAnnualSubjectPositionOnClassDemacations', 'action' => 'edit', $studentAnnualSubjectPositionOnClassDemacations->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentAnnualSubjectPositionOnClassDemacations', 'action' => 'delete', $studentAnnualSubjectPositionOnClassDemacations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentAnnualSubjectPositionOnClassDemacations->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Student Annual Subject Positions') ?></h4>
        <?php if (!empty($subject->student_annual_subject_positions)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th><?= __('Id') ?></th>
                    <th><?= __('Subject Id') ?></th>
                    <th><?= __('Student Id') ?></th>
                    <th><?= __('Total') ?></th>
                    <th><?= __('Position') ?></th>
                    <th><?= __('Class Id') ?></th>
                    <th><?= __('Session Id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
                <?php foreach ($subject->student_annual_subject_positions as $studentAnnualSubjectPositions): ?>
                    <tr>
                        <td><?= h($studentAnnualSubjectPositions->id) ?></td>
                        <td><?= h($studentAnnualSubjectPositions->subject_id) ?></td>
                        <td><?= h($studentAnnualSubjectPositions->student_id) ?></td>
                        <td><?= h($studentAnnualSubjectPositions->total) ?></td>
                        <td><?= h($studentAnnualSubjectPositions->position) ?></td>
                        <td><?= h($studentAnnualSubjectPositions->class_id) ?></td>
                        <td><?= h($studentAnnualSubjectPositions->session_id) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['controller' => 'StudentAnnualSubjectPositions', 'action' => 'view', $studentAnnualSubjectPositions->student_id]) ?>
                            <?= $this->Html->link(__('Edit'), ['controller' => 'StudentAnnualSubjectPositions', 'action' => 'edit', $studentAnnualSubjectPositions->student_id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentAnnualSubjectPositions', 'action' => 'delete', $studentAnnualSubjectPositions->student_id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentAnnualSubjectPositions->student_id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </div>

</div>
