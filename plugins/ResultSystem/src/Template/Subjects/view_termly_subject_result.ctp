<?php
// including the search parameter element
echo $this->element('searchParametersSessionClassTerm');
?>

<div class="row">
    <div class="col-sm-12">

        <h3><?= h($subject->name) ?></h3>
        <table class="vertical-table">
            <tr>
                <th><?= __('Block') ?></th>
                <td><?= $subject->has('block') ? $this->Html->link($subject->block->name, ['controller' => 'Blocks', 'action' => 'view', $subject->block->id]) : '' ?></td>
            </tr>
        </table>

        <div class="related">
            <h4><?= __(' Student Termly Results') ?></h4>
            <?php if (!empty($subject->student_termly_results)): ?>
                <table id="data-table" class="table table-bordered ">
                    <thead>
                    <tr>
                        <th><?= __('Student Id') ?></th>
                        <th><?= __('Name') ?></th>
                        <th><?= __('First Test') ?></th>
                        <th><?= __('Second Test') ?></th>
                        <th><?= __('Third Test') ?></th>
                        <th><?= __('Exam') ?></th>
                        <th><?= __('Total') ?></th>
                        <th><?= __('Grade') ?></th>
                        <th><?= __('Remark') ?></th>
                        <!-- <th><?= __('Principal Comment') ?></th>
                        <th><?= __('Head Teacher Comment') ?></th> -->
                        <th><?= __('Position') ?></th>

                    </tr>
                    </thead>

                    <tbody>
                    <?php foreach ($subject->student_termly_results as $studentTermlyResults): ?>
                        <tr>
                            <td><?= h($studentTermlyResults->student_id) ?></td>
                            <td><?= h($studentTermlyResults->student->full_name) ?></td>
                            <td><?= h($studentTermlyResults->first_test) ?></td>
                            <td><?= h($studentTermlyResults->second_test) ?></td>
                            <td><?= h($studentTermlyResults->third_test) ?></td>
                            <td><?= h($studentTermlyResults->exam) ?></td>
                            <td><?= h($studentTermlyResults->total) ?></td>
                            <td><?= h($studentTermlyResults->grade) ?></td>
                            <td><?= h($studentTermlyResults->remark) ?></td>
                            <!-- <td><?= h($studentTermlyResults->principal_comment) ?></td>
                            <td><?= h($studentTermlyResults->head_teacher_comment) ?></td> -->
                            <td><?= @$this->Position->formatPositionOutput($subjectStudentPositions[$studentTermlyResults->student_id]) ?></td>

                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
        </div>

    </div>
</div>