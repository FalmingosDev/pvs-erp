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
                                    <div class="col-md-10">
                                        <h1 class="text-center">Add New It Deduction Rule</h1> 
                                    </div>
                                    <div class="col-md-1">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('it_deduction_rule'); ?>" class="cr-a">Back</a>  
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
							<?php echo form_open('', array( 'id' => 'deduction_form', 'class' => 'form-horizontal' ) ); ?>
								<div class="wrapper-box">
                                <form>
                                            <div class="row">
                                            <div class="col-md-10">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Financial Year <span class="help-inline">*</span> :</label>
                                                    <div class="col-sm-6">
														<?php 
															$attributes = array('class' => 'form-control form-control-sm', 'id' => 'financial_year_id','required'=>'required');
															$selected = (set_value('financial_year_id')) ? set_value('financial_year_id') : '';
															echo form_dropdown('financial_year_id', $financial_year, $selected, $attributes);
														?>
													</div>
													<?php echo form_error('financial_year_id', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                     <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Section <span class="help-inline">*</span> : </label>
                                            <div class="col-sm-8">
                                                       <input type="text" class="form-control form-control-sm" name="section" id="section" placeholder="Section" value="<?php echo set_value('section'); ?>" required="required"/>
                                                    </div>
												<?php echo form_error('section', '<span class="help-inline">', '</span>'); ?>
                                            </div>
                                        </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Description <span class="help-inline">*</span> : </label>
                                            <div class="col-sm-8">
                                                       <input type="text" class="form-control form-control-sm" name="criteria" id="criteria" placeholder="Description" value="<?php echo set_value('criteria'); ?>" required="required"/>
                                                    </div>
                                            <?php echo form_error('criteria', '<span class="help-inline">', '</span>'); ?>
                                        </div>
                                    </div>
                                   


                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Calculation Type: </label>
                                             <div class="col-sm-8"> 
                                                    <select class="form-control form-control-sm" name="header_calculation_type" id="header_calculation_type" onchange="checkType(this.value);">
                                                    <option value = "">Select Calculation Type </option>  
                                                    <option value = "A"> Amount </option>  
                                                        <option value = "P"> Percentage </option> 
                                                        <option value = "N"> N/A </option>
                                                        </select> 
                                                        <!-- <input type="text" class="form-control form-control-sm" name="header_calculation_type" id="header_calculation_type" placeholder="Calculation Type" value="<?php echo set_value('header_calculation_type'); ?>"/> -->
                                                    </div>
                                            <?php echo form_error('header_calculation_type', '<span class="help-inline">', '</span>'); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Max Limit: </label>
                                            <div class="col-sm-8">
                                                       <input type="text" class="form-control form-control-sm" name="header_max_limit" id="header_max_limit" placeholder="Max Limit" value="<?php echo set_value('header_max_limit'); ?>"/>
                                                    </div>
                                            <?php echo form_error('header_max_limit', '<span class="help-inline">', '</span>'); ?>
                                        </div>
                                    </div>

                                    </div>
                                  <div class="row mt-2">
                                        	<h3 class="cl-h3">IT Deduction Details</h3>
                                            <div class="col-md-10">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                      <thead>
                                                        <tr>
                                                          <th scope="col">Sub Head Name<span class="span_star_clr"> *</span> </th>
                                                         <th scope="col">Calculation Type</th>
                                                          <th scope="col">Max Limit </th>
                                                        </tr>
                                                      </thead>
                                                      <tbody id="tab_body">

                                                        <?php if(!empty($it_deduction_detail)){ ?>
                                                        <?php $i = 0; foreach($it_deduction_detail['sub_head_name'] as $detail){ ?>
                                                        
                                                        <tr width="100%" class="add_more_detail" id="add_more_detail'<?php echo $i; ?>'" style="">
                                                            <td><input type="text" name="sub_head_name[]" class="form-control form-control-sm" id="sub_head_name<?php echo $i; ?>" value="<?php echo $detail; ?>"></td>
                                                            <td><select name="calculation_type[]" class="form-control form-control-sm" id="calculation_type<?php echo $i; ?>" value="<?php echo $it_deduction_detail['calculation_type'][$i]; ?>" onchange="checkTypeDetail(this.value, <?php echo $i; ?>);">
                                                            <option value = "">Select Calculation Type </option>  
                                                             <option value = "A"> Amount </option>  
                                                            <option value = "P"> Percentage </option> 
                                                            <option value = "N"> N/A </option>
                                                            </select> 
                                                            </td>

                                                            <td><input type="text" name="max_limit[]" class="form-control form-control-sm" id="max_limit<?php echo $i; ?>" value="<?php echo $it_deduction_detail['max_limit'][$i]; ?>"></td>

                                                            <?php $i++; 
                                                    		$detail_count = $i; ?>

                                                            <?php } ?>
                                                        </tr>

                                                <?php    } ?>

                                                    
                                                      </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="cr-a" id="add_more_btn">Add</button>
                                            </div>
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

        
      </section>
      
      <script> 

$(document).ready(function(){
    	       //$('.date-picker').datepicker();

               <?php if(empty($it_deduction_detail)){ ?>
         	   addnewclient();    

               <?php } ?> 

           
 
            	 });

                 function blankMaxLimit(){
			$('#max_limit').attr('readonly');
		}


        $('body').on('hover', '.nav-item.dropdown', function() {
            $(this).find('.dropdown-toggle').dropdown('toggle');
        });

         $("#state_id").change(() => {
	        var state_id = $("#state_id").val();
	        populatecity(state_id);
    	})

        function checkType(type){
            if(type == 'N'){
                $("#header_max_limit").val("");
                $("#header_max_limit").attr("readonly", "readonly");
            }
            else{
                $("#header_max_limit").removeAttr("readonly");
            }
        }

        function checkTypeDetail(type,cnt){
            if(type == 'N'){
                $("#max_limit"+cnt).val("");
                $("#max_limit"+cnt).attr("readonly", "readonly");
            }
            else{
                $("#max_limit"+cnt).removeAttr("readonly");
            }
        }

  function addnewclient(){
        var resulthtml='';
        resulthtml +='<tr width="100%" class="add_more_detail" style="">';
        resulthtml +='<td><input type="text" name="sub_head_name[]" required="" class="form-control form-control-sm" id="sub_head_name0"></td>';        
        resulthtml +='<td><select name="calculation_type[]" class="form-control form-control-sm" id="calculation_type0" onchange="checkTypeDetail(this.value, 0);"><option value = "">Select Calculation Type </option> <option value = "A"> Amount </option><option value = "P"> Percentage </option><option value = "N"> N/A </option></select></td>';
        resulthtml +='<td><input type="text" name="max_limit[]" class="form-control form-control-sm" id="max_limit0"></td>';
        //resulthtml +='<td>&nbsp;</td>';
        resulthtml +='</tr>';
        $("#tab_body").html(resulthtml);

    }

    <?php if(!empty($it_deduction_detail)){ ?>
    var cnt = <?php echo $detail_count-1 ; ?>;
<?php } else { ?>
	var cnt = 0;
<?php } ?>
    $("#add_more_btn").click(function () 
    {
        cnt++;
        var resulthtml='';
        resulthtml +='<tr class="add_more_detail" id="add_more_detail'+cnt+'" style="width:100%;">';
        resulthtml +='<td><input type="text" required=""  name="sub_head_name[]" class="form-control form-control-sm" id="sub_head_name'+cnt+'"></td>';
        resulthtml +='<td><select required="" name="calculation_type[]" class="form-control form-control-sm" id="calculation_type'+cnt+'" onchange="checkTypeDetail(this.value, '+cnt+');"><option value = "">Select Calculation Type </option> <option value = "A"> Amount </option><option value = "P"> Percentage </option><option value = "N"> N/A </option></select></td>';
        resulthtml +='<td><input type="text" name="max_limit[]" class="form-control form-control-sm" id="max_limit'+cnt+'"></td>';
        resulthtml +='<td style="border: none;"><button type="button" class="but-btn" style:"background: transparent;border: none;margin-top: -10px;" value="delete" id="del_div'+cnt+'" onclick="delchild('+cnt+')"><i class="fa fa-trash-o fn-1" aria-hidden="true"></i></button></td>';
        resulthtml +='</tr>';
        $("#tab_body").append(resulthtml);

        
         //focus_blur();
        $('.del_div').on('click',function()
        {
            //alert(1);
            $(this).parents('.add_more_detail').remove();
        });
    });

     function delchild(abc)
        {
            //alert(abc);
            $("#add_more_detail"+abc).remove();
        }

</script>
