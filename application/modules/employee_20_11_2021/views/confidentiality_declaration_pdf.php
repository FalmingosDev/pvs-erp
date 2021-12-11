<!DOCTYPE html>
<html lang="en">


<head>    
    <title>PVS ERP System</title>    
</head>

<body>
    <section class="per-section">
        <div class="container" style="">
            <div class="row">
            <div class="col-md-12">  
            <div class="" style="border: 1px solid #000;padding: 15px 27px;">    
			
            <div class="row">
                <div class="col-md-12">
                    <h6>PVS/HR/FORM- 16</h6>  
                </div>
            </div>
            <div class="row">
				<p style="text-align: center;font-weight: 600;"><b>CONFIDENTIALITY DECLARATION</b></p>
                <div class="col-md-12">
        
                    <p>I,<b> <?PHP if($confidentiality_declaration->gender=="FEMALE") {echo "Smt";} ?> <?PHP if($confidentiality_declaration->gender=="MALE") {echo "Sri";} ?> <span> <?php echo $confidentiality_declaration->employee_name; ?> </span> </b>declare and confirm that all confidential, official and personal information/ data of the company and/ or client company which disclose to me and to which I have access during the course of employment as <span><b><?php echo $confidentiality_declaration->desig_name; ?></span></b>, will be kept strictly as secret ,confidential and shall not be disclosed or to any person any time  or kept  those in my custody in unauthorized manner for personal gain and/or causing damage/loss to the company or client company, except in accordance with the procedures set out in the safeguarding policy and procedures. If I am required to disclose confidential those official/personal information/data in accordance with the law or by virtue of a court or similar order, other than in accordance with the safeguarding policy and procedures. Disclosure may be made by me only with the approval of the authority concerned and there should not be any violation. I will inform the concerned authority immediately  in case any thing is disclosed or about to disclose through me under pressure or otherwise .I acknowledge that some or all of the confidential, official, personal data and sensitive official within the meaning of data protection legislation and I confirm that I will comply with the obligation under the legislation, If I am given any exposure to data processing in accordance with statutes or otherwise, I will process official and personal data on and subject to the instruction of the concerned data controller and I will maintain appropriate security measures against all unlawful processing in respect of the official or personal data and allow the concerned data controller to monitor and audit my compliance with my obligations in respect of official and personal secret data/information.</p>

                    <p style="padding: 15px 0px;">My obligations as I confirmed in this declaration will continue even after cessation of my employment and/or remain out of exposure to such information/ data.</p>
                    <div class="dt">
                        <div class="dt-1">
                            <p style="padding: 30px 0px;">Signature :  <b><span><?php echo $confidentiality_declaration->employee_name; ?></span></b></p>
                            <p>Date :<b></b></p>
                        </div>
                        <div class="dt-2">
                        <p style="padding: 30px 0px;">Employee Code : <b><span><?php echo $confidentiality_declaration->employee_code; ?></span></b></p>
                        

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