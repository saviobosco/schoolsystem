<div class="row">
    <div class="col-sm-12">
        <h3><?= h($level->name) ?></h3>
        <table class="vertical-table">
            <tr>
                <th><?= __('Name') ?></th>
                <td><?= h($level->name) ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($level->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td><?= h($level->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td><?= h($level->modified) ?></td>
            </tr>
        </table>
    </div>
</div>