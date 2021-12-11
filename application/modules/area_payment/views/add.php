
<section class="main-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-client" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row mb-3">  
                                    <div class="col-md-12">
                                        <h1 style="text-align: center;">Arrear Payment</h1>  
                                    </div>
                                </div>
                                <?php if($this->session->flashdata('msg')): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert" id="show_msg">
                                    <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <?php endif; ?>
                                <?php echo form_open( base_url( 'area_payment/add' ), array( 'id' => 'area_payment', 'class' => 'form-horizontal','onSubmit' => 'return validDetail()' ) ); ?>
                                <div class="row" style="border-bottom: 1px solid #000;">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Client Name : <span class="span_star_clr"> *</span></label>
                                            <div class="col-sm-9">
                                                <?php 
                                                    $attributes = array('class' => 'form-control form-control-sm', 'id' => 'client_id','onChange' => 'populatedesignation()');
                                                    $selected = (set_value('client_id')) ? set_value('client_id') : '';
                                                    echo form_dropdown('client_id', $client , $selected, $attributes);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Branch : <span class="span_star_clr"> *</span></label>
                                            <div class="col-sm-9">
                                                <?php 
                                                    $attributes = array('class' => 'form-control form-control-sm', 'id' => 'branch_id','onChange' => 'populatedesignation()');
                                                    $selected = (set_value('branch_id')) ? set_value('branch_id') : '';
                                                    echo form_dropdown('branch_id', $branch , $selected, $attributes);
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-2">
                                       <button class="cr-a" type="submit">Submit</button>
                                    </div> -->
                                </div>
                                <div class="row mt-3" style="border-bottom: 1px solid #000;">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Designation : <span class="span_star_clr"> *</span></label>
                                            <div class="col-sm-9">
                                                <select class="form-control form-control-sm" id="designation_id" name="designation_id">
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                       <button type="button" id="proceed" class="cr-a" type="submit">Submit</button>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp; </label>
                                            <div class="col-sm-9">
                                                &nbsp;
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                <div id="detail_data">
                                    <div class="row mt-3" style="">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Client Name : </label>
                                                <div class="col-sm-9">
                                                    <p class="mb-0" id="client_name"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Branch : </label>
                                                <div class="col-sm-9">
                                                    <p class="mb-0" id="location"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Designation : </label>
                                                <div class="col-sm-9">
                                                    <p class="mb-0" id="designation"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group row">
                                                <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp;</label>
                                                <div class="col-sm-9">
                                                    &nbsp;
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Arrear No : </label>
                                                    <div class="col-sm-9">
                                                        <!-- <p class="mb-0" id="arrear"></p> -->
                                                        <input type="text" name="arrear" id="arrear" readonly="" class="form-control form-control-sm" value="<?php echo set_value('arrear'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp;</label>
                                                    <div class="col-sm-9">
                                                        &nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Arrear Salary Range : </label>
                                                    <div class="col-sm-4">
                                                        <input type="date" class="form-control form-control-sm" name="arrear_from_salary" value="<?php echo set_value('arrear_from_salary'); ?>">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="date" class="form-control form-control-sm" name="arrear_to_salary" value="<?php echo set_value('arrear_to_salary'); ?>">
                                                   </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp;</label>
                                                    <div class="col-sm-9">
                                                        &nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Arrear Gererated Salary Month : <span class="span_star_clr"> *</span></label>
                                                    <div class="col-sm-7">
                                                        <input type="date" class="form-control form-control-sm" name="salary_month" required="" value="<?php echo set_value('salary_month'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp;</label>
                                                    <div class="col-sm-9">
                                                        &nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">New Gross & Old Gross : </label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control form-control-sm" placeholder="0" name="new_gross" id="new_gross" value="<?php echo set_value('new_gross'); ?>">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control form-control-sm" placeholder="0" name="old_gross" id="old_gross" value="<?php echo set_value('old_gross'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp;</label>
                                                    <div class="col-sm-9">
                                                        &nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">New Basic & Old Basic : </label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control form-control-sm" placeholder="0" name="new_basic" id="new_basic" value="<?php echo set_value('new_basic'); ?>">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control form-control-sm" placeholder="0" name="old_basic" id="old_basic" value="<?php echo set_value('old_basic'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp;</label>
                                                    <div class="col-sm-9">
                                                        &nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">New Ot & Old Ot : </label>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control form-control-sm" placeholder="0" name="new_ot" id="new_ot" value="<?php echo set_value('new_ot'); ?>">
                                                    </div>
                                                    <div class="col-sm-4">
                                                        <input type="text" class="form-control form-control-sm" placeholder="0" name="old_ot" id="old_ot" value="<?php echo set_value('new_ot'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp;</label>
                                                    <div class="col-sm-9">
                                                        &nbsp;
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Areear Gross : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" id="areear_gross" readonly="" class="form-control form-control-sm" placeholder="0" name="areear_gross" value="<?php echo set_value('areear_gross'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Arr Bon Rt :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" placeholder="0" name="arr_bon" value="<?php echo set_value('arr_bon'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Areear Basic Amt : </label>
                                                    <div class="col-sm-8">
                                                        <input type="text" id="arrear_basic" readonly="" class="form-control form-control-sm" placeholder="2000,00" name="areear_basic" value="<?php echo set_value('areear_basic'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group row">
                                                    <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Arr Gra Rt :</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" placeholder="0" name="arr_gra" value="<?php echo set_value('arr_gra'); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-2">
                                                <button type="submit" class="cr-a">Continue</button>
                                            </div>
                                            <!-- <div class="col-md-2">
                                                <button class="cr-a">Cancel</button>
                                            </div> -->
                                            <div class="col-md-4"></div>
                                        </div>
                                        </form>
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

<script type="text/javascript">

	$(document).ready(function() {
         $("#detail_data").hide();
    } );

    function populatedesignation(){
    	if (($("#client_id").val() != '') && ($("#branch_id").val() != '')){
        let client_id = $("#client_id").val();
        let branch_id = $("#branch_id").val();
        let result = '';

        $.ajax({
            type: 'POST',   
            url: '<?php echo base_url('area_payment/designation_list'); ?>',
            data: {client_id: client_id,branch_id: branch_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
            dataType: 'json',
            encode: true,
        })
        //ajax response
        .done(function(data){

           $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
            if(data.status){            
                result +='<option value="">Select Designation</option>';

                $.each(data.designation_list,function(key,value){
                    result +='<option value="'+value.desig_id+'">'+value.desig_name+'</option>';
                });

                //result +='<option value="N">New Employee</option>';
            }
            else{
                result +='<option value="">No Designation selected</option>';
            }
            $("#designation_id").html(result);
        
        })
        
        .fail(function(data){
            // show the any errors
            console.log(data);
        });
    	}
    }

    $("#old_gross").keyup(() => {
        let new_gross = $("#new_gross").val();
        let old_gross = $("#old_gross").val();
        let diff_gross = (new_gross - old_gross);
        $("#areear_gross").val(diff_gross);
    })

    $("#old_basic").keyup(() =>{
        let new_basic = $("#new_basic").val();
        let old_basic = $("#old_basic").val();
        let diff_basic = (new_basic - old_basic);
        $("#arrear_basic").val(diff_basic);
    })

    $("#proceed").click(() => {
    	
    if (($("#client_id").val() != '') && ($("#branch_id").val() != '') && ($("#designation_id").val() != '')){
    let client_id = $("#client_id").val();
    let branch_id = $("#branch_id").val();
	let designation_id = $("#designation_id").val();
	//console.log(client_id,branch_id,designation_id );

	$.ajax({
        type: 'GET',   
        url: '<?php echo base_url('area_payment/client_details'); ?>/' + client_id + '/' + branch_id + '/' + designation_id,
        dataType: 'json',
    })
    //ajax response
    .done(function(data){
    	//alert(1);
    	//console.log(data.client_name);
        //alert(data);
        $("#detail_data").show();
        $("#client_name").html(data.client_name);
        $("#location").html(data.branch_name);
        $("#designation").html(data.desig_name);
        let serial_no = data.serial_no;
        serial_no = parseInt(serial_no) + 1;
        $("#arrear").val(serial_no);
  //       $("#calculation_days").html(data.bill_calculation_days);


        
    })
    
    .fail(function(data){
        // show the any errors
        console.log(data);
    });
	}

	})

	function validDetail()
    {
    	let isValidated = true;

    	if( $("#new_gross").val() != '' && $("#old_gross").val() == ''){
    		//alert(1);
    		isValidated = false;
    	}
    	if(!isValidated){
              alert("Please enter Old Gross Amount");
              return false;
        }

        if( $("#new_basic").val() != '' && $("#old_basic").val() == ''){
    		//alert(1);
    		isValidated = false;
    	}
    	if(!isValidated){
              alert("Please enter Old Basic Amount");
              return false;
        }

        if( $("#new_ot").val() != '' && $("#old_ot").val() == ''){
    		//alert(1);
    		isValidated = false;
    	}
    	if(!isValidated){
              alert("Please enter Old Ot Amount");
              return false;
        }

    	return true;
    }
</script>
	  
	 