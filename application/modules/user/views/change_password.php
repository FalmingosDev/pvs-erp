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
                                        <h1>Change Password</h1>
                                    </div>
                                    <?php if($this->session->flashdata('error_msg')){?>
                                    <div class="widget-box">
                                        <div class="alert alert-error alert-block">
                                            <a class="close" data-dismiss="alert" href="#">×</a>
                                            <?php echo $this->session->flashdata('error_msg'); ?>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <?php if($this->session->flashdata('success_msg')){?>
                                    <div class="widget-box">
                                        <div class="alert alert-success alert-block">
                                            <a class="close" data-dismiss="alert" href="#">×</a>
                                            <?php echo $this->session->flashdata('success_msg'); ?>
                                        </div>
                                    </div>
                                    <?php } ?>
                                </div>
                                <?php //echo validation_errors(); ?>
                                <!-- <h1>Client Master</h1> -->
                                <?php echo form_open( base_url( 'user/change_password' ), array( 'id' => 'password', 'class' => 'form-horizontal' ) ); ?>
                                <div class="wrapper-box">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Current Password :</label>
                                                    <div class="col-sm-9">
                                                       <input type="password" class="form-control form-control-sm" name="current_password" placeholder="Current Password" value="<?php echo set_value('current_password'); ?>"/>
                                                    </div>
													<?php echo form_error('current_password', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">New Password :</label>
                                                    <div class="col-sm-9">
                                                      <input type="password" class="form-control form-control-sm" name="new_password" placeholder="New Password" value="<?php echo set_value('new_password'); ?>" />
                                                    </div>
													<?php echo form_error('new_password', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Confirm Password :</label>
                                                    <div class="col-sm-9">
                                                        <input type="password" class="form-control form-control-sm" name="confirm_password" placeholder="Confirm Password" value="<?php echo set_value('confirm_password'); ?>"/>
                                                    </div>
													<?php echo form_error('confirm_password', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                        <div class="form-actions btn-forn-action">
                                                            <button type="submit" class="btn btn-success btn-save">Save</button>
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
                   
                  </div>
                
                </div>  
            </div>
          </div>
        
      </section>