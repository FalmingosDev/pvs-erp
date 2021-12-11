<?PHP
//print_r($state); exit;
?>
<style type="text/css">
    .wrapper-box {
    padding: 10px 15px;
    border: 1px solid #c0c0c0;
    width: 72%;
    display: block;
    margin: 0 auto;
}
</style>

<section class="main-wrapper">
          <div class="container">
            <div class="row">
                <div class="col-md-12">
                  
                <?php if($this->session->flashdata('msg')): ?>
                        <div class="alert btn-danger alert-dismissible fade show" role="alert" id="show_msg">
                                <strong><?php echo $this->session->flashdata('msg'); ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        
                    <?php endif; ?>
                    <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-client" role="tabpanel" aria-labelledby="nav-home-tab">
                      <div class="container">
                      <div class="row">
                                    <div class="col-md-11">
                                        <h1 class="employee-box">Tally Billing Updated</h1>   
                                    </div>
                                    <div class="col-md-1">
                                        <a class="cr-a" href="<?=base_url('tally_billing')?>">Back</a>
                                    </div>
                                </div> 
                          <?php echo form_open( base_url( 'tally_billing/edit/'.$view->billing_tally_id ), array( 'id' => 'tallyBilling', 'class' => 'form-horizontal' ) ); ?>
                          <input type="hidden" name="billing_tally_id" id="billing_tally_id" value="<?php echo $view->billing_tally_id?>">
                          
                          <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Client Name : </label>
                                        <div class="col-sm-9">
                                            <select class="form-control form-control-sm" onChange="populatebranch(this.value)" id="client_id" name="client_id" >
                                                <option value="">Select Client</option>
                                                <?php
                                                    foreach($client as $client_row)
                                                    {
                                                        if(!empty($view->client_id))
                                                        {
                                                            if($view->client_id==$client_row->client_id)
                                                            {
                                                                ?>
                                                                <option value="<?=$client_row->client_id?>" selected><?=$client_row->client_name?></option>
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <option value="<?=$client_row->client_id?>"><?=$client_row->client_name?></option>
                                                                <?php
                                                            }
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <option value="<?=$client_row->client_id?>"><?=$client_row->client_name?></option>
                                                            <?php
                                                        }
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <?php echo form_error('client_id', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Branch : </label>
                                        <div class="col-sm-9">
                                            <select class="form-control form-control-sm" id="branch_id" name="branch_id">
                                            <?php
                                                    foreach($branch_list as $branch_list_row)
                                                    {
                                                        if(!empty($view->branch_id))
                                                        {
                                                            if($view->branch_id==$branch_list_row['branch_id'])
                                                            {
                                                                ?>
                                                                <option value="<?=$branch_list_row['branch_id']?>" selected><?=$branch_list_row['branch_name']?></option>
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                <option value="<?=$branch_list_row['branch_id']?>"><?=$branch_list_row['branch_name']?></option>
                                                                <?php
                                                            }
                                                        }
                                                        else
                                                        {
                                                            ?>
                                                            <option value="<?=$branch_list_row['branch_id']?>"><?=$branch_list_row['branch_name']?></option>
                                                            <?php
                                                        }
                                                    }
                                                ?>
                                                
                                            </select>
                                        </div>
                                        <?php echo form_error('branch_id', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Customer Ledger code : </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" placeholder="Enter customer ledeger code" name="customer_ledger_code" id="customer_ledger_code" value="<?php echo $view->customer_ledger_code ?>">
                                        </div>
                                        <?php echo form_error('customer_ledger_code', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">IGST code: </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" placeholder="Enter igst code" name="igst_code" id="igst_code" value="<?php echo $view->igst_code; ?>">
                                        </div>
                                        <?php echo form_error('igst_code', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Cost category: </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" placeholder="Enter cost category" name="cost_category" id="cost_category" value="<?php echo $view->cost_category; ?>">
                                        </div>
                                        <?php echo form_error('cost_category', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Cast center : </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" placeholder="Enter cast center" name="cast_center" id="cast_center" value="<?php echo $view->cast_center; ?>">
                                        </div>
                                        <?php echo form_error('cast_center', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Sales head code: </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" placeholder="Enter sales head code" name="sales_head_code" id="sales_head_code" value="<?php echo $view->sales_head_code; ?>">
                                        </div>
                                        <?php echo form_error('sales_head_code', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">CGST code : </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" placeholder="Enter cgst code" name="cgst_code" id="cgst_code" value="<?php echo $view->cgst_code; ?>">
                                        </div>
                                        <?php echo form_error('cgst_code', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">SGST code : </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" placeholder="Enter sgst code" name="sgst_code" id="sgst_code" value="<?php echo $view->sgst_code; ?>">
                                        </div>
                                        <?php echo form_error('sgst_code', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">UGST code : </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" placeholder="Enter ugst code" name="ugst_code" id="ugst_code" value="<?php echo $view->utgst_code; ?>">
                                        </div>
                                        <?php echo form_error('ugst_code', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Add tax code : </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" placeholder="Enter add tax code" name="add_text_code" id="add_text_code" value="<?php echo $view->add_tax_code; ?>">
                                        </div>
                                        <?php echo form_error('add_text_code', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Round Of : </label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control form-control-sm" placeholder="Enter round of" name="round_of" id="round_of" value="<?php echo $view->round_off; ?>">
                                        </div>
                                        <?php echo form_error('round_of', '<span class="help-inline">', '</span>'); ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5"></div>
                                    <div class="col-md-2 text-center">     
                                        <!-- <button type="submit" class="st-width-new" id="">Submit</button> -->
                                        <button type="submit" class="cr-a">Save</button>
                                    </div>
                                <div class="col-md-5"></div>
                            </div>
                            </form>
                
                </div>  
            </div>
          </div>
        
      </section>
	  
      <script>
    $(document).ready(function() {
        $('#payment-update-table').DataTable();
    } );

    function populatebranch(client_id)
    {
        if(client_id !='')
        {
            var result='';
            $.ajax({
                type: 'POST',   
                url: '<?php echo base_url('tally_billing/branch_list'); ?>',
                data: {client_id: client_id,<?= $this->security->get_csrf_token_name(); ?>: $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val()},
                dataType: 'json',
                encode: true,
            })
            //ajax response
            .done(function(data)
            {
                $("[name='<?= $this->security->get_csrf_token_name(); ?>']").val(data.newHash);
                if(data.status)
                {            
                    result +='<option value="">Select Branch</option>';

                    $.each(data.branch_list,function(key,value){
                        //value(value.city_name);
                        result +='<option value="'+value.branch_id+'">'+value.branch_name+'</option>';
                    });
                }
                else
                {
                    result +='<option value="">No Branch selected</option>';
                }
                $("#branch_id").html(result);
            
            })
            
            .fail(function(data){
                // show the any errors
                console.log(data);
            });
        }
}


</script>