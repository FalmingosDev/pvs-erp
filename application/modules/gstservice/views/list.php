<?PHP 
//print_r('hhhh'); exit;
?>
<section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1>GST Service List</h1>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-1">
                            <div class="add-btn-div">
                                <a href="<?php echo base_url('gstservice/add_gstser'); ?>" class="cr-a">Add</a>  
                            </div>
                        </div>
                    </div>
                    <div class="wrapper-box">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                    <tr>
                                        <th>GST Service Name</th>
                                        <th>Edit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?PHP
									foreach($list as $gstser){								
								?>
                                    <tr class="gradeX">
                                        <td><?PHP echo $gstser->gst_service_category_name; ?></td>
										<td style="text-align: center;"><i class="icon-edit"></i><a href="<?php echo base_url('gstservice/edit_gstser/'.$gstser->gst_service_category_id); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
										<?PHP
										if($gstser->active_status==true){
										?>
											 <!-- <td style="text-align: center;"><a href="<?php echo base_url('gstservice/change_status/'.$gstser->gst_service_category_id.'/'.$gstser->active_status); ?>" class="btn btn-danger" >Deactivate</a></td> -->
                                             <td style="text-align: center;">
    		                                    Active <label class="switch" title="Mark as Inactive"> 
                                                <input type="checkbox" checked="checked" onclick="if(confirm('Are you sure want to change the status?'))
                                                { window.location.assign('<?php echo base_url('gstservice/change_status/'.$gstser->gst_service_category_id.'/'.$gstser->active_status); ?>'); } 
                                                else{ return false; }"> <span class="switch-slider round"></span> </label>
            	                            </td>
										<?PHP
										}
										else{
										?>
											<!-- <td style="text-align: center;"><a href="<?php echo base_url('gstservice/change_status/'.$gstser->gst_service_category_id.'/'.$gstser->active_status); ?>" class="btn btn-success">Activate</a></td>  -->
                                            
                                            <td style="text-align: center;">
				                                Inactive
				                                    <label class="switch" title="Mark as Active"> 
                                                    <input type="checkbox" onclick="if(confirm('Are you sure want to change the status?'))
                                                    { window.location.assign('<?php echo base_url('gstservice/change_status/'.$gstser->gst_service_category_id.'/'.$gstser->active_status); ?>'); }
                                                    else{ return false; }"> <span class="switch-slider round"></span> </label>
				                            </td>  

										<?PHP
										}
										?>
                                        
                                    </tr>
									
									<?PHP 									
									}																		
									?>
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                </div>
            </div>
          </div>
      </section>