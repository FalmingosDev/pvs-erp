<?PHP 
//print_r($list); exit;
?>
<section class="main-wrapper">
          <div class="container">
            <div class="row">
                <div class="col-md-12">

                	<?php if($this->session->flashdata('msg')): ?>
                        <div class="alert btn-success alert-dismissible fade show" role="alert" id="show_msg">
                                <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        
                    <?php endif; ?>
				<div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-client" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-7">
                                    <h1>Leave Approval</h1>
                                </div>
                                <div class="col-md-4">&nbsp;</div>
                                <div class="col-md-1">
                                    <div class="add-btn-div">
                                        <a href="<?php echo base_url('leave_approver/add');  ?>" class="cr-a">Add</a>  
                                    </div>
                                </div>
                            </div>
                    <div class="wrapper-box">
                        
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
									<th>Department</th>
									<th>Approval Type</th>
									<th>Employee Name and Code</th>
									<th>Status</th>
								</tr>
							</thead>
							<tbody>
                               <?PHP
								foreach($list as $list){								
								?>
									<tr>
										<td><?PHP echo $list->dept_name; ?></td>
										<td><?PHP echo $list->level; ?></td>
										<td><?PHP echo $list->empname; ?></td>
										
										<?php
                                            if($list->active_status == 0){
                                        ?>
										<td style="text-align: center;">
													Inactive
													<label class="switch" title="Mark as Active"> <input type="checkbox" onclick="if(confirm('Are you sure want to change the status?')){ window.location.assign('<?php echo base_url('leave_approver/status/'.$list->leave_approver_id.'/'.$list->active_status); ?>'); } else{ return false; }"> <span class="switch-slider round"></span> </label>
										</td> 
										<?php
                                            }
											else{
                                        ?>
										<td style="text-align: center;">
													Active
													<label class="switch" title="Mark as Inactive"> <input type="checkbox" checked="checked" onclick="if(confirm('Are you sure want to change the status?')){ window.location.assign('<?php echo base_url('leave_approver/status/'.$list->leave_approver_id.'/'.$list->active_status); ?>'); } else{ return false; }"> <span class="switch-slider round"></span> </label>
										</td>
										<?php
                                            }
                                        ?>
									</tr>
								<?PHP
								}								
								?>
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
      </section>
