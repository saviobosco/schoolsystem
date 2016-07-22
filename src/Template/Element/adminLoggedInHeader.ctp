<?php
use Cake\Core\Configure;
?>
<div id="header" class="header navbar navbar-default navbar-fixed-top">
    <!-- begin container-fluid -->
    <div class="container-fluid">
        <!-- begin mobile sidebar expand / collapse button -->
        <div class="navbar-header">
            <?= $this->Html->link(__(Configure::read('Application.name')).' Admin','/admins/dashboard',['class'=>'navbar-brand']) ?>
            <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- end mobile sidebar expand / collapse button -->

        <!-- begin header navigation right -->
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown navbar-user">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="hidden-xs"><?= $this->request->session()->read('Auth.User.username') ?></span> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu animated fadeInLeft">
                    <li class="arrow"></li>
                    <li><?= $this->Html->link(__('View profile'),['plugin'=>null,'controller'=>'Admins','action'=>'profile']) ?></li>
                    <li class="divider"></li>
                    <li><?= $this->Html->link(__('Logout'),['plugin'=>null,'controller'=>'Admins','action'=>'logout']) ?></li>
                </ul>
            </li>
        </ul>
        <!-- end header navigation right -->
    </div>
    <!-- end container-fluid -->
</div>