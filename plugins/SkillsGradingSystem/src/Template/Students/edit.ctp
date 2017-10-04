<?php
$edittemplates = [
    'label' => '',
    'submitContainer' => '{{content}}'
];
$this->Form->templates($edittemplates);

?>

<?php
// including the search parameter element
echo $this->element('searchParametersSessionClassTerm');
?>

<div class="panel panel-inverse m-t-20 ">
    <div class="panel-heading">
        <h4 class="panel-title"> Edit Student Skills - <?= $student->id ?> </h4>
    </div>
    <div class="panel-body">

        <div class="m-t-20 m-b-20">
            <?= $this->element('Student/header_links') ?>
        </div>

        <div class="row">
            <div class="col-sm-12">

                <?= $this->Form->create($student) ?>
                <fieldset>
                    <legend><?= __('Edit Student') ?></legend>

                    <div class="row">
                        <div class="col-sm-2">
                            <div class="profile-picture">
                                <?= $this->Html->image('student-pictures/students/photo/'.$student->photo_dir.'/'.$student->photo,['alt' => $student->id,'width' => '150px']) ?>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <table class="table table-bordered">
                                <tr>
                                    <th><?= __('Name') ?></th>
                                    <td><?= h($student->full_name) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Admission No.') ?></th>
                                    <td><?= h($student->id) ?></td>
                                </tr>
                            </table>

                        </div>
                        <!-- begin of second col-sm-5 -->
                        <div class="col-sm-5">
                            <table class="table table-bordered">
                                <tr>
                                    <th><?= __('Term') ?></th>
                                    <td><?= h($terms[@$this->SearchParameter->getDefaultValue($this->request->query['term_id'],1)]) ?></td>
                                </tr>
                                <tr>
                                    <th><?= __('Session') ?></th>
                                    <td><?= h($sessions[$student->session_id]) ?></td>
                                </tr>
                            </table>
                        </div>
                        <!-- end of second col-sm-5 -->
                    </div>

                    <div class="row">

                        <div class="col-sm-6">
                            <?php if (!empty($affectiveSkills)): ?>

                                <table class="table table-bordered">
                                    <tr>
                                        <th><?= __('Affective Skills') ?></th>
                                        <th><?= __('Scores') ?></th>
                                    </tr>
                                    <?php for ($num = 0; $num < count($affectiveSkills); $num++ ): ?>
                                        <tr>
                                            <td><?= h($affectiveSkills[$num]['name']) ?></td>
                                            <td><?= $this->Form->input('students_affective_disposition_scores.'.$num.'.score') ?></td>
                                            <td class="hidden"><?= $this->Form->hidden('students_affective_disposition_scores.'.$num.'.affective_id',['value'=>$affectiveSkills[$num]['id']]) ?></td>
                                            <td class="hidden"><?= $this->Form->hidden('students_affective_disposition_scores.'.$num.'.student_id',['value' => $student->id]) ?></td>
                                            <td class="hidden"><?= $this->Form->hidden('students_affective_disposition_scores.'.$num.'.class_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['class_id'],1)]) ?></td>
                                            <td class="hidden"><?= $this->Form->hidden('students_affective_disposition_scores.'.$num.'.term_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['term_id'],1)]) ?></td>
                                            <td class="hidden"><?= $this->Form->hidden('students_affective_disposition_scores.'.$num.'.session_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['session_id'],1)]) ?></td>


                                        </tr>
                                    <?php endfor; ?>
                                </table>
                            <?php endif; ?>
                        </div>

                        <div class="col-sm-6">
                            <?php if (!empty($psychomotorSkills)): ?>

                                <table class="table table-bordered">
                                    <tr>
                                        <th><?= __('Psychomotor Skills') ?></th>
                                        <th><?= __('Scores') ?></th>
                                    </tr>
                                    <?php for ($num = 0; $num < count($psychomotorSkills); $num++ ): ?>
                                        <tr>
                                            <td><?= h($psychomotorSkills[$num]['name']) ?></td>
                                            <td><?= $this->Form->input('students_psychomotor_skill_scores.'.$num.'.score') ?></td>
                                            <td class="hidden"><?= $this->Form->hidden('students_psychomotor_skill_scores.'.$num.'.psychomotor_id',['value' =>$psychomotorSkills[$num]['id'] ]) ?></td>
                                            <td class="hidden"><?= $this->Form->hidden('students_psychomotor_skill_scores.'.$num.'.student_id',['value' => $student->id]) ?></td>
                                            <td class="hidden"><?= $this->Form->hidden('students_psychomotor_skill_scores.'.$num.'.class_id',['value' =>  @$this->SearchParameter->getDefaultValue($this->request->query['class_id'],1)]) ?></td>
                                            <td class="hidden"><?= $this->Form->hidden('students_psychomotor_skill_scores.'.$num.'.term_id',['value' =>  @$this->SearchParameter->getDefaultValue($this->request->query['term_id'],1)]) ?></td>
                                            <td class="hidden"><?= $this->Form->hidden('students_psychomotor_skill_scores.'.$num.'.session_id',['value' =>  @$this->SearchParameter->getDefaultValue($this->request->query['session_id'],1)]) ?></td>


                                        </tr>
                                    <?php endfor; ?>
                                </table>
                            <?php endif; ?>
                        </div>
                    </div>
                </fieldset>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>

    </div>
</div>