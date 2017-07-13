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
            <h4><?= __('Related Student Annual Subject Positions') ?></h4>
            <?php if (!empty($studentSubjectAnnualResults)): ?>
                <table id="data-table" class="table table-bordered">
                    <thead>
                    <tr>
                        <th><?= __('Student Id') ?></th>
                        <th><?= __('First Term') ?></th>
                        <th><?= __('Second Term') ?></th>
                        <th><?= __('Third Term') ?></th>
                        <th><?= __('Total') ?></th>
                        <th><?= __('Average') ?></th>
                        <th><?= __('Remark') ?></th>
                        <th><?= __('Position') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($studentSubjectAnnualResults as $studentSubjectAnnualResult): ?>
                        <tr>
                            <td><?= h($studentSubjectAnnualResult->student_id) ?></td>
                            <td><?= h($studentSubjectAnnualResult['first_term']) ?></td>
                            <td><?= h($studentSubjectAnnualResult['second_term']) ?></td>
                            <td><?= h($studentSubjectAnnualResult['third_term']) ?></td>
                            <td><?= h($studentSubjectAnnualResult['total']) ?></td>
                            <td><?= h($studentSubjectAnnualResult['average']) ?></td>
                            <td><?= h($studentSubjectAnnualResult['remark']) ?></td>
                            <td><?= @$this->Position->formatPositionOutput($studentAnnualSubjectPositions[$studentSubjectAnnualResult['student_id']]) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>

                </table>
            <?php endif; ?>
        </div>

    </div>
</div>