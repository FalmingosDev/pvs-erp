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
                    <a href="<?php echo base_url('employee/service_certificate_pdf/'.$service_certificate->employee_id); ?>" class="cr-a">PDF Download</a>
                </div>
				<div class="col-md-1">
                    <a href="<?php echo base_url('employee'); ?>" class="cr-a">Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h6>PVS/HR/FORM-106</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 em-cd-p">
                    <p>CONTRACT LABOUR[R & A] CENTRAL/STATE RULES</p>
                    <p>[FORM XV, SEE Rule 77]</p>
                    <p>SERVICE CERTIFICATE</p>
                    <table class="table table-bordered table-sm tb-border-black mt-4">
                        <tbody>
                          <tr>
                            <td style="width: 70%;">NAME & ADDRESS OF CONTRACTOR: <?php echo $service_certificate->branch_name; ?>, <?php echo $service_certificate->address_1; ?>,<?php echo $service_certificate->state_name; ?>, <?php echo $service_certificate->pincode; ?></td>
                            <td style="width: 30%;">REMARKS</td>
                          </tr>
                          <tr>
                            <td style="width: 70%;">NATURE OF WORK & LOCATION OF WORK: <?php echo $service_certificate->desig_name; ?> </td>
                            <td style="width: 30%;">&nbsp;</td>
                          </tr>
                          <tr>
                            <td style="width: 70%;">NAME & ADDRESS OF WORKMAN : <?php echo $service_certificate->employee_name; ?>. <?php echo $service_certificate->c_address_1; ?>, <?php echo $service_certificate->c_address_2; ?>, <?php echo $service_certificate->c_address_3; ?>, <?php echo $service_certificate->state_name; ?>, <?php echo $service_certificate->c_pincode; ?>.</td>
                            <td style="width: 30%;">&nbsp;</td>
                          </tr>
                            <tr>
                            <td style="width: 70%;">AGE & DATE OF BIRTH : <?php echo $service_certificate->age; ?>yrs. <?php echo $service_certificate->dob= date('d.m.Y', strtotime($service_certificate->dob)); ?></td>
                            <td style="width: 30%;">&nbsp;</td>
                          </tr>
                          <tr>
                            <td style="width: 70%;">IDENTIFICATION MARK : <?php echo $service_certificate->id_mark; ?></td>
                            <td style="width: 30%;">&nbsp;</td>
                          </tr>
                          <tr>
                            <td style="width: 70%;">FATHER’s /HUSBAND’s NAME : <?php echo $service_certificate->father_name; ?></td>
                            <td style="width: 30%;">&nbsp;</td>
                          </tr>
                          <tr>
                            <td style="width: 70%;">NAME & ADDRESS OF ESTABLISHMENT UNDER WHICH CONTRACT IS CARRIED ON: Premier Vigilance & Security Private Limited 4B, Orient Row, Park Circus, Beniapukur, Kolkata, West Bengal 700017</td>
                            <td style="width: 30%;">&nbsp;</td>
                          </tr>
                        </tbody>
                      </table>
                    <table class="table table-bordered table-sm tb-border-black mt-5" style="margin-bottom: 0;">
                        <tbody>
                          <tr>
                            <td rowspan="2" style="width: 5%;">SL NO</td>
                            <td colspan="2" style="width: 35%;">Total Period for which employed</td>
                            <td style="width: 20%;" rowspan="2">Nature of Work done</td>
                            <td style="width: 20%;" rowspan="2">Rate of Wages (with particulars of unit in case of piece work)</td>
                            <td style="width: 20%;" rowspan="2">Remarks</td>
                          </tr>
                          <tr>
                            <td style="width: 19%;">From</td>
                            <td style="width: 16%;">To</td>
                            <!--<td style="width: 20%;"></td>
                            <td style="width: 20%;"></td>
                            <td style="width: 20%;"></td>-->
                          </tr>
                          <tr>
                          <td style="width: 5%;">&nbsp;</td>
                            <td style="width: 19%;"><?php echo $service_certificate->doj= date('d.m.Y', strtotime($service_certificate->doj)); ?></td>
                            <td style="width: 16%;"><?php echo $service_certificate->tenure_date_2= date('d.m.Y', strtotime($service_certificate->tenure_date_2)); ?></td>
                            <td style="width: 20%;"><?php echo $service_certificate->desig_name; ?></td>
                            <td style="width: 20%;">&nbsp;</td>
                            <td style="width: 20%;">&nbsp;</td>
                          </tr>
                          </tbody>
                      </table>
                      <table class="table table-bordered table-sm tb-border-black mt-5" style="margin-bottom: 0;">
                        <tbody>
                          <tr>
                          <td style="width: 100%;">Signature : <?php echo $service_certificate->employee_name; ?></td>
                          </tr>
                        </tbody>
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