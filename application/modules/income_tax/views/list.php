<?PHP 
//print_r($list); exit;
?>
      <section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1>Income Tax Slab</h1>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-1">
                            <div class="add-btn-div">
                                <a href="<?php echo base_url('income_tax/add'); ?>" class="cr-a">Add</a>  
                            </div>
                        </div>
                    </div>
                    <div class="wrapper-box">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
									<tr>
                                        <th>Financial Year</th>
                                        <th>Salary From</th>
                                        <th>Salary To</th>
                                        <th>Citizen Type</th>
                                        <th>Tax Percentage </th>
                                        <th>Edit </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?PHP
									foreach($list as $income_tax){								
								?>
                                    <tr class="gradeX">
                                        <td><?PHP echo $income_tax->fy_name; ?></td>
                                        <td><?PHP echo $income_tax->salary_from; ?></td>
                                        <td><?PHP echo $income_tax->salary_to; ?></td>
                                       
                                        <td><?PHP echo $income_tax->citizen_type; ?></td>
                                        <td><?PHP echo $income_tax->tax_percentage; ?></td>
                                        <td style="text-align: center;"><i class="icon-edit"></i><a href="<?php echo base_url('income_tax/edit/'.$income_tax->income_tax_id); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
										
										<?PHP
										if($income_tax->active_status==true){
										?>
											<!-- <td><a href="<?php echo base_url('income_tax/change_status/'.$income_tax->income_tax_id.'/'.$income_tax->active_status); ?>" class="btn btn-danger">Deactivate</a></td> -->
                                            <td style="text-align: center;">
    		                                    Active <label class="switch" title="Mark as Inactive"> 
                                                <input type="checkbox" checked="checked" onclick="if(confirm('Are you sure want to change the status?'))
                                                { window.location.assign('<?php echo base_url('income_tax/change_status/'.$income_tax->income_tax_id.'/'.$income_tax->active_status); ?>'); } 
                                                else{ return false; }"> <span class="switch-slider round"></span> </label>
            	                            </td>
										<?PHP
										}
										else{
										?>
											<!-- <td><a href="<?php echo base_url('income_tax/change_status/'.$income_tax->income_tax_id.'/'.$income_tax->active_status); ?>" class="btn btn-success">Activate</a></td>   -->
                                            
                                            <td style="text-align: center;">
				                                Inactive
				                                <label class="switch" title="Mark as Active"> 
                                                <input type="checkbox" onclick="if(confirm('Are you sure want to change the status?'))
                                                { window.location.assign('<?php echo base_url('income_tax/change_status/'.$income_tax->income_tax_id.'/'.$income_tax->active_status); ?>'); }
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
