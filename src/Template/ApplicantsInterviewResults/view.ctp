<div class="row">
    <div class="col-sm-12">
        <h3><?= h($applicantsInterviewResult->id) ?></h3>
        <table class="vertical-table">
            <tr>
                <th><?= __('Applicant') ?></th>
                <td><?= $applicantsInterviewResult->has('applicant') ? $this->Html->link($applicantsInterviewResult->applicant->id, ['controller' => 'ApplicationsSubmitted', 'action' => 'view', $applicantsInterviewResult->applicant->id]) : '' ?></td>
            </tr>
            <tr>
                <th><?= __('Grade') ?></th>
                <td><?= h($applicantsInterviewResult->grade) ?></td>
            </tr>
            <tr>
                <th><?= __('Id') ?></th>
                <td><?= $this->Number->format($applicantsInterviewResult->id) ?></td>
            </tr>
            <tr>
                <th><?= __('Total') ?></th>
                <td><?= $this->Number->format($applicantsInterviewResult->total) ?></td>
            </tr>
        </table>
    </div>
</div>