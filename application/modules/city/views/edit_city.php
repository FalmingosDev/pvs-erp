<?PHP
//print_r($edit_city); exit;
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
                                        <h1 class="text-center">Edit City</h1>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('city'); ?>" class="cr-a">Back</a>  
                                        </div>
                                    </div>
                                </div>
                                <?php echo validation_errors(); ?>
							<?php foreach($edit_city as $city){ ?>
							<?php echo form_open( '', array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
								<input type="hidden" name="ct_id" value="<?php echo $city->city_id; ?>">
						<div class="wrapper-box">
                               <form>
								<div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Select State :</label>
                                                    <div class="col-sm-9">
                                        <select id="state_id" name="state_id" class="form-control form-control-sm">
										<?php                                       
											foreach($state as $state) {  
										?>
                                            <option <?PHP if($city->state_id==$state->state_id){echo "selected";} ?>
											value="<?PHP echo $state->state_id;?>" > <?PHP echo $state->state_name; ?></option>
                                         <?PHP
										}
											?>   
                                        </select>
													</div>
                                                </div>
                                            </div>
                                </div>
									
                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">City Name <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
                                        <input class="form-control form-control-sm" type="text" name="city_name" id="city_name" placeholder="City Name" value="<?php echo $city->city_name; ?>" >
										<?php echo form_error('city_name', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                                </div>
                                            </div>
                                </div>
                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">City short Name <span class="help-inline">*</span> : </label>
                                                    <div class="col-sm-9">
                                        <input class="form-control form-control-sm" type="text" name="city_st_name" id="city_st_name" placeholder="City Short Name " value="<?php echo $city->city_short_name; ?>">
										<?php echo form_error('city_st_name', '<span class="help-inline">', '</span>'); ?>

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