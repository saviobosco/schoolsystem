<?php
/**
 * file name check_entrance_result.ctp .
 */
$this->layout = 'custom';
$this->assign('title','Entrance Result');
?>
<div class="container">
    <?php if(isset($result->entrance_result)): ?>
        <div class="row result-container m-b-40 m-t-40">
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
                        <h4 class="text-underline"> ENTRANCE EXAMINATION RESULT</h4>
                    </div>
                    <div class="col-sm-3 pull-right">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <?= sprintf(__('<p class="result-text"> %s you scored %d with coresponding grade %s in the %d entrance exam. </p>')
                            ,$result->fullname,$result->entrance_result->total,$result->entrance_result->grade,date('Y')) ?>

                        <p class="error">Note</p>
                        <ol>
                            <li>Qualified candidates are to pay an interview fee of seven thousand naira (N 7,000.00) only, into the  following details:
                                <p class="m-b-1"><strong> School of Nursing Mater Misericordiae Hospital, Afikpo.</strong></p>
                                <p class="m-t-2 m-b-1"><strong> Account Number: 3016944553.</strong></p>
                                <p class="m-t-2 "><strong> Bank: First Bank (Nig) Plc.</strong></p>
                            </li>
                            <li>Candidates who have satisfied (1) above are to proceed to the School with their bank teller for
                                clearance with the clearance fee of one thousand naira (N1, 000.00) only payable at the school
                                bursary unit. Clearance date starts from 15th – 23rd July, 2013 excluding weekends.</li>
                            <li>Candidates should provide on clearance photocopies of the following documents.
                                <ul>
                                    <li>Letter of identification/Nativity from candidates Local Government Area. (L.G.A)</li>
                                    <li>Attestation letter from parents/guardian.</li>
                                    <li>Attestation letter from candidate's Parish Priest/Clergy.</li>
                                    <li> 0’ level Certificate with credits on the following complete Biology, Chemistry, Physics,
                                        English and Mathematics in not more than two sittings. </li>
                                    <li>Receipts of payment for entrance and interview.</li>
                                </ul>
                            </li>
                            <li>On the day of interview, candidates are to present with originals and photocopies of the
                                above documents, pen and pencils.
                                <p class="m-b-2"><strong>Venue for interview: School of Nursing, Mater Misericordiae Hospital, Afikpo, Auditorium. </strong></p>
                                <p><strong>Time for interview: 9.00am </strong></p>
                                <p>NB: The interview will be in two sessions:</p>
                                <ul>
                                    <li>45 minutes written</li>
                                    <li> 5 minutes oral per candidate</li>
                                </ul>
                            </li>
                        </ol>
                        <p>Congratulations as you gain admission into this noble institution. </p>
                        <p class="pull-right"><strong>Signed :</strong>Ekuma-Ojim, Judith (Principal).</p>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="row">
            <div class="col-sm-12">
                <p class="alert alert-danger"><i class="fa fa-warning"></i> No Result yet</p>
                <p><strong><?= $result->fullname ?></strong> Your entrance result is still been processed, Please try again later. Thank you for understanding and God bless .</p>
            </div>
        </div>
    <?php endif; ?>
</div>


