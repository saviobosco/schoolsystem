<?= $this->assign('title',$title); ?>
<div class="container">
    <div class="row m-b-40 p-b-40">
        <!-- begin col-12 -->
        <div class="col-md-12">
            <?= $this->Form->create($student,['enctype' => 'multipart/form-data','novalidate']) ?>
            <div id="wizar">
                <!-- begin wizard step-1 -->
                <div class="wizard-step-1">
                    <fieldset>
                        <legend class="pull-left width-full">NEW STUDENT REGISTRATION</legend>
                        <!-- begin row -->
                        <div class="row">
                            <!-- begin col-4 -->
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <div class="fileinput fileinput-new" data-provides="fileinput"><input type="hidden" value="" name="...">
                                                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px; line-height: 150px;"></div>
                                                <div>
                                                    <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><?= $this->Form->file('photo',['value'=>'photo']) ?></span>
                                                    <a href="file:///D:/html%20templates/html%20templates/dashboard_templates/themeforest-5961888-avant-clean-and-responsive-bootstrap-31-admin/HTML/form-components.htm#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <?php
                                        echo $this->Form->input('fullname');
                                        echo $this->Form->input('maiden_name');
                                        ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <?php
                                        echo $this->Form->label('What is your gender');
                                        echo $this->Form->radio('sex',[
                                            ['value' => 'male', 'text' => 'Male',],
                                            ['value' => 'female', 'text' => 'Female',]
                                        ],['hiddenField'=>false,'label'=>true,'templates'=>['input' => '<input type="{{type}}" name="{{name}}"{{attrs}}/>',]]);
                                        ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <?php
                                        echo $this->Form->label('Marital status');
                                        echo $this->Form->radio('marital_status',[
                                            ['value' => 'yes', 'text' => 'Married',],
                                            ['value' => 'no', 'text' => 'Not Married',]
                                        ],['hiddenField'=>false,'label'=>true,'templates'=>['input' => '<input type="{{type}}" name="{{name}}"{{attrs}}/>',]]);

                                        ?>
                                    </div>
                                </div>
                                <?php
                                echo $this->Form->input('religion');
                                echo $this->Form->input('place_of_birth');
                                echo $this->Form->input('state_of_origin');
                                echo $this->Form->input('l_g_a');
                                echo $this->Form->input('nationality');
                                echo $this->Form->input('postal_address');
                                echo $this->Form->input('permanent_home_address');
                                echo $this->Form->input('next_of_kin');
                                echo $this->Form->input('address_of_next_of_kin');
                                echo $this->Form->input('relationship_to_next_of_kin');
                                echo $this->Form->input('phone_number');
                                ?>
                            </div>
                        </div>
                        <!-- end row -->
                    </fieldset>
                </div>
                <!-- end wizard step-1 -->
                <!-- begin wizard step-2 -->
                <div class="wizard-step-2">
                    <fieldset>
                        <!-- begin row -->
                        <div class="row">
                            <!-- begin col-6 -->
                            <div class="col-sm-12">
                                <?php
                                echo $this->Form->input('session_id', ['options' => $sessions]);
                                echo $this->Form->input('school_id', ['options' => $schools]);
                                echo $this->Form->input('level_id', ['options' => $levels]);
                                echo $this->Form->input('courses._ids', ['options' => $courses]);

                                ?>
                            </div>
                            <!-- end col-6 -->
                        </div>
                        <!-- end row -->
                    </fieldset>
                </div>
                <!-- end wizard step-2 -->
                <!-- begin wizard step-3 -->
                <div class="wizard-step-3">
                    <fieldset>
                        <!-- begin row -->
                        <div class="row">
                            <!-- begin col-3 -->
                            <div class="col-md-12">
                                <?php
                                $options = [
                                    'individual' => 'individual',
                                    'corporate_body' => 'Corporate Body'
                                ];
                                echo $this->Form->label('Sponsor');
                                echo $this->Form->select('sponsor', $options);
                                ?>
                                <?= $this->Form->input('occupation_of_sponsor'); ?>
                                <?= $this->Form->input('name_of_sponsor'); ?>
                                <?= $this->Form->button(__('Register Student'),['class'=>'btn btn-primary']) ?>
                            </div>
                        </div>
                        <!-- end row -->
                    </fieldset>
                </div>
                <!-- end wizard step-3 -->
            </div>
            <?= $this->Form->end() ?>
        </div>
        <!-- end col-12 -->
    </div>
</div>