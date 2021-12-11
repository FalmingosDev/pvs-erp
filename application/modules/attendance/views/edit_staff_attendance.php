<?PHP
//print_r($detail->attendance_month); exit;
?>
<style type="text/css">
      .ui-datepicker-calendar {
    display: none;
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
								<div class="row">
                                    <div class="col-md-11">
                                        <h1 class="employee-box">Staff Attendance Entry</h1>   
                                    </div>
                                    <div class="col-md-1">
                                        <a class="cr-a" href="<?php echo base_url('attendance/staff'); ?>" class="ad-btn-a-tag">Back</a>
                                    </div>
                                </div>
								
							<?php echo form_open( base_url( 'attendance/edit'), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>        
			<input type="hidden" name="id" value="<?php echo $detail->attendance_id; ?>">							
								<div class="wrapper-box">
                                    <div class="row">
                                        <div class="col-md-4">
                                            
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Months : </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" placeholder="Select Month" id="month" name="month" value="<?php echo $detail->attendance_month; ?>" readonly>
                                                    </div>
                                                  </div>
                                            </div>
                                       </div>  
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Branch : </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm"value="<?php echo $detail->branch_name; ?>" readonly>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">&nbsp; </label>
                                                    <div class="col-sm-9">
                                                        &nbsp;
                                                    </div> 
                                                  </div>
                                            </div>
                                        </div> 
                                    <div class="row">
                                        <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Employee Code & Name : </label>
                                                    <div class="col-sm-9">
                                                       <input type="text" class="form-control form-control-sm"value="<?php echo $detail->empname; ?>" readonly>
                                                    </div> 
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Designation :</label>
                                                    <div class="col-sm-9" > 
                                                      <input type="text" class="form-control form-control-sm"value="<?php echo $detail->desig_name; ?>" readonly>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div> 
                                    <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Lop : </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" name="lop" id="lop" placeholder="Enter LOP" value="<?php echo $detail->lop; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Ot Hrs : </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" name="ot_hrs" id="ot_hrs" value="<?php echo $detail->ot_hrs; ?>">
                                                    </div> 
                                                  </div>
                                            </div>
                                        <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">Incentive : </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" name="incentive" id="incentive" value="<?php echo $detail->incentive; ?>" >
                                                    </div> 
                                                  </div>
                                            </div>
                                        </div> 
                                    <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">EL: </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" name="el" id="el" value="<?php echo $detail->el; ?>" readonly>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">CL : </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" name="cl" id="cl" value="<?php echo $detail->cl; ?>" readonly>
                                                    </div> 
                                                  </div>
                                            </div>
                                        <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">SL : </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" name="sl" id="sl" value="<?php echo $detail->sl; ?>" readonly>
                                                    </div> 
                                                  </div>
                                            </div>
                                        </div> 
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0 ">Arear Pf Amount : </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" name="pf_amount" id="pf_amount" onchange ="pf()" value="<?php echo $detail->area_pf; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0 ">Arear Others : </label>  
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" name="area_others" id="area_others" onchange ="other()" value="<?php echo $detail->area_others; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div> 
                                    <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <p><b>Leave Details</b></p>
                                                  </div>
                                            </div>
                                        </div> 
                                    <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm pr-0 "><b>Opening</b></label>  
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0 ">EL : </label>
                                                    <div class="col-sm-9">
                                                        <p class="form-control form-control-sm mb-0" style="background: #eee !important;">35.80</p>
                                                    </div>
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0 ">CL : </label>
                                                    <div class="col-sm-9">
                                                        <p class="form-control form-control-sm mb-0" style="background: #eee !important;">0.00</p>
                                                    </div>
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0 ">SL : </label>
                                                    <div class="col-sm-9">
                                                        <p class="form-control form-control-sm mb-0" style="background: #eee !important;">3.90</p>
                                                    </div>
                                                  </div>
                                            </div>
                                        <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm pr-0 "><b>Leave Taken</b></label>  
                                                  </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-9">
                                                        <p class="form-control form-control-sm mb-0" style="background: #eee !important;">0.00</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-9">
                                                        <p class="form-control form-control-sm mb-0" style="background: #eee !important;">0.00</p>
                                                    </div>
                                                </div>
                                            <div class="form-group row">
                                                    <div class="col-sm-9">
                                                        <p class="form-control form-control-sm mb-0" style="background: #eee !important;">0.00</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    <div class="form-group row mt-top mb-3">  
										<div class="col-md-5">&nbsp;</div>
										  <div class="col-md-2">
											<button class="cr-a" type="submit">Save</button>
										  </div>
										  <div class="col-md-5">&nbsp;</div>
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
		function check_value()
		{
			alert('sss'); 
		}
</script>
<!-- Date Picker Script -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
<!-- Date Picker Script -->
<script>
    function desig_fetch(){
        var desig = $('#employee').val();
        $.ajax({
        type: 'POST',   
        url: '<?php echo base_url('attendance/add_desig'); ?>',
        data: {desig: desig,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
        dataType: 'json',
        encode: true,
    })
		.done(function(data){			
        $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
		//alert(data.status);
        if(data.status){  
		var result ='';
		
				//alert(data.deg_name.desig_name);
				result +='<input type="text" class="form-control form-control-sm" style="background: #eee !important;" id="designation" name="designation" readonly value="'+data.deg_name.desig_name+'">';
            
        }
		
        $("#designation").html(result);
		
    
    })
    }
</script>
<script>
    function employee_fetch(){
        var employee = $('#branch').val();
        // alert(employee);
		$.ajax({
        type: 'POST',   
        url: '<?php echo base_url('attendance/add_employee'); ?>',
        data: {employee: employee,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
        dataType: 'json',
        encode: true,
    })
        
		.done(function(data){			
        $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
		//alert(data.status);
        if(data.status){  
		var result ='';		
            result +='<option value="">Select Employee</option>';
				//alert(data.employee);
            $.each(data.emp_list,function(key,value){
            	//alert(value.employee_id);
                result +='<option value="'+value.employee_id+'">'+value.employee_name+'</option>';
            });
        }
        else{
            result +='<option value="">No Employee selected</option>';
        }
        $("#employee").html(result);
       // $("#city_id").selectpicker("refresh");
    
    })
	.fail(function(data){
        // show the any errors
        console.log(data);
    });
    }
	
	function pf(){
		document.getElementById("area_others").required = true;
	}
	function other(){
		document.getElementById("pf_amount").required = true;
	}
</script>


