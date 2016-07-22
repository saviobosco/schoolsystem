<div class="row">
    <div class="col-sm-12">
        <?= $this->Form->create($applicantsInterviewResult) ?>
        <fieldset>
            <legend><?= __('Edit Applicants Interview Result') ?></legend>
            <?php
            echo $this->Form->input('applicant_id');
            echo $this->Form->input('total');
            echo $this->Form->input('grade');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>