<?php $this->start('sidebar');  ?>
<li class="nav-header">Navigation</li>
<li class="has-sub">
    <a href="javascript:;">
        <b class="caret pull-right"></b>
        <i class="fa fa-laptop"></i>
        <span>Dashboard</span>
    </a>
    <ul class="sub-menu">
        <li><?= $this->Html->link(__('Dashboard'),['plugin'=>null,'controller'=>'Dashboard','action'=>'index'],['escape'=>false]) ?></li>
        <li><?= $this->Html->link(__('Settings'),['plugin'=>null,'controller'=>'Dashboard','action'=>'settings'],['escape'=>false]) ?></li>
    </ul>
</li>
<?= $this->element('StudentsManager.Links/sidebar') ?>
<li class="has-sub">
    <?= $this->Html->link('<b class="caret pull-right"></b>'.__('Academic Sessions'),'javascript:;',['escape'=>false,'title'=>'Academic session or batch']) ?>
    <ul class="sub-menu">
        <li><?= $this->Html->link(__('Sessions'),['plugin'=>null,'controller'=>'Sessions','action'=>'index'],['escape'=>false]) ?></li>
        <li><?= $this->Html->link(__('Add New session'),['plugin'=>null,'controller'=>'Sessions','action'=>'add'],['escape'=>false]) ?></li>
    </ul>
</li>
<?= $this->element('ClassManager.Links/sidebar') ?>
<?= $this->element('SubjectsManager.Links/sidebar') ?>
<li class="has-sub">
    <?= $this->Html->link('<b class="caret pull-right"></b>'.__('Grading System'),'javascript:;',['escape'=>false]) ?>
    <ul class="sub-menu">
        <li><?= $this->Html->link(__('List All'),['plugin'=>'GradingSystem','controller'=>'ResultGradingSystems','action'=>'index'],['escape'=>false]) ?></li>
        <li><?= $this->Html->link(__('Add row'),['plugin'=>'GradingSystem','controller'=>'ResultGradingSystems','action'=>'add'],['escape'=>false]) ?></li>
    </ul>
</li>
<li class="has-sub">
    <?= $this->Html->link('<b class="caret pull-right"></b>'.__('Result System'),'javascript:;',['escape'=>false]) ?>
    <ul class="sub-menu">
        <li><?= $this->Html->link(__('Settings'),['plugin'=>'ResultSystem','controller'=>'Dashboard','action'=>'settings'],['escape'=>false]) ?></li>
        <li><?= $this->Html->link(__('Students'),['plugin'=>'ResultSystem','controller'=>'Students','action'=>'index'],['escape'=>false]) ?></li>
        <li><?= $this->Html->link(__('Subjects'),['plugin'=>'ResultSystem','controller'=>'Subjects','action'=>'index'],['escape'=>false]) ?></li>
        <li><?= $this->Html->link(__('View Positions'),['plugin'=>'ResultSystem','controller'=>'StudentTermlyResults','action'=>'index']) ?></li>
        <li><?= $this->Html->link(__('Publish Results'),['plugin'=>'ResultSystem','controller'=>'Students','action'=>'publishResults']) ?></li>
        <li><?= $this->Html->link(__('Upload Result'),['plugin'=>'ResultSystem','controller'=>'StudentTermlyResults','action'=>'uploadResult']) ?></li>
        <li><?= $this->Html->link(__('Grading System'),['plugin'=>'ResultSystem','controller'=>'ResultGradingSystems','action'=>'index']) ?></li>
        <li><?= $this->Html->link(__('Result Processing'),['plugin'=>'ResultSystem','controller'=>'ResultProcessing','action'=>'index']) ?></li>
    </ul>
</li>
<li class="has-sub">
    <?= $this->Html->link('<b class="caret pull-right"></b>'.__('Student Skills System'),'javascript:;',['escape'=>false]) ?>
    <ul class="sub-menu">
        <li class="has-sub"><?= $this->Html->link('<b class="caret pull-right"></b>'.__('Affective Dispositions'),'javascript:;',['escape'=>false]) ?>
            <ul class="sub-menu">
                <li><?= $this->Html->link(__('All Affective Skills'),['plugin'=>'SkillsGradingSystem','controller'=>'AffectiveDispositions','action'=>'index'],['escape'=>false]) ?></li>
                <li><?= $this->Html->link(__('New Affective Skills'),['plugin'=>'SkillsGradingSystem','controller'=>'AffectiveDispositions','action'=>'add'],['escape'=>false]) ?></li>
            </ul>
        </li>

        <li class="has-sub"><?= $this->Html->link('<b class="caret pull-right"></b>'.__('Psychomotor Skills'),'javascript:;',['escape'=>false]) ?>
            <ul class="sub-menu">
                <li><?= $this->Html->link(__('All Psychomotor Skills'),['plugin'=>'SkillsGradingSystem','controller'=>'PsychomotorSkills','action'=>'index'],['escape'=>false]) ?></li>
                <li><?= $this->Html->link(__('New Psychomotor Skill'),['plugin'=>'SkillsGradingSystem','controller'=>'PsychomotorSkills','action'=>'add'],['escape'=>false]) ?></li>
            </ul>
        </li>
        <li><?= $this->Html->link(__("Students Score" ),['plugin'=>'SkillsGradingSystem','controller'=>'Students','action'=>'index'],['escape'=>false]) ?></li>
    </ul>
</li>
<!-- <li class="has-sub">
                <?= $this->Html->link('<b class="caret pull-right"></b>'.__('Users'),'javascript:;',['escape'=>false]) ?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link(__('Teachers'),['plugin'=>null,'controller'=>'MyUsers','action'=>'teachers'],['escape'=>false]) ?></li>
                    <li><?= $this->Html->link(__('Students'),['plugin'=>null,'controller'=>'MyUsers','action'=>'index'],['escape'=>false]) ?></li>
                    <li><?= $this->Html->link(__('Parents'),['plugin'=>null,'controller'=>'MyUsers','action'=>'index'],['escape'=>false]) ?></li>
                </ul>
            </li> -->
<?= $this->element('UsersManager.Links/sidebar') ?>
<?php if($this->request->session()->read('Auth.User.is_superuser')): ?>
    <li class="has-sub">
        <?= $this->Html->link('<b class="caret pull-right"></b>'.__('Pins'),'javascript:;',['escape'=>false]) ?>
        <ul class="sub-menu">
            <li class="has-sub">
                <a href="javascript:;"><b class="caret pull-right"></b> Student Result Pins</a>
                <ul class="sub-menu">
                    <li><?= $this->Html->link(__('Generate Pins'),['plugin'=>'ResultSystem','controller'=>'StudentResultPins','action'=>'generate-pin'],['escape'=>false]) ?></li>
                    <li><?= $this->Html->link(__('Print Pins'),['plugin'=>'ResultSystem','controller'=>'StudentResultPins','action'=>'print-pin'],['escape'=>false]) ?></li>
                </ul>
            </li>
        </ul>
    </li>
<?php endif; ?>
<?php $this->end() ?>






<!-- begin #sidebar -->
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <div class="image">
                    <?= $this->Html->image('admin-photos/avatar_placeholder.png') ?>
                    <a href="javascript:;"><img src="" alt="" /></a>
                </div>
                <div class="info">
                    <?= $this->request->session()->read('Auth.User.username') ?>
                    <small><?= ($this->request->session()->read('Auth.User.is_superuser')) ?  'superuser' :  $this->request->session()->read('Auth.User.role') ?></small>
                </div>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
            <?php
            // fetch the sidebars
            echo $this->fetch('sidebar')
            ?>
            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
<!-- end #sidebar -->

