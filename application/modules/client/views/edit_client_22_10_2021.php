<?php //var_dump($approval_level); exit(); ?>
<style>
    .table-condensed{
        width: 185px !important;
    }
    .alert-success{
        position: relative;
    }
    #show_msg{
        position: relative;
    }
    .close-btn {
    position: absolute;  
    top: 50%;
    bottom: 0;
    right: 20px;
    transform: translateY(-50%);
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
                  <?php echo clientTabs(); ?>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-client" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1 class="text-center">Client Master</h1>
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

									<?php 
										$form_options = array(
											'id' => 'clientform', 'class' => 'form-horizontal form-hori-border'
										);
										if($action_type == 'edit'){
											$form_options['onSubmit'] = 'return validDetail()';
										}
									?>
                                    <?php echo form_open('', $form_options); ?>
                                        <input type="hidden" name="client_id" value="<?php echo $client->client_id; ?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Client Name<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-9">
                                                      <input type="text" name="client_name" maxlength="255" class="form-control form-control-sm" id="" placeholder="Client name" value="<?php echo (set_value('client_name')) ? set_value('client_name') : $client->client_name; ?>">
                                                    </div>
                                                    <?php echo form_error('client_name', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Address Line 1<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-9">
                                                      <input type="text" maxlength="255" name="address_line_1" class="form-control form-control-sm" id="" placeholder="Address Line 1" value="<?php echo (set_value('address_line_1')) ? set_value('address_line_1') : $client->address_1; ?>">
                                                      <?php echo form_error('address_line_1', '<span class="help-inline">', '</span>'); ?>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Client Code<span class="span_star_clr"> *</span>  </label>
                                                    <div class="col-sm-9">
                                                      <input type="text" name="client_code" maxlength="255" class="form-control form-control-sm" id="" placeholder="Client code" value="<?php echo (set_value('client_code')) ? set_value('client_code') : $client->client_code; ?>">

                                                    </div>
                                                    <?php echo form_error('client_code', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm pr-0">Agreement Start Date<span class="span_star_clr"> *</span> </label>
                                                        <div class="col-sm-8">
                                                          <input type="date" data-date-format="dd-mm-yyyy" class="form-control form-control-sm" id="agreemnt_start_date" placeholder="" name="agreemnt_start_date" value="<?php echo (set_value('agreemnt_start_date')) ? set_value('agreemnt_start_date') : $client->agreement_start_date; ?>">
                                                        </div>
                                                        <?php echo form_error('agreemnt_start_date', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Agreement End Date</label>
                                                        <div class="col-sm-8">
                                                          <input type="date" data-date-format="dd-mm-yyyy" class="form-control form-control-sm" id="agreemnt_end_date" name="agreemnt_end_date" value="<?php echo (set_value('agreemnt_end_date')) ? set_value('agreemnt_end_date') : $client->agreement_end_date; ?>">
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Address Line 2</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" maxlength="255" class="form-control form-control-sm" id="" name="address_line_2" placeholder="Address Line 2" value="<?php echo (set_value('address_line_2')) ? set_value('address_line_2') : $client->address_2; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Type<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-9">                                                      

                                                        <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'type_id');
                                                            $selected = (set_value('type_id')) ? set_value('type_id') : $client->industry_type_id;
                                                            echo form_dropdown('type_id', $type, $selected, $attributes);
                                                        ?>
                                                        <p>( Industry Type )</p>
                                                    </div>

                                                    <?php echo form_error('type_id', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Address Line 3</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" name="address_line_3" maxlength="255" class="form-control form-control-sm" id="" placeholder="Address Line 3" value="<?php echo (set_value('address_line_3')) ? set_value('address_line_3') : $client->address_3; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Rating<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-9">
                                                        <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'rating_id');
                                                            $selected = (set_value('rating_id')) ? set_value('rating_id') : $client->rating_id;
                                                            echo form_dropdown('rating_id', $rating, $selected, $attributes);
                                                        ?>
                                                        <p>( Buisness Potential )</p>
                                                    </div>

                                                    <?php echo form_error('rating_id', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">State<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-9">
                                                        
                                                        <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'state_id');
                                                            $selected = (set_value('state_id')) ? set_value('state_id') : $client->state_id;
                                                            echo form_dropdown('state_id', $state, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                    <?php echo form_error('state_id', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Location<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-9">
                                                        <label class="cont-radio-location"><input type="radio" name="location" value="M" <?php if($client->location_type=='M') echo "checked='checked'"; ?> <?php echo set_checkbox('location', 'M'); ?>>Multi Location</label>
                                                        <label class="cont-radio-location"><input type="radio" name="location" value="S" <?php if($client->location_type=='S') echo "checked='checked'"; ?> <?php echo set_checkbox('location', 'S'); ?>>Single Location</label>                                                        
                                                    </div>
                                                    <?php echo form_error('location', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">City<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-9">

                                                         <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'city_id');
                                                            $selected = (set_value('city_id')) ? set_value('city_id') : $client->city_id;
                                                            echo form_dropdown('city_id', $city, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                    <?php echo form_error('city_id', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Tel Nos<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="tel_nos" placeholder="Tel Nos" maxlength="15" value="<?php echo (set_value('tel_nos')) ? set_value('tel_nos') : $client->contact_no; ?>">
                                                    </div>
                                                    <?php echo form_error('tel_nos', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Pincode <span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-9">
                                                      <input type="number" class="form-control form-control-sm" id="" name="pincode" placeholder="Pincode" value="<?php echo (set_value('pincode')) ? set_value('pincode') : $client->pincode; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Fax </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="fax" placeholder="Fax" maxlength="15" value="<?php echo (set_value('fax')) ? set_value('fax') : $client->fax_no; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">Foundation Day</label>
                                                    <div class="col-sm-9">
                                                      <input type="date" class="form-control form-control-sm" id="" placeholder="" name="foundation_day" value="<?php echo (set_value('foundation_day')) ? set_value('foundation_day') : $client->foundation_date; ?>">
                                                    </div>
                                                    <?php echo form_error('foundation_day', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Email<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control form-control-sm" id="" name="client_email" placeholder="Email" maxlength="100" value="<?php echo (set_value('client_email')) ? set_value('client_email') : $client->email; ?>">
                                                    </div>
                                                    <?php echo form_error('client_email', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">MW Type<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-9">
                                                      

                                                        <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'mw_type_id');
                                                            $selected = (set_value('mw_type_id')) ? set_value('mw_type_id') : $client->mw_type_id;
                                                            echo form_dropdown('mw_type_id', $mw_type, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                    <?php echo form_error('mw_type_id', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Website </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" name="website" placeholder="Website" maxlength="150" value="<?php echo (set_value('website')) ? set_value('website') : $client->website; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Source<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-9">
                                                     
                                                        <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'source_id');
                                                            $selected = (set_value('source_id')) ? set_value('source_id') : $client->source_id;
                                                            echo form_dropdown('source_id', $source, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                    <?php echo form_error('source_id', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Contract Status </label>
                                                    <div class="col-sm-9">
                                                       
                                                        <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'contract_status_id');
                                                            $selected = (set_value('contract_status_id')) ? set_value('contract_status_id') : $client->contract_status_id;
                                                            echo form_dropdown('contract_status_id', $contract_status, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                    <?php echo form_error('contract_status_id', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Source Reference  </label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control form-control-sm" name="source_ref" maxlength="255" id="source_ref"><?php echo (set_value('source_ref')) ? set_value('source_ref') : $client->source_reference; ?></textarea>
                                                    </div>
                                                    <?php echo form_error('source_ref', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row border-bottom-row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Billing Method<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-9">
                                                        <label class="cont-radio-location"><input type="radio" name="billing_method" value="C" <?php if($client->billing_method=='C') echo "checked='checked'"; ?> <?php echo set_checkbox('billing_method', 'C'); ?>>Consolidated</label>
                                                        <label class="cont-radio-location"><input type="radio" name="billing_method" value="B" <?php if($client->billing_method=='B') echo "checked='checked'"; ?> <?php echo set_checkbox('billing_method', 'B'); ?>>Branch Wise</label>                                                        
                                                        <label class="cont-radio-location"><input type="radio" name="billing_method" value="S" <?php if($client->billing_method=='S') echo "checked='checked'"; ?> <?php echo set_checkbox('billing_method', 'S'); ?>>State Wise</label>                                                        
                                                    </div>
                                                    <?php echo form_error('billing_method', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <h3 class="cl-h3">Client Contact Details</h3>
											
                                            <div class="col-md-<?php echo ($action_type == 'edit' && $mode == 'editable') ? '11' : 12; ?>">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                      <thead>
                                                        <tr>
                                                          <th scope="col">Name<span class="span_star_clr"> *</span> </th>
                                                          <th scope="col">Designation<span class="span_star_clr"> *</span> </th>
                                                          <th scope="col">Contact No<span class="span_star_clr"> *</span> </th>
                                                          <th scope="col">Email<span class="span_star_clr"> *</span> </th>
                                                            <th scope="col">Birthday</th>
                                                          <th scope="col">Anniversary</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody id="tab_body">
                                                        <?php if(!empty($client_contact)){ ?>

                                                            <?php $i = 0; foreach($client_contact['name'] as $contact){ ?>
                                                        
                                                        <tr width="100%" class="add_more_contact" id="add_more_contact'<?php echo $i; ?>'" style="">
                                                            <td><input type="hidden" name="contact_id[]" id="contact_id<?php echo $i; ?>" value="<?php echo $client_contact['contact_id'][$i]; ?>"><input type="text" name="name[]" class="form-control form-control-sm" id="name<?php echo $i; ?>" value="<?php echo $contact; ?>"></td>
                                                            <td style="padding-left: 0;padding-right: 0;"><input type="text" name="designation[]" class="form-control form-control-sm" id="designation<?php echo $i; ?>" value="<?php echo $client_contact['designation'][$i]; ?>"></td>
                                                            <td><input type="text" name="contact_no[]" class="form-control form-control-sm" id="contact_no<?php echo $i; ?>" value="<?php echo $client_contact['contact_no'][$i]; ?>"></td>
                                                            <td style="padding-left: 0;padding-right: 0;"><input type="email" name="email[]" class="form-control form-control-sm" id="email<?php echo $i; ?>" value="<?php echo $client_contact['email'][$i]; ?>"></td>
                                                            <td><input type="text" name="birthday[]" class="form-control form-control-sm date-picker" id="birthday<?php echo $i; ?>" value="<?php echo $client_contact['birthday'][$i]; ?>"></td>
                                                            <td><input type="text" name="anniversary[]" class="form-control form-control-sm date-picker" id="anniversary<?php echo $i; ?>" value="<?php echo $client_contact['anniversary'][$i]; ?>"></td>

                                                            <?php $i++; 
                                                            $contact_count = $i; ?>

                                                            <?php } ?>
                                                        </tr>

                                                        <?php } else {?>
                                                        <?php $i = 0; foreach($edit_client_contact as $contact){ ?>

                                                        <tr width="100%" class="add_more_contact" id="add_more_contact'<?php echo $i; ?>'" style="">
                                                            <td><input type="hidden" name="contact_id[]" id="contact_id<?php echo $i; ?>" value="<?php echo $contact['client_contact_id']; ?>"><input type="text" name="name[]" class="form-control form-control-sm" id="name<?php echo $i; ?>" value="<?php echo $contact['name']; ?>"></td>
                                                            <td style="padding-left: 0;padding-right: 0;"><input type="text" name="designation[]" class="form-control form-control-sm" id="designation<?php echo $i; ?>" value="<?php echo $contact['designation']; ?>"></td>
                                                            <td><input type="text" name="contact_no[]" class="form-control form-control-sm" id="contact_no<?php echo $i; ?>" value="<?php echo $contact['contact_no']; ?>"></td>
                                                            <td style="padding-left: 0;padding-right: 0;"><input type="email" name="email[]" class="form-control form-control-sm" id="email<?php echo $i; ?>" value="<?php echo $contact['email']; ?>"></td>
                                                            <td><input type="text" name="birthday[]" class="form-control form-control-sm date-picker" id="birthday<?php echo $i; ?>" value="<?php if($contact['birth_date']) { echo date('m-d', strtotime($contact['birth_date'])); } ?>"></td>
                                                            <td><input type="text" name="anniversary[]" class="form-control form-control-sm date-picker" id="anniversary<?php echo $i; ?>" value="<?php if($contact['anniversary_date']) {echo date('m-d', strtotime($contact['anniversary_date'])); }?>"></td>
                                                            
                                                        </tr>

                                                    <?php $i++; 
                                                    $contact_count = $i;

                                                } ?>

                                            <?php } ?>
                                                      </tbody>
                                                    </table>
                                                </div>
                                            </div>
											<?php if($action_type == 'edit' && $mode == 'editable'){ ?>
                                            <div class="col-md-1">
                                                <button type="button" class="cr-a add-cont-btn add_btn" id="add_more_btn">Add</button>
                                            </div>
											<?php } ?>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Remarks</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control form-control-sm" name="remarks" id="remarks"><?php echo (set_value('remarks')) ? set_value('remarks') : $client->remarks; ?></textarea>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-sm-6 text-right">
                                                <div class="form-group row">
                                                    <div class="col-md-2">
                                                        <button type="submit" name="action" value="save" class="cr-a save_btn">Save</button>
                                                    </div>
                                                    <label class="col-md-10"></label> 
                                                </div>
                                            </div>
                                        </div>
										<?php if($action_type == 'edit' && $mode == 'editable'){ ?>
										<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
													<?php if($others_info['branch_cnt'] > 0 && $others_info['sales_billing_cnt'] > 0 && $others_info['billing_costing_cnt'] > 0){ ?>
                                                    <div class="col-sm-6 text-right">
                                                        <div class="form-actions">
                                                            <button type="submit" name="action" value="approval" class="btn btn-warning save_btn">Submit for Approval</button>
                                                        </div>
                                                    </div>
													<?php }?>
                                                </div>
                                            </div>
                                        </div>
										<?php } ?>
										<?php if($action_type == 'approve' && !empty($approval_level->my_approval_level)){ ?>
										<div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Remarks for Approve / Reject</label>
                                                    <div class="col-sm-9">
                                                        <input type="hidden" name="approval_level" value="<?php echo $approval_level->my_approval_level?>">
														<textarea class="form-control form-control-sm" name="approval_remarks" id="approval_remarks"><?php echo (set_value('approval_remarks')) ? set_value('approval_remarks') : ''; ?></textarea>
														<?php echo form_error('approval_remarks', '<span class="help-inline">', '</span>'); ?>
                                                    </div>
                                                  </div>
                                            </div>
											<?php if(($approval_level->my_approval_level == 1 && $client->approval_status_1 == 'I') || ($approval_level->my_approval_level == 2 && $client->approval_status_2 == 'I' && $client->approval_status_1 == 'A')){ ?>
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
										
										<?php ?>
										<div class="row">
										<?php if($client->approval_status_1 != 'I'){ ?>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">
													<?php if($client->approval_status_1 == 'A'){ echo "Approval "; } else if($client->approval_status_1 == 'R'){ echo "Rejection "; } ?> 
													Remarks by <?php echo $client->approval_level_1; ?>
													</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control form-control-sm" name="a_r_remarks_1" id="a_r_remarks_1"><?php echo $client->approval_remarks_1; ?></textarea>
                                                    </div>
                                                  </div>
                                            </div>
										<?php } ?>
                                        
										<?php if($client->approval_status_2 != 'I'){ ?>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">
													<?php if($client->approval_status_2 == 'A'){ echo "Approval "; } else if($client->approval_status_2 == 'R'){ echo "Rejection "; } ?> 
													Remarks by <?php echo $client->approval_level_2; ?>
													</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control form-control-sm" name="a_r_remarks_2" id="a_r_remarks_2"><?php echo $client->approval_remarks_2; ?></textarea>
                                                    </div>
                                                  </div>
                                            </div>
										<?php } ?>
                                        </div>
										<?php ?>
										
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
            setTimeout(function() {
            $('#show_msg').fadeOut();}, 3000);

            $('.date-picker').datepicker({ 
				autoclose: true,
				format: 'mm-dd'
				
			});
			<?php if($action_type == 'approve' || $mode == 'readonly'){ ?>
				applyReadOnlyMode('clientform');
				<?php if(!empty($approval_level->my_approval_level)){ ?>
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

  // function addnewclient(){
  //       var resulthtml='';
  //       resulthtml +='<tr width="100%" class="add_more_contact" style="">';
  //       resulthtml +='<td><input type="text" name="name[]" class="form-control form-control-sm" id="name0"></td>';
  //       resulthtml +='<td><input type="text" name="designation[]" class="form-control form-control-sm" id="designation0"></td>';
  //       resulthtml +='<td><input type="text" name="contact_no[]" class="form-control form-control-sm" id="contact_no0"></td>';
  //       resulthtml +='<td><input type="text" name="email[]" class="form-control form-control-sm" id="email0"></td>';
  //       resulthtml +='<td><input type="date" name="birthday[]" class="form-control form-control-sm" id="birthday0"></td>';
  //       resulthtml +='<td><input type="date" name="anniversary[]" class="form-control form-control-sm" id="anniversary0"></td>';
  //       //resulthtml +='<td>&nbsp;</td>';
  //       resulthtml +='</tr>';
  //       $("#tab_body").html(resulthtml);
  //   }

    var cnt = <?php echo $contact_count-1 ; ?>;
    $("#add_more_btn").click(function () 
    {
        cnt++;
        var resulthtml='';
        resulthtml +='<tr class="add_more_contact" id="add_more_contact'+cnt+'" style="width:100%;">';
        resulthtml +='<td><input type="hidden" name="contact_id[]" class="form-control form-control-sm" id="contact_id'+cnt+'"><input type="text" required="" name="name[]" class="form-control form-control-sm" id="name'+cnt+'"></td>';
        resulthtml +='<td style="padding-left: 0;padding-right: 0;"><input required="" type="text" name="designation[]" class="form-control form-control-sm" id="designation'+cnt+'"></td>';
        resulthtml +='<td><input required="" type="text" name="contact_no[]" class="form-control form-control-sm" id="contact_no'+cnt+'"></td>';
        resulthtml +='<td style="padding-left: 0;padding-right: 0;"><input required="" type="email" name="email[]" class="form-control form-control-sm" id="email'+cnt+'"></td>';
        resulthtml +='<td><input type="text" name="birthday[]" placeholder="mm-dd" class="form-control form-control-sm" id="birthday'+cnt+'"></td>';
        resulthtml +='<td><input type="text" name="anniversary[]" placeholder="mm-dd" class="form-control form-control-sm" id="anniversary'+cnt+'"></td>';
        resulthtml +='<td style="border: none;"><button type="button" class="but-btn" style:"background: transparent;border: none;margin-top: -10px;" value="delete" id="del_div'+cnt+'" onclick="delchild('+cnt+')"><i class="fa fa-trash-o fn-1" aria-hidden="true"></i></button></td>';
        resulthtml +='</tr>';
        $("#tab_body").append(resulthtml);

        $("#birthday"+cnt).datepicker({
            format: 'mm-dd',
            todayHighlight: true,
            autoclose: true
            });

        $("#anniversary"+cnt).datepicker({
            format: 'mm-dd',
            todayHighlight: true,
            autoclose: true
            });                                                            

         //focus_blur();
        $('.del_div').on('click',function()
        {
            $(this).parents('.add_more_contact').remove();
        });
    });

     function delchild(abc)
        {
            //alert(abc);
            $("#add_more_contact"+abc).remove();
        }

    function validDetail()
    {
        let isValidated = true;
        let agreemnt_start_date = new Date($("#agreemnt_start_date").val());
        let agreemnt_end_date = new Date($("#agreemnt_end_date").val());

        if(agreemnt_start_date > agreemnt_end_date)
        {
          isValidated = false;
        }

        if(!isValidated){
            alert("Agreement Start Date should be greater than Agreement End Date");
            return false;
        }

        return true;
    }

      </script>