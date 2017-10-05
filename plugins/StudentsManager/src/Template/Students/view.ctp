<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Student'), ['action' => 'edit', $student->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Student'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Students'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Classes'), ['controller' => 'Classes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Class'), ['controller' => 'Classes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Class Demarcations'), ['controller' => 'ClassDemarcations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Class Demarcation'), ['controller' => 'ClassDemarcations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Student Annual Position On Class Demarcations'), ['controller' => 'StudentAnnualPositionOnClassDemarcations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student Annual Position On Class Demarcation'), ['controller' => 'StudentAnnualPositionOnClassDemarcations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Student Annual Positions'), ['controller' => 'StudentAnnualPositions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student Annual Position'), ['controller' => 'StudentAnnualPositions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Student Annual Results'), ['controller' => 'StudentAnnualResults', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student Annual Result'), ['controller' => 'StudentAnnualResults', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Student Annual Subject Position On Class Demarcations'), ['controller' => 'StudentAnnualSubjectPositionOnClassDemarcations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student Annual Subject Position On Class Demarcation'), ['controller' => 'StudentAnnualSubjectPositionOnClassDemarcations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Student Annual Subject Positions'), ['controller' => 'StudentAnnualSubjectPositions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student Annual Subject Position'), ['controller' => 'StudentAnnualSubjectPositions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Student General Remarks'), ['controller' => 'StudentGeneralRemarks', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student General Remark'), ['controller' => 'StudentGeneralRemarks', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Student Publish Results'), ['controller' => 'StudentPublishResults', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student Publish Result'), ['controller' => 'StudentPublishResults', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Student Result Pins'), ['controller' => 'StudentResultPins', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student Result Pin'), ['controller' => 'StudentResultPins', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Student Termly Position On Class Demarcations'), ['controller' => 'StudentTermlyPositionOnClassDemarcations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student Termly Position On Class Demarcation'), ['controller' => 'StudentTermlyPositionOnClassDemarcations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Student Termly Positions'), ['controller' => 'StudentTermlyPositions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student Termly Position'), ['controller' => 'StudentTermlyPositions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Student Termly Results'), ['controller' => 'StudentTermlyResults', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student Termly Result'), ['controller' => 'StudentTermlyResults', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Student Termly Subject Position On Class Demarcations'), ['controller' => 'StudentTermlySubjectPositionOnClassDemarcations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student Termly Subject Position On Class Demarcation'), ['controller' => 'StudentTermlySubjectPositionOnClassDemarcations', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Student Termly Subject Positions'), ['controller' => 'StudentTermlySubjectPositions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Student Termly Subject Position'), ['controller' => 'StudentTermlySubjectPositions', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students Affective Disposition Scores'), ['controller' => 'StudentsAffectiveDispositionScores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Students Affective Disposition Score'), ['controller' => 'StudentsAffectiveDispositionScores', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Students Psychomotor Skill Scores'), ['controller' => 'StudentsPsychomotorSkillScores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Students Psychomotor Skill Score'), ['controller' => 'StudentsPsychomotorSkillScores', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="students view large-9 medium-8 columns content">
    <h3><?= h($student->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= h($student->id) ?></td>
        </tr>
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($student->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Last Name') ?></th>
            <td><?= h($student->last_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Gender') ?></th>
            <td><?= h($student->gender) ?></td>
        </tr>
        <tr>
            <th><?= __('State Of Origin') ?></th>
            <td><?= h($student->state_of_origin) ?></td>
        </tr>
        <tr>
            <th><?= __('Religion') ?></th>
            <td><?= h($student->religion) ?></td>
        </tr>
        <tr>
            <th><?= __('Home Residence') ?></th>
            <td><?= h($student->home_residence) ?></td>
        </tr>
        <tr>
            <th><?= __('Guardian') ?></th>
            <td><?= h($student->guardian) ?></td>
        </tr>
        <tr>
            <th><?= __('Relationship To Guardian') ?></th>
            <td><?= h($student->relationship_to_guardian) ?></td>
        </tr>
        <tr>
            <th><?= __('Occupation Of Guardian') ?></th>
            <td><?= h($student->occupation_of_guardian) ?></td>
        </tr>
        <tr>
            <th><?= __('Guardian Phone Number') ?></th>
            <td><?= h($student->guardian_phone_number) ?></td>
        </tr>
        <tr>
            <th><?= __('Session') ?></th>
            <td><?= $student->has('session') ? $this->Html->link($student->session->id, ['controller' => 'Sessions', 'action' => 'view', $student->session->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Class') ?></th>
            <td><?= $student->has('class') ? $this->Html->link($student->class->id, ['controller' => 'Classes', 'action' => 'view', $student->class->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Class Demarcation') ?></th>
            <td><?= $student->has('class_demarcation') ? $this->Html->link($student->class_demarcation->name, ['controller' => 'ClassDemarcations', 'action' => 'view', $student->class_demarcation->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Photo') ?></th>
            <td><?= h($student->photo) ?></td>
        </tr>
        <tr>
            <th><?= __('Photo Dir') ?></th>
            <td><?= h($student->photo_dir) ?></td>
        </tr>
        <tr>
            <th><?= __('State') ?></th>
            <td><?= $student->has('state') ? $this->Html->link($student->state->id, ['controller' => 'States', 'action' => 'view', $student->state->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= $this->Number->format($student->status) ?></td>
        </tr>
        <tr>
            <th><?= __('Session Admitted Id') ?></th>
            <td><?= $this->Number->format($student->session_admitted_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Graduated') ?></th>
            <td><?= $this->Number->format($student->graduated) ?></td>
        </tr>
        <tr>
            <th><?= __('Graduated Session Id') ?></th>
            <td><?= $this->Number->format($student->graduated_session_id) ?></td>
        </tr>
        <tr>
            <th><?= __('Date Of Birth') ?></th>
            <td><?= h($student->date_of_birth) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($student->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($student->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Student Annual Position On Class Demarcations') ?></h4>
        <?php if (!empty($student->student_annual_position_on_class_demarcations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Student Id') ?></th>
                <th><?= __('Total') ?></th>
                <th><?= __('Average') ?></th>
                <th><?= __('Grade') ?></th>
                <th><?= __('Position') ?></th>
                <th><?= __('Class Id') ?></th>
                <th><?= __('Class Demarcation Id') ?></th>
                <th><?= __('Session Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($student->student_annual_position_on_class_demarcations as $studentAnnualPositionOnClassDemarcations): ?>
            <tr>
                <td><?= h($studentAnnualPositionOnClassDemarcations->id) ?></td>
                <td><?= h($studentAnnualPositionOnClassDemarcations->student_id) ?></td>
                <td><?= h($studentAnnualPositionOnClassDemarcations->total) ?></td>
                <td><?= h($studentAnnualPositionOnClassDemarcations->average) ?></td>
                <td><?= h($studentAnnualPositionOnClassDemarcations->grade) ?></td>
                <td><?= h($studentAnnualPositionOnClassDemarcations->position) ?></td>
                <td><?= h($studentAnnualPositionOnClassDemarcations->class_id) ?></td>
                <td><?= h($studentAnnualPositionOnClassDemarcations->class_demarcation_id) ?></td>
                <td><?= h($studentAnnualPositionOnClassDemarcations->session_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StudentAnnualPositionOnClassDemarcations', 'action' => 'view', $studentAnnualPositionOnClassDemarcations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StudentAnnualPositionOnClassDemarcations', 'action' => 'edit', $studentAnnualPositionOnClassDemarcations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentAnnualPositionOnClassDemarcations', 'action' => 'delete', $studentAnnualPositionOnClassDemarcations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentAnnualPositionOnClassDemarcations->id)]) ?>
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
                <th><?= __('Id') ?></th>
                <th><?= __('Student Id') ?></th>
                <th><?= __('Total') ?></th>
                <th><?= __('Average') ?></th>
                <th><?= __('Grade') ?></th>
                <th><?= __('Position') ?></th>
                <th><?= __('Class Id') ?></th>
                <th><?= __('Session Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($student->student_annual_positions as $studentAnnualPositions): ?>
            <tr>
                <td><?= h($studentAnnualPositions->id) ?></td>
                <td><?= h($studentAnnualPositions->student_id) ?></td>
                <td><?= h($studentAnnualPositions->total) ?></td>
                <td><?= h($studentAnnualPositions->average) ?></td>
                <td><?= h($studentAnnualPositions->grade) ?></td>
                <td><?= h($studentAnnualPositions->position) ?></td>
                <td><?= h($studentAnnualPositions->class_id) ?></td>
                <td><?= h($studentAnnualPositions->session_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StudentAnnualPositions', 'action' => 'view', $studentAnnualPositions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StudentAnnualPositions', 'action' => 'edit', $studentAnnualPositions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentAnnualPositions', 'action' => 'delete', $studentAnnualPositions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentAnnualPositions->id)]) ?>
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
                <th><?= __('Id') ?></th>
                <th><?= __('Student Id') ?></th>
                <th><?= __('Subject Id') ?></th>
                <th><?= __('First Term') ?></th>
                <th><?= __('Second Term') ?></th>
                <th><?= __('Third Term') ?></th>
                <th><?= __('Total') ?></th>
                <th><?= __('Average') ?></th>
                <th><?= __('Remark') ?></th>
                <th><?= __('Class Id') ?></th>
                <th><?= __('Session Id') ?></th>
                <th><?= __('Grade') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($student->student_annual_results as $studentAnnualResults): ?>
            <tr>
                <td><?= h($studentAnnualResults->id) ?></td>
                <td><?= h($studentAnnualResults->student_id) ?></td>
                <td><?= h($studentAnnualResults->subject_id) ?></td>
                <td><?= h($studentAnnualResults->first_term) ?></td>
                <td><?= h($studentAnnualResults->second_term) ?></td>
                <td><?= h($studentAnnualResults->third_term) ?></td>
                <td><?= h($studentAnnualResults->total) ?></td>
                <td><?= h($studentAnnualResults->average) ?></td>
                <td><?= h($studentAnnualResults->remark) ?></td>
                <td><?= h($studentAnnualResults->class_id) ?></td>
                <td><?= h($studentAnnualResults->session_id) ?></td>
                <td><?= h($studentAnnualResults->grade) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StudentAnnualResults', 'action' => 'view', $studentAnnualResults->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StudentAnnualResults', 'action' => 'edit', $studentAnnualResults->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentAnnualResults', 'action' => 'delete', $studentAnnualResults->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentAnnualResults->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Student Annual Subject Position On Class Demarcations') ?></h4>
        <?php if (!empty($student->student_annual_subject_position_on_class_demarcations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Subject Id') ?></th>
                <th><?= __('Student Id') ?></th>
                <th><?= __('Total') ?></th>
                <th><?= __('Position') ?></th>
                <th><?= __('Class Id') ?></th>
                <th><?= __('Class Demarcation Id') ?></th>
                <th><?= __('Session Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($student->student_annual_subject_position_on_class_demarcations as $studentAnnualSubjectPositionOnClassDemarcations): ?>
            <tr>
                <td><?= h($studentAnnualSubjectPositionOnClassDemarcations->id) ?></td>
                <td><?= h($studentAnnualSubjectPositionOnClassDemarcations->subject_id) ?></td>
                <td><?= h($studentAnnualSubjectPositionOnClassDemarcations->student_id) ?></td>
                <td><?= h($studentAnnualSubjectPositionOnClassDemarcations->total) ?></td>
                <td><?= h($studentAnnualSubjectPositionOnClassDemarcations->position) ?></td>
                <td><?= h($studentAnnualSubjectPositionOnClassDemarcations->class_id) ?></td>
                <td><?= h($studentAnnualSubjectPositionOnClassDemarcations->class_demarcation_id) ?></td>
                <td><?= h($studentAnnualSubjectPositionOnClassDemarcations->session_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StudentAnnualSubjectPositionOnClassDemarcations', 'action' => 'view', $studentAnnualSubjectPositionOnClassDemarcations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StudentAnnualSubjectPositionOnClassDemarcations', 'action' => 'edit', $studentAnnualSubjectPositionOnClassDemarcations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentAnnualSubjectPositionOnClassDemarcations', 'action' => 'delete', $studentAnnualSubjectPositionOnClassDemarcations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentAnnualSubjectPositionOnClassDemarcations->id)]) ?>
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
                <th><?= __('Id') ?></th>
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
                <td><?= h($studentAnnualSubjectPositions->id) ?></td>
                <td><?= h($studentAnnualSubjectPositions->subject_id) ?></td>
                <td><?= h($studentAnnualSubjectPositions->student_id) ?></td>
                <td><?= h($studentAnnualSubjectPositions->total) ?></td>
                <td><?= h($studentAnnualSubjectPositions->position) ?></td>
                <td><?= h($studentAnnualSubjectPositions->class_id) ?></td>
                <td><?= h($studentAnnualSubjectPositions->session_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StudentAnnualSubjectPositions', 'action' => 'view', $studentAnnualSubjectPositions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StudentAnnualSubjectPositions', 'action' => 'edit', $studentAnnualSubjectPositions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentAnnualSubjectPositions', 'action' => 'delete', $studentAnnualSubjectPositions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentAnnualSubjectPositions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Student General Remarks') ?></h4>
        <?php if (!empty($student->student_general_remarks)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Student Id') ?></th>
                <th><?= __('Remark') ?></th>
                <th><?= __('Class Id') ?></th>
                <th><?= __('Term Id') ?></th>
                <th><?= __('Session Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($student->student_general_remarks as $studentGeneralRemarks): ?>
            <tr>
                <td><?= h($studentGeneralRemarks->id) ?></td>
                <td><?= h($studentGeneralRemarks->student_id) ?></td>
                <td><?= h($studentGeneralRemarks->remark) ?></td>
                <td><?= h($studentGeneralRemarks->class_id) ?></td>
                <td><?= h($studentGeneralRemarks->term_id) ?></td>
                <td><?= h($studentGeneralRemarks->session_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StudentGeneralRemarks', 'action' => 'view', $studentGeneralRemarks->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StudentGeneralRemarks', 'action' => 'edit', $studentGeneralRemarks->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentGeneralRemarks', 'action' => 'delete', $studentGeneralRemarks->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentGeneralRemarks->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Student Publish Results') ?></h4>
        <?php if (!empty($student->student_publish_results)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Student Id') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Class Id') ?></th>
                <th><?= __('Term Id') ?></th>
                <th><?= __('Session Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($student->student_publish_results as $studentPublishResults): ?>
            <tr>
                <td><?= h($studentPublishResults->id) ?></td>
                <td><?= h($studentPublishResults->student_id) ?></td>
                <td><?= h($studentPublishResults->status) ?></td>
                <td><?= h($studentPublishResults->class_id) ?></td>
                <td><?= h($studentPublishResults->term_id) ?></td>
                <td><?= h($studentPublishResults->session_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StudentPublishResults', 'action' => 'view', $studentPublishResults->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StudentPublishResults', 'action' => 'edit', $studentPublishResults->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentPublishResults', 'action' => 'delete', $studentPublishResults->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentPublishResults->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Student Result Pins') ?></h4>
        <?php if (!empty($student->student_result_pins)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Serial Number') ?></th>
                <th><?= __('Pin') ?></th>
                <th><?= __('Student Id') ?></th>
                <th><?= __('Term Id') ?></th>
                <th><?= __('Session Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Class Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($student->student_result_pins as $studentResultPins): ?>
            <tr>
                <td><?= h($studentResultPins->serial_number) ?></td>
                <td><?= h($studentResultPins->pin) ?></td>
                <td><?= h($studentResultPins->student_id) ?></td>
                <td><?= h($studentResultPins->term_id) ?></td>
                <td><?= h($studentResultPins->session_id) ?></td>
                <td><?= h($studentResultPins->created) ?></td>
                <td><?= h($studentResultPins->modified) ?></td>
                <td><?= h($studentResultPins->class_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StudentResultPins', 'action' => 'view', $studentResultPins->serial_number]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StudentResultPins', 'action' => 'edit', $studentResultPins->serial_number]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentResultPins', 'action' => 'delete', $studentResultPins->serial_number], ['confirm' => __('Are you sure you want to delete # {0}?', $studentResultPins->serial_number)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Student Termly Position On Class Demarcations') ?></h4>
        <?php if (!empty($student->student_termly_position_on_class_demarcations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Student Id') ?></th>
                <th><?= __('Total') ?></th>
                <th><?= __('Average') ?></th>
                <th><?= __('Grade') ?></th>
                <th><?= __('Position') ?></th>
                <th><?= __('Class Id') ?></th>
                <th><?= __('Class Demarcation Id') ?></th>
                <th><?= __('Term Id') ?></th>
                <th><?= __('Session Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($student->student_termly_position_on_class_demarcations as $studentTermlyPositionOnClassDemarcations): ?>
            <tr>
                <td><?= h($studentTermlyPositionOnClassDemarcations->id) ?></td>
                <td><?= h($studentTermlyPositionOnClassDemarcations->student_id) ?></td>
                <td><?= h($studentTermlyPositionOnClassDemarcations->total) ?></td>
                <td><?= h($studentTermlyPositionOnClassDemarcations->average) ?></td>
                <td><?= h($studentTermlyPositionOnClassDemarcations->grade) ?></td>
                <td><?= h($studentTermlyPositionOnClassDemarcations->position) ?></td>
                <td><?= h($studentTermlyPositionOnClassDemarcations->class_id) ?></td>
                <td><?= h($studentTermlyPositionOnClassDemarcations->class_demarcation_id) ?></td>
                <td><?= h($studentTermlyPositionOnClassDemarcations->term_id) ?></td>
                <td><?= h($studentTermlyPositionOnClassDemarcations->session_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StudentTermlyPositionOnClassDemarcations', 'action' => 'view', $studentTermlyPositionOnClassDemarcations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StudentTermlyPositionOnClassDemarcations', 'action' => 'edit', $studentTermlyPositionOnClassDemarcations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentTermlyPositionOnClassDemarcations', 'action' => 'delete', $studentTermlyPositionOnClassDemarcations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentTermlyPositionOnClassDemarcations->id)]) ?>
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
                <th><?= __('Id') ?></th>
                <th><?= __('Student Id') ?></th>
                <th><?= __('Total') ?></th>
                <th><?= __('Average') ?></th>
                <th><?= __('Grade') ?></th>
                <th><?= __('Position') ?></th>
                <th><?= __('Class Id') ?></th>
                <th><?= __('Term Id') ?></th>
                <th><?= __('Session Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($student->student_termly_positions as $studentTermlyPositions): ?>
            <tr>
                <td><?= h($studentTermlyPositions->id) ?></td>
                <td><?= h($studentTermlyPositions->student_id) ?></td>
                <td><?= h($studentTermlyPositions->total) ?></td>
                <td><?= h($studentTermlyPositions->average) ?></td>
                <td><?= h($studentTermlyPositions->grade) ?></td>
                <td><?= h($studentTermlyPositions->position) ?></td>
                <td><?= h($studentTermlyPositions->class_id) ?></td>
                <td><?= h($studentTermlyPositions->term_id) ?></td>
                <td><?= h($studentTermlyPositions->session_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StudentTermlyPositions', 'action' => 'view', $studentTermlyPositions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StudentTermlyPositions', 'action' => 'edit', $studentTermlyPositions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentTermlyPositions', 'action' => 'delete', $studentTermlyPositions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentTermlyPositions->id)]) ?>
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
                <th><?= __('Id') ?></th>
                <th><?= __('Student Id') ?></th>
                <th><?= __('Subject Id') ?></th>
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
            <?php foreach ($student->student_termly_results as $studentTermlyResults): ?>
            <tr>
                <td><?= h($studentTermlyResults->id) ?></td>
                <td><?= h($studentTermlyResults->student_id) ?></td>
                <td><?= h($studentTermlyResults->subject_id) ?></td>
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
                    <?= $this->Html->link(__('View'), ['controller' => 'StudentTermlyResults', 'action' => 'view', $studentTermlyResults->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StudentTermlyResults', 'action' => 'edit', $studentTermlyResults->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentTermlyResults', 'action' => 'delete', $studentTermlyResults->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentTermlyResults->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Student Termly Subject Position On Class Demarcations') ?></h4>
        <?php if (!empty($student->student_termly_subject_position_on_class_demarcations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Subject Id') ?></th>
                <th><?= __('Student Id') ?></th>
                <th><?= __('Total') ?></th>
                <th><?= __('Position') ?></th>
                <th><?= __('Class Id') ?></th>
                <th><?= __('Class Demarcation Id') ?></th>
                <th><?= __('Term Id') ?></th>
                <th><?= __('Session Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($student->student_termly_subject_position_on_class_demarcations as $studentTermlySubjectPositionOnClassDemarcations): ?>
            <tr>
                <td><?= h($studentTermlySubjectPositionOnClassDemarcations->id) ?></td>
                <td><?= h($studentTermlySubjectPositionOnClassDemarcations->subject_id) ?></td>
                <td><?= h($studentTermlySubjectPositionOnClassDemarcations->student_id) ?></td>
                <td><?= h($studentTermlySubjectPositionOnClassDemarcations->total) ?></td>
                <td><?= h($studentTermlySubjectPositionOnClassDemarcations->position) ?></td>
                <td><?= h($studentTermlySubjectPositionOnClassDemarcations->class_id) ?></td>
                <td><?= h($studentTermlySubjectPositionOnClassDemarcations->class_demarcation_id) ?></td>
                <td><?= h($studentTermlySubjectPositionOnClassDemarcations->term_id) ?></td>
                <td><?= h($studentTermlySubjectPositionOnClassDemarcations->session_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StudentTermlySubjectPositionOnClassDemarcations', 'action' => 'view', $studentTermlySubjectPositionOnClassDemarcations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StudentTermlySubjectPositionOnClassDemarcations', 'action' => 'edit', $studentTermlySubjectPositionOnClassDemarcations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentTermlySubjectPositionOnClassDemarcations', 'action' => 'delete', $studentTermlySubjectPositionOnClassDemarcations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentTermlySubjectPositionOnClassDemarcations->id)]) ?>
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
            <?php foreach ($student->student_termly_subject_positions as $studentTermlySubjectPositions): ?>
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
                    <?= $this->Html->link(__('View'), ['controller' => 'StudentTermlySubjectPositions', 'action' => 'view', $studentTermlySubjectPositions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StudentTermlySubjectPositions', 'action' => 'edit', $studentTermlySubjectPositions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentTermlySubjectPositions', 'action' => 'delete', $studentTermlySubjectPositions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentTermlySubjectPositions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Students Affective Disposition Scores') ?></h4>
        <?php if (!empty($student->students_affective_disposition_scores)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Student Id') ?></th>
                <th><?= __('Affective Id') ?></th>
                <th><?= __('Score') ?></th>
                <th><?= __('Class Id') ?></th>
                <th><?= __('Term Id') ?></th>
                <th><?= __('Session Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($student->students_affective_disposition_scores as $studentsAffectiveDispositionScores): ?>
            <tr>
                <td><?= h($studentsAffectiveDispositionScores->id) ?></td>
                <td><?= h($studentsAffectiveDispositionScores->student_id) ?></td>
                <td><?= h($studentsAffectiveDispositionScores->affective_id) ?></td>
                <td><?= h($studentsAffectiveDispositionScores->score) ?></td>
                <td><?= h($studentsAffectiveDispositionScores->class_id) ?></td>
                <td><?= h($studentsAffectiveDispositionScores->term_id) ?></td>
                <td><?= h($studentsAffectiveDispositionScores->session_id) ?></td>
                <td><?= h($studentsAffectiveDispositionScores->created) ?></td>
                <td><?= h($studentsAffectiveDispositionScores->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StudentsAffectiveDispositionScores', 'action' => 'view', $studentsAffectiveDispositionScores->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StudentsAffectiveDispositionScores', 'action' => 'edit', $studentsAffectiveDispositionScores->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentsAffectiveDispositionScores', 'action' => 'delete', $studentsAffectiveDispositionScores->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentsAffectiveDispositionScores->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
    <div class="related">
        <h4><?= __('Related Students Psychomotor Skill Scores') ?></h4>
        <?php if (!empty($student->students_psychomotor_skill_scores)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Student Id') ?></th>
                <th><?= __('Psychomotor Id') ?></th>
                <th><?= __('Score') ?></th>
                <th><?= __('Class Id') ?></th>
                <th><?= __('Term Id') ?></th>
                <th><?= __('Session Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($student->students_psychomotor_skill_scores as $studentsPsychomotorSkillScores): ?>
            <tr>
                <td><?= h($studentsPsychomotorSkillScores->id) ?></td>
                <td><?= h($studentsPsychomotorSkillScores->student_id) ?></td>
                <td><?= h($studentsPsychomotorSkillScores->psychomotor_id) ?></td>
                <td><?= h($studentsPsychomotorSkillScores->score) ?></td>
                <td><?= h($studentsPsychomotorSkillScores->class_id) ?></td>
                <td><?= h($studentsPsychomotorSkillScores->term_id) ?></td>
                <td><?= h($studentsPsychomotorSkillScores->session_id) ?></td>
                <td><?= h($studentsPsychomotorSkillScores->created) ?></td>
                <td><?= h($studentsPsychomotorSkillScores->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'StudentsPsychomotorSkillScores', 'action' => 'view', $studentsPsychomotorSkillScores->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'StudentsPsychomotorSkillScores', 'action' => 'edit', $studentsPsychomotorSkillScores->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'StudentsPsychomotorSkillScores', 'action' => 'delete', $studentsPsychomotorSkillScores->id], ['confirm' => __('Are you sure you want to delete # {0}?', $studentsPsychomotorSkillScores->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
