<?PHP
/*foreach($client as $client) {
print_r($client->client_id); exit;
}*/
//print_r ($editclient->employee_id); exit;
?>
<style type="text/css">
    
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
                                    <div class="col-md-10">
                                        <h1 class="text-center">Edit Holiday </h1> 
                                    </div>
                                    <div class="col-md-2">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('holiday'); ?>" class="cr-a">Holiday List </a>  
                                        </div>
										<?php if($this->session->flashdata('msg')): ?>
                                    <div class="alert btn-danger alert-dismissible fade show" role="alert" id="show_msg" align= "left";>
                                            <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    
                                    <?php endif; ?>
                                    </div>
                                </div>
							<?php echo form_open('', array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
								<div class="wrapper-box">
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Year <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
													<input class="form-control form-control-sm" type="text" name="" id="" placeholder="Year" value="<?php echo $editdate->year; ?>" readonly>
                                                       
									<?php echo form_error('holiday_id', '<span class="help-inline">', '</span>'); ?>	
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp;</label>
                                                    <div class="col-sm-9">
                                                      &nbsp;
                                                    </div>
                                                  </div>
                                            </div>
                                        </div> 

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">State <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
													<input class="form-control form-control-sm" type="text" name="" id="" placeholder="State" value="<?php echo $editdate->state_name; ?>" readonly>
                                                       
									<?php echo form_error('state_id', '<span class="help-inline">', '</span>'); ?>	
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp;</label>
                                                    <div class="col-sm-9">
                                                      &nbsp;
                                                    </div>
                                                  </div>
                                            </div>
                                            
                                        </div>
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm ">Event Date <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-8">
													
                                                        <input type="date" name="event_date" id="event_date" class="form-control form-control-sm" value="<?php echo $editdate->event_date; ?>" >
														<?php echo form_error('event_date', '<span class="help-inline">', '</span>'); ?>
														
													
                                                    </div>
                                                  </div>
                                            </div>
                                        <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Event Name <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-8">
                                                       <input type="text" class="form-control form-control-sm" name="event_name" id="event_name" placeholder="Event name" value="<?php echo $editdate->event_name; ?>" />
                                                    </div>
													<?php echo form_error('event_name', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div> 
                                        <div class="row">
                                        <div class="col-md-5">
                                                

                                        </div>
                                            
                                </div>
                                        <div id="resource_rows">
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5"></div>
                                                <div class="col-md-2">                                             
                                                  <button type="submit" class="cr-a">Save</button>
                                                </div>
                                            <div class="col-md-5"></div>
                                        </div>
                                            </form>
									<?php //} ?>
                        </div>
                      </div>
                    </div>
                   
                  </div>
                
                </div>  
            </div>
          </div>
        
      </section>
	  
<script>
	// $(document).ready(function() {
	// addresource();	
	// } );
	
	
var resource = ''; 
<?php foreach($resource as $resource) { ?>
//resource += '<option value="<?PHP echo $resource->employee_id;?>"><?PHP echo $resource->emp_name; ?></option>';
// resource += '<option <?PHP if($editdate->holiday_id==$resource->holiday_id) {echo "selected";} ?>																value="<?PHP echo $resource->employee_id;?>" > <?PHP echo $resource->emp_name; ?></option>';
<?php } ?>


	function addresource(){
		//alert('kk');
        var row_html ='';
		row_html +='<div class="" id="" ></div>';
              
			row_html +='<div class="row">';
				row_html +='<div class="col-md-6">';
					row_html +='<div class="form-group row">';
					
						row_html +='<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Event Name : </label>';
						row_html +='<div class="col-sm-9">';
						
						row_html += '<input class="form-control form-control-sm" type="text" name="" id="holiday_id_0" placeholder="Event Name " value="<?php echo $editdate->event_name; ?>" >';
							/*row_html +='<select class="form-control form-control-sm" id="resource_id_0" name="resource_id[]" onchange="deg(0)" required>';
								row_html +='<option>Select Resource</option>';
								//row_html += resource; 								
								
							row_html +='</select>';*/
						row_html +='</div>';
					  row_html +='</div>';
				row_html +='</div>';
				// row_html +='<div class="col-md-6">';
				// 	row_html +='<div class="form-group row">';
				// 		row_html +='<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Designation :</label>';
				// 		row_html +='<div class="col-sm-9" > ';
				// 		row_html +='<div id="designation_div" > ';
				// 		row_html += '<input class="form-control form-control-sm" type="text" name="" id="" placeholder="City Short Name " value="<?php echo $editclient->desig_name; ?>" readonly>';
				// 		row_html +='</div> ';	
				// 		row_html +='<div id="designation_div_0" > ';
						
				// 		row_html +='</div> ';						
						
				// 		row_html +='</div>';
				// 	  row_html +='</div>';
				row_html +='</div>';
			row_html +='</div>';	
							
		row_html += '</div>';
        $("#resource_rows").append(row_html);
    }
	
</script>

