<?php
/**
 * file name check_result.ctp .
 */
$this->layout = 'custom';
?>
<div class=" container m-t-40 m-b-40">
    <div class="row">
        <div class="col-sm-6">
            <?= $this->Form->create(null,['url'=>['']]) ?>
            <fieldset>
                <legend><?= __('') ?></legend>
                <?php
                echo $this->Form->input('reg_number',['class'=>'form-control','required'=>true]);
                echo $this->Form->input('pin',['class'=>'form-control','required'=>true]);
                echo $this->Form->input('session_id', ['options' => $sessions,'label'=>['text'=>'Session']]);
                echo $this->Form->input('term_id', ['options' => $terms]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
        <div class="col-sm-6 p-t-40">
            <div class="well">
                <h5> Steps on how to check your Entrance result</h5>
                <ul>
                    <li> Enter you registration number</li>
                    <li> Enter your entrance result pin</li>
                    <li> click the <kbd class="bg-primary">submit</kbd> button</li>
                </ul>
            </div>
        </div>
    </div>
</div>