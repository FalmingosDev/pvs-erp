<?PHP 
//print_r($employee); exit;
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
                                    <div class="col-md-11">
                                        <h1 class="text-center">Advance/Loan/Others Edit</h1>
                                    </div>
									
                                    <div class="col-md-1">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('advance_entry'); ?>" class="cr-a">Back</a>  
                                        </div>
                                    </div>
									<?php if($this->session->flashdata('msg')): ?>
                                    <div class="alert btn-danger alert-dismissible fade show" role="alert" id="show_msg">
                                            <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    
                                    <?php endif; ?>
                                </div>
                                <?php echo validation_errors(); ?>
							<?php echo form_open('', array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
							
							<input type="hidden" name="id" value="<?php echo $edit_list->employee_loan_id; ?>">
							
							<div class="wrapper-box">
                                    <form>
                                <div class="row">
                                    <div class="col-md-6">
										<div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Employee Name and Code : </label>
											
                                            <div class="col-md-7">
												<input name="start" id="start" class="form-control form-control-sm" value ="<?php echo $edit_list->empname; ?>" readOnly>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
										<div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">&nbsp; </label>
                                            <div class="col-md-7">
                                                &nbsp; 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
										<div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Paid Date : </label>
                                            <div class="col-md-7">
                                                <input name="start" id="start" class="form-control form-control-sm" value ="<?php echo date("d/m/Y", strtotime($edit_list->paid_date))?>" readOnly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
										<div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">&nbsp; </label>
                                            <div class="col-md-7">
                                                &nbsp; 
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row">
                                    <div class="col-md-6">
										<div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Start Date of Deduction : </label>
                                            <div class="col-md-7">
                                                <input name="start" id="start" class="form-control form-control-sm" value ="<?php echo date("d/m/Y", strtotime($edit_list->deduction_date))?>" readOnly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
										<div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">&nbsp; </label>
                                            <div class="col-md-7">
                                                &nbsp; 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
										<div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Type : </label>
                                            <div class="col-md-7">
                                                <input name="start" id="start" class="form-control form-control-sm" value ="<?php echo $edit_list->type ;?>" readOnly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
										<div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">&nbsp; </label>
                                            <div class="col-md-7">
                                                &nbsp; 
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row">
                                    <div class="col-md-6">
										<div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Remarks : </label>
                                            <div class="col-md-7">
                                                <input name="remarks" id="remarks" class="form-control form-control-sm" value ="<?php echo $edit_list->remarks ;?>" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
										<div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">&nbsp; </label>
                                            <div class="col-md-7">
                                                &nbsp; 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-4">
										<div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Amount : </label>
                                            <div class="col-md-7">
                                                <input type="number"  name="amount" id="amount" class="form-control form-control-sm" value ="<?php echo $edit_list->amount ;?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
										<div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">No.of Installment : </label>
                                            <div class="col-md-7">
                                                <input type="number" name="installment" id="installment"  onchange="inst_cal()" class="form-control form-control-sm" value ="<?php echo $edit_list->installment ;?>" required> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
										<div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm pr-0">Installment/month : </label>
                                            <div class="col-md-7">
                                                <input type="number" name="emi" id="emi" onchange="emi_cal()" class="form-control form-control-sm" value ="<?php echo $edit_list->emi ;?>" required> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<div class="row">
                                    <div class="col-md-5"></div>
                                        <div class="col-md-2">                                             
                                          <button type="submit" class="cr-a">Save</button>
                                         </div>
                                    <div class="col-md-5"></div>
								</div>
                                
                                
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
<!--<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<script>
    $(document).ready(function() {
        $('#advance-entry-tb').DataTable();
    } );
	
	

	function inst_cal(){
		document.getElementById("emi").readOnly = true;
		var amount  = $("#amount").val();
		var installment = $("#installment").val();
		var emi = (amount *1) / (installment *1);
		
		$("#emi").val(emi);
		
	}
	function emi_cal(){
		document.getElementById("installment").readOnly = true;
		var amount  = $("#amount").val();
		var emi = $("#emi").val();
		var installment = (amount *1) / (emi *1);
		
		$("#installment").val(Math.ceil(installment));
	}
	
	
</script>