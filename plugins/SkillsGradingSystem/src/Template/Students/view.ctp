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

        <div class="row">
            <div class="col-sm-6">
                <h4><?= __('Student Affective Disposition Scores') ?></h4>
                <?php if (!empty($student->students_affective_disposition_scores)): ?>
                    <table class="table table-bordered ">
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

            <div class="col-sm-6">
                <h4><?= __(' Student Psychomotor Skill Scores') ?></h4>
                <?php if (!empty($student->students_psychomotor_skill_scores)): ?>
                    <table class="table table-bordered ">
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
    </div>
</div>