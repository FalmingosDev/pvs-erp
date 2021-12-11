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
                            <div class="row">
                                <div class="col-md-7">
                                    <h1>Advance/Loan/Others</h1>
                                </div>
                                <div class="col-md-4">&nbsp;</div>
                                <div class="col-md-1">
                                    <div class="add-btn-div">
                                        <a href="<?php echo base_url('advance_entry/add');  ?>" class="cr-a">Add</a>  
                                    </div>
                                </div>
                            </div>
                    <div class="wrapper-box">
                        <!--<div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Employee Code and Name : </label>
                                    <div class="col-md-7">
                                        <input class="form-control form-control-sm" type="text">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-1">
                                <button class="cr-a">Search</button>
                            </div>
                        </div>-->
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
							<thead>
								<tr>
                                    <th>Employee Name</th>
                                    <th>Paid Date</th>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Deducted Till</th>
                                    <th>No. of Installment</th>
                                    <th>Installment Amount</th>
                                    <th>Balance</th>
									<th>Edit</th>
                                    <th>Status</th>
                                </tr>
							</thead>
							<tbody>
                                <?PHP
									foreach($list as $list){	
								?>
								<tr class="gradeX">
										<td><?PHP echo $list->empname; ?></td>
										<td><?PHP echo date("d/m/Y", strtotime($list->paid_date)); ?></td>
                                        <td><?PHP echo $list->type; ?></td>
                                        <td><?PHP echo $list->amount; ?></td>
                                        <td><?PHP echo $list->deducted_amount; ?></td>
                                        <td><?php echo (int) $list->installment; ?></td>
                                        <td><?php echo $list->emi; ?></td>
                                        <td><?PHP echo $list->balance; ?></td>
										<td style="text-align: center;"><i class="icon-edit"></i><a href="<?php echo base_url('advance_entry/edit/'.$list->employee_loan_id); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>                                        
                                        <?php
                                            if($list->active_status == 0){
                                        ?>
										<td style="text-align: center;">
													Inactive
													<label class="switch" title="Mark as Active"> <input type="checkbox" onclick="if(confirm('Are you sure want to change the status?')){ window.location.assign('<?php echo base_url('advance_entry/status/'.$list->employee_loan_id.'/'.$list->active_status); ?>'); } else{ return false; }"> <span class="switch-slider round"></span> </label>
										</td> 
										<?php
                                            }
											else{
                                        ?>
										<td style="text-align: center;">
													Active
													<label class="switch" title="Mark as Inactive"> <input type="checkbox" checked="checked" onclick="if(confirm('Are you sure want to change the status?')){ window.location.assign('<?php echo base_url('advance_entry/status/'.$list->employee_loan_id.'/'.$list->active_status); ?>'); } else{ return false; }"> <span class="switch-slider round"></span> </label>
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