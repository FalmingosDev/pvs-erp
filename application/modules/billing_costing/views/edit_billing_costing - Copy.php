   <style type="text/css">
    /*******/
      
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

                                    <?php foreach($edit_billing_costing as $edit_billing_costing){ ?>
                                    <?php echo form_open( base_url( 'billing_costing/edit/'.$client->client_id . '/' . $billing_costing_id), array( 'id' => 'billingcostingform', 'class' => 'form-horizontal form-hori-border','onSubmit' => 'return validDetail()' ) ); ?>
                                    
                                    <input type="hidden" name="client_id" value="<?php echo $client->client_id; ?>">
                                    <input type="hidden" name="billing_costing_id" value="<?php echo $billing_costing_id; ?>">
                                    <input type="hidden" name="state_id" value="<?php echo $client->state_id; ?>">
                                    <input type="hidden" name="pf_percentage" id="pf_percentage" value="<?php echo $pf_percentage->percentage; ?>">
                                    <input type="hidden" name="esi_percentage" id="esi_percentage" value="<?php echo $esi_percentage->percentage; ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group row">
                                                <div class="col-md-11">&nbsp;</div>
                                                <div class="col-sm-1">
                                                  <a class="cr-a add_btn" href="<?php echo base_url('billing_costing/add/'. $client->client_id); ?>">Add</a>
                                                </div>
                                              </div>
                                        </div> 
                                    </div>

                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Client Name</label>
                                                    <div class="col-sm-9">
                                                        
                                                        <input type="text" name="client_name" class="form-control form-control-sm" id="client_name" value="<?php echo $client->client_name; ?>" readonly>
                                                    </div>
                                                  </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Branch</label>
                                                    <div class="col-sm-9">
                                                        <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'branch_id');
                                                            $selected = (set_value('post_id')) ? set_value('branch_id') : $edit_billing_costing->branch_id;
                                                            echo form_dropdown('branch_id', $branch, $selected, $attributes);
                                                        ?>
                                                        
                                                    </div>
                                                  </div>
                                            </div>
                                             <!--<div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-md-9">&nbsp;</div>
                                                    <div class="col-sm-3">
                                                      <a class="cr-a add_btn" href="<?php //echo base_url('billing_costing/add/'. $client->client_id); ?>">Add</a>
                                                    </div>
                                                  </div>
                                            </div> -->
                                        </div>
                                    <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Post</label>
                                                    <div class="col-sm-9">

                                                        <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'post_id','disabled' => '');
                                                            $selected = (set_value('post_id')) ? set_value('post_id') : $edit_billing_costing->post_id;
                                                            echo form_dropdown('post_id', $designation, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Zone</label>
                                                    <div class="col-sm-9">
                                                        
                                                        <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'zone_id');
                                                            $selected = (set_value('zone_id')) ? set_value('zone_id') : $edit_billing_costing->zone_id;
                                                            echo form_dropdown('zone_id', $zone, $selected, $attributes);
                                                        ?>

                                                    </div>
                                                  </div>
                                            </div>
                                        <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">HSN No</label>
                                                    <div class="col-sm-9">
                                                      <input type="number" maxlength="25" class="form-control form-control-sm" id="hsn_no" name="hsn_no" value="<?php echo (set_value('hsn_no')) ? set_value('hsn_no') : $edit_billing_costing->hsn_no; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">CONTRACT TYPE</label>
                                                    <div class="col-sm-9">
                                                        
                                                        <?php 
                                                        // $options = array('' => 'Select Contract Type','Event' => 'Event', 'Temporary' => 'Temporary');
                                                        // $attributes = array('class' => 'form-control form-control-sm', 'id' => 'contract_type');
                                                        // $selected = (set_value('contract_type')) ? set_value('contract_type') : $edit_billing_costing->contract_type;
                                                        // echo form_dropdown('contract_type', $options, $selected, $attributes);

                                                        $attributes = array('class' => 'form-control form-control-sm', 'id' => 'contract_type');
                                                        $selected = (set_value('contract_type')) ? set_value('contract_type') : $edit_billing_costing->contract_type;
                                                        echo form_dropdown('contract_type', $contract_type, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Date Of Commencement</label>
                                                    <div class="col-sm-7">
                                                        <input type="date" class="form-control form-control-sm" name="commencement_date" id="commencement_date" value="<?php echo (set_value('commencement_date')) ? set_value('commencement_date') : $edit_billing_costing->commencement_date; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">STATUS</label>
                                                    <div class="col-sm-9">

                                                        <?php 
                                                        $options = array('' => 'Select Status','Active' => 'Active', 'Terminate' => 'Terminate');
                                                        $attributes = array('class' => 'form-control form-control-sm', 'id' => 'status');
                                                        $selected = (set_value('status')) ? set_value('status') : $edit_billing_costing->status;
                                                        echo form_dropdown('status', $options, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Date Of Termination</label>
                                                    <div class="col-sm-7">
                                                        <input type="date" class="form-control form-control-sm" name="termination_date" id="termination_date" value="<?php echo (set_value('termination_date')) ? set_value('termination_date') : $edit_billing_costing->termination_date; ?>">
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
                                                    <label for="bill_calculation_days" class="col-sm-5 col-form-label col-form-label-sm">BILL CALCULATIONS DAYS</label>
                                                    <div class="col-sm-6">
                                                        <input type="number" class="form-control form-control-sm" name="bill_calculation_days" id="bill_calculation_days" value="<?php echo (set_value('bill_calculation_days')) ? set_value('bill_calculation_days') : $edit_billing_costing->bill_calculation_days; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="bill_calculation_days" class="col-sm-4 col-form-label col-form-label-sm">SALARY CALCULATIONS</label>
                                                    <div class="col-sm-3">
                                                        <div class="form-check pr-4">
                                                            <input class="form-check-input" type="radio" name="salary_type" id="monthly" value="m" <?php if($edit_billing_costing->salary_type=='m') echo "checked='checked'"; ?> <?php echo set_checkbox('salary_type', 'm'); ?>>
                                                              <label class="form-check-label" for="exampleRadios1">
                                                                MONTHLY
                                                              </label>
                                                        </div>
                                                        <div class="form-check pr-4">
                                                              <input class="form-check-input" type="radio" name="salary_type" id="days" value="d" <?php if($edit_billing_costing->salary_type=='d') echo "checked='checked'"; ?> <?php echo set_checkbox('salary_type', 'd'); ?>>
                                                              <label class="form-check-label" for="exampleRadios2">
                                                                DAYS
                                                              </label> 
                                                        </div>
                                                    </div>
                                                    

                                                        <div class="col-md-5" id="days_div" style="display: none;">
                                                            <input name="salary_days" id="salary_days" type="text" class="form-control form-control-sm" style="margin-top: 19px;" value="<?php echo (set_value('bill_calculation_days')) ? set_value('salary_days') : $edit_billing_costing->salary_days; ?>"> 
                                                        </div>

                                                    
                                                    
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Gross Pay</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" name="gross_pay" id="gross_pay" value="<?php echo (set_value('gross_pay')) ? set_value('gross_pay') : $edit_billing_costing->gross_pay; ?>">
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

                                    <?php //} ?>
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
                                                                        <th style="width: 14%;">Method</th>
                                                                      </tr>
                                                                    </thead>
                                                                    <tbody id="salary_head">

                                                                      <?php if(!empty($billing_costing)){  ?>
                                                                           
                                                                        <?php $i = 0; foreach($billing_costing['head_id'] as $contact){ ?>
                                                                        <tr>
                                                                            <td>
                                                                                <input type="hidden" name="detail_id[]" id="detail_id<?php echo $i; ?>" value="<?php echo $billing_costing['detail_id'][$i]; ?>">
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

                                                                            <td>
                                                                            <?php 

                                                                                $options = array('salary' => 'Salary', 'CTC' => 'CTC');
                                                                                $attributes = array('class' => 'lh-width periodicity', 'id' => 'method'.$i ,'data-position' => $i);
                                                                                echo form_dropdown('method[]', $options, $billing_costing['method'][$i], $attributes);

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
                                                                      <?php $i = 0; foreach($edit_billing_costing_detail as $contact){ ?>
                                                                    <tr>
                                                                      <td>
                                                                        <input type="hidden" name="detail_id[]" id="detail_id<?php echo $i; ?>" value="<?php echo $contact['billing_costing_detail_id']; ?>">
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

                                                                        <td>
                                                                            <?php 
                                                                                
                                                                                $options = array('salary' => 'Salary', 'CTC' => 'CTC');
                                                                                $attributes = array('class' => 'lh-width periodicity', 'id' => 'method'.$i ,'data-position' => $i);
                                                                                echo form_dropdown('method[]', $options, $contact['method'], $attributes);
                                                                                

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
                                                                        <div class=" row">
                                                            <!-- <div class="col-md-3 mb-2">
                                                                <button type="button" onclick="populateCalculation()" class="cr-a add-cont-btn" id="calculate_btn">Calculate</button>
                                                            </div> -->
                                                            <div class="col-md-6">&nbsp;</div>
                                                            <div class="col-md-3">&nbsp;</div>  
                                                            <div class="col-md-3 mb-2" style="">
                                                                <button type="button" class="cr-a add-cont-btn add_btn" id="add_more_btn">Add</button>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    
                                                  </div>
                                            </div>

                                            <?php //foreach($edit_billing_costing as $edit_billing_costing){ ?>
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                    <div class="col-sm-6 pl-0">
                                                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">No. Of Person</label>  
                                                        <input type="text" class="form-control form-control-sm w-100" name="person_number" id="person_number" maxlength="20" value="<?php echo (set_value('person_number')) ? set_value('person_number') : $edit_billing_costing->person_number; ?>">
                                                    </div>
                                                    <div class="col-sm-6 pl-0">  
                                                    <label for="colFormLabelSm" class="col-form-label col-form-label-sm">Duty Hrs</label>  
                                                        <input type="text" class="form-control form-control-sm w-100" maxlength="20" name="duty_hrs" id="duty_hrs" value="<?php echo (set_value('duty_hrs')) ? set_value('duty_hrs') : $edit_billing_costing->duty_hrs; ?>">
                                                    </div>
                                                  </div>
                                                <div class="border-box mt-2">  
                                                <div class="form-group mb-0 row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">REILEVER CHRG</label>  
                                                    <div class="col-sm-9">
                                                        <input name="releiver_chrg" id="releiver_chrg" type="text" class="form-control form-control-sm" maxlength="20" value="<?php echo (set_value('releiver_chrg')) ? set_value('releiver_chrg') : $edit_billing_costing->releiver_chrg; ?>">
                                                    </div>
                                                  </div>
                                                    <div class="form-group mb-0 row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">MONTHLY CTC</label>  
                                                    <div class="col-sm-9">
                                                        <input name="monthly_ctc" id="monthly_ctc" readonly="" type="text" class="form-control form-control-sm" value="<?php echo (set_value('monthly_ctc')) ? set_value('monthly_ctc') : $edit_billing_costing->monthly_ctc; ?>">
                                                    </div>
                                                  </div>
                                                    <div class="form-group mb-0 row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">ANNUAL CTC</label>  
                                                    <div class="col-sm-9">
                                                        <input name="annual_ctc" id="annual_ctc" readonly="" type="text" class="form-control form-control-sm" value="<?php echo (set_value('annual_ctc')) ? set_value('annual_ctc') : $edit_billing_costing->annual_ctc; ?>">
                                                    </div>
                                                  </div>
                                                    <div class="form-group mb-0 row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">ROUND OFF</label>  
                                                    <div class="col-sm-9">
                                                        <input name="round_off" id="round_off" type="text" class="form-control form-control-sm" value="<?php echo (set_value('round_off')) ? set_value('round_off') : $edit_billing_costing->round_off; ?>">
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="border-box mt-2"> 
                                                    <div class="form-group mb-0 row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">SERVICE CHRG %</label>  
                                                    <div class="col-sm-9">
                                                        <input name="service_chrg_prcnt" id="service_chrg_prcnt" type="text" class="form-control form-control-sm" value="<?php echo (set_value('service_chrg_prcnt')) ? set_value('service_chrg_prcnt') : $edit_billing_costing->service_chrg_prcnt; ?>">
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
                                                        <input name="service_chrg" id="service_chrg" type="text" class="form-control form-control-sm" value="<?php echo (set_value('service_chrg')) ? set_value('service_chrg') : $edit_billing_costing->service_chrg; ?>">
                                                    </div>
                                                  </div>
                                                  <div class="form-group mb-0 row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">PF WAGE</label>  
                                                    <div class="col-sm-9">
                                                        <input name="pf_wage" id="pf_wage" type="text" class="form-control form-control-sm" maxlength="20" value="<?php echo (set_value('pf_wage')) ? set_value('pf_wage') : $edit_billing_costing->pf_wage; ?>">
                                                    </div>
                                                  </div>
                                                   <div class="form-group mb-0 row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">ESI WAGE</label>  
                                                    <div class="col-sm-9">
                                                        <input name="esi_wage" id="esi_wage" type="text" class="form-control form-control-sm" maxlength="20" value="<?php echo (set_value('esi_wage')) ? set_value('esi_wage') : $edit_billing_costing->esi_wage; ?>">
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
                                                                <input name="total_bill_amt" readonly="" id="total_bill_amt" type="text" class="form-control form-control-sm" placeholder="0.00" value="<?php echo (set_value('total_bill_amt')) ? set_value('total_bill_amt') : $edit_billing_costing->total_bill_amt; ?>">
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
                                                                <input name="total_ctc_amt" id="total_ctc_amt" type="text" class="form-control form-control-sm" readonly="" placeholder="0.00" value="<?php echo (set_value('total_ctc_amt')) ? set_value('total_ctc_amt') : $edit_billing_costing->total_ctc_amt; ?>">

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
                                                                <input name="gross_profit" id="gross_profit" type="text" class="form-control form-control-sm" readonly="" value="<?php echo (set_value('gross_profit')) ? set_value('gross_profit') : $edit_billing_costing->gross_profit; ?>">
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
                                                        <input name="epf" id="epf" type="text" maxlength="20" class="form-control form-control-sm" value="<?php echo (set_value('epf')) ? set_value('epf') : $edit_billing_costing->epf; ?>">
                                                    </div>
                                                  </div>
                                                    <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">ESI</label>  
                                                    <div class="col-sm-9">
                                                        <input name="esi" id="esi" type="text" maxlength="20" class="form-control form-control-sm" value="<?php echo (set_value('esi')) ? set_value('esi') : $edit_billing_costing->esi; ?>">
                                                    </div>
                                                  </div>
                                                    <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">LWF</label>  
                                                    <div class="col-sm-9">
                                                        <input name="lwf" id="lwf" maxlength="20" type="text" class="form-control form-control-sm" value="<?php echo (set_value('lwf')) ? set_value('lwf') : $edit_billing_costing->lwf; ?>">
                                                    </div>
                                                  </div>
                                                    <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">PTAX</label>  
                                                    <div class="col-sm-9">
                                                        <input name="ptax" id="ptax" type="text" class="form-control form-control-sm" value="<?php echo (set_value('ptax')) ? set_value('ptax') : $edit_billing_costing->ptax; ?>">
                                                    </div>
                                                  </div>
                                                    <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">TOT DEDN.</label>  
                                                    <div class="col-sm-9">
                                                        <input name="tot_dedn" readonly="" id="tot_dedn" type="text" class="form-control form-control-sm" value="<?php echo (set_value('tot_dedn')) ? set_value('tot_dedn') : $edit_billing_costing->tot_dedn; ?>">
                                                    </div>
                                                  </div>
                                                    <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">NET PAY</label>  
                                                    <div class="col-sm-9">
                                                        <input name="net_pay" id="net_pay" readonly="" type="text" class="form-control form-control-sm" value="<?php echo (set_value('net_pay')) ? set_value('net_pay') : $edit_billing_costing->net_pay; ?>">
                                                    </div>
                                                  </div>
                                                    <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">PAY/HRS</label>  
                                                    <div class="col-sm-9">
                                                        <input name="pay_hrs" id="pay_hrs" readonly="" type="text" class="form-control form-control-sm" value="<?php echo (set_value('pay_hrs')) ? set_value('pay_hrs') : $edit_billing_costing->pay_hrs; ?>">
                                                    </div>
                                                  </div>
                                                </div>
                                                    <div class="form-group row mt-2 mb-2">
                                                      <p class="col-sm-12 border-bottom-1">Ot Rate Setup</p>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="form-check pr-4">
                                                    <input class="form-check-input" type="radio" name="ot_rate_type" id="hourly" value="hourly" <?php if($edit_billing_costing->ot_rate_type=='hourly') echo "checked='checked'"; ?> <?php echo set_checkbox('ot_rate_type', 'hourly'); ?>>
                                                      <label class="form-check-label" for="exampleRadios1">
                                                        HOURLY
                                                      </label>
                                                    </div>
                                                    <div class="form-check pr-4">
                                                      <input class="form-check-input" type="radio" name="ot_rate_type" id="daily" value="daily" <?php if($edit_billing_costing->ot_rate_type=='daily') echo "checked='checked'"; ?> <?php echo set_checkbox('ot_rate_type', 'daily'); ?>>
                                                      <label class="form-check-label" for="exampleRadios2">
                                                        DAILY
                                                      </label> 
                                                    </div>
                                                    <div class="form-check pr-4">
                                                      <input class="form-check-input" type="radio" name="ot_rate_type" id="monthly" value="monthly" <?php if($edit_billing_costing->ot_rate_type=='monthly') echo "checked='checked'"; ?> <?php echo set_checkbox('ot_rate_type', 'monthly'); ?>>
                                                      <label class="form-check-label" for="exampleRadios2">
                                                        Monthly
                                                      </label> 
                                                    </div>
                                                  </div>
                                                    <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">OT RT</label>    
                                                    <div class="col-sm-9">
                                                        <input name="ot_rt" id="ot_rt" type="text" maxlength="20" class="form-control form-control-sm" value="<?php echo (set_value('ot_rt')) ? set_value('ot_rt') : $edit_billing_costing->ot_rt; ?>">
                                                    </div>
                                                  </div>
                                                   
                                                    <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">OT ESI WAGE</label>  
                                                    <div class="col-sm-9">
                                                        <input name="ot_esi_wage" id="ot_esi_wage" type="text" class="form-control form-control-sm" maxlength="20" value="<?php echo (set_value('ot_esi_wage')) ? set_value('ot_esi_wage') : $edit_billing_costing->ot_esi_wage; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                    </div>

                                <?php } ?>
                                    <div class="row">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-2 text-center">
                                            <button class="cr-a">Save</button>
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

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
     <!--Include all compiled plugins (below), or include individual files as needed
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->

    <script>

    $(document).ready(function(){
        $('.datepicker').datepicker();
        //populatesalaryhead();
        //populateSalaryHeadName();
       // $(".head").selectpicker("refresh");
        
        <?php if($mode == 'readonly'){ ?>
            applyReadOnlyMode('billingcostingform');
        <?php } ?>
        
    });

    // $("#calculate_btn").click(function(event){ 

    //     if($("#duty_hrs").val() != '')
    //     {
    //         if($("#bill_calculation_days").val() != '')
    //         {
    //             populateCalculation();
    //         }
    //         else
    //         {
    //             alert("Please enter Bill Calculation Day");
    //         }
            
    //     }
    //     else
    //     {
    //         alert("Please enter Duty Hrs");
    //     }    


    // });
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

    var cnt = <?php echo $contact_count-1 ; ?>;
    $("#add_more_btn").click(function () 
    {
        cnt++;
        var resulthtml='';
       
        resulthtml +='<tr class="add_more_contact" id="add_more_contact'+cnt+'" style="width:100%;">';
        resulthtml +='<td><input type="hidden" name="detail_id[]" class="form-control form-control-sm" id="detail_id'+cnt+'"><select id="head_id'+cnt+'" name="head_id[]" data-position="'+cnt+'" class="lh-width head"></select></td>';
        resulthtml +='<td><select id="type_id'+cnt+'" name="type_id[]" data-position="'+cnt+'" class="lh-width type"><option value="%">%</option><option value="days">Days</option></select></td>';
        resulthtml +='<td><input id="rate'+cnt+'" name="rate[]" data-position="'+cnt+'" type="text" value="0" class="lh-width rate" placeholder="0"><input id="max_prcnt'+cnt+'" name="max_prcnt[]" data-position="'+cnt+'" type="hidden" class="lh-width max_prcnt" value=""><input id="min_prcnt'+cnt+'" name="min_prcnt[]" data-position="'+cnt+'" type="hidden" class="lh-width min_prcnt" value=""></td>';
        resulthtml +='<td><select id="basis'+cnt+'" data-position="'+cnt+'" name="basis[]" class="lh-width basis"><option value="gross">Gross</option><option value="basic">Basic</option></select></td>';
        resulthtml +='<td><select id="limit'+cnt+'" data-position="'+cnt+'" name="limit[]" class="lh-width limit"><option value="N/A">N/A</option><option value="fixed">Fixed</option><option value="max">Max</option></select></td>';
        resulthtml +='<td><input id="criteria'+cnt+'" data-position="'+cnt+'" name="criteria[]" readonly="" type="text" class="lh-width criteria" placeholder=""></td>';
        resulthtml +='<td><select id="periodicity'+cnt+'" data-position="'+cnt+'" name="periodicity[]" class="lh-width periodicity"><option value="monthly">Monthly</option><option value="half_yearly">H.Yearly</option><option value="yearly">Yearly</option></select></td>';

        resulthtml +='<td><select id="method'+cnt+'" name="method[]" data-position="'+cnt+'" class="lh-width periodicity"><option value="salary">Salary</option><option value="CTC">CTC</option></select></td>';
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
                let limit_id = "#limit"+position;
                //alert(limit_id);
                var max_val = parseFloat($(max_id).val());
                var min_val = parseFloat($(min_id).val());
                var limit_val = $(limit_id).val();
                //alert(limit_val);
                if(min_val > 0 && rate < min_val){
                    isValidated = false;
                    //alert('exceeded min ' + position + ' ' + rate + ' ' + min_val);
                }
                if(max_val > 0 && rate > max_val){
                    isValidated = false;
                    //alert('exceeded max ' + position + ' ' + rate + ' ' + min_val);
                    //break;
                }

                if(limit_val == 'fixed'){
                    //alert(limit);
                    isValidated = true;
                }

            });
            if(!isValidated){
                alert("You are exceeding the minimum or maximum range for the rate");
                return false;
            }
    document.getElementById("post_id").disabled = false;
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
        //alert(state_id);

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
                        //console.log(calculated_value);
                        //alert(calculated_value);

                    }
                    if(basis == 'basic')
                    {
                        calculated_value = (basic_pay * rate)/100;
                        //console.log(calculated_value);
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
        calcResulthtml += '<table class="table table-bordered tb-sm">';
        $.each(resultCalArr, function(k, v){
            if(v.type == 'EPF'){
                calcResulthtml += '<tr><td>'  + v.type + '</td><td>'  + Math.round(v.calc) + '<input type="hidden" value="'+ Math.round(v.calc) +'" name="salary_head_amount[]"></td></tr>';
            }
            else if(v.type == 'ESIC'){
                calcResulthtml += '<tr><td>'  + v.type + '</td><td>'  + Math.ceil(v.calc) + '<input type="hidden" value="'+ Math.ceil(v.calc) +'" name="salary_head_amount[]"></td></tr>';
            }
            else
            {
            calcResulthtml += '<tr><td>'  + v.type + '</td><td>'  + Math.round(v.calc *100) /100 + '<input type="hidden" value="'+ v.calc +'" name="salary_head_amount[]"></td></tr>';
            }
           
        });
        calcResulthtml += '</table>';
        $("#header_show").html(calcResulthtml);
        //alert(monthly_pay);
        var releiver_chrg = parseFloat($("#releiver_chrg").val());
        var monthly_ctc = monthly_pay + releiver_chrg;
        var final_monthly = monthly_ctc.toFixed(2);
        let final_monthly_ctc = Math.round(final_monthly);
        //alert(final_monthly_ctc);

        if(isNaN(final_monthly_ctc))
        {
          $("#monthly_ctc").val('0.00');
          $("#total_ctc_amt").val('0.00');
        }
        else
        {
           // alert(final_monthly_ctc);
            $("#monthly_ctc").val(final_monthly_ctc);
            $("#total_ctc_amt").val(Math.round(final_monthly_ctc));
        }
        
        var annual_ctc = (monthly_ctc * 12).toFixed(2);
        if(isNaN(annual_ctc))
        {
          $("#annual_ctc").val('0.00');
        }
        else
        {
            $("#annual_ctc").val(Math.round(annual_ctc));
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
            var final_service_chrg_amt = service_chrg_amt.toFixed(2);
            $("#gross_profit").val(Math.round(final_service_chrg_amt));
        }
        else
        {
            total_bill_amt = '0.00';

        }
        
        //alert(service_chrg_amt);
        var final_total_bill_amt = total_bill_amt.toFixed(2);
        $("#total_bill_amt").val(Math.round(final_total_bill_amt));

        // epf = $("#epf").val();
        // esi = $("#esi").val();
        // lwf = $("#lwf").val();
        // tot_dedn = (((gross_pay * epf)/100) + ((gross_pay * esi)/100) + ((gross_pay * esi)/100)) + parseFloat($("#ptax").val());
        getPTax(gross_pay,state_id);

        epf = parseFloat($("#epf").val());
        esi = parseFloat($("#esi").val());
        lwf = parseFloat($("#lwf").val());

        tot_dedn = (epf + esi + lwf) + parseFloat($("#ptax").val());
        if(isNaN(tot_dedn))
        {
            $("#tot_dedn").val('0.00');
        }
        else
        {
            $("#tot_dedn").val(Math.round(tot_dedn));
        }


        net_pay = (gross_pay - tot_dedn);
        if(isNaN(net_pay))
        {
            $("#net_pay").val('0.00');
        }
        else
        {
            $("#net_pay").val(Math.round(net_pay));
        }
        
        pay_hrs = ((gross_pay/duty_hrs)/bill_calculation_days);
        var pay_hrs_amt = pay_hrs.toFixed(2);
        //alert(pay_hrs_amt);
        $("#pay_hrs").val(pay_hrs_amt);

        var pf_wage = parseFloat($("#pf_wage").val());
        var pf_percentage = $("#pf_percentage").val();
        if(pf_wage > '0.00')
        {
            epf_amnt = Math.round((pf_wage * pf_percentage)/100);
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
            esi_amnt = Math.ceil((esi_wage * esi_percentage)/100);
            $("#esi").val(esi_amnt);
        }
        else
        {
            $("#esi").val('0.00');
        }

        
        //return true;
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

    $('input[type=radio][name=salary_type]').change(function() {
        //alert(this.value);
        if (this.value == 'd') {
            $("#days_div").show();
        }
        else if (this.value == 'm') {
            $("#salary_days").val('');
            $("#days_div").hide();
        }
    });

    <?php if($edit_billing_costing->salary_days){ ?>
        $("#days_div").show();
    <?php } else { ?>
        $("#days_div").hide();
    <?php } ?>



</script>
