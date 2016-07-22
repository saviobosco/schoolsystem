<?php
/**
 * file name applicant_login.ctp .
 */
 $this->assign('title',$title);
?>
<div class=" container m-t-40 m-b-40">
    <div class="row">
        <div class="col-sm-6">
            <?= $this->Form->create(null,['url'=>['']]) ?>
            <fieldset>
                <legend><?= __('') ?></legend>
                <?php
                echo $this->Form->input('pin',['class'=>'form-control','required'=>true,'label'=>['text'=>'Application Pin']]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
        <div class="col-sm-6 p-t-40">
            <div class="well">
                <h5> Step on how to apply</h5>
                <ul>
                    <li> Enter the application scratch card pin</li>
                    <li> click the <kbd class="bg-primary">submit</kbd> button</li>
                </ul>
            </div>
        </div>
    </div>
</div>