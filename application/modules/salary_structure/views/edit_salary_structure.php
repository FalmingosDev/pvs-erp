
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<style>
	.table-condensed{
		width: 185px !important;
	}
    .pencil-font{
        padding: 10px;
        background: #1dd046;
        color: #000;
        border-radius: 5px;
    }
/*    .ui-datepicker-year
{
    display:none;   
}*/
</style>
<section class="main-wrapper">
          <div class="container">
            <div class="row">
                <div class="col-md-12">
                    

                  <?php //echo employeeTabs(); ?>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-client" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                
                            </div>
                            <div class="col-md-5">
                                <div class="add-btn-div">
                                    <a href="<?php echo base_url('staff'); ?>" class="ad-btn-a-tag">Back</a>  
                                </div>
                            </div>
                        </div>
                        <div class="row">


                        <div class="col-md-12">
                            <?php if($this->session->flashdata('msg')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert" id="show_msg">
                                <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <?php endif; ?>   
                                <h1 class="employee-box">Salary Structure For Staff</h1>

                                <?php echo validation_errors(); ?> 
                                    <div class="wrapper-box">
                                        <?php echo form_open( base_url( 'salary_structure/edit/'. $edit_salary->salary_structure_id.'/'.$edit_salary->employee_id ), array( 'id' => 'salarystructureform', 'class' => 'form-horizontal form-hori-border','onSubmit' => 'return validDetail()' ) ); ?>
                                        <input type="hidden" name="employee_id" value="<?php echo $edit_salary->employee_id; ?>">
                                        <input type="hidden" name="salary_structure_id" value="<?php echo $edit_salary->salary_structure_id; ?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Employee Code : </label>
                                                    <div class="col-sm-9">
                                                      <p><?php echo $edit_salary->employee_code; ?></p>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Employee Name : </label>
                                                    <div class="col-sm-8">
                                                      <p><?php echo $edit_salary->first_name . ' ' . $edit_salary->last_name; ?></p>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">  
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Designation : </label>
                                                    <div class="col-sm-9">
                                                        <p><?php echo $edit_salary->desig_name; ?></p>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Department :<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-9">
                                                        <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'dept_id');
                                                            $selected = (set_value('dept_id')) ? set_value('qualification_id') : $edit_salary->department_id;
                                                            echo form_dropdown('dept_id', $department, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">  
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Effective Date : <span class="span_star_clr"> *</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control form-control-sm" id="" name="eff_date" value="<?php echo (set_value('eff_date')) ? set_value('eff_date') : $edit_salary->effective_date; ?>">
                                                    </div>
                                                  </div>
                                            </div>
											
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Applicable for : <span class="span_star_clr"> *</span></label>
                                                    <div class="col-sm-5">
                                                        <label class="cont-radio-location"><input type="checkbox" name="applicable_for[]" id="applicable_for_I" value="I"<?php echo ($edit_salary->incremenr_flag == 1) ? ' checked="checked"' : ''; ?>>Increment</label>
														<label class="cont-radio-location"><input type="checkbox" name="applicable_for[]" id="applicable_for_P" value="P" onclick="showHideDesignation()"<?php echo ($edit_salary->promotion_flag == 1) ? ' checked="checked"' : ''; ?>>Promotion</label>
                                                    </div>
													<div class="col-sm-4" id="designation_div"<?php echo ($edit_salary->promotion_flag == 0) ? ' style="display:none;"' : ''; ?>>
                                                        <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Designation</label>
														<?php 
															$attributes = array('class' => 'form-control form-control-sm', 'id' => 'designation_id');
															$selected = (set_value('designation_id')) ? set_value('designation_id') : $employee->designation_id;
															echo form_dropdown('designation_id', $desig, $selected, $attributes);
														?>
                                                    </div>
                                                </div>
											</div>
											
                                        </div>
                                         <div class="row">  
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Gross Pay : <span class="span_star_clr"> *</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="gross_pay" name="gross_pay" value="<?php echo (set_value('gross_pay')) ? set_value('gross_pay') : $edit_salary->gross_pay; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Email : </label>
                                                        <div class="col-sm-9">
                                                            <input type="email" class="form-control form-control-sm" id="" name="email" value="<?php echo (set_value('email')) ? set_value('email') : $edit_salary->email; ?>">
                                                        </div>
                                                </div>
                                            </div>
                                            </div>
                                        <div class="row">  
                                            <div class="col-md-6" style="border: 1px solid #b1a8a8;">
                                                <div class="form-group row"> 
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered-sm-h" style="width: 100%;">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="width: 14%;">Head<span class="span_star_clr"> *</span></th>
                                                                        <th style="width: 14%;">Type</th>
                                                                        <th style="width: 14%;">Rate<span class="span_star_clr"> *</span></th>
                                                                        <th style="width: 14%;">Basis</th>
                                                                        <th style="width: 14%;">Limit</th>
                                                                        <th style="width: 14%;">Criteria</th>
                                                                        <th style="width: 14%;">Periodicity</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody id="salary_head">
                                                                    <?php if(!empty($salary_structure)){ ?>
                                                                        <?php $i = 0; foreach($salary_structure['head_id'] as $contact){ ?>

                                                                        <tr>
                                                                            <td>
                                                                                <input type="hidden" name="detail_id[]" id="detail_id<?php echo $i; ?>" value="<?php echo $salary_structure['detail_id'][$i]; ?>">
                                                                                <?php 

                                                                                    if($i == 0)
                                                                                    {
                                                                                        $options = array('1' => 'Basic');
                                                                                        $attributes = array('class' => 'lh-width head', 'id' => 'head_id'.$i ,'data-position' => $i);
                                                                                        echo form_dropdown('head_id[]', $options, '1' , $attributes);
                                                                                    
                                                                                    }
                                                                                    else
                                                                                    {
                                                                                     $attributes = array('class' => 'lh-width head', 'id' => 'head_id'.$i ,'data-position' => $i);
                                                                                     echo salary_head_dropdown('head_id[]',$salary_structure['head_id'][$i],$attributes);
                                                                                    }
                                                                            
                                                                                ?>
                                                                            </td>

                                                                            <td>
                                                                                <?php
                                                                                  $options = array('%' => '%','days' => 'Days');
                                                                                  $attributes = array('class' => 'lh-width type', 'id' => 'type_id'.$i ,'data-position' => $i);
                                                                                  
                                                                                  echo form_dropdown('type_id[]', $options, $salary_structure['type_id'][$i], $attributes);
                                                                                ?>
                                                                            </td>

                                                                            <td>
                                                                                <input id="rate<?php echo $i; ?>" name="rate[]" data-position="<?php echo $i; ?>" type="text" class="lh-width rate" value="<?php echo $salary_structure['rate'][$i]; ?>"><input id="max_prcnt<?php echo $i; ?>" name="max_prcnt[]" data-position="<?php echo $i; ?>" type="hidden" class="lh-width max_prcnt" value="<?php echo $salary_structure['max_prcnt'][$i]; ?>"><input id="min_prcnt<?php echo $i; ?>" name="min_prcnt[]" data-position="<?php echo $i; ?>" type="hidden" class="lh-width min_prcnt" value="<?php echo $salary_structure['min_prcnt'][$i]; ?>">
                                                                            
                                                                            </td>

                                                                            <td>
                                                                            <?php

                                                                            if($i == 0)
                                                                            {
                                                                              $options = array('gross' => 'Gross');
                                                                              $attributes = array('class' => 'lh-width basis', 'id' => 'basis'.$i ,'data-position' => $i);
                                                                              echo form_dropdown('basis[]', $options, 'gross', $attributes);
                                                                            }
                                                                            else
                                                                            {
                                                                                $options = array('gross' => 'Gross', 'basic' => 'Basic');
                                                                                $attributes = array('class' => 'lh-width basis', 'id' => 'basis'.$i ,'data-position' => $i);
                                                                                echo form_dropdown('basis[]', $options, $salary_structure['basis'][$i], $attributes);
                                                                            }
                                                                            ?>
                                                                            </td>

                                                                            <td>
                                                                            <?php 

                                                                                $options = array('N/A' => 'N/A', 'fixed' => 'Fixed','max' => 'Max');
                                                                                $attributes = array('class' => 'lh-width limit', 'id' => 'limit'.$i ,'data-position' => $i);
                                                                                echo form_dropdown('limit[]', $options, $salary_structure['limit'][$i], $attributes);

                                                                            ?>
                                                                            </td>

                                                                            <td>
                                                                                <input id="criteria<?php echo $i; ?>" name="criteria[]" data-position="<?php echo $i; ?>" type="text" class="lh-width criteria" value="<?php echo $salary_structure['criteria'][$i]; ?>">
                                                                            </td>
                                                                            <td>
                                                                            <?php 

                                                                                $options = array('monthly' => 'Monthly', 'half_yearly' => 'H.Yearly','yearly' => 'Yearly');
                                                                                $attributes = array('class' => 'lh-width periodicity', 'id' => 'periodicity'.$i ,'data-position' => $i);
                                                                                echo form_dropdown('periodicity[]', $options, $salary_structure['periodicity'][$i], $attributes);

                                                                            ?>
                                                                            </td>


                                                                            <script>

                                                                            var get_type = $("#limit<?php echo $i; ?>").val();
                                                                             if(get_type == 'N/A')
                                                                             {
                                                                                $('#criteria<?php echo $i; ?>').prop('readonly', true);
                                                                             }
                                                                             else
                                                                             {
                                                                                $('#criteria<?php echo $i; ?>').removeAttr('required');
                                                                             }

                                                                            $("#head_id<?php echo $i; ?>").change(function(event){
                                                                                max_id = ("max_prcnt<?php echo $i; ?>");
                                                                                min_id = ("min_prcnt<?php echo $i; ?>");
                                                                                
                                                                                max = $(this).find(':selected').data('max');
                                                                                $("#"+max_id).val(max);

                                                                                min = $(this).find(':selected').data('min');
                                                                                $("#"+min_id).val(min);

                                                                            });

                                                                             $("#limit<?php echo $i; ?>").change(function(event){ 
                                                                                limit = $(this).val();
                                                                                if(limit == "fixed" || limit == "max")
                                                                                {
                                                                                    
                                                                                    $('#criteria<?php echo $i; ?>').attr('required', true);
                                                                                    $('#criteria<?php echo $i; ?>').prop('readonly', false);
                                                                                }
                                                                                else
                                                                                {
                                                                                    $("#criteria<?php echo $i; ?>").val('');
                                                                                    $('#criteria<?php echo $i; ?>').removeAttr('required');                
                                                                                    $('#criteria<?php echo $i; ?>').prop('readonly', true);
                                                                                }
                                                                            });


                                                                        </script>

                                                                        </tr>
                                                                    <?php 
                                                                        $i++; 
                                                                        $contact_count = $i; 
                                                                    ?>
                                                            <?php } ?>
                                                            <?php } else { ?>

                                                            <?php $i = 0; foreach($edit_sal_detail as $contact){ ?>
                                                                    <tr>
                                                                      <td>
                                                                        <input type="hidden" name="detail_id[]" id="detail_id<?php echo $i; ?>" value="<?php echo $contact['salary_structure_detail_id']; ?>">
                                                                        <?php 

                                                                            if($i == 0)
                                                                            {
                                                                                $options = array('1' => 'Basic');
                                                                                $attributes = array('class' => 'lh-width head', 'id' => 'head_id'.$i ,'data-position' => $i);
                                                                                echo form_dropdown('head_id[]', $options, '1' , $attributes);
                                                                            
                                                                            }
                                                                            else
                                                                            {
                                                                             $attributes = array('class' => 'lh-width head', 'id' => 'head_id'.$i ,'data-position' => $i);
                                                                             echo salary_head_dropdown('head_id[]',$contact['salary_head_id'],$attributes);
                                                                            }
                                                                            
                                                                        ?>
                                                                        </td> 
                                                                        <td>
                                                                            <?php
                                                                              $options = array('%' => '%','days' => 'Days');
                                                                              $attributes = array('class' => 'lh-width type', 'id' => 'type_id'.$i ,'data-position' => $i);
                                                                              
                                                                              echo form_dropdown('type_id[]', $options, $contact['type'], $attributes);
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <input id="rate<?php echo $i; ?>" name="rate[]" data-position="<?php echo $i; ?>" type="text" class="lh-width rate" value="<?php echo $contact['rate']; ?>"><input id="max_prcnt<?php echo $i; ?>" name="max_prcnt[]" data-position="<?php echo $i; ?>" type="hidden" class="lh-width max_prcnt" value="<?php echo $contact['max_prcntg']; ?>"><input id="min_prcnt<?php echo $i; ?>" name="min_prcnt[]" data-position="<?php echo $i; ?>" type="hidden" class="lh-width min_prcnt" value="<?php echo $contact['min_prcntg']; ?>">
                                                                            
                                                                        </td>
                                                                        <td>
                                                                            <?php

                                                                            if($i == 0)
                                                                            {
                                                                              $options = array('gross' => 'Gross');
                                                                              $attributes = array('class' => 'lh-width basis', 'id' => 'basis'.$i ,'data-position' => $i);
                                                                              echo form_dropdown('basis[]', $options, 'gross', $attributes);
                                                                            }
                                                                            else
                                                                            {
                                                                                $options = array('gross' => 'Gross', 'basic' => 'Basic');
                                                                                $attributes = array('class' => 'lh-width basis', 'id' => 'basis'.$i ,'data-position' => $i);
                                                                                echo form_dropdown('basis[]', $options, $contact['basis'], $attributes);
                                                                            }
                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <?php 

                                                                                $options = array('N/A' => 'N/A', 'fixed' => 'Fixed','max' => 'Max');
                                                                                $attributes = array('class' => 'lh-width limit', 'id' => 'limit'.$i ,'data-position' => $i);
                                                                                echo form_dropdown('limit[]', $options, $contact['limit'], $attributes);

                                                                            ?>
                                                                        </td>
                                                                        <td>
                                                                            <input id="criteria<?php echo $i; ?>" name="criteria[]" data-position="<?php echo $i; ?>" type="text" class="lh-width criteria" value="<?php echo $contact['criteria']; ?>">
                                                                        </td>
                                                                        <td>
                                                                            <?php 

                                                                                $options = array('monthly' => 'Monthly', 'half_yearly' => 'H.Yearly','yearly' => 'Yearly');
                                                                                $attributes = array('class' => 'lh-width periodicity', 'id' => 'periodicity'.$i ,'data-position' => $i);
                                                                                echo form_dropdown('periodicity[]', $options, $contact['periodicity'], $attributes);

                                                                            ?>
                                                                        </td>


                                                                        
                                                                        <script>
                                                                            var get_type = $("#limit<?php echo $i; ?>").val();
                                                                             if(get_type == 'N/A')
                                                                             {
                                                                                $('#criteria<?php echo $i; ?>').prop('readonly', true);
                                                                             }
                                                                             else
                                                                             {
                                                                                $('#criteria<?php echo $i; ?>').removeAttr('required');
                                                                             }

                                                                            $("#head_id<?php echo $i; ?>").change(function(event){
                                                                                max_id = ("max_prcnt<?php echo $i; ?>");
                                                                                min_id = ("min_prcnt<?php echo $i; ?>");
                                                                                
                                                                                max = $(this).find(':selected').data('max');
                                                                                $("#"+max_id).val(max);

                                                                                min = $(this).find(':selected').data('min');
                                                                                $("#"+min_id).val(min);

                                                                            });

                                                                             $("#limit<?php echo $i; ?>").change(function(event){ 
                                                                                limit = $(this).val();
                                                                                if(limit == "fixed" || limit == "max")
                                                                                {
                                                                                    
                                                                                    $('#criteria<?php echo $i; ?>').attr('required', true);
                                                                                    $('#criteria<?php echo $i; ?>').prop('readonly', false);
                                                                                }
                                                                                else
                                                                                {
                                                                                    $("#criteria<?php echo $i; ?>").val('');
                                                                                    $('#criteria<?php echo $i; ?>').removeAttr('required');                
                                                                                    $('#criteria<?php echo $i; ?>').prop('readonly', true);
                                                                                }
                                                                            });


                                                                        </script>
                                                                    </tr>

                                                                <?php $i++; 
                                                                $contact_count = $i;

                                                            } ?>

                                                            <?php } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                </div>
                                                <div class="row mb-3"> 
                                                    <div class="col-md-3" style="">
                                                        <button class="cr-a" type="button" onclick="populateCalculation()">Calculate</button>
                                                    </div>
                                                    <div class="col-md-6">&nbsp;</div>
                                                    <div class="col-md-3" style="">
                                                        <button class="cr-a" id="add_more_btn" type="button">Add</button>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-12">
                                                        <span id="header_show"></span>
                                                    </div>
                                                </div>
                                                  
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">PF Wage : <span class="span_star_clr"> *</span></label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control form-control-sm" id="" name="pf_wage" value="<?php echo (set_value('pf_wage')) ? set_value('pf_wage') : $edit_salary->pf_wage; ?>">
                                                    </div>
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">OT Rate : </label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control form-control-sm" id="" name="ot_rate" value="<?php echo (set_value('ot_rate')) ? set_value('ot_rate') : $edit_salary->ot_rate; ?>">
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Monthly CTC : </label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control form-control-sm" id="monthly_ctc" name="monthly_ctc" readonly="" value="<?php echo (set_value('monthly_ctc')) ? set_value('monthly_ctc') : $edit_salary->monthly_ctc; ?>">
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Annual CTC : </label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control form-control-sm" id="annual_ctc" name="annual_ctc" readonly="" value="<?php echo (set_value('annual_ctc')) ? set_value('annual_ctc') : $edit_salary->annual_ctc; ?>">
                                                    </div>
                                                  </div>
                                              </div>
                                            </div>
                                        <div class="row">
                                                <div class="col-md-6" style="border: 1px solid #c3baba;margin: 18px 0px;">  
                                                    <div class="border-cl">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p><b>Opening Balance</b></p>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">EL :</label>
                                                        <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" readonly="" name="ob_el" value="<?php echo (set_value('ob_el')) ? set_value('ob_el') : $edit_salary->opening_el; ?>">
                                                    </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">SL :</label>
                                                        <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="ob_sl" readonly="" value="<?php echo (set_value('ob_sl')) ? set_value('ob_sl') : $edit_salary->opening_sl; ?>">
                                                    </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">CL :</label>
                                                        <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="ob_cl" readonly="" value="<?php echo (set_value('ob_cl')) ? set_value('ob_cl') : $edit_salary->opening_cl; ?>">
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6" style="border: 1px solid #c3baba;margin: 18px 0px;">  
                                                    <div class="border-cl">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p><b>Leave Taken As of today :</b></p>  
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">EL :</label>
                                                        <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="lt_el" readonly="" value="<?php echo (set_value('lt_el')) ? set_value('lt_el') : $edit_salary->el; ?>">
                                                    </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">SL :</label>
                                                        <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="lt_sl" readonly="" value="<?php echo (set_value('lt_sl')) ? set_value('lt_sl') : $edit_salary->sl; ?>">
                                                    </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">CL :</label>
                                                        <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="lt_cl" readonly="" value="<?php echo (set_value('lt_cl')) ? set_value('lt_cl') : $edit_salary->cl; ?>">
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div> 
                                        <div class="row mt-top mb-3">  
                                            <div class="col-md-4">&nbsp;</div>
                                              <div class="col-md-4">
                                                <button class="ref-btn" id="save">Save</button>
                                              </div>
                                              <div class="col-md-4">&nbsp;</div>
                                          </div>

                                        </form>
                                        <!-- <div style="width: 100%;border-bottom: 2px solid #000;height: 2px;margin-bottom: 15px;"></div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="table-responsive">
                                                    <table id="salary-table" class="table table-striped table-bordered" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th>Effective Date</th>
                                                                <th>Designation</th>
                                                                <th>Gross Pay</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody id="salary_body">

                                                           
                                                            <tr>
                                                                <td>12/12/1994</td>
                                                                <td>Web Designer</td>
                                                                <td>45</td>
                                                                <td>10000</td>
                                                                <td><i class="fa fa-pencil-square-o pencil-font" aria-hidden="true"></i></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div> -->
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
    $('#salary-table').DataTable();
} );
</script>
      <script>

      	 $(document).ready(function(){
    	       //$('.date-picker').datepicker(); 


               populateMaxMin();

               $("#calculate_btn").click(function(event){ 

                    if($("#duty_hrs").val() != '')
                    {
                        if($("#bill_calculation_days").val() != '')
                        {
                            populateCalculation();
                        }
                        else
                        {
                            alert("Please enter Bill Calculation Day");
                        }
                        
                    }
                    else
                    {
                        alert("Please enter Duty Hrs");
                    }    


                });
                
                $('.date-picker').datepicker({ 
                    autoclose: true,
                    format: 'mm-dd'
                });
                
                	 });

        $('body').on('hover', '.nav-item.dropdown', function() {
            $(this).find('.dropdown-toggle').dropdown('toggle');
        });

         $("#state_id").change(() => {
	        var state_id = $("#state_id").val();
	        populatecity(state_id);
    	})

    function populatecity(state_id){
        //alert(state_id);
       var result='';
        //var csrfName = $('.PVS_ERP_csrf').attr('name');

    $.ajax({
        type: 'POST',   
        url: '<?php echo base_url('client/city_list'); ?>',
        data: {state_id: state_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
        dataType: 'json',
        encode: true,
    })
    //ajax response
    .done(function(data){
        $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
        if(data.status){            
            result +='<option value="">Select City</option>';

            $.each(data.city_list,function(key,value){
            	//value(value.city_name);
                result +='<option value="'+value.city_id+'">'+value.city_name+'</option>';
            });
        }
        else{
            result +='<option value="">No city selected</option>';
        }
        $("#city_id").html(result);
       // $("#city_id").selectpicker("refresh");
    
    })
    
    .fail(function(data){
        // show the any errors
        console.log(data);
    });
}

    //var cnt =0;
    var cnt = <?php echo $contact_count-1 ; ?>;
    $("#add_more_btn").click(function () 
    {
        cnt++;
        var resulthtml='';
       
        resulthtml +='<tr class="add_more_contact" id="add_more_contact'+cnt+'" style="width:100%;">';
        resulthtml +='<td><input type="hidden" name="detail_id[]" class="form-control form-control-sm" id="detail_id'+cnt+'"><select id="head_id'+cnt+'" name="head_id[]" data-position="'+cnt+'" class="lh-width head"></select></td>';
        resulthtml +='<td><select id="type_id'+cnt+'" name="type_id[]" data-position="'+cnt+'" class="lh-width type"><option value="%">%</option><option value="days">Days</option></select></td>';
        resulthtml +='<td><input id="rate'+cnt+'" name="rate[]" data-position="'+cnt+'" type="text" value="" class="lh-width rate" placeholder="0"><input id="max_prcnt'+cnt+'" name="max_prcnt[]" data-position="'+cnt+'" type="hidden" class="lh-width max_prcnt" value=""><input id="min_prcnt'+cnt+'" name="min_prcnt[]" data-position="'+cnt+'" type="hidden" class="lh-width min_prcnt" value=""></td>';
        resulthtml +='<td><select id="basis'+cnt+'" data-position="'+cnt+'" name="basis[]" class="lh-width basis"><option value="gross">Gross</option><option value="basic">Basic</option></select></td>';
        resulthtml +='<td><select id="limit'+cnt+'" data-position="'+cnt+'" name="limit[]" class="lh-width limit"><option value="N/A">N/A</option><option value="fixed">Fixed</option><option value="max">Max</option></select></td>';
        resulthtml +='<td><input id="criteria'+cnt+'" data-position="'+cnt+'" name="criteria[]" readonly="" type="text" class="lh-width criteria" placeholder=""></td>';
        resulthtml +='<td><select id="periodicity'+cnt+'" data-position="'+cnt+'" name="periodicity[]" class="lh-width periodicity"><option value="monthly">Monthly</option><option value="half_yearly">H.Yearly</option><option value="yearly">Yearly</option></select></td>';
        resulthtml +='<td style="width: 14%;border: none;"><button type="button" class="but-btn" style:"background: transparent;border: none;margin-top: -10px;font-size="14px;" value="delete" id="del_div'+cnt+'" onclick="delchild('+cnt+')"><i class="fa fa-trash" aria-hidden="true"></i></button></td>';
        resulthtml +='</tr>';
        $("#salary_head").append(resulthtml);
        var position = cnt;
        //alert(position);
        populateSalaryHeadName(position);

         //focus_blur();
        $('.del_div').on('click',function()
        {
            $(this).parents('.add_more_contact').remove();
        });

        $("#head_id"+position).change(function(event){ 
            //var position = $(this).data("position");
            max_id = ("max_prcnt"+position);
            min_id = ("min_prcnt"+position);
            
            max = $(this).find(':selected').data('max');
            $("#"+max_id).val(max);

            min = $(this).find(':selected').data('min');
            $("#"+min_id).val(min);

        });

          $("#limit"+position).change(function(event){ 
            limit = $(this).val();
            //alert(limit + position);
            if(limit == "fixed" || limit == "max")
            {
                
                $('#criteria'+position).attr('required', true);
                $('#criteria'+position).prop('readonly', false);
            }
            else
            {
                $("#criteria"+position).val('');
                $('#criteria'+position).removeAttr('required');                
                $('#criteria'+position).prop('readonly', true);
            }
        });
    });

    function delchild(abc)
    {
       $("#add_more_contact"+abc).remove();
    }

    function populateSalaryHeadName(index){
        //alert(index);
        var result='';
        //var csrfName = $('.PVS_ERP_csrf').attr('name');

        $.ajax({
            type: 'POST',   
            url: '<?php echo base_url('salary_structure/salaryhead_list'); ?>',
            data: {<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
            dataType: 'json',
            encode: true,
        })
        //ajax response
        .done(function(data){
            $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
            if(data.status){
                
                result +='<option value="">Select Salary Head</option>';

                $.each(data.salaryhead_list,function(key,value){
                    result +='<option value="'+value.head_id+'" data-max="' + value.max_prcntg + '" data-min="' + value.min_prcntg + '">'+value.head_name+'</option>';
                });
            }
            else{
                result +='<option value="">No state selected</option>';
            }
            $("#head_id"+index).html(result);
            //$(".head").selectpicker("refresh");
        
        })
        
        .fail(function(data){
            // show the any errors
            console.log(data);
        });
    }

    function populateMaxMin()
    {
        $.ajax({
        type: 'GET',   
        url: '<?php echo base_url('salary_structure/get_maxmin'); ?>',
        dataType: 'json',
        encode: true,
        })
        //ajax response
        .done(function(data){
            //$("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
            $("#max_prcnt0").val(data.max);
            $("#min_prcnt0").val(data.min);
        })
        
        .fail(function(data){
            // show the any errors
            console.log(data);
        });
    }

    function validDetail() 
    {
        populateCalculation();
        var selected = new Array();
        var isValidated = true;

        let net_pay = parseFloat($("#net_pay").val());
        
        if(net_pay == '0.00')
        {
           isValidated = false;
        }

        if(!isValidated){
            alert("Please click Calculate Button");
            return false;
        }

        $.each($(".head option:selected"), function(){  
            var per_item_value = '';
            per_item_value = $(this).val();
            //console.log(per_item_value);
            if(inArray(per_item_value, selected)){
                isValidated = false;
            }
            else
            {
                selected.push(per_item_value);
            }
        });
        if(!isValidated){
            alert("You have selected Salary Head Name twice ");
            return false;
        }
            $.each($(".rate"), function(){  
            
                var rate = $(this).val();
                //var max_prcnt = $(".max_prcnt").val();
                var position = $(this).data("position");
                max_id = "#max_prcnt"+position;
                min_id = "#min_prcnt"+position;
                var max_val = parseFloat($(max_id).val());
                var min_val = parseFloat($(min_id).val());
                if(min_val > 0 && rate < min_val){
                    isValidated = false;
                    //alert('exceeded min ' + position + ' ' + rate + ' ' + min_val);
                }
                if(max_val > 0 && rate > max_val){
                    isValidated = false;
                    //alert('exceeded max ' + position + ' ' + rate + ' ' + min_val);
                    //break;
                }

            });
            if(!isValidated){
                alert("You are exceeding the minimum or maximum range for the rate");
                return false;
            }

            
    return true;
    }

    function inArray(needle, haystack) 
    {
        var length = haystack.length;
        for(var i = 0; i < length; i++) {
            if(haystack[i] == needle) return true;
        }
        return false;
    }

    function populateCalculation()
    {

        var gross_pay = parseFloat($("#gross_pay").val());
        //alert(gross_pay);
        var salary_head ='';
        var basic_pay = 0;
        var monthly_pay = 0;
        var service_chrg_prcnt = 0.00;
        var service_chrg = 0.00;
        var service_chrg_amt = 0.00;
        var total_bill_amt = 0.00;
        var epf = 0.00;
        var esi = 0.00;
        var lwf = 0.00;
        var tot_dedn = 0.00;
        var net_pay = 0.00;
        var pay_hrs = 0.00;
        var resultCalArr = [];
        //var bill_calculation_days = $("#bill_calculation_days").val();
        //var duty_hrs = $("#duty_hrs").val();
        //var state_id = $("#state_id").val();


        $.each($(".head"), function(){
            //salary_head = $(this).val();
            var calculated_value = 0.00;
            var position = $(this).data("position");
            var salary_head_id=("head_id"+position);
            var salary_head_title =  $("#"+salary_head_id +" option:selected").text();
            var type_id=("type_id"+position);
            var rate_id=("rate"+position);
            var basis_id=("basis"+position);
            var limit_id=("limit"+position);
            var criteria_id=("criteria"+position);

            var salary_head = $("#"+salary_head_id).val();
            var type = $("#"+type_id).val();
            var rate = parseFloat($("#"+rate_id).val());
            var basis = $("#"+basis_id).val();
            var limit = $("#"+limit_id).val();
            var criteria = parseFloat($("#"+criteria_id).val());

            if(type == '%'){
                if(limit == 'fixed'){
                   // calculated_value = (criteria * rate)/100;
                   calculated_value = criteria;
                }
                else{
                    if(basis == 'gross')
                    {
                        calculated_value = (gross_pay * rate)/100;
                    }
                    if(basis == 'basic')
                    {
                        calculated_value = (basic_pay * rate)/100;
                        console.log(calculated_value);
                    }
                }
            }
            else if(type == 'days'){
                if(limit == 'fixed'){
                    //calculated_value = (criteria / 26) * rate;
                    calculated_value = criteria;
                }
                else{
                    if(basis == 'gross')
                    {
                        calculated_value = (gross_pay / 26) * rate;
                    }
                    if(basis == 'basic')
                    {
                        calculated_value = (basic_pay / 26) * rate;
                    }
                }
            }
            
            if((limit == 'max') && (calculated_value > criteria)){
                calculated_value = criteria;
            }
            
            // alert(calculated_value);
            if(position == 0){
                basic_pay = calculated_value;               
            }
            monthly_pay += calculated_value;

            resultCalArr.push({
                'type': salary_head_title,
                'calc': calculated_value
            })
            
            //console.log(monthly_pay + ' | ' + calculated_value);
            
        });

        var calcResulthtml = '';
        calcResulthtml += '<table class="table table-bordered tb-sm" style="border: 1px solid #000;">';
        $.each(resultCalArr, function(k, v){            
            calcResulthtml += '<tr><td>'  + v.type + '</td><td>'  + v.calc + '<input type="hidden" value="'+ v.calc +'" name="salary_head_amount[]"></td></tr>';
        });
        calcResulthtml += '</table>';
        $("#header_show").html(calcResulthtml);
        //alert(monthly_pay);
        //var releiver_chrg = parseFloat($("#releiver_chrg").val());
        //var monthly_ctc = monthly_pay + releiver_chrg;
        //alert(monthly_ctc);
        if(isNaN(monthly_pay))
        {
            $("#monthly_ctc").val('0.00');
            //$("#total_ctc_amt").val('0.00');
        }
        else
        {
            $("#monthly_ctc").val(monthly_pay);
            //$("#total_ctc_amt").val(monthly_ctc);
        }
        
        

        var ann_ctc = monthly_pay * 12;

        if(isNaN(ann_ctc))
        {
            $("#annual_ctc").val('0.00');
        }
        else
        {
            $("#annual_ctc").val(ann_ctc);
        }       

        // service_chrg_prcnt = parseFloat($("#service_chrg_prcnt").val());
        
        // service_chrg = parseFloat($("#service_chrg").val());
        // if((service_chrg_prcnt > 0.00) && (service_chrg > 0.00))
        // {
        //     alert("Please choose either service charge or service charge percent");
        //     $("#total_bill_amt").val('');
        //     $("#service_chrg").val('');
        //     $("#service_chrg_prcnt").val('');
        //     //break;
        // }
        // else if(service_chrg_prcnt > '0.00')
        // {
        //     //alert(service_chrg_prcnt);
        //     service_chrg_amt = (monthly_ctc * service_chrg_prcnt)/100;

        // }
        // else if(service_chrg > '0.00')
        // {
        //     service_chrg_amt = service_chrg;
        // }

        // if(service_chrg_amt > '0.00')
        // {
        //     total_bill_amt = monthly_ctc + service_chrg_amt;
        //     $("#gross_profit").val(service_chrg_amt);
        // }
        // else
        // {
        //     total_bill_amt = '0.00';

        // }
        
        //alert(service_chrg_amt);
        //$("#total_bill_amt").val(total_bill_amt);

        // epf = $("#epf").val();
        // esi = $("#esi").val();
        // lwf = $("#lwf").val();

        // epf = parseFloat($("#epf").val());
        // esi = parseFloat($("#esi").val());
        // lwf = parseFloat($("#lwf").val());
        // //tot_dedn = (((gross_pay * epf)/100) + ((gross_pay * esi)/100) + ((gross_pay * esi)/100)) + parseFloat($("#ptax").val());
        // tot_dedn = (epf + esi + lwf) + parseFloat($("#ptax").val());
        // if(isNaN(tot_dedn))
        // {
        //     $("#tot_dedn").val('0.00');
        // }
        // else
        // {
        //     $("#tot_dedn").val(tot_dedn);
        // }
        

        // net_pay = (gross_pay - tot_dedn);
        // if(isNaN(net_pay))
        // {
        //     $("#net_pay").val('0.00');
        // }
        // else
        // {
        //     $("#net_pay").val(net_pay);
        // }
        
        // pay_hrs = ((gross_pay/duty_hrs)/bill_calculation_days);
        // var pay_hrs_amt = pay_hrs.toFixed(2);
        // if(isNaN(pay_hrs_amt))
        // {
        //     $("#pay_hrs").val('0.00');
        // }
        // else
        // {
        //     $("#pay_hrs").val(pay_hrs_amt);
        // }

        //getPTax(gross_pay,state_id);
    } 

    function showHideDesignation(){
		if($("#applicable_for_P").is(":checked")){
			$("#designation_div").show();
		}
		else{
			$("#designation_div").hide();
		}
	}

      </script>

        