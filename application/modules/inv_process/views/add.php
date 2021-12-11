<?php $date = date('Y-m-d'); ?>
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
                                        <h1 style="text-align: center;">Bill Generation</h1> 

                                    </div>
                                </div>

                                
                                <?php echo form_open( base_url( 'inv_process/generate_bill/'. $clientData->designation_id .'/'. $total_att .'/'. $clientData->client_id .'/'. $branch_id .'/'. $attendance_month . '/' . $billing_method . '/' . $state_id), array( 'id' => 'search', 'class' => 'form-horizontal' ) ); ?>
                                <div class="row">
                                    <input type="hidden" name="client_id" value="<?php echo $clientData->client_id; ?>">
                                    <input type="hidden" name="designation_id" value="<?php echo $clientData->designation_id; ?>">
                                    <input type="hidden" name="client_attendance_id" value="0">
                                    <input type="hidden" name="total_att" value="<?php echo $total_att; ?>">
                                    <input type="hidden" name="branch_id" value="<?php echo $branch_id; ?>">
                                    <input type="hidden" name="attendance_month" value="<?php echo $attendance_month; ?>">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Invoice No : </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" readonly="" name="invoice_no" value="<?php echo $invoice_no->invoice_no; ?>">
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp; </label>
                                            <div class="col-sm-9">
                                                &nbsp;
                                            </div>
                                          </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Invoice Date : </label>
                                            <div class="col-sm-9">
                                                <input type="date" class="form-control form-control-sm" name="invoice_date">
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Date To Print : </label>
                                            <div class="col-sm-9">
                                                <input type="date" readonly="" class="form-control form-control-sm" name="date_to_print" value="<?php echo $date; ?>">
                                            </div>
                                          </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Client Name : </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" readonly="" name="client_name" value="<?php echo $clientData->client_name; ?>">
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp; </label> 
                                            <div class="col-sm-9">
                                                &nbsp;
                                            </div>
                                          </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Address : </label>
                                            <div class="col-sm-9">
                                                <textarea readonly="" name="billing_address" class="form-control form-control-sm"><?php echo $clientGstData->address; ?></textarea>
                                            </div>
                                          </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">&nbsp; </label> 
                                            <div class="col-sm-9">
                                                &nbsp;
                                            </div>
                                          </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <?php 

                                            $total = 0.00;
                                            $final_service_chrg_amnt = 0.00;
                                            $service_chrg_prcnt = 0.00;
                                            $service_chrg_amnt = 0.00;
                                            $subtotal_amnt = 0.00;
                                            $pf_amnt = 0.00;
                                            $esi_amnt = 0.00;
                                            $releiving = 0.00;
                                            $service_tax_with_subtotal = 0.00;
                                            $cess = 0.00;
                                            $round_off = 0.00;
                                            $grand_total = 0.00;



                                            $gross_pay = $clientData->gross_pay;
                                            $bill_calculation_day = $clientData->bill_calculation_days;
                                            $total_att = $total_att;
                                            $total = ($gross_pay / $bill_calculation_day) * $total_att;
                                            
                                            if($clientData->service_chrg_prcnt){
                                                $service_chrg_prcnt = $clientData->service_chrg_prcnt;
                                                $final_service_chrg_amnt = (($total * $service_chrg_prcnt) / 100);
                                            }
                                            
                                            else
                                            {
                                                $service_chrg_amnt = $clientData->service_chrg;
                                                $final_service_chrg_amnt = ($service_chrg_amnt / $bill_calculation_day) * $total_att;
                                            }

                                            if($clientGstData->sgst && $clientGstData->cgst){
                                            	$service_tax_prcnt = ($clientGstData->sgst + $clientGstData->cgst);
                                            }
                                            else if($clientGstData->igst){
                                            	$service_tax_prcnt = $clientGstData->igst;
                                            }
                                            else{
                                            	$service_tax_prcnt = $clientGstData->ugst;
                                            }



                                            $pf = $clientData->epf;
                                            $pf_amnt = ( $pf / $bill_calculation_day ) * $total_att;
                                            $esi = $clientData->esi;
                                            $esi_amnt = ( $esi / $bill_calculation_day ) * $total_att;
                                            $releiving_chrg = $clientData->releiver_chrg;
                                            $releiving = ($releiving_chrg / $bill_calculation_day) * $total_att;

                                            $subtotal_amnt = $total + $releiving + $pf_amnt + $esi_amnt + $final_service_chrg_amnt;

                                            $service_tax_amnt = (( $subtotal_amnt * $service_tax_prcnt) / 100);
                                            $cess = $clientGstData->cess;
                                            if($clientData->round_off){
                                                $round_off = ($clientData->round_off / $bill_calculation_day ) * $total_att;
                                            }

                                            $grand_total = $subtotal_amnt +  $service_tax_amnt + $cess +  $round_off;



                                    ?>
                                    <div class="col-md-8">
                                        <table class="table bill-table">
                                            <tr>
                                                <td style="width: 19%;">Total</td>
                                                <td style="width: 19%;">&nbsp;</td>
                                                <td style="width: 19%;">&nbsp;</td>
                                                <td style="width: 19%;">&nbsp;</td>
                                                <td style="width: 5%;">&nbsp;</td>
                                                <!-- <td style="width: 19%;background: #eee;color: red;"><input type="hidden" name="total" value="<?php //echo $total; ?>"><?php //echo $total; ?></td> -->
                                                <td style="width: 19%;background: #eee;color: red;"><input type="hidden" name="total" value="<?php echo $total; ?>"><?php echo number_format($total,2); ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 19%;">Releiving</td>
                                                <td style="width: 19%;">1/0</td>
                                                <td style="width: 19%;">Of</td>
                                                <td style="width: 19%;background: #eee;">0.00</td>
                                                <td style="width: 5%;">&nbsp;</td>
                                                <td style="width: 19%;background: #eee;color: red;"><input type="hidden" name="releiving" value="<?php echo $releiving; ?>"><?php echo number_format($releiving,2); ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 19%;">PF</td>
                                                <td style="width: 19%;">&nbsp;</td>
                                                <td style="width: 19%;">&nbsp;</td>
                                                <td style="width: 19%;background: #eee;"><input type="hidden" name="pf_percentage" value="<?php echo $epf_rate->percentage; ?>"><?php echo $epf_rate->percentage; ?></td>
                                                <td style="width: 5%;">&nbsp;</td>
                                                <td style="width: 19%;background: #eee;color: red;"><input type="hidden" name="pf_amnt" value="<?php echo $pf_amnt; ?>"><?php echo number_format($pf_amnt,2); ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 19%;">ESI</td>
                                                <td style="width: 19%;">&nbsp;</td>
                                                <td style="width: 19%;">&nbsp;</td>
                                                <td style="width: 19%;background: #eee;"><input type="hidden" name="esi_percentage" value="<?php echo $esi_rate->percentage; ?>"><?php echo $esi_rate->percentage; ?></td>
                                                <td style="width: 5%;">&nbsp;</td>
                                                <td style="width: 19%;background: #eee;color: red;"><input type="hidden" name="esi_amnt" value="<?php echo $esi_amnt; ?>"><?php echo number_format($esi_amnt,2); ?></td>
                                            </tr>

                                            <tr>
                                                <td style="width: 19%;">Serv Chrg</td>
                                                <td style="width: 19%;"><input type="hidden" name="service_chrg_prcnt" value="<?php echo $service_chrg_prcnt; ?>"><?php echo $service_chrg_prcnt; ?>%</td>
                                                <td style="width: 19%;">Of</td>
                                                <td style="width: 19%;background: #eee;">0.00</td>
                                                <td style="width: 5%;">&nbsp;</td>
                                                <td style="width: 19%;background: #eee;color: red;"><input type="hidden" name="final_service_chrg_amnt" value="<?php echo $final_service_chrg_amnt; ?>"><?php echo number_format($final_service_chrg_amnt,2); ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 19%;">Sub Total</td>
                                                <td style="width: 19%;">&nbsp;</td>
                                                <td style="width: 19%;">&nbsp;</td>
                                                <td style="width: 19%;">&nbsp;</td>
                                                <td style="width: 5%;">&nbsp;</td>
                                                <td style="width: 19%;background: #eee;color: red;"><input type="hidden" name="subtotal_amnt" value="<?php echo $subtotal_amnt; ?>"><?php echo number_format($subtotal_amnt,2); ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 19%;">Serv Tax Amt</td>
                                                <td style="width: 19%;background: #eee;" id="service_tax_prcnt"><input type="hidden" name="service_tax_prcnt" value="<?php echo $service_tax_prcnt; ?>"><?php echo $service_tax_prcnt; ?>%</td>  
                                                <td style="width: 19%;">Of</td>
                                                <td style="width: 19%;background: #eee;"><?php echo number_format($subtotal_amnt,2); ?></td>
                                                <td style="width: 5%;">&nbsp;</td>
                                                <td style="width: 19%;background: #eee;color: red;" id="service_tax_amnt"><input type="hidden" name="service_tax_with_subtotal" value="<?php echo $service_tax_with_subtotal; ?>"><?php echo number_format($service_tax_amnt,2); ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 19%;">Edu Cess</td>
                                                <td style="width: 19%;">&nbsp;</td>
                                                <td style="width: 19%;">&nbsp;</td>
                                                <td style="width: 19%;">&nbsp;</td>
                                                <td style="width: 5%;">&nbsp;</td>
                                                <td style="width: 19%;background: #eee;color: red;"><input type="hidden" name="cess" value="<?php echo $cess; ?>"><?php echo number_format($cess,2); ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 19%;">Rounf Off</td>
                                                <td style="width: 19%;">&nbsp;</td>
                                                <td style="width: 19%;">&nbsp;</td>
                                                <td style="width: 19%;">&nbsp;</td>
                                                <td style="width: 5%;">&nbsp;</td>
                                                <td style="width: 19%;background: #eee;color: red;"><input type="hidden" name="round_off" value="<?php echo $round_off; ?>"><?php echo number_format($round_off,2); ?></td>
                                            </tr>
                                            <?php 

                                                $grand_tot = number_format(round($grand_total, 0, PHP_ROUND_HALF_DOWN),2);
                                            ?>
                                            <tr>
                                                <td style="width: 19%;">Grand Tot</td>
                                                <td style="width: 19%;">&nbsp;</td>
                                                <td style="width: 19%;">&nbsp;</td>
                                                <td style="width: 19%;">&nbsp;</td>
                                                <td style="width: 5%;">&nbsp;</td>
                                                <td style="width: 19%;background: #eee;color: red;"><input type="hidden" name="grand_total" value="<?php echo $grand_total; ?>"><?php echo $grand_tot; ?></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <?php 

                                    // $month = echo date('M', strtotime($attendance_month));
                                    // echo $month;die;
                                ?>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Bill For The Month : </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" value="<?php echo date('M, Y', strtotime($attendance_month)); ?>" name="bill_month">
                                            </div>
                                          </div>
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
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Ref No : </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" placeholder="12" name="ref_no">
                                            </div>
                                          </div>
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
                                <?php 
                                    $get_amount= AmountInWords($grand_total);

                                ?>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Amount In Words : </label>
                                            <div class="col-sm-9">
                                                
                                                <p><?php echo $get_amount; ?></p>
                                            </div>
                                          </div>
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
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Note To Print In Bill : </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" placeholder="Three Thousand" name="note_to_print">
                                            </div>
                                          </div>
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
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Covering : </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" placeholder="" name="covering">
                                            </div>
                                          </div>
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
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group row">
                                            <label for="colFormLabelSm" class="col-sm-3 col-form-label col-form-label-sm">Narration : </label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control form-control-sm" placeholder="" name="narration">
                                            </div>
                                          </div>
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
                                <div class="row">
                                    <div class="col-md-5"></div>
                                    <div class="col-md-2">
                                        <button type="submit" class="cr-a">Save</button>
                                    </div>
                                    <div class="col-md-5"></div>
                                </div>
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


<?php 
    // Create a function for converting the amount in words
function AmountInWords(float $amount)
{
   $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
   // Check if there is any number after decimal
   $amt_hundred = null;
   $count_length = strlen($num);
   $x = 0;
   $string = array();
   $change_words = array(0 => '', 1 => 'One', 2 => 'Two',
     3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
     7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
     10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
     13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
     16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
     19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
     40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
     70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
    $here_digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
    while( $x < $count_length ) {
      $get_divider = ($x == 2) ? 10 : 100;
      $amount = floor($num % $get_divider);
      $num = floor($num / $get_divider);
      $x += $get_divider == 10 ? 1 : 2;
      if ($amount) {
       $add_plural = (($counter = count($string)) && $amount > 9) ? 's' : null;
       $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
       $string [] = ($amount < 21) ? $change_words[$amount].' '. $here_digits[$counter]. $add_plural.' 
       '.$amt_hundred:$change_words[floor($amount / 10) * 10].' '.$change_words[$amount % 10]. ' 
       '.$here_digits[$counter].$add_plural.' '.$amt_hundred;
        }
   else $string[] = null;
   }
   //print_r($string);die;
   $implode_to_Rupees = implode('', array_reverse($string));
   //echo $implode_to_Rupees;die;
  /* $get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . " 
   " . $change_words[$amount_after_decimal % 10]) . ' Paise' : '';*/
   //return ($implode_to_Rupees ? $implode_to_Rupees . 'Rupees ' : '') . $get_paise;
   return $implode_to_Rupees . 'Rupees';
}

?>
	
	 