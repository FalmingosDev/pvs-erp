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
                            <h1 style="text-align: left;">User Role Allocation List</h1>
                        </div>
                        <div class="col-md-5">
                            <div class="add-btn-div">
                                <a href="<?php echo base_url('user_role/add'); ?>" class="ad-btn-a-tag">Allocate</a>  
                            </div>
                        </div>
                    </div>
                    
                    <div class="wrapper-box">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
									<tr>
                                        <th>Role Name</th>
                                        <th>User Name</th>
                                        <th>Designation</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?PHP
									foreach($list as $list){								
								?>
								    <tr>
                                        <td><?PHP echo $list->role_name; ?></td>
                                        <td><?PHP echo $list->user_name; ?></td>
                                        <td><?PHP echo $list->desig_name; ?></td>
										<td style="text-align: center;"><i class="icon-edit"></i><a href="<?php echo base_url('user_role/delete/'.$list->user_role_map_id); ?>"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
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
