<?PHP 
//print_r($list); exit;
?>
      <section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <?php if($this->session->flashdata('success')): ?>
                        <div class="alert btn-success alert-dismissible fade show" role="alert" id="show_msg">
                                <strong><?php echo $this->session->flashdata('success'); ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        
                    <?php endif; ?>
                    <?php if($this->session->flashdata('error')): ?>
                        <div class="alert btn-danger alert-dismissible fade show" role="alert" id="show_msg">
                                <strong><?php echo $this->session->flashdata('error'); ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        
                    <?php endif; ?> 
                    <div class="row">
                        <div class="col-md-7">
                            <h1>ESI Organisation</h1>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-1">
                            <div class="add-btn-div">
                                <a href="<?php echo base_url('esi_organisation/add_esi'); ?>" class="cr-a">Add</a>  
                            </div>
                        </div>
                    </div>
                    <div class="wrapper-box">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
									<tr>
                                        <th>ESI Organisation Name</th>
                                        <th>ESI Number</th>
                                        <th>Edit </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?PHP
									foreach($list as $list){								
								?>
                                    <tr class="gradeX">
                                        <td><?PHP echo $list->organisation_name; ?></td>
                                        <td><?PHP echo $list->esi_no; ?></td>
                                        <td style="text-align: center;"><i class="icon-edit"></i><a href="<?php echo base_url('esi_organisation/edit_esi/'.$list->esi_organisation_id); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
										
										<?PHP
										if($list->active_status==true){
										?>
											<!-- <td><a href="<?php echo base_url('esi_organisation/change_status/'.$list->esi_organisation_id.'/'.$list->active_status); ?>" class="btn btn-danger">Deactivate</a></td>  -->
                                            <td style="text-align: center;">
    		                                    Active <label class="switch" title="Mark as Inactive"> 
                                                <input type="checkbox" checked="checked" onclick="if(confirm('Are you sure want to change the status?'))
                                                { window.location.assign('<?php echo base_url('esi_organisation/change_status/'.$list->esi_organisation_id.'/'.$list->active_status); ?>'); } 
                                                else{ return false; }"> <span class="switch-slider round"></span> </label>
            	                            </td>

										<?PHP
										}
										else{
										?>
											<!-- <td><a href="<?php echo base_url('esi_organisation/change_status/'.$list->esi_organisation_id.'/'.$list->active_status); ?>" class="btn btn-success">Activate</a></td>  -->
                                            
                                            <td style="text-align: center;">
				                                Inactive  
				                                <label class="switch" title="Mark as Active"> 
                                                <input type="checkbox" onclick="if(confirm('Are you sure want to change the status?'))
                                                { window.location.assign('<?php echo base_url('esi_organisation/change_status/'.$list->esi_organisation_id.'/'.$list->active_status); ?>'); }
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
