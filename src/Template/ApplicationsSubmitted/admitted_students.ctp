<div class="row">
    <div class="col-sm-12">
        <table class="table table-responsive table-bordered">
            <thead>
            <tr>
                <th> Reg Number</th>
                <th> Name</th>
                <th> Admission status</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($applicants as $applicant ): ?>
                <tr>
                    <td><?= $applicant->id ?></td>
                    <td><?= $applicant->fullname ?></td>
                    <td><?= $this->Admission->admissionStatus($applicant->admission_status) ?></td>
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