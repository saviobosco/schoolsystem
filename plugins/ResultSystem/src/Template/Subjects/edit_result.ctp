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

<div class="row">
    <div class="col-sm-12">
        <h3><?= h($subject->name) ?></h3>

        <?= $this->Form->create($subject) ?>
        <fieldset>
            <?php if (!empty($subject->student_termly_results)): ?>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th><?= __('Student Reg Number') ?></th>
                        <th><?= __('First Test') ?></th>
                        <th><?= __('Second Test') ?></th>
                        <th><?= __('Third Test') ?></th>
                        <th><?= __('Exam') ?></th>
                        <th data-toggle='tooltip' title='The values in this column are auto Generated' ><?= __('Total') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php for ($num = 0; $num < count($subject->student_termly_results); $num++ ): ?>
                        <tr>
                            <td><?= h($subject['student_termly_results'][$num]['student_id']) ?></td>
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
                    </tbody>
                </table>
            <?php endif; ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
