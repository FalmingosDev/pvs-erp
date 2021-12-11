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
        <div class="container" style="">
            <div class="row">
            <div class="col-md-12">  
            <div class="" style="border: 1px solid #000;padding: 15px 27px;">    
            <div class="row" id="noprint">
            <div class="col-md-1 offset-md-8">
                     <div>
                        <input class="cr-a" type="button" value="Print" onclick="print();" />
                    </div>
                </div>

                <div class="col-md-2">
                    <a href="<?php echo base_url('employee/confidentiality_declaration_pdf/'.$confidentiality_declaration->employee_id); ?>" class="cr-a">PDF Download</a>
                </div>
                <div class="col-md-1">
                    <a href="<?php echo base_url('employee'); ?>" class="cr-a">Back</a>
                </div>
            </div>
            <p class="text-left"><b>PVS/HR/FORM- 16 </b></p>
            <h5 class="text-center" style="padding: 10px 0px 40px;"><b>CONFIDENTIALITY DECLARATION</b></h5>
            <div class="row">
                <!-- <div class="col-md-4 head-p">
                    <p class="to">To,</p>
                    <p><b>Premier Vigilance & Security Private</b></p>
                    <p>Limited Branch I HO </p>
                    <p>(Address)</p>
                </div> -->
                <div class="col-md-8"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
        
                    <p>I, <b><?PHP if($confidentiality_declaration->gender=="FEMALE") {echo "Smt";} ?> <?PHP if($confidentiality_declaration->gender=="MALE") {echo "Sri";} ?> <span> <?php echo $confidentiality_declaration->employee_name; ?></b> </span> declare and confirm that all confidential, official and personal information/ data of the company and/ or client company which disclose to me and to which I have access during the course of employment as <span><b><?php echo $confidentiality_declaration->desig_name; ?></b></span>, will be kept strictly as secret ,confidential and shall not be disclosed or to any person any time  or kept  those in my custody in unauthorized manner for personal gain and/or causing damage/loss to the company or client company, except in accordance with the procedures set out in the safeguarding policy and procedures. If I am required to disclose confidential those official/personal information/data in accordance with the law or by virtue of a court or similar order, other than in accordance with the safeguarding policy and procedures. Disclosure may be made by me only with the approval of the authority concerned and there should not be any violation. I will inform the concerned authority immediately  in case any thing is disclosed or about to disclose through me under pressure or otherwise .I acknowledge that some or all of the confidential, official, personal data and sensitive official within the meaning of data protection legislation and I confirm that I will comply with the obligation under the legislation, If I am given any exposure to data processing in accordance with statutes or otherwise, I will process official and personal data on and subject to the instruction of the concerned data controller and I will maintain appropriate security measures against all unlawful processing in respect of the official or personal data and allow the concerned data controller to monitor and audit my compliance with my obligations in respect of official and personal secret data/information.</p>

                    <p style="padding: 15px 0px;">My obligations as I confirmed in this declaration will continue even after cessation of my employment and/or remain out of exposure to such information/ data.</p>
                    <div class="dt">
                        <div class="dt-1">
                            <p style="padding: 30px 0px;">Signature :  <span><b><?php echo $confidentiality_declaration->employee_name; ?></b></span></p>
                            <p>Date :</p>
                        </div>
                        <div class="dt-2">
                        <p style="padding: 30px 0px;">Employee Code : <span><b><?php echo $confidentiality_declaration->employee_code; ?></b></span></p>
                        

                        </div>
                    </div>
                </div>
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