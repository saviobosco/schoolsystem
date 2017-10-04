<?php
// including the search parameter element
echo $this->element('searchParametersSessionClassTerm');
?>


<div class="row">
    <div class="col-sm-12">
        <?php if ( isset($this->request->query['term_id']) &&  $this->request->query['term_id'] == 4 ) : ?>
        <h3><?= __('Student Annual Results') ?></h3>
        <?php else : ?>
        <h3><?= __('Student Termly Results') ?></h3>
        <?php endif; ?>
        <table id="data-table" class="table table-bordered ">
            <thead>
            <tr>
                <th><?= h('Admission No.') ?></th>
                <th><?= h('Name') ?></th>
                <th><?= h('Total') ?></th>
                <th><?= h('Average') ?></th>
                <th><?= h('Grade') ?></th>
                <th><?= h('Position') ?></th>

            </tr>
            </thead>
            <tbody>
            <?php foreach ($studentPositions as $studentPosition): ?>
                <tr>
                    <td><?= h($studentPosition->student_id) ?></td>
                    <td><?= h($studentPosition->student->first_name).' '.h($studentPosition->student->last_name) ?></td>
                    <td><?= h($studentPosition->total) ?></td>
                    <td><?= h($studentPosition->average) ?></td>
                    <td><?= h($studentPosition->grade) ?></td>
                    <td><?= $this->Position->formatPositionOutput($studentPosition->position) ?></td>

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
