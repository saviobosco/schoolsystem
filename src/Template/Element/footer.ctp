<?php use Cake\Core\Configure; ?>
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
                    <h4 class="footer-title">About <?= Configure::read('Application.name') ?></h4>
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