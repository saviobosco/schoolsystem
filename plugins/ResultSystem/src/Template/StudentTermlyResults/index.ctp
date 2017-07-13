<?php
// including the search parameter element
echo $this->element('searchParametersSessionClassTerm');
?>


<div class="row">
    <div class="col-sm-12">
        <h3><?= __('Student Termly Results') ?></h3>
        <table id="data-table" class="table table-bordered ">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('student_id') ?></th>
                <th><?= $this->Paginator->sort('total') ?></th>
                <th><?= $this->Paginator->sort('Position') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($studentPositions as $studentPosition): ?>
                <tr>
                    <td><?= h($studentPosition->id) ?></td>
                    <td><?= h($studentPosition->total) ?></td>
                    <td><?= $this->Position->formatPositionOutput($studentPosition->position) ?></td>

                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>