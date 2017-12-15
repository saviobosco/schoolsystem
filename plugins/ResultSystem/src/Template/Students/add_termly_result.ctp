<?php
$edittemplates = [
    'label' => '',
    'submitContainer' => '{{content}}'
];
$this->Form->templates($edittemplates);
$queryData = $this->request->getQuery();
?>



<?php
// including the search parameter element
echo $this->element('searchParametersSessionClassTerm');
?>

<div class="row m-t-20 ">
    <div class="col-sm-12">

        <div class="panel panel-inverse">
            <div class="panel-heading">
                <h4 class="panel-title"> <?= $student->id ?> - Add Result </h4>
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
                        <table class="table table-responsive table-bordered">
                            <tr>
                                <th>Student Admission No :</th>
                                <td><?= $student->id ?></td>
                            </tr>
                            <tr>
                                <th>Student Name :</th>
                                <td> <?= $student->full_name ?></td>
                            </tr>
                            <tr>
                                <th>Class :</th>
                                <td><?= $student->class->class ?> </td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-sm-4">
                        <p> Adding results for </p>
                        <?php if (!empty($queryData)) :?>
                        <table class="table table-bordered table-responsive ">
                            <tr>
                                <th> Session : </th>
                                <td> <?= $sessions[$queryData['session_id']] ?></td>
                            </tr>
                            <tr>
                                <th> Class :</th>
                                <td>  <?= $classes[$queryData['class_id']] ?> </td>
                            </tr>
                            <tr>
                                <th> Term : </th>
                                <td> <?= $terms[$queryData['term_id']] ?> </td>
                            </tr>
                        </table>
                        <?php endif; ?>
                    </div>
                </div>

                <?php if ( isset($selectParameter) AND $selectParameter === true) : ?>
                    <div class="alert alert-danger">
                        <p> Please select the session , class and term  </p>
                    </div>
                <?php endif; ?>

                <?php if ( isset($studentResultExists) AND $studentResultExists === true) : ?>
                    <div class="alert alert-danger">
                        <p> <i class="fa fa-exclamation"></i> This student has some results for the selected parameters. Adding a new input to the existing values with replace the existing values. </p>
                    </div>
                <?php endif; ?>
                <?= $this->Form->create($student) ?>
                <fieldset>
                    <legend><?= __('Add Student Termly Result') ?></legend>
                    <?php if (!empty($subjects)): ?>
                        <table  class="table table-bordered table-responsive ">
                            <tr>
                                <th><?= __('Subject') ?></th>
                                <?php foreach( $gradeInputs as $gradeInput ): ?>
                                    <th> <?= __($gradeInput) ?> </th>
                                <?php endforeach; ?>
                            </tr>
                            <?php $subjectCount = count($subjects);
                            for($num = 0; $num < $subjectCount; $num++ ): ?>
                                <tr>
                                    <td><?= h($subjects[$num]['name']) ?></td>
                                    <?php foreach( $gradeInputs as $key => $value ) : ?>
                                        <td><?= $this->Form->input('student_termly_results.'.$num.'.'.$key) ?></td>
                                    <?php endforeach; ?>
                                    <td class="hidden"><?= $this->Form->hidden('student_termly_results.'.$num.'.student_id',['value'=>$student->id]) ?></td>
                                    <td class="hidden"><?= $this->Form->hidden('student_termly_results.'.$num.'.subject_id',['value'=>$subjects[$num]['id']]) ?></td>
                                    <td class="hidden"><?= $this->Form->hidden('student_termly_results.'.$num.'.class_id',['value'=>$queryData['class_id']]) ?></td>
                                    <td class="hidden"><?= $this->Form->hidden('student_termly_results.'.$num.'.term_id',['value'=>$queryData['term_id']]) ?></td>
                                    <td class="hidden"><?= $this->Form->hidden('student_termly_results.'.$num.'.session_id',['value'=>$queryData['session_id']]) ?></td>
                                </tr>
                            <?php endfor; ?>
                        </table>

                        <!-- This is for the student remark -->
                        <?= $this->Form->hidden('student_general_remarks.0.student_id',['value' => $student->id ]) ?>
                        <?= $this->Form->hidden('student_general_remarks.0.class_id',['value' => @$queryData['class_id']]) ?>
                        <?= $this->Form->hidden('student_general_remarks.0.term_id',['value' => @$queryData['term_id']]) ?>
                        <?= $this->Form->hidden('student_general_remarks.0.session_id',['value' => @$queryData['session_id']]) ?>
                        <?php foreach($remarkInputs as $remarkInputKey => $remarkInputValue ) : ?>
                            <label for="<?= $remarkInputKey ?>"> <?= h($remarkInputValue) ?> </label>
                            <?= $this->Form->input("student_general_remarks.0.$remarkInputKey",['class' => 'form-control','label'=>['text'=> 'Result Remark']])  ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </fieldset>
                <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>

    </div>
</div>