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
                                                                <div class="col-md-10">
                                                                    <h1 class="text-center">Edit It Deduction Rule </h1> 
                                                                </div>
                                                <div class="col-md-2">
                                                        <div class="add-btn-div">
                                                            <a href="<?php echo base_url('it_deduction_rule'); ?>" class="cr-a">Back </a>  
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
                              
							<?php echo form_open('', array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
								<div class="wrapper-box">
                                <form>
                                                    <div class="row">
                                                            <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Financial Year <span class="help-inline">*</span> : </label>
                                                                    <div class="col-sm-9">
                                                                    <input type="hidden" name="it_deduction_id" value="<?php echo $it_deduction_rule->it_deduction_id; ?>">
                                                                    <input type="hidden" name="financial_year_id" value="<?php echo $it_deduction_rule->financial_year_id; ?>">
                                                                    <input class="form-control form-control-sm" type="text" name="" id="" placeholder="Financial Year" value="<?php echo $it_deduction_rule->fy_name; ?>" readonly>
                                                                    
                                                    	
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
                                                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Section <span class="help-inline">*</span> : </label>
                                                                <div class="col-sm-9">
                                                                <input class="form-control form-control-sm" type="text" name="section" id="section" placeholder="Section" value="<?php echo $it_deduction_rule->section; ?>" >
                                                                
                                                <?php echo form_error('section', '<span class="help-inline">', '</span>'); ?>	
                                                                </div>
                                                            </div>
                                                        </div>
                                                
                                                        <div class="col-md-6">
                                                            <div class="form-group row">
                                                                <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm ">Description <span class="help-inline">*</span> : </label>
                                                                <div class="col-sm-8">
                                                                
                                                                    <input type="text" name="criteria" id="criteria" class="form-control form-control-sm" value="<?php echo $it_deduction_rule->criteria; ?>" >
                                                                    <?php echo form_error('criteria', '<span class="help-inline">', '</span>'); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Calculation Type: </label>
                                                            <div class="col-sm-8"> 
                                                                    <!-- <select class="form-control form-control-sm" name="header_calculation_type" id="header_calculation_type" placeholder="Calculation Type" value="<?php echo $it_deduction_rule->calculation_type; ?>">
                                                                    <option value = "">Select Calculation Type </option>  
                                                                    <option value = "A"> Amount </option>  
                                                                        <option value = "P"> Percentage </option> 
                                                                        <option value = "N"> N/A </option>
                                                                        </select>  -->

                                                        <?php 
                                                            $options = array('A' => 'Amount', 'P' => 'Percentage', 'N' => 'N/A');
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'header_calculation_type','onchange' =>'checkType(this.value);');
                                                            $selected_header_calculation_type = (set_value('header_calculation_type')) ? set_value('header_calculation_type') : $it_deduction_rule->calculation_type;
                                                            echo form_dropdown('header_calculation_type', $options, $selected_header_calculation_type, $attributes);
                                                        ?>

                                                            </div>
                                                            <?php echo form_error('header_calculation_type', '<span class="help-inline">', '</span>'); ?>
                                                        </div>
                                                    </div>
                                                        <div class="col-md-6">
                                                                <div class="form-group row">
                                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Max Limit :</label>
                                                                    <div class="col-sm-8">
                                                                    <input type="text" class="form-control form-control-sm" name="header_max_limit" id="header_max_limit" placeholder="Max Limit" value="<?php echo $it_deduction_rule->max_limit; ?>"<?php echo ($selected_header_calculation_type == 'N') ? ' readonly="readonly"' : ''; ?>/>
                                                                    </div>
                                                                    <?php echo form_error('header_max_limit', '<span class="help-inline">', '</span>'); ?>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        
                                        <div class="row mt-2">
                                        	<h3 class="cl-h5">IT Deduction Details</h3>
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
                                                            
                                                            <td>
                                                            <select name="calculation_type[]" class="form-control form-control-sm" id="calculation_type<?php echo $i; ?>" onchange="checkTypeDetail(this.value, <?php echo $i; ?>);">
                                                            <option value = "">Select Calculation Type </option>  
                                                             <option value = "A" <?php echo $it_deduction_detail['calculation_type'][$i] == "A" ? 'selected' : ''; ?>> Amount </option>  
                                                            <option value = "P" <?php echo $it_deduction_detail['calculation_type'][$i] == "P" ? 'selected' : ''; ?>> Percentage </option> 
                                                            <option value = "N" <?php echo $it_deduction_detail['calculation_type'][$i] == "N" ? 'selected' : ''; ?>> N/A </option>
                                                            </select> 
                                                            

                                                            </td>

                                                            <td><input type="text" name="max_limit[]" class="form-control form-control-sm" id="max_limit<?php echo $i; ?>" value="<?php echo $it_deduction_detail['max_limit'][$i]; ?>" <?php echo $it_deduction_detail['calculation_type'][$i] == "N" ? 'readonly' : ''; ?>></td>

                                                            <?php $i++; 
                                                    		$detail_count = $i; ?>

                                                            <?php } ?>
                                                        </tr>
                                                        <?php } else {?>
                                                        <?php $i = 0; foreach($edit_it_deduction_detail as $detail){ ?>

                                                        <tr width="100%" class="add_more_detail" id="add_more_detail'<?php echo $i; ?>'" style="">
                                                            <td>
                                                            <input type="hidden" name="detail_id[]" id="detail_id<?php echo $i; ?>" value="<?php echo $detail['it_deduction_detail_id']; ?>">
                                                            <input type="text" name="sub_head_name[]" class="form-control form-control-sm" id="sub_head_name<?php echo $i; ?>" value="<?php echo $detail['sub_head_name']; ?>"></td>

                                                            <td>

                                                            
                                                            <select name="calculation_type[]" class="form-control form-control-sm" id="calculation_type<?php echo $i; ?>" onchange="checkTypeDetail(this.value, <?php echo $i; ?>);">
                                                            <option value = "">Select Calculation Type </option>  
                                                             <option value = "A" <?php echo $detail['calculation_type'] == "A" ? 'selected' : ''; ?>> Amount </option>  
                                                            <option value = "P" <?php echo $detail['calculation_type'] == "P" ? 'selected' : ''; ?>> Percentage </option> 
                                                            <option value = "N" <?php echo $detail['calculation_type'] == "N" ? 'selected' : ''; ?>> N/A </option> 
                                                            </select> 
                                                            
                                                           
                                                            </td>
                                                    <td><input type="text" name="max_limit[]" class="form-control form-control-sm" id="max_limit<?php echo $i; ?>" <?php echo $edit_it_deduction_detail[$i]['calculation_type'] == "N" ? 'readonly' : ''; ?> value="<?php echo $detail['max_limit']; ?>" ></td>
                                                            
                                                        </tr>



                                                    <?php 
                                                    $i++; 
                                                    $detail_count = $i;

                                                } ?>

                                            <?php } ?>
                                            </tbody>
                                            </table>




                                                </div>
                                            </div>
                                            <?php if($action_type == 'edit' && $mode == 'editable'){ ?>
                                                <div class="col-md-2">
                                                <button type="button" class="cr-a" id="add_more_btn">Add</button>
                                            </div>
											<?php } ?>
                                        </div>
                                        <!-- <div id="resource_rows">
                                        </div> -->
                                        <div class="row">
                                            <div class="col-md-5"></div>
                                                <div class="col-md-2">                                             
                                                  <button type="submit" class="cr-a">Save</button>
                                                </div>
                                            <div class="col-md-5"></div>

                                            </div>  
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
      </section>
	  
<script>
        
            $(document).ready(function(){
    	       //$('.date-picker').datepicker();
            //    $('.selected').selected();

            //    <?php if(empty($it_deduction_detail)){ ?>
         	//    addnewdetail();    

            //    <?php } ?>  
            	 });

        $('body').on('hover', '.nav-item.dropdown', function() {
            $(this).find('.dropdown-toggle').dropdown('toggle');
        });
        
        function checkType(type){
            if(type == 'N'){
                $("#header_max_limit").val("");
                $("#header_max_limit").attr("readonly", true);
            }
            else{
                $("#header_max_limit").removeAttr("readonly");
            }
        }

        function checkTypeDetail(type,cnt){
            if(type == 'N'){
                $("#max_limit"+cnt).val("");
                $("#max_limit"+cnt).attr("readonly", true);
            }
            else{
                $("#max_limit"+cnt).removeAttr("readonly");
            }
        }
    


    <?php if(!empty($edit_it_deduction_detail)){ ?>
    var cnt = <?php echo $detail_count-1 ; ?>;
    <?php } else { ?>
        var cnt = 0;
    <?php } ?>
    //alert(cnt);
    $("#add_more_btn").click(function () 
    {
                cnt++;
                
                var resulthtml='';
                resulthtml +='<tr class="add_more_detail" id="add_more_detail'+cnt+'" style="width:100%;">';
                
                resulthtml +='<td><input type="text" required=""  name="sub_head_name[]" class="form-control form-control-sm" value ="" id="sub_head_name'+cnt+'"></td>';
               
                resulthtml +='<td><select required="" name="calculation_type[]" class="form-control form-control-sm" value ="<?php echo $it_deduction_rule->calculation_type; ?>" id="calculation_type'+cnt+'" onchange="checkTypeDetail(this.value, '+cnt+');"><option value = "">Select Calculation Type </option> <option value = "A"> Amount </option><option value = "P"> Percentage </option><option value = "N"> N/A </option></select></td>';

                // resulthtml +='<td><select id="calculation_type'+cnt+'" class="form-control form-control-sm" name="calculation_type[]" class="lh-width class="form-control form-control-sm"" required></select></td>'; 

                resulthtml +='<td><input type="text" name="max_limit[]" class="form-control form-control-sm" value ="" id="max_limit'+cnt+'"></td>';
                resulthtml +='<td style="border: none;"><button type="button" class="but-btn" style:"background: transparent;border: none;margin-top: -10px;" value="delete" id="del_div'+cnt+'" onclick="delchild('+cnt+')"><i class="fa fa-trash-o fn-1" aria-hidden="true"></i></button></td>';
                resulthtml +='</tr>';
                $("#tab_body").append(resulthtml);

              var position = cnt;
            
                
                //focus_blur();
                $('.del_div').on('click',function()
                {
                    // alert(1);
                    $(this).parents('.add_more_detail').remove();
                });
            });

            function delchild(abc)
                {
                    // alert(abc);
                    $("#add_more_detail"+abc).remove();
                }

</script>

