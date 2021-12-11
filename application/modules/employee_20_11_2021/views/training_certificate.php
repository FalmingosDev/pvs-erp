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
                    <a href="<?php echo base_url('employee/training_certificate_pdf/'.$training_certificate->employee_id); ?>" class="cr-a">PDF Download</a>
                </div>
                <div class="col-md-1">
                    <a href="<?php echo base_url('employee'); ?>" class="cr-a">Back</a>
                </div>
            </div>
            <p class="text-left"><b>PVS/HR/FORM-109 </b></p>
            <h5 class="text-center"><b>TRAINING CERTIFICATE</b></h5>
            <h5 class="text-center"><b>PREMIER VIGILANCE & SECURITY PVT.LTD</b></h5>
            <h5 class="text-center"><b>CORPORATE OFFICE: 4B, ORIENT ROW, KOLKATA-700017</b></h5>
            <h5 class="text-center"><b>[License Number: 025/WB/PSA/2015 dated 17.03.2015]</b></h5>
            <div class="row">
                <div class="col-md-8"></div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <p><b>CERTIFIED that <?PHP if($training_certificate->gender=="FEMALE") {echo "Smt";} ?> <?PHP if($training_certificate->gender=="MALE") {echo "Sri";} ?> <span> <?php echo $training_certificate->employee_name; ?> </span><?PHP if($training_certificate->gender=="FEMALE") {echo "Daughter of";} ?><?PHP if($training_certificate->gender=="MALE") {echo "Son of";} ?> <span> <?php echo $training_certificate->father_name; ?> </span>residing at <span> <?php echo $training_certificate->c_address_1; ?>, <?php echo $training_certificate->c_address_2; ?>, <?php echo $training_certificate->c_address_3; ?>, <?php echo $training_certificate->state_name; ?>, <?php echo $training_certificate->c_pincode; ?> </span>.Has completed the prescribed training for the engagement or employment as a Private Security Guard/Supervisor from <?php echo $training_certificate->doj= date('d.m.Y', strtotime($training_certificate->doj)); ?> till <?php echo $training_certificate->tenure_date_2= date('d.m.Y', strtotime($training_certificate->tenure_date_2)); ?>.</b></p>
                    <div class="dt">
                        <div class="dt-1">
                            <p><b>Signature of the Certificate Holder : <span><?php echo $training_certificate->employee_name; ?></span></b></p>
                            <p><b>His Signature is attested below</b></p>
                            <p class="text-right"><b>Signature of the issuing authority</b></p>
                            <p><b>Place of Issue  </b></p>
                            <p class="text-right"><b>Designation  & Seal</b></p>
                            <p><b>Date of Issue :</b></p>
                        </div>
                         <!-- <div class="dt-2">
                        <p><b></b></p> </div> -->
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