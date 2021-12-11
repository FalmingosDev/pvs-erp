

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
                                        <h1>Leave Approve</h1>
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
                                <?php echo form_open( base_url('leave/approve_action/'.$leave_details->leave_id. '/'. $approver_level ), array( 'id' => 'apply-form', 'class' => 'form-horizontal' ) ); ?>
                                 
                                <input type="hidden" name="leave_id" value="<?php echo $leave_details->leave_id; ?>">
                                <input type="hidden" name="approver_level" value="<?php echo $approver_level; ?>">
                                 
                                <div class="wrapper-box">
                                   <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Employee Code : </label>
                                                    <div class="col-sm-9">
                                                      <p><?php echo $leave_details->employee_code; ?></p>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Employee Name : </label>
                                                    <div class="col-sm-8">
                                                      <p><?php echo $leave_details->first_name . ' ' . $leave_details->last_name; ?></p>  
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">  
                                            <div class="col-md-9">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Leave Type : </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="leave_type" id="leave_type" class="form-control form-control-sm" readonly="" value="<?php echo $leave_details->leave_type ?>">
                                                    </div>
                                                  </div>
                                                <div class="form-group row">
                                                 
                                                   <div class="col-md-6" id="leave_from_div">
                                                        <div class="row">
                                                            <label for="colFormLabelSm" class="col-md-4 col-form-label col-form-label-sm" id="lebel_from" >Leave From  : </label>
                                                      <div class="col-md-7 p-0">
                                                          <input type="text" name="leave_from" id="leave_from" readonly="" class="form-control form-control-sm" value="<?php echo date("d/m/Y", strtotime($leave_details->leave_from)); ?>">  
                                                      </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6" id="leave_to_div">
                                                        <div class="row">
                                                            <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm" id="leave_from_div">Leave To : </label>
                                                      <div class="col-sm-7">
                                                          <input type="text" readonly="" name="leave_to" id="leave_to" class="form-control form-control-sm" value="<?php echo date("d/m/Y", strtotime($leave_details->leave_to)); ?>">  
                                                      </div>
                                                        </div>
                                                    </div>
                                                    
                                                  </div> 
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">No Of Leave  Days :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" readonly="" class="form-control form-control-sm" id="no_leave" name="no_leave" readonly="" value="<?php echo $leave_details->leave_days ?>">
                                                    </div>
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 pr-0 col-form-label col-form-label-sm">Address During Leave :</label>
                                                    <div class="col-sm-9">
                                                        <textarea name="leave_address" readonly="" id="leave_address" class="form-control form-control-sm"><?php echo $leave_details->address; ?></textarea>
                                                    </div>
                                                  </div>
                                                  
                                            </div>  
                                            <div class="col-md-3" style="border: 1px solid #000;padding: 10px 10px;"> 
                                                <p><b>Leave Balance</b></p>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">EL :</label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control form-control-sm" id="" name="el" readonly="" value="<?php echo $leave_details->el; ?>">
                                                    </div>
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">CL :</label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control form-control-sm" id="cl" name="cl" readonly="" value="<?php echo $leave_details->cl; ?>">
                                                    </div>
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">SL :</label>
                                                    <div class="col-sm-6">
                                                        <input class="form-control form-control-sm" id="sl" name="sl" readonly="" value="<?php echo $leave_details->sl; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm">Reason For Leave : </label>
                                                        <div class="col-sm-10"> 
                                                          <textarea readonly="" class="form-control form-control-sm" name="leave_reason"><?php echo $leave_details->reason; ?></textarea>
                                                        </div>
                                                      </div>
                                                </div>
                                            </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">Remarks for Approve / Reject : <span class="span_star_clr"> *</span></label>
                                                    <div class="col-sm-9">
                                                        <textarea name="approve_remarks" class="form-control form-control-sm"><?php echo set_value('approve_remarks'); ?></textarea>
                                                    </div>
                                                    <?php echo form_error('approve_remarks', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" name="action" value="A" class="cr-a" style="background: green;">Approve</button>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" name="action" value="R" class="cr-a" style="background: red;">Reject</button>
                                            </div>
                                            </div>
                                        <!--<div class="row mt-top mb-3">  
                                            <div class="col-md-5">&nbsp;</div>
                                              <div class="col-md-2">
                                                <button type="submit" class="cr-a">Approve</button>
                                                <button type="submit" class="cr-a">Reject</button>

                                              </div>
                                              <div class="col-md-5">&nbsp;</div>
                                          </div>-->
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
            var from_date = new Date($("#leave_from").val());
            var to_date = new Date($("#leave_to").val());
            var diff = (to_date - from_date);
            var days = (diff/1000/60/60/24) + 1;
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

          return true;             
      }



        


      </script>