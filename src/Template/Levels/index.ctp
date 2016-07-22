<div class="row">
    <div class="col-sm-12">
        <h3><?= __('Student Academic Levels') ?></h3>
        <table class="table table-responsive table-bordered">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($levels as $level): ?>
                <tr>
                    <td><?= $this->Number->format($level->id) ?></td>
                    <td><?= h($level->name) ?></td>
                    <td><?= h($level->created) ?></td>
                    <td><?= h($level->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $level->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $level->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $level->id], ['confirm' => __('Are you sure you want to delete # {0}?', $level->id)]) ?>
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