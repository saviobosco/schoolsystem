<?= $this->assign('title',$title); ?>
<div class="row">
    <div class="col-sm-12 m-t-20">
        <?= $this->Form->create(null,['url'=>['']]) ?>
        <fieldset>
            <legend><?= __('Generate Application pins') ?></legend>
            <?php
            echo $this->Form->input('number_to_generate',['class'=>'form-control','type'=>'number','label'=>['text'=>'Numbers of pins to Generate']]);
            echo '<label for="save_to_database"> Save to Database </label>';
            echo $this->Form->checkbox('save_to_database',['checked'=>true]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
        <?= $this->Form->end() ?>
        <?= $this->Html->link('Print Pins',['controller'=>'StudentResultPins','action'=>'print-pin'],['class'=>'pull-right btn btn-success']) ?>
    </div>
</div>
