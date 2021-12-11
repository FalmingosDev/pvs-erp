<!DOCTYPE html>
<html>
<head>
<title>PVS ERP</title>
</head>

<body>
    <table style="width: 100%;">
        <tr>
            <td style="width: 100%;font-weight: bold;font-size: 24px;;text-align: right;">
                New FormNo.11-DeclarationForm
            </td>
        </tr>
        <tr>
            <td style="width: 100%;font-weight: bold;font-size: 20px;text-align: right;">
                (To be retained by the employer for future reference)
            </td>
        </tr>
        <tr>
            <td style="width: 100%;">
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 15%">  
                            <img src="<?php echo base_url() . 'assets/images/ppf-logo.png'; ?>" style="">
                        </td>
                        <td style="width: 60%;">
                            <table style="width: 100%;">  
                                <tr>
                                    <td style="width: 100%;font-weight: bold;font-size: 24px;;">EMPLOYEES PROVIDENT FUND ORGANIZATION</td>
                                </tr>
                                <tr>
                                    <td style="width: 100%;font-size: 24px;;">Employees provident funds scheme, 1952(paragraph 34 & 57)& Employees pension scheme 1995(paragraph 24)</td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 30%;border: 1px solid #000;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 100%;font-size: 18px;">
                                        Emp Code:
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 100%;border-bottom: 1px solid #000;font-size: 18px;">
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
            <td style="text-align: center;font-size: 20px;padding-bottom: 7px;">
                (Declaration by a person taking up employment in any establishment on which EPF Scheme, 1952 end/of EPS 1995 is applicable)
            </td>
        </tr>
        <tr>
            <td style="width: 100%;">
                <table style="width: 100%;border: 1px solid #000;">
                    <tr>
                        <td style="width: 5%;padding: 2px 4px;border: 1px solid #000;text-align: center;padding: 10px 10px;font-size: 24px;;">
                            1
                        </td>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                        Name of the member
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                        <?php echo $pf->employee_name; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 5%;padding: 2px 4px;border: 1px solid #000;text-align: center;padding: 10px 10px;font-size: 24px;;">
                            2
                        </td>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                            Father’sName( )Spouse’sName()(PleaseTickWhicheverIsApplicable
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                        <?php echo $pf->father_name; ?> / <?php echo $pf->spouse_name; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 5%;padding: 2px 4px;border: 1px solid #000;text-align: center;padding: 10px 10px;font-size: 24px;;">
                            3
                        </td>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                            DateofBirth(DD/MM/YYYY)
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 33%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                                    <?php echo $pf->dob =  date('d', strtotime($pf->dob)); ?>
                                    </td>
                                    <td style="width: 33%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                                    <?php echo $pf->dob =  date('m', strtotime($pf->dob)); ?>
                                    </td>
                                    <td style="width: 33%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                                    <?php echo $pf->dob =  date('Y', strtotime($pf->dob)); ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 5%;padding: 2px 4px;border: 1px solid #000;text-align: center;padding: 10px 10px;font-size: 24px;;">
                            4
                        </td>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                            Gender:(male/Female/Transgender)
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                        <?php echo $pf->gender; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 5%;border: 1px solid #000;text-align: center;padding: 10px 10px;font-size: 24px;;">
                            5
                        </td>
                        <td style="width: 55%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                            Marital Status (married/Unmarried/widow/divorce)
                        </td>
                        <td style="width: 40%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                        <?php echo $pf->marital_status; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 5%;border: 1px solid #000;text-align: center;padding: 10px 10px;font-size: 24px;;">
                            6
                        </td>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;">
                            <table style="width: 100%">
                                <tr>
                                    <td style="width: 100%;padding: 10px 10px;font-size: 24px;;">
                                        (a) EmailID:
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 100%;padding: 10px 10px;font-size: 24px;;">
                                        (b)	)MobileNo:
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                            <table style="width: 100%">
                                <tr>
                                    <td style="width: 100%;border-bottom: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                                        text
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 100%;padding: 10px 10px;font-size: 24px;;">
                                    <?php echo $pf->telephone_no; ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 5%;padding: 2px 4px;border: 1px solid #000;text-align: center;padding: 10px 10px;font-size: 24px;;">
                            7
                        </td>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                            Whether earlier a member of Employee's Provident Fund Scheme 1952
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                            <table style="width: 100%">
                                <tr>
                                    <td style="width: 50%;padding: 10px 10px;font-size: 24px;;">
                                        <label>Yes &nbsp;<input type="checkbox"></label>
                                    </td>
                                    <td style="width: 50%;padding: 10px 10px;font-size: 24px;;">
                                        <label>No &nbsp;<input type="checkbox"></label>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 5%;padding: 2px 4px;border: 1px solid #000;text-align: center;padding: 10px 10px;font-size: 24px;;">
                            8
                        </td>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                            Whether earlier a member of Employee's Pension Scheme, 1995
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                            <table style="width: 100%">
                                <tr>
                                    <td style="width: 50%;padding: 10px 10px;font-size: 24px;;">
                                        <label>Yes &nbsp;<input type="checkbox"></label>
                                    </td>
                                    <td style="width: 50%;padding: 10px 10px;font-size: 24px;;">
                                        <label>No &nbsp;<input type="checkbox"></label>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="6" style="width: 5%;border: 1px solid #000;text-align: center;padding: 10px 10px;font-size: 24px;;">
                            9
                        </td>
                        <td colspan="2" style="width: 55%;border: 1px solid #000;text-align: center;font-weight: bold;padding: 10px 10px;font-size: 24px;;">
                            If response to any or both of (7)&(8) above is yes. MANDATORY FILL UP THE(COLUMN9)
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 55%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                            a)  Universal Account Number(UAN)
                        </td>
                        <td style="width: 40%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                        <?php echo $pf->uan; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 55%;padding: 2px 4px;border: 1px solid #000;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="15%;padding: 10px 10px;font-size: 24px;;">
                                        b)  PreviousPFa/cNo
                                    </td>
                                    <td style="17%;border: 1px solid #000;padding: 2px 4px;font-size: 14px;">
                                        AP
                                    </td>
                                    <td style="17%;border: 1px solid #000;padding: 2px 4px;font-size: 14px;">
                                        HYD
                                    </td>
                                    <td style="17%;border: 1px solid #000;padding: 2px 4px;font-size: 14px;">
                                        EST.CODE
                                    </td>
                                    <td style="17%;border: 1px solid #000;padding: 2px 4px;font-size: 14px;">
                                        EXTN
                                    </td>
                                    <td style="17%;border: 1px solid #000;padding: 2px 4px;font-size: 14px;">
                                        PFNO.
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="20%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                                        &nbsp;
                                    </td>
                                    <td style="20%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                                    &nbsp;
                                    </td>
                                    <td style="20%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                                    &nbsp;
                                    </td>
                                    <td style="20%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                                    &nbsp;
                                    </td>
                                    <td style="20%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                                    <?php echo $pf->pf_no; ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>  
                    <tr>
                        <td style="width: 55%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                            c)	Date of exit from previous employment(DD/MM/YYY)
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="33%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                                    &nbsp;
                                    </td>
                                    <td style="33%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                                    &nbsp;
                                    </td>
                                    <td style="33%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                                    &nbsp;
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 55%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                            d)  Scheme Certificate No(if Issued)
                        </td>
                        <td style="width: 40%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                        &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 55%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                            e)	Pension Payment Order(PPO)No(if Issued)
                        </td>
                        <td style="width: 40%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                        &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="5" colspan="0" style="width: 5%;border: 1px solid #000;text-align: center;padding: 10px 10px;font-size: 24px;;">
                            10
                        </td>  
                    </tr>
                    <tr>
                        <td style="width: 55%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                            a)	International Worker:
                        </td>
                        <td style="width: 40%;padding: 2px 4px;border: 1px solid #000;">
                            <table style="width: 100%">
                                <tr>
                                    <td style="width: 50%;padding: 10px 10px;font-size: 24px;;">
                                        <label>Yes &nbsp;<input type="checkbox"></label>
                                    </td>
                                    <td style="width: 50%;padding: 10px 10px;font-size: 24px;;">
                                        <label>No &nbsp;<input type="checkbox"></label>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 55%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                            b)  If Yes, State Country Of Origin(India/Name of Other Country)
                        </td>
                        <td style="width: 40%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                        &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 55%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                            c)	Passport No
                        </td>
                        <td style="width: 40%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                        &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 55%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                            d)  Validity Of Passport (DD/MM/YYY)to(DD/MM/YYY)
                        </td>
                        <td style="width: 40%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                        &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td rowspan="4" style="width: 5%;border: 1px solid #000;text-align: center;padding: 10px 10px;font-size: 24px;;">
                            11
                        </td>
                        <td colspan="2" style="width: 55%;border: 1px solid #000;text-align: center;font-weight: bold;padding: 10px 10px;font-size: 24px;;">
                            KYC Details:(attach Self attested copies of following KYCs)**
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 55%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                            a)	Bank Account No.& IFSC code
                        </td>
                        <td style="width: 40%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                        <?php echo $pf->bank_name; ?>- <?php echo $pf->account_no; ?>, <?php echo $pf->ifsc_code; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 55%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                            b)  AADHAR Number(12 Digit)
                        </td>
                        <td style="width: 40%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                        <?php echo $pf->aadhaar_card_no; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 55%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                            c)	Permanent Account Number(PAN),If available
                        </td>
                        <td style="width: 40%;border: 1px solid #000;padding: 10px 10px;font-size: 24px;;">
                        &nbsp;
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td style="width: 100%;text-align: center;font-weight: bold;font-size: 24px;padding: 10px 0px 10px;">  
                UNDERTAKING
            </td>
        </tr>
        <tr>
            <td style="width: 100%;font-size: 24px;padding: 5px 0px;";>  
                1)	CertifiedthattheParticularsaretruetothebestofmyKnowledge
            </td>
        </tr>
        <tr>
            <td style="width: 100%;font-size: 24px;padding: 5px 0px;";>  
                2)	IauthorizeEPFOtouse my Aadharforverification/eKYCpurposeforservicedelivery
            </td>
        </tr>
        <tr>
            <td style="width: 100%;font-size: 24px;padding: 5px 0px;";>  
                3)	Kindly transferthefundsandservicedetails, if plicableif applicable,fromtheprevious PF accountas declaredabovetothepresentP.FAccount(TheTransferWouldbepossibleonlyiftheidentifiedKYCdetailsapprovedbypreviousemployerhasbeenverifiedbypresentemployer
            </td>
        </tr>
        <tr>
            <td style="width: 100%;font-size: 24px;padding: 5px 0px;";>  
                4)	IncaseofchangesInabovedetailsthesameWillbe intimate toemployerattheearliestDate:Place
            </td>
        </tr>
        <tr>
            <td style="width: 100%;text-align: right;font-size: 24px;padding: 2px 0px;";>  
                SignatureofMember: <?php echo $pf->employee_name; ?>
            </td>
        </tr>
        <tr>
            <td style="width: 100%;text-align: center;font-weight: bold;font-size: 24px;padding: 5px 0px;";>  
                DECLARATIONBYPRESENTEMPLOYER
            </td>
        </tr>
        <tr>  
            <td style="width: 100%;font-size: 24px;padding: 5px 0px;">
                A)	The member <?PHP if($pf->gender=="FEMALE" && $pf->marital_status=="SINGLE")  {echo "Ms.";} ?><?PHP if($pf->gender=="FEMALE" && $pf->marital_status=="MARRIED") {echo "Mrs.";} ?> <?PHP if($pf->gender=="MALE")  {echo "Mr.";} ?><?php echo $pf->employee_name; ?> has joined on <?php echo $pf->doj =  date('d.m.Y', strtotime($pf->doj));?> and has been allotted PF Number <?php echo $pf->pf_no; ?>
            </td>
            
        </tr>
        <tr>
            <td style="width: 100%;font-size: 24px;padding: 5px 0px;">
                B)	Incase personwasearlier not amember ofEPFScheme ,1952and EPS,1995
            </td>
        </tr>
        <tr>
            <td style="width: 100%;font-size: 24px;padding: 5px 0px;">
                •	(PostallotmentofUAN )The UANAllottedfor themember is <?php echo $pf->uan; ?>.
            </td>
        </tr>
        <tr>
            <td style="width: 100%;font-weight: bold;font-size: 24px;padding: 5px 0px;">
                •	Please tickthe AppropriateOption:
            </td>
        </tr>
        <tr>
            <td style="width: 100%;font-size: 24px;padding: 5px 0px;">
                •	TheKYCdetails ofthe above member inthe UANdatabase
            </td>
        </tr>
        <tr>
            <td style="width: 100%;font-size: 24px;padding: 7px 40px;">
                <input type="checkbox"><label>&nbsp;Have notbeen uploaded</label>
            </td>
        </tr>
        <tr>
            <td style="width: 100%;font-size: 24px;padding: 7px 40px;">
                <input type="checkbox"><label>&nbsp;Have beenuploadedbutnotapproved</label>
            </td>
        </tr>
        <tr>
            <td style="width: 100%;font-size: 24px;padding: 7px 40px;">
                <input type="checkbox"><label>&nbsp;Have beenuploadedandapprovedwithDSC</label>
            </td>
        </tr>
        <tr>
            <td style="width: 100%;font-size: 24px;padding: 5px 0px;">
                C)	Incase the personwasearlier amember ofEPFScheme ,1952and EPS,1995:
            </td>
        </tr>
        <tr>
            <td style="width: 100%;font-size: 24px;padding: 5px 0px;">
                •	The above PFaccountnumber/UAN  ofthememberasmentionedin(a)above has beentaggedwithhis /her UAN/previous memberID asdeclaredbymember
            </td>
        </tr>
        <tr>
            <td style="width: 100%;font-weight: bold;font-size: 24px;padding: 5px 0px;">
                •	Please Tickthe Appropriate Option
            </td>
        </tr>
        <tr>
            <td style="width: 100%;font-size: 24px;padding: 7px 40px;">
                <input type="checkbox"><label>&nbsp;The KYC details ofthe above member intheUANdatabase havebeenapprovedwith digitalsignature Certificate andtransfer requesthas beengeneratedonportal.</label>
            </td>
        </tr>
        <tr>
            <td style="width: 100%;font-size: 24px;padding: 7px 40px;">
                <input type="checkbox"><label>&nbsp;As theDSC ofestablishmentare notregisteredWithEPFOthe member has beeninformedtofile physical claim(Form13) fortransferoffunds fromhis previous establishment.</label>
            </td>
        </tr>
        <tr>
            <td style="width: 100%;font-weight: bold;font-size: 24px;padding: 5px 0px;">
                Date: ................................
            </td>
        </tr>
        <tr>
            <td style="width: 100%;text-align: right;font-size: 24px;padding: 5px 0px;">
                Signature of Employer With seal of Establishment <p style="border-bottom: 1px solid #000;display: inline-block;width: 250px;margin: 0; text-align: left;"> <?php echo $pf->employee_name; ?>
                
            </td>

        </tr>
    </table>
</body>

</html>
