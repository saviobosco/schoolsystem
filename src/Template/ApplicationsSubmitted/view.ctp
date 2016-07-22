<div class="profile-container">
    <!-- begin profile-section -->
    <div class="profile-section">
        <!-- begin profile-left -->
        <div class="profile-left">
            <!-- begin profile-image -->
            <div class="profile-image">
                <?= $this->Html->image('photos/'.$applicationsSubmitted->photo) ?>
                <i class="fa fa-user hide"></i>
            </div>
        </div>
        <!-- end profile-left -->
        <!-- begin profile-right -->
        <div class="profile-right">
            <!-- begin profile-info -->
            <div class="profile-info">
                <!-- begin table -->
                <div class="table-responsive">
                    <table class="table table-profile">
                        <thead>
                        <tr>
                            <th></th>
                            <th>
                                <h4><?= h($applicationsSubmitted->fullname) ?><small><?= h($applicationsSubmitted->id) ?></small></h4>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="highlight">
                            <th colspan="2">Personal Data</th>
                        </tr>
                        <tr class="divider">
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td class="field"><?= __('Applicant No') ?></td>
                            <td><?= h($applicationsSubmitted->id) ?></td>
                        </tr>
                        <tr>
                            <td class="field"><?= __('Fullname') ?></td>
                            <td><?= h($applicationsSubmitted->fullname) ?></td>
                        </tr>
                        <tr>
                            <td class="field"><?= __('Maiden Name') ?></td>
                            <td><?= h($applicationsSubmitted->maiden_name) ?></td>
                        </tr>
                        <tr>
                            <td class="field"><?= __('Place Of Birth') ?></td>
                            <td><?= h($applicationsSubmitted->place_of_birth) ?></td>
                        </tr>
                        <tr>
                            <td class="field"><?= __('State Of Origin') ?></td>
                            <td><?= h($applicationsSubmitted->state_of_origin) ?></td>
                        </tr>
                        <tr>
                            <td class="field"><?= __('Nationality') ?></td>
                            <td><?= h($applicationsSubmitted->nationality) ?></td>
                        </tr>
                        <tr>
                            <td class="field"><?= __('Postal Address') ?></td>
                            <td><?= h($applicationsSubmitted->postal_address) ?></td>
                        </tr>
                        <tr>
                            <td class="field"><?= __('Permanent Home Address') ?></td>
                            <td><?= h($applicationsSubmitted->permanent_home_address) ?></td>
                        </tr>
                        <tr>
                            <td class="field"><?= __('Next Of Kin') ?></td>
                            <td><?= h($applicationsSubmitted->next_of_kin) ?></td>
                        </tr>
                        <tr>
                            <td class="field"><?= __('Address Of Next Of Kin') ?></td>
                            <td><?= h($applicationsSubmitted->address_of_next_of_kin) ?></td>
                        </tr>
                        <tr>
                            <td class="field"><?= __('Relationship To Next Of Kin') ?></td>
                            <td><?= h($applicationsSubmitted->relationship_to_next_of_kin) ?></td>
                        </tr>
                        <tr>
                            <td class="field"><?= __('Phone Number') ?></td>
                            <td><?= h($applicationsSubmitted->phone_number) ?></td>
                        </tr>
                        <tr class="divider">
                            <td colspan="2"></td>
                        </tr>
                        <tr class="highlight">
                            <th class="field">Course Details</th>
                        </tr>
                        <tr class="divider">
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td class="field"><?= __('School') ?></td>
                            <td><?= $applicationsSubmitted->school->name ?></td>
                        </tr>
                        <tr class="divider">
                            <td colspan="2"></td>
                        </tr>
                        <tr class="highlight">
                            <th colspan="2"> Academic Qualifications</th>
                        </tr>
                        <tr class="divider">
                            <td colspan="2"></td>
                        </tr>
                        <tr>
                            <td class="field"><?= __('Occupation Of Sponsor') ?></td>
                            <td><?= h($applicationsSubmitted->occupation_of_sponsor) ?></td>
                        </tr>
                        <tr>
                            <td class="field"><?= __('Name Of Sponsor') ?></td>
                            <td><?= h($applicationsSubmitted->name_of_sponsor) ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!-- end table -->
            </div>
            <!-- end profile-info -->
        </div>
        <!-- end profile-right -->
    </div>
</div>
