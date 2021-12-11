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
                                    <div class="col-md-7">
                                        <h1>Resource Allocation</h1> 
                                    </div>
                                    <div class="col-md-5">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('resource_allocation'); ?>" class="ad-btn-a-tag">Allocation List</a>  
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
                                <?php //echo validation_errors(); ?>
								<?php //foreach($editclient as $editclient){ ?>
							<?php echo form_open( base_url( 'resource_allocation/edit' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
								<div class="wrapper-box">
                                <form>
								<input type="hidden" name="id" value="<?php echo $editclient->resource_allocation_id; ?>"><input type="hidden" name="emp_id" value="<?php echo $editclient->employee_id; ?>">
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Client Name</label>
                                                    <div class="col-sm-9">
													<input class="form-control form-control-sm" type="text" name="" id="" placeholder="City Short Name " value="<?php echo $editclient->client_name; ?>" readonly>
                                                       
									<?php echo form_error('client_id', '<span class="help-inline">', '</span>'); ?>	
                                                    </div>
                                                </div>
                                            </div>
											
											<div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Branch Name</label>
                                                    <div class="col-sm-9">
													<input class="form-control form-control-sm" type="text" name="" id="" placeholder="City Short Name " value="<?php echo $editclient->branch_name; ?>" readonly>
                                                       
									<?php echo form_error('branch_id', '<span class="help-inline">', '</span>'); ?>	
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
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm ">Effective Start Date : </label>
                                                    <div class="col-sm-8">
													
                                                        <input type="date" name="std_to_date" id="std_to_date" class="form-control form-control-sm" value="<?php echo $editclient->effective_start_date; ?>" >
														<?php echo form_error('std_to_date', '<span class="help-inline">', '</span>'); ?>
														
													
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Effective End Date : </label>
                                                    <div class="col-sm-8">
                                                     <input type="date" name="end_to_date" id="end_to_date" class="form-control form-control-sm" value="<?php if(($editclient->effective_end_date)!= '1900-01-01') { echo $editclient->effective_end_date; }  ?>">
													  <?php echo form_error('end_to_date', '<span class="help-inline">', '</span>'); ?>
                                                    </div>  
                                                  </div>
                                            </div>
                                        </div> 
										 
                                    <div id="resource_rows">  
													
													
									</div>
                                    <div class="row">
											<div class="col-md-5"></div>
												<div class="col-md-2">                                             
												  <button type="submit" class="cr-a">Update</button>
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
            </div>
          </div>
        
      </section>
	  
<script>
	$(document).ready(function() {
	addresource();	
	} );
	
	
var resource = ''; 
<?php foreach($resource as $resource) { ?>
//resource += '<option value="<?PHP echo $resource->employee_id;?>"><?PHP echo $resource->emp_name; ?></option>';
resource += '<option <?PHP if($editclient->employee_id==$resource->employee_id) {echo "selected";} ?>																value="<?PHP echo $resource->employee_id;?>" > <?PHP echo $resource->emp_name; ?></option>';
<?php } ?>


	function addresource(){
		//alert('kk');
        var row_html ='';
		row_html +='<div class="" id="" ></div>';
              
			row_html +='<div class="row">';
				row_html +='<div class="col-md-6">';
					row_html +='<div class="form-group row">';
					
						row_html +='<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Resource Name : </label>';
						row_html +='<div class="col-sm-9">';
						
						row_html += '<input class="form-control form-control-sm" type="text" name="" id="resource_id_0" placeholder="City Short Name " value="<?php echo $editclient->emp_name; ?>" readonly>';
							/*row_html +='<select class="form-control form-control-sm" id="resource_id_0" name="resource_id[]" onchange="deg(0)" required>';
								row_html +='<option>Select Resource</option>';
								//row_html += resource; 								
								
							row_html +='</select>';*/
							row_html +='<?php echo form_error('resource_id',
								'<span class="help-inline">','</span>');';
								row_html +='?>';
						row_html +='</div>';
					  row_html +='</div>';
				row_html +='</div>';
				row_html +='<div class="col-md-6">';
					row_html +='<div class="form-group row">';
						row_html +='<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Designation :</label>';
						row_html +='<div class="col-sm-9" > ';
						row_html +='<div id="designation_div" > ';
						row_html += '<input class="form-control form-control-sm" type="text" name="" id="" placeholder="City Short Name " value="<?php echo $editclient->desig_name; ?>" readonly>';
						row_html +='</div> ';	
						row_html +='<div id="designation_div_0" > ';
						
						row_html +='</div> ';						
						
						row_html +='</div>';
					  row_html +='</div>';
				row_html +='</div>';
			row_html +='</div>';	
							
		row_html += '</div>';
        $("#resource_rows").html(row_html);
    }
	
</script>

<script>
	$(document).ready(function(){
    	
        
		//deg();
        
    });

	
	function deg(cnt){
		$("#designation_div").hide();
		
		var resource_id = $("#resource_id_"+cnt).val();
		//alert(resource_id);
		populatedetail(resource_id,cnt);
	}
		
	
	function populatedetail(resource_id,cnt){
		
       var result='';
        //var csrfName = $('.PVS_ERP_csrf').attr('name');

    $.ajax({
        type: 'POST',   
        url: '<?php echo base_url('resource_allocation/desi_list'); ?>',
        data: {resource_id: resource_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
        dataType: 'json',
        encode: true,
    })
    
	
    .done(function(data){
        $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
		
		var row_html='';
        if(data.status){            
           
            	//row_html +=' <input name="designat_id[]" id="'+data.designation.designation_id+'" type="hidden"  value="'+data.designation.designation_id+'">';
				
				row_html +='<input name="designat_id[]" value="'+data.designation.designation_id+'" type="hidden"> <input name="designat_name[]" id="'+data.designation.designation_id+'" type="text" class="form-control form-control-sm" style="background: #eee !important;" value="'+data.designation.desig_name+'" readonly>';
               
            
        }
        else{
            row_html +=' <input type="text" class="form-control form-control-sm" style="background: #eee !important;">';
        }
		
        $("#designation_div_"+cnt).html(row_html);
      
    
			})
    
		.fail(function(data){
			
			console.log(data);
		});
	}
</script>