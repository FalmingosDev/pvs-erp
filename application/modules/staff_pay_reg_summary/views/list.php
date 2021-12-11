<?PHP 
//print_r($list_proc); exit;
?>
<section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
				<?php echo form_open( base_url( 'staff_pay_reg_summary/Staffpay_hold_excel' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center">Staff Pay Register Summary </h1>
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
						
						<div class="col-md-2">
						<button type = "button" class="cr-a" style="padding: 6px 0px;" onclick="search_staff_pay_summary()" >Search</button>
                        </div>
						<div class="col-md-2">
							<button type = "submit" class="cr-a" style="padding: 6px 0px;" >Download</button>
                        </div> 
                    </div> 
					
					</form>
					<?php echo form_open( base_url( 'payreg_report/update' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
                    <div class="">
                        
                        <div class="table-responsive tb-top">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
										<th>Employee Name</th>
                                        <th>Location</th>
                                        <th>Basic</th>
                                        <th>HRA</th>
                                        <th>CONV</th>
										<th>Otpay</th>
                                        <th>Gross</th>
                                        <th>ADV</th>
                                        <th>PF</th>										
                                        <th>ESI</th>
                                        <th>LWF</th>
                                        <th>PT</th>
                                        <th>Totded</th>
                                        <th>Net Pay</th>
										<th>Salmonth</th>
										
										
                                    </tr>
                                </thead>
                                <tbody id = "pay_list">
								
                                </tbody>
								<tfoot id = "pay_list_footer">

								</tfoot>
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
	        populatbranch(month_id);
		})
		
		function populatbranch(month_id)
		{
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


	function search_staff_pay_summary()
	{
		$('#example').dataTable().fnDestroy();
		var result='';
		var result1='';
		
		var month_id = $("#month_id").val();
		var branch_id = $("#branch_id").val();
		//alert (month_id);
		
		$.ajax({
			type: 'POST',   
			url: '<?php echo base_url('staff_pay_reg_summary/search'); ?>',
			data: {month_id:month_id,branch_id:branch_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
			dataType: 'json',
			encode: true,
		})
		//ajax response
		
		.done(function(data){
			$("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
			//alert(data.status);
			if(data.status){ 
				var total_basic=0;
				var total_hra=0;
				var total_conv=0;

				var total_otpay=0;
				var total_gross_sal=0;
				var total_adv=0;
				var total_pf=0;
				var total_esi=0;
				var total_lwf=0;
				var total_pt=0;
				var total_tot_dedt=0;
				var total_net_pay=0; 
			
				var count=0;
				$.each(data.list,function(key,value)
				{
					total_basic=total_basic*1+value.basic*1;
					total_hra=total_hra*1+value.hra*1;
					total_conv=total_conv*1+value.conv*1;
					total_otpay=total_otpay*1+value.otpay*1;
					total_gross_sal=total_gross_sal*1+value.gross_sal*1;
					total_adv=total_adv*1+value.adv*1;
					total_esi=total_esi*1+value.esi*1;
					total_adv=total_adv*1+value.lwf*1;
					total_pt=total_pt*1+value.pt*1;
					total_tot_dedt=total_tot_dedt*1+value.tot_dedt*1;
					total_net_pay=total_net_pay*1+value.net_pay*1;
					
					result +='<tr class="gradeX">';
					
						count++;
				
						result +='<td>'+value.emp_name+'</td>';
						
						result +='<td>'+value.location+'</td>';
						result +='<td>'+value.basic+'</td>';
						result +='<td>'+value.hra+'</td>';
						result +='<td>'+value.conv+'</td>';
						result +='<td>'+value.otpay+'</td>';
						result +='<td>'+value.gross_sal+'</td>';
						result +='<td>'+value.adv+'</td>';
						
						result +='<td>'+value.pf+'</td>';
						result +='<td>'+value.esi+'</td>';
						result +='<td>'+value.lwf+'</td>';
						result +='<td>'+value.pt+'</td>';
						result +='<td>'+value.tot_dedt+'</td>';
						result +='<td>'+value.net_pay+'</td>';
						result +='<td>'+value.salmonth+'</td>';
						
						
						
					
					result +='</tr>';
				});

				if(count!=0)
				{
					
					result1 +='<tr class="gradeX">';
						result1 +='<td>'+'Total'+'</td>';
						result1 +='<th>'+''+'</th>';
						
						result1 +='<th>'+parseFloat(total_basic).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_hra).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_conv).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_otpay).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_gross_sal).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_adv).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_pf).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_esi).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_lwf).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_pt).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_tot_dedt).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_net_pay).toFixed(2)+'</th>';
						
						result1 +='<th>'+''+'</th>';
					result1 +='</tr>';
		
				}

				
			}
			else
			{
				result +='<option value="">No Emp selected</option>';
			}
			$("#pay_list").html(result);
			$("#pay_list_footer").html(result1);
			$('#example').DataTable();	
			
		})
		 
	}
	

	
	
	  </script>