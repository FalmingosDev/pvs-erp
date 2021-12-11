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
                                <h1 class="employee-box">Employee Management</h1> 
                                <div class="wrapper-box">
                                    <?php //echo $error;?>
                                    <?php echo validation_errors(); ?>

                                    <?php if($this->session->flashdata('msg')): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="show_msg">
                                            <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                    <?php endif; ?>
									
                                    <?php 
										$form_options = array(
											'id' => 'employeeform', 'class' => 'form-horizontal form-hori-border'
										);
										if($action_type == 'edit'){
											$form_options['onSubmit'] = 'return validDetail()';
										}
									?>
									
                                    <?php foreach($edit_employee as $emp){ ?>
                                    <?php echo form_open_multipart('', $form_options); ?>
                                    	<input type="hidden" name="employee_id" value="<?php echo $emp->employee_id; ?>">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-9">
                                                      <label class="cont-radio-location"><input type="radio" onclick="return false;" name="job_type" value="G" <?php if($emp->job_type=='G') echo "checked='checked'"; ?> <?php echo set_checkbox('job_type', 'G'); ?>>Staff</label>
                                                        <label class="cont-radio-location"><input type="radio" onclick="return false;" name="job_type" value="C" <?php if($emp->job_type=='C') echo "checked='checked'"; ?> <?php echo set_checkbox('location', 'C'); ?>>Contractual</label>
                                                        <label class="cont-radio-location"><input type="radio" onclick="return false;" name="job_type" value="B" <?php if($emp->job_type=='B') echo "checked='checked'"; ?> <?php echo set_checkbox('location', 'B'); ?>>Contractual Staff</label>

                                                    </div>
													<?php echo form_error('job_type', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Branch </label>
                                                    <div class="col-sm-10">
                                                      <?php //echo $user_branch_id;die; ?>
                                                      <?php if($user_branch_id == 1) 
                                                        //if($emp->company_branch_id == 4)
                                                        {
                                                           
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'company_branch_id');
                                                            $selected = (set_value('company_branch_id')) ? set_value('company_branch_id') : $emp->company_branch_id;
                                                            echo form_dropdown('company_branch_id', $branch, $selected, $attributes);
                                                        }
                                                        else
                                                        {
                                                      ?>

                                                          <input type="hidden" name="company_branch_id" value="<?php echo $user_branch_id; ?>" class="form-control form-control-sm">
                                                          <input type="text" name="company_branch_name" id="company_branch_name" readonly="" value="<?php echo $company_branch->branch_name; ?>" class="form-control form-control-sm">
                                                      <?php

                                                        }
                                                      ?>
                                                        
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="pr-h4">Personal Information</h4>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-10">
                                              <div class="row">
                                               <div class="col-md-8">
                                                <div class="row form-group row">
                                                        <label class="col-md-4 col-form-label col-form-label-sm">Employee Designation&nbsp;: </label>
                                                    <div class="col-md-8">
                                                        <?php 
															$attributes = array('class' => 'form-control form-control-sm', 'id' => 'desig_id');
															$selected = (set_value('desig_id')) ? set_value('desig_id') : $emp->designation_id;
															echo form_dropdown('desig_id', $desig, $selected, $attributes);
														?>
                                                    </div>
                                                </div>
                                              </div>
                                          </div>
                                            <div class="row">
                                              <div class="col-md-4">
                                                <div class="row form-group row">
                                                        <label class="col-md-5 col-form-label col-form-label-sm">First Name : </label>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control form-control-sm" name="fname" id="fname" value="<?php echo (set_value('fname')) ? set_value('fname') : $emp->first_name; ?>">
                                                    </div>
													<?php echo form_error('fname', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                              </div>
                                              <div class="col-md-4">
                                                <div class="row form-group row">
                                                        <label class="col-md-4 col-form-label col-form-label-sm">Last Name : </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm" name="lname" value="<?php echo (set_value('lname')) ? set_value('lname') : $emp->last_name; ?>">
                                                    </div>
													<?php echo form_error('lname', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                              </div>
                                              <div class="col-md-4">
                                                <div class="row form-group row">
                                                        <label class="col-md-4 col-form-label col-form-label-sm">Old Code : </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm" name="old_code" value="<?php echo (set_value('old_code')) ? set_value('old_code') : $emp->old_code; ?>">
                                                    </div>
                                                </div>
                                              </div>
                                          </div>
                                                <div class="row mt-top">
                                              <div class="col-md-5">
                                                <div class="row form-group row">
                                                    <label class="col-md-5 col-form-label col-form-label-sm">Father's Name  <span class="help-inline">*</span> : </label>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control form-control-sm" name="father_name" value="<?php echo (set_value('father_name')) ? set_value('father_name') : $emp->father_name; ?>">
                                                    </div>
													<?php echo form_error('father_name', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                              </div>
                                              <div class="col-md-7">
                                                <div class="row form-group row">
                                                    <label class="col-md-4 col-form-label col-form-label-sm">Old Name (If Any) : </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm" name="old_name" value="<?php echo (set_value('old_name')) ? set_value('old_name') : $emp->old_name; ?>">
                                                    </div>
                                                </div>
                                              </div>
                                          </div>
                                                <div class="row mt-top">
                                              <div class="col-md-5">
                                                <div class="row form-group row">
                                                    <label class="col-md-5 col-form-label col-form-label-sm">Mother's Name  <span class="help-inline">*</span> : </label>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control form-control-sm" name="mother_name" value="<?php echo (set_value('mother_name')) ? set_value('mother_name') : $emp->mother_name; ?>">
                                                    </div>
													<?php echo form_error('mother_name', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                              </div>
                                              <div class="col-md-7">
                                                <div class="row form-group row">
                                                    <label class="col-md-4 col-form-label col-form-label-sm">Army No (If Any) : </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm" name="army_no" value="<?php echo (set_value('army_no')) ? set_value('army_no') : $emp->army_no; ?>">
                                                    </div>
                                                </div>
                                              </div>
                                          </div>
                                                <div class="row mt-top">
                                              <div class="col-md-5">
                                                <div class="row form-group row">
                                                    <label class="col-md-5 col-form-label col-form-label-sm">Spouse Name : </label>
                                                    <div class="col-md-7">
                                                        <input type="text" class="form-control form-control-sm" name="spouse_name" value="<?php echo (set_value('spouse_name')) ? set_value('spouse_name') : $emp->spouse_name; ?>">
                                                    </div>
                                                </div>
                                              </div>
                                              <div class="col-md-7">
                                                <div class="row form-group row">
                                                    <label class="col-md-4 col-form-label col-form-label-sm">Rank : </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm" name="rank" value="<?php echo (set_value('rank')) ? set_value('rank') : $emp->rank; ?>">
                                                    </div>
													<?php echo form_error('rank', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                              </div>
                                          </div>
                                              </div>
                                              <div class="col-md-2">
                                                <p class="pt-graph">Photograph <span class="help-inline">*</span></p>
                                                  <input type="file" style="width: 100%;" name="photo">   
                                                  <div class="user-photo">
                                                    <img src="<?php echo base_url('uploads/employee/'). $emp->employee_image; ?>" class="img-fluid" />
                                                  </div>
												  <?php echo form_error('photo', '<span class="help-inline">', '</span>'); ?>
                                              </div>
                                          </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row form-group row">
                                                    <label class="col-md-4 col-form-label col-form-label-sm">Pl of Birth <span class="help-inline">*</span> : </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm" name="birth_place" value="<?php echo (set_value('birth_place')) ? set_value('birth_place') : $emp->birth_place; ?>">
                                                    </div>
													<?php echo form_error('birth_place', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row form-group row">
                                                    <label class="col-md-4 col-form-label col-form-label-sm">Chest <span class="help-inline">*</span> : </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm" name="chest" value="<?php echo (set_value('chest')) ? set_value('chest') : $emp->chest; ?>">
                                                    </div>
													<?php echo form_error('chest', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row form-group row">
                                                    <label class="col-md-4 col-form-label col-form-label-sm">DOB :<span class="help-inline">*</span> </label>
                                                    <div class="col-md-8">
                                                        <input type="date" class="form-control form-control-sm" name="dob" value="<?php echo (set_value('dob')) ? set_value('dob') : $emp->dob; ?>">
                                                    </div>
													<?php echo form_error('dob', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row form-group row">
                                                    <label class="col-md-4 col-form-label col-form-label-sm">Height <span class="help-inline">*</span> : </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm" name="height" value="<?php echo (set_value('height')) ? set_value('height') : $emp->height; ?>">
                                                    </div>
													<?php echo form_error('height', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row form-group row">
                                                    <label class="col-md-4 col-form-label col-form-label-sm">Weight <span class="help-inline">*</span> : </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm" name="weight" value="<?php echo (set_value('weight')) ? set_value('weight') : $emp->weight; ?>">
                                                    </div>
													<?php echo form_error('weight', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row form-group row">
                                                    <label class="col-md-4 col-form-label col-form-label-sm">PF No <span class="help-inline">*</span> : </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm" name="pf_no" value="<?php echo (set_value('pf_no')) ? set_value('pf_no') : $emp->pf_no; ?>">
                                                    </div>
													<?php echo form_error('pf_no', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row form-group row">
                                                    <label class="col-md-4 col-form-label col-form-label-sm">Hair Color <span class="help-inline">*</span> : </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm" name="hair_color" value="<?php echo (set_value('hair_color')) ? set_value('hair_color') : $emp->hair_color; ?>">
                                                    </div>
													<?php echo form_error('hair_color', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row form-group row">
                                                    <label class="col-md-4 col-form-label col-form-label-sm">Eye Color <span class="help-inline">*</span> : </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm" name="eye_color" value="<?php echo (set_value('eye_color')) ? set_value('eye_color') : $emp->eye_color; ?>">
                                                    </div>
													<?php echo form_error('eye_color', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row form-group row">
                                                    <label class="col-md-4 col-form-label col-form-label-sm">ESI No <span class="help-inline">*</span> : </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm" name="esi_no" value="<?php echo (set_value('esi_no')) ? set_value('esi_no') : $emp->esi_no; ?>">
                                                    </div>
													<?php echo form_error('esi_no', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="row form-group row">
                                                    <label class="col-md-4 col-form-label col-form-label-sm">Sex : </label>
                                                    <div class="col-md-8">
                                                        <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'sex');
                                                            $selected = (set_value('sex')) ? set_value('sex') : $emp->gender_id;
                                                            echo form_dropdown('sex', $gender, $selected, $attributes);
                                                          ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row form-group row">
                                                    <label class="col-md-4 col-form-label col-form-label-sm">Bl.Grp: </label>
                                                    <div class="col-md-8">
                                                        <?php 
															$attributes = array('class' => 'form-control form-control-sm', 'id' => 'blood_group_id');
															$selected = (set_value('blood_group_id')) ? set_value('blood_group_id') : $emp->blood_group_id;
															echo form_dropdown('blood_group_id', $bld_grp, $selected, $attributes);
														?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row form-group row">
                                                    <label class="col-md-4 col-form-label col-form-label-sm">Marital Status : </label>
                                                    <div class="col-md-8">
                                                        <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'marital_status');
                                                            $selected = (set_value('marital_status')) ? set_value('marital_status') : $emp->merital_status_id;
                                                            echo form_dropdown('marital_status', $marrital_status, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                    <div class="row form-group row">
                                                        <label class="col-md-4 col-form-label col-form-label-sm">DOJ : <span class="help-inline">*</span></label>
                                                        <div class="col-md-8">
                                                            <input type="date" class="form-control form-control-sm" name="doj" value="<?php echo (set_value('doj')) ? set_value('doj') : $emp->doj; ?>">
                                                        </div>
														<?php echo form_error('doj', '<span class="help-inline">', '</span>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="row form-group row">
                                                    <label class="col-md-4 col-form-label col-form-label-sm pr-0">Complexion <span class="help-inline">*</span> : </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm" name="complexion" value="<?php echo (set_value('complexion')) ? set_value('complexion') : $emp->complexion; ?>">
                                                    </div>
													<?php echo form_error('complexion', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row form-group row">
                                                    <label class="col-md-4 col-form-label col-form-label-sm">D.O.A :<span class="help-inline">*</span> </label>
                                                    <div class="col-md-8">
                                                        <input type="date" class="form-control form-control-sm" name="doa" value="<?php echo (set_value('doa')) ? set_value('doa') : $emp->doa; ?>">
                                                    </div>
													<?php echo form_error('doa', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="row form-group row">
                                                    <label class="col-md-4 col-form-label col-form-label-sm">DOL : </label>
                                                    <div class="col-md-8">
                                                        <input type="date" class="form-control form-control-sm" name="dol" value="<?php echo (set_value('dol')) ? set_value('dol') : (($emp->dol == '1970-01-01') ? '' : $emp->dol); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                    <div class="row form-group row">
                                                        <label class="col-md-4 col-form-label col-form-label-sm">UAN <span class="help-inline">*</span> : </label>
                                                        <div class="col-md-8">
                                                            <input type="text" class="form-control form-control-sm" name="uan" value="<?php echo (set_value('uan')) ? set_value('uan') : $emp->uan; ?>">
                                                        </div>
														<?php echo form_error('uan', '<span class="help-inline">', '</span>'); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row form-group row">
                                                    <label class="col-md-4 col-form-label col-form-label-sm">ID Mark <span class="help-inline">*</span> : </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm" name="id_mark" value="<?php echo (set_value('id_mark')) ? set_value('id_mark') : $emp->id_mark; ?>">
                                                    </div>
													<?php echo form_error('id_mark', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row form-group row">
                                                    <label class="col-md-4 col-form-label col-form-label-sm">Language Spoken <span class="help-inline">*</span> : </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm" name="language" value="<?php echo (set_value('language')) ? set_value('language') : $emp->language_spoken; ?>">
                                                    </div>
													<?php echo form_error('language', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row form-group row">
                                                    <div class="col-md-12 mt-2">    
                                                        <label style="text-align: center;display: block;">Contractual Tenure </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row form-group row">
                                                    <label class="col-md-4 col-form-label col-form-label-sm">Caste <span class="help-inline">*</span> : </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm" name="caste" value="<?php echo (set_value('caste')) ? set_value('caste') : $emp->caste; ?>">
                                                    </div>
													<?php echo form_error('caste', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row form-group row">
                                                    <label class="col-md-4 col-form-label col-form-label-sm">Religion <span class="help-inline">*</span> : </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm" name="religion" value="<?php echo (set_value('religion')) ? set_value('religion') : $emp->religion; ?>">
                                                    </div>
													<?php echo form_error('religion', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="row form-group row">
                                                    <div class="col-md-12">    
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <input type="date" class="form-control form-control-sm" name="tenure_date_1" value="<?php echo (set_value('tenure_date_1')) ? set_value('tenure_date_1') : (($emp->tenure_date_1 == '1970-01-01') ? '' : $emp->tenure_date_1); ?>">
                                                                
                                                            </div>
                                                            <div class="col-md-6">
                                                                <input type="date" class="form-control form-control-sm" name="tenure_date_2" value="<?php echo (set_value('tenure_date_2')) ? set_value('tenure_date_2') : (($emp->tenure_date_2 == '1970-01-01') ? '' : $emp->tenure_date_2); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row form-group row">
                                                    <label class="col-md-4 col-form-label col-form-label-sm">Nationality <span class="help-inline">*</span> : </label>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-sm" name="nationality" value="<?php echo (set_value('nationality')) ? set_value('nationality') : $emp->nationality; ?>">
                                                    </div>
													<?php echo form_error('nationality', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="row form-group row">
							<div class="col-md-12">    
								<div class="row">
									<div class="col-md-9">
										<div class="row">
											<label class="col-md-4 col-form-label col-form-label-sm">Nomminee Name & Age <span class="help-inline">*</span> : </label>
											<div class="col-md-8">
												<input type="text" class="form-control form-control-sm" name="nomminee_name" value="<?php echo (set_value('nomminee_name')) ? set_value('nomminee_name') : $emp->nominee_name; ?>">
											</div>
											<?php echo form_error('nomminee_name', '<span class="help-inline">', '</span>'); ?>
										</div>
									</div>
									<div class="col-md-3">
										<input type="text" class="form-control form-control-sm" name="age" value="<?php echo (set_value('age')) ? set_value('age') : $emp->nominee_age; ?>">
									</div>
									<?php echo form_error('age', '<span class="help-inline">', '</span>'); ?>
								</div>
							</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Bank Name :</label>
                                                    <div class="col-sm-9">
                                                        <?php 

                                                            // $attributes = array('class' => 'form-control form-control-sm', 'id' => 'company_branch_id');
                                                            // $selected = (set_value('company_branch_id')) ? set_value('company_branch_id') : $emp->company_branch_id;
                                                            // echo form_dropdown('company_branch_id', $branch, $selected, $attributes);
                                                           // $options = array('SBI' => 'SBI', 'BOB' => 'BOB', 'BOI' => 'BOI');
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'bank_name');
                                                            $selected = (set_value('bank_name')) ? set_value('bank_name') : $emp->bank_name;
                                                            echo form_dropdown('bank_name', $bank, $selected, $attributes);
                                                        ?>
                                                    </div>
													<?php echo form_error('bank_name', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control form-control-sm" placeholder="Account Number" name="account_number" required value="<?php echo (set_value('account_number')) ? set_value('account_number') : $emp->account_no; ?>">
                                                    </div>
													<?php echo form_error('account_number', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <input type="text" class="form-control form-control-sm" placeholder="IFSC Code" name="ifsc_code" required value="<?php echo (set_value('ifsc_code')) ? set_value('ifsc_code') : $emp->ifsc_code; ?>">
                                                    </div>
													<?php echo form_error('ifsc_code', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>
										<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Aadhaar Number :<span class="help-inline">*</span></label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" placeholder="Aadhaar Number" name="aadhaar_number"  value="<?php echo (set_value('aadhaar_card_no')) ? set_value('aadhaar_card_no') : $emp->aadhaar_card_no; ?>" maxlength="14">
                                                    </div>
													<?php echo form_error('aadhaar_number', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <h4 class="pr-h4">Permanent Address</h4>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                        <h4 class="pr-h4">Current Address</h4>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Vill & Po <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" placeholder="Vill & Po" name="p_address_1" value="<?php echo (set_value('p_address_1')) ? set_value('p_address_1') : $emp->p_address_1; ?>">
                                                    </div>
													<?php echo form_error('p_address_1', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Vill & Po <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control form-control-sm" id="" placeholder="Vill & Po" name="c_address_1" value="<?php echo (set_value('c_address_1')) ? set_value('c_address_1') : $emp->c_address_1; ?>">
                                                    </div>
													<?php echo form_error('c_address_1', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">Tehsil,Police Stn <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" placeholder="Tehsil,Police Stn" name="p_address_2" value="<?php echo (set_value('p_address_2')) ? set_value('p_address_2') : $emp->p_address_2; ?>">
                                                    </div>
													<?php echo form_error('p_address_2', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">Tehsil,Police Stn <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control form-control-sm" id="" placeholder="Tehsil,Police Stn" name="c_address_2" value="<?php echo (set_value('c_address_2')) ? set_value('c_address_2') : $emp->c_address_2; ?>">
                                                    </div>
													<?php echo form_error('c_address_2', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Dist  <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" placeholder="Dist" name="p_address_3" value="<?php echo (set_value('p_address_3')) ? set_value('p_address_3') : $emp->p_address_3; ?>">
                                                    </div>
													<?php echo form_error('p_address_3', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Dist  <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" placeholder="Dist" name="c_address_3" value="<?php echo (set_value('c_address_3')) ? set_value('c_address_3') : $emp->c_address_3; ?>">
                                                    </div>
													<?php echo form_error('c_address_3', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">State <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
                                                        <?php 
															$attributes = array('class' => 'form-control form-control-sm', 'id' => 'p_state_id');
															$selected = (set_value('p_state_id')) ? set_value('p_state_id') : $emp->p_state_id;
															echo form_dropdown('p_state_id', $state, $selected, $attributes);
														?>
                                                    </div>
													<?php echo form_error('p_state_id', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">State <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
                                                    	<?php 
															$attributes = array('class' => 'form-control form-control-sm', 'id' => 'c_state_id');
															$selected = (set_value('c_state_id')) ? set_value('c_state_id') : $emp->c_state_id;
															echo form_dropdown('c_state_id', $state, $selected, $attributes);
														?>
                                                    </div>
													<?php echo form_error('c_state_id', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        	<div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">City :</label>
                                                    <div class="col-sm-9">
                                                        <?php 
															$attributes = array('class' => 'form-control form-control-sm', 'id' => 'p_city_id');
															$selected = (set_value('p_city_id')) ? set_value('p_city_id') : $emp->p_city_id;
															echo form_dropdown('p_city_id', $p_city, $selected, $attributes);
														?>
                                                    </div>
													<?php echo form_error('p_city_id', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                        	</div>
                                        	<div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">City  <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
                                                        <?php 
															$attributes = array('class' => 'form-control form-control-sm', 'id' => 'c_city_id');
															$selected = (set_value('c_city_id')) ? set_value('c_city_id') : $emp->c_city_id;
															echo form_dropdown('c_city_id', $c_city, $selected, $attributes);
														?>
                                                    </div>
													<?php echo form_error('c_city_id', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                        	</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Residing Since <span class="help-inline"> *</span> :</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control form-control-sm" name="residing_since" value="<?php echo (set_value('residing_since')) ? set_value('residing_since') : $emp->residing_since; ?>">
                                                    </div>
													<?php echo form_error('residing_since', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">Tel Nos <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" name="tel_nos" value="<?php echo (set_value('tel_nos')) ? set_value('tel_nos') : $emp->telephone_no; ?>">
                                                    </div>
													<?php echo form_error('tel_nos', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm p-0">Dispensery : </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" name="dispensery" value="<?php echo (set_value('dispensery')) ? set_value('dispensery') : $emp->dispensary; ?>">
                                                    </div>
													 <?php echo form_error('dispensery', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">Background Check :</label>
                                                    <div class="col-sm-2">
                                                        <input type="checkbox" class="form-control form-control-sm" name="background_check" style="width: 70%;" value="1" <?php echo ($emp->background_check == 1 ? 'checked' : '');?> <?php echo set_checkbox('background_check', '1'); ?>>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Note :</label>
                                                    <div class="col-sm-10">
                                                        <textarea class="form-control form-control-sm" name="note"><?php echo (set_value('note')) ? set_value('note') : $emp->background_check_notes; ?></textarea>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>

                                      <?php } ?>

                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <h4 class="pr-h4">Family Details</h4>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-8">&nbsp;</div>
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
                                                      <th scope="col">SL. No.</th>
                                                      <th scope="col">Name&nbsp;<span class="help-inline">*</span></th>
                                                      <th scope="col">DOB&nbsp;<span class="help-inline">*</span></th>
                                                      <th scope="col">Age&nbsp;<span class="help-inline">*</span></th>
                                                      <th scope="col">Adhaar Number</th>
                                                      <th scope="col">Relation</th>
                                                      <th scope="col">Stays With Family&nbsp;(Y/N)</th>
                                                      <th style="border: none;background: #fff;">&nbsp;</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody id="tab_body_1">
                                                  	<?php if(!empty($employee)){  ?>
                                                  		<?php //print_r($employee[$name]);die; ?>
                                                  		<?php $i = 0; foreach($employee['name'] as $name){ ?>
                                                  		<tr width="100%" class="add_more_contact" id="add_more_contact'<?php echo $i; ?>'" style="">
                                                        	<td><?php echo $i+1; ?></td>
                                                            <td><input type="hidden" name="family_id[]" id="family_id<?php echo $i; ?>" value="<?php echo $employee['family_id'][$i]; ?>"><input type="text" name="name[]" class="form-control form-control-sm" id="name<?php echo $i; ?>" value="<?php echo $name; ?>"></td>
                                                             <td><input type="date" name="family_dob[]" class="form-control form-control-sm" id="family_dob<?php echo $i; ?>" value="<?php echo $employee['family_dob'][$i]; ?>"></td>
                                                             <td><input type="number" name="family_age[]" id="age<?php echo $i; ?>" class="form-control form-control-sm" value="<?php echo $employee['family_age'][$i]; ?>"></td>
                                                            <td><input type="text" name="aadhaar_no[]" id="aadhaar_no<?php echo $i; ?>" maxlength="14" minlength="12" class="form-control form-control-sm" value="<?php echo $employee['aadhaar_no'][$i]; ?>"></td>
                                                            <td>
                                                              <?php 
                                                                    $attributes = array('class' => 'form-control form-control-sm', 'id' => 'relation'.$i);
                                                                    echo form_dropdown('relation[]', $relation, $employee['relation'][$i], $attributes);
                                                              ?>
                                                            </td>
                                                            <td>
                                                              <?php 
                                                                  $options = array('Y' => 'Y', 'N' => 'N');
                                                                  $attributes = array('class' => 'form-control form-control-sm', 'id' => 'with_fam'.$i);
                                                                  echo form_dropdown('with_fam[]', $options, $employee['with_fam'][$i], $attributes);
                                                              ?>
                                                            </td>                                                     
                                                        </tr>
                                                    <?php $i++; 
                                                    $family_count = $i; ?>
                                                    <?php } ?>
                                                      <?php } else { $i = 0; foreach($edit_family as $family){ ?>

                                                        <tr width="100%" class="add_more_contact" id="add_more_contact'<?php echo $i; ?>'" style="">
                                                        	<td><?php echo $i+1; ?></td>
                                                            <td><input type="hidden" name="family_id[]" id="family_id<?php echo $i; ?>" value="<?php echo $family['family_id']; ?>"><input type="text" name="name[]" class="form-control form-control-sm" id="name<?php echo $i; ?>" value="<?php echo $family['member_name']; ?>"></td>
                                                            <td><input type="date" name="family_dob[]" class="form-control form-control-sm" id="family_dob<?php echo $i; ?>" value="<?php echo $family['dob']; ?>"></td>
                                                            <td><input type="number" name="family_age[]" id="age<?php echo $i; ?>" class="form-control form-control-sm" value="<?php echo $family['age']; ?>"></td>
                                                            <td><input type="number" name="aadhaar_no[]" id="aadhaar_no<?php echo $i; ?>" class="form-control form-control-sm" value="<?php echo $family['aadhaar_card_no']; ?>"></td>
                                                            <td>
                                                              <?php 
                                                                    $attributes = array('class' => 'form-control form-control-sm', 'id' => 'relation'.$i);
                                                                    echo form_dropdown('relation[]', $relation, $family['relation'], $attributes);
                                                              ?>
                                                            </td>
                                                            <td>
                                                              <?php 
                                                                  $options = array('Y' => 'Y', 'N' => 'N');
                                                                  $attributes = array('class' => 'form-control form-control-sm', 'id' => 'with_fam'.$i);
                                                                  echo form_dropdown('with_fam[]', $options, $family['stay_with'], $attributes);
                                                              ?>
                                                            </td>                                                            
                                                        </tr>

                                                    <?php $i++; 
                                                    $family_count = $i;
                                                	}
                                                } ?>
                                                  </tbody>
                                                </table>
                                            </div>
                                        </div>
                                      <!--   <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <h4 class="pr-h4">Family Details For PF</h4>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-8">&nbsp;</div>
                                            <div class="col-md-1">
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <button type="button" class="cr-a" id="add_more_btn2">Add</button>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div> -->
                                        <!-- <div class="row">
                                            <div class="col-md-12">
                                                <table class="table table-bordered tb-bl">
                                              <thead>
                                                <tr style="background: #e3b08d;color: #000;">
                                                  <th scope="col">SL. No.</th>
                                                  <th scope="col">Name</th>
                                                  <th scope="col">DOB</th>
                                                  <th scope="col">Relation</th>
                                                  <th style="border: none;background: #fff;">&nbsp;</th>
                                                </tr>
                                              </thead>
                                              <tbody id="tab_body_2">
                                              	  <?php //if(!empty($employee_pf)){  ?>
                                                  		<?php //print_r($employee_pf[$name]);die; ?>
                                                  		<?php //$j = 0; foreach($employee_pf['pf_name'] as $name){ ?>
                                                  		 <tr width="100%" class="add_more_contact" id="add_more_contact'<?php //echo $i; ?>'" style="">
                                                        	<td><?php //echo $j+1; ?></td>
                                                             <td><input type="hidden" name="pf_id[]" id="pf_id<?php //echo $j; ?>" value="<?php //echo $employee_pf['pf_id'][$j]; ?>"><input type="text" name="pf_name[]" class="form-control form-control-sm" id="pf_name<?php //echo $j; ?>" value="<?php //echo $name; ?>"></td>
                                                             <td><input type="date" name="pf_family_dob[]" class="form-control form-control-sm" id="pf_family_dob<?php //echo $j; ?>" value="<?php //echo $employee_pf['pf_family_dob'][$j]; ?>"></td>
                                                           <td>
                                                              <?php 
                                                                    // $attributes = array('class' => 'form-control form-control-sm', 'id' => 'pf_relation'.$j);
                                                                    // echo form_dropdown('pf_relation[]', $relation, $employee_pf['pf_relation'][$j], $attributes);
                                                              ?>
                                                            </td>                                               
                                                        </tr>
                                                    <?php //$j++; 
                                                    //$pf_count = $j; ?>
                                                    <?php //} ?>
                                                  <?php //} else { $j = 0; foreach($edit_family_pf as $pf){ ?>

                                                        <tr width="100%" class="add_more_contact" id="add_more_contact'<?php //echo $i; ?>'" style="">
                                                        	<td><?php //echo $j+1; ?></td>
                                                            <td><input type="hidden" name="pf_id[]" id="pf_id<?php //echo $j; ?>" value="<?php //echo $pf['family_pf_id']; ?>"><input type="text" name="pf_name[]" class="form-control form-control-sm" id="pf_name<?php //echo $j; ?>" value="<?php //echo $pf['member_name']; ?>"></td>
                                                            <td><input type="date" name="pf_family_dob[]" class="form-control form-control-sm" id="pf_family_dob<?php //echo $j; ?>" value="<?php //echo $pf['dob']; ?>"></td>
                                                           <td>
                                                              <?php 
                                                                    // $attributes = array('class' => 'form-control form-control-sm', 'id' => 'pf_relation'.$j);
                                                                    // echo form_dropdown('pf_relation[]', $relation, $pf['relation'], $attributes);
                                                              ?>
                                                            </td>
                                                        </tr>

                                                    <?php //$j++; 
                                                    //$pf_count = $j;
                                                //} 
                                            //} ?>
                                              </tbody>
                                            </table>
                                            </div>
                                        </div> -->
										<?php if($action_type == 'edit' && $mode == 'editable'){ ?>
                                        <div class="row">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-2">
										  <div class="form-actions">
                                            <button type="submit" name="action" value="save" class="cr-a">Save</button>
                                          </div>
                                        </div>
                                        <div class="col-md-5"></div>
										<?php if($others_info['detail_cnt'] > 0 && $others_info['doc_cnt'] > 0 && $emp->approval_status != 'A'){ ?>
										<div class="col-md-10 text-right">
											<div class="form-actions">
												<button type="submit" name="action" value="approval" class="btn btn-warning save_btn">Submit for Approval</button>
											</div>
										</div>
										<?php }?>
                                      </div>
									  <?php } ?>
									  
									  <?php if($action_type == 'approve'){ ?>
										<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Remarks for Approve / Reject</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control form-control-sm" name="approval_remarks" id="approval_remarks"><?php echo (set_value('approval_remarks')) ? set_value('approval_remarks') : ''; ?></textarea>
														<?php echo form_error('approval_remarks', '<span class="help-inline">', '</span>'); ?>
                                                    </div>
                                                  </div>
                                            </div>
											<?php if($emp->approval_status == 'I'){ ?>
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp;</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-actions">
                                                            <button type="submit" name="action" value="A" class="btn btn-success">Approve</button>
                                                        </div>
                                                    </div>
                                                  </div>
                                            </div>
											<div class="col-md-3">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp;</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-actions">
                                                            <button type="submit" name="action" value="R" class="btn btn-danger">Reject</button>
                                                        </div>
                                                    </div>
                                                  </div>
                                            </div>
											<?php } ?>
                                        </div>
										<?php } ?>
									  
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
			$('.date-picker').datepicker({ 
				autoclose: true,
				format: 'mm-dd'
			});
			
			<?php if($action_type == 'approve' || $mode == 'readonly'){ ?>
				applyReadOnlyMode('employeeform');
				<?php if($action_type == 'approve'){ ?>
					allowApproval();
				<?php } ?>
			<?php } ?>
			
        });
		
		function allowApproval(){
			$('#approval_remarks').removeAttr('readonly');
		}
		
        $('body').on('hover', '.nav-item.dropdown', function() {
            $(this).find('.dropdown-toggle').dropdown('toggle');
        });

         $("#p_state_id").change(() => {
	        var p_state_id = $("#p_state_id").val();
	        //alert(state_id);
	        populatecity_p(p_state_id);
    	})

        $("#c_state_id").change(() => {
	        var c_state_id = $("#c_state_id").val();
	        //alert(state_id);
	        populatecity_c(c_state_id);
    	})

    function populatecity_p(p_state_id){
        //alert(state_id);
       var result='';
        //var csrfName = $('.PVS_ERP_csrf').attr('name');

    $.ajax({
        type: 'POST',   
        url: '<?php echo base_url('client/city_list'); ?>',
        data: {state_id: p_state_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
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
        $("#p_city_id").html(result);
       // $("#city_id").selectpicker("refresh");
    
    })
    
    .fail(function(data){
        // show the any errors
        console.log(data);
    });
}

function populatecity_c(c_state_id){
        //alert(state_id);
       var result='';
        //var csrfName = $('.PVS_ERP_csrf').attr('name');

    $.ajax({
        type: 'POST',   
        url: '<?php echo base_url('client/city_list'); ?>',
        data: {state_id: c_state_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
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
        $("#c_city_id").html(result);
       // $("#city_id").selectpicker("refresh");
    
    })
    
    .fail(function(data){
        // show the any errors
        console.log(data);
    });
}


    <?php if(!empty($family_count)){ ?>
    var cnt = <?php echo $family_count-1 ; ?>;
<?php } else { ?>
	var cnt = 0;
	
	//var sl_no = 1;
<?php } ?>
    $("#add_more_btn").click(function () 
    {
        cnt++;
        var sl_no = cnt+1;
        var resulthtml='';
        resulthtml +='<tr class="add_more_contact" id="add_more_contact'+cnt+'" style="width:100%;">';
        resulthtml +='<td scope="row">'+sl_no+'</td>';
        resulthtml +='<td><input type="hidden" name="family_id[]" class="form-control form-control-sm" id="family_id'+cnt+'"><input type="text" name="name[]" id="name'+cnt+'" class="form-control form-control-sm" required></td>';
        resulthtml +='<td><input type="date" name="family_dob[]" id="family_dob'+cnt+'" class="form-control form-control-sm" required></td>';
        resulthtml +='<td><input type="number" name="family_age[]" id="age'+cnt+'" class="form-control form-control-sm" required></td>';
        resulthtml +='<td><input type="text" name="aadhaar_no[]" id="aadhaar_no'+cnt+'" class="form-control form-control-sm"></td>';
        //resulthtml +='<td><input type="text" name="relation[]" id="relation'+cnt+'" class="form-control form-control-sm"></td>';
        resulthtml +='<td><select id="relation'+cnt+'" class="form-control form-control-sm" name="relation[]" class="lh-width class="form-control form-control-sm"" required></select></td>'; 
       // resulthtml +='<td><input type="text" name="with_fam[]" id="with_fam'+cnt+'" class="form-control form-control-sm"></td>';  
       resulthtml +='<td><select class="form-control form-control-sm" id="with_fam'+cnt+'" name="with_fam[]" class="lh-width with_fam"><option value="Y">Y</option><option value="N">N</option></select></td>'; 
        resulthtml +='<td style="border: none;"><button type="button" class="but-btn" style:"background: transparent;border: none;margin-top: -10px;" value="delete" id="del_div'+cnt+'" onclick="delchild('+cnt+')"><i class="fa fa-trash-o fn-1" aria-hidden="true"></i></button></td>';
        resulthtml +='</tr>';
        $("#tab_body_1").append(resulthtml); 
        var position = cnt;
        populateRelation(position, 'relation');

    });


      <?php //if(!empty($pf_count)){ ?>
   // var cnt2 = <?php //echo $pf_count-1 ; ?>;
<?php //} else { ?>
	//var cnt2 = 0;
	
	//var sl_no = 1;
<?php //} ?>

    
    //  $("#add_more_btn2").click(function () 
    // {
    //     cnt2++;
    //     var sl_no2 = cnt2+1;
    //     var resulthtml='';
    //     resulthtml +='<tr class="add_more_contact" id="add_more_pf'+cnt2+'" style="width:100%;">';
    //     resulthtml +='<td scope="row">'+sl_no2+'</td>';
    //     resulthtml +='<td><input type="hidden" name="pf_id[]" class="form-control form-control-sm" id="pf_id'+cnt2+'"><input type="text" name="pf_name[]" id="pf_name'+cnt2+'" class="form-control form-control-sm"></td>';
    //     resulthtml +='<td><input type="date" name="pf_family_dob[]" id="pf_family_dob'+cnt2+'" class="form-control form-control-sm"></td>';
    //     //resulthtml +='<td><input type="text" name="pf_relation[]" id="pf_relation'+cnt2+'" class="form-control form-control-sm"></td>';
    //     resulthtml +='<td><select id="pf_relation'+cnt2+'" class="form-control form-control-sm" name="pf_relation[]" class="lh-width class="form-control form-control-sm""></select></td>';
    //     resulthtml +='<td style="border: none;"><button type="button" class="but-btn" style:"background: transparent;border: none;margin-top: -10px;" value="delete" id="del_div'+cnt2+'" onclick="delchild2('+cnt2+')"><i class="fa fa-trash-o fn-1" aria-hidden="true"></i></button></td>';
    //     resulthtml +='</tr>';
    //     $("#tab_body_2").append(resulthtml);
    //     var position_ = cnt2;
    //     populateRelation(position_, 'pf');
    // });

     function delchild(abc)
        {
            //alert(abc);
            $("#add_more_contact"+abc).remove();
        }

    // function delchild2(abc)
    //     {
    //         //alert(abc);
    //         $("#add_more_pf"+abc).remove();
    //     }

     function validDetail()
    {
        let isValidated = true;
        let dob = new Date($("#dob").val());
        let doj = new Date($("#doj").val());
        //let diffTime = Math.abs(dob - doj);
        //let diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
        //alert(diffDays);
        if(dob > doj)
        {
          isValidated = false;
        }

        if(!isValidated){
            alert("DOB should be greater than DOJ");
            return false;
        }

        let doa = new Date($("#doa").val());
        if(doj > doa)
        {
          isValidated = false;
        }
        if(!isValidated)
        {
          alert("DOA should be Less than or Equal DOA");
          return false;
        }

        if($("#tenure_date_1").val() != '' || $("#tenure_date_2").val() != ''){
            let tenure_date_1 = new Date($("#tenure_date_1").val());
            let tenure_date_2 = new Date($("#tenure_date_2").val());

            if(tenure_date_2 < tenure_date_1)
            {
              isValidated = false;
            }

            if(!isValidated){
                alert("Tenure Date 1 should be greater than Tenure Date 2");
                return false;
            }
        }
        

        let nameArr = $("input[name='name[]']").map(function(){return $(this).val();}).get();
        let dobArr = $("input[name='family_dob[]']").map(function(){return $(this).val();}).get();
        let ageArr = $("input[name='family_age[]']").map(function(){return $(this).val();}).get();

        nameArr.map((e,i)=>{
          if(((dobArr[i]) || (ageArr[i])) == ''){
            isValidated = false;
          }
        })
        if(!isValidated)
        {
          alert("Family DOB or Family Age should be inputted");
          return false;
        }


        return true;
      }

      function populateRelation(index = 0, type=""){
        //alert(state_id);
       var result='';
        //var csrfName = $('.PVS_ERP_csrf').attr('name');

    $.ajax({
        type: 'POST',   
        url: '<?php echo base_url('employee/relation_list'); ?>',
        data: {<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
        dataType: 'json',
        encode: true,
    })
    //ajax response
    .done(function(data){
        $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
        if(data.status){
            
            result +='<option value="">Select Relation</option>';

            $.each(data.relation_list,function(key,value){
                result +='<option value="'+value.lookup_id+'">'+value.lookup_desc+'</option>';
            });
        }
        else{
            result +='<option value="">No state selected</option>';
        }   

        //if(type == 'relation') { 
          $("#relation"+index).html(result); 
          //}
       //else { $("#pf_relation"+index).html(result); }       

        //$(".head").selectpicker("refresh");
    
    })
    
    .fail(function(data){
        // show the any errors
        console.log(data);
    });

    
        
}

      </script>