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
                    <a href="<?php echo base_url('employee/employment_card_pdf/'.$empCard->employee_id); ?>" class="cr-a">PDF Download</a>
                </div>
				<div class="col-md-1">
                    <a href="<?php echo base_url('employee'); ?>" class="cr-a">Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h6>PVS FORM NO - 107</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 em-cd-p">
                    <p>CONTRACT LABOUR[R & A] CENTRAL RULES</p>
                    <p>[FORM- XIV [SEE RULE 76]</p>
                    <p>EMPLOYMENT CARD</p>
                    <table class="table table-bordered table-sm tb-border-black mt-4">
                        <tbody>
                          <tr>
                            <td style="width: 50%;">NAME & ADDRESS OF CONTRACTOR:</td>
                            <td style="width: 50%;"><?php echo $empCard->name_address; ?></td>
                          </tr>
                          <tr>
                            <td style="width: 50%;">NATURE OF WORK & LOCATION OF WORK:</td>
                            <td style="width: 50%;"><?php echo $empCard->designame; ?></td>
                          </tr>
                          <tr>
                            <td style="width: 50%;">NAME & ADDRESS OF ESTABLISHMENT UNDER WHICH CONTRACT IS CARRIED ON :</td>
                            <td style="width: 50%;">&nbsp;</td>
                          </tr>
                            <tr>
                            <td style="width: 50%;">NAME & ADDRESS OF PRINCIPAL EMPLOYER:</td>
                            <td style="width: 50%;">&nbsp;</td>
                          </tr>
                        </tbody>
                      </table>
                    <table class="table table-bordered table-sm tb-border-black mt-5">
                        <tbody>
                          <tr>
                            <td style="width: 50%;">NAME OF WORKMAN :</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td style="width: 50%;">SL. NO IN REGISTER OF WORKMEN:</td>
                            <td>&nbsp;</td>
                          </tr>
                          <tr>
                            <td style="width: 50%;">NATURE OF EMPLOYMENT/DESIGNATION</td>
                            <td style="width: 50%;">&nbsp;</td>
                          </tr>
                            <tr>
                            <td style="width: 50%;">WAGE RATE:</td>
                            <td style="width: 50%;">&nbsp;</td>
                          </tr>
                            <tr>
                            <td style="width: 50%;">WAGE PERIOD:</td>
                            <td style="width: 50%;">&nbsp;</td>
                          </tr>
                            <tr>
                            <td style="width: 50%;">NATURE OF EMPLOYMENT:</td>
                            <td style="width: 50%;">&nbsp;</td>
                          </tr>
                            <tr>
                            <td style="width: 50%;">REMARKS:</td>
                            <td style="width: 50%;">&nbsp;</td>
                          </tr>
                            <tr>
                            <td style="width: 50%;">SIGNATURE OF CONTRACTOR :</td>
                            <td style="width: 50%;">&nbsp;</td>
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