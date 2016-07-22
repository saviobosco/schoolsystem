<?php
$edittemplates = [
    'label' => '',
    'submitContainer' => '{{content}}'
];
$this->Form->templates($edittemplates);

?>
<div class="row m-b-20">
    <div class="col-sm-12">
        <h3><?= h($course->name) ?> - <?= h($course->id) ?></h3>

        <div class="pull-right">
            <?= $this->Form->create('',['class'=>'form-inline','type'=>'GET','role'=>'form']) ?>
            <div class="form-group">
                <?= $this->Form->input('session_id',['options' => $sessions,'class'=>'form-control','data-select-id'=>'level','label'=>['text'=>'Session 0r Batch '],'empty'=>true,'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['session_id'])]); ?>
            </div>
            <?= $this->Form->submit(__('change'),['class'=>'btn btn-primary']) ?>
            <?= $this->Form->end() ?>
        </div>
        <div class="related">
            <h4><?= __('Students') ?></h4>
            <a data-toggle="modal" data-target="#myModal"  title="Generate an Excel Sheet">Generate student excel record <i class="fa fa-info-circle text-primary" data-toggle="tooltip" title="Generate The <?= $course->id ?> students Excel Sheet"></i></a>
            <?= $this->Html->link(__('Upload excel result sheet'), ['action' => 'upload_result', $course->id,],['escape'=>false,'class'=>' pull-right','title'=>'Upload Course Excel Result Sheet','data-toggle'=>"tooltip"]) ?>
            <?php if (!empty($course->students)): ?>
                <?= $this->Form->create($course,['id'=>'result']) ?>
                <table class="table table-responsive table-hover table-bordered">
                    <thead>
                    <tr>
                        <th><?= __('Reg Number') ?></th>
                        <th><?= __('Total') ?></th>
                        <th><?= __('Grade') ?></th>
                    </tr>
                    </thead>
                    <?php for( $num = 0; $num < count($course->students); $num++ ): ?>
                        <tr>
                            <td><?= h($course['students'][$num]['id']) ?></td>
                            <td class="hidden"><?= $this->Form->hidden('students.'.$num.'.id') ?></td>
                            <td><?= $this->Form->input('students.'.$num.'._joinData.total',['class'=>'form-control']) ?></td>
                            <td><?= $this->Form->input('students.'.$num.'._joinData.grade',['class'=>'form-control']) ?></td>
                        </tr>
                    <?php endfor; ?>
                </table>
                <?= $this->Form->button(__('Submit'),['class'=>'btn btn-primary']) ?>
                <?= $this->Form->end() ?>
            <?php else: ?>
            <div class="alert alert-danger">
                <p> No Student in this session</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php
$edittemplates = [
    'label' => '<label{{attrs}}>{{text}}</label>',
    'submitContainer' => '{{content}}'
];
$this->Form->templates($edittemplates);
?>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> <i class="fa fa-file-excel-o fa-2x"></i> Generate Student Excel Sheet</h4>
            </div>
            <div class="modal-body">
                <?= $this->Form->create('',['url'=>'/students_course_excel/'.$course->id.'.xlsx','class'=>'form-inline','type'=>'GET','role'=>'form']) ?>
                <?= $this->Form->input('session_id',['options' => $sessions,'class'=>'form-control','data-select-id'=>'level','label'=>['text'=>'Select Session 0r Batch '],'required'=>true,'empty'=>true,'style'=>'width:100px;','value'=>@$this->SearchParameter->getDefaultValue($this->request->query['session_id'])]); ?>
                <i class="fa fa-info-circle text-primary" data-toggle="tooltip" title="Select the session or batch of students"></i>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?= $this->Form->button('<i class="fa fa-download"></i> '.__('Download'),['type'=>'submit','class'=>'btn btn-primary','escape'=>false]) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>