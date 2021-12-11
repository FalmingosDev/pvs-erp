

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
                                    <div class="col-md-3"></div>
                                    <div class="col-md-2">
                                        <a href="<?php echo base_url('leave');  ?>" class="cr-a">Back</a>
                                    </div>
                                </div>
                                <?php //echo validation_errors(); ?>
                                <!-- <h1>Client Master</h1> -->
                                <?php if($this->session->flashdata('msg')): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="show_msg">
                                            <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                <?php endif; ?>
                                <?php echo form_open( base_url('leave/apply/'.$employee->employee_id ), array( 'id' => 'apply-form', 'class' => 'form-horizontal','onSubmit' => 'return validDetail()' ) ); ?>
                                 
                                 <input type="hidden" name="employee_id" value="<?php echo $employee->employee_id; ?>">
                                 <input type="hidden" name="l_address" id="l_address" value="<?php echo $employee->p_address_1 .','. $employee->p_address_2 .','. $employee->p_address_3; ?>">
                                 <input type="hidden" name="department_id" value="<?php echo $dept->department_id; ?>">

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
                                            <div class="col-md-9">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Leave Type : <span class="span_star_clr"> *</span></label>
                                                    <div class="col-sm-9">
                                                        <?php 
                                                            $options = array('' => 'Select Leave Type', 'EL' => 'EL', 'CL' => 'CL', 'SL' => 'SL');
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'leave_type');
                                                            $selected = (set_value('leave_type')) ? set_value('leave_type') : '';
                                                            echo form_dropdown('leave_type', $options, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                     <?php echo form_error('leave_type', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                                <div class="form-group row">
                                                 
                                                   <div class="col-md-2">
                                                        <div class="row">
                                                            <label for="colFormLabelSm" class="col-sm-7 p-0 col-form-label col-form-label-sm text-center">Half Day : </label>
                                                            <div class="col-sm-5">
                                                                <input type="checkbox" name="half_day" class="form-control form-control-sm" id="half_day" value="1" <?php echo set_checkbox('half_day', '1'); ?> style="width: 70%;">  
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5" id="leave_from_div">
                                                        <div class="row">
                                                            <label for="colFormLabelSm" class="col-md-3 p-0 col-form-label col-form-label-sm" id="lebel_from" >Leave From  : </label>
                                                            <div class="col-md-1 span_star_clr"> *</div>
                                                      <div class="col-md-7 p-0">
                                                          <input type="date" name="leave_from" id="leave_from" class="form-control form-control-sm" value="<?php echo set_value('leave_from'); ?>">  
                                                      </div>
                                                       <?php echo form_error('employee_id', '<span class="help-inline">', '</span>'); ?>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-5" id="leave_to_div">
                                                        <div class="row">
                                                            <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm" id="leave_from_div">Leave To : </label>
                                                            <div class="col-sm-1 span_star_clr"> *</div>
                                                      <div class="col-sm-7">
                                                          <input type="date" name="leave_to" id="leave_to" class="form-control form-control-sm" value="<?php echo set_value('leave_to'); ?>">  
                                                      </div>
                                                        </div>
                                                    </div>
                                                    
                                                  </div> 
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">No Of Leave  Days :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="no_leave" name="no_leave" readonly="" value="<?php echo set_value('no_leave'); ?>">
                                                    </div>
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Address During Leave :<span class="span_star_clr"> *</span></label>
                                                    <div class="col-sm-9">
                                                        <textarea name="leave_address" id="leave_address" class="form-control form-control-sm"><?php echo set_value('leave_address'); ?></textarea>
                                                    </div>
                                                    <?php echo form_error('leave_address', '<span class="help-inline address">', '</span>'); ?>
                                                  </div>
                                                  <div class="form-group row" style="margin-top: -42px;">
                                                    <label for="colFormLabelSm" class="col-sm-2 pr-0 col-form-label col-form-label-sm">Home Address :</label>
                                                    <div class="col-sm-1">
                                                        <input type="checkbox" name="home_address" id="home_address" class="form-control form-control-sm" style="width: 70%;" value="h" <?php echo set_checkbox('home_address', 'h'); ?>>
                                                    </div>

                                                  </div>
                                            </div>  
                                            <div class="col-md-3" style="border: 1px solid #000;padding: 10px 10px;"> 
                                                <p><b>Leave Balance</b></p>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">EL :</label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control form-control-sm" id="el" name="el" readonly="" value="<?php echo $employee->el; ?>">
                                                    </div>
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">CL :</label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control form-control-sm" id="cl" name="cl" readonly="" value="<?php echo $employee->cl; ?>">
                                                    </div>
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">SL :</label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control form-control-sm" id="sl" name="sl" readonly="" value="<?php echo $employee->sl; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Reason For Leave : <span class="span_star_clr"> *</span></label>
                                                        <div class="col-sm-10"> 
                                                          <textarea class="form-control form-control-sm" name="leave_reason"><?php echo set_value('leave_reason'); ?></textarea>
                                                        </div>
                                                        <?php echo form_error('leave_reason', '<span class="help-inline">', '</span>'); ?>
                                                      </div>
                                                </div>
                                            </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">Approver Name : <span class="span_star_clr"> *</span></label>
                                                    <div class="col-sm-9">
                                                      <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'approver_id');
                                                            $selected = (set_value('approver_id')) ? set_value('approver_id') : '';
                                                            echo form_dropdown('approver_id', $approver, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                    <?php echo form_error('approver_id', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                &nbsp;
                                            </div>
                                        </div>
                                        <div class="row mt-top mb-3">  
                                            <div class="col-md-5">&nbsp;</div>
                                              <div class="col-md-2">
                                                <button type="submit" class="cr-a">Apply</button>
                                              </div>
                                              <div class="col-md-5">&nbsp;</div>
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

      		//$("#leave_on_div").hide();
          //$("#no_leave").prop('readonly', false);
          //$("#leave_on").prop('required',false);
          $("#leave_from").prop('required',true);
          $("#leave_to").prop('required',true);
      		
      		

      	});

      	var leave_address = $("#l_address").val();
        var date_diff = '';
        var el = $("#el").val();
        var sl = $("#sl").val();
        var cl = $("#cl").val();
        var days = '';
        

      	$("#half_day").click(function(event)
        { 
          if($('input:checkbox[name=half_day]').is(':checked'))
          {
            $("#lebel_from").text("Leave On");
            $("#leave_to_div").hide();
            $("#no_leave").val('0.5');
            $("#leave_from").prop('required',true);
            $("#leave_to").prop('required',false);

          }
          else
          {
            $("#lebel_from").text("Leave From");
            $("#leave_from_div").show();
            $("#leave_to_div").show();
            $("#no_leave").val('');
            $("#leave_from").prop('required',true);
            $("#leave_to").prop('required',true);
          }
        });

        $("#home_address").click(function(event)
        { 
          if($('input:checkbox[name=home_address]').is(':checked'))
          {
          	$("#leave_address").val(leave_address);
          }
          else
          {
            $("#leave_address").val('');
          }
        });

        $("#leave_to").change(function(event)
          {
          	let leave_type = $("#leave_type").val();
          	let from_date = new Date($("#leave_from").val());
            let to_date = new Date($("#leave_to").val());
            let diff = (to_date - from_date);
            days = (diff/1000/60/60/24) + 1;

            $("#no_leave").val(days );
          });

        function validDetail()
        {
          let isValidated = true;

          if($('input:checkbox[name=half_day]').is(':checked') == false)
          {
             let from_date = new Date($("#leave_from").val());
             let to_date = new Date($("#leave_to").val());

              if(to_date < from_date)
              {
                isValidated = false;
              }

              if(!isValidated){
              alert("To Date should be greater than From Date");
              return false;
            }
          }

        let leave_type = $("#leave_type").val();
        if(leave_type == 'EL')
        {
        	if(days > el)
        	{
        		isValidated = false;
        	}
		}
		if(leave_type == 'CL')
        {
        	if(days > cl)
        	{
        		isValidated = false;
        	}
		}
		if(leave_type == 'SL')
        {
        	if(days > sl)
        	{
        		isValidated = false;
        	}
		}

        if(!isValidated){
            alert("Leave Days should not be greater than " + leave_type);
            return false;
        	}
        return true;             
      }



        


      </script>