<?php
/**
 * file name check_entrance_result.ctp .
 */
$this->layout = 'custom';
$this->assign('title','Admission Letter');
?>
<div class="container">
        <div class="row result-container m-b-40 m-t-40">
            <div class="container">
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
                        <h4 class="text-underline"> ADMISSION LETTER</h4>
                    </div>
                    <div class="col-sm-3 pull-right">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <?= sprintf(__('<p class="result-text">We are happy to inform you %s that you have been offered admission into this prestigious institution  </p>')
                            ,$result->fullname ) ?>

                        <p>Congratulations as you gain admission into this noble institution. </p>
                        <p class="pull-right"><strong>Signed :</strong>Ekuma-Ojim, Judith (Principal).</p>
                    </div>
                </div>
            </div>
        </div>
</div>


