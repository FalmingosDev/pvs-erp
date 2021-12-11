    
      <section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1>Mw List</h1>
                        </div>
                        <div class="col-md-5">
                            <div class="add-btn-div">
                                <a href="<?php echo base_url('mw_type/addMwType'); ?>" class="ad-btn-a-tag">Add MW</a>  
                            </div>
                        </div>
                    </div>
                    <div class="wrapper-box">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Serial No.</th>
                                    <th>Mw Type Name</th>
                                    <th>Mw Type Short Name</th>
                                    <th>Edit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                       $a = 1;
                                       foreach($mw_type_list as $mwlist) {   
                                    ?>
                                    <tr class="gradeX">
                                        <td style="text-align: center;"><?php echo $a; ?></td>
                                        <td style="text-align: center;"><?php echo $mwlist['mw_type_name']; ?></td>
                                        <td style="text-align: center;"><?php echo $mwlist['mw_type_short_name']; ?></td>
                                        <td style="text-align: center;"><i class="icon-edit"></i><a class="edit-tag-icon" href="<?php echo base_url('mw_type/editMwType/'.$mwlist['mw_type_id']); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                        <?php
                                            if($mwlist['active_status']==0){
                                            ?>
                                                <!-- <td style="text-align: center;"><a href="<?php echo base_url('mw_type/status/'.$mwlist['mw_type_id'].'/'.$mwlist['active_status']); ?>" class="btn btn-success">Activate</a></td>  -->
                                                <td style="text-align: center;">
				                                    Inactive <br />
				                                    <label class="switch" title="Mark as Active"> 
                                                    <input type="checkbox" onclick="if(confirm('Are you sure want to change the status?'))
                                                    { window.location.assign('<?php echo base_url('mw_type/status/'.$mwlist['mw_type_id'].'/'.$mwlist['active_status']); ?>'); }
                                                    else{ return false; }"> <span class="switch-slider round"></span> </label>
				                                </td> 
                                            <?php
                                            }
                                            else{
                                            ?>
                                                <!-- <td style="text-align: center;"><a href="<?php echo base_url('mw_type/status/'.$mwlist['mw_type_id'].'/'.$mwlist['active_status']); ?>" class="btn btn-danger">Deactivate</a></td>  -->
                                                <td style="text-align: center;">
    		                                        Active <br />	<label class="switch" title="Mark as Inactive"> 
                                                    <input type="checkbox" checked="checked" onclick="if(confirm('Are you sure want to change the status?'))
                                                    { window.location.assign('<?php echo base_url('mw_type/status/'.$mwlist['mw_type_id'].'/'.$mwlist['active_status']); ?>'); } 
                                                    else{ return false; }"> <span class="switch-slider round"></span> </label>
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