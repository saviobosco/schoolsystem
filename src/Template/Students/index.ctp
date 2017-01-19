<?php
use Cake\Utility\Inflector ;
// including the search parameter element
echo $this->element('searchParametersClass');
?>
<div class="pull-right">
    <?= $this->Html->link('View Graduated Students',['plugin' => null,'controller'=>'Students','action'=>'graduatedStudents'],['escape'=>false,'class'=>'p-r-10']) ?>
    <?= $this->Html->link('View Unactive Students',['plugin' => null,'controller'=>'Students','action'=>'unActiveStudents'],['escape'=>false,'class'=>'']) ?>

</div>

<div class="row">
    <div class="col-sm-12">
        <h3><?= __('Students') ?></h3>
        <table id="data-table" class="table table-responsive table-bordered ">
            <thead>
            <tr>
                <th><?= h('Admission No.') ?></th>
                <th><?= Inflector::humanize('full_name') ?></th>
                <th><?= Inflector::humanize('gender') ?></th>
                <th><?= Inflector::humanize('session') ?></th>
                <th><?= Inflector::humanize('class') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= h($student->id) ?></td>
                    <td><?= h($student->full_name) ?></td>
                    <td><?= h($student->gender) ?></td>
                    <td><?= $student->session->session ?></td>
                    <td><?= $student->class->class ?></td>
                    <td class="actions-link">
                        <?= $this->Html->link('<i class="fa fa-eye"></i>'.__('View profile'), ['action' => 'view', $student->id],['class'=>'text-primary','escape'=>false]) ?>
                        <?= $this->Html->link('<i class="fa fa-edit"></i>'.__('Edit profile'), ['action' => 'edit', $student->id],['class'=>'text-primary','escape'=>false]) ?>
                        <?= $this->Form->postLink('<i class="fa fa-close"></i>'.__('Delete'), ['action' => 'delete', $student->id], ['confirm' => __('Are you sure you want to delete # {0}? . This action can not be reversed', $student->id),'class'=>'text-danger','escape' => false]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
            </ul>
            <p><?= $this->Paginator->counter() ?></p>
        </div>
    </div>
</div>
