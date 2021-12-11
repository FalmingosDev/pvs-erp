<?PHP
//print_r($state); exit;
?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<style type="text/css">
    .table td, .table th {
    padding: .75rem;
    vertical-align: top;
    border-top: none;
}
</style>

<style>
    .ui-datepicker-calendar {
        display: none;
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
                                        <h1 class="employee-box">Client Attendance Entry</h1>   
                                    </div>
                                    <div class="col-md-1">
                                        <a class="cr-a" href="<?php echo base_url('client_attendance/client'); ?>" class="ad-btn-a-tag">Back</a>
                                    </div>
                                
                            <div class="col-md-12">
                                <!-- <h1 class="text-center">Client Attendance Entry</h1>  -->
                                <?php //echo validation_errors(); ?>
                                <?php if($this->session->flashdata('msg')): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="show_msg">
                                            <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                <?php endif; ?>
							<?php echo form_open( base_url( 'client_attendance/add_client_attendance' ), array( 'id' => 'clientattendance', 'class' => 'form-horizontal' ) ); ?>
								<div class="wrapper-box">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Month & Year : </label>
                                                <div class="col-sm-9">
                                                    <p class="mb-0" ><?=$salary_process_month->MonthYear?></p>
                                                    <input type="hidden" id="month_year" name="month_year" class="form-control form-control-sm" value="<?=$salary_process_month->month?>">
                                                </div>
                                                <?php echo form_error('month_year', '<span class="help-inline">', '</span>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Client Name</label>
                                                    <div class="col-sm-9">
                                                       <?php 

                                                            $attributes = array('class' => 'form-control form-control-sm select2', 'id' => 'client_id','onChange' => 'populateemployee()');
                                                            if(!empty($this->uri->segment(3)))
                                                            {
                                                                $selected = ($this->uri->segment(3)) ? $this->uri->segment(3) : '';
                                                            }
                                                            else
                                                            {
                                                                $selected = (set_value('client_id')) ? set_value('client_id') : '';
                                                            }

                                                            
                                                            echo form_dropdown('client_id', $client, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                    <?php echo form_error('client_id', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Branch Name</label>
                                                    <div class="col-sm-9">
                                                        <?php 
                                                     if(!empty($branch))
                                                     {
                                                            $attributes = array('class' => 'form-control form-control-sm select2', 'id' => 'branch_id','onChange' => 'populateemployee()');
                                                            if(!empty($this->uri->segment(4)))
                                                            {
                                                                $selected = ($this->uri->segment(4)) ? $this->uri->segment(4) : '';
                                                            }
                                                            else
                                                            {
                                                                $selected = (set_value('branch_id')) ? set_value('branch_id') : '';
                                                            }
                                                            
                                                            echo form_dropdown('branch_id', $branch, $selected, $attributes);
                                                     }
                                                     else
                                                     {
                                                        ?>
                                                        <select class="form-control form-control-sm select2" data-width="100%" id="branch_id" name="branch_id" onchange="populateemployee()">
                                                            
                                                        </select>
                                                        <?php
                                                     }
                                                    ?>




                                                        
                                                    </div>
                                                    <?php echo form_error('branch_id', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            
                                        </div>  
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm ">Employee Code & Name : </label>
                                                    <div class="col-sm-8">
                                                    <?php
                                                    if(!empty($employee))
                                                     {
                                                            $attributes = array('class' => 'form-control form-control-sm select2', 'id' => 'employee_id','onChange' => 'populateemployee()');
                                                            // if(!empty($this->uri->segment(4)))
                                                            // {
                                                            //     $selected = ($this->uri->segment(4)) ? $this->uri->segment(4) : '';
                                                            // }
                                                            // else
                                                            // {
                                                            //     $selected = (set_value('branch_id')) ? set_value('branch_id') : '';
                                                            // }
                                                            
                                                            echo form_dropdown('employee_id', $employee,'', $attributes);
                                                     }
                                                     else
                                                     {
                                                        ?>
                                                        <select class="form-control form-control-sm select2" data-width="100%" id="employee_id" name="employee_id">
                                                            
                                                        </select>
                                                        <?php
                                                     }
                                                    ?> 

                                                    </div>
                                                    <?php echo form_error('employee_id', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-6" >
                                                <div class="form-group row" id="new_employee" style="display: none;">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Employee Code & Name : </label>
                                                    <div class="col-sm-8">
                                                        <select class="form-control form-control-sm select2" data-width="100%" id="new_employee_id" name="new_employee_id">
                                                            
                                                        </select> 
                                                    </div> 
                                                  </div>
                                            </div>
                                        </div>   
                                    <div class="row" style="border-bottom: 1px solid #000;margin-bottom: 20px;">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm ">Designation : </label>
                                                    <div class="col-sm-9">
                                                    <?php
                                                    if(!empty($designation))
                                                     {
                                                            $attributes = array('class' => 'form-control form-control-sm select2', 'id' => 'designation_id');
                                                            // if(!empty($this->uri->segment(4)))
                                                            // {
                                                            //     $selected = ($this->uri->segment(4)) ? $this->uri->segment(4) : '';
                                                            // }
                                                            // else
                                                            // {
                                                            //     $selected = (set_value('branch_id')) ? set_value('branch_id') : '';
                                                            // }
                                                            
                                                            echo form_dropdown('designation_id', $designation,'', $attributes);
                                                     }
                                                     else
                                                     {
                                                        ?>
                                                        <select class="form-control form-control-sm select2" id="designation_id" name="designation_id">
                                                              
                                                              </select>
                                                        <?php
                                                     }
                                                    ?> 


                                                        
                                                    </div>
                                                    <?php echo form_error('designation_id', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-1">
                                                <div class="form-group row">
                                                    <button type="button" id="proceed" class="cr-a">Proceed</button>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">  
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm pr-0 ">Client Name : </label>
                                                    <div class="col-sm-7">
                                                        <p class="mb-0" id="client_name"></p>
                                                    </div>
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm ">Employee Code : </label>
                                                    <div class="col-sm-6">
                                                        <p class="mb-0" id="empployee_code"></p>
                                                    </div>
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm ">Designation : </label>
                                                    <div class="col-sm-7">
                                                        <p class="mb-0" id="designation"></p>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm ">Location : </label>
                                                    <div class="col-sm-8">
                                                        <p class="mb-0" id="location"></p>
                                                    </div>
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">Name : </label>
                                                    <div class="col-sm-9">
                                                        <p class="mb-0" id="employee_name"></p>
                                                    </div>
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm pr-0">Fathers Name : </label>
                                                    <div class="col-sm-7">
                                                        <p class="mb-0" id="fathers_name"></p>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-4"> 
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm ">CALCULATION DAYS : </label>
                                                    <div class="col-sm-6">   
                                                        <p class="mb-0" id="calculation_days"></p>
                                                        <input type="hidden" name="calculation_days" id="cal_days" value="0">
                                                    </div>
                                                    
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-6 col-form-label col-form-label-sm pr-0">Duty Hrs : </label>
                                                    <div class="col-sm-6">
                                                        <p class="mb-0" id="duty_hrs"></p>
                                                        <input type="hidden" name="duty_hrs" id="d_hrs">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <div class="row mb-3">
                                            <div class="col-md-6" style="border: 1px solid #000;padding-top: 10px;">
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Duty : </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control form-control-sm" name="duty" id="duty" value="" onkeyup="totalAmt()">
                                                    </div>
                                                    <?php echo form_error('duty', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">W/o : </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control form-control-sm" name="w_o" id="w_o" value="" onkeyup="totalAmt()">
                                                    </div>
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm pr-0">Leave : </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control form-control-sm" name="leave" id="leave" onkeyup="validationField()" value="">
                                                        <div class="row mt-2">
                                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">EL : </label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control form-control-sm" name="el" id="el" onkeyup="validationField()" value="">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">FL : </label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control form-control-sm" name="fl" id="fl" onkeyup="validationField()" value="">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm pr-0">C/O : </label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control form-control-sm" name="c_o" id="c_o" onkeyup="validationField()" value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                  </div>
                                                       <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Ph : </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control form-control-sm" name="ph" id="ph" onkeyup="totalAmt()" value="">
                                                    </div>
                                                  </div> 
                                                    </div>
                                                    <div class="col-md-3">
                                                    <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">&nbsp;</label>
                                                    <div class="col-sm-8">
                                                      &nbsp; 
                                                    </div>  
                                                  </div>
                                                    <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm"><b>&nbsp;</b></label>
                                                    <div class="col-sm-8">
                                                      &nbsp; 
                                                    </div>  
                                                  </div>
                                                    <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"><b>&nbsp;</b></label>
                                                    <div class="col-sm-8">
                                                      &nbsp; 
                                                    </div>  
                                                  </div>
                                                    <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"><b>&nbsp;</b></label>  
                                                  </div>
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-12 col-form-label col-form-label-sm"><b>Total</b></label> 
                                                  </div>
                                                <div class="form-group row">
                                                    <div class="col-sm-12">
                                                      <p class="form-control form-control-sm" id="total"></p>
                                                    </div>  
                                                  </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="col-md-6">
                                                <div class="table-responsive">
                                                    <table class="table" style="width: 100%;">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Advance to recover</th>
                                                                <th>Amt to Deduct</th>
                                                                <th>Fix Deduction</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr> 
                                                                <td>Advance</td>
                                                                <td><p class="form-control form-control-sm mb-0" id="advance"></p></td>
                                                                <td><input class="form-control form-control-sm" type="text" name="advance_deduct" id="advance_deduct"></td>
                                                                <td><input class="form-control form-control-sm" type="text" name="advance_fix" id="advance_fix" readonly=""></td>
                                                            </tr>
                                                            <tr> 
                                                                <td>Loan</td>
                                                                <td><p class="form-control form-control-sm mb-0" id="advance_loan"></p></td>
                                                                <td><input class="form-control form-control-sm" type="text" name="loan_deduct"></td>
                                                                <td><input class="form-control form-control-sm" type="text" name="loan_fix" id="loan_fix" readonly=""></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Uniform</td>
                                                                <td><p class="form-control form-control-sm mb-0" id="advance_uniform"></p></td>
                                                                <td><input class="form-control form-control-sm" type="text" name="uniform_deduct"></td>
                                                                <td><input class="form-control form-control-sm" type="text" name="uniform_fix" readonly=""></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Fine</td>
                                                                <td><p class="form-control form-control-sm mb-0" id="advance_fine"></p></td>
                                                                <td><input class="form-control form-control-sm" type="text" name="fine_deduct"></td>
                                                                <td><input class="form-control form-control-sm" type="text" name="fine_fix" readonly=""></td>
                                                            </tr>
                                                            <tr>
                                                                <td>MISC</td>
                                                                <td><p class="form-control form-control-sm mb-0" id="advance_misc"></p></td>
                                                                <td><input class="form-control form-control-sm" type="text" name="other_deduct"></td>
                                                                <td><input class="form-control form-control-sm" type="text" name="other_fix" id="other_fix" readonly=""></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div> 
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">Ot : </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control form-control-sm" name="ot">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp;</label>
                                                    <div class="col-sm-9">
                                                      &nbsp;
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm pr-0">N/A Duty : </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control form-control-sm" name="na_duty">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp;</label>
                                                    <div class="col-sm-9">
                                                      &nbsp;
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                    <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-2 col-form-label col-form-label-sm ">NA : </label>
                                                    <div class="col-sm-10">
                                                        <input type="text" class="form-control form-control-sm" name="na">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp;</label>
                                                    <div class="col-sm-9">
                                                      &nbsp;
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                    <div class="row">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-2 text-center">     
                                            <!-- <button type="submit" class="st-width-new" id="">Submit</button> -->
                                            <button type="submit" class="cr-a">Submit</button>
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

      <section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1>Client Attendance List</h1>
                        </div>
                    </div>
                    <div class="wrapper-box">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        
                                        <th>Employee Code & Name</th>
                                        <th>Designation</th>
                                        <th>Duty</th>
                                        
                        
                                    </tr>
                                </thead>
                                <tbody id="client_attendance_list">
                                    <?php
                                    if(!empty($attendance_list))
                                    {
                                        foreach($attendance_list as $attendance_row)
                                        {
                                    ?>
                                        <tr>
                                            <td><?=$attendance_row->employee_name?></td>
                                            <td><?=$attendance_row->desig_name?></td>
                                            <td><?=$attendance_row->duty?></td>
                                        </tr>
                                    <?php
                                        }
                                    }
                                    ?>
                                        
                                    
                                
                                </tbody>
                             </table>
                    </div>
                </div>
            </div>
          </div>
</section>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
	  
<script>
   
    $(document).ready(function() {
      $(".select2").select2();
    });
    var duty_s = 0.00, w_o_s = 0.00, leave_s = 0.00, el_s = 0.00, fl_s = 0.00, c_o_s = 0.00, ph_s = 0.00, totalSum = 0; 

    // $(function() {
    //         $('#month_year').datepicker( {
    //         changeMonth: true,
    //         changeYear: true,
    //         showButtonPanel: true,
    //         dateFormat: 'yy-mm',
    //         onClose: function(dateText, inst) { 
    //             $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
    //         }
    //         });
    //     });
		
    $("#client_id").change(() => {
        var client_id = $("#client_id").val();
        populatebranch(client_id);
        populatedesig(client_id);
        
    })

    function populatebranch(client_id){
    var result='';
    
    $.ajax({
        type: 'POST',   
        url: '<?php echo base_url('client_attendance/branch_list'); ?>',
        data: {client_id: client_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
        dataType: 'json',
        encode: true,
    })
    //ajax response
    .done(function(data){
        $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
        if(data.status){            
            result +='<option value="">Select Branch</option>';

            $.each(data.branch_list,function(key,value){
                //value(value.city_name);
                result +='<option value="'+value.branch_id+'">'+value.branch_name+'</option>';
            });
        }
        else{
            result +='<option value="">No Branch selected</option>';
        }
        $("#branch_id").html(result);
    
    })
    
    .fail(function(data){
        // show the any errors
        console.log(data);
    });
}

function populateemployee(){
    if (($("#client_id").val() != null) && ($("#branch_id").val() != null)){
        let client_id = $("#client_id").val();
        let branch_id = $("#branch_id").val();     
        let attendance_month = $("#month_year").val();   
        var result1 = '';  
        var result2 = ''; 

        $.ajax({
            type: 'POST',   
            url: '<?php echo base_url('client_attendance/attendance_list'); ?>',
            data: {client_id: client_id,branch_id: branch_id,attendance_month: attendance_month,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
            dataType: 'json',
            encode: true,
        })
        //ajax response
        .done(function(data)
        {

            $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
            if(data.status){            
                

                $.each(data.attendance_list,function(key,value)
                {
                    result2 +='<tr class="gradeX"><td align="left">'+value.employee_name+'</td><td align="left">'+value.desig_name+'</td><td align="">'+value.duty+'</td></tr>';
                });  
            }
            
            $("#client_attendance_list").html(result2);        
        })
        .fail(function(data)
        {
            // show the any errors
           // console.log(data);
        });





       
        $.ajax({
            type: 'POST',   
            url: '<?php echo base_url('client_attendance/employee_list'); ?>',
            data: {client_id: client_id,branch_id: branch_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
            dataType: 'json',
            encode: true,
        })
        //ajax response
        .done(function(data){

            $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
            if(data.status){            
                result1 +='<option value="">Select Employee</option>';

                $.each(data.employee_list,function(key,value){
                    result1 +='<option value="'+value.employee_id+'">'+value.employee_name+'</option>';
                });

                result1 +='<option value="N">New Employee</option>';
            }
            else{
                result1 +='<option value="">No Employee selected</option>';
            }
            $("#employee_id").html(result1);
        
        })
        
        .fail(function(data){
            // show the any errors
            console.log(data);
        });
    }
    else
    {
        return false;
    }
}

$("#employee_id").change(() => {
    let employee_id = $("#employee_id").val();
    
    if(employee_id == 'N'){
        $("#new_employee").show();
        $("#new_employee_id").attr('required',true);
        let client_id_new = $("#client_id").val();
        let branch_id_new = $("#branch_id").val(); 
        var result1 = '';  
       
        $.ajax({
            type: 'POST',   
            url: '<?php echo base_url('client_attendance/employee_mst_list'); ?>',
            data: {client_id_new: client_id_new,branch_id_new: branch_id_new,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
            dataType: 'json',
            encode: true,
        })
        //ajax response
        .done(function(data){

            $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
            if(data.status){            
                result1 +='<option value="">Select Employee</option>';

                $.each(data.new_employee_list,function(key,value){
                    result1 +='<option value="'+value.employee_id+'">'+value.employee_name+'</option>';
                });
            }
            else{
                result1 +='<option value="">No Employee selected</option>';
            }
            $("#new_employee_id").html(result1);
        
        })
        
        .fail(function(data){
            // show the any errors
            console.log(data);
        });
    }
    else
    {
        $("#new_employee").hide();
        $("#new_employee_id").val('');
        $("#new_employee_id").attr('required',false);
    }
})

function populatedesig(client_id){
    var result='';
    
    $.ajax({
        type: 'POST',   
        url: '<?php echo base_url('client_attendance/designation_list'); ?>',
        data: {client_id: client_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
        dataType: 'json',
        encode: true,
    })
    //ajax response
    .done(function(data){
        $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
        if(data.status){            
            result +='<option value="">Select Designation</option>';

            $.each(data.designation_list,function(key,value){
                //value(value.city_name);
                result +='<option value="'+value.desig_id+'">'+value.desig_name+'</option>';
            });
        }
        else{
            result +='<option value="">No Designation selected</option>';
        }
        $("#designation_id").html(result);
    
    })
    
    .fail(function(data){
        // show the any errors
        console.log(data);
    });
}

$("#proceed").click(() => {
    let client_id = $("#client_id").val();
    let branch_id = $("#branch_id").val();
	let designation_id = $("#designation_id").val();

	let emp_id = '';
	if($("#employee_id").val() == 'N')
	{
		emp_id = $("#new_employee_id").val();
	}
	else
	{
		emp_id = $("#employee_id").val();
	}
	$.ajax({
        type: 'GET',   
        url: '<?php echo base_url('client_attendance/client_emp_details'); ?>/' + client_id + '/' + emp_id + '/' + branch_id + '/' + designation_id,
        dataType: 'json',
    })
    //ajax response
    .done(function(data){
    	console.log(data);
        $("#client_name").html(data.client_name);
        $("#empployee_code").html(data.emp_code);
        $("#employee_name").html(data.emp_name);
        $("#fathers_name").html(data.father_name);
        $("#location").html(data.branch_name);
        $("#designation").html(data.desig_name);
        if(data.salary_type == 'm'){
            $("#calculation_days").html('Monthly');
        }
        else if(data.salary_type == 'd'){
            $("#calculation_days").html(data.salary_days);
        }
        else
        {
            if(data.billing_type == 'm'){
                $("#calculation_days").html('Monthly');
            }
            else if(data.billing_type == 'd'){
                $("#calculation_days").html(data.bill_calculation_days);
            }
        }
        
        //$("#cal_days").val(data.bill_calculation_days);
		$("#duty_hrs").html(data.duty_hrs);
		$("#d_hrs").val(data.duty_hrs);
		$("#advance").html(data.advance);
		$("#advance_fix").val(data.fix);
		$("#advance_loan").html(data.advance_loan);
		$("#loan_fix").val(data.fix_loan);
		$("#advance_misc").text(data.advance_misc);
		$("#other_fix").val(data.fix_misc);

        
    })
    
    .fail(function(data){
        // show the any errors
        console.log(data);
    });
    
        
})

function validationField(){

    let leave = $('#leave'), el = $('#el'), fl = $('#fl'), c_o = $('#c_o');

	if(leave.val().length > 0){
        el.attr('disabled', true);
        fl.attr('disabled', true);
        c_o.attr('disabled', true);
    } else if((el.val().length > 0) || (fl.val().length > 0) || (c_o.val().length > 0)) {
        leave.attr('disabled', true);
    }
    else {
        leave.attr('disabled', false);
        el.attr('disabled', false);
        fl.attr('disabled', false);
        c_o.attr('disabled', false);
    }

	totalAmt();
}

function totalAmt() {
	duty_s = +($('#duty').val());
    w_o_s = +($('#w_o').val());
    leave_s = +($('#leave').val());
    el_s = +($('#el').val());
    fl_s = +($('#fl').val());
    c_o_s = +($('#c_o').val());
    ph_s = +($('#ph').val());

    totalSum = duty_s + w_o_s + leave_s + el_s + fl_s + c_o_s + ph_s;
    $('#total').html(totalSum);

}
 
</script>

