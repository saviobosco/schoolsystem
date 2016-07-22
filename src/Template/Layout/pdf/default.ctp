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
    echo $this->Site->script('bootstrap-wizard/js/bwizard.js');
    ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
<?= $this->Element('Applicant_Header'); ?>
<div>
    <?= $this->Flash->render() ?>
    <?= $this->fetch('content') ?>
</div>
<div id="footer" class="footer">
    <!-- begin container -->
    <div class="container">
        <!-- begin row -->
        <div class="row">
            <!-- begin col-3 -->
            <div class="col-md-3 col-sm-3">
                <!-- begin section-container -->
                <div class="section-container">
                    <h4 class="footer-title">Institution</h4>
                    <ul class="categories">
                        <li><?= $this->Html->link(__('Apply to study'),['plugin'=>null,'controller'=>'Applicants','action'=>'applicant_login']) ?></li>
                        <li><?= $this->Html->link(__('Entrance Result'),['plugin'=>null,'controller'=>'ApplicationsSubmitted','action'=>'check_entrance_result']) ?></li>
                        <li><?= $this->Html->link(__('Admission Status'),['plugin'=>null,'controller'=>'ApplicationsSubmitted','action'=>'check_admission_status']) ?></li>
                    </ul>
                </div>
                <!-- end section-container -->
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-md-3 col-sm-3">
                <!-- begin section-container -->
                <div class="section-container">
                    <h4 class="footer-title">Students</h4>
                    <ul class="archives">
                        <li><?= $this->Html->link(__('New Student Registration'),['plugin'=>null,'controller'=>'ApplicationsSubmitted','action'=>'check_new_student_registration']) ?></li>
                        <li><?= $this->Html->link(__('Old Student Registration'),['plugin'=>null,'controller'=>'Students','action'=>'add']) ?></li>
                        <li><?= $this->Html->link(__('Check Result'),['plugin'=>null,'controller'=>'Students','action'=>'check_result']) ?></li>
                    </ul>
                </div>
                <!-- end section-container -->
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-md-3 col-sm-3">
                <!-- begin section-container -->
                <div class="section-container">
                    <h4 class="footer-title">School</h4>
                    <ul class="categories">
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><?= $this->Html->link(__('Admin Login'),['plugin'=>null,'controller'=>'Admins','action'=>'login']) ?></li>
                    </ul>
                </div>
                <!-- end section-container -->
            </div>
            <!-- end col-3 -->
            <!-- begin col-3 -->
            <div class="col-md-3 col-sm-3">
                <div class="section-container">
                    <h4 class="footer-title">About Mater Misericordiae</h4>
                    <!--<address>
                        <strong>Twitter, Inc.</strong><br />
                        795 Folsom Ave, Suite 600<br />
                        San Francisco, CA 94107<br />
                        P: (123) 456-7890<br />
                        <br />
                    </address> -->
                </div>
                <!-- end section-container -->
            </div>
            <!-- end col-3 -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end #footer -->
<!-- begin #footer-copyright -->
<div id="footer-copyright" class="footer-copyright">
    <!-- begin container -->
    <div class="container">
        <span class="copyright">&copy; 2016 Crack Reactor All Right Reserved</span>
        <ul class="social-media-list">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-rss"></i></a></li>
        </ul>
    </div>
    <!-- end container -->
</div>
<?= $this->Site->script('bootstrap-wizard/js/bwizard.js') ?>
<?= $this->Site->script('custom/js/fileinput.min.js') ?>
<?= $this->Site->script('select2/dist/js/select2.full.min.js') ?>
<?= $this->Html->script('app.js') ?>

<script>
    $(document).ready(function() {
        $("#wizard").bwizard();
        App.init();
        $('select').select2();
    });
</script>
</body>
</html>
