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
                            <h1 style="text-align: left;">Staff Attendance</h1>
                        </div>
                        <div class="col-md-5">
                            <div class="add-btn-div">
                                <a href="<?php echo base_url('attendance/add_staff_attendance'); ?>" class="ad-btn-a-tag">Attendance Input</a>  
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                        <?php echo form_open( base_url( 'attendance/staff'), array( 'id' => 'loginform', 'class' => 'form-horizontal')); ?>
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
                            <button class="cr-a" style="padding: 6px 0px;" onclick="staff_search()">Search</button>
                        </div>  
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
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody id="data_show">
                                    <?php foreach ($staffs as $staff) {?>
								    <tr>
                                        <td><?php echo date('M, Y', strtotime($staff->attendance_month)) ?></td>
                                        <td><?php echo $staff->branch_name ?></td>
                                        <td><?php echo $staff->employee_name ?></td>
                                        <td><?php echo $staff->desig_name ?></td>
                                        <td><?php echo $staff->lop ?></td>
                                        <td><?php echo $staff->ot_hrs?></td>
                                        <td style="text-align: center;"><i class="icon-edit"></i><a href="<?php echo base_url('attendance/edit/'.$staff->attendance_id); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
										<td style="text-align: center;"><i class="icon-edit"></i><a onclick="if(confirm('Are you sure want to Delete?'))
                                                { window.location.assign('<?php echo base_url('attendance/delete/'.$staff->attendance_id); ?>'); } 
                                                else{ return false; }"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                                        <!-- <td style="text-align: center;">
                                                <input type="checkbox" checked="checked" onclick="if(confirm('Are you sure want to change the status?'))
                                                { window.location.assign('<?php echo base_url('attendance/delete/'.$staff->company_branch_id.'/'.$staff->active_status); ?>'); } 
                                                else{ return false; }"> <span class="switch-slider round"></span> </label>
            	                        </td> -->
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
    } );
</script>
<!-- <script>
    function staff_search() {
        var branch = $('#branch_drp').val();
        var month = $('#month_drp').val();
        
        if(branch =='' && month =='')
        {
            alert(month);
        }
        else
        {
            
            $.ajax({
            url: "<?php echo base_url('attendance/staffSearch') ?>",
            type: 'POST',
            dataType: 'json',
            data: {
                'branch_drp': branch_drp,
                'month_drp': month_drp,
                <?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()
            },
            success: function(data) {
                alert(data);
            }
        });
        }
        
    }
</script> -->

<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<!-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script> -->


