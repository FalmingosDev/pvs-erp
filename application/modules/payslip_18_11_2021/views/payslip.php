<!DOCTYPE html>
 <?PHP //echo $payslip_lst->payment_month; ?>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="INSPIRO" />
    <meta name="description" content="Themeforest Template Polo">
    <!-- Document title -->
    <title>Payslip</title>
   
   <!-- jQuery -->
    <script src="assets/jquery/dist/jquery.min.js"></script>
	<script src="js/common-functions.js"></script>
</head>

<body>
    <div style="width: 100%">
        <div style="width: 87%;margin: 0 auto;background: #fff;padding: 20px 28px;border: 1px solid #000;">
            <table>
        <tr>
            <td style="width: 5%;"><img src="images/pvs-2.png" style="width: 70px;"></td>
            <td style="width: 90%; text-align: center;"><h2 style="font-size: 36px;margin-top: 0;margin-bottom: 0;">Premier Vigilance & Security Pvt. Ltd</h2><span style="display: block;font-size: 20px;margin: 4px 0px;">Adm. Office : 40B, Darga Road, Kolkata - 700017</span><span style="display: block;font-size: 20px;margin: 8px 0px;">FORM XV/XIX</span></td>
            <td style="width: 5%;"><img src="images/pvs-1.png" style="float: right;width: 70px;"></td>
       </tr>
    </table>
            <table>
                <tr>
                    <td colspan="2" style="width: 100%;font-size: 15px;font-weight: 600;">Branch: <?PHP echo $payslip_lst->branch_name; ?> - <?PHP echo $payslip_lst->address; ?></td>
                    <td colspan="2" style="width: 30%;font-size: 13px;font-weight: 600;">&nbsp;</td>
                    <td  colspan="2" style="width: 40%;padding-right: 44px;">&nbsp;<span id=""></span></td>
                    
                </tr>
                
            </table>  
            <table>
                <tr>
                    <td colspan="2" style="width: 38%;font-size: 15px;font-weight: 600;">&nbsp;<span id="" style="font-size: 15px;"></span></td>
                    
                    <td  colspan="2" style="width: 40%;padding-right: 44px;">UAN :&nbsp;&nbsp;<?PHP echo $payslip_lst->uan; ?></td>
                    <td colspan="2" style="width: 30%;font-size: 13px;font-weight: 600;">&nbsp;</td>
                </tr>
                <tr>
                    <td style="width: 38%;font-size: 13px;font-weight: 600;">WAGE SLIP FOR THE MONTH OF - <?PHP echo $payslip_lst->payment_month; ?></td>
                    <td style="width: 30%;font-size: 19px;font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;</td>
                    <td style="width: 40%;font-size: 15px;">CLIENT NAME:&nbsp;&nbsp;<?PHP echo $payslip_lst->client_name; ?></td>  
                </tr>
                <tr>
                    <td style="width: 38%;">Employee Code:&nbsp;&nbsp; <?PHP echo $payslip_lst->employee_code; ?></td>
                    <td style="width: 20%">&nbsp;</td>
                    <td style="width: 40%;font-size: 15px;">LOCATION :&nbsp;&nbsp;<?PHP echo $payslip_lst->emp_name; ?></td>  
                </tr>
                <tr>
                    <td style="width: 38%;">Employee Name:&nbsp;&nbsp; <?PHP echo $payslip_lst->emp_name; ?></td>
                    <td style="width: 20%">&nbsp;</td>
                    <td style="width: 40%;font-size: 15px;">EPF NO :&nbsp;&nbsp;<?PHP echo $payslip_lst->epf; ?></td>  
                </tr>
                <tr>
                    <td id="emp_desig-col" style="width: 38%;">Rank:&nbsp;&nbsp; <?PHP echo $payslip_lst->desig_name; ?></td>
                    <td style="width: 20%">&nbsp;</td>
                    <td style="width: 40%;font-size: 15px;">ESI NO :&nbsp;&nbsp;<?PHP echo $payslip_lst->esi; ?></td>  
                </tr>
                <tr>
                    <td style="width: 38%;"> <span id="army_rank"></span></td>
                    <td style="width: 20%">&nbsp;</td>
                    <td style="width: 40%;font-size: 15px;">&nbsp;<span style="font-size: 13px;">&nbsp;</span></td>    
                </tr>
            </table>
            <table style="border: 1px solid #000;width: 100%">
                <!--<tr>  
                    <th style="border-right: 1px solid #000;">Attendance</th>
                    <th style="border-right: 1px solid #000;">Rate Earnings</th>
                    <th>Rate Earnings</th>
                </tr>
                <tr style="width: 30%">
                    <td>
                        <tr>
                            <td style="width: 80%">DUTY</td>
                            <td style="width: 20%">26.000</td>  
                        </tr>
                    </td>
                </tr>-->
            </table>
           
            
            <table style="width: 100%;border: 1px solid #000;">
                <tr>
                    <th colspan="1" style="border: 1px solid #000;">ATTENDANCE</th>
                    <th colspan="1" style="border: 1px solid #000;">EARNINGS</th>
                    <th colspan="1" style="border: 1px solid #000;">DEDUCTIONS</th>  
                </tr>
                <tr>
                    <td style="border: 1px solid #000;border-bottom: none;border-top: none;">
                        <table style="width: 100%;">
                            <!--<tr id="duties-row">
                                <td id="duties-col" style="padding-left: 10px;">Duty</td>
                                 
                                <td id="duties" style="text-align: right;padding-right: 10px;"></td>
                            </tr>-->
                            <tr id="otduty-row">
                                <td id="otduty-col" style="padding-left: 10px;">OT Duty</td> 
                                <td id="otduty" style="text-align: right;padding-right: 10px;"> <?PHP echo $payslip_lst->otduty; ?></td>
                            </tr>
                            <tr id="live-day-row">
                                <td id="live-day-col" style="padding-left: 10px;">  </td> 
                                <td id="live-day" style="text-align: right;padding-right: 10px;"></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 10px;">&nbsp;</td> 
                                <td style="text-align: right;padding-right: 10px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 10px;">&nbsp;</td> 
                                <td style="text-align: right;padding-right: 10px;">&nbsp;</td>
                            </tr>
                            <tr style="box-shadow: 0px 1px 0px #000;">
                                <td style="padding-left: 10px;">&nbsp;</td> 
                                <td style="text-align: right;padding-right: 10px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 10px;">&nbsp;</td> 
                                <td style="text-align: right;padding-right: 10px;">&nbsp;</td>
                            </tr>
                            <tr id="b-w-rate-row">
                                <td id="b-w-rate-col" style="padding-left: 10px;">Rate</td> 
                                <td id="b-w-rate" style="text-align: right;padding-right: 10px;"><?PHP echo $payslip_lst->rate; ?></td>
                            </tr>
                            <tr style="box-shadow: 0px 1px 0px #000;">
                                <td style="padding-left: 10px;">&nbsp;</td> 
                                <td style="text-align: right;padding-right: 10px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 10px;">&nbsp;</td> 
                                <td style="text-align: right;padding-right: 10px;">&nbsp;</td>
                            </tr>
                            <tr id="bank-row">
                                <td id="bank-col" style="padding-left: 1px;width: 83px;"> Bank Name:</td> 
                                <td id="bank" style="text-align: left;padding-right: 1px;"><?PHP echo $payslip_lst->bank_name; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 10px;">&nbsp;</td> 
                                <td style="text-align: right;padding-right: 10px;">&nbsp;</td>
                            </tr>
                            <tr id="acno-row">
                                <td id="acno-col" style="padding-left: 1px;">A/C No:</td> 
                                <td id="acno" style="text-align: left;padding-right: 1px;"><?PHP echo $payslip_lst->account_no; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 10px;">&nbsp;</td> 
                                <td style="text-align: right;padding-right: 10px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 10px;"><b>&nbsp;</b></td> 
                                <td style="text-align: right;padding-right: 10px;">&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                     <td valign="top">
                        <table style="width: 100%;">
                            <tr id="basic-row">
                                <td id="basic-col" style="padding-left: 10px;">Basic wage</td>
                                 
                                <td id="basic" style="text-align: right;padding-right: 10px;"><?PHP echo $payslip_lst->basic; ?></td>
                            </tr>
                            <tr id="vda-row">
                                <td id="vda-col" style="padding-left: 10px;">VDA</td> 
                                <td id="vda" style="text-align: right;padding-right: 10px;"><?PHP echo $payslip_lst->vda; ?></td>
                            </tr>
                            <tr id="hra-row">
                                <td id="hra-col" style="padding-left: 10px;">H.R.A</td> 
                                <td id="hra" style="text-align: right;padding-right: 10px;"><?PHP echo $payslip_lst->hra; ?></td>
                            </tr>
                            <tr id="conv-row">
                                <td id="conv-col" style="padding-left: 10px;">Conveyance Allowance</td> 
                                <td id="conv" style="text-align: right;padding-right: 10px;"><?PHP echo $payslip_lst->conv; ?></td>
                            </tr> 
                            <tr id="supv-row">
                                <td id="supv-col" style="padding-left: 10px;">Supervisory Allowance</td> 
                                <td id="supv" style="text-align: right;padding-right: 10px;"><?PHP echo $payslip_lst->supv; ?></td>
                            </tr>
                            <tr id="gun-row">
                                <td id="gun-col" style="padding-left: 10px;">Gun Allowance</td> 
                                <td id="gun" style="text-align: right;padding-right: 10px;"><?PHP echo $payslip_lst->gun; ?></td>
                            </tr>
                            <tr id="spl-row">
                                <td id="spl-col" style="padding-left: 10px;">SPL Allowance</td> 
                                <td id="spl" style="text-align: right;padding-right: 10px;"><?PHP echo $payslip_lst->spl; ?></td>
                            </tr>
                            <tr id="unifrm-row">
                                <td id="unifrm-col" style="padding-left: 10px;">Uniform Allowance</td> 
                                <td id="unifrm" style="text-align: right;padding-right: 10px;"><?PHP echo $payslip_lst->uniform; ?></td>
                            </tr>
                            <tr id="wash-row">
                                <td id="wash-col" style="padding-left: 10px;">Washing Allowance</td> 
                                <td id="wash" style="text-align: right;padding-right: 10px;"><?PHP echo $payslip_lst->wash; ?></td>
                            </tr>
                            <tr id="bonus-row">
                                <td id="bonus-col" style="padding-left: 10px;">Bonus</td> 
                                <td id="bonus" style="text-align: right;padding-right: 10px;"><?PHP echo $payslip_lst->bonus; ?></td>
                            </tr>
                            <tr id="nh-row">
                                <td id="nh-col" style="padding-left: 10px;">National Holiday </td> 
                                <td id="nh" style="text-align: right;padding-right: 10px;"><?PHP echo $payslip_lst->nh; ?></td>
                            </tr>
                            <tr id="leave_s-row">
                                <td id="leave_s-col" style="padding-left: 10px;">Leave</td> 
                                <td id="leave_s" style="text-align: right;padding-right: 10px;"><?PHP echo $payslip_lst->leave; ?></td>
                            </tr>
                            <tr id="na-row">
                                <td id="na-col" style="padding-left: 10px;">N.A</td> 
                                <td id="na" style="text-align: right;padding-right: 10px;"><?PHP echo $payslip_lst->na; ?></td>
                            </tr>
                            <tr id="otpay-row" style="">
                                <td id="otpay-col" style="padding-left: 10px;">OT Pay</td> 
                                <td id="otpay" style="text-align: right;padding-right: 10px;"><?PHP echo $payslip_lst->otpay; ?></td>
                            </tr>
							<tr id="fieldn1-row">
                                <td id="fieldn1" style="padding-left: 10px;"></td> 
                                <td id="fieldv1" style="text-align: right;padding-right: 10px;"></td>
                            </tr>
							<tr id="fieldn2-row">
                                <td id="fieldn2" style="padding-left: 10px;"></td> 
                                <td id="fieldv2" style="text-align: right;padding-right: 10px;"></td>
                            </tr>
							<tr id="fieldn3-row">
                                <td id="fieldn3" style="padding-left: 10px;"></td> 
                                <td id="fieldv3" style="text-align: right;padding-right: 10px;"></td>
                            </tr>
							<tr id="fieldn4-row">
                                <td id="fieldn4" style="padding-left: 10px;"></td> 
                                <td id="fieldv4" style="text-align: right;padding-right: 10px;"></td>
                            </tr>
                            <tr id="gross-row">
                                <td id="" style="padding-left: 10px;padding-top: 10px;padding-bottom: 10px;"><b>&nbsp;</b></td> 
                                <td id="" style="text-align: right;padding-right: 10px;padding-top: 10px;padding-bottom: 10px;">&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                     <td>
                        <table style="width: 100%;border: 1px solid #000;border-bottom: none;border-top: none;">
                            
                            <tr id="pf-row">
                                <td id="pf-col" style="padding-left: 10px;">PF</td>
                                 
                                <td id="pf" style="text-align: right;padding-right: 10px;"><?PHP echo $payslip_lst->pf; ?></td>
                            </tr>
                            <tr id="esi-row">
                                <td id="esi-col" style="padding-left: 10px;">ESI</td> 
                                <td id="esi" style="text-align: right;padding-right: 10px;"><?PHP echo $payslip_lst->esi; ?></td>
                            </tr>
                            <tr id="ptax-row">
                                <td id="ptax-col" style="padding-left: 10px;">PT</td> 
                                <td id="ptax" style="text-align: right;padding-right: 10px;"><?PHP echo $payslip_lst->ptax; ?></td>
                            </tr>
                            <tr id="lwf-row">
                                <td id="lwf-col" style="padding-left: 10px;">LWF</td> 
                                <td id="lwf" style="text-align: right;padding-right: 10px;"><?PHP echo $payslip_lst->lwf; ?></td>
                            </tr>
                            <tr id="adv-row">
                                <td id="adv-col" style="padding-left: 10px;">Adv. Recovery</td> 
                                <td id="adv" style="text-align: right;padding-right: 10px;"><?PHP echo $payslip_lst->adv; ?></td>
                            </tr>
                            <tr style="">
                                <td style="padding-left: 10px;">&nbsp;</td> 
                                <td style="text-align: right;padding-right: 10px;">&nbsp;</td>
                            </tr>
                            <tr >
                                <td style="padding-left: 10px;">&nbsp;</td> 
                                <td style="text-align: right;padding-right: 10px;">&nbsp;</td>
                            </tr>
                            
                            <tr style="">
                                <td style="padding-left: 10px;">&nbsp;</td> 
                                <td style="text-align: right;padding-right: 10px;">&nbsp;</td>
                            </tr>
                            
                            <tr style="box-shadow: 0px 1px 0px #000;">
                                <td style="padding-left: 10px;">&nbsp;</td> 
                                <td style="text-align: right;padding-right: 10px;">&nbsp;</td>
                            </tr>
                            <tr id="totded-row" style="box-shadow: 0px 1px 0px #000;">
                                <td id="totded-col" style="padding-left: 10px;padding-top: 10px;padding-bottom: 10px;"><b>TOTAL DEDUCTION</b></td> 
                                <td id="totded" style="text-align: right;padding-right: 10px;padding-top: 10px;padding-bottom: 10px;"><?PHP echo $payslip_lst->total_deduction; ?></td>
                            </tr>
                            <tr>
                                <td style="padding-left: 10px;">&nbsp;</td> 
                                <td style="text-align: right;padding-right: 10px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 10px;">&nbsp;</td> 
                                <td style="text-align: right;padding-right: 10px;">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="padding-left: 10px;">&nbsp;</td> 
                                <td style="text-align: right;padding-right: 10px;">&nbsp;</td>
                            </tr>
                            <tr style="">
                                <td style="padding-left: 10px;">&nbsp;</td> 
                                <td style="text-align: right;padding-right: 10px;">&nbsp;</td>
                            </tr>
                            <tr style="">
                                <td style="padding-left: 10px;">&nbsp;</td> 
                                <td style="text-align: right;padding-right: 10px;">&nbsp;</td>
                            </tr>
                            <tr id="net_pay-row">
                                <td id="" style="padding-left: 10px;padding-top: 10px;padding-bottom: 10px;"><b>&nbsp;</b></td> 
                                <td id="" style="text-align: right;padding-right: 10px;">&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>
               <tr>
                   <td style="border-left: 1px solid #000;border-right: 1px solid #000;">
                    <table style="width: 100%;">
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>   
                    </table>
                   </td>
                   <td style="border-top: 1px solid #000;padding-top: 10px;padding-bottom: 10px;">
                    <table style="width: 100%;">
                        <tr>
                            <td id="gross-col"><b>GROSS SALARY</b></td>
                            <td id="gross" style="text-align: right;font-weight: bold;"><?PHP echo $payslip_lst->gross; ?></td>     
                        </tr>   
                    </table>
                   </td>
                   <td style="border-left: 1px solid #000;border-top: 1px solid #000;padding-top: 10px;padding-bottom: 10px;">
                    <table style="width: 100%;">
                        <tr>
                            <td id="net_pay-col"><b>NET SALARY</b></td>
                            <td id="net_pay" style="text-align: right;font-weight: bold;"><?PHP echo $payslip_lst->netpay; ?></td>
                        </tr>   
                    </table>
                   </td>
                </tr>
                
            </table>

			<p id="download_pdf" align="center">
            <!-- <a href="payslip-pdf.php?emp_code=001748&sal_month=Aug-20&unitcode=10005" target="_blank" style="background:#1f91f3; padding:6px 12px; color:#fff; text-decoration:none;  -->
				<!-- border-radius:3px; font-family:Arial, 'Arial Black'; ">Download Payslip</a> -->
			</p>
        </div>  
    </div>
   
   
 
</body>

</html>
<script>

</script>