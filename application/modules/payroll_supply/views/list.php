<?PHP 
//print_r($list); exit;
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
                    <div class="row">
                        <div class="col-md-7">
                            <h1 style="text-align: left;">Tid Process For Supplementary Payroll</h1>
                        </div>
                        <div class="col-md-5">
                            <div class="add-btn-div">
                                <!-- <a href="<?php echo base_url('user_role/add'); ?>" class="ad-btn-a-tag">Allocate</a>   -->
                            </div>
                        </div>
                    </div>
                    <?php echo form_open( base_url( 'payroll_supp/staff'), array( 'id' => 'loginform', 'class' => 'form-horizontal')); ?>
                    
                     <div class="row">                        
                        <div class="col-md-5">
                             <div class="form-group row">
                                 <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Month & Year :    </label>
                                    <div class="col-sm-9">
                                        <select class="form-control form-control-sm" id="month_drp" name="month_drp">
                                            <option value="">Select Month</option>
                                            <?php foreach ($months as $month) { ?>
                                            <option value="<?php echo $month->payment_month ?>"><?php echo date('M, Y', strtotime($month->payment_month)) ?></option>
                                            <?php } ?> 
                                        </select>
                                    </div>
                                </div>
                        </div>
                         <div class="col-md-1">
                            <button class="cr-a" style="padding: 6px 0px;" onclick="staff_search()">Search</button>
                        </div>
                          </div>  

                        <div class="wrapper-box">
                        <table id="staff-table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
									<tr>
                                        <th>Month & Year</th>
                                        <th>Client Name</th>
                                        <th>Branch Name</th>
                                       
                                        
                                        <th>Lock Payroll</th>
                                       

                                        <!-- <th>Edit</th>
                                        <th>Delete</th> -->
                                    </tr>
                                </thead>
                                <?php
                                        if($checking_value != 1){
                               ?>
                                <tbody id="data_show">
                                	<?php foreach ($payroll_search as $payrollsearch) {?>
								    <tr>
                                        <td><?php echo date('M, Y', strtotime($payrollsearch->payment_month)); ?></td>
                                        <td><?php echo $payrollsearch->client_name; ?></td>                                          
                                        <td><?php echo $payrollsearch->branch_name; ?></td>
                                       
                             <input type="hidden" name="employee_id_ckh"  value="<?php echo $payrollsearch->employee_id; ?>">
                             <input type="hidden" name="branch_id_ckh"  value="<?php echo $payrollsearch->branch_id; ?>">
                             <input type="hidden" name="gross_pay_ckh"  value="<?php echo $payrollsearch->gross_pay; ?>">

                             <input type="hidden" name="month_ck"  value="<?php echo $payrollsearch->payment_month; ?>">
                                <?php foreach ($count_tid_ck as $count_tid_ck1) ?>
                             
                              <input type="hidden" name="count_tid_ck"  value="<?php echo $count_tid_ck1->serial_no; ?>">

                      
                             <td><input type="checkbox" id="payroll_checkbox" name="payroll_checkbox"  value="<?php echo $payrollsearch->client_id; ?>"></td>
                                              
                                       
                                    </tr>
                                   <?php } ?>
                                </tbody>
                            <?php } ?>
                            </table>
                            <?php
                         
                            ?>
                            <div class="col-md-2">                                             
							  <button type="submit" class="cr-a"  align="center">Save</button>
						    </div>
						
                        
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
