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

<div class="row m-t-20 ">
    <div class="col-sm-12">

        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title"> <?= $student->id ?> - Edit  Result </h4>
            </div>
            <div class="panel-body">

                <?= $this->element('Student/header_links') ?>
                <div class="row m-t-30">
                    <div class="col-sm-2">
                        <div class="profile-picture">
                            <?= $this->Html->image('student-pictures/students/photo/'.$student->photo_dir.'/'.$student->photo,['alt' => $student->id,'width' => '150px']) ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <h5>Student Admission No : <?= $student->id ?>  </h5>
                        <h5>Student Name : <?= $student->full_name ?>  </h5>
                        <h5>Class : <?= @$student->class->class ?>  </h5>
                    </div>
                    <div class="col-sm-4">
                        <p> Column for adding new subjects </p>
                        <?= $this->Form->create()  ?>
                            <?= $this->Form->input('subject_id',['options'=>$subjects]) ?>
                            <?= $this->Form->submit(__('add Subject'),['class'=>'btn btn-success btn-sm']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>

                <?= $this->Form->create($student) ?>
                <fieldset>
                    <legend><?= __('Add Student Termly Result') ?></legend>
                    <?php if (!empty($subjects)): ?>
                        <table id="data-table" class="table table-bordered table-responsive " data-toggle='tooltip' title=''>
                            <tr>
                                <th><?= __('Subject') ?></th>
                                <th><?= __('First Test') ?></th>
                                <th><?= __('Second Test') ?></th>
                                <th><?= __('Third Test') ?></th>
                                <th><?= __('Exam') ?></th>
                                <th data-toggle='tooltip' title='The values in this column are auto Generated' ><?= __('Total') ?></th>
                                <th><?= __('Action') ?></th>
                            </tr>
                            <?php foreach ($subjects as $key => $value ): ?>
                                <tr>
                                    <td><?= h($subjects[$key]) ?></td>
                                    <td><?= $this->Form->input('student_termly_results.'.$key.'.first_test') ?></td>
                                    <td><?= $this->Form->input('student_termly_results.'.$key.'.second_test') ?></td>
                                    <td><?= $this->Form->input('student_termly_results.'.$key.'.third_test') ?></td>
                                    <td><?= $this->Form->input('student_termly_results.'.$key.'.exam') ?></td>
                                    <td><?= $this->Form->input('student_termly_results.'.$key.'.total',['disabled'=>true]) ?></td>
                                    <td> This will contain a delete button </td>
                                    <td class="hidden"><?= $this->Form->hidden('student_termly_results.'.$key.'.student_id',['value'=>$student->id]) ?></td>
                                    <td class="hidden"><?= $this->Form->hidden('student_termly_results.'.$key.'.subject_id',['value'=>$key]) ?></td>
                                    <td class="hidden"><?= $this->Form->hidden('student_termly_results.'.$key.'.class_id',['value'=>@$this->SearchParameter->getDefaultValue($this->request->query['class_id'],1)]) ?></td>
                                    <td class="hidden"><?= $this->Form->hidden('student_termly_results.'.$key.'.term_id',['value'=>@$this->SearchParameter->getDefaultValue($this->request->query['term_id'],1)]) ?></td>
                                    <td class="hidden"><?= $this->Form->hidden('student_termly_results.'.$key.'.session_id',['value'=>@$this->SearchParameter->getDefaultValue($this->request->query['session_id'],1)]) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </table>

                        <!-- This is for the student remark -->
                        <?= $this->Form->hidden('student_general_remarks.0.student_id',['value' => $student->id ]) ?>
                        <?= $this->Form->hidden('student_general_remarks.0.class_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['class_id'],1)]) ?>
                        <?= $this->Form->hidden('student_general_remarks.0.term_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['term_id'],1)]) ?>
                        <?= $this->Form->hidden('student_general_remarks.0.session_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['session_id'],1)]) ?>
                        <label for="student remark"> Student Remark </label>
                        <?= $this->Form->input('student_general_remarks.0.remark',['class' => 'form-control','label'=>['text'=> 'Result Remark']])  ?>
                    <?php endif; ?>
                </fieldset>
                <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>

    </div>
</div>