<?PHP 
//print_r($detail); exit;
?>
      <section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-client" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                    <div class="row mb-3">  
                        <div class="col-md-7">
                            <h1 style="text-align: left;">Arrear Pay Details</h1>
                        </div>

                        <div class="col-md-5">
                            <div class="add-btn-div"> 
      
                                <a href="<?php echo base_url('area_payment/pf_pdf/'.$this->uri->segment(3).'/'.$this->uri->segment(4)); ?>" class="ad-btn-a-tag">DOWNLOAD PDF</a>  
                            </div>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                        <?php if($this->session->flashdata('msg')): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert" id="show_msg">
                                <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <?php echo form_open( base_url( 'staff_payroll/staff'), array( 'id' => 'loginform', 'class' => 'form-horizontal')); ?>
                             <!-- <div class="form-group row">
                                 <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">Branch Name :    </label>
                                    <div class="col-sm-9">
                                        <select class="form-control form-control-sm" id="branch_drp" name="branch_drp">
                                            <option value="">Select Branch</option>
                                            
                                        </select>
                                    </div>
                                </div> -->
                        </div>
                        <!-- <div class="col-md-5">
                             <div class="form-group row">
                                 <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Month & Year :    </label>
                                    <div class="col-sm-9">
                                        <select class="form-control form-control-sm" id="month_drp" name="month_drp">
                                            <option value="">Select Month</option>
                                             
                                        </select>
                                    </div>
                                </div>
                        </div> 
                        <div class="col-md-1">
                            <button type="button" class="cr-a" style="padding: 6px 0px;" id="submit_search">Search</button>
                        </div>  -->
                    </div> 

                    <div class="row" id="payroll_div" style="display: none;">
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <button class="cr-a" type="submit">Process for Payroll</button>
                        </div>
                        <div class="col-md-5"></div>
                    </div>
                    <div class="wrapper-box">
                        <table id="staff-table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                    <tr>
                                        <th>Employee Code & Name</th>
                                        <th>Salary Month</th>
                                        <th>OT</th>
                                        <th>EPF</th>
                                        <th>ESI</th>
                                        <th>Duties</th>
                                        <th>Net Pay</th>
                                    </tr>
                                </thead>
                                <tbody id="staff_list">
                                    <?php foreach ($list as $list) {?>
                                    <tr>
                                        <td><?php echo $list->name; ?></td>
                                        <td><?php echo date('M, Y', strtotime($list->salary_month)); ?></td>
                                        <td><?php echo $list->ot; ?></td>
                                        <td><?php echo $list->epf; ?></td>
                                        <td><?php echo $list->esi; ?></td>
                                        <td><?php echo $list->billing_days; ?></td>
                                        <td><?php echo $list->net_pay; ?></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
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

<script>
    $(document).ready(function() {
        $('#staff-table').DataTable();
        //$("#payroll_div").hide();
    } );

        
</script>



