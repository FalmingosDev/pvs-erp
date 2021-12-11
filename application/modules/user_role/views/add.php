<!--<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
<?PHP
//print_r($resource); exit;
//echo form_dropdown($resource); exit;
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
                                        <h1>User Role</h1> 
                                    </div>
                                    <div class="col-md-5">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('user_role'); ?>" class="ad-btn-a-tag">Role List</a>  
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
							<?php echo form_open( base_url('user_role/add' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
								<div class="wrapper-box">
                                <form>
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Role Name</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm" id="role_id" name="role_id" placeholder="Select Role"> <!--onchange="emp_fun()"-->
														<option value="">Select Role</option>
								<?php foreach($role as $role) { ?>
											 <option value="<?PHP echo $role->role_id;?>" ><?PHP echo $role->role_name; ?></option>
															<?php } ?>
                                                        </select>
								<?php echo form_error('client_id', '<span class="help-inline">', '</span>'); ?>
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
                                    
										 <div class="col-sm-12 mb-3" align="right">
                                                      
													 <div class="col-sm-2" align="right">
													 <button type="button" class="cr-a" id="add_app1">Add</button>
													</div>
                                         </div>
                                    <div id="resource_rows">  
													
													
									</div>
                                    <div class="row">
                                        <div class="col-md-12 text-center">     
                                            <button class="st-width-new" id="">Allocate</button>
                                        </div>
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
	$(document).ready(function() {
	addresource();	
	} );
	
	
var user = ''; 
<?php foreach($user as $user) { ?>
user += '<option value="<?PHP echo $user->user_id;?>"><?PHP echo $user->emp_name; ?></option>';
<?php } ?>


	function addresource(){
		//alert('kk');
        var row_html ='';
		row_html +='<div class="" id="" ></div>';
              
			row_html +='<div class="row">';
				row_html +='<div class="col-md-4">';
					row_html +='<div class="form-group row">';
					
						row_html +='<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm ">User Name : </label>';
						row_html +='<div class="col-sm-8">';
						
							row_html +='<select class="form-control selectpicker form-control-sm" id="resource_id_0" name="resource_id[]" data-live-search="true" onchange="deg(0)" data-width="100%" required>';
								row_html +='<option>Select User</option>';
								row_html += user; 								
								
							row_html +='</select>';
							row_html +='<?php echo form_error('resource_id',
								'<span class="help-inline">','</span>');';
								row_html +='?>';
						row_html +='</div>';
					  row_html +='</div>';
				row_html +='</div>';
				row_html +='<div class="col-md-4">';
					row_html +='<div class="form-group row">';
						row_html +='<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Designation :</label>';
						row_html +='<div class="col-sm-8" > ';
						row_html +='<div id="designation_div_0" > ';
						
						row_html +='</div> ';						
						
						row_html +='</div>';
						/*row_html +='<div class="col-sm-2" align="right">';
						row_html +='<button type="button" class="cr-a" id="add_app1">Add</button>';
						row_html +='</div>';*/
						
					  row_html +='</div>';
				row_html +='</div>';
				row_html +='<div class="col-md-3">';
					row_html +='<div class="form-group row">';
						row_html +='<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm p-0">Department :</label>';
						row_html +='<div class="col-sm-8" > ';
						row_html +='<div id="department_div_0" > ';
						
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
		pickerSelect();
    }
	
	
	var cnt =0;
 $("#add_app1").on('click', function () {
	
          cnt++;

           var row_html ='';
		   row_html +='<div class="add_more_rec" id="add_more_rec'+cnt+'" >';
              
                    row_html +='<div class="row">';
				row_html +='<div class="col-md-4">';
					row_html +='<div class="form-group row">';
					
						row_html +='<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm pr-0">User Name : </label>';
						row_html +='<div class="col-sm-8">';
						
								row_html +='<select class="form-control selectpicker form-control-sm" id="resource_id_'+cnt+'" name="resource_id[]" data-live-search="true"  onchange="deg(cnt)">';
								row_html +='<option>Select User</option>';
								row_html += user; 
							row_html +='</select>';
						row_html +='</div>';
					  row_html +='</div>';
				row_html +='</div>';
				row_html +='<div class="col-md-4">';
					row_html +='<div class="form-group row">';
						row_html +='<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Designation :</label>';
						row_html +='<div class="col-sm-8"> ';
						row_html +='<div id="designation_div_'+cnt+'" > ';
						
						row_html +='</div> ';
						
						row_html +='</div>';
						/*row_html +='<div class="col-sm-2">';
					row_html +=	'<button type="button" class="but-btn b-0 del_div" style:"background: transparent;border: none;margin-top: -10px;" value="delete" id="del_div'+cnt+'" onclick="delchild('+cnt+')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
				row_html +='</div>';*/
					  row_html +='</div>';
					  
				row_html +='</div>';
				row_html +='<div class="col-md-3">';
					row_html +='<div class="form-group row">';
						row_html +='<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm p-0">Department :</label>';
						row_html +='<div class="col-sm-8"> ';
						row_html +='<div id="department_div_'+cnt+'" > ';
						
						row_html +='</div> ';
						
						row_html +='</div>';
     
					  row_html +='</div>';
					  row_html +='</div>';
						row_html +='<div class="col-sm-1">';
					row_html +=	'<button type="button" class="but-btn b-0 del_div" style:"background: transparent;border: none;margin-top: -10px;" value="delete" id="del_div'+cnt+'" onclick="delchild('+cnt+')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
				row_html +='</div>';
				
						
			row_html +='</div>';
			
			
						
		row_html +='</div>';
							
					
			//row_html += '</div>';

            $("#resource_rows").append(row_html);
			pickerSelect();
			 $('.del_div').on('click',function()
					{
				//alert(abc);
						$(this).parents('.add_more_rec').remove();
					});
        });
		
		function delchild(psa)
        {
           // alert(pa);
            $("#add_more_rec"+psa).remove();
        }
		
		
	
</script>

<script>

	/*function emp_fun(){
		var role_id = $("#role_id").val();
		alert(role_id);
		
		$.ajax({
        type: 'POST',   
        url: '<?php echo base_url('user_role/add'); ?>',
        data: {role_id: role_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
        dataType: 'json',
        encode: true,
    })
	}*/
		
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
		var roww_html='';
        if(data.status){            
           	//console.log(data.designation[0].designation_id);
            	//row_html +=' <input name="designat_id[]" id="'+data.designation.designation_id+'" type="hidden"  value="'+data.designation.designation_id+'">';
				
				row_html +='<input name="designat_id[]" value="'+data.designation[0].designation_id+'" type="hidden"> <input name="designat_name[]" id="'+data.designation[0].designation_id+'" type="text" class="form-control form-control-sm" style="background: #eee !important;" value="'+data.designation[0].desig_name+'" readonly>';
               //alert (data.designation[0].dept_id]);
			   roww_html +='<input name="dept_id[]" value="'+data.designation[0].dept_id+'" type="hidden"> <input name="dept_id[]" id="'+data.designation[0].dept_id+'" type="text" class="form-control form-control-sm" style="background: #eee !important;" value="'+data.designation[0].dept_name+'" readonly>';
            
        }
        else{
            row_html +=' <input type="text" class="form-control form-control-sm" style="background: #eee !important;">';
			roww_html +=' <input type="text" class="form-control form-control-sm" style="background: #eee !important;">';
        }
		
        $("#designation_div_"+cnt).html(row_html);
        $("#department_div_"+cnt).html(roww_html);
    
			})
    
		.fail(function(data){
			
			console.log(data);
		});
	}
</script>

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
  $(".select2").select2();
});
</script>-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script>
function pickerSelect() {
  $('.selectpicker').selectpicker();
};
</script>