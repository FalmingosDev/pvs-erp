<?PHP 
//print_r($list); exit;
?>
      <section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1>PVS Branch</h1>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-1">
                            <div class="add-btn-div">
                                <a href="<?php echo base_url('companybranch/add_cbranch'); ?>" class="cr-a">Add</a>  
                            </div>
                        </div>
                    </div>
                    <div class="wrapper-box">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
									<tr>
                                        <th>State Name</th>
                                        <th>City Name</th>
                                        <th>Branch Name</th>
                                        <th>Branch Short Name</th>
                                        <th>Address</th>
                                        <th>Edit </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?PHP
									foreach($list as $list){								
								?>
                                    <tr class="gradeX">
                                        <td><?PHP echo $list->state_name; ?></td>
                                        <td><?PHP echo $list->city_name; ?></td>
                                        <td><?PHP echo $list->branch_name; ?></td>
                                        <td><?PHP echo $list->branch_short_name; ?></td>
										<td><?PHP echo $list->address_1; ?></td>
                                        <td style="text-align: center;"><i class="icon-edit"></i><a href="<?php echo base_url('companybranch/edit_cbranch/'.$list->company_branch_id); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
										
										<?PHP
										if($list->active_status==true){
										?>
											 <!-- <td><a href="<?php echo base_url('companybranch/change_status/'.$list->company_branch_id.'/'.$list->active_status); ?>" class="btn btn-danger">Deactivate</a></td>  -->
                                             <td style="text-align: center;">
    		                                    Active <label class="switch" title="Mark as Inactive"> 
                                                <input type="checkbox" checked="checked" onclick="if(confirm('Are you sure want to change the status?'))
                                                { window.location.assign('<?php echo base_url('companybranch/change_status/'.$list->company_branch_id.'/'.$list->active_status); ?>'); } 
                                                else{ return false; }"> <span class="switch-slider round"></span> </label>
            	                            </td> 
										<?PHP
										}
										else{
										?>
											<!-- <td><a href="<?php echo base_url('companybranch/change_status/'.$list->company_branch_id.'/'.$list->active_status); ?>" class="btn btn-success">Activate</a></td> -->
                                            
                                            <td style="text-align: center;">
				                                Inactive 
				                                <label class="switch" title="Mark as Active"> 
                                                <input type="checkbox" onclick="if(confirm('Are you sure want to change the status?'))
                                                { window.location.assign('<?php echo base_url('companybranch/change_status/'.$list->company_branch_id.'/'.$list->active_status); ?>'); }
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
