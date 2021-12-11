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
                            <h1 style="text-align: left;">Resource Allocation Client</h1>
                        </div>
                        <div class="col-md-5">
                            <div class="add-btn-div">
                                <a href="<?php echo base_url('resource_allocation/add'); ?>" class="ad-btn-a-tag">Allocate</a>  
                            </div>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="col-md-6">
                             <div class="form-group row">
                                 <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Client Name :    </label>
                                    <div class="col-sm-9">
                                        <select class="form-control form-control-sm">
                                            <option>Client Name1</option>
                                            <option>Client Name2</option>  
                                        </select>
                                    </div>
                                </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <button class="cr-a" style="padding: 6px 0px;">Search</button>
                                </div>
                            </div>
                        </div>
                    </div> --> 
                    <div class="wrapper-box">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
									<tr>
                                        <th>Client Name</th>
                                        <th>Branch Name</th>
                                        <th>Resource Name</th>
                                        <th>Designation</th>
                                        <th>Effective Start Date</th>
                                        <th>Effective End Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?PHP
									foreach($list as $list){								
								?>
								    <tr>
                                        <td><?PHP echo $list->client_name; ?></td>
                                        <td><?PHP echo $list->branch_name; ?></td>
                                        <td><?PHP echo $list->emp_name; ?></td>
                                        <td><?PHP echo $list->desig_name; ?></td>
                                        <td><?PHP echo date("d/m/Y", strtotime( $list->effective_start_date)); ?></td>
                                        <td><?PHP if(($list->effective_end_date)!= '1900-01-01') {echo date("d/m/Y", strtotime( $list->effective_end_date));} ?></td>
										<td style="text-align: center;"><i class="icon-edit"></i><a href="<?php echo base_url('resource_allocation/edit/'.$list->resource_allocation_id); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
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
      </section>
