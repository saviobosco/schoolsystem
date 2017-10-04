<?php
// including the search parameter element
echo $this->element('searchParametersSessionClassTerm');
?>

<div class="panel panel-inverse m-t-20">
    <div class="panel-heading">
        <h4 class="panel-title"> View Student Skills - <?= $student->id ?> </h4>
    </div>
    <div class="panel-body">

        <div class="m-t-20 m-b-20">
            <?= $this->element('Student/header_links') ?>
        </div>

        <div class="row m-t-30 ">
            <div class="col-sm-2">
                <div class="profile-picture">
                    <?= $this->Html->image('student-pictures/students/photo/'.$student->photo_dir.'/'.$student->photo,['alt' => $student->id,'width' => '150px']) ?>
                </div>
            </div>
            <div class="col-sm-10">
                <table class="table table-bordered">
                    <tr>
                        <th><?= __('Name') ?></th>
                        <td><?= h($student->full_name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Admission No.') ?></th>
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
                        <th><?= __('Session') ?></th>
                        <td><?= $student->session->session  ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Class') ?></th>
                        <td><?= $student->class->class ?></td>
                    </tr>
                </table>

            </div>
        </div>

        <div class="row  ">
            <div class="col-sm-12">

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

    </div>
</div>