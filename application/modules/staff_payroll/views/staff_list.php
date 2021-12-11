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
                            <h1 style="text-align: left;">Process Staff Payroll</h1>
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                        <?php if($this->session->flashdata('msg')): ?>
                        <?php if($this->session->flashdata('status')  == 1 ): ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert" id="show_msg">
                                <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php else: ?>
                             <div class="alert alert-danger alert-dismissible fade show" role="alert" id="show_msg">
                                <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                        <?php endif; ?>
                        <?php echo form_open( base_url( 'staff_payroll/staff'), array( 'id' => 'loginform', 'class' => 'form-horizontal')); ?>
                             <div class="form-group row">
                                 <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">Branch Name :    </label>
                                    <div class="col-sm-9">
                                        <select class="form-control form-control-sm" id="branch_drp" name="branch_drp">
                                            <option value="">Select Branch</option>
                                            <?php foreach ($branches as $branch) { ?>
                                            <option value="<?php echo $branch->company_branch_id?>"><?php echo $branch->branch_name ?></option>
                                            <?php } ?> 
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-5">
                             <div class="form-group row">
                                 <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Month & Year :    </label>
                                    <div class="col-sm-9">
                                        <select class="form-control form-control-sm" id="month_drp" name="month_drp">
                                            <option value="">Select Month</option>
                                            <?php foreach ($months as $month) { ?>
                                            <option value="<?php echo $month->attendance_month ?>"><?php echo date('M, Y', strtotime($month->attendance_month)) ?></option>
                                            <?php } ?> 
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="cr-a" style="padding: 6px 0px;" id="submit_search">Search</button>
                        </div>  
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
                                        <th>Month & Year</th>
                                        <th>Branch</th>
                                        <th>Employee Code & Name</th>
                                        <th>Designation</th>
                                        <th>Lop</th>
                                        <th>Ot Hrs</th>
                                    </tr>
                                </thead>
                                <tbody id="staff_list">
                                    <?php foreach ($staffs as $staff) {?>
								    <tr>
                                        <td><?php echo date('M, Y', strtotime($staff->attendance_month)) ?></td>
                                        <td><?php echo $staff->branch_name ?></td>
                                        <td><?php echo $staff->employee_name ?></td>
                                        <td><?php echo $staff->desig_name ?></td>
                                        <td><?php echo $staff->lop ?></td>
                                        <td><?php echo $staff->ot_hrs?></td>
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
        $("#payroll_div").hide();
    } );

        $("#submit_search").click(function(event){

            //alert(1);

        //event.preventDefault();
        var month = $('#month_drp').val();
        var branch_id = $('#branch_drp').val();

        
        //alert(1);

        $.ajax({
         type:'POST',
         url: '<?php echo base_url('staff_payroll/search_list'); ?>',
         data: {<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(), month:month, branch_id:branch_id},
         dataType:'json',
         encode:true,

         success: function(data) {
            var html = '';
            var i;
            var c = 0;
            if(data.status){
                
                $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
                $.each(data.attendance_list,function(key,value){c++;
                    html += '<tr>';
                    html += '<td>'+value.attendance_month+'</td>';
                    html += '<td>'+value.branch_name+'</td>';
                    html += '<td>'+value.employee_name+'</td>';
                    html += '<td>'+value.desig_name+'</td>';
                    html += '<td>'+value.lop+'</td>';
                    html += '<td>'+value.ot_hrs+'</td>';
                    html += '</tr>';
                     
                })
            }
            
            $("#staff-table").dataTable().fnDestroy();
            $("#staff_list").html(html);
            $("#staff-table").DataTable();           
            
            if (month != '' && branch_id != '' && c > 0)
            {
                $("#payroll_div").show();
            }
            else
            {
                $("#payroll_div").hide();
            }
        }
})   


    });
</script>



