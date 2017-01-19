<div class="row">
    <div class="col-sm-12">
        <?= $this->Form->create($subject) ?>
        <fieldset>
            <legend><?= __('Register A New Subject') ?></legend>
            <?php
            echo $this->Form->input('name');
            echo $this->Form->input('block_id', ['options' => $blocks]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>