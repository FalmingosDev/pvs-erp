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
                    <a href="<?php echo base_url('employee/penalty_clause_pdf/'.$penalty_clause->employee_id); ?>" class="cr-a">PDF Download</a>
                </div>
				<div class="col-md-1">
                    <a href="<?php echo base_url('employee'); ?>" class="cr-a">Back</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-center"><b>PENALTY CLAUSE</b></h4>
                    <p>I do agree with this penalty clause and will not raise any dispute any time in future in this regard.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 em-cd-p">
                    
                    <table class="table table-bordered table-sm tb-border-black mt-4">
                        <tbody>
                          <tr>
                            <td style="width: 5%;"><b>Sl No.</b></td>
                            <td style="width: 50%;"><b>Reason of Penalty</b></td>
                            <td style="width: 45%;"><b>Amount of Penalty on each default(Rs.)</b></td>
                          </tr>
                          <tr>
                          <td style="width: 5%;">1.</td>
                            <td style="width: 50%;">Not Wearing Proper Uniform/without shoes/cap/jersy/ID card</td>
                            <td style="width: 45%;">150 for each</td>
                          </tr>
                          <tr>
                          <td style="width: 5%;">2.</td>
                            <td style="width: 50%;">Unshaven</td>
                            <td style="width: 45%;">100</td>
                          </tr>
                            <tr>
                            <td style="width: 5%;">3.</td>
                            <td style="width: 50%;">Long Haircut, Nail cut over due, Dirty Teeth</td>
                            <td style="width: 45%;">100 for each</td>
                          </tr>
                          <tr>
                            <td style="width: 5%;">4.</td>
                            <td style="width: 50%;">Arguing with clients / company representative / consumer</td>
                            <td style="width: 45%;">250</td>
                          </tr>
                          <tr>
                            <td style="width: 5%;">5.</td>
                            <td style="width: 50%;">Disobeying order of client/company</td>
                            <td style="width: 45%;">500</td>
                          </tr>
                          <tr>
                            <td style="width: 5%;">6.</td>
                            <td style="width: 50%;">Dozing / sleeping on duty</td>
                            <td style="width: 45%;">250</td>
                          </tr>
                          <tr>
                            <td style="width: 5%;">7.</td>
                            <td style="width: 50%;">Sleeping on bedding / mosquito net inside ATM or Branch</td>
                            <td style="width: 45%;">500</td>
                          </tr>
                          <tr>
                            <td style="width: 5%;">8.</td>
                            <td style="width: 50%;">Seated inside Backroom in ATM</td>
                            <td style="width: 45%;">150</td>
                          </tr>
                          <tr>
                            <td style="width: 5%;">9.</td>
                            <td style="width: 50%;">Frequent use of mobile/watching movies in internet</td>
                            <td style="width: 45%;">100</td>
                          </tr>
                          <tr>
                            <td style="width: 5%;">10.</td>
                            <td style="width: 50%;">Reading newspaper etc/smoking/chewing paan, guthka ect</td>
                            <td style="width: 45%;">150</td>
                          </tr>
                          <tr>
                            <td style="width: 5%;">11.</td>
                            <td style="width: 50%;">Carelessness to Customer</td>
                            <td style="width: 45%;">150</td>
                          </tr>
                          <tr>
                            <td style="width: 5%;">12.</td>
                            <td style="width: 50%;">Dirty Registers</td>
                            <td style="width: 45%;">100</td>
                          </tr>
                          <tr>
                            <td style="width: 5%;">13.</td>
                            <td style="width: 50%;">Not maintaining registers properly</td>
                            <td style="width: 45%;">500</td>
                          </tr>
                          <tr>
                            <td style="width: 5%;">14.</td>
                            <td style="width: 50%;"> Misuse of telephone</td>
                            <td style="width: 45%;">Rs. 555 + actual amount of bill as fine</td>
                          </tr>
                          <tr>
                            <td style="width: 5%;">15.</td>
                            <td style="width: 50%;">Away from post for 15 mts or more (without valid reason and permission)</td>
                            <td style="width: 45%;">300</td>
                          </tr>
                          <tr>
                            <td style="width: 5%;">16.</td>
                            <td style="width: 50%;">Absence from duty without information</td>
                            <td style="width: 45%;">Issue letter/Termination on 2nd offenc</td>
                          </tr>
                          <tr>
                            <td style="width: 5%;">17.</td>
                            <td style="width: 50%;">Deserting duty post for the entire shift/without valid reason</td>
                            <td style="width: 45%;">Issue letter/Termination on 2nd offence</td>
                          </tr>
                          <tr>
                            <td style="width: 5%;">18.</td>
                            <td style="width: 50%;">Drinking alcohol or prohibited substance</td>
                            <td style="width: 45%;">Rs. 1000 / Termination on 2nd offence</td>
                          </tr>
                          <tr>
                            <td style="width: 5%;">19.</td>
                            <td style="width: 50%;">Invalid gun licence/Driving licence</td>
                            <td style="width: 45%;">Immediate Termination</td>
                          </tr>
                          <tr>
                            <td style="width: 5%;">20.</td>
                            <td style="width: 50%;">Scuffles</td>
                            <td style="width: 45%;">1000</td>
                          </tr>
                          <tr>
                            <td style="width: 5%;">21.</td>
                            <td style="width: 50%;">Any other report of misbehavior / tarnishing image & reputation of company</td>
                            <td style="width: 45%;">Discretion of management:</td>
                          </tr>
                          <tr>
                            <td style="width: 5%;">22.</td>
                            <td style="width: 50%;">Firing from Gun</td>
                            <td style="width: 45%;">1000 or to the extent of penalty exposed by the bank</td>
                          </tr>
                        </tbody>
                      </table>
                      <p>The penalty amount may be increased depending upon the amount fixed by the client. Such higher Penalty may be imposed at the discretion of management.</p>
                      <div class="dt">
                        <div class="dt-1">
                            <p style="padding: 30px 0px;">Address :  <span><b><?php echo $penalty_clause->c_address_1; ?>, <?php echo $penalty_clause->c_address_2; ?>, <?php echo $penalty_clause->c_address_3; ?>, <?php echo $penalty_clause->state_name; ?>, <?php echo $penalty_clause->c_pincode; ?></b></span></p>
                            <p>Date :</p>
                        </div>
                        <div class="dt-2">
                        <p style="padding: 30px 0px;">Signature of Employee :<span><b><?php echo $penalty_clause->employee_name; ?></b></span></p>

                        </div>
                    </div>
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