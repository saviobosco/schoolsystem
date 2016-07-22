<div class="row">
    <div class="col-sm-12">
        <h3><?= h($session->id) ?></h3>
        <table class="vertical-table">
            <tr>
                <th><?= __('Session') ?></th>
                <td><?= h($session->session) ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($session->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td><?= h($session->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td><?= h($session->modified) ?></td>
            </tr>
        </table>
    </div>
</div>