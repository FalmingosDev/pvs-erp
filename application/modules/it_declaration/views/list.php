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
                            <h1 style="text-align: center;">It Declaration List</h1>
                        </div>                                                                                                                                                                                                                                
                        <div class="col-md-3"></div>
                        <div class="col-md-2">
                            <div class="add-btn-div">
                                <a href="<?php echo base_url('it_declaration/add'); ?>" class="cr-a">Add It Declaration</a>  
                            </div>
                        </div>
                    </div>
                    
                  
                    
                    </form>
                    <div class="row">
                    <div class="col-md-12">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
									<tr>
                                        <th>Serial Number</th>
                                        <th>Financial Year</th>
                                        <th>Employee</th>
                                        <th>It Deduction Section</th>
                                        <th>It Deduction Rule Details </th>
                                        <th>Reference</th>
                                        <th>Amount</th>
                                        <th>Edit</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php 
                                       $a = 1;
                                       foreach($list as $declarationlist) { 
                                        //foreach($financial_year as $financial_years) 
                                        //print_r($financial_year);
                                    ?>
                                    <tr class="gradeX">
                                        <td style="text-align: center;"><?php  echo $a;  ?></td>
                                        <td style="text-align: center;"><?php echo $declarationlist->fy_name; ?></td>
                                        <td style="text-align: center;"><?php echo $declarationlist->employee_name; ?></td>
                                        <td style="text-align: center;"><?php echo $declarationlist->section; ?></td>
                                        <td style="text-align: center;"><?php echo $declarationlist->sub_head_name; ?></td>
                                        <td style="text-align: center;"><?php echo $declarationlist->reference; ?></td>
                                        <td style="text-align: center;"><?php echo $declarationlist->amount; ?></td>
                                         <td style="text-align: center;"><a href="<?php echo base_url('it_declaration/edit/'.$declarationlist->employee_it_declaration_id); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td></td>


                                         <td style="text-align: center;">
                                            <?php if($declarationlist->active_status == 1){    ?>
                                           <a href="<?php echo base_url('it_declaration/change_status/'.$declarationlist->employee_it_declaration_id.'/'.$declarationlist->active_status); ?>"> Active</a> 
                                       <?php }else{ ?>
                                         <a href="<?php echo base_url('it_declaration/change_status/'.$declarationlist->employee_it_declaration_id.'/'.$declarationlist->active_status); ?>"> Deactive</a> 
                                     <?php } ?>
                                            </td>
                                       

                                    


                                    <?php  $a=$a+1; }  ?> 
                                     </tr>
								
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
