<?PHP 
//print_r($list); exit;
?>

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
      <section class="main-wrapper">
          <div class="container">
            <div class="row">
                <div class="col-md-12">
                  
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-client" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row pb-2">
                                    <div class="col-md-7">
                                        <h1>Leave Details</h1>
                                    </div>
                                </div>
                                <div class="wrapper-box">
                                    <div class="row">
                                        <div class="col-md-12">
											<div class="row mb-3">  
												<div class="col-md-11">
													<h4 style="color: #06f;">Listing for User</h4>
													<p><b>Applied Leaves</b></p>
												</div>
												<div class="col-md-1">
													<div class="add-btn-div">
                                                        <?php if($employee_id != 0) { ?>
														  <a href="<?php echo base_url('leave/apply') ; ?>" class="ad-btn-a-tag cr-a">Apply</a> 
                                                        <?php } ?> 
													</div>
												</div>
											</div>
                                            <div class="table-responsive">
                                                <table id="applied-table" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                           <th rowspan="2">Employee Code</th>
                                                           <th rowspan="2">Name</th>
                                                           <th colspan="2">Leave Date</th>
                                                           <th rowspan="2">Type</th>
                                                           <th rowspan="2">No of Days</th>
                                                           <th rowspan="2">Reason</th>
                                                           <th rowspan="2">Status</th>
                                                        </tr>
                                                        <tr>
                                                           <th>From</th>
                                                           <th>To</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <?php foreach ($user_list as  $user_list) { ?>
                                                            	<tr>
                                                            	<td><?php echo $user_list['employee_code']; ?></td>
                                                            	<td><?php echo $user_list['first_name'] . ' ' . $user_list['last_name']; ?></td>
                                                            	<td><?php echo date("d/m/Y", strtotime($user_list['leave_from'])); ?></td>
                                                            	<td><?php echo date("d/m/Y", strtotime($user_list['leave_to'])); ?></td>
                                                                <td><?php echo $user_list['leave_type'] ?></td>
                                                            	<td><?php echo $user_list['leave_days']; ?></td>
                                                            	<td><?php echo $user_list['reason']; ?></td>
                                                            	<td><?php echo $user_list['status']; ?></td>
                                                            	</tr>
                                                            <?php } ?>
                                                            
                                                        
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="width: 100%;border-bottom: 2px solid #000;height: 2px;margin-bottom: 15px;margin: 28px 0px;"></div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4 style="color: #06f;">Listing for Approver :</h4>
                                            <p><b>Approval/Approved Leave</b></p>
                                            <div class="table-responsive">
                                                <table id="approver-table" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                           <th rowspan="2">Employee Code</th>
                                                           <th rowspan="2">Name</th>
                                                           <th colspan="2">Leave Date</th>
                                                           <th rowspan="2">Type</th>
                                                           <th rowspan="2">No of Days</th>
                                                           <th rowspan="2">Reason</th>
                                                           <th rowspan="2">Status</th>
                                                           <th rowspan="2">Action</th>
                                                        </tr>
                                                        <tr>
                                                           <th>From</th>
                                                           <th>To</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($approval_list as  $app_list) { ?>
                                                            	<tr>
                                                            	<td><?php echo $app_list['employee_code']; ?></td>
                                                            	<td><?php echo $app_list['first_name'] . ' ' . $app_list['last_name']; ?></td>
                                                            	<td><?php echo date("d/m/Y", strtotime($app_list['leave_from'])); ?></td>
                                                            	<td><?php echo date("d/m/Y", strtotime($app_list['leave_to'])); ?></td>
                                                                <td><?php echo $app_list['leave_type'] ?></td>
                                                            	<td><?php echo $app_list['leave_days']; ?></td>
                                                            	<td><?php echo $app_list['reason']; ?></td>
                                                                <td><?php echo $app_list['status']; ?></td>
                                                            	<td><?php if($app_list['status'] == 'Pending' || $app_list['status'] == 'Processing'){ ?>
                                                                    <a href="<?php echo base_url('leave/approve_action/'.$app_list['leave_id'] . '/' . $app_list['approver_id']); ?>" class="btn-update">Approve / Reject</a>
                                                                <?php } ?>
                                                                </td>
                                                            	</tr>
                                                            <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
              </div>
          </div>
    </section>

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
    $('#applied-table').DataTable();
} );
</script>
<script>
    $(document).ready(function() {
    $('#approver-table').DataTable();
} );
</script>
