<div class="row">
    <div class="col-sm-12">
        <h3><?= h($semester->name) ?></h3>
        <table class="vertical-table">
            <tr>
                <th><?= __('Name') ?></th>
                <td><?= h($semester->name) ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($semester->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td><?= h($semester->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td><?= h($semester->modified) ?></td>
            </tr>
        </table>
        <div class="related">
            <h4><?= __('Related Courses') ?></h4>
            <?php if (!empty($semester->courses)): ?>
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <th><?= __('Id') ?></th>
                        <th><?= __('Name') ?></th>
                        <th><?= __('Semester Id') ?></th>
                        <th><?= __('Session Id') ?></th>
                        <th><?= __('School Id') ?></th>
                        <th><?= __('Created') ?></th>
                        <th><?= __('Modified') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    <?php foreach ($semester->courses as $courses): ?>
                        <tr>
                            <td><?= h($courses->id) ?></td>
                            <td><?= h($courses->name) ?></td>
                            <td><?= h($courses->semester_id) ?></td>
                            <td><?= h($courses->session_id) ?></td>
                            <td><?= h($courses->school_id) ?></td>
                            <td><?= h($courses->created) ?></td>
                            <td><?= h($courses->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Courses', 'action' => 'view', $courses->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Courses', 'action' => 'edit', $courses->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Courses', 'action' => 'delete', $courses->id], ['confirm' => __('Are you sure you want to delete # {0}?', $courses->id)]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </div>
    </div>
</div>