<div class="row">
    <div class="col-sm-12">
        <h3><?= h($school->name) ?></h3>

        <div class="related">
            <h4><?= __('Students') ?></h4>
            <?php if (!empty($school->students)): ?>
                <table class="table table-responsive table-bordered">
                    <tr>
                        <th><?= __('Reg Number') ?></th>
                        <th><?= __('Fullname') ?></th>
                        <th><?= __('year') ?></th>
                        <th><?= __('Sex') ?></th>

                    </tr>
                    <?php foreach ($school->students as $students): ?>
                        <tr>
                            <td><?= h($students->id) ?></td>
                            <td><?= h($students->fullname) ?></td>
                            <td><?= h($students->year) ?></td>
                            <td><?= h($students->sex) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
        </div>

    </div>
</div>