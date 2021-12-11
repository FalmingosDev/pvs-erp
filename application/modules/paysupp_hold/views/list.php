<?PHP 
//print_r($list_proc); exit;
?>
<section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
				<?php echo form_open( base_url( 'paysupp_hold/Clielt_supp_hold_excel' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
                    <div class="row">
                        <div class="col-md-7">
                            <h1>Client Supp Salary Hold</h1>
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
						<div class="col-md-3">
							<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm p-0">Branch Name</label>
								<div class="col-sm-8">									
									<select id="branch_id" name="branch_id" class="form-control form-control-sm">
                                        	
                                    </select>									
								</div>
							</div>
                        </div>
						<div class="col-md-3">
							<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm p-0">Emp Name</label>
								<div class="col-sm-8">									
									<select id="emp_id" name="emp_id" class="form-control form-control-sm">  
                                        	
                                    </select>									
								</div>
							</div>
                        </div>
						<!--<div class="col-md-3">
							<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm p-0">Branch Name</label>
								<div class="col-sm-8">									
									<select id="branch_id" name="branch_id" class="form-control form-control-sm">
                                        	
                                    </select>									
								</div>
							</div>  
                        </div>-->
                    </div> 
                    <div class="offset-md-5 col-md-2">
                        <button type = "button" class="cr-a" style="padding: 6px 0px;" onclick="staff_search()">Search</button>
                    </div>
                    <div class="row">
                        <!--<div class="offset-md-10 col-md-1">
                            <button type = "button" class="cr-a" style="padding: 6px 0px;" onclick="staff_search()">Search</button>
                        </div>--> 
				        <div class="col-md-1 pl-0">
                            <!--<a href ="<?php //echo base_url('paysupp_hold/Clielt_hold_excel'); ?>"   class="cr-a" style="padding: 6px 0px;" >Download</a>-->
							<button type = "submit" class="cr-a" style="padding: 6px 0px;" >Download</button>
                        </div>  
                    </div>
					</form>
					<?php echo form_open( base_url( 'paysupp_hold/update' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
                    <div class="">
                        <div class="row">
                            <div class="offset-md-11 col-md-1 mb-2">
                                <button  class="cr-a sv-top" style="padding: 6px 0px;" >Save</button>
                            </div>
                        </div>
                        <div class="table-responsive tb-top">
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
										<th>Hold / Unhold</th>
										<th>Comments</th>
										
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
			url: '<?php echo base_url('paysupp_hold/client'); ?>',
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
		
		$("#client_id").change(() => {
	        var client_id = $("#client_id").val();
	        //var branch_id = $("#branch_id").val();
			//alert(client_id);
	        //populateemp(client_id);
	        populatbranch(client_id);
		})
		
		function populatbranch(client_id){
        //alert(client_id);
       var result='';
        //var csrfName = $('.PVS_ERP_csrf').attr('name');
		
		$.ajax({
			type: 'POST',   
			url: '<?php echo base_url('paysupp_hold/branch'); ?>',
			data: {client_id: client_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
			dataType: 'json',
			encode: true,
		})
		//ajax response
		
		.done(function(data){
			$("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
			//alert(data.status);
			if(data.status){            
				result +='<option value="">Select Branch</option>';
				
				$.each(data.branch,function(key,value){
					result +='<option value="'+value.branch_id+'">'+value.branch_name+'</option>';
				});
			}
			else{
				result +='<option value="">No Branch selected</option>';
			}
			$("#branch_id").html(result);		
		})
		
		.fail(function(data){
			// show the any errors
			console.log(data);
		});
	}
	
	$("#branch_id").change(() => {
	        var client_id = $("#client_id").val();
	        var branch_id = $("#branch_id").val();
			//alert(client_id);
	        populateemp(client_id,branch_id);
		})
	
		function populateemp(client_id,branch_id){
        //alert(client_id);
        //alert(branch_id);
       var result='';
        //var csrfName = $('.PVS_ERP_csrf').attr('name');
		
		$.ajax({
			type: 'POST',   
			url: '<?php echo base_url('paysupp_hold/emp_list'); ?>',
			data: {client_id: client_id,branch_id: branch_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
			dataType: 'json',
			encode: true,
		})
		//ajax response
		
		.done(function(data){
			$("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
			//alert(data.status);
			if(data.status){            
				result +='<option value="">Select Emp</option>';
				
				$.each(data.emp,function(key,value){
					result +='<option value="'+value.employee_id+'">'+value.emp_name+'</option>';
				});
			}
			else{
				result +='<option value="">No Client selected</option>';
			}
			$("#emp_id").html(result);		
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
		
		var branch_id = $("#branch_id").val();
		//alert (month_id);
		
		$.ajax({
			type: 'POST',   
			url: '<?php echo base_url('paysupp_hold/search'); ?>',
			data: {month_id:month_id,client_id: client_id,emp_id:emp_id,branch_id:branch_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
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
					if(value.tid == null){
						alert(value.tid);
					result +='<tr class="gradeX">';
						count++;
						
						var hold_flag= "";
						
						if(value.hold_flag=="1")
						{
							hold_flag="checked";
							
							
						};
						
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
						result +='<td class="text-center"><input type="checkbox" id="hold_flag_'+count+'"  name="hold_flag_'+count+'"  value="1" '+hold_flag+' onchange="not_selected_hold('+count+')"></td>';
						result +='<td><input type="text" value ="'+value.remarks+'" id="remarks_'+count+'"  name="remarks_'+count+'" ></td>';
					}
					result +='</tr>';
					if(value.hold_flag=="0"){
						//document.getElementById('remarks_'+count).readOnly = true;
					}
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
	
	
	
	  </script>