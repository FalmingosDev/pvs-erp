
      <section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <?php if($this->session->flashdata('error')): ?>
                        <div class="alert btn-danger alert-dismissible fade show" role="alert" id="show_msg">
                                <strong><?php echo $this->session->flashdata('error'); ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        
                    <?php endif; ?>
                    <?php if($this->session->flashdata('success')): ?>
                        <div class="alert btn-success alert-dismissible fade show" role="alert" id="show_msg">
                                <strong><?php echo $this->session->flashdata('success'); ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        
                    <?php endif; ?>
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-client" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="container">
                        <div class="row">
                            <div class="col-md-12">

                    <div class="row">
                        <div class="col-md-12">
                            <h1 style="text-align: center;">Lock Process For Client Supp Payroll</h1>
                        </div>
                        
                    </div>
                    <?php echo form_open( base_url('payroll_supp/index'), array( 'id' => 'loginform', 'class' => 'form-horizontal')); ?>
                    
                     <div class="row">                        
                          <div class="col-md-5">
                               <div class="form-group row">
                                   <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Month & Year :    </label>
                                      <div class="col-sm-8">
                                          <select class="form-control form-control-sm" id="month_drp" name="month_drp">
                                              <option value="">Select Month & Year</option>
                                              <?php 
                                              foreach ($months as $month) 
                                              { 
                                                if(@$select_month==$month->payment_month)
                                                {
                                              ?>
                                              <option value="<?php echo $month->payment_month ?>" selected><?php echo date('M, Y', strtotime($month->payment_month)) ?></option>
                                              <?php 
                                                }
                                                else
                                                {
                                                  ?>
                                              <option value="<?php echo $month->payment_month ?>" ><?php echo date('M, Y', strtotime($month->payment_month)) ?></option>
                                              <?php 
                                                }
                                              } 
                                              ?> 
                                          </select>
                                      </div>
                                  </div>
                          </div>
                           <div class="col-md-1" >
                              <button class="cr-a" style="padding: 6px 0px;">Search</button>
                          </div>
                      </div> 
                      </form> 

                      <div class="wrapper-box">
                      <?php echo form_open( base_url('payroll_supp/update'), array( 'id' => 'tidUpdate', 'class' => 'form-horizontal')); ?>
                        <table id="staff-table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
									               <tr>
                                        <th>Month & Year</th>
                                        <th>Client Name</th>
                                        <th>Branch Name</th>
                                        <th>Lock Payroll</th>
                                  </tr>
                            </thead>
                                <tbody id="data_show">
                                <?php 
                                  if(!empty($payroll_search))
                                  {
                                    foreach ($payroll_search as $payrollsearch) 
                                    {
                                    ?>
								                      <tr>
                                          <td><?php echo date('M, Y', strtotime($payrollsearch->payment_month)); ?></td>
                                          <td><?php echo $payrollsearch->client_name; ?></td>                                    
                                          <td><?php echo $payrollsearch->branch_name; ?></td>
                                           <td><input type="checkbox"  name="payroll_checkbox[]"  value="<?php echo $count_tid_ck->serial_no.'#**#'.$payrollsearch->client_id.'#**#'.$payrollsearch->branch_id.'#**#'.$payrollsearch->payment_month; ?>"></td>
                                      </tr>
                                  <?php 
                                    } 
                                  }
                                  ?>
                                </tbody>
                            </table>
                            <?php
                            if(!empty($payroll_search))
                            {
                            ?>
                            <div class="col-md-2">                                             
							                   <button type="submit" class="cr-a"  align="center" >Save</button>
						                </div>
                            <?php
                            }
                            ?>
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
	  
	  <script>
		
		$(document).ready(function() {
			
			$('#staff-table').DataTable();
		} );
	  </script>

<script>

    function form_submit_function(){
		
    //$("#save_all_btn").prop('disabled', true);
    sendData = $("#loginform").serializeArray();
    $.ajax({  
      url: '<?php echo base_url('tid_process/update'); ?>', 
      type: "POST",
      data : sendData,            
      dataType: 'json', // what type of data do we expect back from the server
      encode: true
    })
    .done(function(data) {      
      //alert(data.status);
      console.log(data);
      if(data.status == "1"){
        $("#myElem").show();
		
               setTimeout(function() { $("#myElem").hide(); }, 5000);
        
      }
      else{
        alert("Sorry Unable To Update");
      }
    })
    .fail(function(data){   
      console.log(data);
    })
  }
  </script>