<div class="container m-t-40 m-b-40">
    <div class="row result-container">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h3 class="m-b-1">SCHOOL OF NURSING, MATER MISERICORDIAE HOSPITAL</h3>
                    <h5 class="m-t-2 m-b-35"> P.M.B 1111, AFIKPO, EBONYI STATE.</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-6 text-center">
                    <h4 class="text-underline"> STUDENT RESULT SHEET</h4>
                </div>
                <div class="col-sm-3 pull-right">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <p>Name : <?= $student->fullname ?></p>
                    <p> Reg Number : <?= $student->id ?></p>

                    <table class="table table-responsive table-bordered">
                        <thead>
                        <tr>
                            <th>Course </th>
                            <th> Total</th>
                            <th> Grade</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($student->courses as $course): ?>
                            <tr>
                                <th><?= $course->id ?> - <?= $course->name ?></th>
                                <td> <?= $course->_joinData->total ?></td>
                                <td> <?= $course->_joinData->grade ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <tr><th>Remark</th><td colspan="3"><?= @$student->remarks[0]->remark ?></td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>