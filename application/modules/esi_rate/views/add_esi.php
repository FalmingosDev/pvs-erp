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
                                            <h1>Add New Esi Definition</h1>
                                        </div>
                                        <div class="col-md-1">
                                            <div class="add-btn-div">
                                                <a href="<?php echo base_url('esi_rate'); ?>" class="cr-a">Back</a>  
                                            </div>
                                        </div>
                                    </div>
                                    <?php echo form_open( base_url( 'esi_rate/add_esi' ), array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
                                    <div class="wrapper-box">
                                        <form>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm ">Effective Date <span class="help-inline">*</span>: </label>
                                                        <div class="col-sm-8">
                                                            <input type="date" name="effective_date" id="effective_date" class="form-control form-control-sm" required="required">
                                                            <?php echo form_error('effective_date', '<span class="help-inline">', '</span>'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Employee Contribution<span class="help-inline">*</span>: </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control form-control-sm" name="percentage" id="percentage" placeholder="Employee Contribution" value="<?php echo set_value('percentage'); ?>" required="required"/>
                                                        </div>
                                                        <?php echo form_error('percentage', '<span class="help-inline">', '</span>'); ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Employer Contribution<span class="help-inline">*</span>: </label>
                                                        <div class="col-sm-8">
                                                            <input type="text" class="form-control form-control-sm" name="comp_percentage" id="comp_percentage" placeholder="Employer Contribution" value="<?php echo set_value('comp_percentage'); ?>" required="required"/>
                                                        </div>
                                                        <?php echo form_error('comp_percentage', '<span class="help-inline">', '</span>'); ?>
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