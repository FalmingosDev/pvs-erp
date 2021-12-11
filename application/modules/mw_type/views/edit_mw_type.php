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
                                        <h1>Edit Mw Type</h1>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="add-btn-div">
                                            <a href="<?php echo base_url('mw_type'); ?>" class="ad-btn-a-tag">MW Type List</a>  
                                        </div>
                                    </div>
                                </div>
                                <?php echo validation_errors(); ?>
                                <?php foreach($mwType as $ed_mw){ ?>
                                <!-- <h1>Client Master</h1> -->
                                <?php echo form_open( base_url( 'mw_type/UpdateMwType' ), array( 'id' => 'mwTypeform', 'class' => 'form-horizontal' ) ); ?>
                                <input type="hidden" name="mw_id" value="<?php echo $ed_mw['mw_type_id']; ?>">
                                <div class="wrapper-box">
                                    <form>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Mw Type Name :</label>
                                                    <div class="col-sm-9">
                                                       <input type="text" class="form-control form-control-sm" name="mw_type_name" placeholder="Mw Type name" value="<?php echo $ed_mw['mw_type_name']; ?>" />
                                                        <?php echo form_error('mw_type_name', '<span class="help-inline">', '</span>'); ?>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Mw Type Short Name :</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control form-control-sm" name="mwtype_short_name" placeholder="Mw Type Short name" value="<?php echo $ed_mw['mw_type_short_name']; ?>" />
                                                      <?php echo form_error('mwtype_short_name', '<span class="help-inline">', '</span>'); ?>
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