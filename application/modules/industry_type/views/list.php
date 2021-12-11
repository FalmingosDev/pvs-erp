<?PHP 
//print_r($list); exit;
?>
<section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1>Industry Type</h1>
                        </div>
                        <div class="col-md-4">&nbsp;</div>
                        <div class="col-md-1">
                            <div class="add-btn-div">
                                <a href="<?php echo base_url('industry_type/add_industry_page');  ?>" class="cr-a">Add</a>  
                            </div>
                        </div>
                    </div>
                    <div class="wrapper-box">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Industry Type Name</th>
                                        <th>Industry Type Short Name</th>
                
                                       

                                        <th>Edit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?PHP
									foreach($list as $industry){								
								?>
                                    <tr class="gradeX">
                                        <td style="text-align: center;"><?PHP echo $industry->industry_type_name; ?></td>
                                        <td style="text-align: center;"><?PHP echo $industry->industry_type_short_name; ?></td>
                                    
										<td style="text-align: center;"><i class="icon-edit"></i><a href="<?php echo base_url('industry_type/edit_industry_page/'.$industry->industry_type_id); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
										<?PHP
										if($industry->active_status==true){
										?>
											<!-- <td><a href="<?php echo base_url('industry_type/change_status/'.$industry->industry_type_id.'/'.$industry->active_status); ?>" class="btn btn-danger">Deactivate</a></td>  -->
                                            <td style="text-align: center;">
    		                                    Active <label class="switch" title="Mark as Inactive"> 
                                                <input type="checkbox" checked="checked" onclick="if(confirm('Are you sure want to change the status?'))
                                                { window.location.assign('<?php echo base_url('industry_type/change_status/'.$industry->industry_type_id.'/'.$industry->active_status); ?>'); } 
                                                else{ return false; }"> <span class="switch-slider round"></span> </label>
            	                            </td>

										<?PHP
										}
										else{
										?>
											<!-- <td><a href="<?php echo base_url('industry_type/change_status/'.$industry->industry_type_id.'/'.$industry->active_status); ?>" class="btn btn-success">Activate</a></td>  -->
                                             
                                            <td style="text-align: center;">
				                                Inactive 
				                                <label class="switch" title="Mark as Active"> 
                                                <input type="checkbox" onclick="if(confirm('Are you sure want to change the status?'))
                                                { window.location.assign('<?php echo base_url('industry_type/change_status/'.$industry->industry_type_id.'/'.$industry->active_status); ?>'); }
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