      <section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1>Designation</h1>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-1">
                            <div class="add-btn-div">
                                <a href="<?php echo base_url('designation/addDesignation'); ?>" class="cr-a">Add</a>  
                            </div>
                        </div>
                    </div>
                    <div class="wrapper-box">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Serial No.</th>
                                    <th>Designation Name</th>
                                    <th>Designation Short Name</th>
                                    <th>Rank</th>
                                    <th>Edit</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                       $a = 1;
                                       foreach($designation as $desiglist) {  
                                    ?>
                                    <tr class="gradeX">
                                        <td style="text-align: center;"><?php echo $a; ?></td>
                                        <td style="text-align: center;"><?php echo $desiglist['desig_name']; ?></td>
                                        <td style="text-align: center;"><?php echo $desiglist['desig_short_name']; ?></td>
                                        <td style="text-align: center;"><?php echo $desiglist['rank']; ?></td>
                                       <td style="text-align: center;"><i class="icon-edit"></i><a class="edit-tag-icon" href="<?php echo base_url('designation/editdesignation/'.$desiglist['desig_id']); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                        <?php
                                            if($desiglist['active_status']==0){
                                            ?>
                                                <!-- <td style="text-align: center;"><a href="<?php echo base_url('designation/status/'.$desiglist['desig_id'].'/'.$desiglist['active_status']); ?>" class="btn btn-success">Activate</a></td> -->
												<td style="text-align: center;">
													Inactive
													<label class="switch" title="Mark as Active"> <input type="checkbox" onclick="if(confirm('Are you sure want to change the status?')){ window.location.assign('<?php echo base_url('designation/status/'.$desiglist['desig_id'].'/'.$desiglist['active_status']); ?>'); } else{ return false; }"> <span class="switch-slider round"></span> </label>
												</td>  
                                            <?php
                                            }
                                            else{
                                            ?>
                                                <!-- <td style="text-align: center;"><a href="<?php echo base_url('designation/status/'.$desiglist['desig_id'].'/'.$desiglist['active_status']); ?>" class="btn btn-danger">Deactivate</a></td> -->
												
                                                 
                                                <td style="text-align: center;">
													Active
													<label class="switch" title="Mark as Inactive"> <input type="checkbox" checked="checked" onclick="if(confirm('Are you sure want to change the status?')){ window.location.assign('<?php echo base_url('designation/status/'.$desiglist['desig_id'].'/'.$desiglist['active_status']); ?>'); } else{ return false; }"> <span class="switch-slider round"></span> </label>
												</td>
                                            <?php
                                            }
                                            ?>
                                    </tr>

                                    <?php
                                    $a++;
                                        }                           
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
          </div>
      </section>

     <!-- -->