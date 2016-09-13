<?php
use Cake\Core\Configure;
?>
<nav class="navbar navbar-default navbar-fixed-top ">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://schoolsystem.dev"><?= Configure::read('Application.name') ?></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li><?= $this->Html->link(__('Login'),['controller'=>'Admins','action'=>'login']) ?></li>
            </ul>
        </div>
    </div>
</nav>