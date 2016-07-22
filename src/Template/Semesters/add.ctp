<div class="row">
    <div class="col-sm-12">
        <?= $this->Form->create($semester) ?>
        <fieldset>
            <legend><?= __('Add Semester') ?></legend>
            <?php
            echo $this->Form->input('name');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>