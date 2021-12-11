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
                                        <h1>Edit State</h1>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('state'); ?>" class="cr-a">Back</a>  
                                        </div>
                                    </div>
                                </div>
                                <?php echo validation_errors(); ?>
						<?php foreach($edit_state as $ed_state){ ?>
							<?php echo form_open( base_url( 'state/edit_state' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
							<input type="hidden" name="st_id" value="<?php echo $ed_state->state_id; ?>">
							<div class="wrapper-box">
                                    <form>							
                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">State Name <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
                                        <input type="text" name="state_name" class="form-control form-control-sm" id="state_name" placeholder="State Name" value="<?php echo $ed_state->state_name; ?>">
										<?php echo form_error('state_name', '<span class="help-inline">', '</span>'); ?>
													</div>
                                                </div>
                                            </div>
                                </div>
                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">State Short Name <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
                                        <input type="text" name="state_st_name" class="form-control form-control-sm" id="state_st_name" placeholder="State Short Name " value="<?php echo $ed_state->state_short_name; ?>">
										<?php echo form_error('state_st_name', '<span class="help-inline">', '</span>'); ?>
													</div>
                                                </div>
                                            </div>
                                </div>
                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">State Code <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
                                        <input type="text" name="state_code" class="form-control form-control-sm" id="state_code" placeholder="State Code" value="<?php echo $ed_state->state_code; ?>">
										<?php echo form_error('state_code', '<span class="help-inline">', '</span>'); ?>
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