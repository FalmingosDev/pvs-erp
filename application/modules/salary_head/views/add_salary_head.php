<?PHP
//print_r($state); exit;
//print_r('ssss'); exit;
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
                                        <h1 class="text-center">Add Salary Head</h1>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('salary_head'); ?>" class="cr-a">Back</a>  
                                        </div>
                                    </div>
                                </div>
                            
							<?php //echo validation_errors(); ?>
							<?php echo form_open( base_url( 'salary_head/add_salary_head' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
							<div class="wrapper-box">
                              <form>									
								<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Head Type:</label>
                                                    <div class="col-sm-9">
													<?php 
														$options = array('E' => 'Earnings', 'D' => 'Deductions');
														$attributes = array('class' => 'form-control form-control-sm', 'id' => 'head_id');
														$selected = (set_value('head_id')) ? set_value('head_id') : '';
														echo form_dropdown('head_id', $options, $selected, $attributes);
													?>
                                        <?php /*?><select class="form-control form-control-sm" id="type_id" name="type_id">
                                            <option value="E">Earnings</option>
                                            <option value="D">Deductions</option>
                                        </select><?php */?>
													</div>
                                                  </div>
                                            </div>
                                </div>
									
                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Salary Head Name <span class="help-inline">*</span> :</label>
                                                    <div class="col-sm-9">
                                        <input class="form-control form-control-sm" type="text" name="head_name" id="head_name" placeholder="Salary Head Name" value="<?php echo set_value('head_name'); ?>">
										<?php echo form_error('head_name', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                                  </div>
                                            </div>
                                </div>
                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Short Name <span class="help-inline">*</span> :</label>
                                                    <div class="col-sm-9">
                                        <input class="form-control form-control-sm" type="text" name="head_st_name" id="head_st_name" placeholder="Short Name" value="<?php echo set_value('head_st_name'); ?>">
										<?php echo form_error('head_st_name', '<span class="help-inline">', '</span>'); ?>

                                    </div>
                                                  </div>
                                            </div>
                                </div>


                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Tally Head Name <span class="help-inline">*</span> :</label>
                                                    <div class="col-sm-9">
                                        <input class="form-control form-control-sm" type="text" name="tally_head_name" id="tally_head_name" placeholder="Tally Head Name" value="">
										<?php echo form_error('tally_head_name', '<span class="help-inline">', '</span>'); ?>

                                     </div>
                                   </div>
                                 </div>
                                </div>


								
								<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Min Percentage  :</label>
                                                    <div class="col-sm-9">
                                        <input onchange = "max_val()" class="form-control form-control-sm" type="number" name="min_prcntg" id="min_prcntg" placeholder="Min Percentage" value="<?php echo set_value('min_prcntg'); ?>">
										<?php echo form_error('min_prcntg', '<span class="help-inline">', '</span>'); ?>

                                    </div>
                                                  </div>
                                            </div>
                                </div>
								<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Max Percentage  :</label>  
                                                    <div class="col-sm-9">
                                        <input onchange = "min_val()" class="form-control form-control-sm" type="number" name="max_prcntg" id="max_prcntg" placeholder="Max Percentage" value="<?php echo set_value('max_prcntg'); ?>">
										<?php echo form_error('max_prcntg', '<span class="help-inline">', '</span>'); ?>

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
function min_val(){
	$("#min_prcntg").prop("required","true");
	$("#max_prcntg").prop("required","true");
}

function max_val(){
	$("#min_prcntg").prop("required","true");
	$("#max_prcntg").prop("required","true");
}
</script>