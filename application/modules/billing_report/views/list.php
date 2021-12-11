
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
                                        <h1 style="text-align: center;">Billing Report</h1>  
                                    </div>
                                </div>

                                <?php if($this->session->flashdata('msg')): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert" id="show_msg">
                                        <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>
                                <?php echo form_open( base_url( 'billing_report/generate_excel' ), array( 'id' => 'search', 'class' => 'form-horizontal' ) ); ?>
                                <div class="row">
                                <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm pr-0">Month& Year  : </label>
                                            <div class="col-sm-8">  
                                                <?php 
                                                    $attributes = array('class' => 'form-control form-control-sm', 'id' => 'month');
                                                    $selected = (set_value('month')) ? set_value('month') : '';
                                                    echo form_dropdown('month', $month, $selected, $attributes);
                                                ?>
                                            </div>
                                          </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm p-0">Client Name : </label>
                                            <div class="col-sm-9">
                                                <?php 
                                                    $attributes = array('class' => 'form-control form-control-sm', 'id' => 'client_id');
                                                    $selected = (set_value('client_id')) ? set_value('client_id') : '';
                                                    echo form_dropdown('client_id', $client, $selected, $attributes);
                                                ?>
                                            </div> 
                                          </div>
                                    </div>
                                    <div class="col-md-4" style="display: none;" id="branch_div">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">Branch : </label>
                                            <div class="col-sm-9">
                                                <select class="form-control form-control-sm" name="branch_id" id="branch_id">
                                                    
                                                </select>
                                            </div> 
                                          </div>
                                    </div>
                                    <div class="col-md-4" style="display: none;" id="state_div">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">State : </label>
                                            <div class="col-sm-9">
                                                <select class="form-control form-control-sm" name="state_id" id="state_id">
                                                    
                                                </select>
                                            </div> 
                                          </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5"></div>
                                    <div class="col-md-2">
                                        <button type="submit" class="cr-a">Download Excel</button> 
                                    </div>
                                    <div class="col-md-5"></div>
                                </div>
                            </form>
                            
                            </div>

                           
                          </div>

                        </div>
                        </div>
                    </div>
                
            </div>
     </div>
     
</section>
	  
<script>
    
    $("#client_id").change(() => {
        if ($("#client_id").val() != '')
        {
            let client_id = $("#client_id").val();


           $.ajax({
            type: 'GET',   
            url: '<?php echo base_url('billing_report/check_client'); ?>/' + client_id,
            dataType: 'json',
            encode: true,
            async:false,
            })
            //ajax response
            .done(function(data){
                //$("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
                //$("#ptax").val(data.ptax);
                billing_method = data.billing_method;
                //alert(billing_method);
                if(billing_method == 'B'){
                    $("#state_div").hide();
                    populateBranch(client_id);
                    $("#branch_div").show();

                    
                }
                else if(billing_method == 'S'){
                    $("#branch_div").hide();
                    populateState(client_id);
                    $("#state_div").show();
                    
                }
                else{
                    $("#branch_div").hide();
                    $("#state_div").hide();
                }
            })
        
            .fail(function(data){
                // show the any errors
                console.log(data);
            });
        }
    })

    function populateBranch(client_id)
    {
        let result = '';

        $.ajax({
            type: 'POST',   
            url: '<?php echo base_url('billing_report/branch_list'); ?>',
            data: {client_id: client_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
            dataType: 'json',
            encode: true,
        })
        //ajax response
        .done(function(data){

           $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
            if(data.status){            
                result +='<option value="">Select Branch</option>';

                $.each(data.branch_list,function(key,value){
                    result +='<option value="'+value.branch_id+'">'+value.branch_name+'</option>';
                });

                //result +='<option value="N">New Employee</option>';
            }
            else{
                result +='<option value="">No Branch selected</option>';
            }
            $("#branch_id").html(result);
        
        })
        
        .fail(function(data){
            // show the any errors
            console.log(data);
        });
    }

    function populateState(client_id)
    {
        let result = '';

        $.ajax({
            type: 'POST',   
            url: '<?php echo base_url('billing_report/state_list'); ?>',
            data: {client_id: client_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
            dataType: 'json',
            encode: true,
        })
        //ajax response
        .done(function(data){

           $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
            if(data.status){            
                result +='<option value="">Select State</option>';

                $.each(data.state_list,function(key,value){
                    result +='<option value="'+value.state_id+'">'+value.state_name+'</option>';
                });

                //result +='<option value="N">New Employee</option>';
            }
            else{
                result +='<option value="">No State selected</option>';
            }
            $("#state_id").html(result);
        
        })
        
        .fail(function(data){
            // show the any errors
            console.log(data);
        });
    }
</script>
	 