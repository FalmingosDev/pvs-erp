<section class="dash-section">
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href="#">
                        <div class="dash-box">
                            <div class="dash-content">
                                <div class="icon-d">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                                <div class="em-ds">
                                    <p>Employee Directory<span><?php echo $tot_emp->tot_emp; ?></span></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- <div class="col-md-3">
                    <a href="#">
                        <div class="dash-box">
                            <div class="dash-content">
                                <div class="icon-d">
                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                </div>
                                <div class="em-ds">
                                    <p></span></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div> -->
                <div class="col-md-4">
                    <a href="#">
                        <div class="dash-box">
                            <div class="dash-content">
                                <div class="icon-d">
                                    <i class="fa fa-envelope-open-o" aria-hidden="true"></i>
                                </div>
                                <div class="em-ds">
                                    <p>New Joinee's Today<span><?php echo $tot_new_join->tot_new; ?></span></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <div class="dash-box">
                            <div class="dash-content">
                                <div class="icon-d">
                                    <i class="fa fa-id-badge" aria-hidden="true"></i>
                                </div>
                                <div class="em-ds">
                                    <p>Branch Recruitment Approvals<span><?php echo $tot_pending_approval->tot_pending_emp; ?></span></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section> 
<section class="dash-section">
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <a href="#">
                        <div class="dash-box">
                            <div class="dash-content">
                                <div class="icon-d">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                </div>
                                <div class="em-ds">
                                    <p>All Clients<span><?php echo $tot_client->tot_client; ?></span></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4">
                    <a href="#">
                        <div class="dash-box">
                            <div class="dash-content">
                                <div class="icon-d">
                                    <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                </div>
                                <div class="em-ds">
                                    <p>Recent Contracts<span><?php echo $tot_new_join_client->tot_new_client; ?></span></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <!-- <div class="col-md-3">
                    <a href="#">
                        <div class="dash-box">
                            <div class="dash-content">
                                <div class="icon-d">
                                    <i class="fa fa-envelope-open-o" aria-hidden="true"></i>
                                </div>
                                <div class="em-ds">
                                    <p>Pending Work<span>12</span></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div> -->
                <div class="col-md-4">
                    <?php
                    
                    if($tot_pending_approval_client->tot_pending_client>0 && $client_level==1 || $client_level==2)
                    {
                    ?>
                    <a href="<?php echo base_url('client'); ?>">
                    <?php
                    }
                    else
                    {
                        ?>
                        <a href="#">
                        <?php
                    }
                    ?>
                        <div class="dash-box">
                            <div class="dash-content">
                                <div class="icon-d">
                                    <i class="fa fa-id-badge" aria-hidden="true"></i>
                                </div>
                                <div class="em-ds">
                                    <p>Pending Contract Approvals<span><?php echo $tot_pending_approval_client->tot_pending_client; ?></span></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
				
            </div>
			<?php /* ?><pre><?php print_r($session_data); ?></pre><?php */ ?>
        </div>
    </div>
</section> 

<section class="dash-section">
    <div id="content">
        <div class="container">
            <div class="row">
				
				<div class="col-md-4">
                    <a href="<?php echo base_url('leave'); ?>">
                        <div class="dash-box">
                            <div class="dash-content">
                                <div class="icon-d">
                                    <i class="fa fa-id-badge" aria-hidden="true"></i>
                                </div>
                                <div class="em-ds">
                                    <p>Pending Leave Approvals<span><?php echo $leave_approval->pending_leave_approvals; ?></span></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                <?php
                    if(@$client_attendance_approval->tot_pending_client>0)
                    {
                    ?>
                    <a href="<?php echo base_url('client_attendance/client'); ?>">
                    <?php
                    }
                    else
                    {
                        ?>
                        <a href="#">
                        <?php
                    }
                    ?>

                        <div class="dash-box">
                            <div class="dash-content">
                                <div class="icon-d">
                                    <i class="fa fa-id-badge" aria-hidden="true"></i>
                                </div>
                                <div class="em-ds">
                                    <p>Pending Client Attendance Approvals<span><?php echo (@$client_attendance_approval->tot_pending_client=='') ? (0) : (@$client_attendance_approval->tot_pending_client); ?></span></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4">
                <?php
                    if(@$client_supp_attendance_approval->tot_pending_client>0 )
                    {
                    ?>
                    <a href="<?php echo base_url('client_supp_attendance/client'); ?>">
                    <?php
                    }
                    else
                    {
                        ?>
                        <a href="#">
                        <?php
                    }
                    ?>

                        <div class="dash-box">
                            <div class="dash-content">
                                <div class="icon-d">
                                    <i class="fa fa-id-badge" aria-hidden="true"></i>
                                </div>
                                <div class="em-ds">
                                    <p>Pending Client Supp Attendance Approvals<span><?php echo (@$client_supp_attendance_approval->tot_pending_client=='') ? (0) : (@$client_supp_attendance_approval->tot_pending_client); ?></span></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
				
            </div>
			<?php /* ?><pre><?php print_r($session_data); ?></pre><?php */ ?>
        </div>
    </div>
</section> 

<section class="dash-section">
    <div id="content">
        <div class="container">
            <div class="row">
				

                <div class="col-md-4">
                <?php
                    if(@$employee_recruitment_approval->tot_pending_client>0 )
                    {
                    ?>
                    <a href="<?php echo base_url('employee/');?>">
                    <?php
                    }
                    else
                    {
                        ?>
                        <a href="#">
                        <?php
                    }
                    ?>

                        <div class="dash-box">
                            <div class="dash-content">
                                <div class="icon-d">
                                    <i class="fa fa-id-badge" aria-hidden="true"></i>
                                </div>
                                <div class="em-ds">
                                    <p>Pending Recruitment Approval<span><?php echo (@$employee_recruitment_approval->tot_pending_client=='') ? (0) : (@$employee_recruitment_approval->tot_pending_client  ); ?></span></p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
				
            </div>
			<?php /* ?><pre><?php print_r($session_data); ?></pre><?php */ ?>
        </div>
    </div>
</section> 
