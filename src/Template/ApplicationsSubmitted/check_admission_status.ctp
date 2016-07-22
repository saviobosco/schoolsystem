<?php
/**
 * file name check_admission_status.ctp .
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
                echo $this->Form->input('reg_number',['class'=>'form-control','required'=>true,'label'=>['text'=>'Applicant Registration Number']]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Check'),['class'=>'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
        <div class="col-sm-6 p-t-40">
            <div class="well">
                <h5> Steps on how to Check your admission status. </h5>
                <ul>
                    <li> Enter you applicant registration number</li>
                    <li> click the <kbd class="bg-primary">check</kbd> button</li>
                </ul>
                <p> if you have been admitted into the institution you will be redirected to your admission letter.</p>
                <blockquote>
                    Mater Misericordiae school of Nursing and mid-wifery is one of the first 10 nursing institutions in Nigeria
                    <footer> from Mater Misericordiae Nursing Family </footer>
                </blockquote>
            </div>
        </div>
    </div>
</div>