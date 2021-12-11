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
                    <div class="row">
                        <div class="col-md-7">
                            <h1>Tally Billing</h1>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-1">
                            <div class="add-btn-div">
                                <a href="<?php echo base_url('tally_billing/add'); ?>" class="cr-a">Add</a>  
                            </div>
                        </div>
                    </div>
                    <div class="wrapper-box">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
									<tr>
                                        <th>Client Name</th>
                                        <th>Branch Name</th>
                                        <th>Customer Ledger Code</th>
                                        <th>IGST Code</th>
                                        <th>Cost Category</th>
                                        <th>Cost Center</th>
                                        <th>Sales Head Code </th>
                                        <th>Round Of </th>
                                        <th>CGST Code</th>
                                        <th>SGST Code</th>
                                        <th>UGST Code</th>
                                        <th>Add Tax Code</th>
                                        <th>Edit </th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?PHP
									foreach($list as $list_row){								
								?>
                                    <tr class="gradeX">
                                        <td><?=$list_row->client_name?></td>
                                        <td><?=$list_row->branch_name?></td>
                                        <td><?=$list_row->customer_ledger_code?></td>
                                        <td><?=$list_row->igst_code?></td>
                                        <td><?=$list_row->cost_category?></td>
                                        <td><?=$list_row->cast_center?></td>
                                        <td><?=$list_row->sales_head_code?></td>
                                        <td><?=$list_row->round_off?></td>
                                        <td><?=$list_row->cgst_code?></td>
                                        <td><?=$list_row->sgst_code?></td>
                                        <td><?=$list_row->utgst_code?></td>
                                        <td><?=$list_row->add_tax_code?></td>
                                        <td style="text-align: center;"><i class="icon-edit"></i><a href="<?php echo base_url('tally_billing/edit/'.$list_row->billing_tally_id); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
										<?PHP
										if($list_row->active_status==true){
										?>
											
                                            <td style="text-align: center;">
    		                                    Active <label class="switch" title="Mark as Inactive"> 
                                                <input type="checkbox" checked="checked" onclick="if(confirm('Are you sure want to change the status?'))
                                                { window.location.assign('<?php echo base_url('tally_billing/change_status/'.$list_row->billing_tally_id.'/'.$list_row->active_status); ?>'); } 
                                                else{ return false; }"> <span class="switch-slider round"></span> </label>
            	                            </td>

										<?PHP
										}
										else
                                        {
										?>
				
                                            
                                            <td style="text-align: center;">
				                                Inactive  
				                                <label class="switch" title="Mark as Active"> 
                                                <input type="checkbox" onclick="if(confirm('Are you sure want to change the status?'))
                                                { window.location.assign('<?php echo base_url('tally_billing/change_status/'.$list_row->billing_tally_id.'/'.$list_row->active_status); ?>'); }
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
