<!DOCTYPE html>
<html>
<head>
<title>PVS ERP</title>
</head>

<body>
    <table style="width: 100%;">
        <tr>
            <td style="width: 100%;font-size: 60px;font-weight: bold;">
               Premier Vigilance Security Pvt.Ltd
            </td>
        </tr>
         <tr>
            <td style="width: 100%;">
               <table style="width: 100%;">
                    <tr>
                        <td style="width: 85%;font-size: 40px;">
                            Regd office : 4B Orient Road, Kolkata - 700017
                        </td>
                        <td style="width: 15%;font-size: 40px;">
                            Arr No : <?= $area_payment[0]->arrear_no?>
                        </td>
                    </tr>
               </table>
            </td>
        </tr>
        <tr>
            <td style="width: 100%;">
                <table style="width: 100%;">
                    <tr>
                    <td style="width: 100%;font-size: 35px;text-align: right;">
                        Unit Code : <?= $area_payment[0]->client_code?>
                    </td>
                </tr> 
                </table>
            </td>
        </tr>
        <tr>
             <td style="width: 100%;">
                <table style="width: 100%;">
                   <tr>
                        <td style="width: 60%;font-size: 50px;font-weight: bold;text-align: right;">
                            Arrear Salary
                        </td>
                       <td style="width: 5%;"></td>
                        <td style="width: 35%;font-size: 45px;font-weight: bold;">
                            Unit : <?= $area_payment[0]->client_name?>
                        </td>
                    </tr> 
                </table>
             </td>
        </tr>
        <tr>
            <td style="width: 100%;border-bottom: 2px solid #000;">
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 30%;font-size: 40px;font-weight: bold;">Month Processed <?=$month?></td>
                        <td style="width: 10%;font-size: 35px;font-weight: bold;"><?=$year?></td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;">Period:</td>
                        <td style="width: 10%;font-size: 35px;"><?= date("d-m-Y", strtotime($area_payment[0]->arrear_salary_range_from))?></td>
                        <td style="width: 2%;font-size: 35px;text-align: center;">to</td> 
                        <td style="width: 10%;font-size: 35px;"><?= date("d-m-Y", strtotime($area_payment[0]->arrear_salary_range_to))?></td>
                        <td style="width: 30%;"></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width: 100%;">
                <table style="width: 100%;">
                    <tr>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;">Sno</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;">Emp No</th>
                        <th style="width: 12%;font-size: 35px;font-weight: bold;">Employee<br> Name</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;">Duties</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;">Basic</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;">Gross</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;">PF</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;">ESI</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;">P/T</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;">TDedt</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;">Net Pay</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;">Signature</th>  
                    </tr>
                    <tr>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;">&nbsp;</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;">&nbsp;</th>
                        <th style="width: 12%;font-size: 35px;font-weight: bold;">Father's<br> Name</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;">&nbsp;</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;">OT</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;">&nbsp;</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;">&nbsp;</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;">&nbsp;</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;">&nbsp;</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;">&nbsp;</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;">&nbsp;</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;">Or</th>    
                    </tr>
                    <tr>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;border-bottom: 1px solid #000;">&nbsp;</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;border-bottom: 1px solid #000;">&nbsp;</th>
                        <th style="width: 12%;font-size: 35px;font-weight: bold;border-bottom: 1px solid #000;">Designation</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;border-bottom: 1px solid #000;">&nbsp;</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;border-bottom: 1px solid #000;">+</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;border-bottom: 1px solid #000;">&nbsp;</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;border-bottom: 1px solid #000;">&nbsp;</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;border-bottom: 1px solid #000;">&nbsp;</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;border-bottom: 1px solid #000;">&nbsp;</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;border-bottom: 1px solid #000;">&nbsp;</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;border-bottom: 1px solid #000;">&nbsp;</th>
                        <th style="width: 8%;font-size: 35px;font-weight: bold;border-bottom: 1px solid #000;">Thumb<br> Impression</th>    
                    </tr>
                    <?php 
                    $count=1;
                    $total_net=0;
                    $total_td=0;
                    $total_pt=0;
                    $total_esi=0;
                    $total_pf=0;
                    $total_groos=0;
                    $total_duties=0;
                    foreach($area_payment as $area_payment_row)
                    {
                        $total_net=$total_net+$area_payment_row->net_pay;
                        $total_td=$total_td+$area_payment_row->total_deduction;
                        $total_pt=$total_pt+$area_payment_row->ptax;
                        $total_esi=$total_esi+$area_payment_row->esi;
                        $total_pf=$total_pf+$area_payment_row->epf;
                        $total_groos=$total_groos+$area_payment_row->gross_pay;
                        $total_duties=$total_duties+$area_payment_row->billing_days;

                    ?>
                    <tr>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;"><?=$count?></td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;"><?=$area_payment_row->employee_code?></td>
                        <td style="width: 12%;font-size: 35px;font-weight: bold;text-align: center;"><?=$area_payment_row->name?></td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;"><?=$area_payment_row->billing_days?></td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;"><?=$area_payment_row->basic?></td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;"><?=$area_payment_row->gross_pay?></td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;"><?=$area_payment_row->epf?></td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;"><?=$area_payment_row->esi?></td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;"><?=$area_payment_row->ptax?></td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;"><?=$area_payment_row->total_deduction?></td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;"><?=$area_payment_row->net_pay?></td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>    
                    </tr>
                    <tr>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;border-top: 1px solid #000;border-left: 1px solid #000;border-right: 1px solid #000;text-align: center;">Salary</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;"><?=$area_payment_row->father_name.' '. $area_payment_row->last_name?></td>
                        <td style="width: 12%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>    
                    </tr>
                    <tr>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;border-left: 1px solid #000;border-right: 1px solid #000;text-align: center;">Month</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;"><?=$area_payment_row->desig_name?></td>
                        <td style="width: 12%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">New</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">Old</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>    
                    </tr>
                    <tr>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;border-left: 1px solid #000;border-right: 1px solid #000;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 12%;font-size: 35px;font-weight: bold;text-align: center;">Basic</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;"><?=$area_payment_row->new_basic?></td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;"><?=$area_payment_row->old_basic?></td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">Uan:</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;"><?=$area_payment_row->uan?></td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>    
                    </tr>
                    <tr>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;border-left: 1px solid #000;border-right: 1px solid #000;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;text-align: center;">PF No : <?=$area_payment_row->pf_no?></td>
                        <td style="width: 12%;font-size: 35px;text-align: center;">Gross</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;"><?=$area_payment_row->new_gross?></td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;"><?=$area_payment_row->old_gross?></td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">Bank Nm:</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;"><?=$area_payment_row->bank_name?></td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>    
                    </tr>
                    <tr>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;border-left: 1px solid #000;border-bottom: 1px solid #000;border-right: 1px solid #000;text-align: center;"><?= date("d-m-Y", strtotime($area_payment_row    ->salary_month))?></td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">ESI No : <?=$area_payment_row->esi_no?></td>
                        <td style="width: 12%;font-size: 35px;font-weight: bold;text-align: center;">OT</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;"><?=$area_payment_row->new_ot?></td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;"><?=$area_payment_row->old_ot?></td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">A/C No:</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;"><?=$area_payment_row->account_no?></td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;text-align: center;">&nbsp;</td>    
                    </tr>
                    <?php
                    $count++;
                    }
                    ?>
                    <br>
                    <tr>
                        <td style="width: 8%;font-size: 35px;border-top: 1px solid #000;padding-top: 10px;text-align: center;">&nbsp;</td>  
                        <td style="width: 8%;font-size: 35px;border-top: 1px solid #000;padding-top: 10px;text-align: center;">Unit Salary Total</td>
                        <td style="width: 8%;font-size: 35px;border-top: 1px solid #000;padding-top: 10px;text-align: center;">&nbsp;</td>
                        <td style="width: 12%;font-size: 35px;font-weight: bold;border-top: 1px solid #000;padding-top: 10px;text-align: center;"><?=$total_duties?></td>
                        <td style="width: 8%;font-size: 35px;border-top: 1px solid #000;padding-top: 10px;text-align: center;"><?=$total_pf?></td>
                        <td style="width: 8%;font-size: 35px;border-top: 1px solid #000;padding-top: 10px;text-align: center;"><?=$total_esi?></td>
                        <td style="width: 8%;font-size: 35px;border-top: 1px solid #000;padding-top: 10px;text-align: center;"><?=$total_pt?></td>
                        <td style="width: 8%;font-size: 35px;border-top: 1px solid #000;padding-top: 10px;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;border-top: 1px solid #000;padding-top: 10px;text-align: center;"><?=$total_td?></td>
                        <td style="width: 8%;font-size: 35px;border-top: 1px solid #000;padding-top: 10px;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;border-top: 1px solid #000;padding-top: 10px;text-align: center;"><?=$total_net?></td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;border-top: 1px solid #000;padding-top: 10px;text-align: center;">&nbsp;</td>    
                    </tr>  
                    <tr>
                        <td style="width: 8%;font-size: 35px;border-bottom: 1px solid #000;padding-bottom: 10px;text-align: center;">&nbsp;</td>  
                        <td style="width: 8%;font-size: 35px;border-bottom: 1px solid #000;padding-bottom: 10px;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;border-bottom: 1px solid #000;padding-bottom: 10px;text-align: center;">&nbsp;</td>
                        <td style="width: 12%;font-size: 35px;font-weight: bold;border-bottom: 1px solid #000;padding-bottom: 10px;text-align: center;"></td>
                        <td style="width: 8%;font-size: 35px;border-bottom: 1px solid #000;padding-bottom: 10px;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;border-bottom: 1px solid #000;padding-bottom: 10px;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;border-bottom: 1px solid #000;padding-bottom: 10px;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;border-bottom: 1px solid #000;padding-bottom: 10px;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;border-bottom: 1px solid #000;padding-bottom: 10px;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;border-bottom: 1px solid #000;padding-bottom: 10px;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;border-bottom: 1px solid #000;padding-bottom: 10px;text-align: center;">&nbsp;</td>
                        <td style="width: 8%;font-size: 35px;font-weight: bold;border-bottom: 1px solid #000;padding-top: 10px;text-align: center;">&nbsp;</td>    
                    </tr>
                    
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
