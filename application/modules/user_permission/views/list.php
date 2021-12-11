<?PHP 
//print_r($role); exit;
?>
      <section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1>User Permission List</h1>
                        </div>
											
                        <!-- <div class="col-md-5">
                            <div class="add-btn-div">
                                <a href="<?php //echo base_url('emp_doc_type/add_doc'); ?>" class="ad-btn-a-tag">Add</a>  
                            </div>
                        </div>-->
                    </div>
					<form name="form1" id="form1" method="post">
					<div class="wrapper-box">
                                    <?php //echo validation_errors(); ?>
                                    <?php //echo form_open( 'user_permission/index', array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
									
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Select Role</label>
                                                    <div class="col-sm-9">

                                                    <select class="form-control form-control-sm" id="role_id" name="role_id" placeholder="Select Role" onchange="permisation()">
													<option> Select Role </option>
														<?php                                       
															foreach($role as $role) {
														?>
															<option value="<?PHP echo $role->role_id;?>"><?PHP echo $role->role_name; ?></option>
														 <?PHP
														}
															?>   
													</select>
                                                        
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                    
						</div>
                    <div class="wrapper-box" id="role_div">
                        <div class="body body-bigfont">
							
								<div class="list_ajax">
								</div>
								<div class="table-responsive">
								<div class="table_user_permisstion_ajax">
								</div>  
								</div>      
							
						</div>
                    </div>
					</form>
                </div>
            </div>
          </div>
      </section>

<script>

$(document).ready(function() {
	$('#role_div').hide();
});


function permisation(){
		var role_id=$('#role_id').val();
		
		$('#role_div').show();
		
		if(role_id){
			//alert(role_id);
											
						$.ajax({
                        type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
						data: {role_id:role_id},
						url: '<?php echo base_url('user_permission/permission_list'); ?>',
						dataType: 'json', // what type of data do we expect back from the server
                        encode: true
                    })
					.done(function(data)
					{
						console.log(data);
						var count=0;
						var tableHTML = '';
						
					tableHTML = '<table id="datatable" class="table table-bordered table-striped table-hover js-exportable dataTable""><thead><tr><th width="">Menu Name</th><th width="">Menu type</th><th width="" style="text-align:center;">Add</th><th width="" class="text-center" >Edit</th><th width="20%"  class="text-center" >Change Status / Delete</th><th width="20%" class="text-center" >View</th><th width="10%" style="text-align:center;" class="add_button_user_per">Action</th></tr></thead><tbody>';
					tableHTML +='<tr><td></td><td></td><td class="text-center"><input type="checkbox" id="select_all_add" onclick="select_al_add('+count+')" name="add_all12"  value=""><label for="select_all_add">Select All</label></td>';
					tableHTML +='<td class="text-center"><input type="checkbox" id="select_all_edit" onclick="select_al_edit()" name="edit_all12"  value=""><label for="select_all_edit">Select All</label></td>';
					tableHTML +='<td class="text-center"><input type="checkbox" id="select_all_delete" onclick="select_al_delete()" name="delete_all12"  value=""><label for="select_all_delete">Select All</label></td>';
					tableHTML +='<td class="text-center"><input type="checkbox" id="select_all_print" onclick="select_al_print()" name="print_all12"  value=""><label for="select_all_print">Select All</label></td>';
					tableHTML +='<td class="text-center "><button type="button" id="save_all_btn" class="btn btn-sm btn-warning add_button_user_per" onclick="form_submit_function()"><i class="fa  fa-save"></i> Save All </button></td></tr>';
					
					$.each(data.permission_list, function(key, value) {
					//alert(role_id);
					//alert(value.menu_id);
					$("#role_id").val(role_id);
					var add_status=edit_status=delete_status=print_status="";
					if(value.add_flag=="1"){add_status="checked"};
					if(value.edit_flag=="1"){edit_status="checked"};
					if(value.delete_flag=="1"){delete_status="checked"};
					if(value.download_flag=="1"){print_status="checked"};
					tableHTML+='<tr><td><input type="hidden" name="permission_id[]" id="permission_id_'+count+'" value="'+value.permission_id+'"><input type="hidden" name="menu_id[]" id="menu_id_'+count+'" value="'+value.menu_id+'">'+value.menu_name+'</td>';
					
					//tableHTML+='<input type="hidden" id="role_id" name="role_id"  value="'+role_id+'">';
					
					tableHTML+='<td class="text-center">'+(value.application_type).toUpperCase()+'</td>';
					
					
					tableHTML+='<td class="text-center"><input type="checkbox" id="add_'+count+'" name="add_'+count+'"  value="1" '+add_status+' onchange="not_selected_add('+count+')" class="checkBoxClass"><label for="add_'+count+'">Yes</label></td>';
					
					tableHTML+='<td  class="text-center" ><input type="checkbox" id="edit_'+count+'" name="edit_'+count+'" value="1" '+edit_status+' onchange="not_selected_edit()" class="checkBoxClassEdit"><label for="edit_'+count+'">Yes</label></td>';
					
					tableHTML+='<td  class="text-center" ><input type="checkbox" id="delete_'+count+'" name="delete_'+count+'" value="1" onchange="not_selected_delete()" class="checkBoxClassDelete" '+delete_status+'><label for="delete_'+count+'">Yes</label></td>';
					
					tableHTML+='<td class="text-center" ><input type="checkbox" id="print_'+count+'" name="print_'+count+'" value="1" onchange="not_selected_print()"class="checkBoxClassPrint" '+print_status+'><label for="print_'+count+'">Yes</label></td>';
					
					tableHTML+='<td class="text-center"><button type="button" class="cr-a submit_button_ajax add_button_user_per" data-id="'+count+'"><i class="fa  fa-save"></i> Save</button></td></tr>';
					
					count++;
					
					});
					
					tableHTML+='</tbody></table>';
					$(".table_user_permisstion_ajax").html(tableHTML);
					
					$('.submit_button_ajax').on('click', function(){  
						var count=$(this).attr('data-id');
						form_submit_function_single(count);
						});
					})
					.fail(function(data){
					console.log(data);
					})
				}
				else{
					$(".table_user_permisstion_ajax").html("");
					//alert("Select One Option");
					}
			}


function not_selected_add(count){
		if($('#select_all_add').is(":checked") == false)
		{  $('#select_all_add').prop('checked',false); }
		
	}
	function not_selected_edit(count){
		if($('#edit_'+count).is(":checked") == false)
		{  $('#select_all_edit').prop('checked',false); }
		
	}
	function not_selected_delete(count){
		if($('#delete_'+count).is(":checked") == false)
		{  $('#select_all_delete').prop('checked',false); }
		
	}
	function not_selected_print(count){
		if($('#print_'+count).is(":checked") == false)
		{  $('#select_all_print').prop('checked',false); }
		
	}
	
	function select_al_add()
	{//"select all" change 
    
	
		if ($('#select_all_add').is(":checked"))
		{
			$('.checkBoxClass').each(function(){ //iterate all listed checkbox items
			$('.checkBoxClass').prop('checked',true); //change ".checkbox" checked status
			});
		}
		else{ //if this item is unchecked
			$('.checkBoxClass').prop('checked',false); //change "select all" checked status to false
		}
	}
	
	function select_al_edit()
	{
		if ($('#select_all_edit').is(":checked"))
		{
			$('.checkBoxClassEdit').each(function(){ //iterate all listed checkbox items
			$('.checkBoxClassEdit').prop('checked',true); //change ".checkbox" checked status
			});
		}
		else
		{ //if this item is unchecked
			$('.checkBoxClassEdit').prop('checked',false); //change "select all" checked status to false
		}
	}
	
	function select_al_delete(){
		if ($('#select_all_delete').is(":checked"))
		{
			$('.checkBoxClassDelete').each(function(){ //iterate all listed checkbox items
			$('.checkBoxClassDelete').prop('checked',true); //change ".checkbox" checked status
			});
		}
		else
		{ //if this item is unchecked
			$('.checkBoxClassDelete').prop('checked',false); //change "select all" checked status to false
		}
	}
	
	function select_al_print(){ 
		if ($('#select_all_print').is(":checked"))
		{
			$('.checkBoxClassPrint').each(function(){ //iterate all listed checkbox items
			$('.checkBoxClassPrint').prop('checked',true); //change ".checkbox" checked status
			});
		}
		else
		{ //if this item is unchecked
			$('.checkBoxClassPrint').prop('checked',false); //change "select all" checked status to false
		}
	}
	
	function form_submit_function(){
		var role_id=$('#role_id').val();
		//alert(role_id);
		$("#save_all_btn").prop('disabled', true);
		sendData = $("#form1").serializeArray();
		$.ajax({  
			url: '<?php echo base_url('user_permission/all_list_submit'); ?>', 
			type: "POST",
			data : sendData,						
			dataType: 'json', // what type of data do we expect back from the server
			encode: true
		})
		.done(function(data) {
			console.log(data);
			if(data.status == "1"){
				alert("Permission Updated Successfully");
				ajax_user_permisstion_table();
				$("#save_all_btn").prop('disabled',false);
			}
			else{
				alert("Sorry Unable To Update");
			}
		})
		.fail(function(data){
			console.log(data);
		})
	}
			
	function form_submit_function_single(count){
		var role_id=$('#role_id').val();
		var menu_id=$('#menu_id_'+count+'').val();
		//alert(menu_id);
		var permission_id=$('#permission_id_'+count+'').val();
		var add_value=$('input[name=add_'+count+']:checked').val();
		var edit_value=$('input[name=edit_'+count+']:checked').val();
		var delete_value=$('input[name=delete_'+count+']:checked').val();
		var print_value=$('input[name=print_'+count+']:checked').val();
		
		
		$.ajax({
			url: '<?php echo base_url('user_permission/single_submit'); ?>',   
			type: "POST",
			data: {permission_id:permission_id,menu_id:menu_id,add_value:add_value,edit_value:edit_value,delete_value:delete_value,print_value:print_value,role_id:role_id},  
			dataType: 'json', // what type of data do we expect back from the server
			encode: true
		})
		.done(function(data) {
			console.log(data);
			if(data.status == "1"){
			alert("Permission Updated Successfully");
			ajax_user_permisstion_table();
			}else{
			alert("Sorry Unable To Update");
			}
		})
		.fail(function(data){
			console.log(data);
		})
	}

</script>