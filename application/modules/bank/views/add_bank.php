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
                                        <h1 class="text-center">Add Bank</h1>  
                                    </div>
                                    <div class="col-md-1">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('bank'); ?>" class="cr-a">Back</a>  
                                        </div>
                                    </div>
                                </div>
                                <?php //echo validation_errors(); ?>
                                <!-- <h1>Client Master</h1> -->
                                <?php echo form_open( base_url( 'bank/insertBank' ), array( 'id' => 'bankform', 'class' => 'form-horizontal' ) ); ?>
                                <div class="wrapper-box">
                                    <form>
                                        <div class="row">
                                          <div class="col-md-12">
                                            <div class="form-group row">
                                              <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Bank Short Name <span class="help-inline">*</span> :</label>
                                              <div class="col-sm-9">
                                                  <input type="text" class="form-control form-control-sm" name="bank_name" placeholder="Bank Short name" value="<?php echo set_value('bank_name'); ?>"/>
                                              </div>
                                            <?php echo form_error('bank_name', '<span class="help-inline">', '</span>'); ?>
                                          </div>
                                        </div>
                                  </div>
                                        <!-- <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">Branch Name <span class="help-inline">*</span> :</label>
                                                    <div class="col-sm-9">
                                                      <input type="hidden" class="form-control form-control-sm" name="branch_name" placeholder="Branch name" value="<?php echo set_value('branch_name'); ?>"/>
                                                      <?php echo form_error('branch_name', '<span class="help-inline">', '</span>'); ?>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div> -->
                                        <div class="row">
                                          <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">Bank Name <span class="help-inline">*</span> :</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control form-control-sm" name="address" placeholder="Bank Name" value="<?php echo set_value('address'); ?>"/>
                                                      <?php echo form_error('address', '<span class="help-inline">', '</span>'); ?>
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