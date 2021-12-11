
<!DOCTYPE html>
<html lang="en">
<head>
 <!-- <meta charset="utf-8"> -->
 <title>PVS ERP System</title>
</head>
<body>
    <!-- <section class="per-section"> -->
        <div class="container">
            
            <div class="row">
                <div class="col-md-12">
                    <h6>PVS/HR/FORM-106</h6>  
                </div>
            </div>
            <div class="row">
                <p style="text-align: center;font-weight: 600;">CONTRACT LABOUR[R & A] CENTRAL/STATE RULES</p>
                <p style="text-align: center;font-weight: 600;">[FORM XV, SEE Rule 77]</p>
                <p style="text-align: center;font-weight: 600;">SERVICE CERTIFICATE</p>
                <div class="col-md-12 em-cd-p">    
                    <table class="table table-bordered table-sm tb-border-black mt-4" style="border: 1px solid #000;margin-top: 25px;"> 
                    <tbody>
                          <tr>
                            <td style="width: 70%;border: 1px solid #000;padding: 15px 20px;">NAME & ADDRESS OF CONTRACTOR: <?php echo $service_certificate->branch_name; ?>, <?php echo $service_certificate->address_1; ?>,<?php echo $service_certificate->state_name; ?>, <?php echo $service_certificate->pincode; ?></td>
                            <td style="width: 30%;border: 1px solid #000;padding: 5px 15px;">REMARKS</td>
                          </tr>
                          <tr>
                            <td style="width: 70%;border: 1px solid #000;padding: 15px 20px;">NATURE OF WORK & LOCATION OF WORK: <?php echo $service_certificate->desig_name; ?></td>
                            <td style="width: 30%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                          </tr>
                          <tr>
                            <td style="width: 70%;border: 1px solid #000;padding: 15px 20px;">NAME & ADDRESS OF WORKMAN : <?php echo $service_certificate->employee_name; ?>. <?php echo $service_certificate->c_address_1; ?>, <?php echo $service_certificate->c_address_2; ?>, <?php echo $service_certificate->c_address_3; ?>, <?php echo $service_certificate->state_name; ?>, <?php echo $service_certificate->c_pincode; ?>. </td>
                            <td style="width: 30%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                          </tr>
                            <tr>
                            <td style="width: 70%;border: 1px solid #000;padding: 15px 20px;">AGE & DATE OF BIRTH : <?php echo $service_certificate->age; ?>yrs. <?php echo $service_certificate->dob= date('d.m.Y', strtotime($service_certificate->dob)); ?></td>
                            <td style="width: 30%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                          </tr>
                          <tr>
                            <td style="width: 70%;border: 1px solid #000;padding: 15px 20px;">IDENTIFICATION MARK : <?php echo $service_certificate->id_mark; ?></td>
                            <td style="width: 30%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                          </tr>
                          <tr>
                            <td style="width: 70%;border: 1px solid #000;padding: 15px 20px;">FATHER’s /HUSBAND’s NAME : <?php echo $service_certificate->father_name; ?></td>
                            <td style="width: 30%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                          </tr>
                          <tr>
                            <td style="width: 70%;border: 1px solid #000;padding: 15px 20px;">NAME & ADDRESS OF ESTABLISHMENT UNDER WHICH CONTRACT IS CARRIED ON: Premier Vigilance & Security Private Limited 4B, Orient Row, Park Circus, Beniapukur, Kolkata, West Bengal 700017</td>
                            <td style="width: 30%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                          </tr>
                        </tbody>
                      </table>
                    <table class="table table-bordered table-sm tb-border-black mt-5" style="border: 1px solid #000;margin-top: 25px;">
                        <tbody>
                          <tr>
                            <td style="width: 5%;border: 1px solid #000;padding: 45px 30px;">SL NO</td>
                            <td style="width: 35%;border: 1px solid #000;padding: 45px 100px;">Total Period for which employed</td>
                            <td style="width: 20%;border: 1px solid #000;padding: 45px 30px;">Nature of Work done</td>
                            <td style="width: 20%;border: 1px solid #000;padding: 45px 10px;">Rate of Wages (with particulars of unit in case of piece work)</td>
                            <td style="width: 20%;border: 1px solid #000;padding: 45px 30px;">Remarks</td>
                          </tr>
                          <tr>
                          <td style="width: 5%;border: 1px solid #000;padding: 45px 30px;"></td>
                            <td style="width: 19%;border: 1px solid #000;padding: 45px 100px;">From</td>
                            <td style="width: 16%;border: 1px solid #000;padding: 45px 30px;">To</td>
                            <td style="width: 20%;border: 1px solid #000;padding: 45px 10px;"></td>
                            <td style="width: 20%;border: 1px solid #000;padding: 45px 30px;"></td>
                            
                          </tr>
                          <tr>
                          <td style="width: 5%;border: 1px solid #000;padding: 45px 30px;">&nbsp;</td>
                            <td style="width: 19%;border: 1px solid #000;padding: 45px 100px;"><?php echo $service_certificate->doj= date('d.m.Y', strtotime($service_certificate->doj)); ?></td>
                            <td style="width: 16%;border: 1px solid #000;padding: 45px 30px;"><?php echo $service_certificate->tenure_date_2= date('d.m.Y', strtotime($service_certificate->tenure_date_2)); ?></td>
                            <td style="width: 20%;border: 1px solid #000;padding: 45px 10px;"><?php echo $service_certificate->desig_name; ?></td>
                            <td style="width: 20%;border: 1px solid #000;padding: 45px 30px;">&nbsp;</td>
                            <!-- <td style="width: 20%;">&nbsp;</td> -->
                          </tr>
                          </tbody>
                      </table>
                      <table class="table table-bordered table-sm tb-border-black mt-5" style="border: 1px solid #000;margin-top: 25px;">
                        <tbody>
                          <tr>
                          <td style="width: 100%;border: 1px solid #000;padding: 15px 400px;">Signature : <?php echo $service_certificate->employee_name; ?></td>
                          </tr>
                        </tbody>



                        <!-- <tbody>
                          <tr>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">NAME & ADDRESS OF CONTRACTOR:</td>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;"><?php echo $empCard->name_address; ?></td>
                          </tr>
                          <tr>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">NATURE OF WORK & LOCATION OF WORK:</td>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;"><?php echo $empCard->designame; ?></td>
                          </tr>
                          <tr>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">NAME & ADDRESS OF ESTABLISHMENT UNDER WHICH CONTRACT IS CARRIED ON :</td>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                          </tr>
                            <tr>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">NAME & ADDRESS OF PRINCIPAL EMPLOYER:</td>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                          </tr>
                        </tbody>
                      </table>
                    <table class="table table-bordered table-sm tb-border-black mt-5" style="border: 1px solid #000;margin-top: 25px;">
                        <tbody>
                          <tr>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">NAME OF WORKMAN :</td>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                          </tr>
                          <tr>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">SL. NO IN REGISTER OF WORKMEN:</td>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                          </tr>
                          <tr>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">NATURE OF EMPLOYMENT/DESIGNATION</td>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                          </tr>
                            <tr>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">WAGE RATE:</td>  
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                          </tr>
                            <tr>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">WAGE PERIOD:</td>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                          </tr>
                            <tr>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">NATURE OF EMPLOYMENT:</td>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                          </tr>
                            <tr>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">REMARKS:</td>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                          </tr>
                            <tr>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">SIGNATURE OF CONTRACTOR :</td>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>   
                          </tr>
                        </tbody> -->
                      </table>
                </div>
            </div>
            
        </div>
    <!-- </section> -->
    
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script defer src="<?php echo base_url() . 'assets/fontawesome/js/all.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/jquery.min.js'; ?>"></script>
	
</body>
</html>