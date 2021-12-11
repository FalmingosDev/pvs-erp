<?PHP
//print_r($state); exit;
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
                                        <h1>Add GST Category</h1>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('gstcategory'); ?>" class="ad-btn-a-tag">Back</a>  
                                        </div>
                                    </div>
                                </div>
                                <?php echo validation_errors(); ?>
							<?php echo form_open( base_url( 'gstcategory/add_gstcat' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
							<div class="wrapper-box">
                              <form>
                                <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">GST Category Name :</label>
                                                    <div class="col-sm-9">
                                        <input class="form-control form-control-sm" type="text" name="gstcat_name" id="gstcat_name" placeholder="GST Category Name" >
										<?php echo form_error('gstcat_name', '<span class="help-inline">', '</span>'); ?>
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