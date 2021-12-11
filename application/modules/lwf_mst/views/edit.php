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
                                        <h1 class="text-center">Edit LWF</h1> 
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
                                 <?php echo form_open( base_url( 'lwf_mst/edit' ), array( 'id' => 'clientform', 'class' => 'form-horizontal form-hori-border', 'onSubmit' => 'return validDetail()' ) ); ?>
									<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">State : </label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm" id="state_id" name="state_id" placeholder="Select Staet" required="required">
                                                            
                                                            <?php                                       
                                                                foreach($state as $state) {  
                                                            ?>
                                                                <option <?PHP if($lwfeditdetail->state_id==$state->state_id){echo "selected";} ?>
                                                                value="<?PHP echo $state->state_id;?>" > <?PHP echo $state->state_name; ?></option>
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
                                                        <th colspan="2">Deduction Month</th>
                                                        <th>Employee Contribution </th>
                                                        <th>Employer Contribution </th>
                                                        <th>Total</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody id="tab_body">
												<input type="hidden" name="lwf_id" id="lwf_id"  value = "<?PHP echo $lwfeditdetail->lwf_id; ?>" >
                                                    <tr class="add_more_contact" id="add_more_contact" style="width:100%;">
														<td style="text-align: center;">
                                                            <?PHP 
                                                                 $options = array('M' => 'Monthly', 'Q' => 'Quarterly','H' => 'Half Yearly','Y' => 'Yearly');
                                                                $attributes = array('class' => 'form-control form-control-sm', 'id' => 'period');
                                                                $selected = (set_value('period')) ? set_value('period') : $lwfeditdetail->period;
                                                                echo form_dropdown('period', $options, $selected, $attributes);
                                                            ?>
                                                        </td>
														  
                                                        <td>

                                                        	<input type="hidden" name="prev_date_y" value="<?php echo $lwfeditdetail->date_y; ?>" id="prev_date_y">
                                                        	
                                                         <?PHP //echo $lwfeditdetail->date_h; 

                                                            // if($lwfeditdetail->date_y != '')
                                                            // {
                                                        ?>

                                                            <div id="date_div">

                                                        <?php
                                                                 $options = array('Jan' => 'Jan', 'Feb' => 'Feb','Mar' => 'Mar','Apr' => 'Apr','May' => 'May', 'Jun' => 'Jun', 'Jul' => 'Jul', 'Aug' => 'Aug', 'Sept' => 'Sept', 'Oct' => 'Oct', 'Nov' => 'Nov', 'Dec' => 'Dec');
                                                                 $attributes = array('id' => 'date_y');
                                                                 $selected = (set_value('date_y')) ? set_value('date_y') : $lwfeditdetail->date_y;
                                                                echo form_dropdown('date_y', $options, $selected, $attributes);

                                                        ?>

                                                            </div>
                                                        </td>
                                                        <td>
                                                        	<input type="hidden" name="prev_date_h" value="<?php echo $lwfeditdetail->date_h; ?>" id="prev_date_h">
                                                        <?php
                                                           // }
                                                   

                                                            // if($lwfeditdetail->date_h != '')
                                                            // {
                                                        ?>

                                                            <div id="date_div_h">

                                                        <?php
                                                                 $options = array('Jan' => 'Jan', 'Feb' => 'Feb','Mar' => 'Mar','Apr' => 'Apr','May' => 'May', 'Jun' => 'Jun', 'Jul' => 'Jul', 'Aug' => 'Aug', 'Sept' => 'Sept', 'Oct' => 'Oct', 'Nov' => 'Nov', 'Dec' => 'Dec');
                                                                 $attributes = array('id' => 'date_y');
                                                                 $selected = (set_value('date_h')) ? set_value('date_h') : $lwfeditdetail->date_h;
                                                                echo form_dropdown('date_h', $options, $selected, $attributes);

                                                        ?>

                                                            </div>


                                                        <?php
                                                           // }


                                                         ?>
                                                                                                          
                                                        </td>
														<td><input type="number" required=""  name="employee_contribution" class="form-control form-control-sm text-right" id="employee_contribution" onkeyup="final_count()" onblur="final_count()" value = <?PHP echo $lwfeditdetail->employee_contribution; ?>></td>		 
														<td><input type="number" required="" name="employer_contribution" class="form-control form-control-sm text-right" id="employer_contribution" onkeyup="final_count()" onblur="final_count()" value = <?PHP echo $lwfeditdetail->employer_contribution; ?> ></td>
														<td><input type="number" required="" name="total" class="form-control form-control-sm text-right" id="total" value = <?PHP echo $lwfeditdetail->total; ?> readonly></td>      
		
													</tr>
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
    	  //addnelwf();     

    	  var prev_date_y = $("#prev_date_y").val();
    	  var prev_date_h = $("#prev_date_h").val();
    	  if(prev_date_y == ''){
    	  	$("#date_div").hide();
    	  }
    	  if(prev_date_h == ''){
    	  	$("#date_div_h").hide();
    	  }
                
      });

      $("#period").change(() => {

           let period_drop = $("#period").val();
        
	        if(period_drop == 'Y'){
	            //alert (period);
	            $("#date_div").show();
	            $("#date_div_h").hide();
	        }
	        
	        else if (period_drop == 'H'){
	            $("#date_div_h").show();
	            $("#date_div").show();
	        }
	        else if (period_drop == 'M' || (period_drop == 'Q')){
	            //alert('11');
	            $("#date_div").hide();
	            $("#date_div_h").hide();
	            
	        }
        })		 
				
				  
  //    function addnelwf(){
		//  var cnt = 0;
  //       var resulthtml='';
  //       resulthtml +='<tr class="add_more_contact" id="add_more_contact" style="width:100%;">';
		// resulthtml +='<td><input type="date" required="" name="period_from[]" class="form-control form-control-sm date-picker" id="period_from'+cnt+'"></td>';
  //       resulthtml +='<td><input type="date" name="period_to[]" class="form-control form-control-sm date-picker" id="period_to'+cnt+'"></td>';
  //       resulthtml +='<td><input type="number" required=""  name="employee_contribution[]" class="form-control form-control-sm" id="employee_contribution'+cnt+'" onkeyup="final_count(cnt)" onblur="final_count(cnt)"></td>';		 
  //       resulthtml +='<td><input type="number" required="" name="employer_contribution[]" class="form-control form-control-sm" id="employer_contribution'+cnt+'" onkeyup="final_count(cnt)" onblur="final_count(cnt)"></td>';
  //       resulthtml +='<td><input type="number" required="" name="total[]" class="form-control form-control-sm" id="total'+cnt+'" readonly></td>';      
		
  //       resulthtml +='</tr>';
  //       $("#tab_body").append(resulthtml);
        
  //       //resulthtml +='<td>&nbsp;</td>';
  //       resulthtml +='</tr>';
  //       $("#tab_body").html(resulthtml);

  //   }
	
		//var cnt = 0;
    /*    
	$("#add_more_btn").click(function () 
    {
		cnt++;
        var resulthtml='';
        resulthtml +='<tr class="add_more_contact" id="add_more_contact'+cnt+'" style="width:100%;">';
		resulthtml +='<td><input type="date" required="" name="period_from[]" class="form-control form-control-sm date-picker" id="period_from'+cnt+'"></td>';
        resulthtml +='<td><input type="date" name="period_to[]" class="form-control form-control-sm date-picker" id="period_to'+cnt+'"></td>';
        resulthtml +='<td><input type="number" required=""  name="employee_contribution[]" class="form-control form-control-sm" id="employee_contribution'+cnt+'" onkeyup="final_count(cnt)" onblur="final_count(cnt)"></td>';		
        resulthtml +='<td><input type="number" required="" name="employer_contribution[]" class="form-control form-control-sm" id="employer_contribution'+cnt+'" onkeyup="final_count(cnt)" onblur="final_count(cnt)"></td>';
        resulthtml +='<td><input type="number" required="" name="total[]" class="form-control form-control-sm" id="total'+cnt+'" readonly></td>';       
		
        resulthtml +='<td style="border: none;"><button type="button" class="but-btn" style:"background: transparent;border: none;margin-top: -10px;" value="delete" id="del_div'+cnt+'" onclick="delchild('+cnt+')"><i class="fa fa-trash-o fn-1" aria-hidden="true"></i></button></td>';
        resulthtml +='</tr>';
        $("#tab_body").append(resulthtml);

         //focus_blur();
        $('.del_div').on('click',function()
        {
            //alert(1);
            $(this).parents('.add_more_contact').remove();
        });
    });

     function delchild(abc)
        {
            //alert(abc);
            $("#add_more_contact"+abc).remove();
        }
		*/
	function final_count(){
		//$("#add_more_btn").show();
		employee = $("#employee_contribution").val();
		employer = $("#employer_contribution").val();
		total = (employee * 1) + (employer * 1) ;
		$("#total").val(parseFloat(total).toFixed(2));
		//alert(cnt);
		console.log(total); 
		
	}
	
	/*function validDetail(cnt)
				{
					alert(cnt);
				}*/
	
    </script>