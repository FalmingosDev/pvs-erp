
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
                    <?php if($this->session->flashdata('error')): ?>
                        <div class="alert btn-danger alert-dismissible fade show" role="alert" id="show_msg">
                                <strong><?php echo $this->session->flashdata('error'); ?></strong>
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
                                    <div class="col-md-11">
                                        <h1 style="text-align: center;">Invoice Payment update</h1>  
                                    </div>
                                    <div class="col-md-1">
                                        <a class="cr-a" href="<?php echo base_url('payment_update'); ?>" class="ad-btn-a-tag">Back</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Client Name : </label>
                                            <div class="col-sm-9">
                                                <p><?=$payment_list->client_name?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Branch Name : </label>
                                            <div class="col-sm-9">
                                            <p><?=$payment_list->branch_name?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Invoice No : </label>
                                            <div class="col-sm-8">
                                                <p><?=$payment_list->invoice_no?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-4 col-form-label col-form-label-sm">Invoice date : </label>
                                            <div class="col-sm-8">
                                                <p><?=date("d-m-Y", strtotime($payment_list->invoice_date))?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm">Invoice Amount : </label>
                                            <div class="col-sm-7">
                                                <p><?=$payment_list->grand_total?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php echo form_open( base_url( 'payment_update/add/'.$payment_list->invoice_id ), array( 'id' => 'paymentAdd', 'class' => 'form-horizontal' ) ); ?>
                                <input type="hidden" name="invoice_id" id="invoice_id" value="<?=$payment_list->invoice_id?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Payment Date : </label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control form-control-sm" placeholder="Enter payment date" id="payment_date" name="payment_date">
                                            </div>
                                            <?php echo form_error('payment_date', '<span class="help-inline">', '</span>'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm pr-0">Payment Amount : </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" placeholder="Enter payment amount " id="payment_amount" name="payment_amount">
                                            </div>
                                            <?php echo form_error('payment_amount', '<span class="help-inline">', '</span>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5"></div>
                                    <div class="col-md-2">
                                        <button class="cr-a" type="submit">Save</button>
                                    </div>
                                    <div class="col-md-5"></div>
                                </div>
                                </form>
                                <div class="row">
                                 <div class="col-md-12">
                                     <table id="payment-update-table" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Sl.no</th>
                                                
                                                <th>Payement Receive Date</th>
                                                <th>Payment Amount</th>
                                                <th>Due Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if(!empty($payment_all_list))
                                            {
                                                
                                                foreach($payment_all_list as $k=>$payment_pay_row)
                                                {
                                                    
                                            ?>
                                            <tr>
                                                <td><?=($k+1)?></td>
                                                
                                                <td><?=date("d-m-Y", strtotime($payment_pay_row->payment_date))?></td>
                                                <td><?=$payment_pay_row->payment_amnt?></td>
                                                <td><?=round($payment_list->grand_total-$payment_pay_row->payment_amnt,2)?></td>
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
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#payment-update-table').DataTable();
    } );
</script>
	  
	 