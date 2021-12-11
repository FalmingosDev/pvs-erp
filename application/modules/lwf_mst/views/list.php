<?PHP 
//print_r($list); exit;
?>
      <section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-client" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1 style="text-align: center;">LWF List</h1>
                        </div>                                                                                                                                                                                                                                
                        <div class="col-md-3"></div>
                        <div class="col-md-2">
                            <div class="add-btn-div">
                                <a href="<?php echo base_url('lwf_mst/add'); ?>" class="cr-a">Add</a>  
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                    <div class="col-md-12">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
									<tr>
                                        <th>State Name</th>
										<th>Period</th>
                                        <th>Deduction Month</th>
                                        <th>Employee Contribution </th>
                                        <th>Employer Contribution </th>
                                        <th>Edit</th>
                                    </tr>
                                </thead> 
                                <tbody>
								<?PHP
									foreach($list as $list){								
								?>
								    <tr>
                                        <td style="text-align: center;"><?PHP echo $list->state_name; ?></td>
										<td style="text-align: center;"><?PHP echo $list->period; ?></td>										
                                        <td style="text-align: center;"><?PHP echo $list->date_y; ?> -- <?PHP echo $list->date_h; ?></td>
                                        
                                        <td style="text-align: right;"><?PHP echo $list->employee_contribution; ?></td>
                                        <td style="text-align: right;"><?PHP echo $list->employer_contribution; ?></td>
                                        <td style="text-align: center;"><i class="icon-edit"></i><a href="<?php echo base_url('lwf_mst/edit/'.$list->lwf_id); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
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
                        </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
</div> 
</section>
