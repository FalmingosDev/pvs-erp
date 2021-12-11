<?PHP
//print_r($state); exit;
?>
<style type="text/css">
    .table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border-top: none;
}
</style>

<style>
    .ui-datepicker-calendar {
        display: none;
    }
    </style>

<section class="main-wrapper">
          <div class="container">
            <div class="row">
                <div class="col-md-12">
                     
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-client" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="container">
                        <div class="row">
						<div class="col-md-11">
                                <h1 class="employee-box">Client Supp Attendance Update</h1>   
                            </div>
                            <div class="col-md-1">
                                <a class="cr-a" href="<?php echo base_url('client_supp_attendance/client/'); ?>" class="ad-btn-a-tag">Back</a>
                            </div>
                            <div class="col-md-12">
                                
                                <?php //echo validation_errors(); ?>

                                <?php if($this->session->flashdata('msg')): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="show_msg">
                                            <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                <?php endif; ?>
							<?php echo form_open('', array( 'id' => 'clientattendance', 'class' => 'form-horizontal' ) ); ?>
							<input type="hidden" name="client_supp_attendance_id" value="<?php echo $client_details->client_supp_attendance_id; ?>">
								<div class="wrapper-box">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Month & Year : </label>
                                                <div class="col-sm-9">
                                                    <input type="text" readonly="" name="month_year" class="form-control form-control-sm" value="<?php echo $client_details->MonthYear; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Client Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="client_name" class="form-control form-control-sm" readonly="" value="<?php echo $client_details->client_name; ?>">
                                                    </div>
                                                  </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Branch Name</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="branch_name" class="form-control form-control-sm" readonly="" value="<?php echo $client_details->branch_name; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                            
                                        </div>  
										<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm ">Employee Code & Name : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" name="employee_name" class="form-control form-control-sm" readonly="" value="<?php echo $client_details->employee_name; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                            
                                        </div>   
										<div class="row" style="border-bottom: 1px solid #000;margin-bottom: 20px;">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Designation : </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="desig_name" class="form-control form-control-sm" readonly="" value="<?php echo $client_details->desig_name; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">  
                                            
                                            <div class="col-md-3">
                                              
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm pr-0">Fathers Name : </label>
                                                    <div class="col-sm-7">
                                                        <p class="mb-0"><?php echo $client_details->father_name; ?></p>
                                                    </div>
                                                  </div>

                                                   <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm pr-0">Duty Hrs : </label>
                                                    <div class="col-sm-7">
                                                        <p class="mb-0"><?php echo $client_details->duty_hrs; ?></p>
                                                    </div>
                                                    
                                                  </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group row" style="border: 1px solid #000;">
                                                    <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm ">Calculation Days: </label>
                                                    <div class="col-sm-7">
                                                        <p class="mb-0 text-right"><?php echo $client_details->calculation_days; ?></p>
                                                    </div>
                                                  </div>                                               
                                            </div>
                                        </div>
                                    <div class="row mb-3">
										<div class="col-md-6" style="border: 1px solid #000;padding-top: 10px;">
											<div class="row">
												<div class="col-md-9">
													<div class="form-group row">
												<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Duty : </label>
												<div class="col-sm-10">
													<input type="text" class="form-control form-control-sm" name="duty" id="duty" value="<?php echo (set_value('duty')) ? set_value('duty') : $client_details->duty; ?>" onkeyup="totalAmt()">
												</div>
												<?php echo form_error('duty', '<span class="help-inline">', '</span>'); ?>
											  </div>
											<div class="form-group row">
												<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">W/o : </label>
												<div class="col-sm-10">
													<input type="text" class="form-control form-control-sm" name="w_o" id="w_o" value="<?php echo (set_value('w_o')) ? set_value('w_o') : $client_details->wo; ?>" onkeyup="totalAmt()">
												</div>
											  </div>
											<div class="form-group row">
												<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm pr-0">Leave : </label>
												<div class="col-sm-10">
													<input type="text" class="form-control form-control-sm" name="leave" id="leave" onkeyup="validationField()" value="<?php echo (set_value('leave')) ? set_value('leave') : $client_details->leave; ?>">
													<div class="row mt-2">
														<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">EL : </label>
														<div class="col-sm-10">
															<input type="text" class="form-control form-control-sm" name="el" id="el" onkeyup="validationField()" value="<?php echo (set_value('el')) ? set_value('el') : $client_details->el; ?>">
														</div>
													</div>
													<div class="row mt-2">
														<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">FL : </label>
														<div class="col-sm-10">
															<input type="text" class="form-control form-control-sm" name="fl" id="fl" onkeyup="validationField()" value="<?php echo (set_value('fl')) ? set_value('fl') : $client_details->fl; ?>">
														</div>
													</div>
													<div class="row mt-2">
														<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm pr-0">C/O : </label>
														<div class="col-sm-10">
															<input type="text" class="form-control form-control-sm" name="c_o" id="c_o" onkeyup="validationField()" value="<?php echo (set_value('c_o')) ? set_value('c_o') : $client_details->co; ?>">
														</div>
													</div>
												</div>
											  </div>
												   <div class="form-group row">
												<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Ph : </label>
												<div class="col-sm-10">
													<input type="text" class="form-control form-control-sm" name="ph" id="ph" onkeyup="totalAmt()" value="<?php echo (set_value('ph')) ? set_value('ph') : $client_details->ph; ?>">
												</div>
											  </div> 
												</div>
												<div class="col-md-3">
												<div class="form-group row">
												<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">&nbsp;</label>
												<div class="col-sm-8">
												  &nbsp; 
												</div>  
											  </div>
												<div class="form-group row">
												<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm"><b>&nbsp;</b></label>
												<div class="col-sm-8">
												  &nbsp; 
												</div>  
											  </div>
												<div class="form-group row">
												<label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"><b>&nbsp;</b></label>
												<div class="col-sm-8">
												  &nbsp; 
												</div>  
											  </div>
												<div class="form-group row">
												<label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"><b>&nbsp;</b></label>  
											  </div>
											<div class="form-group row">
												<label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"><b>Total</b></label> 
											  </div>
											<div class="form-group row">
												<div class="col-sm-12">
												  <p class="form-control form-control-sm" id="total"></p>
												</div>  
											  </div>
												</div>
											</div>
											
										</div>
										<!-- <div class="col-md-6">
											<div class="table-responsive">
												<table class="table" style="width: 100%;">
													<thead>
														<tr>
															<th></th>
															<th>Advance to recover</th>
															<th>Amt to Deduct</th>
															<th>Fix Deduction</th>
														</tr>
													</thead>
													<tbody>
														<tr> 
															<td>Advance</td>
															<td><p class="form-control form-control-sm mb-0" id="advance"><?php //echo $advance->balance; ?></p></td>
															<td><input class="form-control form-control-sm" type="text" name="advance_deduct" id="advance_deduct" value="<?php //echo (set_value('advance_deduct')) ? set_value('advance_deduct') : $client_details->advance_deduct; ?>"></td>
															<td><input class="form-control form-control-sm" type="text" name="advance_fix" id="advance_fix" readonly="" value="<?php //echo (set_value('advance_fix')) ? set_value('advance_fix') : $advance->emi; ?>"></td>
														</tr>
														<tr> 
															<td>Loan</td>
															<td><p class="form-control form-control-sm mb-0" id="advance_loan"><?php //echo $loan->balance; ?></p></td>
															<td><input class="form-control form-control-sm" type="text" name="loan_deduct" value="<?php //echo (set_value('loan_deduct')) ? set_value('loan_deduct') : $client_details->loan_deduct; ?>"></td>
															<td><input class="form-control form-control-sm" type="text" name="loan_fix" id="loan_fix" readonly="" value="<?php //echo (set_value('loan_fix')) ? set_value('loan_fix') : $loan->emi; ?>"></td>
														</tr>
														<tr>
															<td>Uniform</td>
															<td><p class="form-control form-control-sm mb-0" id="advance_uniform"></p></td>
															<td><input class="form-control form-control-sm" type="text" name="uniform_deduct" value="<?php //echo (set_value('uniform_deduct')) ? set_value('uniform_deduct') : $client_details->uniform_deduct; ?>"></td>
															<td><input class="form-control form-control-sm" type="text" name="uniform_fix" readonly=""></td>
														</tr>
														<tr>
															<td>Fine</td>
															<td><p class="form-control form-control-sm mb-0" id="advance_fine"></p></td>
															<td><input class="form-control form-control-sm" type="text" name="fine_deduct" value="<?php //echo (set_value('fine_deduct')) ? set_value('fine_deduct') : $client_details->fine_deduct; ?>"></td>
															<td><input class="form-control form-control-sm" type="text" name="fine_fix" readonly=""></td>
														</tr>
														<tr>
															<td>MISC</td>
															<td><p class="form-control form-control-sm mb-0" id="advance_misc"><?php //echo $misc->balance; ?></p></td>
															<td><input class="form-control form-control-sm" type="text" name="other_deduct" value="<?php //echo (set_value('other_deduct')) ? set_value('other_deduct') : $client_details->other_deduct; ?>"></td>
															<td><input class="form-control form-control-sm" type="text" name="other_fix" id="other_fix" readonly="" value="<?php //echo (set_value('other_fix')) ? set_value('other_fix') : $misc->emi; ?>"></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div> -->
									</div> 
                                    <div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Ot : </label>
												<div class="col-sm-10">
													<input type="text" class="form-control form-control-sm" name="ot" value="<?php echo (set_value('ot')) ? set_value('ot') : $client_details->ot; ?>">
												</div>
											  </div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp;</label>
												<div class="col-sm-9">
												  &nbsp;
												</div>
											  </div>
										</div>
									</div>
                                    <div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm pr-0">N/A Duty : </label>
												<div class="col-sm-10">
													<input type="text" class="form-control form-control-sm" name="na_duty" value="<?php echo (set_value('na_duty')) ? set_value('na_duty') : $client_details->na_duty; ?>">
												</div>
											  </div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp;</label>
												<div class="col-sm-9">
												  &nbsp;
												</div>
											  </div>
										</div>
									</div>
                                    <div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">NA : </label>
												<div class="col-sm-10">
													<input type="text" class="form-control form-control-sm" name="na" value="<?php echo (set_value('na')) ? set_value('na') : $client_details->na; ?>">
												</div>
											  </div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
												<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp;</label>
												<div class="col-sm-9">
												  &nbsp;
												</div>
											  </div>
										</div>
									</div>
                                    <!-- <div class="row">
                                        <div class="col-md-12 text-center">     
                                            <button type="submit" class="st-width-new" id="">Submit</button>
                                        </div>
                                    </div> -->
									<?php if($action_type == 'edit'){ ?>
                                    <div class="row">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-2 text-center">     
                                            <button type="submit" class="cr-a">Submit</button>
                                        </div>
                                        <div class="col-md-5"></div>
                                    </div>
									<?php } ?>
									
									<!-- APPROVAL -->
									<?php if($action_type == 'approve' && $approval->has_permission == 1){ ?>
										<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Remarks for Approve / Reject</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control form-control-sm" name="approval_remarks" id="approval_remarks"><?php echo (set_value('approval_remarks')) ? set_value('approval_remarks') : ''; ?></textarea>
														<?php echo form_error('approval_remarks', '<span class="help-inline">', '</span>'); ?>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp;</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-actions">
                                                            <button type="submit" name="action" value="A" class="btn btn-success">Approve</button>
                                                        </div>
                                                    </div>
                                                  </div>
                                            </div>
											<div class="col-md-3">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp;</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-actions">
                                                            <button type="submit" name="action" value="R" class="btn btn-danger">Reject</button>
                                                        </div>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
									<?php } ?>

									<!-- APPROVAL -->
									
                                    </form>
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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	  
<script>

    $(document).ready(function() {
        //totalAmt();
        validationField();
		
		<?php if($action_type == 'approve' || $mode == 'readonly'){ ?>
			applyReadOnlyMode('clientattendance');
			<?php if($approval->has_permission == 1){ ?>
				allowApproval();
			<?php } ?>
		<?php } ?>
    });
	
	function allowApproval(){
		$('#approval_remarks').removeAttr('readonly');
	}

    var duty_s = 0.00, w_o_s = 0.00, leave_s = 0.00, el_s = 0.00, fl_s = 0.00, c_o_s = 0.00, ph_s = 0.00, totalSum = 0; 

    function validationField()
    {

        let leave = $('#leave'), el = $('#el'), fl = $('#fl'), c_o = $('#c_o');

        if(leave.val() > '0.00')
        {
            //alert(leave.val());
            el.attr('disabled', true);
            fl.attr('disabled', true);
            c_o.attr('disabled', true);
        } 
        else if((el.val() > '0.00') || (fl.val() > '0.00') || (c_o.val() > '0.00')) 
        {
            //alert(1);
            leave.attr('disabled', true);
        }
        else 
        {
            leave.attr('disabled', false);
            el.attr('disabled', false);
            fl.attr('disabled', false);
            c_o.attr('disabled', false);
        }

        totalAmt();
    }

    function totalAmt() {
    duty_s = +($('#duty').val());
    w_o_s = +($('#w_o').val());
    leave_s = +($('#leave').val());
    el_s = +($('#el').val());
    fl_s = +($('#fl').val());
    c_o_s = +($('#c_o').val());
    ph_s = +($('#ph').val());

    totalSum = duty_s + w_o_s + leave_s + el_s + fl_s + c_o_s + ph_s;
    $('#total').html(totalSum);

}
 
</script>