<?PHP 
//print_r($list); exit;
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
                                <h1 class="employee-box">Client Approval Definition</h1>
                                    <div class="wrapper-box">
									<?php if($this->session->flashdata('msg')): ?>
                                    <div class="alert btn-danger alert-dismissible fade show" role="alert" id="show_msg">
                                            <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    
                                    <?php endif; ?>
									
									<div class="widget-content nopadding">
									<?php echo form_open(base_url('approver_level/add' ), array('id' => 'approver', 'name' => 'approver'));?>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <p for="colFormLabelSm" class="col-sm-6"><b>Level 1 Approver</b></p>
                                                    <div class="col-sm-3">
                                                      &nbsp;
                                                    </div>
                                                    <div class="col-sm-3">
                                                      <button type="button" class="cr-a" id="add_app1">Add</button>
                                                    </div>
                                                  </div>
												  <div id="approver_rows1">  
													<!--<input type="hidden" name="addapprover1_id" value="1">-->

												</div>
                                                
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <p for="colFormLabelSm" class="col-sm-6"><b>Level 2 Approver</b></p>
                                                    <div class="col-sm-3">
                                                      &nbsp;
                                                    </div>
                                                   <div class="col-sm-3">
                                                      <button type="button" class="cr-a" id="add_app2">Add</button>
                                                    </div>
                                                  </div>
												  <div id="approver_rows2">  
								

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
                                                <!--<div class="form-group row">
                                                    <p for="colFormLabelSm" class="col-sm-6"><b>Level 2 Approver</b></p>
                                                    <div class="col-sm-3">
                                                      &nbsp;
                                                    </div>
                                                   <div class="col-sm-3">
                                                      <button type="button" class="cr-a" id="add_app2">Add</button>
                                                    </div>
                                                  </div>
												  <div id="approver_rows2">  
								

													</div>-->
                                                
                                                <!--<div class="form-group row mt-top mb-3">  
                                                    <div class="col-md-4">&nbsp;</div>
                                                      <div class="col-md-4">
                                                        <button class="ref-btn">Save</button>
                                                      </div>
                                                      <div class="col-md-4">&nbsp;</div>
                                                  </div>-->
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    &nbsp;
                                                  </div>
                                            </div>
                                        </div>
									</form>
                                        <div style="width: 100%;border-bottom: 2px solid #000;height: 2px;margin-bottom: 15px;"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table id="approval-table" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Approval Type</th>
                                                                <th>Employee Code and  Name</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
														<?PHP
														foreach($list as $list){								
														?>
                                                            <tr>
                                                                <td><?PHP echo $list->level; ?></td>
                                                                <td><?PHP echo $list->empname; ?></td>
                                                                
																<?PHP
															if($list->active_status==true){
																?>
																
																<td style="text-align: center;">
													Active
													<label class="switch" title="Mark as Inactive"> <input type="checkbox" checked="checked" onclick="if(confirm('Are you sure want to change the status?')){ window.location.assign('<?php echo base_url('approver_level/change_status/'.$list->client_approver_id.'/'.$list->active_status); ?>'); } else{ return false; }"> <span class="switch-slider round"></span> </label>
												</td>
												
                                                                <?PHP
																 }
																else{
																?>
																<td style="text-align: center;">
													Inactive
													<label class="switch" title="Mark as Active"> <input type="checkbox" onclick="if(confirm('Are you sure want to change the status?')){ window.location.assign('<?php  echo base_url('approver_level/change_status/'.$list->client_approver_id.'/'.$list->active_status); ?>'); } else{ return false; }"> <span class="switch-slider round"></span> </label>
												</td> 
																	
																<?PHP
																}
																?>
                                                            </tr>
														<?PHP
														}								
														?>
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
              </div>
          </div>
</section>

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
    $('#approval-table').DataTable();
	addapprover1();
	addapprover2();
} );


var approver1 = ''; 
<?php foreach($approver1 as $approver) { ?>
approver1 += '<option value="<?PHP echo $approver->employee_id;?>"><?PHP echo $approver->empname; ?></option>';
<?php } ?>



function addapprover1(){
		//alert('kk');
        var row_html ='';
		row_html +='<div class="" id="" ></div>';
              
				row_html +='<div class="form-group row">';
					row_html +='<label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Approver Name : </label>';
					row_html +='<div class="col-sm-6">';
						row_html +='<select type="text" class="form-control form-control-sm" id="employee_id" name="employee_id_1[]" >';
								row_html +='<option value="">Select Approver Name</option>';
								row_html += approver1;
								row_html += '<?php echo form_error('state_name' ); ?>';
						row_html +='</select>';
					row_html +='</div>';
				row_html +='</div>';
							
		row_html += '</div>';
        $("#approver_rows1").html(row_html);
    }
	
	var cnt =0;
 $("#add_app1").on('click', function () {
	// alert('ss');
          cnt++;

           var row_html ='';row_html +='<div class="add_more_approver" id="add_more_approver'+cnt+'" >';
              
                    row_html +='<div class="form-group row">';
						row_html +='<label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Approver Name : </label>';
						row_html +='<div class="col-sm-6">';
							row_html +='<select type="text" class="form-control form-control-sm" id="employee_id" name="employee_id_1[]" >';
								row_html +='<option value="">Select Approver Name</option>';
								row_html += approver1;
							row_html +='</select>';
														
						row_html +='</div>';
						row_html +='<div class="col-sm-3">';
							row_html +=	'<button type="button" class="but-btn b-0 del_div" style:"background: transparent;border: none;margin-top: -10px;" value="delete" id="del_div'+cnt+'" onclick="delchild('+cnt+')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
						row_html +='</div>';
					row_html +='</div>';
							
					
					
									
					
				
			row_html += '</div>';

            $("#approver_rows1").append(row_html)


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
		
		
		
var approver2 = ''; 
<?php foreach($approver2 as $approver) { ?>
approver2 += '<option value="<?PHP echo $approver->employee_id;?>"><?PHP echo $approver->empname; ?></option>';
<?php } ?>



function addapprover2(){
		//alert('kk');
        var row_html ='';row_html +='<div class="" id="" ></div>';
              
				row_html +='<div class="form-group row">';
					row_html +='<label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Approver Name : </label>';
					row_html +='<div class="col-sm-6">';
						row_html +='<select type="text" class="form-control form-control-sm" id="employee_id2" name="employee_id_2[]" >';
								row_html +='<option value="">Select Approver Name 2</option>';
								row_html += approver2;
						row_html +='</select>';
					row_html +='</div>';
				row_html +='</div>';
							
		row_html += '</div>';
        $("#approver_rows2").html(row_html);
    }
	
	var cntt =0;
 $("#add_app2").on('click', function () {
	// alert('ss');
          cntt++;

           var row_html ='';
		   
		   row_html +='<div class="add_more_approver2" id="add_more_approver2'+cntt+'" >';
		   row_html +='<div class="form-group row">';
						row_html +='<label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Approver Name : </label>';
						row_html +='<div class="col-sm-6">';
							row_html +='<select type="text" class="form-control form-control-sm" id="employee_id2" name="employee_id_2[]" >';
								row_html +='<option value="">Select Approver Name 2</option>';
								row_html += approver2;
							row_html +='</select>';
														
						row_html +='</div>';
						row_html +='<div class="col-sm-3">';
							row_html +=	'<button type="button" class="but-btn b-0 del_div" style:"background: transparent;border: none;margin-top: -10px;" value="delete" id="del_div'+cntt+'" onclick="delchild2('+cnt+')"><i class="fa fa-trash" aria-hidden="true"></i></button>';
						row_html +='</div>';
					row_html +='</div>';
							
					
					
									
					
				
			row_html += '</div>';

            $("#approver_rows2").append(row_html)


			 $('.del_div').on('click',function()
					{
				//alert(abc);
						$(this).parents('.add_more_approver2').remove();
					});
        });
		
		function delchild2(psa)
        {
           // alert(pa);
            $("#add_more_approver2"+psa).remove();
        }

</script>
