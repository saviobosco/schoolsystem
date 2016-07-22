<div id="sidebar" class="sidebar" style="position: fixed;">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <!--<div class="image">
                    <a href="javascript:;"><img src="assets/img/user-13.jpg" alt="" /></a>
                </div>-->
                <div class="info">
                    <?= $this->request->session()->read('Auth.User.username') ?>
                    <small><?= $this->request->session()->read('Auth.User.role') ?></small>
                </div>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
            <li class="nav-header">Navigation</li>
            <li class="has-sub">
                <?= $this->Html->link('<b class="caret pull-right"></b> <i class="fa fa-laptop"></i>'.__('Dashboard'),'javascript:;',['escape'=>false]) ?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link(__('Dashboard'),['plugin'=>null,'controller'=>'Admins','action'=>'dashboard'],['escape'=>false]) ?></li>
                    <li><?= $this->Html->link(__('Site Config'),['plugin'=>null,'controller'=>'Admins','action'=>'site_config'],['escape'=>false]) ?></li>
                </ul>
            </li>
            <li class="has-sub">
                <?= $this->Html->link('<b class="caret pull-right"></b> <i class="fa fa-users"></i>'.__('Applicants'),'javascript:;',['escape'=>false]) ?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link(__('Add New Applicant'),['plugin'=>null,'controller'=>'Admins','action'=>'addApplicant'],['escape'=>false]) ?></li>
                    <li><?= $this->Html->link(__('List Applicants'),['plugin'=>null,'controller'=>'ApplicationsSubmitted','action'=>'index'],['escape'=>false]) ?></li>
                    <li><?= $this->Html->link(__('Entrance Results'),['plugin'=>null,'controller'=>'ApplicantsEntranceResults','action'=>'index']) ?></li>
                    <li><?= $this->Html->link(__('Upload Entrance Result'),['plugin'=>null,'controller'=>'ApplicantsEntranceResults','action'=>'add']) ?></li>
                    <li><?= $this->Html->link(__('Interview Results'),['plugin'=>null,'controller'=>'ApplicantsInterviewResults','action'=>'index']) ?></li>
                    <li><?= $this->Html->link(__('Upload Interview Result'),['plugin'=>null,'controller'=>'ApplicantsInterviewResults','action'=>'add']) ?></li>
                </ul>
            </li>
            <li class="has-sub">
                <?= $this->Html->link('<b class="caret pull-right"></b> <i class="fa fa-university"></i>'.__('Admission'),'javascript:;',['escape'=>false]) ?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link(__('Offer Admission'),['plugin'=>null,'controller'=>'ApplicationsSubmitted','action'=>'admission'],['escape'=>false]) ?></li>
                    <li><?= $this->Html->link(__('Admitted Students'),['plugin'=>null,'controller'=>'ApplicationsSubmitted','action'=>'admitted_students'],['escape'=>false]) ?></li>
                </ul>
            </li>
            <li class="has-sub">
                <?= $this->Html->link('<b class="caret pull-right"></b> <i class="fa fa-users"></i>'.__('Students'),'javascript:;',['escape'=>false]) ?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link(__('All Students'),['plugin'=>null,'controller'=>'Students','action'=>'index','?' => ['year[year]' => date('Y')]],['escape'=>false]) ?></li>
                    <li><?= $this->Html->link(__('Add Old Student'),['plugin'=>null,'controller'=>'Students','action'=>'add'],['escape'=>false]) ?></li>
                    <li><?= $this->Html->link(__('Add New Student'),['plugin'=>null,'controller'=>'Students','action'=>'new_student'],['escape'=>false]) ?></li>
                </ul>
            </li>
            <li class="has-sub">
                <?= $this->Html->link('<b class="caret pull-right"></b> <i class="fa fa-book"></i>'.__('Courses'),'javascript:;',['escape'=>false]) ?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link(__('All Courses'),['plugin'=>null,'controller'=>'Courses','action'=>'index'],['escape'=>false]) ?></li>
                    <li><?= $this->Html->link(__('New Course'),['plugin'=>null,'controller'=>'Courses','action'=>'add'],['escape'=>false]) ?></li>
                </ul>
            </li>
            <li class="has-sub">
                <?= $this->Html->link('<b class="caret pull-right"></b> <i class="fa fa-users"></i>'.__('Admins'),'javascript:;',['escape'=>false]) ?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link(__('All Admins'),['plugin'=>null,'controller'=>'Admins','action'=>'index'],['escape'=>false]) ?></li>
                    <li><?= $this->Html->link(__('New Admin'),['plugin'=>null,'controller'=>'Admins','action'=>'add'],['escape'=>false]) ?></li>
                </ul>
            </li>
            <li class="has-sub">
                <?= $this->Html->link('<b class="caret pull-right"></b> <i class="fa"></i>'.__('Academic Sessions'),'javascript:;',['escape'=>false,'title'=>'Academic session or batch']) ?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link(__('Sessions'),['plugin'=>null,'controller'=>'Sessions','action'=>'index'],['escape'=>false]) ?></li>
                    <li><?= $this->Html->link(__('Add New session'),['plugin'=>null,'controller'=>'Sessions','action'=>'add'],['escape'=>false]) ?></li>
                </ul>
            </li>
            <li class="has-sub">
                <?= $this->Html->link('<b class="caret pull-right"></b> <i class="fa fa-globe"></i>'.__('Study Levels'),'javascript:;',['escape'=>false]) ?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link(__('Levels'),['plugin'=>null,'controller'=>'Levels','action'=>'index'],['escape'=>false]) ?></li>
                    <li><?= $this->Html->link(__('Add New Level'),['plugin'=>null,'controller'=>'Levels','action'=>'add'],['escape'=>false]) ?></li>
                </ul>
            </li>
            <li class="has-sub">
                <?= $this->Html->link('<b class="caret pull-right"></b> <i class="fa fa-calendar"></i>'.__('Semesters'),'javascript:;',['escape'=>false]) ?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link(__('All Semesters'),['plugin'=>null,'controller'=>'Semesters','action'=>'index'],['escape'=>false]) ?></li>
                    <li><?= $this->Html->link(__('Add Semester'),['plugin'=>null,'controller'=>'Semesters','action'=>'add'],['escape'=>false]) ?></li>
                </ul>
            </li>
            <li class="has-sub">
                <?= $this->Html->link('<b class="caret pull-right"></b> <i class="fa fa-shield"></i>'.__('Pins'),'javascript:;',['escape'=>false]) ?>
            <ul class="sub-menu">
                <li class="has-sub">
                    <a href="javascript:;"><b class="caret pull-right"></b>Applicant Pins</a>
                    <ul class="sub-menu">
                        <li><?= $this->Html->link(__('Generate Pins'),['plugin'=>null,'controller'=>'Admins','action'=>'generate-pin'],['escape'=>false]) ?></li>
                        <li><?= $this->Html->link(__('Print Pins'),['controller'=>'Admins','action'=>'print-pin'],['escape'=>false]) ?></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;"><b class="caret pull-right"></b>Entrance Result Pins</a>
                    <ul class="sub-menu">
                        <li><?= $this->Html->link(__('Generate Pins'),['plugin'=>null,'controller'=>'EntranceResultPins','action'=>'generate-pin'],['escape'=>false]) ?></li>
                        <li><?= $this->Html->link(__('Print Pins'),['controller'=>'EntranceResultPins','action'=>'print-pin'],['escape'=>false]) ?></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;"><b class="caret pull-right"></b> Student Result Pins</a>
                    <ul class="sub-menu">
                        <li><?= $this->Html->link(__('Generate Pins'),['plugin'=>null,'controller'=>'StudentResultPins','action'=>'generate-pin'],['escape'=>false]) ?></li>
                        <li><?= $this->Html->link(__('Print Pins'),['controller'=>'StudentResultPins','action'=>'print-pin'],['escape'=>false]) ?></li>
                    </ul>
                </li>
                </ul>
            </li>
            <li class="has-sub">
                <?= $this->Html->link('<b class="caret pull-right"></b> <i class="fa fa-home"></i>'.__('Schools'),'javascript:;',['escape'=>false]) ?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link(__('All Schools'),['plugin'=>null,'controller'=>'Schools','action'=>'index'],['escape'=>false]) ?></li>
                    <li><?= $this->Html->link(__('Add School'),['plugin'=>null,'controller'=>'Schools','action'=>'add'],['escape'=>false]) ?></li>
                </ul>
            </li>
            <!-- begin sidebar minify button -->
            <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>