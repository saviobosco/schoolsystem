<div class="row">
    <div class="col-sm-12">
        <?= $this->Form->create($level) ?>
        <fieldset>
            <legend><?= __('Edit Level') ?></legend>
            <?php
            echo $this->Form->input('name');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>