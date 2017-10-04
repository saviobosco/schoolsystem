<div class="row">
    <div class="col-sm-12">
        <h3><?= h($classDemarcation->name) ?></h3>
        <table class="vertical-table">
            <tr>
                <th><?= __('Name') ?></th>
                <td><?= h($classDemarcation->name) ?></td>
            </tr>
            <tr>
                <th><?= __('Class') ?></th>
                <td><?= $classDemarcation->has('class') ? $this->Html->link($classDemarcation->class->class, ['controller' => 'Classes', 'action' => 'view', $classDemarcation->class->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($classDemarcation->id) ?></td>
            </tr>
        </table>
    </div>
</div>