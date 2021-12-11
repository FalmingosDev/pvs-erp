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
    
    <title>PVS ERP System</title>
    
</head>

<body>
    <section class="per-section">
        <div class="container">
            
           <div class="row">
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 100%;">
                            <table  style="width: 100%;">
                                <tr>
                                    <td style="width: 5%;font-size: 20px;">D O J</td>
                                    <td style="width: 10%;border-bottom: 1px solid #000;display: block;text-align: center;padding: 0px 34px;font-size: 20px;"><?PHP echo date("d/m/Y", strtotime( $header->doj)); ?></td>
                                    <td style="width: 70%;text-align: center;font-weight: bold;font-size: 30px;">    
                                        FORM 2 (REVISED)
                                        <br>
                                        NOMINATION AND DECLARATION FORM
                                        <br>
                                        FOR UNEXEMPTED / EXEMPTED ESTABLISHMENTS
                                    </td>
                                    <td style="width: 5%;font-size: 20px;">Emp ID: </td>  
                                    <td style="width: 10%;border-bottom: 1px solid #000;display: block;text-align: center;padding: 0px 34px;font-size: 20px;"><?PHP echo $header->employee_code ; ?></td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%;text-align: center;font-weight: bold;font-size: 29px;padding: 30px 0px;">Declaration and Nomination Form under the Employees’ Provident Funds and Employees’</td>
                    </tr>
                    <tr>
                        <td style="width: 100%;text-align: center;font-weight: bold;font-size: 28px;padding: 0px 0px 20px;">Pension Scheme</td>
                    </tr>
                    <tr>
                        <td style="width: 100%;font-weight: bold;font-size: 28px;padding: 0px 0px 30px;">
                            ( Paragraph 33 and 61 (1) of the Employees’ Provident Fund Scheme, 1952 and Paragraph 18 of the Employees’ Pension Scheme, 1995).
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%; padding: 30px 0px;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 20%;font-size: 28px;">1. Name(IN BLOCK LETTERS): </td>
                                    <td style="text-align: center;width: 30%;">
                                        <table style="width: 100%;">
                                            <tr>
                                                <td style="width: 100%;padding: 0px 10px;border-bottom: 1px solid #000;text-align: left;font-size: 28px;"><?PHP echo $header->first_name ; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 100%;padding: 0px 10px;font-size: 28px;">NAME</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="text-align: center;width: 30%;padding: 0px 10px;font-size: 28px;">
                                        <table style="width: 100%;">
                                            <tr>
                                                <td style="width: 100%;padding: 0px 10px;border-bottom: 1px solid #000;font-size: 28px;text-align: left;"><?PHP echo $header->father_name; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 100%;padding: 0px 10px;font-size: 28px;">FATHER’S/ HUSBAND’S NAME</td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="text-align: center;width: 20%;padding: 0px 10px;font-size: 28px;">
                                        <table style="width: 100%;">
                                            <tr>
                                                <td style="width: 100%;padding: 0px 10px;border-bottom: 1px solid #000;font-size: 28px;text-align: left;"><?PHP echo $header->last_name  ; ?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 100%;padding: 0px 10px;font-size: 28px;">SURNAME</td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%; padding: 0px 0px 30px;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 10%;font-size: 28px;">2. Date of Birth: </td>
                                    <td style="text-align: center;width: 40%;padding: 0px 10px;border-bottom: 1px solid #000;text-align: left;font-size: 28px;">
                                    <?PHP echo date("d/m/Y", strtotime( $header->dob)); ?>
                                    </td>
                                    <td style="width: 10%;font-size: 28px;">3. Account No. </td>
                                    <td style="text-align: center;width: 40%;padding: 0px 10px;border-bottom: 1px solid #000;text-align: left;font-size: 28px;">
                                    <?PHP echo $header->account_no  ; ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%; padding: 0px 0px 30px;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 15%;font-size: 28px;">4. Sex : Male / Female : </td>
                                    <td style="text-align: center;width: 35%;padding: 0px 10px;border-bottom: 1px solid #000;text-align: left;font-size: 28px;">
                                    <?PHP echo $header->gender  ; ?>
                                    </td>
                                    <td style="width: 35%;font-size: 28px;">5.Marital Status: Married/ Unmarried/ Widow/Widower:</td>
                                    <td style="text-align: center;width: 15%;padding: 0px 10px;border-bottom: 1px solid #000;text-align: left;font-size: 28px;">
                                    <?PHP echo $header->MARITAL_STATUS  ; ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%; padding: 0px 0px 30px;">
                            <table style="width: 100%;"> 
                                <tr>
                                    <td style="width: 15%;font-size: 28px;">6. Permanent Address: </td>
                                    <td style="text-align: center;width: 85%;padding: 0px 10px;border-bottom: 1px solid #000;text-align: left;font-size: 28px;">
                                    <?PHP echo $header->p_address  ; ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%; padding: 0px 0px;border-bottom: 1px solid #000;text-align: center;">
                        &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%; padding: 30px 0px 0px;border-bottom: 1px solid #000;text-align: center;">
                        &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%; padding: 40px 0px 10px;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 15%;font-size: 28px;">7. Temporary Address: </td>
                                    <td style="text-align: center;width: 85%;padding: 0px 10px;text-align: center;border-bottom: 1px solid #000;text-align: left;font-size: 28px;">
                                    <?PHP echo $header->c_address  ; ?>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                        <tr>
                            <td style="width: 100%; padding: 0px 0px 20px;border-bottom: 1px solid #000;text-align: center;">
                            &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 100%; padding: 30px 0px 0px;border-bottom: 1px solid #000;text-align: center;">
                            &nbsp;
                            </td>
                        </tr>
                    <tr>
                        <td style="width: 100%;text-align: center;font-weight: bold;padding: 30px 5px;font-size: 30px;">PART –A (EPF)</td> 
                    </tr>
                    <tr>
                        <td style="width: 100%;font-size: 28px;padding: 0px 0px 30px;">
                            I hereby nominate the person (s) / Cancel the nomination made by me previously and nominate the person (s), mentioned below to receive the amount standing to my credit in the Employees’ Provident Fund, in the event of my death.
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%;">
                            <table style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 20%;border: 1px solid #000;padding: 5px 15px;font-size: 28px;">Name & Address of the Nominee (s)</th>
                                        <th style="width: 20%;border: 1px solid #000;padding: 5px 15px;font-size: 28px;">Nominee’s relationship with the member</th>
                                        <th style="width: 20%;border: 1px solid #000;padding: 5px 15px;font-size: 28px;">Date of Birth</th>
                                        <th style="width: 20%;border: 1px solid #000;padding: 5px 15px;font-size: 28px;">Total amount or Share of accumulations in P.F. to be paid to each nominee</th>
                                        <th style="width: 20%;border: 1px solid #000;padding: 5px 15px;font-size: 28px;">If the nominee is minor, name relationship & address of the guardian who may receive the amount during the minority of nominee</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width: 20%;border: 1px solid #000;padding: 5px 15px;font-size: 28px;"><?PHP echo $header->nominee_name_address  ; ?></td>
                                        <td style="width: 20%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                                        <td style="width: 20%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                                        <td style="width: 20%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                                        <td style="width: 20%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                                    </tr>
                                    <tr>
                                        <td style="width: 20%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                                        <td style="width: 20%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                                        <td style="width: 20%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                                        <td style="width: 20%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                                        <td style="width: 20%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%;font-size: 28px;padding: 30px 0px;">1. Certified that I have no family as defined in para 2 (g) of the Employees’Provident Fund Scheme 1952 and should I acquire a family hereafter the above nomination should be deemed as cancel.</td>
                    </tr>
                    <tr>
                        <td style="width: 100%;font-size: 28px;">2. Certified that my father/ mother is/are dependent upon me.</td>
                    </tr>
                    <tr>
                        <td style="width: 100%;padding: 25px 0px;font-weight: bold;font-size: 28px;">* strike out which is not applicable</td>
                    </tr>
                    <tr>
                        <td style="width: 100%;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 40%;">&nbsp;</td>
                                    <td style="width: 60%;font-weight: bold;font-size: 28px;">X Signature or thumb impression of the subscriber</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 95%;">&nbsp;</td>
                                    <td style="width: 5%;font-weight: bold;font-size: 25px;">P.T.O.</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <br/>
                    <tr>
                        <td style="width: 100%;text-align: center;font-weight: bold;font-size: 30px;">PART –B (EPS)</td>
                    </tr>
                    <tr>
                        <td style="width: 100%;text-align: center;font-weight: bold;font-size: 30px;padding: 0px 0px 30px;">(Para-18)</td>
                    </tr>
                    <tr>
                        <td style="width: 100%;font-size: 28px;padding: 0px 0px 30px;">
                            I hereby furnish below particulars of the members of my family who would be eligible to receive Widow / Children Pension in the event of my death.
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%;">
                            <table style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 25%;border: 1px solid #000;padding: 5px 15px;font-size: 28px;">Sr. No.</th>
                                        <th style="width: 25%;border: 1px solid #000;padding: 5px 15px;font-size: 28px;">Name and Address of the Family member</th>
                                        <th style="width: 25%;border: 1px solid #000;padding: 5px 15px;font-size: 28px;">Date of Birth</th>
                                        <th style="width: 25%;border: 1px solid #000;padding: 5px 15px;font-size: 28px;">Relationship with member</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?PHP
									foreach($detail as $detail){								
								?>
                                    <tr>
                                        <td style="width: 25%;border: 1px solid #000;padding: 5px 15px;font-size: 28px;"><?PHP echo $detail->slno; ?></td>
                                        <td style="width: 25%;border: 1px solid #000;padding: 5px 15px;font-size: 28px;"><?PHP echo $detail->member_name_address; ?></td>
                                        <td style="width: 25%;border: 1px solid #000;padding: 5px 15px;font-size: 28px;"><?PHP echo date("d/m/Y", strtotime( $header->dob)); ?></td>
                                        <td style="width: 25%;border: 1px solid #000;padding: 5px 15px;font-size: 28px;"><?PHP echo $detail->relation; ?></td>
                                    </tr>
								<?PHP 									
								}																		
								?>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%;font-size: 28px;padding: 30px 0px;">Certified that I have no family, as defined para 2 (vii) of the Employees’ Pension Scheme,1995 and should I acquire a family hereafter I shall furnish particulars there on in the above form.</td>
                    </tr>
                    <tr>
                        <td style="width: 100%;padding: 0px 0px 30px;font-size: 28px;">I hereby nominate the following person for receiving the monthly widow pension [ admissable under para 16 (2) (a) & (ii) in the event of my death without leaving any eligible family member for receiving pension</td>
                    </tr>
                    <tr>
                        <td style="width: 100%;">
                            <table style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th style="width: 25%;border: 1px solid #000;padding: 5px 15px;font-size: 28px;">Sr. No.</th>
                                        <th style="width: 25%;border: 1px solid #000;padding: 5px 15px;font-size: 28px;">Name and Address of the Family member</th>
                                        <th style="width: 25%;border: 1px solid #000;padding: 5px 15px;font-size: 28px;">Date of Birth</th>
                                        <th style="width: 25%;border: 1px solid #000;padding: 5px 15px;font-size: 28px;">Relationship with member</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?PHP
									foreach($f_detail as $f_detail){								
								?>								
                                    <tr>
                                        <td style="width: 25%;border: 1px solid #000;padding: 5px 15px;font-size: 28px;"><?PHP echo $f_detail->slno; ?></td>
                                        <td style="width: 25%;border: 1px solid #000;padding: 5px 15px;font-size: 28px;"><?PHP echo $f_detail->member_name_address; ?></td>
                                        <td style="width: 25%;border: 1px solid #000;padding: 5px 15px;font-size: 28px;"><?PHP echo date("d/m/Y", strtotime( $header->dob)); ?></td>
                                        <td style="width: 25%;border: 1px solid #000;padding: 5px 15px;font-size: 28px;"><?PHP echo $f_detail->relation; ?></td>
                                    </tr>
								<?PHP 									
									}																		
								?>
                                
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%;padding-top: 30px;">
                            <table style="width: 100%">
                                <tr>
                                    <td style="width: 5%;font-size: 30px;">Date:</td>
                                    <td style="width: 20%;border-bottom: 1px solid #000;display: block;text-align: center;font-size: 28px;">
                                        Text
                                    </td>
                                    <td style="width: 75%">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%;font-weight: bold;font-size: 30px;">.. Strike out which is not applicable</td>
                    </tr>
                    <tr>
                        <td style="width: 100%;text-align: right;font-weight: bold;font-size: 30px;">X Signature or thumb impression of the subscriber</td>
                    </tr>
                    <tr>
                        <td style="width: 100%;text-align: center;font-weight: bold;padding-top: 15px;font-size: 35px;font-size: 23px;">CERTIFICATE BY EMPLOYER</td>
                    </tr>
                    <tr>  
                        <td style="width: 100%;padding: 30px 0px;font-size: 28px;">
                            Certified that the above declaration and nomination has been signed / thumb Impressed before me by Shri. / Smt /Miss<span style="border-bottom: 1px solid #000;text-align: center;padding: 0px 70px;"><?PHP echo $header->name; ?></span> employed in my establishment after he / she has read the entries the entries have been read over to him / her by me and got confirmed by him /her.
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 48%;font-size: 28px;">  
                                        Name & Address of the Factory / Establishment Or Rubber Stamp thereof
                                    </td>
                                    <td style="width: 4%;text-align: center;font-weight: bold;font-size: 28px;">X</td>
                                    <td style="width: 48%;font-size: 28px;">Signature of the employer or other authorised officer of the establishment</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 5%;font-size: 28px;">
                                        Place :
                                    </td>
                                    <td style="width: 20%;border-bottom: 1px solid #000;display: block;text-align: center;font-size: 28px;">
                                        Text
                                    </td>
                                    <td style="width: 75%;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 100%;">
                            <table style="width: 100%;">
                                <tr>
                                    <td style="width: 5%;font-size: 28px;">
                                        Date :
                                    </td>
                                    <td style="width: 20%;border-bottom: 1px solid #000;display: block;text-align: center;font-size: 28px;">
                                        Text
                                    </td>
                                    <td style="width: 75%;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
               </table>
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