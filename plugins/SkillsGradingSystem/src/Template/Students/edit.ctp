<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $student->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $student->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Students'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['controller' => 'Sessions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Session'), ['controller' => 'Sessions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="students form large-9 medium-8 columns content">

    <?= $this->Form->create('',['class'=>'form-inline','type'=>'GET']) ?>
    <div class="form-group">
        <?= $this->Form->input('session_id',['options' => $sessions,'class'=>'form-control','data-select-id'=>'school','label'=>['text'=>'Session '],'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['session_id'],1)]); ?>
        <?= $this->Form->input('term_id',['options' => $terms,'class'=>'form-control','data-select-id'=>'level','label'=>['text'=>'Class'],'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['term_id'],1)]); ?>
        <?= $this->Form->input('class_id',['options' => $classes,'class'=>'form-control','data-select-id'=>'level','label'=>['text'=>'Class'],'value'=>@$this->SearchParameter->getDefaultValue($this->request->query['class_id'],1)]); ?>
        <?= $this->Form->submit(__('change'),['class'=>'btn btn-primary']) ?>
    </div>
    <?= $this->Form->end() ?>

    <?= $this->Form->create($student) ?>
    <fieldset>
        <legend><?= __('Edit Student') ?></legend>
        <?php if (!empty($affectiveSkills)): ?>

            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th><?= __('Affective Skills') ?></th>
                    <th><?= __('Scores') ?></th>
                </tr>
                <?php for ($num = 0; $num < count($affectiveSkills); $num++ ): ?>
                    <tr>
                        <td><?= h($affectiveSkills[$num]['name']) ?></td>
                        <td><?= $this->Form->input('students_affective_disposition_scores.'.$num.'.score') ?></td>
                        <td><?= $this->Form->hidden('students_affective_disposition_scores.'.$num.'.affective_id',['value'=>$affectiveSkills[$num]['id']]) ?></td>
                        <td><?= $this->Form->hidden('students_affective_disposition_scores.'.$num.'.student_id',['value' => $student->id]) ?></td>
                        <td><?= $this->Form->hidden('students_affective_disposition_scores.'.$num.'.class_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['class_id'],1)]) ?></td>
                        <td><?= $this->Form->hidden('students_affective_disposition_scores.'.$num.'.term_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['term_id'],1)]) ?></td>
                        <td><?= $this->Form->hidden('students_affective_disposition_scores.'.$num.'.session_id',['value' => @$this->SearchParameter->getDefaultValue($this->request->query['session_id'],1)]) ?></td>


                    </tr>
                <?php endfor; ?>
            </table>
        <?php endif; ?>

        <?php if (!empty($psychomotorSkills)): ?>

            <table cellpadding="0" cellspacing="0">
                <tr>
                    <th><?= __('Psychomotor Skills') ?></th>
                    <th><?= __('Scores') ?></th>
                </tr>
                <?php for ($num = 0; $num < count($psychomotorSkills); $num++ ): ?>
                    <tr>
                        <td><?= h($psychomotorSkills[$num]['name']) ?></td>
                        <td><?= $this->Form->input('students_psychomotor_skill_scores.'.$num.'.score') ?></td>
                        <td><?= $this->Form->hidden('students_psychomotor_skill_scores.'.$num.'.psychomotor_id',['value' =>$psychomotorSkills[$num]['id'] ]) ?></td>
                        <td><?= $this->Form->hidden('students_psychomotor_skill_scores.'.$num.'.student_id',['value' => $student->id]) ?></td>
                        <td><?= $this->Form->hidden('students_psychomotor_skill_scores.'.$num.'.class_id',['value' =>  @$this->SearchParameter->getDefaultValue($this->request->query['class_id'],1)]) ?></td>
                        <td><?= $this->Form->hidden('students_psychomotor_skill_scores.'.$num.'.term_id',['value' =>  @$this->SearchParameter->getDefaultValue($this->request->query['term_id'],1)]) ?></td>
                        <td><?= $this->Form->hidden('students_psychomotor_skill_scores.'.$num.'.session_id',['value' =>  @$this->SearchParameter->getDefaultValue($this->request->query['session_id'],1)]) ?></td>


                    </tr>
                <?php endfor; ?>
            </table>
        <?php endif; ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
