<div class="row">
    <div class="col-sm-12">
        <h3><?= __('Entrance Result Valid Pins') ?></h3>
        <?= $this->Html->link('Excel File',['controller'=>'EntranceResultPins','action'=>'excel_format','_ext' => 'xlsx'],[]) ?>
        <table class="table table-responsive table-bordered">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('serial_number') ?></th>
                <th><?= $this->Paginator->sort('pin') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($entranceResultPins as $entranceResultPin): ?>
                <tr>
                    <td><?= h($entranceResultPin->serial_number) ?></td>
                    <td><?= $entranceResultPin->pin ?></td>
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
