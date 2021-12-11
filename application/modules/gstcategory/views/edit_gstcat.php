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
                                        <h1>Edit GST Category</h1>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('gstcategory'); ?>" class="ad-btn-a-tag">Back</a>  
                                        </div>
                                    </div>
                                </div>
                                <?php echo validation_errors(); ?>
							<?php foreach($edit_gstcat as $gstcat){ ?>
							<?php echo form_open( '', array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
								<input type="hidden" name="gst_cat_id" value="<?php echo $gstcat->gst_category_id; ?>">
						<div class="wrapper-box">
                               <form>	
                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">GST Category Name :</label>
                                                    <div class="col-sm-9">
                                        <input type="text" class="form-control form-control-sm" name="gst_cat_name" id="gst_cat_name" placeholder="GST Category Name" value="<?php echo $gstcat->gst_category_name; ?>" >
										<?php echo form_error('gst_cat_name', '<span class="help-inline">', '</span>'); ?>
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