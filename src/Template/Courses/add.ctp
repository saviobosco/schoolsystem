<div class="row">
    <div class="col-sm-12">
        <?= $this->Form->create($course) ?>
        <fieldset>
            <legend><?= __('Add Course') ?></legend>
            <?php
            echo $this->Form->input('id',['type'=>'text','data-toggle'=>'tooltip','title'=>'Course Code eg.NUR101','label'=>['text'=>'Course Code']]);
            echo $this->Form->input('name');
            echo $this->Form->input('semester_id',['options' => $semesters]);
            echo $this->Form->input('level_id', ['options' => $levels]);
            echo $this->Form->input('school_id', ['options' => $schools]);
            ?>
        </fieldset>
        <?= $this->Form->button(__('Submit')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>