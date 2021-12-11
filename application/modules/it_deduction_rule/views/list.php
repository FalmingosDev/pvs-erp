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
                            <h1 style="text-align: center;">IT Deduction Rule</h1>
                        </div>                                                                                                                                                                                                                                
                        <div class="col-md-3"></div>
                        <div class="col-md-2">
                            <div class="add-btn-div">
                                <a href="<?php echo base_url('it_deduction_rule/add'); ?>" class="cr-a">Add New Rule</a>  
                            </div>
                        </div>
                    </div>
                    <?php echo form_open('', array( 'id' => 'search_form', 'method' => 'GET' ) ); ?>
                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Financial Year : </label>
                                                <div class="col-sm-9">
                                                    <?php 
                                                    $attributes = array('class' => 'form-control form-control-sm', 'id' => 'financial_year_id');
                                                        $selected = ($financial_year_id) ? $financial_year_id : '';
                                                        echo form_dropdown('financial_year_id', $financial_year, $selected, $attributes);
                                                    ?>
                                                </div>
                                                    <?php echo form_error('financial_year_id', '<span class="help-inline">', '</span>'); ?>
                                                        </div>
                                                    </div>
                            <div class="col-md-2">                                             
                                <button type="submit" class="cr-a">Search</button>
                            </div>
                        </div>
                    
                    </form>
                    <div class="row">
                    <div class="col-md-12">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
									<tr>
                                        <th>Financial Year</th>
                                        <th>Section</th>
                                        <th>Description</th>
                                        <th>Calculation Type</th>
                                        <th>Max Limit</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?PHP
									foreach($list as $list){								
								?>
								    <tr>
                                        <td style="text-align: center;"><?PHP echo $list->fy_name; ?></td>
                                        <td style="text-align: center;"><?PHP echo $list->section; ?></td>
                                        <td style="text-align: center;"><?PHP echo $list->criteria; ?></td>
                                        <td style="text-align: center;"><?PHP echo $list->calculation_type; ?></td>
                                        <td style="text-align: center;"><?PHP echo $list->max_limit; ?></td>
                                        <td style="text-align: center;"><i class="icon-edit"></i><a href="<?php echo base_url('it_deduction_rule/edit/'.$list->it_deduction_id); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
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
