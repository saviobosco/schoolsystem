<?php
/**
 * file name check_entrance_result.ctp .
 */
$this->layout = 'custom';
$this->assign('title','Interview Result');
?>
<div class="container m-t-40 m-b-40">
    <?php if(isset($result->interview_result)): ?>
        <div class="row result-container">
            <div class="col-sm-12">
                <!-- start of letter heading -->
                <?php if($result->school_id === 1): ?>
                    <div class="row">
                        <div class="col-xs-1">
                            <?= $this->Html->image('systemfiles/nurselogo.png',['width'=>'150px','class'=>'m-t-10']) ?>
                        </div>
                        <div class="col-xs-11 text-center">
                            <h3 class="m-b-1">SCHOOL OF NURSING, MATER MISERICORDIAE HOSPITAL</h3>
                            <h5 class="m-t-2"> P.M.B 1111, AFIKPO, EBONYI STATE.</h5>
                            <h6 class="m-t-2 " >website:<a href="http://matersomn.org">matersomn.org</a></h6>
                            <h6 class="m-t-2 m-b-40">Email : <a href="maito:info@matersomn.org">info@matersomn.org</a></h6>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="row">
                        <div class="col-xs-1 p-r-0">
                            <?= $this->Html->image('systemfiles/midwifery.jpg',['width'=>'150px','class'=>'m-t-10']) ?>
                        </div>
                        <div class="col-xs-11 text-center">
                            <h3 class="m-b-1">SCHOOL OF MID-WIFERY, MATER MISERICORDIAE HOSPITAL</h3>
                            <h5 class="m-t-2"> P.M.B 1111, AFIKPO, EBONYI STATE.</h5>
                            <h6 class="m-t-2 " >website:<a href="http://matersomn.org">matersomn.org</a></h6>
                            <h6 class="m-t-2 m-b-40">Email : <a href="maito:info@matersomn.org">info@matersomn.org</a></h6>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- end of letter heading -->
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6 text-center">
                        <h4 class="text-underline"> INTERVIEW EXAMINATION RESULT</h4>
                    </div>
                    <div class="col-sm-3 pull-right">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <?= sprintf(__('<p class="result-text"> %s you scored %d with coresponding grade %s in the %d interview exam. </p>')
                            ,$result->fullname,$result->interview_result->total,$result->interview_result->grade,date('Y')) ?>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <p class="alert alert-danger"><i class="fa fa-warning"></i> No Result yet</p>
        <p><strong><?= $result->fullname ?></strong> Your interview result is still been processed, Please try again later. Thank you for understanding and God bless .</p>
    <?php endif; ?>
</div>

