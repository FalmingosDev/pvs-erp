<!DOCTYPE html>
<html>
<head>
<title>TID PDF</title>
</head>

<body>
    <h2 style="text-align: center">TID Generation</h2>
    <table style="width: 100%;border: 1px solid #000;">    
        <thead>
            <tr>
                <th style="border: 1px solid #000;">TID</th>
                <th style="border: 1px solid #000;">Unit Code</th>
                <th style="border: 1px solid #000;">Unit</th>
                <th style="border: 1px solid #000;">Location</th>
                <th style="border: 1px solid #000;">Employee Code</th>
                <th style="border: 1px solid #000;">Employee Name</th>
                <th style="border: 1px solid #000;">Employee Designation</th>
                <th style="border: 1px solid #000;">A/C No</th>
                <th style="border: 1px solid #000;">Reference No</th>
                <th style="border: 1px solid #000;">Bank Name</th>
                <th style="border: 1px solid #000;">Net Pay</th>
                <th style="border: 1px solid #000;">Pay Date</th>
                <th style="border: 1px solid #000;">Company Location</th>
                <th style="border: 1px solid #000;">Com Cash</th>
                <th style="border: 1px solid #000;">Com Bank</th>
                <th style="border: 1px solid #000;">Com Corpid</th>
                <th style="border: 1px solid #000;">Com Dbcr</th>
                <th style="border: 1px solid #000;">Com Narr</th>
                <th style="border: 1px solid #000;">Com Scat</th>
                <th style="border: 1px solid #000;">Com Regi</th>
                
            </tr>
        </thead>
        <tbody>
            <?PHP
                foreach($list as $list){								
            ?>
            <tr>
                <td style="text-align: center; border: 1px solid #000;"><?PHP echo $list->tid; ?></td>
                <td style="text-align: center; border: 1px solid #000;"><?PHP echo $list->client_code; ?></td>
                <td style="text-align: center; border: 1px solid #000;"><?PHP echo $list->client_name; ?></td>
                <td style="text-align: center; border: 1px solid #000;"><?PHP echo $list->branch_name; ?></td>
                <td style="text-align: center; border: 1px solid #000;"><?PHP echo $list->employee_code; ?></td>
                <td style="text-align: center; border: 1px solid #000;"><?PHP echo $list->employee_name; ?></td>
                <td style="text-align: center; border: 1px solid #000;"><?PHP echo $list->employee_desig; ?></td>
                <td style="text-align: center; border: 1px solid #000;"><?PHP echo $list->account_no; ?></td>
                <td style="text-align: center; border: 1px solid #000;"><?PHP echo $list->reference_no; ?></td>
                <td style="text-align: center; border: 1px solid #000;"><?PHP echo $list->bank_name; ?></td>
                <td style="text-align: center; border: 1px solid #000;"><?PHP echo $list->net_pay; ?></td>
                <td style="text-align: center; border: 1px solid #000;"><?PHP echo $list->payment_date =  date('d.m.Y', strtotime($list->payment_date)); ?></td>
                <td style="text-align: center; border: 1px solid #000;">&nbsp;</td>
                <td style="text-align: center; border: 1px solid #000;">&nbsp;</td>
                <td style="text-align: center; border: 1px solid #000;">&nbsp;</td>
                <td style="text-align: center; border: 1px solid #000;">&nbsp;</td>
                <td style="text-align: center; border: 1px solid #000;">&nbsp;</td>
                <td style="text-align: center; border: 1px solid #000;">&nbsp;</td>
                <td style="text-align: center; border: 1px solid #000;">&nbsp;</td>
                <td style="text-align: center; border: 1px solid #000;">&nbsp;</td>

            </tr>
            <?PHP 									
              }																
            ?>
        </tbody>
    </table>
</body>

</html>