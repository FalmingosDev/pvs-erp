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
                                        <h1 class="text-center">Add Qualification</h1>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('qualification'); ?>" class="cr-a">Back</a>  
                                        </div>
                                    </div>
                                </div>
                                <?php //echo validation_errors(); ?>
							<?php echo form_open( base_url( 'qualification/add_quali' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
								<div class="wrapper-box">
                                <form>									
																
								<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Qualification Name <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
                                                          <input type="text" class="form-control form-control-sm" placeholder="Qualification Name" id="qualification_name" name="qualification_name" value="<?php echo set_value('qualification_name'); ?>">
                                                    </div>
													
                                                </div>
												<?php echo form_error('qualification_name', '<span class="help-inline">', '</span>'); ?>
                                            </div>
                                </div>
									
                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">Qualification Short Name <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
														<input class="form-control form-control-sm" type="text" name="qualification_short_name" id="qualification_short_name" placeholder="Qualification Short Name" value="<?php echo set_value('qualification_short_name'); ?>">
														<?php echo form_error('qualification_short_name', '<span class="help-inline">', '</span>'); ?>
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