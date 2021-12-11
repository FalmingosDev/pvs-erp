<?PHP 
//print_r($list_proc); exit;
?>
<section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
				<?php echo form_open( base_url( 'client_pay_reg_summary/Clielt_hold_excel' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="text-center">Client Pay Register Summary </h1>
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
						 
						<div class="col-md-1">
						<button type = "button" class="cr-a" style="padding: 6px 0px;" onclick="search_client_pay_summary()" >Search</button>
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
										<th>Client Name</th>
                                        <!-- <th>Unit Code</th> -->
                                        <th>Unit Name</th>
                                        <!-- <th>Location</th> -->
                                        <th>Zone</th>
                                        <th>Basic</th>
                                        <th>VDA</th>
                                        <th>HRA</th>
                                        <th>CONV</th>
                                        <th>SUVP</th>										
                                        <th>GUN</th>
                                        <th>SPL</th>
                                        <th>Unifrm</th>
                                        <th>Wash</th>
                                        <th>Bonus</th>
										<th>NH</th>
										<th>leave</th>
										<th>NA</th>
										<th>Otpay</th>
                                        <th>Gross</th>
                                        <th>ADV</th>
                                        <th>PF</th>										
                                        <th>ESI</th>
                                        <th>LWF</th>
                                        <th>P tax</th>
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
	        populateclient(month_id);
		})
		
	function populateclient(month_id)
	{
        //alert(month_id);
       var result='';
        //var csrfName = $('.PVS_ERP_csrf').attr('name');
		
		$.ajax({
			type: 'POST',   
			url: '<?php echo base_url('payreg_report/client'); ?>',
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
		
	function populatbranch(client_id)
	{
        //alert(client_id);
       var result='';
        //var csrfName = $('.PVS_ERP_csrf').attr('name');
		
		$.ajax({
			type: 'POST',   
			url: '<?php echo base_url('payreg_report/branch'); ?>',
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
	
	function search_client_pay_summary()
	{
		$('#example').dataTable().fnDestroy();
		var result='';
		var result1='';
		
		var month_id = $("#month_id").val();
		var client_id = $("#client_id").val();
		var branch_id = $("#branch_id").val();
		//alert (month_id);
		
		$.ajax({
			type: 'POST',   
			url: '<?php echo base_url('client_pay_reg_summary/search'); ?>',
			data: {month_id:month_id,client_id: client_id,branch_id:branch_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
			dataType: 'json',
			encode: true,
		})
		//ajax response
		
		.done(function(data){
			$("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
			//alert(data.status);
			if(data.status){ 

			var total_basic=0;
			var total_vda=0;
			var total_hra=0;
			var total_conv=0;
			var total_supv=0;
			var total_gun=0;
			var total_spl=0;
			var total_uniform=0;
			var total_wash=0;
			var total_bonus=0;
			var total_nh=0;
			var total_leave=0;
			var total_na=0;
			var total_otpay=0;
			var total_gross=0;
			var total_adv=0;
			var total_pf=0;
			var total_esi_amt=0;
			var total_lwf=0;
			var total_ptax=0;
			var total_total_deduction=0;
			var total_netpay=0; 
			var count=0;
				
				$.each(data.list,function(key,value)
				{

					total_basic=total_basic*1+value.basic*1;
					total_vda=total_vda*1+value.vda*1;
					total_hra=total_hra*1+value.hra*1;
					total_conv=total_conv*1+value.conv*1;
					total_supv=total_supv*1+value.supv*1;
					total_gun=total_gun*1+value.gun*1;
					total_spl=total_spl*1+value.spl*1;
					total_uniform=total_uniform*1+value.uniform*1;
					total_wash=total_wash*1+value.wash*1;
					total_bonus=total_bonus*1+value.bonus*1;
					total_nh=total_nh*1+value.nh*1;
					total_leave=total_leave*1+value.leave*1;
					total_na=total_na*1+value.na*1;
					total_otpay=total_otpay*1+value.otpay*1;
					total_gross=total_gross*1+value.gross*1;
					total_adv=total_adv*1+value.adv*1;
					total_pf=total_pf*1+value.pf*1;
					total_esi_amt=total_esi_amt*1+value.esi_amt*1;
					total_lwf=total_lwf*1+value.lwf*1;
					total_ptax=total_ptax*1+value.ptax*1;
					total_total_deduction=total_total_deduction*1+value.total_deduction*1;
					total_netpay=total_netpay*1+value.netpay*1;
					result +='<tr class="gradeX">';
					
						count++;
				
						result +='<td>'+value.client_name+'</td>';
						// result +='<td>'+value.branch_id+'</td>';
						result +='<td>'+value.branch_name+'</td>';
						//result +='<td>'+value.address+'</td>';
						result +='<td>'+value.zone+'</td>';
						result +='<td>'+parseFloat(value.basic).toFixed(2)+'</td>';
						result +='<td>'+parseFloat(value.vda).toFixed(2)+'</td>';
						result +='<td>'+parseFloat(value.hra).toFixed(2)+'</td>';
						result +='<td>'+parseFloat(value.conv).toFixed(2)+'</td>';
						result +='<td>'+parseFloat(value.supv).toFixed(2)+'</td>';
						result +='<td>'+parseFloat(value.gun).toFixed(2)+'</td>';
						result +='<td>'+parseFloat(value.spl).toFixed(2)+'</td>';
						result +='<td>'+parseFloat(value.uniform).toFixed(2)+'</td>';
						result +='<td>'+parseFloat(value.wash).toFixed(2)+'</td>';
						result +='<td>'+parseFloat(value.bonus).toFixed(2)+'</td>';
						result +='<td>'+parseFloat(value.nh).toFixed(2)+'</td>';
						result +='<td>'+parseFloat(value.leave).toFixed(2)+'</td>';
						result +='<td>'+parseFloat(value.na).toFixed(2)+'</td>';
						result +='<td>'+parseFloat(value.otpay).toFixed(2)+'</td>';
						result +='<td>'+parseFloat(value.gross).toFixed(2)+'</td>';
						result +='<td>'+parseFloat(value.adv).toFixed(2)+'</td>';
						result +='<td>'+parseFloat(value.pf).toFixed(2)+'</td>';
						result +='<td>'+parseFloat(value.esi_amt).toFixed(2)+'</td>';
						result +='<td>'+parseFloat(value.lwf).toFixed(2)+'</td>';
						result +='<td>'+parseFloat(value.ptax).toFixed(2)+'</td>';
						result +='<td>'+parseFloat(value.total_deduction).toFixed(2)+'</td>';
						result +='<td>'+parseFloat(value.netpay).toFixed(2)+'</td>';
						result +='<td>'+value.payment_month+'</td>';
						
						
					
					result +='</tr>';
				});

				if(count!=0)
				{
					
					result1 +='<tr class="gradeX">';
					result1 +='<td>'+'Total'+'</td>';
						// result +='<td>'+value.branch_id+'</td>';
						result1 +='<th>'+''+'</th>';
						//result1 +='<th>'+''+'</th>';
						result1 +='<th>'+''+'</th>';
						result1 +='<th>'+parseFloat(total_basic).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_vda).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_hra).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_conv).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_supv).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_gun).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_spl).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_uniform).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_wash).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_bonus).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_nh).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_leave).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_na).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_otpay).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_gross).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_adv).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_pf).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_esi_amt).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_lwf).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_ptax).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_total_deduction).toFixed(2)+'</th>';
						result1 +='<th>'+parseFloat(total_netpay).toFixed(2)+'</th>';
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

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );


</script>

