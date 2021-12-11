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
                <?php if($this->session->flashdata('success')): ?>
                        <div class="alert btn-success alert-dismissible fade show" role="alert" id="show_msg">
                                <strong><?php echo $this->session->flashdata('success'); ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        
                    <?php endif; ?>
                    <?php if($this->session->flashdata('error')): ?>
                        <div class="alert btn-danger alert-dismissible fade show" role="alert" id="show_msg">
                                <strong><?php echo $this->session->flashdata('error'); ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        
                    <?php endif; ?> 
                  
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-client" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row pb-2">
                                    <div class="col-md-7">
                                        <h1>ESI Organisation Traning</h1>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('esi_organisation'); ?>" class="ad-btn-a-tag">Back</a>  
                                        </div>
                                    </div>
                                </div>
                                <?php //echo validation_errors(); ?>
							<?php echo form_open( '', array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
								<div class="wrapper-box">
                                <form>									
																
								<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">ESI Organisation Name:</label>
                                                    <div class="col-sm-9">
                                                          <input type="text" class="form-control form-control-sm" placeholder="ESI Organisation Name" id="organisation_name" name="organisation_name" value="<?php echo set_value('organisation_name'); ?>">
                                                    </div>  
													
                                                </div>
												<?php echo form_error('organisation_name', '<span class="help-inline">', '</span>'); ?>
                                            </div>
                                </div>

                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">ESI Number:</label>
                                                    <div class="col-sm-9">
                                                          <input type="text" class="form-control form-control-sm" placeholder="ESI Number" id="organisation_number" name="organisation_number" value="<?php echo set_value('organisation_number'); ?>">
                                                    </div>
													
                                                </div>
												<?php echo form_error('organisation_number', '<span class="help-inline">', '</span>'); ?>
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