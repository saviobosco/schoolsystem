<?php
/**
 * file name check_entrance_result.ctp .
 */
$this->layout = 'custom';
?>
<div class="container m-b-40 m-t-40">
    <div class="row">
        <div class="col-sm-6">
            <?= $this->Form->create(null,['url'=>['']]) ?>
            <fieldset>
                <legend><?= __('') ?></legend>
                <?php
                echo $this->Form->input('reg_number',['class'=>'form-control','required'=>true]);
                echo $this->Form->input('pin',['class'=>'form-control','required'=>true]);
                $options = [1 => 'Entrance Result', 2 => 'Interview Result'];
                ?>
                <div class="form-group m-t-20">
                    <?= $this->Form->input('exam_type',['options'=> $options, 'escape' => false,'label'=>['text'=>'Exam type']]) ?>
                </div>
            </fieldset>
            <?= $this->Form->button(__('Check'),['class'=>'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
        <div class="col-sm-6 p-t-40">
            <div class="well">
                <h5> Steps on how to check your Entrance result</h5>
                <ul>
                    <li> Enter your Exam registration number</li>
                    <li> Enter your Access card pin</li>
                    <li> Select the exam type either entrance or interview result</li>
                    <li> click the <kbd class="bg-primary">Check</kbd> button</li>
                </ul>
                <p class="text-danger"><strong> Note :</strong></p>
                <p>Once a pin has been used to check a particular exam result ,it can not
                be used to check the other one. </p>
            </div>
        </div>
    </div>
</div>