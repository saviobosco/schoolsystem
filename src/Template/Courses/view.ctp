<div class="row">
    <div class="col-sm-12">
        <h3><?= h($course->name) ?></h3>
        <table class="vertical-table">
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= h($course->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Name') ?></th>
                <td><?= h($course->name) ?></td>
            </tr>
            <tr>
                <th><?= __('Session') ?></th>
                <td><?= $course->has('session') ? $this->Html->link($course->session->name, ['controller' => 'Sessions', 'action' => 'view', $course->session->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('School') ?></th>
                <td><?= $course->has('school') ? $this->Html->link($course->school->name, ['controller' => 'Schools', 'action' => 'view', $course->school->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Semester Id') ?></th>
                <td><?= $this->Number->format($course->semester_id) ?></td>
            </tr>
            <tr>
                <th><?= __('Created') ?></th>
                <td><?= h($course->created) ?></td>
            </tr>
            <tr>
                <th><?= __('Modified') ?></th>
                <td><?= h($course->modified) ?></td>
            </tr>
        </table>
    </div>
</div>