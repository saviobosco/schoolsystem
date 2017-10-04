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

<div class="row m-t-30">
    <div class="col-sm-12 ">

        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title"> Edit Student Result </h4>
            </div>
            <div class="panel-body">

                <?= $this->element('Student/header_links') ?>
                <?= $this->Form->create($student) ?>

                <div class="row m-t-30">
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
                            <tr>
                                <th><?= __('Class') ?></th>
                                <td><?= h($student->class->class) ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm-5">
                        <table class="table table-responsive table-bordered">
                            <?= $this->Form->hidden('student_termly_positions.0.student_id',['value' => $student->id ]) ?>
                            <?= $this->Form->hidden('student_termly_positions.0.class_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['class_id'],1)]) ?>
                            <?= $this->Form->hidden('student_termly_positions.0.term_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['term_id'],1)]) ?>
                            <?= $this->Form->hidden('student_termly_positions.0.session_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['session_id'],1)]) ?>
                            <tr>
                                <td>
                                    Total
                                </td>
                                <td>
                                    <?= $this->Form->input('student_termly_positions.0.total',['class' => 'form-control','label'=>['text'=> 'Total']])  ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Average
                                </td>
                                <td>
                                    <?= $this->Form->input('student_termly_positions.0.average',['class' => 'form-control','label'=>['text'=> 'Average']])  ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Grade
                                </td>
                                <td>
                                    <?= $this->Form->input('student_termly_positions.0.grade',['class' => 'form-control','label'=>['text'=> 'Grade']])  ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Position
                                </td>
                                <td>
                                    <?= $this->Form->input('student_termly_positions.0.position',['class' => 'form-control','label'=>['text'=> 'Position']])  ?>
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>

                <fieldset>
                    <legend><?= __('Edit Student Termly Result') ?></legend>
                    <?php if (!empty($student->student_termly_results)): ?>
                        <table class="table table-bordered table-responsive " data-toggle='tooltip' title=''>
                            <tr>
                                <th><?= __('Subject') ?></th>
                                <th><?= __('First Test') ?></th>
                                <th><?= __('Second Test') ?></th>
                                <th><?= __('Third Test') ?></th>
                                <th><?= __('Exam') ?></th>
                                <th data-toggle='tooltip' title='The values in this column are auto Generated' ><?= __('Total') ?></th>
                            </tr>
                            <?php for ($num = 0; $num < count($student->student_termly_results); $num++ ): ?>
                                <tr>
                                    <td><?= h($subjects[$student['student_termly_results'][$num]['subject_id']]) ?></td>
                                    <td><?= $this->Form->input('student_termly_results.'.$num.'.first_test') ?></td>
                                    <td><?= $this->Form->input('student_termly_results.'.$num.'.second_test') ?></td>
                                    <td><?= $this->Form->input('student_termly_results.'.$num.'.third_test') ?></td>
                                    <td><?= $this->Form->input('student_termly_results.'.$num.'.exam') ?></td>
                                    <td><?= $this->Form->input('student_termly_results.'.$num.'.total',['disabled'=>true]) ?></td>
                                    <td class="hidden"><?= $this->Form->hidden('student_termly_results.'.$num.'.student_id') ?></td>
                                    <td class="hidden"><?= $this->Form->hidden('student_termly_results.'.$num.'.student_id') ?></td>
                                    <td class="hidden"><?= $this->Form->hidden('student_termly_results.'.$num.'.subject_id') ?></td>
                                    <td class="hidden"><?= $this->Form->hidden('student_termly_results.'.$num.'.class_id') ?></td>
                                    <td class="hidden"><?= $this->Form->hidden('student_termly_results.'.$num.'.term_id') ?></td>
                                    <td class="hidden"><?= $this->Form->hidden('student_termly_results.'.$num.'.session_id') ?></td>
                                </tr>
                            <?php endfor; ?>
                        </table>

                        <!-- This is for the student remark -->
                        <?= $this->Form->hidden('student_general_remarks.0.student_id',['value' => $student->id ]) ?>
                        <?= $this->Form->hidden('student_general_remarks.0.class_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['class_id'],1)]) ?>
                        <?= $this->Form->hidden('student_general_remarks.0.term_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['term_id'],1)]) ?>
                        <?= $this->Form->hidden('student_general_remarks.0.session_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['session_id'],1)]) ?>
                        <label for="student remark"> Student Remark </label>
                        <?= $this->Form->input('student_general_remarks.0.remark',['class' => 'form-control','label'=>['text'=> 'Result Remark']])  ?>
                        <label for="result status">Result Publish Status </label>
                        <?= $this->Form->input('student_publish_results.0.status',['type' => 'checkbox']) ?>
                        <?= $this->Form->hidden('student_publish_results.0.student_id',['value' => $student->id ]) ?>
                        <?= $this->Form->hidden('student_publish_results.0.class_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['class_id'],1)]) ?>
                        <?= $this->Form->hidden('student_publish_results.0.term_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['term_id'],1)]) ?>
                        <?= $this->Form->hidden('student_publish_results.0.session_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['session_id'],1)]) ?>
                    <?php endif; ?>
                </fieldset>
                <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
                <!-- <button class="btn btn-block btn-primary btn-lg m-t-40" data-toggle="modal" data-target="#myModal"> Add Student Remark </button> -->
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-center">Add a student Remark </h4>
            </div>
            <div class="modal-body">
                <?php
                debug($student);
                ?>
                <?= $this->Form->create(null,['url' => ['controller' => 'StudentGeneralRemarks','action'=>'edit']]) ?>

                <?= $this->Form->end() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>


