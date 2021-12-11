<?PHP
//print_r($state_view); exit;
?>
<style type="text/css">
    .wrapper-box {
    padding: 10px 15px;
    border: 1px solid #c0c0c0;
    width: 72%;
    display: block;
    margin: 0 auto;
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
                            <div class="col-md-12">
                                <div class="row pb-2">
                                    <div class="col-md-11">
                                        <h1 class="text-center">Add Profession Tax</h1>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('ptax'); ?>" class="cr-a">Back</a>  
                                        </div>
                                    </div>
                                </div>
                                <?php //echo validation_errors(); ?>
							<?php echo form_open( base_url( 'ptax/add_ptax' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
								<div class="wrapper-box">
                                									
								<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Select State <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9" onchange="details_list()" required>
														<?php 
															$attributes = array('class' => 'form-control form-control-sm', 'id' => 'state_id');
															$selected = (set_value('state_id')) ? set_value('state_id') : '';
															echo form_dropdown('state_id', $state, $selected, $attributes);
														?>
													</div>
													<?php echo form_error('state_id', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                </div>
								
								<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Effective Start Date <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
                                                          <input type="date" data-date-format="dd-mm-yyyy" class="form-control form-control-sm" id="" name="eff_start_date" value="<?php echo set_value('eff_start_date'); ?>" required>
                                                    </div>
													
                                                </div>
												<?php echo form_error('eff_start_date', '<span class="help-inline">', '</span>'); ?>
                                            </div>
                                </div>
									
                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Salary From <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
														<input class="form-control form-control-sm" type="text" name="salary_from" id="salary_from" placeholder="Salary From" value="<?php echo set_value('salary_from'); ?>" required>
														<?php echo form_error('salary_from', '<span class="help-inline">', '</span>'); ?>
													</div>
                                                </div>
                                            </div>
                                </div>
                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Salary To <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
														<input class="form-control form-control-sm" type="text" name="salary_to" id="salary_to" placeholder="Salary To" value="<?php echo set_value('salary_to'); ?>" required>
														<?php echo form_error('salary_to', '<span class="help-inline">', '</span>'); ?>

													</div>
                                                </div>
                                            </div>
                                </div> 
								<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Tax Amount <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
														<input class="form-control form-control-sm" type="text" name="tax_amount" id="tax_amount" placeholder="Tax Amount" value="<?php echo set_value('tax_amount'); ?>" required>
														<?php echo form_error('tax_amount', '<span class="help-inline">', '</span>'); ?>

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
						<div class="row">
                                    <div class="col-md-12">
                                        <table id="advance-entry-tb" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>State Name</th>
                                                    <th>Salary From</th>
                                                    <th>Salary To</th>
                                                    <th>Effective State Date</th>
                                                    <th>Tax Amount</th>
                                                </tr>
                                            </thead>
                                            <tbody id="ptax_list">
											
                                              
                                            </tbody>
                                        </table>
                                    </div>        
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
	  
<script>

$("#loginform").submit(function(event){
	var state_id  = $("#state_id").val();
	//alert(state_id);
	event.preventDefault();

		$.ajax({
		type: 'POST',		// data goto the server through POST method 
		url: '<?php echo base_url();?>ptax/add',
		data : new FormData(this),
		dataType: 'json',	// what type of data formate we will wante from the server
		contentType : false,
		processData	: false
	})
	.done(function(data){
		$("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
		//alert('ss');
		//alert(data.status);
        if(data.status){
			var msg = 'Data inserted sucssfully!';
			alert(msg);
			details_list();
			
			$("#salary_from").val('')
			$("#salary_to").val('')
			$("#tax_amount").val('')
		}
		
	})
		
		//loadLocationWiseDocs(client_id);
		
		//$(this).closest('form').trigger("reset");
})


		function details_list()
		{
			
		var state_id  = $("#state_id").val();
		//alert(state_id); 
		 $.ajax({
        type: 'POST',   
        url: '<?php echo base_url('ptax/ptax_list'); ?>',
        data: {state_id: state_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
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
					approver_1dd +='<td>' + value.state_name + '</td>';
					approver_1dd +='<td>' + value.salary_from + '</td>';
					approver_1dd +='<td>' + value.salary_to + '</td>';
					approver_1dd +='<td>' + value.eff_start_date + '</td>';
					approver_1dd +='<td>' + value.tax_amount + '</td>';
				approver_1dd +='</tr>';
            });
			$("#ptax_list").html(approver_1dd);
		}
		
	})
	
	
		}
</script>