<?PHP

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
                                    <div class="col-md-7">
                                        <h1>Add Income Tax</h1>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('income_tax'); ?>" class="ad-btn-a-tag">Back</a>  
                                        </div>
                                    </div>
                                </div>
                                <?php //echo validation_errors(); ?>
							<?php echo form_open( base_url( 'income_tax/add' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
								<div class="wrapper-box">
                                <form>									
								<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Financial Year :</label>
                                                    <div class="col-sm-9">
														<?php 
															$attributes = array('class' => 'form-control form-control-sm', 'id' => 'financial_year_id');
															$selected = (set_value('financial_year_id')) ? set_value('financial_year_id') : '';
															echo form_dropdown('financial_year_id', $financial_year, $selected, $attributes);
														?>
													</div>
													<?php echo form_error('financial_year_id', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                </div>
                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <div class="col-sm-9">
                                                      <!-- <label class="cont-radio-location"><input type="radio" name="citizen_type" value=""<?php if($financial_year->citizen_type) echo "checked='checked'"; ?> <?php echo set_checkbox('citizen_type'); ?>>Individual</label> -->
                                                        <!-- <label class="cont-radio-location"><input type="radio" name="citizen_type" value=""<?php if($financial_year->citizen_type) echo "checked='checked'"; ?><?php echo set_checkbox('citizen_type'); ?>>Senior Citizen</label> -->
                                                        <label class="cont-radio-location"><input type="radio" name="citizen_type" value="I" <?php echo set_checkbox('citizen_type', 'I'); ?>>Individual</label>
                                                        <label class="cont-radio-location"><input type="radio" name="citizen_type" value="S" <?php echo set_checkbox('citizen_type', 'S'); ?>>Senior Citizen</label>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
									
                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Salary From :</label>
                                                    <div class="col-sm-9">
														<input class="form-control form-control-sm" type="text" name="salary_from" id="salary_from" placeholder="Salary From" value="<?php echo set_value('salary_from'); ?>">
														<?php echo form_error('salary_from', '<span class="help-inline">', '</span>'); ?>
													</div>
                                                </div>
                                            </div>
                                </div>
                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Salary To :</label>
                                                    <div class="col-sm-9">
														<input class="form-control form-control-sm" type="text" name="salary_to" id="salary_to" placeholder="Salary To" value="<?php echo set_value('salary_to'); ?>">
														<?php echo form_error('salary_to', '<span class="help-inline">', '</span>'); ?>

													</div>
                                                </div>
                                            </div>
                                </div> 
								<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Tax percentage :</label>
                                                    <div class="col-sm-9">
														<input class="form-control form-control-sm" type="text" name="tax_percentage" id="tax_percentage" placeholder="Tax Percentage" value="<?php echo set_value('tax_percentage'); ?>">
														<?php echo form_error('tax_percentage', '<span class="help-inline">', '</span>'); ?>

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
		function check_value()
		{
			alert('sss'); 
		}
</script>