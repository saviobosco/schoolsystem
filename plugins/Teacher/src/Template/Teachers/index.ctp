<div class="row">
    <div class="col-sm-12">
        <h3><?= __('Teachers') ?></h3>
        <table class=" table table-responsive table-bordered ">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('first_name') ?></th>
                <th><?= $this->Paginator->sort('last_name') ?></th>
                <th><?= $this->Paginator->sort('gender') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($teachers as $teacher): ?>
                <tr>
                    <td><?= h($teacher->id) ?></td>
                    <td><?= h($teacher->first_name) ?></td>
                    <td><?= h($teacher->last_name) ?></td>
                    <td><?= h($teacher->gender) ?></td>
                    <td><?= h($teacher->state_of_origin) ?></td>
                    <td><?= h($teacher->l_g_a) ?></td>
                    <td><?= h($teacher->home_residence) ?></td>
                    <td><?= h($teacher->phone_number) ?></td>
                    <td><?= h($teacher->qualifications) ?></td>
                    <td><?= h($teacher->photo) ?></td>
                    <td><?= h($teacher->photo_dir) ?></td>
                    <td><?= h($teacher->created) ?></td>
                    <td><?= h($teacher->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $teacher->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $teacher->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $teacher->id], ['confirm' => __('Are you sure you want to delete # {0}?', $teacher->id)]) ?>
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