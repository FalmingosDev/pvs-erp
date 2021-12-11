<?PHP
//print_r($resource); exit;
//echo form_dropdown($resource); exit;
?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
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
                                    </div>
									<?php if($this->session->flashdata('msg')): ?>
                                    <div class="alert btn-danger alert-dismissible fade show" role="alert" id="show_msg">
                                            <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    
                                    <?php endif; ?>
                                </div>
                                <?php //echo validation_errors(); ?>
							<?php echo form_open( base_url( 'resource_allocation/add' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
								<div class="wrapper-box">
                                <form>
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Client Name</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm select2" id="client_id" data-width="100%" name="client_id" placeholder="Select Client">
														<option value="">Select Client</option>
								<?php foreach($client as $client) { ?>
											 <option value="<?PHP echo $client->client_id;?>"><?PHP echo $client->client_name; ?></option>
															<?php } ?>
                                                        </select>
								<?php echo form_error('client_id', '<span class="help-inline">', '</span>'); ?>
                                                    </div>
                                                  </div>
                                            </div>
											<div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Branch Name</label>
                                                    <div class="col-sm-9">
                                                        <select id="branch_id" name="branch_id" data-width="100%" class="form-control form-control-sm select2">
                                        	
                                        			  </select>
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
                                                        <input type="date" name="std_to_date" id="std_to_date" class="form-control form-control-sm">
														<?php echo form_error('std_to_date', '<span class="help-inline">', '</span>'); ?>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Effective End Date : </label>
                                                    <div class="col-sm-8">
                                                      <input type="date" name="end_to_date" id="end_to_date" class="form-control form-control-sm">
													  <?php echo form_error('end_to_date', '<span class="help-inline">', '</span>'); ?>
                                                    </div>  
                                                  </div>
                                            </div>
                                        </div> 
										 <div class="col-sm-12 mb-3" align="right">
                                                      
													 <div class="col-sm-2" align="right">
													 <button type="button" class="cr-a" id="add_app1">Add</button>
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

      <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
      <script>
      	
    $(document).on('select2:open', () => {
		document.querySelector('.select2-search__field').focus();
	});
	
	
	$(document).ready(function() {
		addresource();	
		$(".select2").select2();
	} );
	
	
var resource = ''; 
<?php foreach($resource as $resource) { ?>
resource += '<option value="<?PHP echo $resource->employee_id;?>"><?PHP echo $resource->emp_name; ?></option>';
<?php } ?>


	function addresource(){
		//alert('kk');
        var row_html ='';
		row_html +='<div class="" id="" ></div>';
              
			row_html +='<div class="row">';
				row_html +='<div class="col-md-6">';
					row_html +='<div class="form-group row">';
					
						row_html +='<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Resource Name : </label>';
						row_html +='<div class="col-sm-6">';
						
							row_html +='<select class="form-control form-control-sm select2" data-width="100%" id="resource_id_0" name="resource_id[]" onchange="deg(0)" required>';
								row_html +='<option>Select Resource</option>';
								row_html += resource; 								
								
							row_html +='</select>';
							row_html +='<?php echo form_error('resource_id',
								'<span class="help-inline">','</span>');';
								row_html +='?>';
						row_html +='</div>';
					  row_html +='</div>';
				row_html +='</div>';
				row_html +='<div class="col-md-6">';
					row_html +='<div class="form-group row">';
						row_html +='<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Designation :</label>';
						row_html +='<div class="col-sm-6" > ';
						row_html +='<div id="designation_div_0" > ';
						
						row_html +='</div> ';						
						
						row_html +='</div>';
						/*row_html +='<div class="col-sm-2" align="right">';
						row_html +='<button type="button" class="cr-a" id="add_app1">Add</button>';
						row_html +='</div>';*/
						
					  row_html +='</div>';
				row_html +='</div>';

			row_html +='</div>';	
							
		row_html += '</div>';
        $("#resource_rows").html(row_html);
    }
	
	
	var cnt =0;
 $("#add_app1").on('click', function () {
	
          cnt++;

           var row_html ='';
		   row_html +='<div class="add_more_rec" id="add_more_rec'+cnt+'" >';
              
                    row_html +='<div class="row">';
				row_html +='<div class="col-md-6">';
					row_html +='<div class="form-group row">';
					
						row_html +='<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">Resource Name : </label>';
						row_html +='<div class="col-sm-6">';
						
								row_html +='<select class="form-control form-control-sm select2" data-width="100%" id="resource_id_'+cnt+'" name="resource_id[]" onchange="deg(cnt)">';
								row_html +='<option>Select Resource</option>';
								row_html += resource; 
							row_html +='</select>';
						row_html +='</div>';
					  row_html +='</div>';
				row_html +='</div>';
				row_html +='<div class="col-md-6">';
					row_html +='<div class="form-group row">';
						row_html +='<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Designation :</label>';
						row_html +='<div class="col-sm-6"> ';
						row_html +='<div id="designation_div_'+cnt+'" > ';
						
						row_html +='</div> ';
						
						row_html +='</div>';
						row_html +='<div class="col-sm-2">';
					row_html +=	'<button type="button" class="but-btn b-0 del_div" style:"background: transparent;border: none;margin-top: -10px;" value="delete" id="del_div'+cnt+'" onclick="delchild('+cnt+')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
				row_html +='</div>';
					  row_html +='</div>';
					  
				row_html +='</div>';
				
				
						
			row_html +='</div>';
			
			
						
		row_html +='</div>';
							
					
			//row_html += '</div>';

            $("#resource_rows").append(row_html);
			 $('.del_div').on('click',function()
					{
				//alert(abc);
						$(this).parents('.add_more_rec').remove();
					});
			 
			 $(".select2").select2();
        });
		
		function delchild(psa)
        {
           // alert(pa);
            $("#add_more_rec"+psa).remove();
        }
		
		
	
</script>

<script>
		
	function deg(cnt){
		var resource_id = $("#resource_id_"+cnt).val();
		
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
          // alert(data.designation[0].designation_id);
            	//row_html +=' <input name="designat_id[]" id="'+data.designation.designation_id+'" type="hidden"  value="'+data.designation.designation_id+'">';
				
				row_html +='<input name="designat_id[]" value="'+data.designation[0].designation_id+'" type="hidden"> <input name="designat_name[]" id="'+data.designation[0].designation_id+'" type="text" class="form-control form-control-sm" style="background: #eee !important;" value="'+data.designation[0].desig_name+'" readonly>';
               
            
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
	
	
	$("#client_id").change(() => {
	        var client_id = $("#client_id").val();
			//alert(client_id);
	        populatebranch(client_id);
    	})
		
		
		function populatebranch(client_id){
        //alert(state_id);
       var result='';
        //var csrfName = $('.PVS_ERP_csrf').attr('name');

    $.ajax({
        type: 'POST',   
        url: '<?php echo base_url('resource_allocation/branch'); ?>',
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
			//alert(data.branch.branch_name);
            $.each(data.branch,function(key,value){
            	//alert(value.branch_name);
                result +='<option value="'+value.branch_id+'">'+value.branch_name+'</option>';
            });
        }
        else{
            result +='<option value="">No Branch selected</option>';
        }
        $("#branch_id").html(result);
       // $("#branch_id").selectpicker("refresh");
    
    })
    
    .fail(function(data){
        // show the any errors
        console.log(data);
    });
}
</script>