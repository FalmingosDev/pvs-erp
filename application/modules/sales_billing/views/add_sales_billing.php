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
							<h1>Add Sales Billing</h1>
							<div class="wrapper-box">
								<?php //echo validation_errors(); ?>
								<?php if($this->session->flashdata('msg')): ?>
									<div class="alert alert-success alert-dismissible fade show" role="alert" id="show_msg">
										<strong><?php echo $this->session->flashdata('msg'); ?></strong>
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
									</div>
								<?php endif; ?>
							<?php echo form_open( base_url( 'sales_billing/add_sales_billing/' . $client->client_id ), array( 'id' => 'clientform', 'class' => 'form-horizontal form-hori-border' ) ); ?>
							
								<input type="hidden" name="client_id" value="<?php echo $client->client_id; ?>">
                                <?php
								if($billing_method->billing_method=='C' || $billing_method->billing_method=='')
								{
								?>
							    <div class="row">
									<div class="col-md-6">
										<div class="form-group row">
											<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Client Name<span class="span_star_clr"> *</span> </label>
											<div class="col-sm-9">
												<input type="text" class="form-control form-control-sm" name="client_name" placeholder="Client name" value="<?php echo $client->client_name; ?>" readonly="readonly" />
												<?php echo form_error('client_name', '<span class="help-inline">', '</span>'); ?>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group row">
										<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Bill Start Date<span class="span_star_clr"> *</span> </label>
											<div class="col-sm-8">
											  <input type="date" data-date-format="dd-mm-yyyy" class="form-control form-control-sm" id="billstartdate" placeholder="" name="billstartdate" value="<?php echo set_value('billstartdate') ?>">
											  <?php echo form_error('billstartdate', '<span class="help-inline">', '</span>'); ?>
											</div>
										</div>
									</div>
								</div>
								<?php
								}
								elseif($billing_method->billing_method=='B')
								{
									?>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Client Name<span class="span_star_clr"> *</span> </label>
												<div class="col-sm-9">
													<input type="text" class="form-control form-control-sm" name="client_name" placeholder="Client name" value="<?php echo $client->client_name; ?>" readonly="readonly" />
													<?php echo form_error('client_name', '<span class="help-inline">', '</span>'); ?>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Billing Branch<span class="span_star_clr"> *</span> </label>
												<div class="col-sm-9">
												<select class="form-control form-control-sm" id="billing_branch_id" name="billing_branch_id">
												<option value="">Select Branch Name</option>
												<?php
                                                    foreach($billing_branch as $billing_branch_row)
                                                    {
														?>
														<option value="<?=$billing_branch_row['branch_id']?>" ><?=$billing_branch_row['branch_name']?></option>
														<?php
                                                   }
                                                ?>  
                                            </select>
											<?php echo form_error('billing_branch_id', '<span class="help-inline">', '</span>'); ?>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
											<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Bill Start Date<span class="span_star_clr"> *</span> </label>
												<div class="col-sm-8">
												<input type="date" data-date-format="dd-mm-yyyy" class="form-control form-control-sm" id="billstartdate" placeholder="" name="billstartdate" value="<?php echo set_value('billstartdate'); ?>">
												<?php echo form_error('billstartdate', '<span class="help-inline">', '</span>'); ?>
												</div>
											</div>
										</div>
									</div>
									<?php
								}
								elseif($billing_method->billing_method=='S')
								{
									?>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Client Name<span class="span_star_clr"> *</span> </label>
												<div class="col-sm-9">
													<input type="text" class="form-control form-control-sm" name="client_name" placeholder="Client name" value="<?php echo $client->client_name; ?>" readonly="readonly" />
													<?php echo form_error('client_name', '<span class="help-inline">', '</span>'); ?>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group row">
												<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Billing State<span class="span_star_clr"> *</span> </label>
												<div class="col-sm-9">
												<select class="form-control form-control-sm" id="branch_state_id" name="branch_state_id">
												<option value="">Select Branch State</option>
												<?php
                                                    foreach($billing_state as $billing_state_row)
                                                    {
														?>
														<option value="<?=$billing_state_row['state_id']?>"><?=$billing_state_row['state_name']?></option>
														<?php
                                                   }
                                                ?> 
												</select>
												<?php echo form_error('branch_state_id', '<span class="help-inline">', '</span>'); ?>
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group row">
											<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Bill Start Date<span class="span_star_clr"> *</span> </label>
												<div class="col-sm-8">
												<input type="date" data-date-format="dd-mm-yyyy" class="form-control form-control-sm" id="billstartdate" placeholder="" name="billstartdate" value="<?php echo set_value('billstartdate') ; ?>">
												<?php echo form_error('billstartdate', '<span class="help-inline">', '</span>'); ?>
												</div>
											</div>
										</div>
									</div>
									<?php
								}
								?>
							    
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Address Line 1<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
											<input type="text" maxlength="255" class="form-control form-control-sm" name="addressline1"  id="addressline1" placeholder="Address line 1" value="<?php echo set_value('addressline1'); ?>" />
											<?php echo form_error('addressline1', '<span class="help-inline">', '</span>'); ?>
										</div>
									</div> 
								</div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Address Line 2 </label>
                                        <div class="col-sm-9">
											<input type="text" class="form-control form-control-sm" maxlength="255" name="addressline2"  id="addressline2" placeholder="Address line 2" value="<?php echo set_value('addressline2'); ?>" />
											<?php echo form_error('addressline2', '<span class="help-inline">', '</span>'); ?>
										</div>
									</div> 
                               </div> 
                            
                            
                        </div>
						<div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Address Line 3 </label>
                                        <div class="col-sm-9">
											<input type="text" class="form-control form-control-sm" maxlength="255" name="addressline3"  id="addressline3" placeholder="Address line 3" value="<?php echo set_value('addressline3'); ?>" />
											<?php echo form_error('addressline3', '<span class="help-inline">', '</span>'); ?>
										</div>
									</div> 
								</div>
								<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">State<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
										<?php 
											echo form_dropdown('state_id', $state, (set_value('state_id')) ? set_value('state_id') : '', array('class' => 'form-control form-control-sm', 'id' => 'state_id'));
										?>
                                        <?php echo form_error('state_id', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                            </div>
								
						</div>
						<div class="row">
                            <div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">City<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
										<?php 
											echo form_dropdown('city_id', $city, (set_value('city_id')) ? set_value('city_id') : '', array('class' => 'form-control form-control-sm', 'id' => 'city_id'));
										?>
                                        <?php echo form_error('city_id', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                        	</div>
							<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Pin Code<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
											<input type="number" class="form-control form-control-sm" name="pincode"  id="pincode" placeholder="Pin code" value="<?php echo set_value('pincode'); ?>" />
											<?php echo form_error('pincode', '<span class="help-inline">', '</span>'); ?>
										</div>
									</div> 
							</div>	
						</div>
						<div class="row">
                            <div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Contact Name<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
											<input type="text" class="form-control form-control-sm" maxlength="100" name="contact_name"  id="contact_name" placeholder="Contact Name" value="<?php echo set_value('contact_name'); ?>" />
											<?php echo form_error('contact_name', '<span class="help-inline">', '</span>'); ?>
										</div>
									</div> 
								</div>
                                <div class="col-md-6">
                                 <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Contact No<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
											<input type="number" maxlength="30" class="form-control form-control-sm" name="contact_no" id="contact_no" placeholder="Contact No" value="<?php echo set_value('contact_no'); ?>" />
											<?php echo form_error('contact_no', '<span class="help-inline">', '</span>'); ?>
										</div>
									</div>   
                               </div>    
                        </div>
                        <div class="row">
								<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="contact_email" class="col-sm-3 col-form-label col-form-label-sm">Email<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
											<input type="email" maxlength="150" class="form-control form-control-sm" name="contact_email" id="contact_email" placeholder="Email" value="<?php echo set_value('contact_email'); ?>" />
											<?php echo form_error('contact_email', '<span class="help-inline">', '</span>'); ?>
										</div>
									</div> 
								</div>
								<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Contract Agreement<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-4">
											<input type="radio"  name="cont_agre" value="Y"<?php echo set_checkbox('cont_agre', 'Y'); ?>>
											<label for="Yes">Yes</label>
											<input type="radio"  name="cont_agre" value="N"<?php echo set_checkbox('cont_agre', 'N'); ?>>
											<label for="No">No</label>
										</div>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control form-control-sm" name="contractagrt"  id="contractagrt" placeholder="Contract Agreement" value="<?php echo set_value('contractagrt'); ?>" />
                                        </div>
									</div> 
								</div>
							</div>
                                
                            <div class="row">
								<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Special/Negative Clause in Agreement</label>
                                        <div class="col-sm-9">
											<textarea class="form-control form-control-sm" id="clause" maxlength="255" name="clause" rows="3" cols="30"><?php echo set_value(''); ?></textarea>   
										</div>
									</div> 
								</div>
								<div class="col-md-6">
									<div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Query Generated By</label>
                                        <div class="col-sm-9">
											<input type="text" maxlength="100" class="form-control form-control-sm" name="q_gen_by"  id="q_gen_by" placeholder="Query Generated By" value="<?php echo set_value('q_gen_by'); ?>" />
											<?php echo form_error('q_gen_by', '<span class="help-inline">', '</span>'); ?>
										</div>
									</div> 
                                     
								</div>
							</div>
							
                        
						<div class="row">
                            <div class="col-md-6">
								<div class="form-group row">
												<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Agreement Valid Upto<span class="span_star_clr"> *</span> </label>
									<div class="col-sm-8">
                                        <input type="date" data-date-format="dd-mm-yyyy" name="agreementvalidity" id="agreementvalidity" class="form-control form-control-sm" value="<?php echo set_value('agreementvalidity'); ?>">
											<?php echo form_error('agreementvalidity', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div> 
                            </div> 
							   <div class="col-md-6">
								<div class="form-group row">
												<label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Date Of Contract</label>
									<div class="col-sm-8">
                                        <input type="date" data-date-format="dd-mm-yyyy" name="dateofcontract" id="dateofcontract" class="form-control form-control-sm" value="<?php echo set_value('dateofcontract'); ?>">
											<?php echo form_error('dateofcontract', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div> 
                               </div> 
                        </div>
						<div class="row">
							<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">Contract Renewal/Expiry :<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
                                        <input type="date" data-date-format="dd-mm-yyyy" name="contractrewexp" id="contractrewexp" class="form-control form-control-sm" value="<?php echo set_value('contractrewexp'); ?>">
											<?php echo form_error('contractrewexp', '<span class="help-inline">', '</span>'); ?>
										</div>
                                    </div> 
                            </div> 
							<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Contract Amount<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
											<input type="number" class="form-control form-control-sm" name="contract_value"  id="contract_value" placeholder="Contract Amount" value="<?php echo set_value('contract_value'); ?>" />
											<?php echo form_error('contract_value', '<span class="help-inline">', '</span>'); ?>
										</div>
									</div> 
                        	</div>
							<!---->
                        </div>
						<div class="row">
							<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Contract Type :<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
											<?php 
												$options = array('R' => 'Regular', 'S' => 'Short Term', 'E' => 'Event');
												$attributes = array('class' => 'form-control form-control-sm', 'id' => 'cars');
												$selected = (set_value('cars')) ? set_value('cars') : '';
												echo form_dropdown('cars', $options, $selected, $attributes);
											?>
											<?php echo form_error('cars', '<span class="help-inline">', '</span>'); ?>
										</div>
									</div> 
                        	</div>
							<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Agreement Summary :<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
											<input type="text" class="form-control form-control-sm" maxlength="255" name="agreementsummary"  id="agreementsummary" placeholder="Agreement Summary" value="<?php echo set_value('agreementsummary'); ?>" />
											<?php echo form_error('agreementsummary', '<span class="help-inline">', '</span>'); ?>
										</div>
										
									</div> 									
                        	</div>
                        </div>
						<div class="row">
								<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Bill Type<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-4">
											<input type="radio" name="fixed" id="fixedd" value="F"<?php echo set_checkbox('fixed', 'F'); ?>>
											<label for="fixedd">Fixed</label>
											<input type="radio" name="fixed" id="muster" value="M"<?php echo set_checkbox('fixed', 'M'); ?>>
											<label for="muster">Muster</label>
                                        <?php echo form_error('fixed', '<span class="help-inline">', '</span>'); ?>
										</div>
									</div>
								</div>
								<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">Service Charges<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
											<input type="number" class="form-control form-control-sm" name="servicecharges"  id="servicecharges" placeholder="Service Charges" value="<?php echo set_value('servicecharges'); ?>"/>
											<?php echo form_error('servicecharges', '<span class="help-inline">', '</span>'); ?>
										</div>
									</div>  
								</div>
						</div>
                        <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">PF<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
											<input type="number" class="form-control form-control-sm" name="pf"  id="pf" placeholder="PF" value="<?php echo set_value('pf'); ?>" />
											<?php echo form_error('pf', '<span class="help-inline">', '</span>'); ?>
										</div>
									</div> 
                        	</div>
                        	<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">ESI<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
											<input type="number" class="form-control form-control-sm" name="esi"  id="esi" placeholder="ESI" value="<?php echo set_value('esi'); ?>" />
											<?php echo form_error('esi', '<span class="help-inline">', '</span>'); ?>
										</div>
									</div> 
                        	</div>
						</div>
						
                        <div class="row">
							<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Bonus :<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
											<input type="number" class="form-control form-control-sm" name="bonus"  id="bonus" placeholder="Bonus" value="<?php echo set_value('bonus'); ?>" />
											<?php echo form_error('bonus', '<span class="help-inline">', '</span>'); ?>
										</div>
									</div> 
                        	</div>
							<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Releiving Charges :<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
                                        <input type="number" class="form-control form-control-sm" id="rc_charge" name="rc_charge" placeholder="Releiving Charges" value="<?php echo set_value('rc_charge'); ?>" />
                                        <?php echo form_error('rc_charge', '<span class="help-inline">', '</span>'); ?>
										</div>
                                </div>
                        	</div>
                        								
                        </div>
						
                        <div class="row">
							<div class="col-md-6">
								<div class="form-group row">
									 <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Bill Prefix if any :</label>
									<div class="col-sm-9">
									<input type="text" maxlength="30" class="form-control form-control-sm" id="bill_pre" name="bill_pre" placeholder="Bill Prefix if any" value="<?php echo set_value('bill_pre'); ?>" />
									<?php echo form_error('bill_pre', '<span class="help-inline">', '</span>'); ?>
									</div>
								</div>
							</div>
							<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">P/O No :<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" id="po_no" maxlength="50" name="po_no" placeholder="P/O No" value="<?php echo set_value('po_no'); ?>" /> 
                                        <?php echo form_error('po_no', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                        	</div>
						</div>
						
                        <div class="row">
							<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Site At :<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" maxlength="100" id="site_at" name="site_at" placeholder="Site At" value="<?php echo set_value('site_at'); ?>" />
                                        <?php echo form_error('site_at', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                        	</div>
							<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Billing Enclosuers :</label>
                                        <div class="col-sm-9">
											<textarea type="text" maxlength="255" class="form-control form-control-sm" name="enclosuers"  id="enclosuers" placeholder="Enclosuers"><?php echo set_value('enclosuers'); ?></textarea>
											<?php echo form_error('enclosuers', '<span class="help-inline">', '</span>'); ?>
										</div>
										
									</div>
							</div>
                        </div>

								<div class="heading">
                                    <h2 style="padding-top: 14px;">GST INFORMATION</h2>  
                                </div>
								
								
                        <div class="row">
							<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">GSTIN No :<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
                                        <input type="text" maxlength="20" class="form-control form-control-sm" id="gstin" name="gstin" placeholder="GSTIN No" value="<?php echo set_value('gstin'); ?>" />
                                        <?php echo form_error('gstin', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                        	</div>
                        	<!--<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">HSN No :<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
                                        <input type="text" maxlength="20" class="form-control form-control-sm" id="hsn" name="hsn" placeholder="HSN No" value="<?php echo set_value('hsn'); ?>" />
                                        <?php echo form_error('hsn', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                        	</div>-->
                        </div>

                        <div class="row">
							<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="cat_id" class="col-sm-3 col-form-label col-form-label-sm">Category :<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
										<?php echo form_dropdown('cat_id', $category, set_value('cat_id'), array('class' => 'form-control form-control-sm', 'id' => 'cat_id')); ?>
                                        <?php echo form_error('cat_id', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                        	</div>
							<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="ser_cat_id" class="col-sm-3 col-form-label col-form-label-sm pr-0">Service Category <span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
										<?php echo form_dropdown('ser_cat_id', $sercategory, set_value('ser_cat_id'), array('class' => 'form-control form-control-sm', 'id' => 'ser_cat_id')); ?>
                                        <?php echo form_error('ser_cat_id', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                        	</div>
						</div>

						<div class="row">
								<div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">State Name<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
                                    	<?php echo form_dropdown('statename', $state_all, set_value('statename') ,array('class' => 'form-control form-control-sm', 'id' => 'statename')); ?>
										</select>
                                        <?php echo form_error('statename', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                        	</div>
                        	<div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">State Code<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
                                    	<input type="text" maxlength="3" name="statecode" id="statecode" class="form-control form-control-sm"  placeholder="State Code" value="" readonly/>
                                        <?php echo form_error('statecode', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                        	</div>
							
                        </div>
						
						<div class="row">
                        	<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">CGST % </label>
                                        <div class="col-sm-9">
                                    	<input type="number" name="cgst" id="cgst" class="form-control form-control-sm" value="<?php echo (set_value('cgst')) ? set_value('cgst') : 0; ?>" />
                                        <?php echo form_error('cgst', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                        	</div>                     	
                        	
							<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">SGST % </label>
                                        <div class="col-sm-9">
                                    	<input type="number" name="sgst" id="sgst" class="form-control form-control-sm" placeholder="SGST" value="<?php echo (set_value('sgst')) ? set_value('sgst') : 0; ?>" />
                                        <?php echo form_error('sgst', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                        	</div>
                        </div>
						<div class="row">
                        	<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">IGST % </label>
                                        <div class="col-sm-9">
                                    	<input type="number" name="igst" id="igst" class="form-control form-control-sm" placeholder="IGST" value="<?php echo (set_value('igst')) ? set_value('igst') : 0; ?>" />
                                        <?php echo form_error('igst', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                        	</div>
							<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">UTGST % </label>
                                        <div class="col-sm-9">
                                    	<input type="number" name="utgst" id="utgst" class="form-control form-control-sm" placeholder="UTGST" value="<?php echo (set_value('utgst')) ? set_value('utgst') : 0; ?>" />
                                        <?php echo form_error('utgst', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                        	</div>
                        </div>
						<div class="row">
                        	<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Cess </label>
                                        <div class="col-sm-9">
											<input type="number" class="form-control form-control-sm" name="cess"  id="cess" placeholder="Cess" value="<?php echo (set_value('cess')) ? set_value('cess') : 0; ?>" />
											<?php echo form_error('cess', '<span class="help-inline">', '</span>'); ?>
										</div>
									</div> 
							</div> 
							<div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Additional Tax</label>
                                        <div class="col-sm-9">
                                    	<input type="text" name="ad_tax" id="ad_tax" class="form-control form-control-sm" placeholder="Additional Tax" value="<?php echo (set_value('ad_tax')) ? set_value('ad_tax') : 0; ?>" />
                                        <?php echo form_error('ad_tax', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                        	</div>							
                        </div>
						<div class="row">
                        	<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Client PAN<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
                                    	<input type="text" name="c_pan" maxlength="20" id="c_pan" class="form-control form-control-sm"  placeholder="Client PAN" value="<?php echo set_value('c_pan'); ?>"/>
                                        <?php echo form_error('c_pan', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                        	</div> 
							<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">RCM Applicable:<span class="span_star_clr"> *</span> </label>
                                        <div class="col-sm-9">
											<input type="radio" name="rcm" value="Y"<?php echo set_checkbox('rcm', 'Y'); ?>>
											<label for="y" class="">Y</label>
											<input type="radio" name="rcm" value="N"<?php echo set_checkbox('rcm', 'N'); ?>>
											<label for="r" class="">N</label>
                                        
										</div>
									</div>
							</div>								                               
                        </div>
						<div class="row">
                        	<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Place of Supply</label>
                                        <div class="col-sm-9">
                                    	<input type="text" name="p_supply" id="p_supply" maxlength="100" class="form-control form-control-sm"  placeholder="Place of Supply" value="<?php echo set_value('p_supply'); ?>"/>
                                        <?php echo form_error('p_supply', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                        	</div>
							<div class="col-md-6">
                                    <div class="form-group row">
                                         <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">GST Status</label>
                                        <div class="col-sm-9">
                                        <?php 
											$options = array('R' => 'Registered', 'U' => 'Unregistered', 'C' => 'Composit', 'CO' => 'Consumer');
											$attributes = array('class' => 'form-control form-control-sm', 'id' => 'gst_status');
											$selected = (set_value('gst_status')) ? set_value('gst_status') : '';
											echo form_dropdown('gst_status', $options, $selected, $attributes);
										?>
										<?php echo form_error('gst_status', '<span class="help-inline">', '</span>'); ?>
										</div>
                                </div>
                        	</div>
							
                        </div>
						<div class="row">
                        	
                        	
                        </div>
                        <!-- <hr> -->
                       
                                <div class="col-md-6">
									<div class="form-group row">
										<label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm">&nbsp;</label>
										<div class="col-sm-2">
											<div class="form-actions">
												<button type="submit" class="cr-a">Save</button>
											</div>
										</div>
									</div>
                                </div>
                            </form>
                        </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                      Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                    </div>
                    <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                      Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
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
                            <h1>Sales Billing Details List</h1>
                        </div>
                    </div>
                    <div class="wrapper-box">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Branch/State</th>
                                        <th>Address</th>
                                        <th>Contact Name</th>
                                        <th>Contact No</th>
                                        <th>Email</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php
									foreach($list as $list_row){								
								?>
                                    <tr class="gradeX">
                                        <td><?PHP echo $list_row->branch_state; ?></td> 
                                        <td><?PHP echo $list_row->address; ?></td>
                                        <td><?PHP echo $list_row->contact_name; ?></td>
                                        <td><?PHP echo $list_row->contact_number; ?></td>
                                        <td><?PHP echo $list_row->contact_email; ?></td>
										<td style="text-align: center;"><i class="icon-edit"></i><a href="<?php echo base_url('sales_billing/edit_sales_billing/'.$client->client_id.'/'.$list_row->sales_billing_id); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
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

<script>

$(document).ready(function(){
<?php if($mode == 'readonly'){ ?>
	applyReadOnlyMode('clientform');
<?php } ?>
});

$("#statename").change(() => {
		var statename = $("#statename").val();
		if(statename !='')
		{
			stateCode(statename);
		}
	})
	function stateCode(state_name)
	{
		
			$.ajax({
			type: 'POST',   
			url: '<?php echo base_url('sales_billing/state_code'); ?>',
			data: {state_name: state_name,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
			dataType: 'json',
			encode: true,
			})
			.done(function(data)
			{
				$("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
				$('#statecode').val(data.result);
			
			})
			.fail(function(data)
			{
				console.log(data);
			});
		

	}



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


$("#contractrewexp").blur(function () {
    var dateofcontract = document.getElementById("dateofcontract").value;
    var contractrewexp = document.getElementById("contractrewexp").value;
	//console.log('dateofcontract: ' + Date.parse(dateofcontract) + ' | contractrewexp: ' + Date.parse(contractrewexp));
    if (Date.parse(dateofcontract) >= Date.parse(contractrewexp)) {
        alert("Contract Renewal/Expiry date should be greater than Date Of Contract");
        document.getElementById("contractrewexp").value = "";
    }
});

</script>