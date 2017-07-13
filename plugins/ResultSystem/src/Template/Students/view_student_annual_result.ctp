<?php
$this->layout = 'result';
$edittemplates = [
    'submitContainer' => '{{content}}'
];
$this->Form->templates($edittemplates);

?>

<div class="container-fluid">

    <?php
    // including the search parameter element
        echo $this->element('resultParametersSessionTerm');
    ?>


    <div class="banner-image">
        <?= $this->Html->image('banner.jpg') ?>
    </div>
    <div class="row m-t-5">
        <div class="col-sm-4">
            <div>
                <table class="table result-details-table">
                    <tbody>
                    <tr>
                        <th> Name :</th>
                        <td colspan="4" class="name"> <?= $student->full_name ?></td>
                    </tr>
                    <tr>
                        <th>
                            Student ID
                        </th>
                        <td colspan="4" class="f">
                            <?= $student->id ?>
                        </td>
                    </tr>
                    <tr>
                        <th><?= __('Term :') ?></th>
                        <td colspan="2"><?= h($terms[@$this->SearchParameter->getDefaultValue($this->request->query['term_id'],$this->request->session()->read('Student.term_id'))]) ?></td>
                        <th><?= __('Session :') ?></th>
                        <td colspan=""><?= h($sessions[$this->request->session()->read('Student.session_id')]) ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-sm-4">
            <table class="table result-details-table ">

                <?php if (!empty( $studentPosition )): ?>
                    <tr>
                        <th> <?= __('Position :') ?> </th>
                        <td><?= $this->Position->formatPositionOutput($studentPosition->position)?> </td>
                        <th><?= __('out of ') ?></th>
                        <td><?= h('45') ?></td>
                    </tr>
                    <tr>
                        <th> <?= __('Total :') ?></th>
                        <td> <?= $studentPosition->total ?></td>
                        <th><?= __('average') ?></th>
                        <td><?= h($studentPosition->average) ?></td>
                    </tr>

                    <tr>
                        <th> <?= __('Grade') ?></th>
                        <td> <?= $studentPosition->grade ?></td>
                        <th><?= __('Next term begins') ?></th>
                        <td><?= h('') ?></td>
                    </tr>
                <?php endif; ?>
            </table>
        </div>

        <div class="col-sm-4">
            <div class="profile-picture">
                <?= $this->Html->image('saviobosco.jpg') ?>
            </div>
        </div>

    </div>


    <div class="row ">
        <div class="col-sm-9">

            <div class="row">
                <div class="col-sm-12">
                    <?php if (!empty($student->student_annual_results)): ?>
                        <table class="table table-bordered table-responsive table-result ">
                            <thead>
                            <tr class="bigger-height" >
                                <th><?= __('Subject') ?></th>
                                <th><div><p><?= __('First Term') ?></p></div></th>
                                <th><div><p><?= __('Second Term') ?></p></div></th>
                                <th><div><p><?= __('Third Term') ?></p></div></th>
                                <th><div><p><?= __('Exam') ?></p></div></th>
                                <th><div><p><?= __('Total') ?></p></div></th>
                                <th><div><p><?= __('Grade') ?></p></div></th>
                                <th><div><p><?= __('Remark') ?></p></div></th>
                                <th><div><p><?= __('Position') ?></p></div></th>
                            </tr>
                            </thead>
                            <?php foreach ($student->student_annual_results as $studentAnnualResults): ?>
                                <tr>
                                    <td><?= h($subjects[$studentAnnualResults->subject_id]) ?></td>
                                    <td><?= h($studentAnnualResults->first_term) ?></td>
                                    <td><?= h($studentAnnualResults->second_term) ?></td>
                                    <td><?= h($studentAnnualResults->third_term) ?></td>
                                    <td><?= h($studentAnnualResults->total) ?></td>
                                    <td><?= h($studentAnnualResults->average) ?></td>
                                    <td><?= h($studentAnnualResults->grade) ?></td>
                                    <td><?= h($studentAnnualResults->remark) ?></td>
                                    <td><?= @$this->Position->formatPositionOutput($studentAnnualSubjectPositions[$studentAnnualResults->subject_id]) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>
                    <?php endif; ?>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    &nbsp;
                </div>
                <div class=" col-sm-4">



                </div>

                <div class="col-sm-4">

                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="row">

                <!-- affective skills col -->
                <div class="col-sm-12">
                    <?php if (!empty($studentAffectiveDispositions)): ?>
                        <table class=" table-skill-score m-b-10 table-bordered table-responsive table-result ">
                            <thead>
                            <tr>
                                <th>Affective Disposition</th>
                                <th>Score</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($studentAffectiveDispositions as $studentAffectiveDisposition): ?>
                                <tr>
                                    <td> <?= h($studentAffectiveDisposition->affective->name)?></td>
                                    <td> <?= h($studentAffectiveDisposition->score)?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>

                    <?php endif; ?>

                    <?php if (!empty($studentPsychomotorSkills)): ?>
                        <table class="table-skill-score m-b-10 table-bordered table-responsive table-result">
                            <thead>
                            <tr>
                                <th>Psychomotor Skills</th>
                                <th>Score</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($studentPsychomotorSkills as $studentPsychomotorSkill): ?>
                                <tr>
                                    <td> <?= h($studentPsychomotorSkill->psychomotor->name)?></td>
                                    <td> <?= h($studentPsychomotorSkill->score)?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
                <!-- end of affective col -->
            </div>
        </div>
    </div>

</div>

