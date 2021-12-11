<?PHP
//print_r($state); exit;
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
                                        <h1 class="text-center">Add PVS Branch</h1>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('companybranch'); ?>" class="cr-a">Back</a>  
                                        </div>
                                    </div>
                                </div>
                                <?php //echo validation_errors(); ?>
							<?php echo form_open( base_url( 'companybranch/add_cbranch' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
								<div class="wrapper-box">
                                <form>									
								
								
								<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Branch Name <span class="help-inline">*</span> :</label>
                                                    <div class="col-sm-9">
                                                          <input type="text" class="form-control form-control-sm" placeholder="Branch Name" id="branch_name" name="branch_name" value="<?php echo set_value('branch_name'); ?>">
                                                    </div>
													
                                                </div>
												<?php echo form_error('branch_name', '<span class="help-inline">', '</span>'); ?>
                                            </div>
                                </div>
									
                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Branch Short Name <span class="help-inline">*</span> :</label>
                                                    <div class="col-sm-9">
														<input class="form-control form-control-sm" type="text" name="branch_short_name" id="branch_short_name" placeholder="Branch Short Name" value="<?php echo set_value('branch_short_name'); ?>">
														<?php echo form_error('branch_short_name', '<span class="help-inline">', '</span>'); ?>
													</div>
                                                </div>
                                            </div>
                                </div>
                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Address 1 <span class="help-inline">*</span> :</label>
                                                    <div class="col-sm-9">
														<input class="form-control form-control-sm" type="text" name="address_1" id="address_1" placeholder="Address 1" value="<?php echo set_value('address_1'); ?>">
														<?php echo form_error('address_1', '<span class="help-inline">', '</span>'); ?>

													</div>
                                                </div>
                                            </div>
                                </div>

								<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Address 2 :</label>
                                                    <div class="col-sm-9">
														<input class="form-control form-control-sm" type="text" name="address_2" id="address_2" placeholder="Address 2" value="<?php echo set_value('address_2'); ?>">
														<?php echo form_error('address_2', '<span class="help-inline">', '</span>'); ?>

													</div>
                                                </div>
                                            </div>
                                </div>

								<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Address 3 :</label>
                                                    <div class="col-sm-9">
														<input class="form-control form-control-sm" type="text" name="address_3" id="address_3" placeholder="Address 3" value="<?php echo set_value('address_3'); ?>">
														<?php echo form_error('address_3', '<span class="help-inline">', '</span>'); ?>

													</div>
                                                </div>
                                            </div>
                                </div>
								<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Select State <span class="help-inline">*</span> :</label>
                                                    <div class="col-sm-9">
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
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">City <span class="help-inline">*</span> :</label>
														<div class="col-sm-9">
														 <?php 
																$attributes = array('class' => 'form-control form-control-sm', 'id' => 'city_id');
																$selected = (set_value('city_id')) ? set_value('city_id') : '';
																echo form_dropdown('city_id', $city, $selected, $attributes);
															?>
														</div>
														<?php echo form_error('city_id', '<span class="help-inline">', '</span>'); ?>
													  </div>
									</div>
								</div>
								
								<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Pin <span class="help-inline">*</span> :</label>
                                                    <div class="col-sm-9">
														<input class="form-control form-control-sm" type="text" name="pin" id="pin" placeholder="Pin" value="<?php echo set_value('pin'); ?>">
														<?php echo form_error('pin', '<span class="help-inline">', '</span>'); ?>

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
	  
<script>
		$("#state_id").change(() => {
	        var state_id = $("#state_id").val();
	        populatecity(state_id);
    	})

    function populatecity(state_id){
        //alert(state_id);
       var result='';
        //var csrfName = $('.PVS_ERP_csrf').attr('name');

    $.ajax({
        type: 'POST',   
        url: '<?php echo base_url('client/city_list'); ?>',
        data: {state_id: state_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
        dataType: 'json',
        encode: true,
    })
    //ajax response
    .done(function(data){
        $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
        if(data.status){            
            result +='<option value="">Select City</option>';

            $.each(data.city_list,function(key,value){
            	//value(value.city_name);
                result +='<option value="'+value.city_id+'">'+value.city_name+'</option>';
            });
        }
        else{
            result +='<option value="">No city selected</option>';
        }
        $("#city_id").html(result);
       // $("#city_id").selectpicker("refresh");
    
    })
    
    .fail(function(data){
        // show the any errors
        console.log(data);
    });
}
</script>