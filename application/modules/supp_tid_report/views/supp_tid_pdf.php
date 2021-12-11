<!DOCTYPE html>
<html>
<head>
<title>Supplimentary Payment Bank Transfer Statement PDF</title>
</head>

<body>
    <table style="width: 100%">
        <tr>
            <td align="center" style="width: 100%text-align: center;display:block;margin: 0 auto;">
                <img src="<?php echo base_url() . 'assets/images/logo_pvs_grey.jpg'; ?>">
            </td>
        </tr>
        <tr>
            <td style="width: 100%;font-weight: bold;text-align: right;padding: 20px 0px 10px;">
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 70%;font-weight: bold;font-size: 16px;text-align: right;">
                            TID : <?PHP echo $tid; ?>
                        </td>
                        <td style="width: 30%;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width: 100%;font-weight: bold;text-align: right;">
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 50%;font-weight: bold;font-size: 13px;text-align: right;">
                            Supplimentary Payment Bank Transfer Statement
                        </td>
                        <td style="width: 30%;font-size: 15px;">Print Date: <?php echo date("d/m/Y"); ?></td>    
                        <td style="width: 20%;"><?php date_default_timezone_set("Asia/Kolkata");echo date("H:i:s"); ?></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width: 100%;">
                <table style="width: 100%;border: 1px solid #000;">    
        <thead>
            <tr>
                <th style="border: 1px solid #000;">A/C No</th>
                <th style="border: 1px solid #000;">Reference No</th>
                <th style="border: 1px solid #000;">Bank Name</th>
                <th style="border: 1px solid #000;">Net Pay</th>
                <th style="border: 1px solid #000;">Employee Code & Employee Name</th>
                <th style="border: 1px solid #000;">Unit Name & Location</th>
            </tr>
        </thead>
        <tbody>
            <?PHP
                foreach($list as $list){								
            ?>
            <tr>
            
                <td style="text-align: center; border: 1px solid #000;"><?PHP echo $list->account_no; ?></td>
                <td style="text-align: center; border: 1px solid #000;"><?PHP echo $list->reference_no; ?></td>
                <td style="text-align: center; border: 1px solid #000;"><?PHP echo $list->bank_name; ?></td>
                <td style="text-align: center; border: 1px solid #000;"><?PHP echo $list->net_pay; ?></td>
                <td style="text-align: center; border: 1px solid #000;"><?PHP echo $list->employee; ?></td>
                <td style="text-align: center; border: 1px solid #000;"><?PHP echo $list->client; ?></td>

            </tr>
            <?PHP 									
              }																
            ?>
            <tr>
                <td></td>
                <td colspan="2">Unit Total</td>
                <td style="text-align: center;"><?PHP echo $total->unit_total; ?></td>
            </tr>
        </tbody>
    </table>
            </td>
        </tr>
    </table>
</body>

</html>