<?PHP

?>
<style type="text/css">
    
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
                                        <div class="col-md-10">
                                            <h1 class="text-center">Edit Pf </h1> 
                                        </div>
                                        <div class="col-md-2">
                                            <div class="add-btn-div">
                                                <a href="<?php echo base_url('pf_rate'); ?>" class="cr-a">Back </a>  
                                            </div>
                                            <?php if($this->session->flashdata('msg')): ?>
                                            <div class="alert btn-danger alert-dismissible fade show" role="alert" id="show_msg" align= "left";>
                                                <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php echo form_open('', array( 'id' => 'loginform', 'class' => 'form-horizontal' ) ); ?>
                                            <div class="wrapper-box">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm ">Effective Date <span class="help-inline">*</span> : </label>
                                                            <div class="col-sm-8">
                                                                <input type="date" name="effective_date" id="effective_date" class="form-control form-control-sm" value="<?php echo $edit_pf->effective_date; ?>" >
                                                                <?php echo form_error('effective_date', '<span class="help-inline">', '</span>'); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Employee Contribution <span class="help-inline">*</span> : </label>
                                                            <div class="col-sm-8">
                                                            <input type="text" class="form-control form-control-sm" name="percentage" id="percentage" placeholder="Employee Contribution" value="<?php echo $edit_pf->percentage; ?>" />
                                                            </div>
                                                            <?php echo form_error('percentage', '<span class="help-inline">', '</span>'); ?>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="col-md-6">
                                                        <div class="form-group row">
                                                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Employer Contribution <span class="help-inline">*</span> : </label>
                                                            <div class="col-sm-8">
                                                            <input type="text" class="form-control form-control-sm" name="comp_percentage" id="comp_percentage" placeholder="Employer Contribution" value="<?php echo $edit_pf->comp_percentage; ?>" />
                                                            </div>
                                                            <?php echo form_error('comp_percentage', '<span class="help-inline">', '</span>'); ?>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="row">
                                                    <div class="col-md-5">
                                                    </div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-2">                                             
                                                        <button type="submit" class="cr-a">Save</button>
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
        
</section>
	  


