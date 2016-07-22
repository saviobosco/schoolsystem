<div class="row">
    <div class="col-sm-12">
        <h3><?= __('Student Result Pins') ?></h3>
        <table class="table table-bordered table-responsive">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('serial_number') ?></th>
                <th><?= $this->Paginator->sort('pin') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($studentResultPins as $studentResultPin): ?>
                <tr>
                    <td><?= h($studentResultPin->serial_number) ?></td>
                    <td><?= h($studentResultPin->pin) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
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
