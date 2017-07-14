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
            <li class="has-sub">
                <?= $this->Html->link('<b class="caret pull-right"></b>'.__('Academic Sessions'),'javascript:;',['escape'=>false,'title'=>'Academic session or batch']) ?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link(__('Sessions'),['plugin'=>null,'controller'=>'Sessions','action'=>'index'],['escape'=>false]) ?></li>
                    <li><?= $this->Html->link(__('Add New session'),['plugin'=>null,'controller'=>'Sessions','action'=>'add'],['escape'=>false]) ?></li>
                </ul>
            </li>
            <li class="has-sub">
                <?= $this->Html->link('<b class="caret pull-right"></b>'.__('Classes'),'javascript:;',['escape'=>false]) ?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link(__('All Classes'),['plugin'=>null,'controller'=>'Classes','action'=>'index'],['escape'=>false]) ?></li>
                    <li><?= $this->Html->link(__('Add Class'),['plugin'=>null,'controller'=>'Classes','action'=>'add'],['escape'=>false]) ?></li>
                    <li class="has-sub">
                        <?= $this->Html->link('<b class="caret pull-right"></b>'.__('Class Demarcations'),'javascript:;',['escape'=>false]) ?>
                        <ul class="sub-menu">
                            <li><?= $this->Html->link(__('Class Demarcations'),['plugin'=>null,'controller'=>'ClassDemarcations','action'=>'index'],['escape'=>false]) ?></li>
                            <li><?= $this->Html->link(__('add Class Demarcation'),['plugin'=>null,'controller'=>'ClassDemarcations','action'=>'add'],['escape'=>false]) ?></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <?= $this->Html->link('<b class="caret pull-right"></b>'.__('Subjects'),'javascript:;',['escape'=>false]) ?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link(__('All Subjects'),['plugin'=>null,'controller'=>'Subjects','action'=>'index'],['escape'=>false]) ?></li>
                    <li><?= $this->Html->link(__('New Subjects'),['plugin'=>null,'controller'=>'Subjects','action'=>'add'],['escape'=>false]) ?></li>
                </ul>
            </li>
            <li class="has-sub">
                <?= $this->Html->link('<b class="caret pull-right"></b>'.__('Students'),'javascript:;',['escape'=>false]) ?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link(__('All Students'),['plugin'=>null,'controller'=>'Students','action'=>'index'],['escape'=>false]) ?></li>
                    <li><?= $this->Html->link(__('Add Student'),['plugin'=>null,'controller'=>'Students','action'=>'add'],['escape'=>false]) ?></li>
                </ul>
            </li>
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
                    <li><?= $this->Html->link(__('Upload Result'),['plugin'=>'ResultSystem','controller'=>'StudentTermlyResults','action'=>'uploadResult']) ?></li>
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
            <li class="has-sub">
                <?= $this->Html->link('<b class="caret pull-right"></b>'.__('Admins'),'javascript:;',['escape'=>false]) ?>
                <ul class="sub-menu">
                    <li><?= $this->Html->link(__('All Admins'),['plugin'=>null,'controller'=>'MyUsers','action'=>'index'],['escape'=>false]) ?></li>
                    <li><?= $this->Html->link(__('New Admin'),['plugin'=>null,'controller'=>'MyUsers','action'=>'add'],['escape'=>false]) ?></li>
                </ul>
            </li>
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
            <!-- <li class="has-sub">
                <a href="javascript:;">
                    <span class="badge pull-right">10</span>
                    <i class="fa fa-inbox"></i>
                    <span>Messages</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="email_inbox.html">Inbox v1</a></li>
                    <li><a href="email_inbox_v2.html">Inbox v2</a></li>
                    <li><a href="email_compose.html">Compose</a></li>
                    <li><a href="email_detail.html">Detail</a></li>
                </ul>
            </li> -->
            <!-- <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-suitcase"></i>
                    <span>UI Elements</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="ui_general.html">General</a></li>
                    <li><a href="ui_typography.html">Typography</a></li>
                    <li><a href="ui_tabs_accordions.html">Tabs & Accordions</a></li>
                    <li><a href="ui_unlimited_tabs.html">Unlimited Nav Tabs</a></li>
                    <li><a href="ui_modal_notification.html">Modal & Notification</a></li>
                    <li><a href="ui_widget_boxes.html">Widget Boxes</a></li>
                    <li><a href="ui_media_object.html">Media Object</a></li>
                    <li><a href="ui_buttons.html">Buttons</a></li>
                    <li><a href="ui_icons.html">Icons</a></li>
                    <li><a href="ui_simple_line_icons.html">Simple Line Icons</a></li>
                    <li><a href="ui_ionicons.html">Ionicons</a></li>
                    <li><a href="ui_tree.html">Tree View</a></li>
                    <li><a href="ui_language_bar_icon.html">Language Bar & Icon</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-file-o"></i>
                    <span>Form Stuff</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="form_elements.html">Form Elements</a></li>
                    <li><a href="form_plugins.html">Form Plugins</a></li>
                    <li><a href="form_slider_switcher.html">Form Slider + Switcher</a></li>
                    <li><a href="form_validation.html">Form Validation</a></li>
                    <li><a href="form_wizards.html">Wizards</a></li>
                    <li><a href="form_wizards_validation.html">Wizards + Validation</a></li>
                    <li><a href="form_wysiwyg.html">WYSIWYG</a></li>
                    <li><a href="form_editable.html">X-Editable</a></li>
                    <li><a href="form_multiple_upload.html">Multiple File Upload</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-th"></i>
                    <span>Tables  <span class="label label-theme m-l-5">NEW</span></span>
                </a>
                <ul class="sub-menu">
                    <li><a href="table_basic.html">Basic Tables</a></li>
                    <li class="has-sub">
                        <a href="javascript:;"><b class="caret pull-right"></b> Managed Tables</a>
                        <ul class="sub-menu">
                            <li><a href="table_manage.html">Default</a></li>
                            <li><a href="table_manage_autofill.html">Autofill</a></li>
                            <li><a href="table_manage_buttons.html">Buttons</a></li>
                            <li><a href="table_manage_colreorder.html">ColReorder</a></li>
                            <li><a href="table_manage_fixed_columns.html">Fixed Column</a></li>
                            <li><a href="table_manage_fixed_header.html">Fixed Header</a></li>
                            <li><a href="table_manage_keytable.html">KeyTable</a></li>
                            <li><a href="table_manage_responsive.html">Responsive</a></li>
                            <li><a href="table_manage_rowreorder.html">RowReorder <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                            <li><a href="table_manage_scroller.html">Scroller</a></li>
                            <li><a href="table_manage_select.html">Select</a></li>
                            <li><a href="table_manage_combine.html">Extension Combination</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-star"></i>
                    <span>Front End</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="../../frontend/one-page-parallax/template_content_html/index.html" target="_blank">One Page Parallax</a></li>
                    <li><a href="../../frontend/blog/template_content_html/index.html" target="_blank">Blog</a></li>
                    <li><a href="../../frontend/forum/template_content_html/index.html" target="_blank">Forum</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-envelope"></i>
                    <span>Email Template</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="email_system.html">System Template</a></li>
                    <li><a href="email_newsletter.html">Newsletter Template</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-area-chart"></i>
                    <span>Chart <span class="label label-theme m-l-5">NEW</span></span>
                </a>
                <ul class="sub-menu">
                    <li><a href="chart-flot.html">Flot Chart</a></li>
                    <li><a href="chart-morris.html">Morris Chart</a></li>
                    <li><a href="chart-js.html">Chart JS</a></li>
                    <li><a href="chart-d3.html">d3 Chart <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                </ul>
            </li>
            <li><a href="calendar.html"><i class="fa fa-calendar"></i> <span>Calendar</span></a></li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-map-marker"></i>
                    <span>Map</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="map_vector.html">Vector Map</a></li>
                    <li><a href="map_google.html">Google Map</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-camera"></i>
                    <span>Gallery</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="gallery.html">Gallery v1</a></li>
                    <li><a href="gallery_v2.html">Gallery v2</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-cogs"></i>
                    <span>Page Options <span class="label label-theme m-l-5">NEW</span></span>
                </a>
                <ul class="sub-menu">
                    <li><a href="page_blank.html">Blank Page</a></li>
                    <li><a href="page_with_footer.html">Page with Footer</a></li>
                    <li><a href="page_without_sidebar.html">Page without Sidebar</a></li>
                    <li><a href="page_with_right_sidebar.html">Page with Right Sidebar</a></li>
                    <li><a href="page_with_minified_sidebar.html">Page with Minified Sidebar</a></li>
                    <li><a href="page_with_two_sidebar.html">Page with Two Sidebar</a></li>
                    <li><a href="page_with_line_icons.html">Page with Line Icons</a></li>
                    <li><a href="page_with_ionicons.html">Page with Ionicons</a></li>
                    <li><a href="page_full_height.html">Full Height Content</a></li>
                    <li><a href="page_with_wide_sidebar.html">Page with Wide Sidebar</a></li>
                    <li><a href="page_with_light_sidebar.html">Page with Light Sidebar</a></li>
                    <li><a href="page_with_mega_menu.html">Page with Mega Menu</a></li>
                    <li><a href="page_with_top_menu.html">Page with Top Menu <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                    <li><a href="page_with_boxed_layout.html">Page with Boxed Layout <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                    <li><a href="page_with_mixed_menu.html">Page with Mixed Menu <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                    <li><a href="page_boxed_layout_with_mixed_menu.html">Boxed Layout with Mixed Menu <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                    <li><a href="page_with_transparent_sidebar.html">Page with Transparent Sidebar <i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-gift"></i>
                    <span>Extra</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="extra_timeline.html">Timeline</a></li>
                    <li><a href="extra_coming_soon.html">Coming Soon Page</a></li>
                    <li><a href="extra_search_results.html">Search Results</a></li>
                    <li><a href="extra_invoice.html">Invoice</a></li>
                    <li><a href="extra_404_error.html">404 Error Page</a></li>
                    <li><a href="extra_profile.html">Profile Page</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-key"></i>
                    <span>Login & Register</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="login.html">Login</a></li>
                    <li><a href="login_v2.html">Login v2</a></li>
                    <li><a href="login_v3.html">Login v3</a></li>
                    <li><a href="register_v3.html">Register v3</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-cubes"></i>
                    <span>Version <span class="label label-theme m-l-5">NEW</span></span>
                </a>
                <ul class="sub-menu">
                    <li><a href="javascript:;">HTML</a></li>
                    <li><a href="../template_content_ajax/index.html">AJAX</a></li>
                    <li><a href="../template_content_angularjs/index.html">ANGULAR JS<i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-medkit"></i>
                    <span>Helper</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="helper_css.html">Predefined CSS Classes</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="javascript:;">
                    <b class="caret pull-right"></b>
                    <i class="fa fa-align-left"></i>
                    <span>Menu Level</span>
                </a>
                <ul class="sub-menu">
                    <li class="has-sub">
                        <a href="javascript:;">
                            <b class="caret pull-right"></b>
                            Menu 1.1
                        </a>
                        <ul class="sub-menu">
                            <li class="has-sub">
                                <a href="javascript:;">
                                    <b class="caret pull-right"></b>
                                    Menu 2.1
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="javascript:;">Menu 3.1</a></li>
                                    <li><a href="javascript:;">Menu 3.2</a></li>
                                </ul>
                            </li>
                            <li><a href="javascript:;">Menu 2.2</a></li>
                            <li><a href="javascript:;">Menu 2.3</a></li>
                        </ul>
                    </li>
                    <li><a href="javascript:;">Menu 1.2</a></li>
                    <li><a href="javascript:;">Menu 1.3</a></li>
                </ul>
            </li> -->
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