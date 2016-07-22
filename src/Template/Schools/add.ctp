<div class="row">
    <div class="col-sm-12">
        <?= $this->Form->create($school) ?>
        <fieldset>
            <legend><?= __('Add School') ?></legend>
            <?php
            echo $this->Form->input('name');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>