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
                                        <h1 class="text-center">Advance/Loan/Others Entry</h1>
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
							<?php echo form_open( base_url( 'advance_entry/add' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
							<div class="wrapper-box">
                                    <form>
                                <div class="row">
                                    <div class="col-md-6">
										<div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Employee Name and Code : </label>
                                            <div class="col-md-7">
                                                <select id="employee_id" name="employee_id" class="form-control form-control-sm" onchange ="list()" required>
                                                    <option value="">Select Employee Name</option>
													<?php  
														foreach($employee as $employee) {  
                                                    ?>	
                                                    <option value="<?PHP echo $employee->employee_id;?>"><?PHP echo $employee->empname; ?></option>
													
													<?PHP
														}
													?>
													<?php echo form_error('employee_id', '<span class="help-inline">', '</span>'); ?>
                                                </select>
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
                                                <input name="start" id="start" class="form-control form-control-sm" required>
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
                                                <input name="end" id="end" class="form-control form-control-sm" required>
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
                                              <input type="radio" id="type" name="type" value="A" class="rd-radio" required>
                                              <label class="ad-p" for="adbance"><b>Advance</b></label><br>
                                              <input type="radio" id="type" name="type" value="L" class="rd-radio">
                                              <label class="ad-p" for="loan"><b>Loan</b></label><br>
                                              <input type="radio" id="type" name="type" value="T" class="rd-radio">
                                              <label for="tax"><b>Tax/TDS</b></label>
											  <input type="radio" id="type" name="type" value="O" class="rd-radio">
                                              <label class="ad-p" for="other"><b>Others</b></label>
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
                                                <input type="number"  name="amount" id="amount" class="form-control form-control-sm" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
										<div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">No.of Installment : </label>
                                            <div class="col-md-7">
                                                <input type="number" name="installment" id="installment"  onchange="inst_cal()" class="form-control form-control-sm" required> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
										<div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm pr-0">Installment/month : </label>
                                            <div class="col-md-7">
                                                <input type="number" name="emi" id="emi" onchange="emi_cal()" class="form-control form-control-sm" required> 
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="advance-entry-tb" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Paid Date</th>
                                                    <th>Type</th>
                                                    <th>Amount</th>
                                                    <th>Deducted till</th>
                                                    <th>Balance</th>
                                                </tr>
                                            </thead>
                                            <tbody id="loan_list">
											
                                              
                                            </tbody>
                                        </table>
                                    </div>        
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
	
	$('#start').datepicker({
    onSelect: function(dateText, inst){
        $('#end').datepicker('option', 'minDate', new Date(dateText));
    },
	});

	$('#end').datepicker({
		onSelect: function(dateText, inst){
			$('#start').datepicker('option', 'maxDate', new Date(dateText));
		}
	});


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
	
	function list(){
		var employee_id  = $("#employee_id").val();
		//alert(employee_id); 
		 $.ajax({
        type: 'POST',   
        url: '<?php echo base_url('advance_entry/employee_list'); ?>',
        data: {employee_id: employee_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
        dataType: 'json',
        encode: true,
    })
	.done(function(data){
        $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
		//alert(data.status);
        if(data.status){
			var approver_1dd ='';
			
			$.each(data.list,function(key,value){	
			//alert(value.employee_id);
				approver_1dd +='<tr>';
					approver_1dd +='<td>' + value.paid_date + '</td>';
					approver_1dd +='<td>' + value.type + '</td>';
					approver_1dd +='<td>' + value.amount + '</td>';
					approver_1dd +='<td>' + value.deducted_amount + '</td>';
					approver_1dd +='<td>' + value.balance + '</td>';
				approver_1dd +='</tr>';
            });
			$("#loan_list").html(approver_1dd);
		}
		
	})
	
	}
</script>