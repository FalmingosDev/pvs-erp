<style>
	.table-condensed{
		width: 185px !important;
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
                  <?php echo employeeTabs(); ?>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-client" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="employee-box">Employee Details</h1>
                                <div class="wrapper-box">
                                    <?php //echo validation_errors(); ?>

                                    <?php if($this->session->flashdata('msg')): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="show_msg">
                                            <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <?php endif; ?>

                                    <?php foreach($edit_employee_details as $emp_det){ ?>
                                    <?php echo form_open( base_url( 'employee_details/edit/'. $emp_det->employee_id.'/'. $emp_det->employee_detail_id), array( 'id' => 'employeedetailsform', 'class' => 'form-horizontal form-hori-border' ) ); ?>
                                        <input type="hidden" name="employee_detail_id" value="<?php echo $emp_det->employee_detail_id; ?>">
                                        <input type="hidden" name="employee_id" value="<?php echo $edit_employee->employee_id; ?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Employee Code : </label>
                                                    <div class="col-sm-9">
                                                      <p><?php echo $edit_employee->employee_code; ?></p>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Employee Name : </label>
                                                    <div class="col-sm-8">
                                                      <p><?php echo $edit_employee->first_name . ' ' . $edit_employee->last_name; ?></p>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Educational Qualification : <span class="help-inline">*</span></label>
                                                    <div class="col-sm-9">
                                                       <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'qualification_id');
                                                            $selected = (set_value('qualification_id')) ? set_value('qualification_id') : $emp_det->qualification_id;
                                                            echo form_dropdown('qualification_id', $qualification, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                    <?php echo form_error('qualification_id', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="pr-h4">Professional Experiance</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Army Service : </label>
                                                    <div class="col-sm-4">
                                                      <input type="date" class="form-control form-control-sm" name="army_date1" value="<?php echo (set_value('army_date1')) ? set_value('army_date1') : (($emp_det->army_service_from == '1970-01-01') ? '' : $emp_det->army_service_from); ?>">
                                                    </div>
                                                    <div class="col-sm-1">
                                                        <p>to</p>
                                                    </div>
                                                    <div class="col-sm-4">
                                                      <input type="date" class="form-control form-control-sm" name="army_date2" value="<?php echo (set_value('army_date2')) ? set_value('army_date2') : (($emp_det->army_service_to == '1970-01-01') ? '' : $emp_det->army_service_to); ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                &nbsp;
                                            </div>
                                        </div>
                                        <div class="row">  
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Regiment/Crops :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="regiment" value="<?php echo (set_value('regiment')) ? set_value('regiment') : $emp_det->regiment; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Character on Discharge : </label>
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control form-control-sm" id="" name="character_on_discharge" value="<?php echo (set_value('character_on_discharge')) ? set_value('character_on_discharge') : $emp_det->discharge_character; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">  
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Reason For Discharge :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="reason_discharge" value="<?php echo (set_value('reason_discharge')) ? set_value('reason_discharge') : $emp_det->discharge_reason; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Medical Category : </label>
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control form-control-sm" id="" name="medical_category" value="<?php echo (set_value('medical_category')) ? set_value('medical_category') : $emp_det->medical_category; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Civil Experiance : </label>
                                                    <div class="col-sm-10">
                                                       <input type="text" name="civil_experience" class="form-control form-control-sm" id="" value="<?php echo (set_value('civil_experience')) ? set_value('civil_experience') : $emp_det->civil_experience; ?>">    
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">  
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Document Submitted :<span class="help-inline">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="document_submitted" value="<?php echo (set_value('document_submitted')) ? set_value('document_submitted') : $emp_det->document_submitted; ?>">
                                                    </div>
                                                    <?php echo form_error('document_submitted', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Pending Document : <span class="help-inline">*</span></label>
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control form-control-sm" id="" name="pending_document" value="<?php echo (set_value('pending_document')) ? set_value('pending_document') : $emp_det->pending_document; ?>">
                                                    </div>
                                                    <?php echo form_error('pending_document', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">  
                                            <div class="col-md-9">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 pr-0 col-form-label col-form-label-sm">Application for PV form submitted : <span class="help-inline">*</span> </label>   
                                                    <div class="col-sm-8">
													<label class="cont-radio-location"><input type="radio" name="pv_submit_flag" id="pv_submit_flag" onchange="pv_yes()" value="Y" <?php if($emp_det->pv_submit_flag=='Y') echo "checked='checked'"; ?> <?php echo set_checkbox('location', 'Y'); ?>>Y</label>
                                                    <label class="cont-radio-location"><input type="radio" name="pv_submit_flag" id="pv_submit_flag" onchange="pv_no()" value="N" <?php if($emp_det->pv_submit_flag=='N')   echo "checked='checked'"; ?> <?php echo set_checkbox('location', 'N'); ?>>N</label>
													 
                                                    </div>
                                                    <?php echo form_error('pv_submit_flag', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp;</label>
                                                    <div class="col-sm-9">
                                                      &nbsp;
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>

                                     

									<div class="row" id ="pv_details"<?php if($emp_det->pv_submit_flag != 'Y'){ echo ' style="display:none;"'; } ?>>  
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 pr-0 col-form-label col-form-label-sm">Police STN Submitted : <span class="help-inline">*</span></label> 
                                                    <div class="col-sm-8">
                                                        <input  value="<?php echo (set_value('police_stn')) ? set_value('police_stn') : $emp_det->police_stn; ?>" type="text" class="form-control form-control-sm" id="police_stn" name="police_stn"> 
                                                    </div>
                                                    <?php echo form_error('police_stn', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm p-0">Date Submitted : <span class="help-inline">*</span></label>
                                                    <div class="col-sm-9">
                                                      <input  value="<?php echo (set_value('pv_date')) ? set_value('pv_date') : $emp_det->pv_date; ?>" type="date" class="form-control form-control-sm" id="pv_date" name="pv_date"> 
                                                    </div>
                                                    <?php echo form_error('pv_date', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm p-0">PV Expiry Date : <span class="help-inline">*</span></label>
                                                    <div class="col-sm-9">
                                                      <input  value="<?php echo (set_value('pv_exp_date')) ? set_value('pv_exp_date') : $emp_det->pv_exp_date; ?>" type="date" class="form-control form-control-sm" id="pv_exp_date" name="pv_exp_date"> 
                                                    </div>
                                                    <?php echo form_error('pv_exp_date', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <h4 class="pr-h4">Professional Training</h4>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-7">&nbsp;</div>
                                            <div class="col-md-1">
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <button type="button" class="cr-a" id="add_more_btn">Add</button>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>

                                         <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-bordered tb-bl">
                                                  <thead>
                                                    <tr style="background: #03a9f4;color: #fff;">
                                                      <th scope="col">Training</th>
                                                      <th scope="col">Training Date</th>
                                                      <th scope="col">Due date for training</th>
                                                      <th style="border: none;background: #fff;">&nbsp;</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody id="tab_body">
                                                      <?php if(!empty($employee_det)){  ?>
                                                        <?php $i = 0; foreach($employee_det['training_id'] as $training_id){ ?>
                                                         <tr width="100%" class="add_more_contact" id="add_more_contact'<?php echo $i; ?>'" style="">

                                                            <td>
                                                                <input type="hidden" name="employee_training_id[]" id="employee_training_id<?php echo $i; ?>" value="<?php echo $employee_det['employee_training_id'][$i]; ?>">
                                                                 <?php 
                                                                    $attributes = array('class' => 'form-control form-control-sm', 'id' => 'training_id'.$i);
                                                                    echo form_dropdown('training_id[]', $training, $training_id, $attributes);

                                                                ?>
                                                            </td>
                                                            <td><input type="date" name="training_date[]" class="form-control form-control-sm" id="training_date<?php echo $i; ?>" value="<?php echo $employee_det['training_date'][$i]; ?>"></td>
                                                            <td><input type="date" name="due_date[]" id="age<?php echo $i; ?>" class="form-control form-control-sm" value="<?php echo $employee_det['due_date'][$i]; ?>"></td>                                                   
                                                        </tr>
                                                    <?php $i++; 
                                                    $family_count = $i; ?>
                                                    <?php } ?>
                                                      <?php } else { 
                                                        $i = 0; foreach($edit_training as $training_){ ?>

                                                        <tr width="100%" class="add_more_contact" id="add_more_contact'<?php echo $i; ?>'" style="">
                                                            <td><input type="hidden" name="employee_training_id[]" id="employee_training_id<?php echo $i; ?>" value="<?php echo $training_['employee_training_id']; ?>">
                                                            <?php 
                                                                    $attributes = array('class' => 'form-control form-control-sm', 'id' => 'training_id'.$i);
                                                                    echo form_dropdown('training_id[]', $training, $training_['training_id'], $attributes);
                                                              ?>
                                                            </td>
                                                            <td><input type="date" name="training_date[]" class="form-control form-control-sm" id="training_date<?php echo $i; ?>" value="<?php echo $training_['training_date']; ?>"></td>
                                                            <td><input type="date" name="due_date[]" id="age<?php echo $i; ?>" class="form-control form-control-sm" value="<?php echo $training_['due_date']; ?>"></td>
                                                                                                                        
                                                        </tr>

                                                    <?php $i++; 
                                                    $family_count = $i;
                                                    }
                                                } ?>
                                                  </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div style="width: 100%;border-bottom: 2px solid #000;height: 2px;margin-bottom: 15px;"></div>
                                        <div class="row">  
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Gun License Expiry Date :</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control form-control-sm" id="" name="gun_lic_expiry_date" value="<?php echo (set_value('gun_lic_expiry_date')) ? set_value('gun_lic_expiry_date') : (($emp_det->gun_license_expiry_date == '1970-01-01') ? '' : $emp_det->gun_license_expiry_date); ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Driving License No :</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control form-control-sm" id="" name="driving_license_no" value="<?php echo (set_value('driving_license_no')) ? set_value('driving_license_no') : $emp_det->driving_license_no; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">  
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Gun Area :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="gun_area" value="<?php echo (set_value('gun_area')) ? set_value('gun_area') : $emp_det->gun_area; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Renewal : </label>  
                                                    <div class="col-sm-9">
                                                      <input type="date" class="form-control form-control-sm" id="" name="renewal" value="<?php echo (set_value('renewal')) ? set_value('renewal') : $emp_det->driving_license_renewal_date; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">  
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Gun No :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="gun_no" value="<?php echo (set_value('gun_no')) ? set_value('gun_no') : $emp_det->gun_no; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Type : </label>  
                                                    <div class="col-sm-9">
                                                        <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'type_id');
                                                            $selected = (set_value('type_id')) ? set_value('type_id') : $emp_det->driving_license_type_id;
                                                            echo form_dropdown('type_id', $type, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">  
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Gun Issue Authority : </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="gun_issue_auth" value="<?php echo (set_value('gun_issue_auth')) ? set_value('gun_issue_auth') : $emp_det->gun_issue_authority; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Issuing RTO(Dist,State) : </label>  
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control form-control-sm" id="" name="issuing_rto" value="<?php echo (set_value('issuing_rto')) ? set_value('issuing_rto') : $emp_det->driving_license_issuing_rto; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">  
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Gun Fitness Validity : </label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control form-control-sm" id="" name="gun_fitness_validity" value="<?php echo (set_value('gun_fitness_validity')) ? set_value('gun_fitness_validity') : (($emp_det->gun_fitness_validity == '1900-01-01') ? '' : $emp_det->gun_fitness_validity); ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">DOB as per License : </label>  
                                                    <div class="col-sm-9">
                                                      <input type="date" class="form-control form-control-sm" id="" name="dob" value="<?php echo (set_value('dob')) ? set_value('dob') : $emp_det->driving_license_dob; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">  
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Gun LIC No :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="gun_lic_no" value="<?php echo (set_value('gun_lic_no')) ? set_value('gun_lic_no') : $emp_det->gun_lic_no; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Address as per License :</label>  
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control form-control-sm" id="" name="address_license" value="<?php echo (set_value('address_license')) ? set_value('address_license') : $emp_det->driving_license_address; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">  
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Description :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="description" value="<?php echo (set_value('description')) ? set_value('description') : $emp_det->gun_description; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">DL First Issue Date :</label>  
                                                    <div class="col-sm-9">
                                                      <input type="date" class="form-control form-control-sm" id="" name="dl_first_issue_date" value="<?php echo (set_value('dl_first_issue_date')) ? set_value('dl_first_issue_date') : $emp_det->driving_license_issue_date; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">  
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Issue District :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="issue_district" value="<?php echo (set_value('issue_district')) ? set_value('issue_district') : $emp_det->gun_issue_district; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm"> Driving Record Of Accid :</label>  
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control form-control-sm" id="" name="driving_record_of_accid" value="<?php echo (set_value('driving_record_of_accid')) ? set_value('driving_record_of_accid') : $emp_det->driving_accident_record; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">  
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">UIN NO :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="uin_no" value="<?php echo (set_value('uin_no')) ? set_value('uin_no') : $emp_det->uin_no; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Gun&nbsp;Fit&nbsp;Certification Dtls :</label>  
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control form-control-sm" id="" name="dl_fit_certification" value="<?php echo (set_value('dl_fit_certification')) ? set_value('dl_fit_certification') : $emp_det->driving_fit_certificate; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                
                                            </div>
                                        </div>
                                        <div style="width: 100%;border-bottom: 2px solid #000;height: 2px;margin-bottom: 15px;"></div>  <div class="row">  
                                            <div class="col-md-6">
                                                &nbsp;
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row" style="margin-left: 0;margin-right: 0;">
                                                    <h4 class="col-sm-12" style="text-align: center;font-size: 17px;background: #405ebc;padding: 8px 0px;color: #fff;">Death/Accident Contact</h4>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">  
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Location(EMPCRD) :</label>
                                                    <div class="col-sm-9">
                                                        <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'state_id');
                                                            $selected = (set_value('state_id')) ? set_value('state_id') : $emp_det->location_empcrd_id;
                                                            echo form_dropdown('state_id', $state, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Name : <span class="help-inline">*</span></label>  
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control form-control-sm" id="" name="name" value="<?php echo (set_value('name')) ? set_value('name') : $emp_det->accidental_contact_name; ?>">
                                                    </div>
                                                    <?php echo form_error('name', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">  
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Covicted By Law :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="covicted_by_law" value="<?php echo (set_value('covicted_by_law')) ? set_value('covicted_by_law') : $emp_det->covicted_by_law; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Address :<span class="help-inline">*</span> </label>  
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control form-control-sm" id="" name="address"><?php echo (set_value('address')) ? set_value('address') : $emp_det->accidental_contact_address; ?></textarea>
                                                    </div>
                                                    <?php echo form_error('address', '<span class="help-inline">', '</span>'); ?>  
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">  
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Criminal Proceeding :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="criminal_proceeding" value="<?php echo (set_value('criminal_proceeding')) ? set_value('criminal_proceeding') : $emp_det->criminal_proceeding; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Mobile No :<span class="help-inline">*</span></label>  
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="mobile_no" value="<?php echo (set_value('mobile_no')) ? set_value('mobile_no') : $emp_det->accidental_contact_no; ?>">
                                                    </div>
                                                    <?php echo form_error('mobile_no', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">  
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Person Related To : </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="person_related_to" value="<?php echo (set_value('person_related_to')) ? set_value('person_related_to') : $emp_det->related_person; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Organisation ESI Add : </label>  
                                                    <div class="col-sm-9">
                                                        <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'esi_id');
                                                            $selected = (set_value('esi_id')) ? set_value('esi_id') : $emp_det->esi_organisation_id;
                                                            echo form_dropdown('esi_id', $esi, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                    <?php echo form_error('esi_id', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>
                                        <!-- <div class="row mt-top">
                                            <div class="col-md-4">&nbsp;</div>
                                              <div class="col-md-4">
                                                <button class="ref-btn">Save</button>
                                              </div>
                                              <div class="col-md-4">&nbsp;</div>
                                          </div> -->

                                        <div class="row">
                                            <div class="col-md-5"></div>
                                            <div class="col-md-2">
                                                <button type="submit" class="cr-a">Save</button>
                                               <!-- <input type = "submit" class="ref-btn" value = "Save" />  -->
                                              </div>
                                            <div class="col-md-5"></div>
                                      </div>
                                    </form>
                                <?php } ?>
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
    	       //$('.date-picker').datepicker();

               <?php if(empty($edit_training)){ ?>
         	   addnewtraining();
               populateTraining(0);    

               <?php } ?>  
                
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

  function addnewtraining(){
        var resulthtml='';
        resulthtml +='<tr width="100%" class="add_more_contact" style="">';
        resulthtml +='<td><select id="training_id0" class="form-control form-control-sm" name="training_id[]" class="lh-width class="form-control form-control-sm""></select></td>';
        resulthtml +='<td><input type="date" name="training_date[]" class="form-control form-control-sm" id="training_date0"></td>';
        resulthtml +='<td><input type="date" name="due_date[]" class="form-control form-control-sm" id="due_date0"></td>';
        resulthtml +='</tr>';
        $("#tab_body").html(resulthtml);
    }

    <?php if(!empty($family_count)){ ?>
    var cnt = <?php echo $family_count-1 ; ?>;
<?php } else { ?>
	var cnt = 0;
<?php } ?>
    $("#add_more_btn").click(function () 
    {
        cnt++;
        var resulthtml='';
        resulthtml +='<tr class="add_more_contact" id="add_more_contact'+cnt+'" style="width:100%;">';
        resulthtml +='<td><input type="hidden" name="employee_training_id[]" class="form-control form-control-sm" id="employee_training_id'+cnt+'"><select id="training_id'+ cnt +'" class="form-control form-control-sm" name="training_id[]" class="lh-width class="form-control form-control-sm""></select></td>';
        resulthtml +='<td><input type="date" name="training_date[]" class="form-control form-control-sm" id="training_date'+ cnt +'"></td>';
        resulthtml +='<td><input type="date" name="due_date[]" class="form-control form-control-sm" id="due_date'+ cnt +'"></td>';
        resulthtml +='<td style="border: none;"><button type="button" class="but-btn" style:"background: transparent;border: none;margin-top: -10px;" value="delete" id="del_div'+cnt+'" onclick="delchild('+cnt+')"><i class="fa fa-trash-o fn-1" aria-hidden="true"></i></button></td>';
        resulthtml +='</tr>';
        $("#tab_body").append(resulthtml);
        var position = cnt;
        populateTraining(position);
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

      </script>

         <script type="text/javascript">
        // $(function() {
        //     $('.date-picker').datepicker( {
        //     changeMonth: true,
        //     changeYear: true,
        //     showButtonPanel: true,
        //     dateFormat: 'dd MM',
        //     onClose: function(dateText, inst) { 
        //         $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
        //     }
        //     });
        // });

function pv_yes(){
	//alert('Yes');
	$("#pv_details").show();
	document.getElementById("pv_submit_flag").required = true;
	document.getElementById("police_stn").required = true;
	document.getElementById("pv_date").required = true;
	document.getElementById("pv_exp_date").required = true;
}

function pv_no(){
	//alert('NO');
	document.getElementById("pv_submit_flag").required = false;
	document.getElementById("police_stn").required = false;
	document.getElementById("pv_date").required = false;
	document.getElementById("pv_exp_date").required = false;
	$("#police_stn").val('');
	$("#pv_date").val('');
	$("#pv_exp_date").val('');
	$("#pv_details").hide();
	
}

 function populateTraining(index = 0){
        //alert(state_id);
       var result='';
        //var csrfName = $('.PVS_ERP_csrf').attr('name');

    $.ajax({
        type: 'POST',   
        url: '<?php echo base_url('employee_details/get_all_training'); ?>',
        data: {<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
        dataType: 'json',
        encode: true,
    })
    //ajax response
    .done(function(data){
        $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
        if(data.status){
            
            result +='<option value="">Select Training</option>';

            $.each(data.training_list,function(key,value){
                result +='<option value="'+value.training_type_id+'">'+value.training_name+'</option>';
            });
        }
        else{
            result +='<option value="">No Training selected</option>';
        }
        $("#training_id"+index).html(result);
       // $("#pf_relation"+index).html(result);

        //$(".head").selectpicker("refresh");
    
    })
    
    .fail(function(data){
        // show the any errors
        console.log(data);
    });
}
  
    </script>