<div class="row">
    <div class="col-sm-12">
        <h3><?= __('Subjects') ?></h3>
        <table id="data-table" class="table table-bordered table-responsive">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('block_id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($subjects as $subject): ?>
                <tr>
                    <td><?= h($subject->name) ?></td>
                    <td><?= $subject->has('block') ? $this->Html->link($subject->block->name, ['controller' => 'Blocks', 'action' => 'view', $subject->block->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View Results'), ['action' => 'view', $subject->id]) ?>
                        <?= $this->Html->link(__('Edit Results'), ['action' => 'edit_result', $subject->id]) ?>

                    </td>
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