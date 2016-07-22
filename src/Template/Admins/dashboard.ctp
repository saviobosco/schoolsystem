<div class="row">
    <div class="col-sm-12">
        <p> Site Statistics</p>
    </div>
</div>
<div class="row">
    <!-- begin col-3 -->
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-green">
            <div class="stats-icon"><i class="fa fa-users"></i></div>
            <div class="stats-info">
                <h4>MIDWIFERY STUDENTS</h4>
                <p><?= $this->cell('Dashboard::getNumberOfMidwiferyStudents'); ?></p>
            </div>
            <div class="stats-link">
                <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-blue">
            <div class="stats-icon"><i class="fa fa-home"></i></div>
            <div class="stats-info">
                <h4>NURSING STUDENTS</h4>
                <p><?= $this->cell('Dashboard::getNumberOfNursingStudents'); ?></p>
            </div>
            <div class="stats-link">
                <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-purple">
            <div class="stats-icon"><i class="fa fa-book"></i></div>
            <div class="stats-info">
                <h4>OFFERED COURSES</h4>
                <p><?= $this->cell('Dashboard::getNumberOfCourses'); ?></p>
            </div>
            <div class="stats-link">
                <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
    <!-- begin col-3 -->
    <div class="col-md-3 col-sm-6">
        <div class="widget widget-stats bg-red">
            <div class="stats-icon"><i class="fa fa-calendar-o"></i></div>
            <div class="stats-info">
                <h4>SESSIONS</h4>
                <p><?= $this->cell('Dashboard::getNumberOfSessions'); ?></p>
            </div>
            <div class="stats-link">
                <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
            </div>
        </div>
    </div>
    <!-- end col-3 -->
</div>
<!-- end row -->
