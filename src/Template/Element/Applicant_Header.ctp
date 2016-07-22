<?php
use Cake\Core\Configure;
?>
<nav class="navbar  navbar-default navbar-static-top" style="margin-bottom: 0">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <?= $this->Html->link(__(Configure::read('Application.name')),'/',['class'=>'navbar-brand']) ?>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <?php if(!empty($this->request->session()->read('Auth.User.id'))): ?>
                <li class="dropdown navbar-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="hidden-xs"><?= $this->request->session()->read('Auth.User.username') ?></span> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu animated fadeInLeft">
                        <li class="arrow"></li>
                        <li><?= $this->Html->link(__('Dashboard'),['plugin'=>null,'controller'=>'Admins','action'=>'dashboard']) ?></li>
                        <li><?= $this->Html->link(__('View profile'),['plugin'=>null,'controller'=>'Admins','action'=>'profile']) ?></li>
                        <li class="divider"></li>
                        <li><?= $this->Html->link(__('Logout'),['plugin'=>null,'controller'=>'Admins','action'=>'logout']) ?></li>
                    </ul>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>