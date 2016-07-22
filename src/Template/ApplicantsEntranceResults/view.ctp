<div class="row">
    <div class="col-sm-12">
        <h3><?= h($applicantsEntranceResult->id) ?></h3>
        <table class="vertical-table">
            <tr>
                <th><?= __('Application Submitted Id') ?></th>
                <td><?= h($applicantsEntranceResult->application_submitted_id) ?></td>
            </tr>
            <tr>
                <th><?= __('Grade') ?></th>
                <td><?= h($applicantsEntranceResult->grade) ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($applicantsEntranceResult->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Total') ?></th>
                <td><?= $this->Number->format($applicantsEntranceResult->total) ?></td>
            </tr>
        </table>
    </div>
</div>