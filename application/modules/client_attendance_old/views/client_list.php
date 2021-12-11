<?PHP 
//print_r($list); exit;
?>
      <section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-client" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                    <div class="row mb-3">  
                        <div class="col-md-7">
                            <h1 style="text-align: left;">Client Attendance</h1>
                        </div>
                        <div class="col-md-5">
                            <div class="add-btn-div">
                                <a href="<?php echo base_url('client_attendance/add_client_attendance'); ?>" class="ad-btn-a-tag">Attendance Input</a>  
                            </div>
                        </div>
                    </div>
                    <?php echo form_open( base_url( 'client_attendance/client' ), array( 'id' => 'search', 'class' => 'form-horizontal' ) ); ?>
                    <div class="row">
                        <div class="col-md-5">
                             <div class="form-group row">
                                 <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Month & Year :    </label>
                                    <div class="col-sm-9">
                                        <?php 
                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'month');
                                            $selected = (set_value('month')) ? set_value('month') : '';
                                            echo form_dropdown('month', $month, $selected, $attributes);
                                        ?>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-5">
                             <div class="form-group row">
                                 <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">Client Name :    </label>
                                    <div class="col-sm-9">
                                        <?php 
                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'client_id');
                                            $selected = (set_value('client_id')) ? set_value('client_id') : '';
                                            echo form_dropdown('client_id', $client, $selected, $attributes);
                                        ?>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" id= "submit_search" class="cr-a" style="padding: 6px 0px;">Search</button>
                        </div>  
                    </div> 
                </form>
                    <div class="wrapper-box">
                        <table id="client-table" class="table table-striped table-bordered" style="width:100%">  
                            <thead>
									<tr>
                                        <th>Client</th>
                                        <th>Employee Code & Name</th>
                                        <th>Designation</th>
                                        <th>Month & Year</th>
                                        <th>Duty</th>
                                        <th>W/O</th>
                                        <th>Leave</th>
                                        <th>Ph</th>
                                        <th>Ot Hrs</th>
                                        <th>Action</th>
                                        <th>Approval Status</th>
                                    </tr>
                                </thead>
                                <tbody id="client_attendance_list">
								    <?php 
                                        if(!empty($client_attendance))
                                        {
                                    foreach($client_attendance as $att) { ?>

                                        <tr>
                                            <td><?php echo $att->client_name; ?></td>
                                            <td><?php echo $att->employee_name; ?></td>
                                            <td><?php echo $att->desig_name; ?></td>
                                            <td><?php echo $att->MonthYear; ?></td>
                                            <td><?php echo $att->duty; ?></td>
                                            <td><?php echo $att->wo; ?></td>
                                            <td><?php echo $att->leave; ?></td>
                                            <td><?php echo $att->ph; ?></td>
                                            <td><?php echo $att->ot; ?></td>
                                            <?php if($att->salary_processed_flag == '0') { ?>
                                                <td style="text-align: center;"><i class="icon-edit"></i><a class="edit-tag-icon" href="<?php echo base_url('client_attendance/edit_client_attendance/'.$att->client_attendance_id); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                            <?php } else { ?>

                                                <td></td>

                                            <?php } ?>
											<td>
												<?php
													if($att->approval_required == 0){ echo "N/A"; }
													else{
														if($att->approval_status == 'A'){ echo "Approved"; }
														else if($att->approval_status == 'R'){ echo "Rejected"; }
														else{
															if($approval->has_permission == 0){
																echo "Pending";
															}
															else{
																echo '<a class="vd-ed-2" href="' . base_url("client_attendance/approve/" . $att->client_attendance_id) . '"> Approve</a>';
															}
														}
														
													}
												?>
											</td>
                                            
                                        </tr>


                                    <?php } 
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

<script>
    $(document).ready(function() {
        $('#client-table').DataTable();
    } );


</script>
