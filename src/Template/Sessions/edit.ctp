<div class="row">
    <div class="col-sm-12">
        <?= $this->Form->create($session) ?>
        <fieldset>
            <legend><?= __('Add Session') ?></legend>
            <?php
            echo $this->Form->input('session');
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>