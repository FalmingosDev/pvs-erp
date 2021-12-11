<?PHP
//print_r($type->location_type);exit; 
//echo $client->client_id;exit;
$contact_count = 0;
?>

<section class="main-wrapper">
          <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <?php echo clientTabs(); ?>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-client" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                               
								<div class="row">
									<div class="col-md-11">
										<h1 style="text-align: left;">Edit Branch Details</h1>
									</div>
									<?PHP if($type->location_type == 'M'){ ?>
										<div class="col-md-1">
										<button class="cr-a"><a href="<?php echo base_url('branch/add/'.$client->client_id); ?>">Add</a></button>
										</div>
									<?PHP }	?>
									
									
								</div>
								
                                <div class="wrapper-box">
                                    <?php //echo validation_errors(); ?>
									
                                    <?php echo form_open( base_url( 'branch/edit/'.$client->client_id.'/'.$clientedit->branch_id ), array( 'id' => 'clientform', 'class' => 'form-horizontal form-hori-border' ) ); ?>
									<input type="hidden" name="client_id" value="<?php echo $client->client_id; ?>">
									<input type="hidden" name="branch_id" value="<?php echo $clientedit->branch_id; ?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Client Name</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" name="client_name" class="form-control form-control-sm" id="client_name" value="<?php echo $client->client_name; ?>" >
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Branch Name<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-9">
                                                      <input type="text" maxlength="50" name="branch_name" class="form-control form-control-sm" id="" placeholder="Branch Name" value="<?php echo $clientedit->branch_name; ?>" readonly>
                                                    </div>
													<?php echo form_error('branch_name', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
											<div class="col-md-6">
                                            <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Branch Code<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-9">
                                                      <input type="text" readonly="" maxlength="50" name="branch_code" class="form-control form-control-sm" id="" placeholder="Branch Code" value="<?php echo $clientedit->branch_code; ?>">
                                                    </div>
													<?php echo form_error('branch_code', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
											</div>                                           
                                            <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Address Line 1<span class="span_star_clr"> *</span> </label>
                                                <div class="col-sm-9">
                                                    <input type="text" maxlength="255" name="address_line_1" class="form-control form-control-sm" id="" placeholder="Address Line 1" value="<?php echo $clientedit->address_1; ?>">
                                                </div>
                                                <?php echo form_error('address_line_1', '<span class="help-inline">', '</span>'); ?>
                                            </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Fax</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" maxlength="15" name="fax" class="form-control form-control-sm" id="" placeholder="Fax" value="<?php echo $clientedit->fax; ?>">
                                                    </div>
													<?php echo form_error('fax', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
											</div>
                                            <div class="col-md-6">
                                            <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Address Line 2</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" maxlength="255" class="form-control form-control-sm" id="" name="address_line_2" placeholder="Address Line 2" value="<?php echo $clientedit->address_2; ?>">
                                                    </div>
													<?php echo form_error('address_line_2', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Contact No<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-9">
                                                      <input type="number" maxlength="15" name="cont_no" class="form-control form-control-sm" id="" placeholder="Contact No" value="<?php echo $clientedit->contact_no; ?>">
                                                    </div>
													<?php echo form_error('cont_no', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
											</div>
                                            <div class="col-md-6">
                                            <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Address Line 3</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" maxlength="255" name="address_line_3" class="form-control form-control-sm" id="" placeholder="Address Line 3" value="<?php echo $clientedit->address_3; ?>">
                                                    </div>
													<?php echo form_error('address_line_3', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Email<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-9">
                                                        <input type="email" maxlength="255" class="form-control form-control-sm" id="" name="client_email" placeholder="Email" value="<?php echo $clientedit->email; ?>">
                                                        
                                                    </div>
													<?php echo form_error('client_email', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div> 
                                            <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">State<span class="span_star_clr"> *</span> </label>
                                                <div class="col-sm-9">
                                                    <?php 
                                                        $attributes = array('class' => 'form-control form-control-sm', 'id' => 'state_id');
                                                        $selected = (set_value('state_id')) ? set_value('state_id') : $clientedit->state_id;
                                                        //print_r($state);exit;
                                                        echo form_dropdown('state_id', $state, $selected, $attributes);
                                                    ?>
                                                </div>
                                                <?php echo form_error('state_id', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Sole Id</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" maxlength="20" class="form-control form-control-sm" id="" name="sole_id" placeholder="Sole Id" value="<?php echo $clientedit->sole_id; ?>">
                                                    </div>
													<?php echo form_error('sole_id', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">City<span class="span_star_clr"> *</span> </label>
                                                    <div class="col-sm-9">
                                                        <?php 
                                                            $attributes = array('class' => 'form-control form-control-sm', 'id' => 'city_id');
                                                            $selected = (set_value('city_id')) ? set_value('city_id') : $clientedit->city_id;
                                                            //print_r($city);exit;
                                                            echo form_dropdown('city_id', $city, $selected, $attributes);
                                                        ?>
                                                    </div>
                                                    <?php echo form_error('city_id', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <button type="button" onclick="refreshCity();"><i class="fa fa-refresh"></i></button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Pincode </label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control form-control-sm" id="" name="pincode" placeholder="Pincode" value="<?php echo $clientedit->pincode; ?>">
                                                </div>
                                                <?php echo form_error('pincode', '<span class="help-inline">', '</span>'); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Branch Category </label>
                                                <div class="col-sm-9">

                                                    <?php 
                                                        $attributes = array('class' => 'form-control form-control-sm', 'id' => 'branch_category_id');
                                                        $selected = (set_value('branch_category_id')) ? set_value('branch_category_id') : '';

                                                        $selected = (set_value('branch_category_id')) ? set_value('branch_category_id') : $clientedit->branch_category;
                                                        echo form_dropdown('branch_category_id', $branch_category, $selected, $attributes);
                                                    ?>
                                                    
                                                </div>
                                                <?php echo form_error('branch_category_id', '<span class="help-inline">', '</span>'); ?>
                                                    
                                                </div>
                                            </div>                                            
                                        </div>

                                        <div class="row">
                                        
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Approved By </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" maxlength="255" class="form-control form-control-sm" id="" name="app_by" placeholder="Approved By" value="<?php echo $clientedit->approved_by; ?>">
                                                    </div>
													<?php echo form_error('app_by', '<span class="help-inline">', '</span>'); ?>
                                                  </div>
                                            </div>                                            
                                        </div>
                                        
                                        <div class="row mt-2">
                                        	<h3 class="cl-h3">Edit Branch Contact Details</h3>
                                            <div class="col-md-10">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered">
                                                      <thead>
                                                        <tr>
                                                          <th scope="col">Name</th>
                                                          <th scope="col">Designation</th>
                                                          <th scope="col">Contact No</th>
                                                          <th scope="col">Email</th>
                                                            <th scope="col">Birthday</th>  
                                                          <th scope="col">Anniversary</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody id="tab_body">
                                                        <?php if(!empty($client_contact)){ ?>

                                                            <?php $i = 0; foreach($client_contact['name'] as $contact){ ?>
                                                        
                                                        <tr width="100%" class="add_more_contact" id="add_more_contact'<?php echo $i; ?>'" style="">
                                                            <td><input type="hidden" name="contact_id[]" id="contact_id<?php echo $i; ?>" value="<?php echo $client_contact['contact_id'][$i]; ?>"><input type="text" name="name[]" class="form-control form-control-sm" id="name<?php echo $i; ?>" value="<?php echo $contact; ?>"></td>
                                                            <td><input type="text" name="designation[]" class="form-control form-control-sm" id="designation<?php echo $i; ?>" value="<?php echo $client_contact['designation'][$i]; ?>"></td>
                                                            <td><input type="text" name="contact_no[]" class="form-control form-control-sm" id="contact_no<?php echo $i; ?>" value="<?php echo $client_contact['contact_no'][$i]; ?>"></td>
                                                            <td><input type="text" name="email[]" class="form-control form-control-sm" id="email<?php echo $i; ?>" value="<?php echo $client_contact['email'][$i]; ?>"></td>
                                                            <td><input type="text" name="birthday[]" class="form-control form-control-sm date-picker" id="birthday<?php echo $i; ?>" value="<?php echo $client_contact['birthday'][$i]; ?>"></td>
                                                            <td><input type="text" name="anniversary[]" class="form-control form-control-sm date-picker" id="anniversary<?php echo $i; ?>" value="<?php echo $client_contact['anniversary'][$i]; ?>"></td>

                                                            <?php $i++; 
                                                            $contact_count = $i; ?>

                                                            <?php } ?>
                                                        </tr>

                                                        <?php } else {?>
                                                        <?php $i = 0; foreach($edit_branch_contact as $contact){ ?>

                                                        <tr width="100%" class="add_more_contact" id="add_more_contact'<?php echo $i; ?>'" style="">
                                                            <td><input type="hidden" name="contact_id[]" id="contact_id<?php echo $i; ?>" value="<?php echo $contact['branch_contact_id']; ?>"><input type="text" name="name[]" class="form-control form-control-sm" id="name<?php echo $i; ?>" value="<?php echo $contact['name']; ?>"></td>
                                                            <td><input type="text" name="designation[]" class="form-control form-control-sm" id="designation<?php echo $i; ?>" value="<?php echo $contact['designation']; ?>"></td>
                                                            <td><input type="text" name="contact_no[]" class="form-control form-control-sm" id="contact_no<?php echo $i; ?>" value="<?php echo $contact['contact_no']; ?>"></td>
                                                            <td><input type="text" name="email[]" class="form-control form-control-sm" id="email<?php echo $i; ?>" value="<?php echo $contact['email']; ?>"></td>
                                                            <td><input type="text" name="birthday[]" class="form-control form-control-sm date-picker" id="birthday<?php echo $i; ?>" value="<?php if($contact['birth_date']) {echo date('m-d', strtotime($contact['birth_date'])); }?>"></td>
                                                            <td><input type="text" name="anniversary[]" class="form-control form-control-sm date-picker" id="anniversary<?php echo $i; ?>" value="<?php if($contact['anniversary_date']) {echo date('m-d', strtotime($contact['anniversary_date'])); }?>"></td>
                                                            
                                                        </tr>

                                                    <?php $i++; 
                                                    $contact_count = $i;

                                                } ?>

                                            <?php } ?>
                                                      </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="cr-a" id="add_more_btn">Add</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Remarks</label>
                                                    <div class="col-sm-9">
                                                        <textarea maxlength="255" class="form-control form-control-sm" name="remarks" id="remarks" value="<?php echo $clientedit->remarks; ?>"><?php echo $clientedit->remarks; ?></textarea>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp;</label>
                                                    <div class="col-sm-5">
                                                        <div class="form-actions">
                                                            <button type="submit" class="cr-a save_btn">Save</button>
                                                        </div>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                    </form>
									
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                      Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                    </div>
                    <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                      Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                    </div>
                    <div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                      Et et consectetur ipsum labore excepteur est proident excepteur ad velit occaecat qui minim occaecat veniam. Fugiat veniam incididunt anim aliqua enim pariatur veniam sunt est aute sit dolor anim. Velit non irure adipisicing aliqua ullamco irure incididunt irure non esse consectetur nostrud minim non minim occaecat. Amet duis do nisi duis veniam non est eiusmod tempor incididunt tempor dolor ipsum in qui sit. Exercitation mollit sit culpa nisi culpa non adipisicing reprehenderit do dolore. Duis reprehenderit occaecat anim ullamco ad duis occaecat ex.
                    </div>
                  </div>
                
                </div>  
            </div>
          </div>
        
</section>
	  
<section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1>Branch Details List</h1>
                        </div>
                    </div>
                    <div class="wrapper-box">
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Branch Name</th>
                                        <th>State</th>
                                        <th>City</th>
                                        <th>Contact No</th>
                                        <th>Email</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?PHP
									foreach($list as $branch){								
								?>
                                    <tr class="gradeX">
                                        <td><?PHP echo $branch->branch_name; ?></td>
                                        <td><?PHP echo $branch->state_name; ?></td>
                                        <td><?PHP echo $branch->city_name; ?></td>
                                        <td><?PHP echo $branch->contact_no; ?></td>
                                        <td><?PHP echo $branch->email; ?></td>
										<td style="text-align: center;"><i class="icon-edit"></i><a href="<?php echo base_url('branch/edit/'.$client->client_id.'/'.$branch->branch_id); ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
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
	  
	  
      <script>

      	 $(document).ready(function(){
    	//$('.datepicker').datepicker();
        	 setTimeout(function() {
            $('#show_msg').fadeOut();}, 3000);

            $('.date-picker').datepicker({ 
				autoclose: true,
				format: 'mm-dd'
				
			});
			
			<?php if($mode == 'readonly'){ ?>
				applyReadOnlyMode('clientform');
			<?php } ?>
			
    	});

        $('body').on('hover', '.nav-item.dropdown', function() {
            $(this).find('.dropdown-toggle').dropdown('toggle');
        });

        function refreshCity(){
            var state_id = $("#state_id").val();
            var result='';
        //var csrfName = $('.PVS_ERP_csrf').attr('name');

            $.ajax({
                type: 'GET',   
                url: '<?php echo base_url('client/refresh_city_list'); ?>/' + state_id,
                dataType: 'json',
                encode: true,
                async:false,
            })
            //ajax response
            .done(function(data){
                //$("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
                if(data.status){            
                    result +='<option value="">Select City</option>';

                    $.each(data.city_list,function(key,value){
                        //value(value.city_name);
                        result +='<option value="'+value.city_id+'">'+value.city_name+'</option>';
                    });
                }
                else{
                    result +='<option value="">No city selected</option>';
                }
                $("#city_id").html(result);
               // $("#city_id").selectpicker("refresh");
            
            })
            
            .fail(function(data){
                // show the any errors
                console.log(data);
            });
        }

         $("#state_id").change(() => {
            var state_id = $("#state_id").val();
            populatecity(state_id);
        })

    function populatecity(state_id){
        //alert(state_id);
       var result='';
        //var csrfName = $('.PVS_ERP_csrf').attr('name');

    $.ajax({
        type: 'POST',   
        url: '<?php echo base_url('branch/city_list'); ?>',
        data: {state_id: state_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
        dataType: 'json',
        encode: true,
    })
    //ajax response
    .done(function(data){
        $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
        if(data.status){            
            result +='<option value="">Select City</option>';

            $.each(data.city_list,function(key,value){
                //value(value.city_name);
                result +='<option value="'+value.city_id+'">'+value.city_name+'</option>';
            });
        }
        else{
            result +='<option value="">No city selected</option>';
        }
        $("#city_id").html(result);
       // $("#city_id").selectpicker("refresh");
    
    })
    
    .fail(function(data){
        // show the any errors
        console.log(data);
    });
}

  
	
    var cnt = <?php echo $contact_count-1 ; ?>;
    $("#add_more_btn").click(function () 
    {
        cnt++;
        var resulthtml='';
        resulthtml +='<tr class="add_more_contact" id="add_more_contact'+cnt+'" style="width:100%;">';
        resulthtml +='<td><input type="hidden" name="contact_id[]" class="form-control form-control-sm" id="contact_id'+cnt+'"><input type="text" maxlength="255" name="name[]" class="form-control form-control-sm" id="name'+cnt+'"></td>';
        resulthtml +='<td><input type="text" maxlength="200" name="designation[]" class="form-control form-control-sm" id="designation'+cnt+'"></td>';
        resulthtml +='<td><input type="text" maxlength="15" name="contact_no[]" class="form-control form-control-sm" id="contact_no'+cnt+'"></td>';
        resulthtml +='<td><input type="email" maxlength="255" name="email[]" class="form-control form-control-sm" id="email'+cnt+'"></td>';
        resulthtml +='<td><input type="text" name="birthday[]" class="form-control form-control-sm" id="birthday'+cnt+'"   placeholder="mm-dd" ></td>';
        resulthtml +='<td><input type="text" name="anniversary[]" class="form-control form-control-sm" id="anniversary'+cnt+'"  placeholder="mm-dd"></td>';
        resulthtml +='<td style="border: none;"><button type="button" class="but-btn" style:"background: transparent;border: none;margin-top: -10px;" value="delete" id="del_div'+cnt+'" onclick="delchild('+cnt+')"><i class="fa fa-trash-o fn-1" aria-hidden="true"></i></button></td>';
        resulthtml +='</tr>';
        $("#tab_body").append(resulthtml);
			//alert("#birthday"+cnt);
			$("#birthday"+cnt).datepicker({
            format: 'mm-dd',
            todayHighlight: true,
            autoclose: true
            });

        $("#anniversary"+cnt).datepicker({
            format: 'mm-dd',
            todayHighlight: true,
            autoclose: true
            });  
			
         //focus_blur();
        $('.del_div').on('click',function()
        {
            $(this).parents('.add_more_contact').remove();
        });
    });

     function delchild(abc)
        {
            //alert(abc);
            $("#add_more_contact"+abc).remove();
        }

      </script>