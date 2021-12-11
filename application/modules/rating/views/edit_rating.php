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
                                        <h1>Edit Rating</h1>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('rating'); ?>" class="ad-btn-a-tag">Rating List</a>  
                                        </div>
                                    </div>
                                </div>
                                <?php //echo validation_errors(); ?>
                                <?php foreach($rating as $ed_rating){ ?>
                                <!-- <h1>Client Master</h1> -->
                                <?php echo form_open( base_url( 'rating/UpdateRating' ), array( 'id' => 'ratingform', 'class' => 'form-horizontal' ) ); ?>
                                <input type="hidden" name="rating_id" value="<?php echo $ed_rating['rating_id']; ?>">
                                <div class="wrapper-box">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Rating Short name :</label>
                                                    <div class="col-sm-9">
                                                       <input type="text" class="form-control form-control-sm" name="rating_shrt_name" placeholder="Rating Short name" value="<?php echo $ed_rating['rating_short_name']; ?>" />
                                                        <?php echo form_error('rating_shrt_name', '<span class="help-inline">', '</span>'); ?>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Description :</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control form-control-sm" name="desc" placeholder="Rating Description" value="<?php echo $ed_rating['rating_desc']; ?>" />
                                                      <?php echo form_error('desc', '<span class="help-inline">', '</span>'); ?>
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