<div class="row">
    <div class="col-sm-12">
        <h3><?= __('Application Entrance Results') ?></h3>
        <table class="table table-responsive table-bordered">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('applicant_id') ?></th>
                <th><?= $this->Paginator->sort('total') ?></th>
                <th><?= $this->Paginator->sort('grade') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($applicantsEntranceResults as $applicantsEntranceResult): ?>
                <tr>
                    <td><?= h($applicantsEntranceResult->applicant_id) ?></td>
                    <td><?= $this->Number->format($applicantsEntranceResult->total) ?></td>
                    <td><?= h($applicantsEntranceResult->grade) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $applicantsEntranceResult->applicant_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $applicantsEntranceResult->applicant_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $applicantsEntranceResult->applicant_id], ['confirm' => __('Are you sure you want to delete # {0}?', $applicantsEntranceResult->id)]) ?>
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