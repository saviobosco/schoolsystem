<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Applicants Pin'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Applicants'), ['controller' => 'Applicants', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Applicant'), ['controller' => 'Applicants', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="applicantsPins index large-9 medium-8 columns content">
    <h3><?= __('Applicants Pins') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('serial_number') ?></th>
                <th><?= $this->Paginator->sort('pin') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($applicantsPins as $applicantsPin): ?>
            <tr>
                <td><?= $this->Number->format($applicantsPin->id) ?></td>
                <td><?= h($applicantsPin->serial_number) ?></td>
                <td><?= $this->Number->format($applicantsPin->pin) ?></td>
                <td><?= $this->Number->format($applicantsPin->status) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $applicantsPin->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $applicantsPin->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $applicantsPin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applicantsPin->id)]) ?>
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
