
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<style>
	.table-condensed{
		width: 185px !important;
	}
    .pencil-font{
        padding: 10px;
        background: #1dd046;
        color: #000;
        border-radius: 5px;
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
                            <div class="col-md-11">
                            <h1 class="employee-box">Edit Leave Balance</h1>
                            </div>
                            <div class="col-md-1">
                                <div class="add-btn-div">
                                    <a href="<?php echo base_url('leave_bal_update'); ?>" class="cr-a">Back</a>  
                                </div>
                            </div>
                        </div>
                        <div class="row">


                        <div class="col-md-12">
                            <?php if($this->session->flashdata('msg')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert" id="show_msg">
                                <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                            </div>
                            <?php endif; ?>   
                                

                                <?php echo validation_errors(); ?> 
                                    <div class="wrapper-box">
                                        <?php echo form_open( base_url( 'leave_bal_update/edit/'. $edit_leave->employee_id ), array( 'id' => 'salarystructureform', 'class' => 'form-horizontal form-hori-border','onSubmit' => 'return validDetail()' ) ); ?>
                                        <input type="hidden" name="employee_id" value="<?php echo $edit_leave->employee_id; ?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Employee Code : </label>
                                                    <div class="col-sm-9">
                                                      <p><?php echo $edit_leave->employee_code; ?></p>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Employee Name : </label>
                                                    <div class="col-sm-8">
                                                      <p><?php echo $edit_leave->employee_name; ?></p>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">  
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Designation : </label>
                                                    <div class="col-sm-9">
                                                        <p><?php echo $edit_leave->desig_name; ?></p>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">&nbsp;</div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-6" style="border: 1px solid #c3baba;margin: 18px 0px;">  
                                                    <div class="border-cl">
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <p><b>Opening Balance</b></p>
                                                        </div>

                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">EL :</label>
                                                        <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id=""  name="opening_el" value="<?php echo (set_value('opening_el')) ? set_value('opening_el') : $edit_leave->opening_el; ?>">
                                                    </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">SL :</label>
                                                        <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="opening_sl" value="<?php echo (set_value('opening_sl')) ? set_value('opening_sl') : $edit_leave->opening_sl; ?>">
                                                    </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">CL :</label>
                                                        <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="opening_cl"  value="<?php echo (set_value('opening_cl')) ? set_value('opening_cl') : $edit_leave->opening_cl; ?>">
                                                    </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="col-md-6" style="border: 1px solid #c3baba;margin: 18px 0px;">  
                                                    <div class="border-cl">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <p><b>Leave Taken As of today :</b></p>  
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">EL :</label>
                                                        <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="el"  value="<?php echo (set_value('el')) ? set_value('el') : $edit_leave->el; ?>">
                                                    </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">SL :</label>
                                                        <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="sl" value="<?php echo (set_value('sl')) ? set_value('sl') : $edit_leave->sl; ?>">
                                                    </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">CL :</label>
                                                        <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="cl" value="<?php echo (set_value('cl')) ? set_value('cl') : $edit_leave->cl; ?>">
                                                    </div>
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
        