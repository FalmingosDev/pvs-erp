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
                                        <h1 class="text-center">Edit Contract Status</h1>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('contract_status'); ?>" class="cr-a">Back</a>  
                                        </div>
                                    </div>
                                </div>
                                <?php //echo validation_errors(); ?>
                                 <?php foreach($contract_status as $ed_con){ ?>
                                <!-- <h1>Client Master</h1> -->
                                <?php echo form_open( base_url( 'contract_status/UpdateContract' ), array( 'id' => 'contractform', 'class' => 'form-horizontal' ) ); ?>
                                <input type="hidden" name="contract_id" value="<?php echo $ed_con['contract_status_id']; ?>">
                                <div class="wrapper-box">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Contract Status Name <span class="help-inline">*</span> :</label>
                                                    <div class="col-sm-9">
                                                       <input type="text" class="form-control form-control-sm" name="contract_name" placeholder="Contract Status Name" value="<?php echo $ed_con['contract_status_name']; ?>" />
                                                        <?php echo form_error('contract_name', '<span class="help-inline">', '</span>'); ?>
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