<!DOCTYPE html>
<html lang="en">
<!--<style type="text/css">
@media print 
{
    #noprint {
        display: none;
    }
}

</style>--> 

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
<div class="container">
<div class="row" id="noprint" style="padding: 20px 0px 20px;">
            <div class="col-md-1 offset-md-8">
                     <div>
                        <input class="cr-a" type="button" value="Print" onclick="print();" />
                    </div>
                </div>

                <div class="col-md-2">
                    <a href="<?php echo base_url('employee/pf_pdf/'.$pf->employee_id); ?>" class="cr-a">PDF Download</a>
                </div>
                <div class="col-md-1">
                    <a href="<?php echo base_url('employee'); ?>" class="cr-a">Back</a>
                </div>
            </div>



    <table style="width: 100%;padding: 10px 140px;">
        <tr>
            <td style="width: 100%;font-weight: bold;font-size: 20px;text-align: right;">
                New FormNo.11-DeclarationForm
            </td>
        </tr>
        <tr>
            <td style="width: 100%;font-weight: bold;font-size: 14px;text-align: right;">
                (To be retained by the employer for future reference)
            </td>
        </tr>
        <tr>
            <td style="width: 100%;">
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 10%">
                            <img src="<?php echo base_url() . 'assets/images/ppf-logo.png'; ?>" style="width: 100%;">
                        </td>
                        <td style="width: 60%;padding: 0px 20px;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 100%;font-weight: bold;">EMPLOYEES PROVIDENT FUND ORGANIZATION</td>
                                </tr>
                                <tr>
                                    <td style="width: 100%;">Employees provident funds scheme, 1952(paragraph 34 & 57)&<br/>Employees pension scheme 1995(paragraph 24)</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 30%;border: 1px solid #000;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 100%">
                                        Emp Code:
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 100%;border-bottom: 1px solid #000;padding-top: 5px;">
                                    <?php echo $pf->employee_code; ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;padding: 10px 0px 0px;">
                (Declaration by a person taking up employment in any establishment on which EPF Scheme, 1952 end/of EPS 1995 is applicable)
            </td>
        </tr>
        <tr>
            <td style="width: 100%;">
                <table style="width: 100%;border: 1px solid #000;">
                    <tr>
                        <td style="width: 5%;padding: 2px 4px;border: 1px solid #000;text-align: center;">
                            1
                        </td>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;">
                        Name of the member
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                        <?php echo $pf->employee_name; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 5%;padding: 2px 4px;border: 1px solid #000;text-align: center;">
                            2
                        </td>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;">
                        <input type="checkbox"> Father’s Name <input type="checkbox"> Spouse’s Name (Please Tick Whichever Is Applicable)
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                        <?php echo $pf->father_name; ?> / <?php echo $pf->spouse_name; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 5%;padding: 2px 4px;border: 1px solid #000;text-align: center;">
                            3
                        </td>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;">
                        Date of Birth (DD/MM/YYYY)
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 33%;border: 1px solid #000;">
                                    <?php echo $pf->dob =  date('d', strtotime($pf->dob)); ?>
                                    </td>
                                    <td style="width: 33%;border: 1px solid #000;">
                                    <?php echo $pf->dob =  date('m', strtotime($pf->dob)); ?>
                                    </td>
                                    <td style="width: 33%;border: 1px solid #000;">
                                    <?php echo $pf->dob =  date('Y', strtotime($pf->dob)); ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 5%;padding: 2px 4px;border: 1px solid #000;text-align: center;">
                            4
                        </td>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;">
                            Gender:(male/Female/Transgender)
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                        <?php echo $pf->gender; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 5%;padding: 2px 4px;border: 1px solid #000;text-align: center;">
                            5
                        </td>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;">
                            Marital Status(married/Unmarried/widow/divorce)
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                        <?php echo $pf->marital_status; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 5%;padding: 2px 4px;border: 1px solid #000;text-align: center;">
                            6
                        </td>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;">
                            <table style="width: 100%">
                                <tr>
                                    <td style="width: 100%">
                                        (a) Email ID:
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 100%">
                                        (b)	Mobile No:
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                            <table style="width: 100%">
                                <tr>
                                    <td style="width: 100%;border-bottom: 1px solid #000;">
                                        
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 100%">
                                    <?php echo $pf->telephone_no; ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 5%;padding: 2px 4px;border: 1px solid #000;text-align: center;">
                            7
                        </td>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;">
                        Whether earlier a member of Employees ‘provident Fund Scheme 1952
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                            <table style="width: 100%">
                                <tr>
                                    <td style="width: 50%;">
                                        <label>Yes &nbsp;<input type="checkbox"></label>
                                    </td>
                                    <td style="width: 50%;">
                                        <label>No &nbsp;<input type="checkbox"></label>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 5%;padding: 2px 4px;border: 1px solid #000;text-align: center;">
                            8
                        </td>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;">
                        Whether earlier a member of Employees ‘Pension Scheme ,1995
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                            <table style="width: 100%">
                                <tr>
                                    <td style="width: 50%;">
                                        <label>Yes &nbsp;<input type="checkbox"></label>
                                    </td>
                                    <td style="width: 50%;">
                                        <label>No &nbsp;<input type="checkbox"></label>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="6" style="width: 5%;padding: 2px 4px;border: 1px solid #000;text-align: center;">
                            9
                        </td>
                        <td colspan="2" style="width: 55%;padding: 2px 4px;border: 1px solid #000;text-align: center;font-weight: bold;">
                        If response to any or both of (7) & (8) above is yes. MANDATORY FILL UP THE (COLUMN 9)
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;">
                            a) Universal Account Number(UAN)
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                        <?php echo $pf->uan; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="15%">
                                        b)  Previous PF a/c No
                                    </td>
                                    <td style="17%;border: 1px solid #000;">
                                        AP
                                    </td>
                                    <td style="17%;border: 1px solid #000;">
                                        HYD
                                    </td>
                                    <td style="17%;border: 1px solid #000;">
                                        EST.CODE
                                    </td>
                                    <td style="17%;border: 1px solid #000;">
                                        EXTN
                                    </td>
                                    <td style="17%;border: 1px solid #000;">
                                        PFNO.
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="20%;border: 1px solid #000;">
                                      &nbsp;  
                                    </td>
                                    <td style="20%;border: 1px solid #000;">
                                    &nbsp; 
                                    </td>
                                    <td style="20%;border: 1px solid #000;">
                                    &nbsp;  
                                    </td>
                                    <td style="20%;border: 1px solid #000;">
                                    &nbsp;  
                                    </td>
                                    <td style="20%;border: 1px solid #000;">
                                    <?php echo $pf->pf_no; ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>  
                    <tr>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;">
                            c)	Date of exit from previous employment (DD/MM/YYY)
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="33%;border: 1px solid #000;">
                                    &nbsp;   
                                    </td>
                                    <td style="33%;border: 1px solid #000;">
                                    &nbsp;  
                                    </td>
                                    <td style="33%;border: 1px solid #000;">
                                    &nbsp;
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;">
                            d)  Scheme Certificate No (if Issued )
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                            
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;">
                            e)	Pension Payment Order (PPO)No (if Issued)
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                            
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="5" colspan="0" style="width: 5%;padding: 2px 4px;border: 1px solid #000;text-align: center;">
                            10
                        </td>  
                    </tr>
                    <tr>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;">
                            a)	International Worker:
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                            <table style="width: 100%">
                                <tr>
                                    <td style="width: 50%;">
                                        <label>Yes &nbsp;<input type="checkbox"></label>
                                    </td>
                                    <td style="width: 50%;">
                                        <label>No &nbsp;<input type="checkbox"></label>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;">
                            b)  If Yes , State Country Of Origin (India /Name of Other Country)
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                            
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;">
                            c)	Passport No
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                            
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;">
                            d)  Validity Of Passport (DD/MM/YYY) to(DD/MM/YYY)
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                            
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="4" style="width: 5%;padding: 2px 4px;border: 1px solid #000;text-align: center;">
                            11
                        </td>
                        <td colspan="2" style="width: 55%;padding: 2px 4px;border: 1px solid #000;text-align: center;font-weight: bold;">
                        KYC Details: (attach Self attested copies of following KYCs) **
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;">
                            a)	Bank Account No .& IFS code
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                        <?php echo $pf->bank_name; ?>- <?php echo $pf->account_no; ?>, <?php echo $pf->ifsc_code; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;">
                            b)  AADHAR Number (12 Digit)
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                        <?php echo $pf->aadhaar_card_no; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;">
                            c)	Permanent Account Number (PAN),If available
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                            
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width: 100%;text-align: center;font-weight: bold";>  
                <u>UNDERTAKING</u>
            </td>
        </tr>
        <tr>
            <td style="width: 100%;";>  
                1)	Certified that the Particulars are true to the best of my Knowledge
            </td>
        </tr>
        <tr>
            <td style="width: 100%;";>  
                2)	I authorize EPFO to use my Aadhar for verification / e KYC purpose for service delivery
            </td>
        </tr>
        <tr>
            <td style="width: 100%;";>  
                3)	Kindly transfer the funds and service details, if applicable if applicable, from the previous PF account as declared above to the present P.F Account(The Transfer Would be possible only if the identified KYC details approved by previous employer has been verified by present employer)
            </td>
        </tr>
        <tr>
            <td style="width: 100%;";>  
                4)	In case of changes In above details the same Will be intimate to employer at the earliest Date:....................Place:...................
            </td>
        </tr>
        <tr>
            <td style="width: 100%;text-align: right;";>  
            Signature of Member: <?php echo $pf->employee_name; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 100%;text-align: center;font-weight: bold;";>  
            DECLARATION BY PRESENT EMPLOYER
            </td>
        </tr>
        <tr>  
            <td style="width: 100%;">
                A)	The member <p style="border-bottom: 1px solid #000;display: inline-block;width: 250px;margin: 0;"> <?PHP if($pf->gender=="FEMALE" && $pf->marital_status=="SINGLE")  {echo "Ms.";} ?><?PHP if($pf->gender=="FEMALE" && $pf->marital_status=="MARRIED") {echo "Mrs.";} ?> <?PHP if($pf->gender=="MALE")  {echo "Mr.";} ?><?php echo $pf->employee_name; ?></p>has joined on <p style="border-bottom: 1px solid #000;display: inline-block;width: 250px;margin: 0;"><?php echo $pf->doj =  date('d.m.Y', strtotime($pf->doj));?></p>.and has been allotted PF Number<p style="border-bottom: 1px solid #000;display: inline-block;width: 250px;margin: 0;">  <?php echo $pf->pf_no; ?></p>
            </td>
        </tr>
        <tr>
            <td style="width: 100%;">
                B)	In case person was earlier not a member of EPF Scheme ,1952 and EPS,1995
            </td>
        </tr>
        <tr>
            <td style="width: 100%;">
                •	(Post allotment of UAN ) The UAN Allotted for the member is <p style="border-bottom: 1px solid #000;display: inline-block;width: 150px;margin: 0;"><?php echo $pf->uan; ?>.
            </td>
        </tr>
        <tr>
            <td style="width: 100%;font-weight: bold;">
                •	Please tick the Appropriate Option:
            </td>
        </tr>
        <tr>
            <td style="width: 100%;">
                •	The KYC details of the above member in the UAN database
            </td>
        </tr>
        <tr>
            <td style="width: 100%;padding-left: 40px;">
                <input type="checkbox"><label>&nbsp;Have not been uploaded</label>
            </td>
        </tr>
        <tr>
            <td style="width: 100%;padding-left: 40px;">
                <input type="checkbox"><label>&nbsp;Have beenuploadedbutnotapproved</label>
            </td>
        </tr>
        <tr>
            <td style="width: 100%;padding-left: 40px;">
                <input type="checkbox"><label>&nbsp;Have been uploaded and approved with DSC</label>
            </td>
        </tr>
        <tr>
            <td style="width: 100%;">
                C)	Incase the person was earlier a member of EPF Scheme, 1952 and EPS, 1995:
            </td>
        </tr>
        <tr>
            <td style="width: 100%;">
                •	The above PF account number /UAN  of the member as mentioned in (a) above has been tagged with his /her UAN/previous member ID as declared by member
            </td>
        </tr>
        <tr>
            <td style="width: 100%;font-weight: bold;">
                •	Please Tick the Appropriate Option
            </td>
        </tr>
        <tr>
            <td style="width: 100%;padding-left: 40px;">
                <input type="checkbox"><label>&nbsp;The KYC details of the above member in the UAN database have been approved with digital signature Certificate and transfer request has been generated on portal.</label>
            </td>
        </tr>
        <tr>
            <td style="width: 100%;padding-left: 40px;">
                <input type="checkbox"><label>&nbsp;As the DSC of establishment are not registered With EPFO the member has been informed to file physical claim (Form13) for transfer of funds from his previous establishment.</label>
            </td>
        </tr>
        <tr>
            <td style="width: 100%;font-weight: bold;">
                Date: ........................
            </td>
        </tr>
        <tr>
            <td style="width: 100%;text-align: right;">
                Signature of Employer With seal of Establishment <p style="border-bottom: 1px solid #000;display: inline-block;width: 250px;margin: 0; text-align: left;"> <?php echo $pf->employee_name; ?>
                
            </td>
        </tr>
    </table>
    
    
 <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script defer src="<?php echo base_url() . 'assets/fontawesome/js/all.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/jquery.min.js'; ?>"></script>
</body>

</html>
