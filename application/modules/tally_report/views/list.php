<?PHP 
//print_r($list_proc); exit;
?>
<section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
				<?php echo form_open( base_url( 'tally_report/Tally_excel' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
                    <div class="row">
                        <div class="col-md-7">
                            <h1>Tally Report Excel Download</h1>
                        </div>
                        
                    </div>
					<div class="row">                       
                        <div class="col-md-3">
                             <div class="form-group row">
                                 <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm p-0">Month & Year  </label>  
                                    <div class="col-sm-8">
                                        <select class="form-control form-control-sm" id="month_id" name="month_id"  >
                                            <option value="">Select Month</option>
                                            <?php foreach ($months as $month) { ?>
                                            <option  value="<?php echo $month->payment_month ?>"><?php echo date('M, Y', strtotime($month->payment_month)) ?></option>
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
						<div class="offset-md-1 col-md-1">
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
	        populateclient(month_id);
		})
		
	function populateclient(month_id){
        //alert(month_id);
       var result='';
        //var csrfName = $('.PVS_ERP_csrf').attr('name');
		
		$.ajax({
			type: 'POST',   
			url: '<?php echo base_url('tally_report/client'); ?>',
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
		
	  </script>