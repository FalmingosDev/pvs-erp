<!DOCTYPE html>
<html>
<head>
<title>PVS ERP</title>
</head>

<body>
    <table style="width: 100%;">
        <tr>
            <td style="width: 100%;text-align: center;font-size: 35px;padding: 0px 0px 15px;">
                Client Attendance Received Report
            </td>
        </tr>
        <tr>
            <td style="width: 100%;">
                <table style="width: 100%;border: 1px solid #000;">
                    <thead>
                        <tr>
                            <th style="width: 8%;border: 1px solid #000;padding: 3px 4px;font-size: 20px;">Sno</th>
                            <th style="width: 16%;border: 1px solid #000;padding: 3px 4px;font-size: 20px;">Unit Name/ Location</th>
                            <th style="width: 16%;border: 1px solid #000;padding: 3px 4px;font-size: 20px;">Attendance Feeded/Received</th>
                            <th style="width: 16%;border: 1px solid #000;padding: 3px 4px;font-size: 20px;">Salary Paid</th>
                            <th style="width: 16%;border: 1px solid #000;padding: 3px 4px;font-size: 20px;">Cash</th>
                            <th style="width: 16%;border: 1px solid #000;padding: 3px 4px;font-size: 20px;">Bank</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        if(!empty($client_attendance))
                        {
                            foreach($client_attendance as $k => $client_attendance_row) 
                            { ?>
                                <tr>
                                    <td style="width: 8%;text-align: center;border: 1px solid #000;padding: 3px 4px;font-size: 20px;"><?=($k+1)?></td>
                                    <td style="width: 16%;border: 1px solid #000;padding: 3px 4px;font-size: 20px;"><?=$client_attendance_row->client_name; ?></td>
                                    <td style="width: 16%;border: 1px solid #000;padding: 3px 4px;font-size: 20px;"><?= date("d-m-Y H-i-s", strtotime($client_attendance_row->created_ts))?></td>
                                    <td style="width: 16%;text-align: center;border: 1px solid #000;padding: 3px 4px;font-size: 20px;">
                                        <?php
                                        if($client_attendance_row->salary_processed_flag==0)
                                        {
                                            echo "N";
                                        }
                                        else
                                        {
                                            echo "Y";
                                        }
                                        ?>
                                    </td>
                                    <td style="width: 16%;border: 1px solid #000;padding: 3px 4px;font-size: 20px;"></td>
                                    <td style="width: 16%;border: 1px solid #000;padding: 3px 4px;font-size: 20px;"></td>   
                                </tr>
                            <?php 
                            }
                        } 
                    ?>
                       
                    </tbody>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
