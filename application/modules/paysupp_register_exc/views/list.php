<?PHP 
//print_r($list_proc); exit;
?>
<section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
				<?php echo form_open( base_url( 'paysupp_register_exc/Clielt_supp_hold_excel' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center">Client Pay Supplimentary Register excel Download </h1>
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
                    </div> 
						 <div class="offset-md-5 col-md-2">
                            <!--<a href ="<?php //echo base_url('paysupp_hold/Clielt_hold_excel'); ?>"   class="cr-a" style="padding: 6px 0px;" >Download</a>-->
							<button type = "submit" class="cr-a" style="padding: 6px 0px;" >Download</button>
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
				result +='<option value="">Select Client</option>';
				
				$.each(data.client,function(key,value){
					result +='<option value="'+value.client_id+'">'+value.client_name+'</option>';
				});
			}
			else{
				result +='<option value="">No Client selected</option>';
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
	
	
	  </script>