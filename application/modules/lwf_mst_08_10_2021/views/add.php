<?PHP
//print_r($state); exit;
//echo form_dropdown($resource); exit;
?>
<?PHP //echo $state->state_id; exit; ?>
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
                                        <h1 class="text-center">Add LWF</h1> 
                                    </div>
                                    <div class="col-md-1">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('lwf_mst'); ?>" class="cr-a">Back</a>  
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
								<div class="wrapper-box">
								<?php echo validation_errors(); ?>
                                 <?php echo form_open( base_url( 'lwf_mst/add' ), array( 'id' => 'clientform', 'class' => 'form-horizontal form-hori-border', 'onSubmit' => 'return validDetail()' ) ); ?>
									<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">State : </label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm" id="state_id" name="state_id" placeholder="Select Staet" required="required">
                                                            <option value="">Select State</option>
															<?php
															foreach($state as $state) {  
															?>
                                                            <option value="<?PHP echo $state->state_id;?>"><?PHP echo $state->state_name; ?></option>
															<?PHP
															}
															?> 
                                                        </select>
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
                                        <div class="col-md-12">
                                            <table class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Period</th>
                                                        <th>Deduction Month</th>
                                                        <th>Employee Contribution </th>
                                                        <th>Employer Contribution </th>
                                                        <th>Total</th>
                                                        <!--<th><button class="cr-a" id="add_more_btn">Add</button></th>-->
                                                    </tr>
                                                </thead>
                                                <tbody id="tab_body">
                                                    
                                                </tbody>
                                            </table>
                                        </div>
										<div class="col-md-6">
											<div class="form-group row">
												<div class="col-sm-2">
													<div class="">
														<button type="submit" class="cr-a">Save</button>
													</div>
												</div>
												<label for="colFormLabelSm" class="col-sm-10 col-form-label col-form-label-sm">&nbsp;</label>
											 </div>
                                        </div>
                                        <!--<div class="col-md-1">
                                            <button class="cr-a">Add</button>
                                        </div>-->
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
	  
	  $(document).ready(function(){
		 // $("#add_more_btn").hidden();
    	  addnelwf();    
		 // var cnt = 0;
		    $("#date_div"+cnt).hide();
			$("#date_div_h"+cnt).hide();    
			//period_fun(0);	
						
      });
	var cnt = 0;	 
				
				  
     function addnelwf(){
		
        var resulthtml='';
        resulthtml +='<tr class="add_more_contact" id="add_more_contact" style="width:100%;">';
		resulthtml +='<td><select name="period[]" id="period'+cnt+'" onchange="period_fun(cnt)" ><option value="M">Monthly</option><option value="Q">Quarterly</option><option value="H">Half Yearly</option><option value="Y">Yearly</option> </select></td>';
		resulthtml +='<td id="date_div'+cnt+'"><select name="date_y[]" id="date_y'+cnt+'" onchange="period_fun(cnt)"><option value="Jan">Jan</option><option value="Feb">Feb</option><option value="Mar">Mar</option><option value="Apr">Apr</option><option value="May">May</option><option value="Jun">Jun</option><option value="Jul">Jul</option><option value="Aug">Aug</option><option value="Sept">Sept</option><option value="Oct">Oct</option><option value="Nov">Nov</option><option value="Dec">Dec</option> </select></td>';
		
		resulthtml +='<td id="date_div_h'+cnt+'"><select name="date_yy[]" id="date_yy'+cnt+'" onchange="period_fun(cnt)"><option value="Jan">Jan</option><option value="Feb">Feb</option><option value="Mar">Mar</option><option value="Apr">Apr</option><option value="May">May</option><option value="Jun">Jun</option><option value="Jul">Jul</option><option value="Aug">Aug</option><option value="Sept">Sept</option><option value="Oct">Oct</option><option value="Nov">Nov</option><option value="Dec">Dec</option> </select><select name="date_h[]" id="date_h'+cnt+'" onchange="period_fun(cnt)"><option value="Jan">Jan</option><option value="Feb">Feb</option><option value="Mar">Mar</option><option value="Apr">Apr</option><option value="May">May</option><option value="Jun">Jun</option><option value="Jul">Jul</option><option value="Aug">Aug</option><option value="Sept">Sept</option><option value="Oct">Oct</option><option value="Nov">Nov</option><option value="Dec">Dec</option> </select></td>';
		
		resulthtml +='<td id="date_div_show'+cnt+'" ></td>';
		
        /*resulthtml +='<td><input type="date" name="period_to[]" class="form-control form-control-sm date-picker" id="period_to'+cnt+'"></td>';*/
        resulthtml +='<td><input type="number" required=""  name="employee_contribution[]" class="form-control form-control-sm text-right" id="employee_contribution'+cnt+'" onkeyup="final_count(cnt)" onblur="final_count(cnt)"></td>';		 
        resulthtml +='<td><input type="number" required="" name="employer_contribution[]" class="form-control form-control-sm text-right" id="employer_contribution'+cnt+'" onkeyup="final_count(cnt)" onblur="final_count(cnt)"></td>';
        resulthtml +='<td><input type="number" required="" name="total[]" class="form-control form-control-sm text-right" id="total'+cnt+'" readonly></td>';      
		
        /*resulthtml +='</tr>';
        $("#tab_body").append(resulthtml);*/
        
        //resulthtml +='<td>&nbsp;</td>';
        resulthtml +='</tr>';
        $("#tab_body").html(resulthtml);
		
		

    }
	
		//var cnt = 0;
        
	$("#add_more_btn").click(function () 
    {

		cnt++;
		  
        var resulthtml='';
        resulthtml +='<tr class="add_more_contact" id="add_more_contact'+cnt+'" style="width:100%;">';		
		resulthtml +='<td><select name="period[]" id="period'+cnt+'" onchange="period_fun(cnt)"><option value="M">Monthly</option><option value="Q">Quarterly</option><option value="H">Half Yearly</option><option value="Y">Yearly</option> </select></td>';		
		resulthtml +='<td id="date_div'+cnt+'"><select name="date_y[]" id="date_y'+cnt+'" onchange="period_fun(cnt)"><option value="Jan">Jan</option><option value="Feb">Feb</option><option value="Mar">Mar</option><option value="Apr">Apr</option><option value="May">May</option><option value="Jun">Jun</option><option value="Jul">Jul</option><option value="Aug">Aug</option><option value="Sept">Sept</option><option value="Oct">Oct</option><option value="Nov">Nov</option><option value="Dec">Dec</option> </select></td>';
		
		resulthtml +='<td id="date_div_h'+cnt+'"><select name="date_yy[]" id="date_yy'+cnt+'" onchange="period_fun(cnt)"><option value="Jan">Jan</option><option value="Feb">Feb</option><option value="Mar">Mar</option><option value="Apr">Apr</option><option value="May">May</option><option value="Jun">Jun</option><option value="Jul">Jul</option><option value="Aug">Aug</option><option value="Sept">Sept</option><option value="Oct">Oct</option><option value="Nov">Nov</option><option value="Dec">Dec</option> </select><select name="date_h[]" id="date_h'+cnt+'" onchange="period_fun(cnt)"><option value="Jan">Jan</option><option value="Feb">Feb</option><option value="Mar">Mar</option><option value="Apr">Apr</option><option value="May">May</option><option value="Jun">Jun</option><option value="Jul">Jul</option><option value="Aug">Aug</option><option value="Sept">Sept</option><option value="Oct">Oct</option><option value="Nov">Nov</option><option value="Dec">Dec</option> </select></td>';
		
		resulthtml +='<td id="date_div_show'+cnt+'" >  </td>';
        /*resulthtml +='<td><input type="date" name="period_to[]" class="form-control form-control-sm date-picker" id="period_to'+cnt+'"></td>';*/
        resulthtml +='<td><input type="number" required=""  name="employee_contribution[]" class="form-control form-control-sm text-right" id="employee_contribution'+cnt+'" onkeyup="final_count(cnt)" onblur="final_count(cnt)"></td>';		
        resulthtml +='<td><input type="number" required="" name="employer_contribution[]" class="form-control form-control-sm text-right" id="employer_contribution'+cnt+'" onkeyup="final_count(cnt)" onblur="final_count(cnt)"></td>';
        resulthtml +='<td><input type="number" required="" name="total[]" class="form-control form-control-sm text-right" id="total'+cnt+'" readonly></td>';       
		
        resulthtml +='<td style="border: none;"><button type="button" class="but-btn" style:"background: transparent;border: none;margin-top: -10px;" value="delete" id="del_div'+cnt+'" onclick="delchild('+cnt+')"><i class="fa fa-trash-o fn-1 " aria-hidden="true"></i></button></td>';
        resulthtml +='</tr>';
        $("#tab_body").append(resulthtml);
		
		$("#date_div"+cnt).hide();
		$("#date_div_h"+cnt).hide();    
		$("#date_div_show"+cnt).show(); 
		
		
        $('.del_div').on('click',function()
        {
			//$("#date_div"+cnt).hide();
			//$("#date_div_h"+cnt).hide();    
            //alert(1);
            $(this).parents('.add_more_contact').remove();
        });
    });

     function delchild(abc)
        {
            //alert(abc);
            $("#add_more_contact"+abc).remove();
        }
		
	function final_count(cnt){
		//$("#add_more_btn").show();
		employee = $("#employee_contribution"+cnt).val();
		employer = $("#employer_contribution"+cnt).val();
		total = (employee * 1) + (employer * 1) ;
		$("#total"+cnt).val(parseFloat(total).toFixed(2));
		//alert(cnt);
		console.log(total); 
		
	}
	
	function period_fun(cnt){
		//var id = $(cnt).val();
		period = $("#period"+cnt).val();
		
		if(period == 'Y'){
			//alert (period);
			$("#date_div"+cnt).show();
			$("#date_div_h"+cnt).hide();
			$("#date_div_show"+cnt).hide();
		}
		
		else if (period == 'H'){
			$("#date_div_h"+cnt).show();
			$("#date_div"+cnt).hide();
			$("#date_div_show"+cnt).hide();
		}
		else if (period == 'M' || (period == 'Q')){
			//alert('11');
			$("#date_div"+cnt).hide();
			$("#date_div_h"+cnt).hide();
			$("#date_div_show"+cnt).show();
			
		}
		
		
	}
	
	
    </script>