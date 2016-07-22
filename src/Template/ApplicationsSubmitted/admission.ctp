<div class="row">
    <div class="col-sm-12">
        <?= $this->Form->create($applicants) ?>
        <table class="table table-responsive table-bordered">
            <thead>
            <tr>
                <th> Reg Number</th>
                <th> Name</th>
                <th> Entrance Result</th>
                <th> Interview Result</th>
                <th> Admission status</th>
                <th><input type="checkbox" id="selectall"> select all</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($applicants as $applicant ): ?>
                <tr>
                    <td><?= $applicant->id ?></td>
                    <td><?= $applicant->fullname ?></td>
                    <td><?= @$applicant->entrance_result->total ?></td>
                    <td><?= @$applicant->interview_result->total ?></td>
                    <td><?= $this->Admission->admissionStatus($applicant->admission_status) ?></td>
                    <td> <input type="checkbox" class="checkbox1" name="id[]" value="<?= $applicant->id ?>"> </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <?= $this->Form->submit(__('Admit Students'),['class'=>'btn btn-primary']) ?>
        <?= $this->Form->end() ?>
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