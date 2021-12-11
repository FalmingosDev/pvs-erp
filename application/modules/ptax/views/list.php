<?PHP 
//print_r($list); exit;
?>
      <section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1>Profession Tax</h1>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-1">
                            <div class="add-btn-div">
                                <a href="<?php echo base_url('ptax/add_ptax'); ?>" class="cr-a">Add</a>  
                            </div>
                        </div>
                    </div>
					<!--<div class="row">
						<div class="col-md-5">
							<div class="form-group row">
								<label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Select State :</label>
								<div class="col-sm-9" onchange="details_list()">
									<?php 
										$attributes = array('class' => 'form-control form-control-sm', 'id' => 'state_id');
										$selected = (set_value('state_id')) ? set_value('state_id') : '';
										echo form_dropdown('state_id', $state, $selected, $attributes);
									?>
								</div>
								<?php echo form_error('state_id', '<span class="help-inline">', '</span>'); ?>
							</div>
						</div>
                     </div>-->
                    <div class="wrapper-box">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
									<tr>
                                        <th>State Name</th>
                                        <th>Salary From</th>
                                        <th>Salary To</th>
                                        <th>Effective State Date</th>
                                        <th>Tax Amount </th>
                                        <th>Edit </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?PHP
									foreach($list as $ptax){								
								?>
                                    <tr class="gradeX">
                                        <td><?PHP echo $ptax->state_name; ?></td>
                                        <td><?PHP echo $ptax->salary_from; ?></td>
                                        <td><?PHP echo $ptax->salary_to; ?></td>
                                        <td><?PHP echo date("d/m/Y", strtotime($ptax->eff_start_date)); ?></td>
                                        <td><?PHP echo $ptax->tax_amount; ?></td>
                                        <td style="text-align: center;"><i class="icon-edit"></i><a href="<?php echo base_url('ptax/edit_ptax/'.$ptax->ptax_id); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
										
										<?PHP
										if($ptax->active_status==true){
										?>
											<!-- <td><a href="<?php echo base_url('ptax/change_status/'.$ptax->ptax_id.'/'.$ptax->active_status); ?>" class="btn btn-danger">Deactivate</a></td> -->
                                            <td style="text-align: center;">
    		                                    Active <label class="switch" title="Mark as Inactive"> 
                                                <input type="checkbox" checked="checked" onclick="if(confirm('Are you sure want to change the status?'))
                                                { window.location.assign('<?php echo base_url('ptax/change_status/'.$ptax->ptax_id.'/'.$ptax->active_status); ?>'); } 
                                                else{ return false; }"> <span class="switch-slider round"></span> </label>
            	                            </td>
										<?PHP
										}
										else{
										?>
											<!-- <td><a href="<?php echo base_url('ptax/change_status/'.$ptax->ptax_id.'/'.$ptax->active_status); ?>" class="btn btn-success">Activate</a></td>   -->
                                            
                                            <td style="text-align: center;">
				                                Inactive
				                                <label class="switch" title="Mark as Active"> 
                                                <input type="checkbox" onclick="if(confirm('Are you sure want to change the status?'))
                                                { window.location.assign('<?php echo base_url('ptax/change_status/'.$ptax->ptax_id.'/'.$ptax->active_status); ?>'); }
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
