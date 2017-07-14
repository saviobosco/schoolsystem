<div class="row">
    <div class="col-sm-12">
        <?= $this->Form->create($resultGradingSystem) ?>
        <fieldset>
            <legend><?= __('Edit Result Grading System') ?></legend>
            <?php
            echo $this->Form->input('score');
            echo $this->Form->input('grade');
            echo $this->Form->input('remark');
            echo $this->Form->input('cal_order',['type'=>'number']);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'),['class' => 'btn btn-primary']) ?>
        <?= $this->Form->end() ?>
    </div>

</div>