

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
                                        <h1>Apply for leave</h1>
                                    </div>
                                </div>
                                <?php //echo validation_errors(); ?>
                                <!-- <h1>Client Master</h1> -->
                                <?php echo form_open( base_url('leave/apply/'.$employee->employee_id ), array( 'id' => 'apply-form', 'class' => 'form-horizontal' ) ); ?>
                                 
                                 <input type="hidden" name="employee_id" value="<?php echo $employee->employee_id; ?>">
                                 <input type="hidden" name="l_address" id="l_address" value="<?php echo $employee->p_address_1 .','. $employee->p_address_2 .','. $employee->p_address_3; ?>">

                                <div class="wrapper-box">
                                   <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Employee Code : </label>
                                                    <div class="col-sm-9">
                                                      <p><?php echo $employee->employee_code; ?></p>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Employee Name : </label>
                                                    <div class="col-sm-8">
                                                      <p><?php echo $employee->first_name . ' ' . $employee->last_name; ?></p>  
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">  
                                            <div class="col-md-8">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Leave Type : </label>
                                                    <div class="col-sm-9">
                                                        <?php 
                                                            $options = array('' => 'Select Leave Type', 'EL' => 'EL', 'CL' => 'CL', 'SL' => 'SL');
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'leave_type');
                                                            $selected = (set_value('leave_type')) ? set_value('leave_type') : '';
                                                            echo form_dropdown('leave_type', $options, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                  </div>
                                                <div class="form-group row">
                                                  <!-- <div class="col-lg-2">
                                                    <div class="d-inline-flex justify-content-between">
                                                      <label class="pr-2 col-form-label col-form-label-sm">Half Day:</label>
                                                      <span><input type="checkbox" name="half_day" class="form-control form-control-sm" id="half_day" value="1" style="width: 70%;" /> </span>
                                                    </div>
                                                  </div> -->
                                                  <!-- <div class="col-lg-5 pr-0">
                                                    <div class="leave_on">
                                                      <span class="pr-3">Leave On</span>
                                                      <span>
                                                        <input type="date" name="leave_on" id="leave_on" value="<?php //echo set_value('leave_on'); ?>" class="form-control"> 
                                                      </span>
                                                    </div>
                                                    <div class="d-flex leave_from">
                                                      <span class="pr-3">Leave From</span>
                                                      <span>
                                                        <input type="date" name="leave_from" id="leave_from" class="form-control" value="<?php //echo set_value('leave_from'); ?>"> 
                                                      </span>
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-5 pr-0 leave_to">
                                                    <div class="d-flex">
                                                      <span class="pr-3">Leave To</span>
                                                      <span>
                                                        <input type="date" name="leave_to" id="leave_to" class="form-control" value="<?php //echo set_value('leave_to'); ?>"> 
                                                      </span>
                                                    </div>
                                                  </div> -->

                                                    <label for="colFormLabelSm" class="col-sm-1 p-0 col-form-label col-form-label-sm text-center">Half Day : </label>
                                                    <div class="col-sm-1">
                                                        <input type="checkbox" name="half_day" class="form-control form-control-sm" id="half_day" value="1" style="width: 70%;">  
                                                    </div>
                                                     <!-- <div id="leave_from_div"> --> 
                                                      <label for="colFormLabelSm" class="col-sm-2 pr-0 col-form-label col-form-label-sm" >Leave From : </label>
                                                      <div class="col-sm-3">
                                                          <input type="date" name="leave_from" id="leave_from" class="form-control form-control-sm">  
                                                      </div>
                                                    <!-- </div> -->

                                                    <!-- <div id="leave_to_div" style="display: none;"> -->
                                                      <label for="colFormLabelSm" class="col-sm-2 pr-0 col-form-label col-form-label-sm" id="leave_from_div">Leave To : </label>
                                                      <div class="col-sm-3">
                                                          <input type="date" name="leave_to" id="leave_to" class="form-control form-control-sm">  
                                                      </div>
                                                    <!-- </div> -->
                                                    
                                                   <!--  <label for="colFormLabelSm" class="col-sm-2 p-0 col-form-label col-form-label-sm text-center">Leave On : </label>
                                                    <div class="col-sm-3">
                                                        <input type="date" name="leave_on" id="leave_on" class="form-control form-control-sm">  
                                                    </div> -->
                                                    
                                                  </div> 
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">No Of Leave  Days :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="no_leave" name="no_leave" value="<?php echo set_value('no_leave'); ?>">
                                                    </div>
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Address During Leave :</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="leave_address" id="leave_address" class="form-control form-control-sm"><?php echo set_value('leave_address'); ?></textarea>
                                                    </div>
                                                  </div>
                                                  <div class="form-group row" style="margin-top: -42px;">
                                                    <label for="colFormLabelSm" class="col-sm-2 pr-0 col-form-label col-form-label-sm">Home Address :</label>
                                                    <div class="col-sm-1">
                                                        <input type="checkbox" name="home_address" id="home_address" class="form-control form-control-sm" style="width: 70%;" value="1">
                                                    </div>
                                                  </div>
                                            </div>  
                                            <div class="col-md-3" style="border: 1px solid #000;padding: 10px 10px;"> 
                                                <p><b>Leave Balance</b></p>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">EL :</label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control form-control-sm" id="" name="el" readonly="" value="<?php //echo $employee->el; ?>">
                                                    </div>
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">CL :</label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control form-control-sm" id="cl" name="cl" readonly="" value="<?php //echo $employee->cl; ?>">
                                                    </div>
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">SL :</label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control form-control-sm" id="sl" name="sl" readonly="" value="<?php //echo $employee->sl; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Reason For Leave : </label>
                                                        <div class="col-sm-10"> 
                                                          <textarea class="form-control form-control-sm" name="leave_reason"><?php echo set_value('leave_reason'); ?></textarea>
                                                        </div>
                                                      </div>
                                                </div>
                                            </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">Approver Name : </label>
                                                    <div class="col-sm-9">
                                                      <?php 
                                                            //$attributes = array('class' => 'form-control form-control-sm', 'id' => 'approver_id');
                                                            //$selected = (set_value('approver_id')) ? set_value('approver_id') : '';
                                                            //echo form_dropdown('approver_id', $approver, $selected, $attributes);
                                                        ?>

                                                         <select type="text" class="form-control form-control-sm" id="" name="">
                                                        <option>Name 1</option>
                                                        <option>Name 2</option>
                                                        </select>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                &nbsp;
                                            </div>
                                        </div>
                                        <div class="row mt-top mb-3">  
                                            <div class="col-md-4">&nbsp;</div>
                                              <div class="col-md-4">
                                                <button type="submit" class="cr-a ref-btn">Submit</button>
                                              </div>
                                              <div class="col-md-4">&nbsp;</div>
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
        
      </section>

      <script type="text/javascript">

      	$(document).ready(function(){

      		$(".leave_on").hide();
      		
      		

      	});

      	var leave_address = $("#l_address").val();
      	//alert(leave_address);
        $("#half_day").click(function(event)
        { 
          if($('input:checkbox[name=half_day]').is(':checked'))
          {
            alert('checked');
          }
          else
          {
            alert('unchecked');
          }
        });

        $("#home_address").click(function(event)
        { 
          if($('input:checkbox[name=home_address]').is(':checked'))
          {
          	//alert(leave_address);
            $("#leave_address").val(leave_address);
          }
          else
          {
            $("#leave_address").val('');
          }
        });
      </script>