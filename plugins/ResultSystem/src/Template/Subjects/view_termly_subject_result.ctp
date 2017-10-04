<?php
// including the search parameter element
echo $this->element('searchParametersSessionClassTerm');
?>

<div class="panel panel-inverse m-t-30">
    <div class="panel-heading">
        <h4 class="panel-title"><?= h($subject->name) ?>  ( <?= $subject->block->name ?> ) </h4>
    </div>
    <div class="panel-body">
        <div class="col-sm-12">



            <div class="email-btn-row hidden-xs">
                <a href="#" class="btn btn-sm btn-inverse"><i class="fa fa-plus m-r-5"></i> New</a>
                <a href="#" class="btn btn-sm btn-default disabled">Reply</a>
                <a href="#" class="btn btn-sm btn-default disabled">Delete</a>
                <a href="#" class="btn btn-sm btn-default disabled">Archive</a>
                <a href="#" class="btn btn-sm btn-default disabled">Junk</a>
                <a href="#" class="btn btn-sm btn-default disabled">Swwep</a>
                <a href="#" class="btn btn-sm btn-default disabled">Move to</a>
                <a href="#" class="btn btn-sm btn-default disabled">Categories</a>
            </div>

            <div class="related">
                <h4><?= __(' Student Termly Results') ?></h4>
                <?php if (!empty($subject->student_termly_results)): ?>
                    <table id="data-tabl" class="table table-responsive table-email">
                        <thead>
                        <tr>
                            <th class="email-select"><a href="#" data-click="email-select-all"><i class="fa fa-square-o fa-fw"></i></a></th>
                            <th><?= __('Student Id') ?></th>
                            <th><?= __('Name') ?></th>
                            <th><?= __('First Test') ?></th>
                            <th><?= __('Second Test') ?></th>
                            <th><?= __('Third Test') ?></th>
                            <th><?= __('Exam') ?></th>
                            <th><?= __('Total') ?></th>
                            <th><?= __('Grade') ?></th>
                            <th><?= __('Remark') ?></th>
                            <!-- <th><?= __('Principal Comment') ?></th>
                        <th><?= __('Head Teacher Comment') ?></th> -->
                            <th><?= __('Position') ?></th>

                        </tr>
                        </thead>

                        <tbody>
                        <?php foreach ($subject->student_termly_results as $studentTermlyResults): ?>
                            <tr>
                                <td class="email-select"><a href="#" data-click="email-select-single"><i class="fa fa-square-o fa-fw"></i></a></td>
                                <td><?= h($studentTermlyResults->student_id) ?></td>
                                <td><?= h($studentTermlyResults->student->full_name) ?></td>
                                <td><?= h($studentTermlyResults->first_test) ?></td>
                                <td><?= h($studentTermlyResults->second_test) ?></td>
                                <td><?= h($studentTermlyResults->third_test) ?></td>
                                <td><?= h($studentTermlyResults->exam) ?></td>
                                <td><?= h($studentTermlyResults->total) ?></td>
                                <td><?= h($studentTermlyResults->grade) ?></td>
                                <td><?= h($studentTermlyResults->remark) ?></td>
                                <!-- <td><?= h($studentTermlyResults->principal_comment) ?></td>
                            <td><?= h($studentTermlyResults->head_teacher_comment) ?></td> -->
                                <td><?= @$this->Position->formatPositionOutput($subjectStudentPositions[$studentTermlyResults->student_id]) ?></td>

                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>

<script>
    var handleSelectAll = function () {
        "use strict";
        $('[data-click=email-select-all]').click(function(e) {
            e.preventDefault();
            if ($(this).closest('tr').hasClass('active')) {
                $('.table-email tr').removeClass('active');
            } else {
                $('.table-email tr').addClass('active');
            }
        });
    };

    var handleSelectSingle = function () {
        "use strict";
        $('[data-click=email-select-single]').click(function(e) {
            e.preventDefault();
            var targetRow = $(this).closest('tr');
            if ($(targetRow).hasClass('active')) {
                $(targetRow).removeClass('active');
            } else {
                $(targetRow).addClass('active');
            }
        });
    };

    var handleEmailRemove = function () {
        "use strict";
        $('[data-click=email-remove]').click(function(e) {
            e.preventDefault();
            var targetRow = $(this).closest('tr');
            $(targetRow).fadeOut().remove();
        });
    };

    var handleEmailHighlight = function () {
        "use strict";
        $('[data-click=email-highlight]').click(function(e) {
            e.preventDefault();
            if ($(this).hasClass('text-danger')) {
                $(this).removeClass('text-danger');
            } else {
                $(this).addClass('text-danger');
            }
        });
    };

    var Inbox = function () {
        "use strict";
        return {
            //main function
            init: function () {
                handleSelectAll();
                handleSelectSingle();
                handleEmailRemove();
                handleEmailHighlight();
            }
        };
    }();
    Inbox.init();
</script>