    
      <section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1>Rating</h1>
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-2">
                            <div class="add-btn-div">
                                <a href="<?php echo base_url('rating/addRating'); ?>" class="cr-a">Add Rating</a>  
                            </div>
                        </div>
                    </div>
                    <div class="wrapper-box">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                     <th>Serial No.</th>
                                     <th>Rating Short Name</th>
                                     <th>Description</th>
                                     <th>Edit</th>
                                     <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                       $a = 1;
                                       foreach($rating_list as $rlist) {  
                                    ?>
                                    <tr class="gradeX">
                                        <td style="text-align: center;"><?php echo $a; ?></td>
                                        <td style="text-align: center;"><?php echo $rlist['rating_short_name']; ?></td>
                                        <td style="text-align: center;"><?php echo $rlist['rating_desc']; ?></td>
                                        <td style="text-align: center;"><i class="icon-edit"></i><a class="edit-tag-icon" href="<?php echo base_url('rating/editRating/'.$rlist['rating_id']); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
                                        <?php
                                            if($rlist['active_status']==0){
                                            ?>
                                                <!-- <td style="text-align: center;"><a href="<?php echo base_url('rating/status/'.$rlist['rating_id'].'/'.$rlist['active_status']); ?>" class="btn btn-success">Activate</a></td>  -->
                                                <td style="text-align: center;">
				                                    Inactive 
				                                    <label class="switch" title="Mark as Active"> 
                                                     <input type="checkbox" onclick="if(confirm('Are you sure want to change the status?'))
                                                    { window.location.assign('<?php echo base_url('rating/status/'.$rlist['rating_id'].'/'.$rlist['active_status']); ?>'); }
                                                    else{ return false; }"> <span class="switch-slider round"></span> </label>
				                                </td> 
                                            <?php
                                            }
                                            else{
                                            ?>
                                                <!-- <td style="text-align: center;"><a href="<?php echo base_url('rating/status/'.$rlist['rating_id'].'/'.$rlist['active_status']); ?>" class="btn btn-danger">Deactivate</a></td>  -->
                                                <td style="text-align: center;">
    		                                        Active <label class="switch" title="Mark as Inactive"> 
                                                    <input type="checkbox" checked="checked" onclick="if(confirm('Are you sure want to change the status?'))
                                                    { window.location.assign('<?php echo base_url('rating/status/'.$rlist['rating_id'].'/'.$rlist['active_status']); ?>'); } 
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