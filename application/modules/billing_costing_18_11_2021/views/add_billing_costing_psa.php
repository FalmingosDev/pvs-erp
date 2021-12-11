<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<style type="text/css">
    /*******/
      .select2-container .select2-choice {
    border: 2px solid #d3cccc;
    height: 30px;
    line-height: 26px;
    border-radius: 5px;
}
           /*******/

   </style>
   <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
   

<section class="main-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php echo clientTabs(); ?>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-billing" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="container">
                        <div class="row">
                             
                            <div class="col-md-12">
                                <h1 class="text-center">COSTING SHEET</h1>
                                <div class="wrapper-box">
                                    <?php echo validation_errors(); ?> 

                                    <?php if($this->session->flashdata('msg')): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="show_msg">
                                            <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <?php endif; ?>                                

                                    <?php echo form_open( base_url( 'billing_costing/add/'.$client->client_id ), array( 'id' => 'billingcostingform', 'class' => 'form-horizontal form-hori-border','onSubmit' => 'return validDetail()' ) ); ?>
                                    
                                    <input type="hidden" name="client_id" id="client_id" value="<?php echo $client->client_id; ?>">
                                    <input type="hidden" name="state_id" id="state_id" value="<?php echo $client->state_id; ?>">
                                    <input type="hidden" name="pf_percentage" id="pf_percentage" value="<?php echo $pf_percentage->percentage; ?>">
                                    <input type="hidden" name="esi_percentage" id="esi_percentage" value="<?php echo $esi_percentage->percentage; ?>">

                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Client Name<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-9">
                                                        
                                                        <input type="text" name="client_name" class="form-control form-control-sm" id="client_name" value="<?php echo $client->client_name; ?>" readonly>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm"> Branch<span class="span_star_clr"> *</span></label>
                                                    <div class="col-sm-9">
                                                      <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'branch_id');
                                                            $selected = (set_value('branch_id')) ? set_value('branch_id') : '';
                                                            echo form_dropdown('branch_id', $branch, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Post<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-9">

                                                        <?php 
                                                            $attributes = array('class' => 'select2', 'id' => 'post_id');
                                                            $selected = (set_value('post_id')) ? set_value('post_id') : '';
                                                            echo form_dropdown('post_id', $designation, $selected, $attributes);
                                                        ?> 
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Zone<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-9">
                                                        <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'zone_id');
                                                            $selected = (set_value('zone_id')) ? set_value('zone_id') : '';
                                                            echo form_dropdown('zone_id', $zone, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                  </div>
                                            </div>
                                        <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">HSN No<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-9">
                                                      <input type="number" maxlength="25" class="form-control form-control-sm" id="hsn_no" name="hsn_no" value="<?php echo set_value('hsn_no'); ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0 ">CONTRACT TYPE<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-9">
                                                        <?php 
                                                            $options = array('' => 'Select Contract Type', 'Event' => 'Event', 'Temporary' => 'Temporary');
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'contract_type');
                                                            $selected = (set_value('contract_type')) ? set_value('contract_type') : '';
                                                            echo form_dropdown('contract_type', $options, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Date Of Commencement<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-7">
                                                        <input type="date" class="form-control form-control-sm" name="commencement_date" id="commencement_date" value="<?php echo set_value('commencement_date'); ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">STATUS<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-9">
                                                        <?php 
                                                            $options = array('' => 'Select Status','Active' => 'Active', 'Terminate' => 'Terminate');
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'status');
                                                            $selected = (set_value('status')) ? set_value('status') : '';
                                                            echo form_dropdown('status', $options, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Date Of Termination</label>
                                                    <div class="col-sm-7">
                                                        <input type="date" class="form-control form-control-sm" name="termination_date" id="termination_date" value="<?php echo set_value('termination_date'); ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <p class="col-sm-12 sal-cal">SALARY &amp; BILLING BREAKUP</p>
                                            </div>
                                        </div>
                                            
                                        <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="bill_calculation_days" class="col-sm-5 col-form-label col-form-label-sm">BILL CALCULATIONS DAYS<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-6">
                                                        <input type="number" class="form-control form-control-sm" name="bill_calculation_days" id="bill_calculation_days" value="<?php echo set_value('bill_calculation_days'); ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Gross Pay<span class="span_star_clr"> *</span> </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" name="gross_pay" id="gross_pay" value="<?php echo set_value('gross_pay'); ?>">
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
                                            <div class="form-group row border-box mr-0 p-0">
                                                <div class="col-sm-12" style=""> 
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered-sm-h" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th style="width: 14%;">Head</th>
                                                                    <th style="width: 14%;">Type</th>
                                                                    <th style="width: 14%;">Rate</th>
                                                                    <th style="width: 14%;">Basis</th>
                                                                    <th style="width: 14%;">Limit</th>
                                                                    <th style="width: 14%;">Criteria</th>
                                                                    <th style="width: 14%;">Periodicity</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="salary_head">

                                                            <?php if(!empty($billing_costing)){ ?>
                                                            <?php $i = 0; foreach($billing_costing['head_id'] as $contact){ ?>

                                                                <tr>
                                                                            <td>
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
                                                                                     echo salary_head_dropdown('head_id[]',$billing_costing['head_id'][$i],$attributes);
                                                                                    }
                                                                            
                                                                                ?>
                                                                            </td>

                                                                            <td>
                                                                                <?php
                                                                                  $options = array('%' => '%','days' => 'Days');
                                                                                  $attributes = array('class' => 'lh-width type', 'id' => 'type_id'.$i ,'data-position' => $i);
                                                                                  
                                                                                  echo form_dropdown('type_id[]', $options, $billing_costing['type_id'][$i], $attributes);
                                                                                ?>
                                                                            </td>

                                                                            <td>
                                                                                <input id="rate<?php echo $i; ?>" name="rate[]" data-position="<?php echo $i; ?>" type="text" class="lh-width rate" value="<?php echo $billing_costing['rate'][$i]; ?>"><input id="max_prcnt<?php echo $i; ?>" name="max_prcnt[]" data-position="<?php echo $i; ?>" type="hidden" class="lh-width max_prcnt" value="<?php echo $billing_costing['max_prcnt'][$i]; ?>"><input id="min_prcnt<?php echo $i; ?>" name="min_prcnt[]" data-position="<?php echo $i; ?>" type="hidden" class="lh-width min_prcnt" value="<?php echo $billing_costing['min_prcnt'][$i]; ?>">
                                                                            
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
                                                                                echo form_dropdown('basis[]', $options, $billing_costing['basis'][$i], $attributes);
                                                                            }
                                                                            ?>
                                                                            </td>

                                                                            <td>
                                                                            <?php 

                                                                                $options = array('N/A' => 'N/A', 'fixed' => 'Fixed','max' => 'Max');
                                                                                $attributes = array('class' => 'lh-width limit', 'id' => 'limit'.$i ,'data-position' => $i);
                                                                                echo form_dropdown('limit[]', $options, $billing_costing['limit'][$i], $attributes);

                                                                            ?>
                                                                            </td>

                                                                            <td>
                                                                                <input id="criteria<?php echo $i; ?>" name="criteria[]" data-position="<?php echo $i; ?>" type="text" class="lh-width criteria" value="<?php echo $billing_costing['criteria'][$i]; ?>">
                                                                            </td>
                                                                            <td>
                                                                            <?php 

                                                                                $options = array('monthly' => 'Monthly', 'half_yearly' => 'H.Yearly','yearly' => 'Yearly');
                                                                                $attributes = array('class' => 'lh-width periodicity', 'id' => 'periodicity'.$i ,'data-position' => $i);
                                                                                echo form_dropdown('periodicity[]', $options, $billing_costing['periodicity'][$i], $attributes);

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
                                                            <?php } ?>
                                                                    
                                                            </tbody>
                                                        </table>        
                                                    </div>
                                                    <div class=" row">
                                                        <!--<div class="col-md-3 mb-2">
                                                        	<button type="button" onclick="populateCalculation()" class="cr-a add-cont-btn" id="calculate_btn">Calculate</button>
                                                            </div>-->
                                                            <div class="col-md-6">&nbsp;</div>
                                                            <div class="col-md-3">&nbsp;</div>
                                                            <div class="col-md-3 mb-2" style="">
                                                                <button type="button" class="cr-a add-cont-btn add_btn" id="add_more_btn">Add</button>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    
                                                  </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                    <div class="col-sm-6 pl-0">
                                                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">No. Of Person<span class="span_star_clr"> *</span> </label>  
                                                        <input type="text" maxlength="20" class="form-control form-control-sm w-100" name="person_number" id="person_number" value="<?php echo set_value('person_number'); ?>">
                                                    </div>
                                                    <div class="col-sm-6 pl-0">  
                                                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Duty Hrs<span class="span_star_clr"> *</span> </label>  
                                                        <input maxlength="20" type="text" class="form-control form-control-sm w-100" name="duty_hrs" id="duty_hrs" value="<?php echo set_value('duty_hrs'); ?>">
                                                    </div>
                                                  </div>
                                                <div class="border-box mt-2">  
                                                <div class="form-group mb-0 row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">REILEVER CHRG</label>  
                                                    <div class="col-sm-9">
                                                        <input name="releiver_chrg" id="releiver_chrg" maxlength="20" type="text" class="form-control form-control-sm" value="<?php echo (set_value('releiver_chrg')) ? set_value('releiver_chrg') : '0'; ?>">
                                                    </div>
                                                  </div>
                                                    <div class="form-group mb-0 row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">MONTHLY CTC</label>  
                                                    <div class="col-sm-9">
                                                        <input name="monthly_ctc" readonly="" id="monthly_ctc" type="text" class="form-control form-control-sm" value="<?php echo set_value('monthly_ctc'); ?>">
                                                    </div>
                                                  </div>
                                                    <div class="form-group mb-0 row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">ANNUAL CTC</label>  
                                                    <div class="col-sm-9">
                                                        <input name="annual_ctc" readonly="" id="annual_ctc" type="text" class="form-control form-control-sm" value="<?php echo set_value('annual_ctc'); ?>">
                                                    </div>
                                                  </div>
                                                    <div class="form-group mb-0 row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">ROUND OFF</label>  
                                                    <div class="col-sm-9">
                                                        <input name="round_off" id="round_off" type="text" class="form-control form-control-sm" value="<?php echo set_value('round_off'); ?>">
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="border-box mt-2"> 
                                                    <div class="form-group mb-0 row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">SERVICE CHRG %<span class="span_star_clr"> *</span> </label>  
                                                    <div class="col-sm-9">
                                                        <input name="service_chrg_prcnt" id="service_chrg_prcnt" type="text" class="form-control form-control-sm" value="<?php echo set_value('service_chrg_prcnt'); ?>">
                                                    </div>
                                                  </div>
                                                    <div class="form-group mb-0 row">  
                                                    <div class="col-sm-12">
                                                        <p style="text-align: center;font-size: 18px;">Or</p>  
                                                    </div>
                                                  </div>
                                                    <div class="form-group mb-0 row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">SERVICE CHRG</label>  
                                                    <div class="col-sm-9">
                                                        <input name="service_chrg" id="service_chrg" type="text" class="form-control form-control-sm" value="<?php echo set_value('service_chrg'); ?>">
                                                    </div>
                                                  </div>
                                                  <div class="form-group mb-0 row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">PF WAGE<span class="span_star_clr"> *</span></label>  
                                                    <div class="col-sm-9">
                                                        <input name="pf_wage" id="pf_wage" type="text" maxlength="20" class="form-control form-control-sm" value="<?php echo set_value('pf_wage'); ?>">
                                                    </div>
                                                  </div>
                                                    <div class="form-group mb-0 row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">ESI WAGE<span class="span_star_clr"> *</span></label>  
                                                    <div class="col-sm-9">
                                                        <input name="esi_wage" id="esi_wage" type="text" maxlength="20" class="form-control form-control-sm" value="<?php echo set_value('esi_wage'); ?>">
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-md-12 mb-2 mt-2">
                                                    <button type="button" class="cr-a add-cont-btn add_btn" id="calculate_btn">Calculate</button>
                                                </div>
                                                <div class="col-md-12 mb-2 mt-2">
                                                    <span id="header_show"></span>
                                                </div>
                                            </div>
                                                <div class="col-md-3">
                                                        <div class="form-group row">
                                                            <p class="col-sm-12 sal-cal text-center">SUMMARY</p>
                                                          </div>
                                                    <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row mb-0">
                                                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm pr-0">TOTAL BILL AMT</label>

                                                            <div class="col-sm-8">
                                                                <!-- <p class="form-control form-control-sm border-0 mb-0">0.00</p> -->
                                                                <input name="total_bill_amt" readonly="" id="total_bill_amt" type="text" class="form-control form-control-sm" placeholder="0.00" value="<?php echo set_value('total_bill_amt'); ?>">
                                                            </div>
                                                          </div>
                                                    </div>
                                                </div>
                                                <br>
                                                    <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row mb-0">
                                                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm pr-0">TOTAL CTC AMT</label>
                                                            <div class="col-sm-8">
                                                                <!-- <p class="form-control form-control-sm border-0 mb-0">0.00</p> -->
                                                                <input name="total_ctc_amt" readonly="" id="total_ctc_amt" type="text" class="form-control form-control-sm" placeholder="0.00" value="<?php echo set_value('total_ctc_amt'); ?>">

                                                            </div>
                                                          </div>
                                                    </div>
                                                </div>
                                                <br>
                                                    <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row mb-0">
                                                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm pr-0">GROSS PROFIT</label>
                                                            <div class="col-sm-8">
                                                                <input name="gross_profit" readonly="" id="gross_profit" type="text" class="form-control form-control-sm" value="<?php echo set_value('gross_profit'); ?>">
                                                            </div>
                                                          </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row mt-2 mb-2">
                                                      <p class="col-sm-12 sal-cal text-center">EMPL DEDUCTIONS</p>
                                                </div>
                                                    <div class="border-box mt-2 ml-0">  
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">EPF</label>  
                                                    <div class="col-sm-9">
                                                        <input name="epf" maxlength="20" id="epf" readonly="" type="text" class="form-control form-control-sm" value="<?php echo (set_value('epf')) ? set_value('epf') : '0.00'; ?>">
                                                    </div>
                                                  </div>
                                                    <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">ESI</label>  
                                                    <div class="col-sm-9">
                                                        <input name="esi" id="esi" maxlength="20" readonly="" type="text" class="form-control form-control-sm" value="<?php echo (set_value('esi')) ? set_value('esi') : '0.00'; ?>">
                                                    </div>
                                                  </div>
                                                    <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">LWF</label>  
                                                    <div class="col-sm-9">
                                                        <input name="lwf" id="lwf" maxlength="20" type="text" class="form-control form-control-sm" value="<?php echo (set_value('lwf')) ? set_value('lwf') : '0.00'; ?>">
                                                    </div>
                                                  </div>
                                                    <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">PTAX</label>  
                                                    <div class="col-sm-9">
                                                        <input name="ptax" id="ptax" type="text" class="form-control form-control-sm" value="<?php echo set_value('ptax'); ?>">
                                                    </div>
                                                  </div>
                                                    <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">TOT DEDN.</label>  
                                                    <div class="col-sm-9">
                                                        <input name="tot_dedn" readonly="" id="tot_dedn" type="text" class="form-control form-control-sm" value="<?php echo set_value('tot_dedn'); ?>">
                                                    </div>
                                                  </div>
                                                    <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">NET PAY</label>  
                                                    <div class="col-sm-9">
                                                        <input name="net_pay" readonly="" id="net_pay" type="text" class="form-control form-control-sm" value="<?php echo set_value('tot_dedn'); ?>">
                                                    </div>
                                                  </div>
                                                    <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">PAY/HRS</label>  
                                                    <div class="col-sm-9">
                                                        <input name="pay_hrs" readonly="" id="pay_hrs" type="text" class="form-control form-control-sm" value="<?php echo set_value('pay_hrs'); ?>">
                                                    </div>
                                                  </div>
                                                </div>
                                                    <div class="form-group row mt-2 mb-2">
                                                      <p class="col-sm-12 border-bottom-1">Ot Rate Setup</p>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-check pr-4">
                                                    <input class="form-check-input" type="radio" name="ot_rate_type" id="hourly" value="hourly" checked>
                                                      <label class="form-check-label" for="exampleRadios1">
                                                        HOURLY
                                                      </label>
                                                    </div>
                                                    <div class="form-check pr-4">
                                                      <input class="form-check-input" type="radio" name="ot_rate_type" id="daily" value="daily">
                                                      <label class="form-check-label" for="exampleRadios2">
                                                        DAILY
                                                      </label> 
                                                    </div>
                                                    <div class="form-check pr-4">
                                                      <input class="form-check-input" type="radio" name="ot_rate_type" id="monthly" value="monthly">
                                                      <label class="form-check-label" for="exampleRadios2">
                                                        Monthly
                                                      </label> 
                                                    </div>
                                                  </div>
                                                    <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">OT RT</label>    
                                                    <div class="col-sm-9">
                                                        <input name="ot_rt" id="ot_rt" type="text" maxlength="20" class="form-control form-control-sm" value="<?php echo set_value('ot_rt'); ?>">
                                                    </div>
                                                  </div>
                                                  <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">OT ESI WAGE</label>  
                                                    <div class="col-sm-9">
                                                        <input name="ot_esi_wage" id="ot_esi_wage" type="text" maxlength="20" class="form-control form-control-sm" value="<?php echo set_value('ot_esi_wage'); ?>">
                                                    </div>
                                                  </div>
                                                  
                                                    
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-2 text-center">
                                            <button class="cr-a" id="save">Save</button>  
                                        </div>
                                        <div class="col-md-5"></div>  
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
</section>

<section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1>Billing Costing List</h1>
                        </div>
                    </div>
                    <div class="wrapper-box">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Designation</th>
                                        <th>Gross Pay</th>
                                        <th>Monthly CTC</th>
                                        <th>Annual CTC</th>
                                        <th>Total Bill</th>
                                        <th>Gross Profit</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?PHP
                                    foreach($list as $billing){                        
                                ?>
                                    <tr class="gradeX">
                                        <td><?PHP echo $billing['desig_name']; ?></td>
                                        <td align="right"><?PHP echo number_format((float)$billing['gross_pay'], 2, '.', ''); ?></td>
                                        <td align="right"><?PHP echo number_format((float)$billing['monthly_ctc'], 2, '.', ''); ?></td>
                                        <td align="right"><?PHP echo number_format((float)$billing['annual_ctc'], 2, '.', ''); ?></td>
                                        <td align="right"><?PHP echo number_format((float)$billing['total_bill_amt'], 2, '.', ''); ?></td>
                                        <td align="right"><?PHP echo number_format((float)$billing['gross_profit'], 2, '.', ''); ?></td>
                                        <td><?PHP echo $billing['status']; ?></td>
                                        <td style="text-align: center;"><i class="icon-edit"></i><a href="<?php echo base_url('billing_costing/edit/'.$client->client_id.'/'.$billing['billing_costing_cost_id']); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
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
</section>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
     <!--Include all compiled plugins (below), or include individual files as needed
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
          $(".select2").select2();
        });
    </script>

    <script>

    $(document).ready(function(){
        $('.datepicker').datepicker();

        <?php if(empty($billing_costing)){ ?>
            populatesalaryhead();
        <?php } ?>

        populateMaxMin();
        //populateSalaryHeadName();
       // $(".head").selectpicker("refresh");
	   
		<?php if($mode == 'readonly'){ ?>
			applyReadOnlyMode('billingcostingform');
		<?php } ?>
        
    });

    $("#calculate_btn").click(function(event){ 

        if($("#duty_hrs").val() != '')
        {
            if($("#bill_calculation_days").val() != '')
            {
                if($("#pf_wage").val() != '')
                {
                    if($("#esi_wage").val() != '')
                    {
                        populateCalculation();
                    }
                    else
                    {
                        alert("Please enter ESI Wage Amount");
                    }
                    
                }
                else
                {
                    alert("Please enter PF Wage Amount");
                }                
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

    
    var limit = '';
    var maxVal = '';
    var minVal = '';
    function populateSalaryHeadName(index){
        //alert(state_id);
       var result='';
        //var csrfName = $('.PVS_ERP_csrf').attr('name');

    $.ajax({
        type: 'POST',   
        url: '<?php echo base_url('billing_costing/salaryhead_list'); ?>',
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
        url: '<?php echo base_url('billing_costing/get_maxmin'); ?>',
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

    function populatesalaryhead(){
        var resulthtml='';
        resulthtml +='<tr width="100%" class="add_more_contact" style="">';
        resulthtml +='<td><select id="head_id0" name="head_id[]" data-position="0" class="lh-width head"><option value="1">Basic</option></select></td>';
        resulthtml +='<td><select id="type_id0" name="type_id[]" data-position="0" class="lh-width type"><option value="%">%</option><option value="days">Days</option></select></td>';
        resulthtml +='<td><input id="rate0" name="rate[]" data-position="0" type="text" class="lh-width rate" value="0" placeholder="0"><input id="max_prcnt0" name="max_prcnt[]" data-position="0" type="hidden" class="lh-width max_prcnt" value=""><input id="min_prcnt0" name="min_prcnt[]" data-position="0" type="hidden" class="lh-width min_prcnt" value=""></td>';
        resulthtml +='<td><select id="basis0" name="basis[]" data-position="0" class="lh-width basis"><option value="gross">Gross</option></select></td>';
        resulthtml +='<td><select id="limit0" name="limit[]" data-position="0" class="lh-width limit"><option value="N/A">N/A</option><option value="fixed">Fixed</option><option value="max">Max</option></select></td>';
        resulthtml +='<td><input id="criteria0" name="criteria[]" readonly="" data-position="0" type="text" class="lh-width criteria" placeholder=""></td>';
        resulthtml +='<td><select id="periodicity0" name="periodicity[]" data-position="0" class="lh-width periodicity"><option value="monthly">Monthly</option><option value="half_yearly">H.Yearly</option><option value="yearly">Yearly</option></select></td>';
        resulthtml += '<td></td>';
        resulthtml +='</tr>';
        $("#salary_head").html(resulthtml);

        // $("#head_id0").change(function(event){ 
        //     max = $(this).find(':selected').data('max');
        //     $("#max_prcnt0").val(max);

        //     min = $(this).find(':selected').data('min');
        //     $("#min_prcnt0").val(min);

        // });

        $("#limit0").change(function(event){ 
            limit = $(this).val();
            if(limit == "fixed" || limit == "max")
            {
                
                $('#criteria0').attr('required', true);
                $('#criteria0').prop('readonly', false);
            }
            else
            {
                $("#criteria0").val('');
                $('#criteria0').removeAttr('required');                
                $('#criteria0').prop('readonly', true);
            }
        });
    }

    <?php if(!empty($billing_costing)){ ?>
    var cnt = <?php echo $contact_count-1 ; ?>;
    <?php } else { ?>
        var cnt = 0;
    <?php } ?>
    $("#add_more_btn").click(function () 
    {
        cnt++;
        var resulthtml='';
       
        resulthtml +='<tr class="add_more_contact" id="add_more_contact'+cnt+'" style="width:100%;">';
        resulthtml +='<td><select id="head_id'+cnt+'" name="head_id[]" data-position="'+cnt+'" class="lh-width head"></select></td>';
        resulthtml +='<td><select id="type_id'+cnt+'" name="type_id[]" data-position="'+cnt+'" class="lh-width type"><option value="%">%</option><option value="days">Days</option></select></td>';
        resulthtml +='<td><input id="rate'+cnt+'" name="rate[]" data-position="'+cnt+'" type="text" value="0" class="lh-width rate" placeholder="0"><input id="max_prcnt'+cnt+'" name="max_prcnt[]" data-position="'+cnt+'" type="hidden" class="lh-width max_prcnt" value=""><input id="min_prcnt'+cnt+'" name="min_prcnt[]" data-position="'+cnt+'" type="hidden" class="lh-width min_prcnt" value=""></td>';
        resulthtml +='<td><select id="basis'+cnt+'" data-position="'+cnt+'" name="basis[]" class="lh-width basis"><option value="gross">Gross</option><option value="basic">Basic</option></select></td>';
        resulthtml +='<td><select id="limit'+cnt+'" data-position="'+cnt+'" name="limit[]" class="lh-width limit"><option value="N/A">N/A</option><option value="fixed">Fixed</option><option value="max">Max</option></select></td>';
        resulthtml +='<td><input id="criteria'+cnt+'" data-position="'+cnt+'" name="criteria[]" readonly="" type="text" class="lh-width criteria" placeholder=""></td>';
        resulthtml +='<td><select id="periodicity'+cnt+'" data-position="'+cnt+'" name="periodicity[]" class="lh-width periodicity"><option value="monthly">Monthly</option><option value="half_yearly">H.Yearly</option><option value="yearly">Yearly</option></select></td>';
        resulthtml +='<td style="width: 14%;border: none;"><button type="button" class="but-btn" style:"background: transparent;border: none;margin-top: -10px;font-size="14px;" value="delete" id="del_div'+cnt+'" onclick="delchild('+cnt+')"><i class="fa fa-trash" aria-hidden="true"></i></button></td>';
        resulthtml +='</tr>';
        $("#salary_head").append(resulthtml);
        var position = cnt;
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
            //alert(abc);
        $("#add_more_contact"+abc).remove();
    }

    function validDetail() 
    {
         if($("#duty_hrs").val() != '')
        {
            populateCalculation();
        }
        else
        {
            alert("Please enter Duty Hrs");
        }



        //populateCalculation();
        var selected = new Array();
        var isValidated = true;

        let termination_date = new Date($("#termination_date").val());
        let commencement_date = new Date($("#commencement_date").val());

        if(commencement_date > termination_date)
        {
           isValidated = false;
        }

        if(!isValidated){
            alert("Date Of Termination should be greater than Date Of Commensement");
            return false;
        }

        let bill_calculation_days = $("#bill_calculation_days").val();
        if(bill_calculation_days > 31 || bill_calculation_days < 0)
        {
        	isValidated = false;
        }

        if(!isValidated){
            alert("Bill Calculation Days should be 0 to 31");
            return false;
        }

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
            console.log(per_item_value);
            if(inArray(per_item_value, selected)){
                isValidated = false;
            }
            else
            {
                selected.push(per_item_value);
                //alert(se)
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
        var bill_calculation_days = $("#bill_calculation_days").val();
        var duty_hrs = $("#duty_hrs").val();
        var state_id = $("#state_id").val();
        var resultCalArr = [];
        var epf_amnt = 0;
        var esi_amnt =0;


    	$.each($(".head"), function(){
    		//salary_head = $(this).val();
    		var calculated_value = 0.00;
    		var position = $(this).data("position");
    		var salary_head_id=("head_id"+position);
    		var type_id=("type_id"+position);
    		var rate_id=("rate"+position);
    		var basis_id=("basis"+position);
    		var limit_id=("limit"+position);
    		var criteria_id=("criteria"+position);

    		var salary_head = $("#"+salary_head_id).val();
    		var salary_head_title =  $("#"+salary_head_id +" option:selected").text();

    		// $('#update').val($(this).find("option:selected").attr("title"));
    		var type = $("#"+type_id).val();
    		var rate = parseFloat($("#"+rate_id).val());
    		var basis = $("#"+basis_id).val();
    		var limit = $("#"+limit_id).val();
    		var criteria = parseFloat($("#"+criteria_id).val());

			if(type == '%'){
	    		if(limit == 'fixed'){
	    			//calculated_value = (criteria * rate)/100;
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
    		
    		// console.log(monthly_pay + ' | ' + calculated_value, salary_head, salary_head_title);
    		
    	});
    	var calcResulthtml = '';
    	calcResulthtml += '<table class="table table-bordered tb-sm" style="border: 1px solid #000;">';
    	$.each(resultCalArr, function(k, v){    		
    		calcResulthtml += '<tr><td>'  + v.type + '</td><td>'  + v.calc + '<input type="hidden" value="'+ v.calc +'" name="salary_head_amount[]"></td></tr>';
    	});
    	calcResulthtml += '</table>';
    	$("#header_show").html(calcResulthtml);
    	//console.log(resultCalArr);
    	//alert(monthly_pay);
		var releiver_chrg = parseFloat($("#releiver_chrg").val());
		var monthly_ctc = monthly_pay + releiver_chrg;
        //alert(monthly_ctc);
        if(isNaN(monthly_ctc))
        {
            $("#monthly_ctc").val('0.00');
            $("#total_ctc_amt").val('0.00');
        }
        else
        {
            $("#monthly_ctc").val(monthly_ctc.toFixed(2));
            $("#total_ctc_amt").val(monthly_ctc.toFixed(2));
        }
		
		

        var ann_ctc = monthly_ctc * 12;

        if(isNaN(ann_ctc))
        {
            $("#annual_ctc").val('0.00');
        }
        else
        {
            $("#annual_ctc").val(ann_ctc.toFixed(2));
        }		

        service_chrg_prcnt = parseFloat($("#service_chrg_prcnt").val());
        
        service_chrg = parseFloat($("#service_chrg").val());
        if((service_chrg_prcnt > 0.00) && (service_chrg > 0.00))
        {
            alert("Please choose either service charge or service charge percent");
            $("#total_bill_amt").val('');
            $("#service_chrg").val('');
            $("#service_chrg_prcnt").val('');
            //break;
        }
        else if(service_chrg_prcnt > '0.00')
        {
            //alert(service_chrg_prcnt);
            service_chrg_amt = (monthly_ctc * service_chrg_prcnt)/100;

        }
        else if(service_chrg > '0.00')
        {
            service_chrg_amt = service_chrg;
        }

        if(service_chrg_amt > '0.00')
        {
            total_bill_amt = monthly_ctc + service_chrg_amt;
            $("#gross_profit").val(service_chrg_amt);
        }
        else
        {
            total_bill_amt = '0.00';

        }
        
        //alert(service_chrg_amt);
        $("#total_bill_amt").val(total_bill_amt);

        getPTax(gross_pay,state_id);

        // epf = $("#epf").val();
        // esi = $("#esi").val();
        // lwf = $("#lwf").val();

        epf = parseFloat($("#epf").val());
        esi = parseFloat($("#esi").val());
        lwf = parseFloat($("#lwf").val());
        //tot_dedn = (((gross_pay * epf)/100) + ((gross_pay * esi)/100) + ((gross_pay * esi)/100)) + parseFloat($("#ptax").val());
        tot_dedn = (epf + esi + lwf) + parseFloat($("#ptax").val());
        if(isNaN(tot_dedn))
        {
            $("#tot_dedn").val('0.00');
        }
        else
        {
            $("#tot_dedn").val(tot_dedn);
        }
        

        net_pay = (gross_pay - tot_dedn);
        if(isNaN(net_pay))
        {
            $("#net_pay").val('0.00');
        }
        else
        {
            $("#net_pay").val(net_pay);
        }
    	
        pay_hrs = ((gross_pay/duty_hrs)/bill_calculation_days);
        //var pay_hrs_amt = pay_hrs.toFixed(2);
        if(isNaN(pay_hrs))
        {
            $("#pay_hrs").val('0.00');
        }
        // if(Number.isFinite(pay_hrs_amt))
        // {
        //     $("#pay_hrs").val(pay_hrs_amt);
        // }
        else
        {

            $("#pay_hrs").val(pay_hrs.toFixed(2));
        }

        var pf_wage = parseFloat($("#pf_wage").val());
        var pf_percentage = $("#pf_percentage").val();
        if(pf_wage > '0.00')
        {
            epf_amnt = ((pf_wage * pf_percentage)/100);
            $("#epf").val(epf_amnt);
        }
        else
        {
            $("#epf").val('0.00');
        }

        var esi_wage = parseFloat($("#esi_wage").val());
        var esi_percentage = $("#esi_percentage").val();
        if(esi_wage > '0.00')
        {
            esi_amnt = ((esi_wage * esi_percentage)/100);
            $("#esi").val(esi_amnt);
        }
        else
        {
            $("#esi").val('0.00');
        }
        

    	
    }

    function getPTax(gross_pay,state_id){
    	$.ajax({
        type: 'GET',   
        url: '<?php echo base_url('billing_costing/get_ptax'); ?>/' + gross_pay + '/' + state_id,
        dataType: 'json',
        encode: true,
        async:false,
    })
    //ajax response
    .done(function(data){
        //$("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
        $("#ptax").val(data.ptax);
    })
    
    .fail(function(data){
        // show the any errors
        console.log(data);
    });
    }

    $("#status").change(function(event){ 

        populateCheck();
    });

    $("#post_id").change(function(event){ 
        populateCheck();
    });

    $("#commencement_date").change(function(event){ 
        populateCheck();
    });

    function populateCheck()
    {

    	let client_id = $("#client_id").val();
    	let status = $("#status").val();
        let desig_name = $("#post_id").val();
        let commencement_date = $("#commencement_date").val();
        let branch_id = $("#branch_id").val();

        if(status != '' && desig_name != '' && commencement_date != '' && branch_id != '')
        {
            $.ajax({
                type: 'POST',   
                url: '<?php echo base_url('billing_costing/checkHeader'); ?>',
                data: {<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(), status:status, desig_name:desig_name, commencement_date:commencement_date, client_id: client_id, branch_id: branch_id},
                dataType: 'json',
                encode: true,
            })
            //ajax response
            .done(function(data){
                $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
                if(data.cnt > 0){
                    $("#save").prop('disabled', true);
                    alert("Status, Designation Name , Commencement Date and Branch Name already exist");
                }
                else
                {
                    $("#save").prop('disabled', false);
                }
            })
            
            .fail(function(data){
                // show the any errors
                console.log(data);
            });
        }
    }



</script>
