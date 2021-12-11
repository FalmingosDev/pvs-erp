<?PHP 
//print_r($list); exit;
?>
<section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1>Salary Head</h1>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-1">
                            <div class="add-btn-div">
                                <a href="<?php echo base_url('salary_head/add_salary_head'); ?>" class="cr-a">Add</a>  
                            </div>
                        </div>
                    </div>
                    <div class="wrapper-box">
                        <table id="salary_table" class="table table-striped table-bordered" style="width:100%">
                            <thead>
									<tr>
                                        <th>Head Name</th>
                                        <th>Head Short Name</th>
                                        <th>Head Type</th>
                                        <th>Tally Head Type</th>
                                        <th>Min Prcntg</th>
                                        <th>Max Prcntg</th>
                                        <th>Edit</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?PHP
									foreach($list as $s_hade){								
								?>
                                    <tr class="gradeX">
                                        <td><?PHP echo $s_hade->head_name; ?></td>
                                        <td><?PHP echo $s_hade->head_short_name; ?></td>
                                        <td><?PHP echo $s_hade->head_type; ?></td>
                                        <td><?PHP echo $s_hade->tally_head_name; ?></td>
                                        <td><?PHP echo $s_hade->min_prcntg; ?></td>
                                        <td><?PHP echo $s_hade->max_prcntg; ?></td>
										<td style="text-align: center;"><i class="icon-edit"></i><a href="<?php echo base_url('salary_head/edit_salary_head/'.$s_hade->head_id); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
										<?PHP
										if($s_hade->active_status==true){
										?>
											 <!-- <td><a href="<?php echo base_url('salary_head/change_status/'.$s_hade->head_id.'/'.$s_hade->active_status); ?>" class="btn btn-danger">Deactivate</a></td> -->
                                             <td style="text-align: center;">
    		                                    Active <label class="switch" title="Mark as Inactive"> 
                                                <input type="checkbox" checked="checked" onclick="if(confirm('Are you sure want to change the status?'))
                                                { window.location.assign('<?php echo base_url('salary_head/change_status/'.$s_hade->head_id.'/'.$s_hade->active_status); ?>'); } 
                                                else{ return false; }"> <span class="switch-slider round"></span> </label>
            	                            </td> 

										<?PHP
										}
										else{
										?>
											<!-- <td><a href="<?php echo base_url('salary_head/change_status/'.$s_hade->head_id.'/'.$s_hade->active_status); ?>" class="btn btn-success">Activate</a></td>  -->
                                             
                                            <td style="text-align: center;">
				                            Inactive 
				                            <label class="switch" title="Mark as Active"> 
                                            <input type="checkbox" onclick="if(confirm('Are you sure want to change the status?'))
                                            { window.location.assign('<?php echo base_url('salary_head/change_status/'.$s_hade->head_id.'/'.$s_hade->active_status); ?>'); }
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

       <script type="text/javascript">
          
          $(document).ready(function(){
            $('#salary_table').DataTable({
                order: [[ 2, 'desc' ]],
            });
          });

      </script>