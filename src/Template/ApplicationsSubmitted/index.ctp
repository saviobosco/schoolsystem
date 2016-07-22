<div class="row">
    <div class="col-sm-12">
        <h3><?= __('Applications Submitted') ?></h3>
        <table class="table table-responsive table-striped">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('fullname') ?></th>
                <th><?= $this->Paginator->sort('maiden_name') ?></th>
                <th><?= $this->Paginator->sort('place_of_birth') ?></th>
                <th><?= $this->Paginator->sort('state_of_origin') ?></th>
                <th><?= $this->Paginator->sort('nationality') ?></th>
                <th><?= $this->Paginator->sort('postal_address') ?></th>
                <th><?= $this->Paginator->sort('permanent_home_address') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($applicationsSubmitted as $applicationsSubmitted): ?>
                <tr>
                    <td><?= h($applicationsSubmitted->id) ?></td>
                    <td><?= h($applicationsSubmitted->fullname) ?></td>
                    <td><?= h($applicationsSubmitted->maiden_name) ?></td>
                    <td><?= h($applicationsSubmitted->place_of_birth) ?></td>
                    <td><?= h($applicationsSubmitted->state_of_origin) ?></td>
                    <td><?= h($applicationsSubmitted->nationality) ?></td>
                    <td><?= h($applicationsSubmitted->postal_address) ?></td>
                    <td><?= h($applicationsSubmitted->permanent_home_address) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $applicationsSubmitted->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $applicationsSubmitted->id], ['confirm' => __('Are you sure you want to delete # {0}?', $applicationsSubmitted->id)]) ?>
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
