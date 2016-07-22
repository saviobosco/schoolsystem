<?php
$this->assign('title',$title);

$edittemplates = [
    'submitContainer' => '{{content}}'
];
$this->Form->templates($edittemplates);
?>
<div class="row m-b-40 p-b-40">
    <!-- begin col-12 -->
    <div class="col-md-12">
        <h3><?= $student->id ?></h3>
        <h5> <?= $student->fullname ?></h5>
        <div class="row m-t-20 m-b-20">
            <div class="col-sm-12">
                <?= $this->Form->create('',['class'=>'form-inline','type'=>'GET']) ?>
                <div class="form-group">
                    <?= $this->Form->input('level_id',['options' => $levels,'class'=>'form-control','data-select-id'=>'level','label'=>['text'=>'Level'],'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['level_id'])]); ?>
                    <?= $this->Form->input('semester_id',['options' => $semesters,'class'=>'form-control','data-select-id'=>'semester','label'=>['text'=>'Semester'],'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['semester_id'])]); ?>
                    <?= $this->Form->submit(__('change'),['class'=>'btn btn-primary']) ?>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <?php if (!empty($student->courses)): ?>
        <div id="wizar">
                <fieldset>
                    <!-- begin row -->
                    <div class="row">
                        <table class="table table-responsive table-hover table-bordered">
                            <thead>
                            <tr>
                                <th><?= __('Course') ?></th>
                                <th><?= __('Total') ?></th>
                                <th><?= __('Grade') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($student->courses as $courses): ?>
                                <tr>
                                    <td><?= h($courses->id) ?></td>
                                    <td><?= h($courses->_joinData->total) ?></td>
                                    <td><?= h($courses->_joinData->grade) ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- end row -->
                </fieldset>
        </div>
            <?= $this->Form->create($remark,[]) ?>
            <div class="form-group">
                <?= $this->Form->label('Student Remark') ?>
                <?= $this->Form->textarea('remark',['class'=>'form-control']) ?>
            </div>
            <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        <?php endif; ?>
    </div>
    <!-- end col-12 -->
</div>