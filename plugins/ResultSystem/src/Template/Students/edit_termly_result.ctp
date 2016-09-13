<?php
$edittemplates = [
    'label' => '',
    'submitContainer' => '{{content}}'
];
$this->Form->templates($edittemplates);

?>

<?= $this->Form->create('',['class'=>'form-inline','type'=>'GET']) ?>
<div class="form-group">
    <?= $this->Form->input('session_id',['options' => $sessions,'class'=>'form-control','data-select-id'=>'school','label'=>['text'=>'Session '],'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['session_id'])]); ?>
    <?= $this->Form->input('term_id',['options' => $terms,'class'=>'form-control','data-select-id'=>'level','label'=>['text'=>'Class'],'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['term_id'])]); ?>
    <?= $this->Form->input('class_id',['options' => $classes,'class'=>'form-control','data-select-id'=>'level','label'=>['text'=>'Class'],'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['class_id'])]); ?>
    <?= $this->Form->submit(__('change'),['class'=>'btn btn-primary']) ?>
</div>
<?= $this->Form->end() ?>

<div class="students form large-9 medium-8 columns content">
    <?= $this->Form->create($student) ?>
    <fieldset>
        <legend><?= __('Edit Student Termly Result') ?></legend>
        <?php if (!empty($student->student_termly_results)): ?>
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th><?= __('Subject') ?></th>
                    <th><?= __('First Test') ?></th>
                    <th><?= __('Second Test') ?></th>
                    <th><?= __('Third Test') ?></th>
                    <th><?= __('Exam') ?></th>
                </tr>
                <?php for ($num = 0; $num < count($student->student_termly_results); $num++ ): ?>
                    <tr>
                        <td><?= h($subjects[$student['student_termly_results'][$num]['subject_id']]) ?></td>
                        <td><?= $this->Form->input('student_termly_results.'.$num.'.first_test') ?></td>
                        <td><?= $this->Form->input('student_termly_results.'.$num.'.second_test') ?></td>
                        <td><?= $this->Form->input('student_termly_results.'.$num.'.third_test') ?></td>
                        <td><?= $this->Form->input('student_termly_results.'.$num.'.exam') ?></td>
                        <td><?= $this->Form->input('student_termly_results.'.$num.'.total',['disabled'=>true]) ?></td>
                        <td><?= $this->Form->input('student_termly_results.'.$num.'.student_id') ?></td>
                        <td><?= $this->Form->hidden('student_termly_results.'.$num.'.student_id') ?></td>
                        <td><?= $this->Form->hidden('student_termly_results.'.$num.'.subject_id') ?></td>
                        <td><?= $this->Form->hidden('student_termly_results.'.$num.'.class_id') ?></td>
                        <td><?= $this->Form->hidden('student_termly_results.'.$num.'.term_id') ?></td>
                        <td><?= $this->Form->hidden('student_termly_results.'.$num.'.session_id') ?></td>
                    </tr>
                <?php endfor; ?>
            </table>
        <?php endif; ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>


