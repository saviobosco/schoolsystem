<h2> Result System Plugin </h2>
<?= $this->element('searchParametersSessionClassTerm') ?>
<div class="row">
    <div class="col-sm-12">
        <h3><?= __('Publish Students Results') ?></h3>
        <?= $this->Form->create($students) ?>
        <table id="data-table" class="table table-bordered table-responsive ">
            <thead>
            <tr>
                <th><?= h('Admission No') ?></th>
                <th><?= $this->Paginator->sort('first_name') ?></th>
                <th><?= $this->Paginator->sort('last_name') ?></th>
                <th><?= $this->Paginator->sort('class') ?></th>
                <th><input type="checkbox" id="selectall"> select all</th>
                <th> Publish Status </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= h($student->id) ?></td>
                    <td><?= h($student->first_name) ?></td>
                    <td><?= h($student->last_name) ?></td>
                    <td><?= h($student->class->class) ?></td>
                    <td> <input type="checkbox" class="checkbox1" name="student_ids[]" value="<?= $student->id ?>"> </td>
                    <td> <?= (@$student->student_publish_results[0]->status)? '<span> Yes </span>' : '<span> No </span>' ?> </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?= $this->Form->submit(__('Publish Results '),['class'=>'btn btn-primary']) ?>
        <?= $this->Form->end() ?>

        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
            </ul>
            <p><?= $this->Paginator->counter() ?></p>
        </div>
    </div>
</div>