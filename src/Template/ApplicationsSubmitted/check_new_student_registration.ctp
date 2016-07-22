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
                echo $this->Form->input('reg_number',['class'=>'form-control','required'=>true,'label'=>['text'=>'Exam Registration Number']]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('login'),['class'=>'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
        <div class="col-sm-6 p-t-40">
            <div class="well">
                <h5> Steps on how to Create your new student account</h5>
                <ul>
                    <li> Enter your Exam registration number</li>
                    <li> click the <kbd class="bg-primary">login</kbd> button</li>
                </ul>
                <p> if you have been admitted into the institution you will be redirected to the registration page
                 where you can fill up your data and create your profile.</p>
                <blockquote>
                    have a nice day and success in creating your account.
                    <footer> from Mater Misericordiae Nursing Family </footer>
                </blockquote>
            </div>
        </div>
    </div>
</div>