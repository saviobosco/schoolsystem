<div class="studentTermlyResults form large-9 medium-8 columns content">
    <?= $this->Form->create(null,[ 'url' => '', 'enctype' => 'multipart/form-data']) ?>
    <fieldset>
        <legend><?= __('Upload Termly Result') ?></legend>
        <?php
        $type = [
            'first_test' => 'First Test',
            'second_test' => 'Second Test',
            'third_test'  => 'Third Test',
            'exam'       =>   'Examination'
        ];
        echo $this->Form->input('type', ['options' => $type]);
        echo $this->Form->input('class_id', ['options' => $classes]);
        echo $this->Form->input('term_id', ['options' => $terms]);
        echo $this->Form->input('session_id', ['options' => $sessions]);
        echo $this->Form->file('result',['required'=>true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
