<?PHP
//print_r($edit_gstcat); exit;
//print_r('LLLLLLLLLL'); exit;
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
                                        <h1>Edit GST Service</h1>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('gstservice'); ?>" class="ad-btn-a-tag">Back</a>  
                                        </div>
                                    </div>
                                </div>
                                <?php echo validation_errors(); ?>
							<?php foreach($edit_gstser as $gstser){ ?>
							<?php echo form_open( '', array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
								<input type="hidden" name="gst_ser_id" value="<?php echo $gstser->gst_service_category_id; ?>">
							<div class="wrapper-box">
                              <form>		
                                <div class="row">
								<div class="col-md-12">
									<div class="form-group row">
										<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">GST Service Name :</label>
										<div class="col-sm-9">
                                        <input class="form-control form-control-sm" type="text" name="gst_ser_name" id="gst_ser_name" placeholder="GST Service Name" value="<?php echo $gstser->gst_service_category_name; ?>" >
										<?php echo form_error('gst_ser_name', '<span class="help-inline">', '</span>'); ?>
                                        </div>
                                    </div>
                                </div>
                                 </div>
                                     
								
                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp;</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-actions btn-forn-action">
                                                            <button type="submit" class="btn btn-success btn-save">Save</button>
                                                        </div>
                                                    </div>
                                                  </div>
                                            </div>
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