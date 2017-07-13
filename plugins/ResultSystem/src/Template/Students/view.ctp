<?php
// including the search parameter element
echo $this->element('searchParametersSessionClassTerm');
?>
<div class="row">
    <div class="col-sm-12">
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
        </table>
        <div class="related">
            <h4><?= __('Related Student Annual Position On Class Demacations') ?></h4>
            <?php if (!empty($student->student_annual_position_on_class_demacations)): ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?= __('Total') ?></th>
                        <th><?= __('Average') ?></th>
                        <th><?= __('Position') ?></th>
                        <th><?= __('Class Id') ?></th>
                        <th><?= __('Class Demacation Id') ?></th>
                        <th><?= __('Session Id') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($student->student_annual_position_on_class_demacations as $studentAnnualPositionOnClassDemacations): ?>
                        <tr>
                            <td><?= h($studentAnnualPositionOnClassDemacations->total) ?></td>
                            <td><?= h($studentAnnualPositionOnClassDemacations->average) ?></td>
                            <td><?= h($studentAnnualPositionOnClassDemacations->position) ?></td>
                            <td><?= h($studentAnnualPositionOnClassDemacations->class_id) ?></td>
                            <td><?= h($studentAnnualPositionOnClassDemacations->class_demacation_id) ?></td>
                            <td><?= h($studentAnnualPositionOnClassDemacations->session_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'StudentAnnualPositionOnClassDemacations', 'action' => 'view', $studentAnnualPositionOnClassDemacations->student_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'StudentAnnualPositionOnClassDemacations', 'action' => 'edit', $studentAnnualPositionOnClassDemacations->student_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentAnnualPositionOnClassDemacations', 'action' => 'delete', $studentAnnualPositionOnClassDemacations->student_id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentAnnualPositionOnClassDemacations->student_id)]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </div>
        <div class="related">
            <h4><?= __('Related Student Annual Positions') ?></h4>
            <?php if (!empty($student->student_annual_positions)): ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?= __('Total') ?></th>
                        <th><?= __('Average') ?></th>
                        <th><?= __('Position') ?></th>
                        <th><?= __('Class Id') ?></th>
                        <th><?= __('Session Id') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($student->student_annual_positions as $studentAnnualPositions): ?>
                        <tr>
                            <td><?= h($studentAnnualPositions->total) ?></td>
                            <td><?= h($studentAnnualPositions->average) ?></td>
                            <td><?= h($studentAnnualPositions->position) ?></td>
                            <td><?= h($studentAnnualPositions->class_id) ?></td>
                            <td><?= h($studentAnnualPositions->session_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'StudentAnnualPositions', 'action' => 'view', $studentAnnualPositions->student_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'StudentAnnualPositions', 'action' => 'edit', $studentAnnualPositions->student_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentAnnualPositions', 'action' => 'delete', $studentAnnualPositions->student_id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentAnnualPositions->student_id)]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </div>
        <div class="related">
            <h4><?= __('Related Student Annual Results') ?></h4>
            <?php if (!empty($student->student_annual_results)): ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?= __('Subject Id') ?></th>
                        <th><?= __('First Term') ?></th>
                        <th><?= __('Second Term') ?></th>
                        <th><?= __('Third Term') ?></th>
                        <th><?= __('Total') ?></th>
                        <th><?= __('Average') ?></th>
                        <th><?= __('Remark') ?></th>
                        <th><?= __('Class') ?></th>
                        <th><?= __('Session') ?></th>
                    </tr>
                    <?php foreach ($student->student_annual_results as $studentAnnualResults): ?>
                        <tr>
                            <td><?= h($subjects[$studentAnnualResults->subject_id]) ?></td>
                            <td><?= h($studentAnnualResults->first_term) ?></td>
                            <td><?= h($studentAnnualResults->second_term) ?></td>
                            <td><?= h($studentAnnualResults->third_term) ?></td>
                            <td><?= h($studentAnnualResults->total) ?></td>
                            <td><?= h($studentAnnualResults->average) ?></td>
                            <td><?= h($studentAnnualResults->remark) ?></td>
                            <td><?= h($classes[$studentAnnualResults->class_id]) ?></td>
                            <td><?= h($sessions[$studentAnnualResults->session_id]) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </div>
        <div class="related">
            <h4><?= __('Related Student Annual Subject Position On Class Demacations') ?></h4>
            <?php if (!empty($student->student_annual_subject_position_on_class_demacations)): ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?= __('Subject Id') ?></th>
                        <th><?= __('Total') ?></th>
                        <th><?= __('Position') ?></th>
                        <th><?= __('Class Id') ?></th>
                        <th><?= __('Class Demacation Id') ?></th>
                        <th><?= __('Session Id') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($student->student_annual_subject_position_on_class_demacations as $studentAnnualSubjectPositionOnClassDemacations): ?>
                        <tr>
                            <td><?= h($studentAnnualSubjectPositionOnClassDemacations->subject_id) ?></td>
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
            <?php if (!empty($student->student_annual_subject_positions)): ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?= __('Subject Id') ?></th>
                        <th><?= __('Student Id') ?></th>
                        <th><?= __('Total') ?></th>
                        <th><?= __('Position') ?></th>
                        <th><?= __('Class Id') ?></th>
                        <th><?= __('Session Id') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($student->student_annual_subject_positions as $studentAnnualSubjectPositions): ?>
                        <tr>
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
            <h4><?= __('Related Student Termly Position On Class Demacations') ?></h4>
            <?php if (!empty($student->student_termly_position_on_class_demacations)): ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?= __('Total') ?></th>
                        <th><?= __('Average') ?></th>
                        <th><?= __('Position') ?></th>
                        <th><?= __('Class Id') ?></th>
                        <th><?= __('Class Demacation Id') ?></th>
                        <th><?= __('Term Id') ?></th>
                        <th><?= __('Session Id') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($student->student_termly_position_on_class_demacations as $studentTermlyPositionOnClassDemacations): ?>
                        <tr>
                            <td><?= h($studentTermlyPositionOnClassDemacations->total) ?></td>
                            <td><?= h($studentTermlyPositionOnClassDemacations->average) ?></td>
                            <td><?= h($studentTermlyPositionOnClassDemacations->position) ?></td>
                            <td><?= h($studentTermlyPositionOnClassDemacations->class_id) ?></td>
                            <td><?= h($studentTermlyPositionOnClassDemacations->class_demacation_id) ?></td>
                            <td><?= h($studentTermlyPositionOnClassDemacations->term_id) ?></td>
                            <td><?= h($studentTermlyPositionOnClassDemacations->session_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'StudentTermlyPositionOnClassDemacations', 'action' => 'view', $studentTermlyPositionOnClassDemacations->student_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'StudentTermlyPositionOnClassDemacations', 'action' => 'edit', $studentTermlyPositionOnClassDemacations->student_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentTermlyPositionOnClassDemacations', 'action' => 'delete', $studentTermlyPositionOnClassDemacations->student_id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentTermlyPositionOnClassDemacations->student_id)]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </div>
        <div class="related">
            <h4><?= __('Related Student Termly Positions') ?></h4>
            <?php if (!empty($student->student_termly_positions)): ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?= __('Total') ?></th>
                        <th><?= __('Average') ?></th>
                        <th><?= __('Position') ?></th>
                        <th><?= __('Class Id') ?></th>
                        <th><?= __('Term Id') ?></th>
                        <th><?= __('Session Id') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($student->student_termly_positions as $studentTermlyPositions): ?>
                        <tr>
                            <td><?= h($studentTermlyPositions->total) ?></td>
                            <td><?= h($studentTermlyPositions->average) ?></td>
                            <td><?= h($studentTermlyPositions->position) ?></td>
                            <td><?= h($studentTermlyPositions->class_id) ?></td>
                            <td><?= h($studentTermlyPositions->term_id) ?></td>
                            <td><?= h($studentTermlyPositions->session_id) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'StudentTermlyPositions', 'action' => 'view', $studentTermlyPositions->student_id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'StudentTermlyPositions', 'action' => 'edit', $studentTermlyPositions->student_id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentTermlyPositions', 'action' => 'delete', $studentTermlyPositions->student_id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentTermlyPositions->student_id)]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </div>
        <div class="related">
            <h4><?= __('Related Student Termly Results') ?></h4>
            <?php if (!empty($student->student_termly_results)): ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?= __('Subject') ?></th>
                        <th><?= __('First Test') ?></th>
                        <th><?= __('Second Test') ?></th>
                        <th><?= __('Third Test') ?></th>
                        <th><?= __('Exam') ?></th>
                        <th><?= __('Total') ?></th>
                        <th><?= __('Grade') ?></th>
                        <th><?= __('Remark') ?></th>
                        <th><?= __('Class ') ?></th>
                        <th><?= __('Term ') ?></th>
                        <th><?= __('Session') ?></th>
                    </tr>
                    <?php foreach ($student->student_termly_results as $studentTermlyResults): ?>
                        <tr>
                            <td><?= h($subjects[$studentTermlyResults->subject_id]) ?></td>
                            <td><?= h($studentTermlyResults->first_test) ?></td>
                            <td><?= h($studentTermlyResults->second_test) ?></td>
                            <td><?= h($studentTermlyResults->third_test) ?></td>
                            <td><?= h($studentTermlyResults->exam) ?></td>
                            <td><?= h($studentTermlyResults->total) ?></td>
                            <td><?= h($studentTermlyResults->grade) ?></td>
                            <td><?= h($studentTermlyResults->remark) ?></td>
                            <td><?= h($classes[$studentTermlyResults->class_id]) ?></td>
                            <td><?= h($studentTermlyResults->term_id) ?></td>
                            <td><?= h($sessions[$studentTermlyResults->session_id]) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </div>
        <div class="related">
            <h4><?= __('Related Student Termly Subject Position On Class Demacations') ?></h4>
            <?php if (!empty($student->student_termly_subject_position_on_class_demacations)): ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
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
                    <?php foreach ($student->student_termly_subject_position_on_class_demacations as $studentTermlySubjectPositionOnClassDemacations): ?>
                        <tr>
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
            <?php if (!empty($student->student_termly_subject_positions)): ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?= __('Subject Id') ?></th>
                        <th><?= __('Student Id') ?></th>
                        <th><?= __('Total') ?></th>
                        <th><?= __('Position') ?></th>
                        <th><?= __('Class Id') ?></th>
                        <th><?= __('Term Id') ?></th>
                        <th><?= __('Session Id') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($student->student_termly_subject_positions as $studentTermlySubjectPositions): ?>
                        <tr>
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
</div>
