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
                            <h1 style="text-align: center;">Holiday List</h1>
                        </div>                                                                                                                                                                                                                                
                        <div class="col-md-3"></div>
                        <div class="col-md-2">
                            <div class="add-btn-div">
                                <a href="<?php echo base_url('holiday/add'); ?>" class="cr-a">Add Holiday</a>  
                            </div>
                        </div>
                    </div>
                    <?php echo form_open('', array( 'id' => 'search_form', 'method' => 'GET' ) ); ?>
                    <div class="row">
                        <div class="col-md-3">
                             <div class="form-group row">
                                 <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Year :    </label>
                                    <div class="col-sm-9">
                                        <select name="year" class="form-control form-control-sm">
                                        <option value="">Select Year</option>
                                        <?php 
                                            $year_mx = (date('Y') + 1);
                                            for($y = 2021; $y <= $year_mx; $y++){ 
                                        ?>
                                            <option value="<?php echo $y; ?>"<?php echo ($y == $year) ? ' selected="selected"' : ''; ?>><?php echo $y; ?></option>
                                        <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                                
                                <div class="col-md-3">
                             <div class="form-group row">
                                 <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">State: </label>
                                    <div class="col-sm-9">
                                        <?php 
										   $attributes = array('class' => 'form-control form-control-sm', 'id' => 'state_id');
										    $selected = ($state_id) ? $state_id : '';
											echo form_dropdown('state_id', $state, $selected, $attributes);
									    ?>
                                    </div>
								    	<?php echo form_error('state_id', '<span class="help-inline">', '</span>'); ?>
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
                                        <th>Year</th>
                                        <th>State</th>
                                        <th>Event Date</th>
                                        <th>Event Name</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?PHP
									foreach($list as $list){								
								?>
								    <tr>
                                        <td style="text-align: center;"><?PHP echo $list->year; ?></td>
                                        <td style="text-align: center;"><?PHP echo $list->state_name; ?></td>
                                        <td style="text-align: center;"><?PHP echo date("d/m/Y", strtotime( $list->event_date)); ?></td>
                                        <td style="text-align: center;"><?PHP echo $list->event_name; ?></td>
                                        <td style="text-align: center;"><i class="icon-edit"></i><a href="<?php echo base_url('holiday/edit/'.$list->holiday_id); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
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
