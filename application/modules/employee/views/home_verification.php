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
        <div class="container" style="border: 1px solid #000;">
            <div class="row" id="noprint">
                <div class="col-md-1 offset-md-8">
                     <div>
                        <input class="cr-a" type="button" value="Print" onclick="print();" />
                    </div>
                </div>

                <div class="col-md-2">
                    <a href="<?php echo base_url('employee/home_verification_pdf/'.$home_verif->employee_id); ?>" class="cr-a">PDF Download</a>
                </div>
                <div class="col-md-1">
                    <a href="<?php echo base_url('employee'); ?>" class="cr-a">Back</a>
                </div>
            </div>
            <p class="text-left"><b>PVS/HR/FORM- 108 </b></p>
            <h5 class="text-center" style="padding: 68px 0px;"><b>HOME VERIFICATION CERTIFICATE</b></h5>
            <div class="row">
                <div class="col-md-8"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
        
                    <p><b>NAME OF THE CANDIDATE : <span><?php echo $home_verif->employee_name; ?></span></b></p>
                    <p><b>FATHER’s NAME : <span> <?php echo $home_verif->father_name; ?> </span></b></p>
                    <p><b>ADDRESS : <span> <?php echo $home_verif->c_address_1; ?>, <?php echo $home_verif->c_address_2; ?>, <?php echo $home_verif->c_address_3; ?>, <?php echo $home_verif->state_name; ?>, <?php echo $home_verif->c_pincode; ?> </span></b></p>
                    <p><b>VILL : <span><?php echo $home_verif->c_address_1; ?></span></b></p>
                    <p><b>P.O : <span><?php echo $home_verif->c_address_1; ?></span></b></p>
                    <p><b>P.S : <span><?php echo $home_verif->c_address_2; ?></span></b></p>
                    <p style="padding-bottom: 33px;"><b>DISTRICT : <span><?php echo $home_verif->c_address_3; ?></span>, Pin: <span><?php echo $home_verif->c_pincode; ?></span></b></p>  
                    <p><b>NEAREST RLY STATION  / BUS STOP :</b></p>
                    <p style="padding-bottom: 40px;"><b>LANDMARK :</b></p>

                    <p><b>Home verification is made by the undersigned visiting the locality on ___________________________.</b></p>
                    <p><b>As per employment Verification for employment in this company as ___________________________ .</b></p>
                    <p><b>Interacted with the local people and verified the antecedents which are found to be genuine.</b></p>
                    <p style="padding: 30px 0px;"><b>The candidate is employable based on verification.</b></p>
                    <div class="dt">
                        <div class="dt-1">
                            <p><b>Signature of verifier : </b></p>
                            <p><b>Date :</b></p>
                        </div>
                        <!-- <div class="dt-2">
                        <p><b>Employee Code : <span><?php echo $home_verif->employee_code; ?></span></b></p>
                        

                        </div> -->
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