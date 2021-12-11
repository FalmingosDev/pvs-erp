<!DOCTYPE html>
<html>
<head>
<title>PVS-ERP</title>
</head>

<body>
    <table style="width: 100%;padding: 10px 0px;">
        <tr>
            <td style="width: 100%;font-weight: bold;">
                PVS FORM NO. 103
            </td>
        </tr>
        <tr>
            <td style="width: 100%;font-weight: bold;">
                Declaration cum Bio-data
            </td>
        </tr>
        <tr>
            <td style="width: 100%;padding: 10px 0px 0px;">  
                <table style="width: 100%;border: 1px solid #000;">
                    <tr>
                        <td style="width: 75%;border-right: 1px solid #000;padding: 20px 8px;font-weight: bold;">
                            I, <span style="border-bottom: 1px solid #000;padding: 0px 34px;"><?php echo $biodata->employee_name; ?></span> (name) provide below my personal details which are true and correct : 
                        </td>
                        <td style="width: 35%;font-weight: bold;text-align: center;font-size: 17px;">
                        <?php echo $biodata->employee_image; ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width: 100%;font-weight: bold;text-align: center">
                PERSONAL DETAILS OF THE CANDIDATE
            </td>
        </tr>
        <tr>
            <td style="width: 100%;">
                <table style="width: 100%;border: 1px solid #000;">
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">
                            FULL NAME & PHONE NO.
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;"> 
                        <?php echo $biodata->employee_name; ?>, <?php echo $biodata->telephone_no; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">
                            FATHER’s NAME & AGE
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;"> 
                        <?php echo $biodata->father_name; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">
                            MOTHER’S MAIDEN NAME & AGE
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">  
                        <?php echo $biodata->mother_name; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;font-weight: bold;">
                            DOB : <?php echo $biodata->dob =  date('d.m.Y', strtotime($biodata->dob)); ?>
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;font-weight: bold;">  
                            BLOOD GROUP : <?php echo $biodata->blood_group; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">
                            HEIGHT : <?php echo $biodata->height; ?> ft.
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;font-weight: bold;"> 
                            WEIGHT : <?php echo $biodata->weight; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">
                            CHEST : 
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">  
                        <?php echo $biodata->chest; ?> cm.
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">
                            IDENTIFICATION MARK
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;"> 
                        <?php echo $biodata->id_mark; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">
                            EDUCATIONAL QUALIFICATION
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;"> 
                        <?php echo $biodata->qualification; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">
                            EMPLOYMENT HISTORY
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">  
                            
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">
                            DEFENCE PERSONNEL/CIVILIAN
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">  
                        <?PHP if($biodata->regiment='!empty') {echo "DEFENCE PERSONNEL";} else {echo "CIVILIAN";} ?> 
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">
                            NATIONALITY & RELGION
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;"> 
                        <?php echo $biodata->nationality; ?>, <?php echo $biodata->religion; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">
                            MARRIED/SINGLE
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;"> 
                        <?php echo $biodata->marital_status; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">
                            UIN NO.
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">  
                        <?php echo $biodata->uin_no; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">
                            SPOUSE’S NAME AND AGE
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;"> 
                        <?php echo $biodata->spouse_name; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">
                            NAME OF CHILDREN & AGE
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;"> 
                            
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">
                            NEXT OF KIN & PHONE NO.
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">
                        <?php echo $biodata->accidental_contact_name; ?>, <?php echo $biodata->accidental_contact_no; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">
                            OLD ESI/PF NO.
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">  
                        <?php echo $biodata->esi_no; ?>/ <?php echo $biodata->pf_no; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;font-weight: bold;">
                            ADDRESS (PERMANENT)
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;font-weight: bold;">  
                            ADDRESS (PRESENT)
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;font-weight: bold;">
                            Village- <?php echo $biodata->p_address_1; ?>
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;font-weight: bold;">  
                            Village- <?php echo $biodata->c_address_1; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;font-weight: bold;">
                            PO - <?php echo $biodata->p_address_1; ?>
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;font-weight: bold;">  
                            PO - <?php echo $biodata->c_address_1; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;font-weight: bold;">
                            PS- <?php echo $biodata->p_address_2; ?>
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;font-weight: bold;">  
                            PS- <?php echo $biodata->c_address_2; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;font-weight: bold;">
                            Dist- <?php echo $biodata->p_address_3; ?>
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;font-weight: bold;"> 
                            Dist- <?php echo $biodata->c_address_3; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;font-weight: bold;">
                            Pin Code- <?php echo $biodata->p_pincode; ?>
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;font-weight: bold;"> 
                            Pin Code- <?php echo $biodata->c_pincode; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">
                            &nbsp;
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">  
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">
                            RAILWAY STATION/BUS STAND/ LANDMARK
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;"> 
                            
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;font-weight: bold;">
                            GUNMAN DETAILS :
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">  
                            
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">
                            GUN NO: <?php echo $biodata->gun_no; ?>
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">  
                            LICENSE NO : <?php echo $biodata->gun_lic_no; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">
                            VALID UP TO : <?php echo $biodata->gun_license_expiry_date; ?>
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 2px 3px;font-size: 12px;">  
                            PERMITTED AREAS : <?php echo $biodata->gun_area; ?>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width: 100%;padding: 30px 0px;">
                <table style="width: 100%;border: 1px solid #000;">
                    <tr>
                        <td style="width: 50%;border-right: 1px solid #000;padding: 10px 20px;font-size: 13px;">
                            REFERENCE (NAME AND DESIGNATION, ADDRESS AND LANDLINE, PHONE NUMBER OF TWO PERSONS WHO KNOW THE CANDIDATE BUT NOT A RELATIVE OF THE CANDIDATE
                        </td>
                        <td colspan="2" style="border-right: 1px solid #000;width: 50%;">
                            <span style="display: block;border-bottom: 1px solid #000;padding: 20px 20px;">REFERENCE 1.</span>
                            <span style="display: block;padding: 20px 20px;">REFERENCE 2.</span>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width: 100%;padding-bottom: 60px;">
                I UNDERSTAND THAT THIS IS A FREE EMPLOYMENT AND FURTHER DECLARE THAT I HAVE NOT PAID ANY BRIBE TO ANYONE TO A JOB IN PREMIER VIGILANCE & SECURITY PVT LTD
            </td>
        </tr>
        <tr>
            <td style="width: 100%;">
                Signature and Date: 
            </td> 
        </tr>
        <tr>
            <td style="width: 100%;">
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 50%">
                            &nbsp;
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 10px 20px 70px;">
                            Candidate’s Signature / LTI
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width: 100%;padding: 0px 0px 30px;">
                Identified by me
            </td>
        </tr>
        <tr>
            <td style="width: 100%;padding: 0px 0px 30px;">
                Name of the Premier Branch / Site In-charge  
            </td>
        </tr>
    </table>
    
</body>

</html>