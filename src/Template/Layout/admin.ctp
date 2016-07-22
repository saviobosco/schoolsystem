<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
use Cake\Core\Configure;
$cakeDescription = 'Mater S.O.N';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>

    <?php
    echo $this->AlaxosHtml->includeBootstrapCSS(['block' => false]);
    echo $this->AlaxosHtml->includeBootstrapThemeCSS(['block' => false]);
    echo $this->AlaxosHtml->includeAlaxosCSS(['block' => false]);
    echo $this->Site->css('font-awesome/css/font-awesome.css');
    echo $this->Site->css('select2/dist/css/select2.min.css');
    echo $this->Html->css('custom.css');
    echo $this->Html->css('custom.min.css');
    echo $this->Html->css('print.css');

    echo $this->AlaxosHtml->includeAlaxosJQuery(['block' => false]);
    echo $this->AlaxosHtml->includeAlaxosBootstrapJS(['block' => false]);
    ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <style>
        footer {
            position: fixed;
            width: 100%;
            bottom: 0px;
            font-size: 12px;
            background-color: #f8f8f8;
        }
        footer a {
            color: #166cd9;
            text-decoration: none;
        }
        footer a:hover,footer a:focus,footer a:active {
            color: #1454a8;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div id="page-container page-sidebar-fixed ">
    <?php if(empty($this->request->session()->read('Auth.User.id'))): ?>
        <?= $this->element('notLoggedInHeader'); ?>
    <?php endif; ?>
    <?php if(!empty($this->request->session()->read('Auth.User.id'))): ?>
        <?= $this->element('adminLoggedInHeader'); ?>
    <?php endif; ?>
    <div class="container-fluid">
        <?= $this->element('sidebar') ?>
        <div class="row page-content">
            <div class="col-sm-12 m-t-40">
                <?= $this->Flash->render() ?>
                <div class=" clearfix">
                    <?= $this->fetch('content') ?>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>
    <p class="pull-right"> <?= Configure::read('Application.name') ?> by <a href="http://www.Crack-reactor.com" title="Visit crack-reactor"><?= Configure::read('Application.company') ?></a> All copyright reserved.</p>
</footer>
<?= $this->Site->script('bootstrap-wizard/js/bwizard.js') ?>
<?= $this->Site->script('custom/js/fileinput.min.js') ?>
<?= $this->Site->script('select2/dist/js/select2.full.min.js') ?>
<?= $this->Html->script('app.js') ?>
<script>
    $(document).ready(function() {
        App.init();
        $('select').select2();
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
</body>
</html>
