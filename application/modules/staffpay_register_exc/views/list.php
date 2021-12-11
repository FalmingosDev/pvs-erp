<?PHP 
//print_r($list_proc); exit;
?>
<section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
				<?php echo form_open( base_url( 'staffpay_register_exc/Staffpay_hold_excel' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center">Staff Payroll Register Excel Download </h1>
                        </div>
                        
                    </div>
					<div class="row">                       
                        <div class="col-md-4">
                             <div class="form-group row">
                                 <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm p-0">Month & Year  </label>  
                                    <div class="col-sm-8">
                                        <select class="form-control form-control-sm" id="month_id" name="month_id" required >
                                            <option value="">Select Month</option>
                                            <?php foreach ($months as $month) { ?>
                                            <option  value="<?php echo $month->payment_month ?>"><?php echo date('M, Y', strtotime($month->payment_month)) ?></option>
                                            <?php } ?> 
                                        </select>
                                    </div>
                                </div>
                        </div>
						
						<div class="col-md-4">
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
						<div class="col-md-1">
							<button type = "submit" class="cr-a" style="padding: 6px 0px;" >Download</button>
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
	        populatbranch(month_id);
		})
		
		function populatbranch(month_id){
        //alert(branch_id);
       var result='';
        //var csrfName = $('.PVS_ERP_csrf').attr('name');
		
		$.ajax({
			type: 'POST',   
			url: '<?php echo base_url('staffpay_hold/branch'); ?>',
			data: {month_id: month_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
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
					result +='<option value="'+value.company_branch_id+'">'+value.branch_name+'</option>';
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
	        var branch_id = $("#branch_id").val();
			//alert(client_id);
	        populateemp(branch_id);
		})
		
		function populateemp(branch_id){
        //alert(client_id);
       var result='';
        //var csrfName = $('.PVS_ERP_csrf').attr('name');
		
		$.ajax({
			type: 'POST',   
			url: '<?php echo base_url('staffpay_hold/emp'); ?>',
			data: {branch_id: branch_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
			dataType: 'json',
			encode: true,
		})
		//ajax response
		
		.done(function(data){
			$("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
			//alert(data.status);
			if(data.status){            
				result +='<option value="">Select Clirnt</option>';
				
				$.each(data.emp,function(key,value){
					result +='<option value="'+value.employee_id+'">'+value.emp_name+'</option>';
				});
			}
			else{
				result +='<option value="">No Clirnt selected</option>';
			}
			$("#emp_id").html(result);		
		})
		
		.fail(function(data){
			// show the any errors
			console.log(data);
		});
	}
	
	
	  </script>