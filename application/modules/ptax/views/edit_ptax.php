<?PHP
//print_r($ptaxview); exit;
?>
<style type="text/css">
    .wrapper-box {
    padding: 10px 15px;
    border: 1px solid #c0c0c0;
    width: 72%;
    display: block;
    margin: 0 auto;
}
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
                                    <div class="col-md-11">
                                        <h1 class="text-center">Edit Professional Tax</h1>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('ptax'); ?>" class="cr-a">Back</a>  
                                        </div>
                                    </div>
                                </div>
                                <?php //echo validation_errors(); ?>
							<?php foreach($ptaxview as $ptax){ ?>
							<?php echo form_open( '', array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
								<div class="wrapper-box">
                                <form>
								<input type="hidden" name="ptax_id" value="<?php echo $ptax->ptax_id; ?>">								
								 <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Slect State <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
														<?php 
															 $attributes = array('class' => 'form-control form-control-sm', 'id' => 'state_id');
                                                            $selected = (set_value('state_id')) ? set_value('state_id') : $ptax->state_id;
															echo form_dropdown('state_id', $state, $selected, $attributes);
														?>
													</div>
													<?php echo form_error('state_id', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                </div>
								
								<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Effective Start Date <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
                                                          <input type="date" data-date-format="dd-mm-yyyy" class="form-control form-control-sm" id="" name="eff_start_date" value="<?php echo $ptax->eff_start_date; ?>">
                                                    </div>
													
                                                </div>
												<?php echo form_error('eff_start_date', '<span class="help-inline">', '</span>'); ?>
                                            </div>
                                </div>
									
                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Salary From <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
														<input class="form-control form-control-sm" type="text" name="salary_from" id="salary_from" placeholder="Salary From" value="<?php echo $ptax->salary_from; ?>">
														<?php echo form_error('salary_from', '<span class="help-inline">', '</span>'); ?>
													</div>
                                                </div>
                                            </div>
                                </div>
                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Salary To <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
														<input class="form-control form-control-sm" type="text" name="salary_to" id="salary_to" placeholder="Salary To" value="<?php echo $ptax->salary_to; ?>">
														<?php echo form_error('salary_to', '<span class="help-inline">', '</span>'); ?>

													</div>
                                                </div>
                                            </div>
                                </div> 
								<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Tax Amount <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
														<input class="form-control form-control-sm" type="text" name="tax_amount" id="tax_amount" placeholder="Tax Amount" value="<?php echo $ptax->tax_amount; ?>">
														<?php echo form_error('tax_amount', '<span class="help-inline">', '</span>'); ?>

													</div>
                                                </div>
                                            </div>
                                </div> 								
                                <div class="row">
                                    <div class="col-md-5"></div>
                                        <div class="col-md-2">                                             
                                          <button type="submit" class="cr-a">Save</button>
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
	  
