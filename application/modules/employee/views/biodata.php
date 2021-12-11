<!DOCTYPE html>
<html lang="en">
<style type="text/css">
@media print 
{
    #noprint {
        display: none;
    }
}

</style> 

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="PVS admin dashboard">
    <meta name="description" content="Admin login">
    <meta name="robots" content="noindex,nofollow">
    <title>PVS ERP System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<link href="<?php echo base_url() . 'assets/fontawesome/css/all.css'; ?>" rel="stylesheet"> <!--load all styles -->
	<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/style.css'; ?>" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon.png">
</head>

<body>
    <section class="per-section">
        <div class="container">
            <div class="row" id="noprint">
                <div class="col-md-1 offset-md-8">
                     <div>
                        <input class="cr-a" type="button" value="Print" onclick="print();" />
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="<?php echo base_url('employee/biodata_pdf/'.$biodata->employee_id); ?>" class="cr-a">PDF Download</a>
                </div>
				<div class="col-md-1">
                    <a href="<?php echo base_url('employee'); ?>" class="cr-a">Back</a>
                </div>
            </div>
            <table style="width: 100%;padding: 20px 145px;">
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
            <td style="width: 100%;padding: 20px 0px 30px;">
                <table style="width: 100%;border: 1px solid #000;">
                    <tr>
                        <td style="width: 75%;border-right: 1px solid #000;padding: 60px 16px;font-weight: bold;">
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
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">
                            FULL NAME & PHONE NO.
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">  
                        <?php echo $biodata->employee_name; ?>, <?php echo $biodata->telephone_no; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">
                            FATHER’s NAME & AGE
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">  
                        <?php echo $biodata->father_name; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">
                            MOTHER’S MAIDEN NAME & AGE
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">  
                        <?php echo $biodata->mother_name; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">
                            DOB : <?php echo $biodata->dob =  date('d.m.Y', strtotime($biodata->dob)); ?>
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;font-weight: bold;">  
                            BLOOD GROUP : <?php echo $biodata->blood_group; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">
                            HEIGHT : <?php echo $biodata->height; ?> ft.
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;font-weight: bold;">  
                            WEIGHT : <?php echo $biodata->weight; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">
                            CHEST : 
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">  
                        <?php echo $biodata->chest; ?> cm.
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">
                            IDENTIFICATION MARK
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">  
                        <?php echo $biodata->id_mark; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">
                            EDUCATIONAL QUALIFICATION
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">  
                        <?php echo $biodata->qualification; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">
                            EMPLOYMENT HISTORY
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">  
                            
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">
                            DEFENCE PERSONNEL/CIVILIAN
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">  
                        <?PHP if($biodata->regiment='!empty') {echo "DEFENCE PERSONNEL";} else {echo "CIVILIAN";} ?> 
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">
                            NATIONALITY & RELGION
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">  
                        <?php echo $biodata->nationality; ?>, <?php echo $biodata->religion; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">
                            MARRIED/SINGLE
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">  
                        <?php echo $biodata->marital_status; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">
                            UIN NO.
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">  
                        <?php echo $biodata->uin_no; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">
                            SPOUSE’S NAME AND AGE
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">  
                        <?php echo $biodata->spouse_name; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">
                            NAME OF CHILDREN & AGE
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">  
                            
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">
                            NEXT OF KIN & PHONE NO.
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">  
                        <?php echo $biodata->accidental_contact_name; ?>, <?php echo $biodata->accidental_contact_no; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">
                            OLD ESI/PF NO.
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">  
                        <?php echo $biodata->esi_no; ?>/ <?php echo $biodata->pf_no; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;font-weight: bold;">
                            ADDRESS (PERMANENT)
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;font-weight: bold;">  
                            ADDRESS (PRESENT)
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;font-weight: bold;">
                            Village- <?php echo $biodata->p_address_1; ?>
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;font-weight: bold;">  
                            Village- <?php echo $biodata->c_address_1; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;font-weight: bold;">
                            PO - <?php echo $biodata->p_address_1; ?>
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;font-weight: bold;">  
                            PO - <?php echo $biodata->c_address_1; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;font-weight: bold;">
                            PS- <?php echo $biodata->p_address_2; ?>
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;font-weight: bold;">  
                            PS- <?php echo $biodata->c_address_2; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;font-weight: bold;">
                            Dist- <?php echo $biodata->p_address_3; ?>
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;font-weight: bold;">  
                            Dist- <?php echo $biodata->c_address_3; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;font-weight: bold;">
                            Pin Code- <?php echo $biodata->p_pincode; ?>
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;font-weight: bold;">  
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
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">
                            RAILWAY STATION/BUS STAND/ LANDMARK
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">  
                            
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;font-weight: bold;">
                            GUNMAN DETAILS :
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">  
                            
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">
                            GUN NO: <?php echo $biodata->gun_no; ?>
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">  
                            LICENSE NO : <?php echo $biodata->gun_lic_no; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">
                            VALID UP TO : <?php echo $biodata->gun_license_expiry_date; ?>
                        </td>
                        <td style="width: 50%;border: 1px solid #000;padding: 7px 10px;">  
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
                        <td style="width: 50%;border-right: 1px solid #000;padding: 20px 20px;">
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
                </div>
            </div>
            
        </div>
    </section>
    
     <script>windows.print();</script>
	
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script defer src="<?php echo base_url() . 'assets/fontawesome/js/all.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/jquery.min.js'; ?>"></script>
</body>

</html>
