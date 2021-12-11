<?PHP
//print_r($state); exit;
?>
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
                        
                                    <div class="col-md-12">
                                        <h1 class="employee-box">Salary Process Month</h1>   
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
                                <?php if($this->session->flashdata('error')): ?>
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="show_msg">
                                            <strong><?php echo $this->session->flashdata('error'); ?></strong>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                    </div>
                                <?php endif; ?>
							<?php echo form_open( base_url('salary_process_month'), array( 'id' => 'clientattendance', 'class' => 'form-horizontal' ) ); ?>
                            <input type="hidden" id="month_id" name="month_id"  value="<?=$salary_process_month->month_id?>">
								<div class="wrapper-box">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Month & Year : </label>
                                                <div class="col-sm-9">
                                                    <p class="mb-0" ><?=$salary_process_month->MonthYear?></p>
                                                    <input type="hidden" id="month_year_old" name="month_year_old" class="form-control form-control-sm" value="<?=$salary_process_month->month?>">
                                                </div>
                                                <?php echo form_error('month_year_old', '<span class="help-inline">', '</span>'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Month & Year : </label>
                                                <div class="col-sm-9">
                                                    <input type="text" id="month_year" name="month_year" class="form-control form-control-sm">
                                                </div>
                                                <?php echo form_error('month_year', '<span class="help-inline">', '</span>'); ?>
                                            </div>
                                        </div>
                                    </div>
                                    
                                   
                                           
                                    <div class="row">
                                        <div class="col-md-5"></div>
                                        <div class="col-md-2 text-center">     
                                            <!-- <button type="submit" class="st-width-new" id="">Submit</button> -->
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
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!-- <link rel="stylesheet" href="/resources/demos/style.css"> -->
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script>

    $(function() {
            $('#month_year').datepicker( {
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'yy-mm',
            onClose: function(dateText, inst) { 
                $(this).datepicker('setDate', new Date(inst.selectedYear, inst.selectedMonth, 1));
            }
            });
        });
</script>



