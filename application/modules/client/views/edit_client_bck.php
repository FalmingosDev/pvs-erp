<section class="main-wrapper">
          <div class="container">
            <div class="row">
                <div class="col-md-12">
                  <nav>
                    <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-client" role="tab" aria-controls="nav-home" aria-selected="true">Client Master</a>
                      <a class="nav-item nav-link" id="" href="<?php echo base_url('sales_billing/add_sales_billing'); ?>" role="tab">Sales-Billing</a>
                      <a class="nav-item nav-link" id="nav-contact-tab" href="<?php echo base_url('billing_costing/add'); ?>" role="tab">Billing-Costing-Sheet</a>
                      <a class="nav-item nav-link" id="nav-about-tab" href="<?php echo base_url('sales_billing/add_sales_billing'); ?>" role="tab">Branch Details</a>
                        <a class="nav-item nav-link" id="nav-about-tab" href="<?php echo base_url('document_uplode/add_document_uplode'); ?>" role="tab">Document-Upload</a>
                    </div>
                  </nav>
                  <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-client" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Client Master</h1>
                                <div class="wrapper-box">
                                    <?php echo validation_errors(); ?>
                                    <?php foreach($edit_client as $client){ ?>
                                    <?php echo form_open( base_url( 'client/edit' ), array( 'id' => 'clientform', 'class' => 'form-horizontal form-hori-border' ) ); ?>
                                        <input type="hidden" name="client_id" value="<?php echo $client->client_id; ?>">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Client Name</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" name="client_name" class="form-control form-control-sm" id="" placeholder="Client name" value="<?php echo $client->client_name; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Address Line 1</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" name="address_line_1" class="form-control form-control-sm" id="" placeholder="Address Line 1" value="<?php echo $client->address_1; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Agreement Start Date</label>
                                                        <div class="col-sm-8">
                                                          <input type="date" data-date-format="dd-mm-yyyy" class="form-control form-control-sm" id="" placeholder="" name="agreemnt_start_date" value="<?php echo $client->agreement_start_date; ?>">
                                                        </div>
                                                  </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group row">
                                                        <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Agreement End Date</label>
                                                        <div class="col-sm-8">
                                                          <input type="date" data-date-format="dd-mm-yyyy" class="form-control form-control-sm" id="" name="agreemnt_end_date" value="<?php echo $client->agreement_end_date; ?>">
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Address Line 2</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control form-control-sm" id="" name="address_line_2" placeholder="Address Line 2" value="<?php echo $client->address_2; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Type</label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm" id="type_id" name="type_id">
                                                            <?php                                       
                                                                foreach($type as $type) 
                                                                {  
                                                                ?>
                                                                <option <?PHP if($client->industry_type_id == $type->industry_type_id){echo "selected";} ?> value="<?PHP echo $type->industry_type_id;?>"><?PHP echo $type->industry_type_name; ?></option>
                                                                 <?php
                                                                }
                                                                ?>  
                                                        </select>
                                                        <p>( Industry Type )</p>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Address Line 3</label>
                                                    <div class="col-sm-9">
                                                      <input type="text" name="address_line_3" class="form-control form-control-sm" id="" placeholder="Address Line 3" value="<?php echo $client->address_3; ?>">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Rating</label>
                                                    <div class="col-sm-9">
                                                        <select id="rating_id" name="rating_id" class="form-control form-control-sm">
                                                            <?php                                       
                                                            foreach($rating as $rating) 
                                                            {  
                                                            ?>
                                                            <option value="<?PHP echo $rating->rating_id;?>"><?PHP echo $rating->rating_short_name; ?></option>
                                                             <?php
                                                            }
                                                                ?>
                                                        </select>
                                                        <p>( Buisness Potential )</p>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">State</label>
                                                    <div class="col-sm-9">
                                                        <select id="state_id" name="state_id" class="form-control form-control-sm">
                                                            <option value="">Select state</option>
                                                            <?php                                       
                                                            foreach($state as $state) 
                                                            {  
                                                            ?>
                                                            <option value="<?PHP echo $state->state_id;?>"><?PHP echo $state->state_name; ?></option>
                                                             <?php
                                                            }
                                                                ?>
                                                        </select>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Location</label>
                                                    <div class="col-sm-9">
                                                        <label class="cont-radio-location"><input type="radio" name="location" value="M" <?php if($client->location_type=='M') echo "checked='checked'"; ?>>Multi Location</label>
                                                        <label class="cont-radio-location"><input type="radio" name="location" value="S" <?php if($client->location_type=='S') echo "checked='checked'"; ?>>Single Location</label>                                                        
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">City</label>
                                                    <div class="col-sm-9">
                                                      <select id="city_id" name="city_id" class="form-control form-control-sm">
                                            
                                                      </select>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Tel Nos</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="tel_nos" placeholder="Tel Nos">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Pincode </label>
                                                    <div class="col-sm-9">
                                                      <input type="text" class="form-control form-control-sm" id="" name="pincode" placeholder="Pincode">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Fax </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="" name="fax" placeholder="Fax">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Foundation Day </label>
                                                    <div class="col-sm-9">
                                                      <input type="date" class="form-control form-control-sm" id="" placeholder="" name="foundation_day">
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Email </label>
                                                    <div class="col-sm-9">
                                                        <input type="email" class="form-control form-control-sm" id="" name="client_email" placeholder="Email">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">MW Type </label>
                                                    <div class="col-sm-9">
                                                      <select id="mw_type_id" name="mw_type_id" class="form-control form-control-sm">
                                                            <?php                                       
                                                            foreach($mw_type as $mw_type) 
                                                            {  
                                                            ?>
                                                            <option value="<?PHP echo $mw_type->mw_type_id;?>"><?PHP echo $mw_type->mw_type_name; ?></option>
                                                             <?php
                                                            }
                                                                ?>  
                                                        </select>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Website </label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" name="website" placeholder="Website">
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Source  </label>
                                                    <div class="col-sm-9">
                                                      <select id="source_id" name="source_id" class="form-control form-control-sm">
                                                            <?php                                       
                                                            foreach($source as $source) 
                                                            {  
                                                            ?>
                                                            <option value="<?PHP echo $source->source_id;?>"><?PHP echo $source->source_name; ?></option>
                                                             <?php
                                                            }
                                                                ?>  
                                                        </select>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row border-bottom-row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Contract Status </label>
                                                    <div class="col-sm-9">
                                                        <select class="form-control form-control-sm" id="contract_status_id" name="contract_status_id">
                                                            <?php                                       
                                                            foreach($contract_status as $cs) 
                                                            {  
                                                            ?>
                                                            <option value="<?PHP echo $cs->contract_status_id;?>"><?php echo $cs->contract_status_name; ?></option>
                                                             <?php
                                                            }
                                                                ?>  
                                                        </select>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Source Reference  </label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control form-control-sm" name="source_ref" id="source_ref"></textarea>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <h3 class="cl-h3">Client Contact Details</h3>
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

                                                        <?php $i = 0; foreach($edit_client_contact as $contact){ ?>

                                                        <tr width="100%" class="add_more_contact" style="">
                                                            <td><input type="text" name="name[]" class="form-control form-control-sm" id="name<?php echo $i; ?>" value="<?php echo $contact['name']; ?>"></td>
                                                            <td><input type="text" name="designation[]" class="form-control form-control-sm" id="designation<?php echo $i; ?>" value="<?php echo $contact['name']; ?>"></td>
                                                            <td><input type="text" name="contact_no[]" class="form-control form-control-sm" id="contact_no<?php echo $i; ?>" value="<?php echo $contact['name']; ?>"></td>
                                                            <td><input type="text" name="email[]" class="form-control form-control-sm" id="email<?php echo $i; ?>" value="<?php echo $contact['name']; ?>"></td>
                                                            <td><input type="date" name="birthday[]" class="form-control form-control-sm" id="birthday<?php echo $i; ?>" value="<?php echo $contact['name']; ?>"></td>
                                                            <td><input type="date" name="anniversary[]" class="form-control form-control-sm" id="anniversary<?php echo $i; ?>" value="<?php echo $contact['name']; ?>"></td>
                                                        </tr>

                                                    <?php $i++; } ?>
                                                      </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="button" class="add-cont-btn" id="add_more_btn">Add</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Remarks</label>
                                                    <div class="col-sm-9">
                                                        <textarea class="form-control form-control-sm" name="remarks" id="remarks"></textarea>
                                                    </div>
                                                  </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp;</label>
                                                    <div class="col-sm-9">
                                                        <div class="form-actions">
                                                            <button type="submit" class="btn btn-success">Save</button>
                                                        </div>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                    </form>
                                <?php } ?>
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

      <script>

         $(document).ready(function(){
        //$('.datepicker').datepicker();
            //addnewclient();        
        });

        $('body').on('hover', '.nav-item.dropdown', function() {
            $(this).find('.dropdown-toggle').dropdown('toggle');
        });

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
        url: '<?php echo base_url('client/city_list'); ?>',
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

  // function addnewclient(){
  //       var resulthtml='';
  //       resulthtml +='<tr width="100%" class="add_more_contact" style="">';
  //       resulthtml +='<td><input type="text" name="name[]" class="form-control form-control-sm" id="name0"></td>';
  //       resulthtml +='<td><input type="text" name="designation[]" class="form-control form-control-sm" id="designation0"></td>';
  //       resulthtml +='<td><input type="text" name="contact_no[]" class="form-control form-control-sm" id="contact_no0"></td>';
  //       resulthtml +='<td><input type="text" name="email[]" class="form-control form-control-sm" id="email0"></td>';
  //       resulthtml +='<td><input type="date" name="birthday[]" class="form-control form-control-sm" id="birthday0"></td>';
  //       resulthtml +='<td><input type="date" name="anniversary[]" class="form-control form-control-sm" id="anniversary0"></td>';
  //       //resulthtml +='<td>&nbsp;</td>';
  //       resulthtml +='</tr>';
  //       $("#tab_body").html(resulthtml);
  //   }

    var cnt =0;
    $("#add_more_btn").click(function () 
    {
        cnt++;
        var resulthtml='';
        resulthtml +='<tr class="add_more_contact" id="add_more_contact'+cnt+'" style="width:100%;">';
        resulthtml +='<td><input type="text" name="name[]" class="form-control form-control-sm" id="name'+cnt+'"></td>';
        resulthtml +='<td><input type="text" name="designation[]" class="form-control form-control-sm" id="designation'+cnt+'"></td>';
        resulthtml +='<td><input type="text" name="contact_no[]" class="form-control form-control-sm" id="contact_no'+cnt+'"></td>';
        resulthtml +='<td><input type="text" name="email[]" class="form-control form-control-sm" id="email'+cnt+'"></td>';
        resulthtml +='<td><input type="date" name="birthday[]" class="form-control form-control-sm" id="birthday'+cnt+'"></td>';
        resulthtml +='<td><input type="date" name="anniversary[]" class="form-control form-control-sm" id="anniversary'+cnt+'"></td>';
        resulthtml +='<td style="border: none;"><button type="button" class="but-btn" style:"background: transparent;border: none;margin-top: -10px;" value="delete" id="del_div'+cnt+'" onclick="delchild('+cnt+')"><i class="fa fa-trash-o fn-1" aria-hidden="true"></i></button></td>';
        resulthtml +='</tr>';
        $("#tab_body").append(resulthtml);

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