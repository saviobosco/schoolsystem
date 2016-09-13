<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Subject'), ['action' => 'edit', $subject->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Subject'), ['action' => 'delete', $subject->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subject->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Subjects'), ['action' => 'index']) ?> </li>
    </ul>
</nav>
<div class="subjects view large-9 medium-8 columns content">
    <h3><?= h($subject->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($subject->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Block') ?></th>
            <td><?= $subject->has('block') ? $this->Html->link($subject->block->name, ['controller' => 'Blocks', 'action' => 'view', $subject->block->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($subject->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Student Annual Results') ?></h4>
        <?php if (!empty($subject->student_annual_results)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Student Id') ?></th>
                <th><?= __('First Term') ?></th>
                <th><?= __('Second Term') ?></th>
                <th><?= __('Third Term') ?></th>
                <th><?= __('Total') ?></th>
                <th><?= __('Average') ?></th>
                <th><?= __('Remark') ?></th>
                <th><?= __('Class Id') ?></th>
                <th><?= __('Session Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($subject->student_annual_results as $studentAnnualResults): ?>
            <tr>
                <td><?= h($studentAnnualResults->student_id) ?></td>
                <td><?= h($studentAnnualResults->first_term) ?></td>
                <td><?= h($studentAnnualResults->second_term) ?></td>
                <td><?= h($studentAnnualResults->third_term) ?></td>
                <td><?= h($studentAnnualResults->total) ?></td>
                <td><?= h($studentAnnualResults->average) ?></td>
                <td><?= h($studentAnnualResults->remark) ?></td>
                <td><?= h($studentAnnualResults->class_id) ?></td>
                <td><?= h($studentAnnualResults->session_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StudentAnnualResults', 'action' => 'view', $studentAnnualResults->student_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StudentAnnualResults', 'action' => 'edit', $studentAnnualResults->student_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentAnnualResults', 'action' => 'delete', $studentAnnualResults->student_id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentAnnualResults->student_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
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
    <div class="related">
        <h4><?= __('Related Student Termly Results') ?></h4>
        <?php if (!empty($subject->student_termly_results)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Student Id') ?></th>
                <th><?= __('First Test') ?></th>
                <th><?= __('Second Test') ?></th>
                <th><?= __('Third Test') ?></th>
                <th><?= __('Exam') ?></th>
                <th><?= __('Total') ?></th>
                <th><?= __('Grade') ?></th>
                <th><?= __('Remark') ?></th>
                <th><?= __('Principal Comment') ?></th>
                <th><?= __('Head Teacher Comment') ?></th>
                <th><?= __('Class Id') ?></th>
                <th><?= __('Term Id') ?></th>
                <th><?= __('Session Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($subject->student_termly_results as $studentTermlyResults): ?>
            <tr>
                <td><?= h($studentTermlyResults->student_id) ?></td>
                <td><?= h($studentTermlyResults->first_test) ?></td>
                <td><?= h($studentTermlyResults->second_test) ?></td>
                <td><?= h($studentTermlyResults->third_test) ?></td>
                <td><?= h($studentTermlyResults->exam) ?></td>
                <td><?= h($studentTermlyResults->total) ?></td>
                <td><?= h($studentTermlyResults->grade) ?></td>
                <td><?= h($studentTermlyResults->remark) ?></td>
                <td><?= h($studentTermlyResults->principal_comment) ?></td>
                <td><?= h($studentTermlyResults->head_teacher_comment) ?></td>
                <td><?= h($studentTermlyResults->class_id) ?></td>
                <td><?= h($studentTermlyResults->term_id) ?></td>
                <td><?= h($studentTermlyResults->session_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StudentTermlyResults', 'action' => 'view', $studentTermlyResults->student_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StudentTermlyResults', 'action' => 'edit', $studentTermlyResults->student_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentTermlyResults', 'action' => 'delete', $studentTermlyResults->student_id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentTermlyResults->student_id)]) ?>
                </td>
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
                <th><?= __('Id') ?></th>
                <th><?= __('Subject Id') ?></th>
                <th><?= __('Student Id') ?></th>
                <th><?= __('Total') ?></th>
                <th><?= __('Position') ?></th>
                <th><?= __('Class Id') ?></th>
                <th><?= __('Class Demacation Id') ?></th>
                <th><?= __('Term Id') ?></th>
                <th><?= __('Session Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($subject->student_termly_subject_position_on_class_demacations as $studentTermlySubjectPositionOnClassDemacations): ?>
            <tr>
                <td><?= h($studentTermlySubjectPositionOnClassDemacations->id) ?></td>
                <td><?= h($studentTermlySubjectPositionOnClassDemacations->subject_id) ?></td>
                <td><?= h($studentTermlySubjectPositionOnClassDemacations->student_id) ?></td>
                <td><?= h($studentTermlySubjectPositionOnClassDemacations->total) ?></td>
                <td><?= h($studentTermlySubjectPositionOnClassDemacations->position) ?></td>
                <td><?= h($studentTermlySubjectPositionOnClassDemacations->class_id) ?></td>
                <td><?= h($studentTermlySubjectPositionOnClassDemacations->class_demacation_id) ?></td>
                <td><?= h($studentTermlySubjectPositionOnClassDemacations->term_id) ?></td>
                <td><?= h($studentTermlySubjectPositionOnClassDemacations->session_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StudentTermlySubjectPositionOnClassDemacations', 'action' => 'view', $studentTermlySubjectPositionOnClassDemacations->student_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StudentTermlySubjectPositionOnClassDemacations', 'action' => 'edit', $studentTermlySubjectPositionOnClassDemacations->student_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentTermlySubjectPositionOnClassDemacations', 'action' => 'delete', $studentTermlySubjectPositionOnClassDemacations->student_id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentTermlySubjectPositionOnClassDemacations->student_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Student Termly Subject Positions') ?></h4>
        <?php if (!empty($subject->student_termly_subject_positions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Subject Id') ?></th>
                <th><?= __('Student Id') ?></th>
                <th><?= __('Total') ?></th>
                <th><?= __('Position') ?></th>
                <th><?= __('Class Id') ?></th>
                <th><?= __('Term Id') ?></th>
                <th><?= __('Session Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($subject->student_termly_subject_positions as $studentTermlySubjectPositions): ?>
            <tr>
                <td><?= h($studentTermlySubjectPositions->id) ?></td>
                <td><?= h($studentTermlySubjectPositions->subject_id) ?></td>
                <td><?= h($studentTermlySubjectPositions->student_id) ?></td>
                <td><?= h($studentTermlySubjectPositions->total) ?></td>
                <td><?= h($studentTermlySubjectPositions->position) ?></td>
                <td><?= h($studentTermlySubjectPositions->class_id) ?></td>
                <td><?= h($studentTermlySubjectPositions->term_id) ?></td>
                <td><?= h($studentTermlySubjectPositions->session_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StudentTermlySubjectPositions', 'action' => 'view', $studentTermlySubjectPositions->student_id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StudentTermlySubjectPositions', 'action' => 'edit', $studentTermlySubjectPositions->student_id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentTermlySubjectPositions', 'action' => 'delete', $studentTermlySubjectPositions->student_id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentTermlySubjectPositions->student_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
