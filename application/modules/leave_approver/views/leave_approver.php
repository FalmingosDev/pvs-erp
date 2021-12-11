<?PHP 
//print_r($data); exit;
?>
<style>
		/* The switch - the box around the slider */
		.switch {
		  position: relative;
		  display: inline-block;
		  width: 60px;
		  height: 34px;
		}

		/* Hide default HTML checkbox */
		.switch input {
		  opacity: 0;
		  width: 0;
		  height: 0;
		}

		/* The slider */
		.switch-slider {
		  position: absolute;
		  cursor: pointer;
		  top: 0;
		  left: 0;
		  right: 0;
		  bottom: 0;
		  background-color: #ccc;
		  -webkit-transition: .4s;
		  transition: .4s;
		}

		.switch-slider:before {
		  position: absolute;
		  content: "";
		  height: 26px;
		  width: 26px;
		  left: 4px;
		  bottom: 4px;
		  background-color: white;
		  -webkit-transition: .4s;
		  transition: .4s;
		}

		input:checked + .switch-slider {
		  background-color: #2196F3;
		}

		input:focus + .switch-slider {
		  box-shadow: 0 0 1px #2196F3;
		}

		input:checked + .switch-slider:before {
		  -webkit-transform: translateX(26px);
		  -ms-transform: translateX(26px);
		  transform: translateX(26px);
		}

		/* Rounded sliders */
		.switch-slider.round {
		  border-radius: 34px;
		}

		.switch-slider.round:before {
		  border-radius: 50%;
		}
    </style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
      <section class="main-wrapper">
          <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-client" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-11">
                                        <h1 class="employee-box">Leave Approval</h1>   
                                    </div>
                                    <div class="col-md-1">
                                        <a class="cr-a" href="<?php echo base_url('leave_approver'); ?>" class="ad-btn-a-tag">Back</a>
                                    </div>
                                </div>
                                    <div class="wrapper-box">									
									
									<div class="widget-content nopadding">
									<?php echo form_open(base_url('leave_approver/add' ), array('id' => 'approver', 'name' => 'approver'));?>
									<div class="row pb-2">
                                    <div class="col-md-7">                
                                    </div>
                                    <!--<div class="col-md-5">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('leave_approver'); ?>" class="ad-btn-a-tag">Back</a>  
                                        </div>
                                    </div>-->
                                </div>
									<div class="col-md-6">
										<div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Select Department : </label>
											<div class="col-sm-8">
                                                <select type="text" class="form-control form-control-sm" id="department_id" name="department_id" >
                                                        <option value="">Select Department Name</option>
                                                    <?php                                       
                                                foreach($department as $department) {  
                                                    ?>	
                                                        <option value="<?PHP echo $department->dept_id;?>"><?PHP echo $department->dept_name; ?></option>
                                                <?PHP
                                                    }
                                                ?> 	
                                                        <?php //echo form_error('state_name' ); ?>
                                                </select>
										  </div>
                                        
                                    
										</div> 
										
										
                                    </div>
									
							<div class="row">
								<div class="col-md-4">
									<div class="form-group row">
										<p for="colFormLabelSm" class="col-sm-6"><b>Level 1 Approver</b></p>
										<div class="col-sm-3">
										  &nbsp;
										</div>
										<div class="col-sm-3">
										  <button type="button" class="cr-a" id="add_app1">Add</button>
										</div>
									  </div>
									  <div class="form-group row">
										<label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Approver Name : </label>
										<div class="col-sm-7 p-0">
											<select class="form-control form-control-sm" id="employee1_id1" name="employee1_id1[]">
											
											</select>
											
										</div>
                                          </div>
										<div id="approver_div1"></div>
										
								</div>
								<div class="col-md-4">
									<div class="form-group row">
										<p for="colFormLabelSm" class="col-sm-7"><b>Level 2 Approver (HR)</b></p>
										<div class="col-sm-2">
										  &nbsp;
										</div>
									   <div class="col-sm-3">
										  <button type="button" class="cr-a" id="add_app2">Add</button>
										</div>
									  </div>
									  <div class="form-group row">
										<label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Approver Name : </label>
										<div class="col-sm-7 p-0">
											<select class="form-control form-control-sm" id="employee2_id1" name="employee2_id1[]" >
											</select>
										</div>
									   </div>
									   <div id="approver_div2"></div>
									   </div>
								
								<div class="col-md-4">
									<div class="form-group row">
										<p for="colFormLabelSm" class="col-sm-7 p-0"><b>Level 3 Approver (Director)</b></p>  
										<div class="col-sm-2">
										  &nbsp;
										</div>
									   <div class="col-sm-3">
										  <button type="button" class="cr-a" id="add_app3">Add</button>
										</div>
									  </div>
									  <div class="form-group row">
										<label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Approver Name : </label>
										<div class="col-sm-7 p-0">
											<select class="form-control form-control-sm" id="employee3_id1" name="employee3_id1[]" >
											</select>
										</div>
									  </div>
									  <div id="approver_div3"></div>
									  </div>
								</div>
                                </div>
							</div>
							<div class="form-group row mt-top mb-3">  
										<div class="col-md-5">&nbsp;</div>
										  <div class="col-md-2">
											<button class="cr-a">Save</button>
										  </div>
										  <div class="col-md-5">&nbsp;</div>
									  </div>
							<div class="row">
								<div class="col-md-6">
								  
								</div>
								<div class="col-md-6">
									<div class="form-group row">
										&nbsp;
									  </div>
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

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script>
$(document).ready(function() {
	$("#add_app1").hide();
	$("#add_app2").hide();
	$("#add_app3").hide();	
} );

$("#department_id").change(() => {
	        var department_id = $("#department_id").val();
			
	        populatedepartment(department_id);
			//alert(department_id);
   })
var approver_1dd = '';
var approver_2dd = '';
var approver_3dd = '';
function populatedepartment(department_id){
	//alert(department_id);
	$("#add_app1").show();
	$("#add_app2").show();
	$("#add_app3").show();
	$.ajax({
        type: 'POST',   
        url: '<?php echo base_url('leave_approver/department'); ?>',
        data: {department_id: department_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
        dataType: 'json',
        encode: true,
    })
	.done(function(data){
        $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
		//alert(data.status);
        if(data.status){      
			approver_1dd='<option value="">Select Approver Name 1</option>';
			approver_2dd='<option value="">Select Approver Name 2</option>';
			approver_3dd='<option value="">Select Approver Name 3</option>';
			
            $.each(data.approver1,function(key,value){	
			
				approver_1dd +='<option value="'+value.employee_id+'">'+value.empname+'</option>';
            });
			
			$.each(data.approver2,function(key,value){
				
				approver_2dd +='<option value="'+value.employee_id+'">'+value.empname+'</option>';
								
                
            });
			
			$.each(data.approver3,function(key,value){
				//alert(value.employee_id)
				
            	approver_3dd +='<option value="'+value.employee_id+'">'+value.empname+'</option>';
								
                
            });
        }
        
        $("#employee1_id1").html(approver_1dd);
        $("#employee2_id1").html(approver_2dd);
        $("#employee3_id1").html(approver_3dd);
       // $("#city_id").selectpicker("refresh");
    
    })
    
    .fail(function(data){
        // show the any errors
        console.log(data);
    });
	
}

	
	var cnt =1;
 $("#add_app1").on('click', function () {
          cnt++;

           var row_html ='';
		   
		   row_html +='<div class="add_more_approver" id="add_more_approver'+cnt+'" >';
              
				
				row_html +='<div class="form-group row">';
					row_html +='<label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Approver Name : </label>';
					row_html +='<div class="col-sm-7 p-0">';
						row_html +='<select class="form-control form-control-sm" id="employee1_id'+cnt+'" name="employee1_id1[]">'+approver_1dd+'';
						row_html +='</select>';
					row_html +='</div>';
					row_html +='<div class="col-sm-2">';
						row_html +=	'<button type="button" class="but-btn b-0 del_div" style:"background: transparent;border: none;margin-top: -10px;" value="delete" id="del_div'+cnt+'" onclick="delchild('+cnt+')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
					row_html +='</div>';
				row_html +='</div>';
				
			  
			 
			row_html += '</div>';

            $("#approver_div1").append(row_html);
           // $("#approver_div1").html(row_html);


			 $('.del_div').on('click',function()
					{
				//alert(abc);
						$(this).parents('.add_more_approver').remove();
					});
        });
		
		function delchild(psa)
        {
           // alert(pa);
            $("#add_more_approver"+psa).remove();
        }
		
	
	
	var cntt =1;
 $("#add_app2").on('click', function () {
	// alert('ss');
          cntt++;

           var row_html ='';
		   
		   row_html +='<div class="add_more_approver2" id="add_more_approver2'+cntt+'" >';
              
				
				row_html +='<div class="form-group row">';
					row_html +='<label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Approver Name : </label>';
					row_html +='<div class="col-sm-7 p-0">';
						row_html +='<select class="form-control form-control-sm" id="employee2_id'+cntt+'" name="employee2_id1[]">'+approver_1dd+'';
						row_html +='</select>';
					row_html +='</div>';
					row_html +='<div class="col-sm-2">';
						row_html +=	'<button type="button" class="but-btn b-0 del_div" style:"background: transparent;border: none;margin-top: -10px;" value="delete" id="del_div'+cntt+'" onclick="delchild('+cntt+')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
					row_html +='</div>';
				row_html +='</div>';
				
			  
			 
			row_html += '</div>';

            $("#approver_div2").append(row_html)


			 $('.del_div').on('click',function()
					{
				//alert(abc);
						$(this).parents('.add_more_approver2').remove();
					});
					
			if (cntt == 3){
				$("#add_app2").hide();
			}
			
			
        });
		
		function delchild2(psa)
        {
           // alert(pa);
            $("#add_more_approver2"+psa).remove();
        }
	

	var cnttt =1;
 $("#add_app3").on('click', function () {
	// alert('ss');
          cnttt++;

           var row_html ='';
		   
		   row_html +='<div class="add_more_approver3" id="add_more_approver3'+cntt+'" >';
		   row_html +='<div class="form-group row">';
					row_html +='<label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Approver Name : </label>';
					row_html +='<div class="col-sm-7 p-0">';
						row_html +='<select class="form-control form-control-sm" id="employee3_id'+cnttt+'" name="employee3_id1[]">'+approver_1dd+'';
						row_html +='</select>';
					row_html +='</div>';
					row_html +='<div class="col-sm-2">';
						row_html +=	'<button type="button" class="but-btn b-0 del_div" style:"background: transparent;border: none;margin-top: -10px;" value="delete" id="del_div'+cnttt+'" onclick="delchild('+cnttt+')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
					row_html +='</div>';
				row_html +='</div>';
				
			row_html += '</div>';

            $("#approver_div3").append(row_html)


			 $('.del_div').on('click',function()
					{
				//alert(abc);
						$(this).parents('.add_more_approver3').remove();
					});
					
			if (cnttt == 3){
				$("#add_app3").hide();
			}
			
			
        });
		
		function delchild3(psa)
        {
           // alert(pa);
            $("#add_more_approver3"+psa).remove();
        }

</script>
