<?PHP 
//print_r($list_proc); exit;
?>
<section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
				<?php echo form_open( base_url( 'payslip/Clielt_supp_hold_excel' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
                    <div class="row">
                        <div class="col-md-7">
                            <h1>Payslip</h1>
                        </div>
                        
                    </div>
					<div class="row">                       
                        <div class="col-md-3">
                             <div class="form-group row">
                                 <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm p-0">Month & Year  </label>  
                                    <div class="col-sm-8">
                                        <select class="form-control form-control-sm" id="month_id" name="month_id">
                                            <option value="">Select Month</option>
                                            <?php foreach ($months as $month) { ?>
                                            <option value="<?php echo $month->payment_month ?>"><?php echo date('M, Y', strtotime($month->payment_month)) ?></option>
                                            <?php } ?> 
                                        </select>
                                    </div>
                                </div>
                        </div>
						<div class="col-md-3">
							<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm p-0">Client Name</label>
								<div class="col-sm-8">									
									<select id="client_id" name="client_id" class="form-control form-control-sm">
                                        	
                                    </select>									
								</div>
							</div>
                        </div>
						
                        <div class="col-md-1">
                            <button type = "button" class="cr-a" style="padding: 6px 0px;" onclick="staff_search()">Search</button>
                        </div> 
						
                    </div>  
					</form>
					<?php echo form_open( base_url( 'payslip/update' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
                    <div class="wrapper-box">
					<div class="offset-md-11 col-md-1 mb-2">
                        </div> 
                        <div class="table-responsive">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        
                                        <th>Empl Code</th>
                                        <th>Empl Name</th>
                                        <th>Empl Desig</th>
                                        <th>Client Name</th>
                                        <th>Branch</th>
                                        <th>Bank Name</th>
                                        <th>A/C No</th>
                                        <th>IFSC Code</th>
                                        <th>Payment Days</th>										
                                        <th>Total Earning</th>
                                        <th>Total Deduction</th>
                                        <th>Payment Month</th>
                                        <th>Created By</th>
                                        <th>Created Date Time</th>
										<th>Action</th>
										
                                    </tr>
                                </thead>
                                <tbody id = "pay_list">
								
                                </tbody>
                             </table>
                            </div>
                        </div>
					</form>
                </div>
            </div>
          </div>
      </section>
	  
	  <script>
		$("#month_id").change(() => {
	        var month_id = $("#month_id").val();
			//alert(month_id);
	        populateclient(month_id);
		})
		
	function populateclient(month_id){
        //alert(month_id);
       var result='';
        //var csrfName = $('.PVS_ERP_csrf').attr('name');
		
		$.ajax({
			type: 'POST',   
			url: '<?php echo base_url('payslip/client'); ?>',
			data: {month_id: month_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
			dataType: 'json',
			encode: true,
		})
		//ajax response
		
		.done(function(data){
			$("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
			//alert(data.status);
			if(data.status){            
				result +='<option value="">Select Clirnt</option>';
				
				$.each(data.client,function(key,value){
					result +='<option value="'+value.client_id+'">'+value.client_name+'</option>';
				});
			}
			else{
				result +='<option value="">No Clirnt selected</option>';
			}
			$("#client_id").html(result);		
		})
		
		.fail(function(data){
			// show the any errors
			console.log(data);
		});
	}
		
		
		
	
	function staff_search(){
		var result='';
		
		var month_id = $("#month_id").val();
		var client_id = $("#client_id").val();
		var emp_id = $("#emp_id").val();
		//alert (month_id);
		
		$.ajax({
			type: 'POST',   
			url: '<?php echo base_url('payslip/search'); ?>',
			data: {month_id:month_id,client_id: client_id,emp_id:emp_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
			dataType: 'json',
			encode: true,
		})
		//ajax response
		
		.done(function(data){
			$("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
			//alert(data.status);
			if(data.status){  
			var count=0;
				
				$.each(data.list,function(key,value){
					
					result +='<tr class="gradeX">';
						count++;
						
						
						//alert(value.payroll_supp_id);
						result +='<input type="hidden" name = "count[]" id ="count_'+count+'" value="'+value.payroll_supp_id+'">';
						
						result +='<input type="hidden" name = "payroll_supp_id_'+count+'" id ="payroll_supp_id_'+count+'" value="'+value.payroll_supp_id+'">';
						
						result +='<td>'+value.employee_code+'</td>';
						result +='<td>'+value.emp_name+'</td>';
						result +='<td>'+value.desig_name+'</td>';
						result +='<td>'+value.client_name+'</td>';
						result +='<td>'+value.branch_name+'</td>';
						result +='<td>'+value.bank_name+'</td>';
						result +='<td>'+value.account_no+'</td>';
						result +='<td>'+value.ifsc_code+'</td>';
						result +='<td>'+value.phyatt+'</td>';
						result +='<td>'+value.total_earning+'</td>';
						result +='<td>'+value.total_deduction+'</td>';
						result +='<td>'+value.payment_month+'</td>';
						result +='<td>'+value.name+'</td>';
						result +='<td>'+value.created_ts+'</td>';
						result +='<td><a class="vd-ed-1" href="#"></a><a class="vd-ed-2" href="<?php echo base_url("payslip/payslip_view/' + value.payment_date + '/' + value.employee_id + '/' + value.client_id + '/' + value.payslip_temp_id + '/' + value.branch_id + '"); ?>">View</a></td>';
						
					result +='</tr>';
					
					//alert (value.employee_id);
					//result +='<option value="'+value.employee_id+'">'+value.emp_name+'</option>';
				});
			}
			else{
				result +='<option value="">No Clirnt selected</option>';
			}
			$("#pay_list").html(result);	
			
		})
		 
	}
	
	
	function not_selected_hold(count){
		//alert(count);
		//alert($('#hold_flag_'+count).is(":checked"));
		var unhold = 0;
		var hold = 1;
		
		if($('#hold_flag_'+count).is(":checked") == false)
		{	
			//alert($('remarks_'+count));
			document.getElementById('remarks_'+count).readOnly = true;

			
		}
		else{
			document.getElementById('remarks_'+count).readOnly = false;
			
		}
		
	}
	
	/*function form_submit_function(){
		
		
		//$("#save_all_btn").prop('disabled', true);
		sendData = $("#loginform").serializeArray();
		$.ajax({  
			url: '<?php echo base_url('payslip/all_list_submit'); ?>', 
			type: "POST",
			data : sendData,						
			dataType: 'json', // what type of data do we expect back from the server
			encode: true
		})
		.done(function(data) {
			console.log(data);
			if(data.status == "1"){
				alert("Permission Updated Successfully");
				ajax_user_permisstion_table();
				$("#save_all_btn").prop('disabled',false);
			}
			else{
				alert("Sorry Unable To Update");
			}
		})
		.fail(function(data){
			console.log(data);
		})
	}*/
	
	  </script>