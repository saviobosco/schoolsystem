<div class="m-t-10 m-b-30">
    <?= $this->Html->link('<i class="fa fa-users"> </i> All Student',['plugin'=>'StudentsManager','controller'=>'Students','action' => 'index',],['class'=>'p-r-15','escape' => false]) ?>
    <?= $this->Html->link('<i class="fa fa-edit"> </i> Edit Student Profile',['plugin'=>'StudentsManager' ,'controller'=>'Students','action' => 'edit', $student->id],['class'=>'p-r-15','escape' => false]) ?>
    <?= $this->Html->link('<i class="fa fa-eye"> </i> View Student Profile',['plugin'=>'StudentsManager' ,'controller'=>'Students','action' => 'view', $student->id],['class'=>'p-r-15','escape' => false]) ?>
    <?= $this->Html->link('Deactivate',['plugin'=>'StudentsManager' ,'controller'=>'Students','action' => 'deactivate', $student->id],['class'=>'p-r-15','escape' => false]) ?>
    <?= $this->Form->postLink(__('<i class="fa fa-close"> </i> Delete Student'), ['plugin'=>'StudentsManager' ,'controller'=>'Students', 'action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}?', $student->id),'class'=>'text-danger','escape' => false]) ?>
</div>