
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
                            <div class="col-md-12">
                                <div class="row mb-3">  
                                    <div class="col-md-12">
                                        <h1 style="text-align: center;">Invoice Payment Update</h1>  
                                    </div>
<!--
                                    <div class="col-md-1">
                                        <button class="cr-a">Add</button> 
                                    </div>
-->
                                </div>
                               
                            </div>
                          </div> 
                          <?php echo form_open( base_url( 'payment_update/' ), array( 'id' => 'paymentUpdate', 'class' => 'form-horizontal' ) ); ?>
                          <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Period Form : </label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control form-control-sm" placeholder="Enter form date" name="form_date" id="form_date" value="<?php echo set_value('form_date'); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Period To : </label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control form-control-sm" placeholder="Enter To date" name="to_date" id="to_date" value="<?php echo set_value('to_date'); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                                        if(!empty($show_client_id))
                                                        {
                                                            if($show_client_id==$client_row->client_id)
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
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Branch : </label>
                                        <div class="col-sm-9">
                                            <select class="form-control form-control-sm" id="branch_id" name="branch_id">
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5"></div>
                                    <div class="col-md-2 text-center">     
                                        <!-- <button type="submit" class="st-width-new" id="">Submit</button> -->
                                        <button type="submit" class="cr-a">Search</button>
                                    </div>
                                <div class="col-md-5"></div>
                            </div>
                            </form>
                            <div class="row">
                                 <div class="col-md-12">
                                     <table id="payment-update-table" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Client Name</th>
                                                <th>Branch Name</th>
                                                <th>Invoice no</th>
                                                <th>Invoice date</th>
                                                <th>Invoice amount</th>
                                                <th>Payement Receive Date</th>
                                                <th>Payment Amount</th>
                                                <th>Due Amount</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(!empty($payment_list))
                                            {
                                                foreach($payment_list as $k=>$payment_list_row)
                                                {
                                                    $total_payment_amount=0;
                                                    $payment_pay=$this->pm->payment_sum($payment_list_row->invoice_id);
                                                ?>
                                                <tr>
                                                    <td><?=$payment_list_row->client_name?></td>
                                                    <td><?=$payment_list_row->branch_name?></td>
                                                    <td><?=$payment_list_row->invoice_no?></td>
                                                    <td><?=date("d-m-Y", strtotime($payment_list_row->invoice_date))?></td>
                                                    <td><?=$payment_list_row->grand_total?></td>
                                                    <td>
                                                        <?php
                                                        if(!empty($payment_pay))
                                                        {
                                                            foreach($payment_pay as $payment_pay_row)
                                                            {
                                                                echo date("d-m-Y", strtotime($payment_pay_row->payment_date))."<br>";
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                    <?php
                                                        if(!empty($payment_pay))
                                                        {
                                                            foreach($payment_pay as $payment_pay_row)
                                                            {
                                                                $total_payment_amount=$total_payment_amount+$payment_pay_row->payment_amnt;
                                                                echo $payment_pay_row->payment_amnt."<br>";
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            echo round($payment_list_row->grand_total-$total_payment_amount,2);
                                                        ?>
                                                    </td>
                                                    <td><a class="cr-a" href="<?=base_url( 'payment_update/add/'.$payment_list_row->invoice_id)?>">Add</button></td>
                                                </tr>
                                                <?php
                                                }
                                            }
                                            ?>
                                         </tbody>
                                     </table>
                                 </div>
                                
                              <!-- <div class="col-md-1">
                                <button class="cr-a">Add</button>
                              </div> -->
                            </div>
                        </div>
                        </div>
                    </div>
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
                url: '<?php echo base_url('payment_update/branch_list'); ?>',
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
	  

	 