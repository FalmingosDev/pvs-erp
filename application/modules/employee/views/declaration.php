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
                <div class="col-md-1 offset-md-10">
                     <div>
                        <input class="cr-a" type="button" value="Print" onclick="print();" />
                    </div>
                                    

                </div>
                <div class="col-md-1">
                    <a href="<?php echo base_url('employee'); ?>" class="cr-a">Back</a>
                </div>
            </div>
            <h2 class="text-center">PERSONAL DECLARATION BY CANDIDATE</h2>
            <div class="row">
                <div class="col-md-4 head-p">
                    <p class="to">To,</p>
                    <p><b>Premier Vigilance & Security Private</b></p>
                    <p>Limited Branch I HO </p>
                    <p>(Address)</p>
                </div>
                <div class="col-md-8"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
           
                       <p>I, <?PHP if($declaration->gender=="FEMALE") {echo "Smt";} ?> <?PHP if($declaration->gender=="MALE") {echo "Sri";} ?> <span> <?php echo $declaration->employee_name; ?> </span><?PHP if($declaration->gender=="FEMALE") {echo "D/O";} ?><?PHP if($declaration->gender=="MALE") {echo "S/O";} ?> <span> <?php echo $declaration->father_name; ?> </span>residing at <span> <?php echo $declaration->c_address_1; ?>, <?php echo $declaration->c_address_2; ?>, <?php echo $declaration->c_address_3; ?>, <?php echo $declaration->state_name; ?>, <?php echo $declaration->c_pincode; ?> </span>( address ) agree to  join  Premier  Vigilance  &  Security  Private  Limited  at  its  site  (  client  name)................................................ as a SG I AG I HK with effect from<span> <?php echo $declaration->doj =  date('d.m.Y', strtotime($declaration->doj));?>. </span>
                    </p>
                    <p>I understand that this is a contractual employment. and is purely of temporary nature. The continuation of this job is solely dependent on Premier Vigilance & Security Private Limited's client at whose premises I shall be deployed. I have understood the SOP which I will follow while on duty.</p>
                    <p>I agree to folllow all instructions given to me frorn time to time by supervisor I Site in Charge Branch in Charge relating to my duty, posting, transfer and enforcement of discipline at my posting site. I also understand and agree failing which I shall be liable for dismissa l or other disciplinary action.</p>
                    <p>I agree to go out on rotation or transfer to different sites and /or clients of Premier Vigialnce & Security Private Limited and accept any place of posting on transfer. I am fully aware that my appointment will be purely on temporary basis. My Personal details as declared are true to the best of my knowledge.</p>
                    <p>Iagree to remain fullly alert during my duty time and protect the interest of Premier Vigilance & Security Private Limited and its clients and be courteous and helpful all the time. I am absolute owner of Gun and having Genuine Gun licence. I will keep my Gun safely and as per bank guidelines.</p>
                    <p>I agree that if I am found sleeping or talking or watching video or playing games etc on my personal mobile phone, or engage in any other distraction or display slackness, I shall be liable to surnmary  dismissal.</p>
                    <div class="dt">
                        <div class="dt-1">
                            <p><b>Date:</b> <span></span></p>
                        </div>
                        <div class="dt-2">
                        <p><b>Full signature of the Ernployee.</b></p>
                        <p> <?php echo $declaration->employee_name; ?> </p>

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