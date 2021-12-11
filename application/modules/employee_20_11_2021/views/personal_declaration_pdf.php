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
                    <div class="">
                        <div class="row">
                            <div class="col-md-12 logo-secu">
                                <img src="<?php echo base_url() . 'assets/images/secu-logo.png'; ?>" class="img-fluid text-left">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <h6>PVS/HR/FORM- 16</h6>  
                            </div>
                        </div>
                        <p style="text-align: center;font-weight: 600;"><b><u>PERSONAL DECLARATION BY CANDIDATE</u></b></p>
                        <div class="row">
                            <div class="col-md-4 head-p" style="padding: 60px 0px;">
                                <p><b>To,</b></p>
                                <p><b>Premier Vigilance & Security Private</b></p>
                                <p><b>Limited Branch/HO (Address) <?php echo $personal_declaration->address_1; ?></b></p>
                            </div>
                            <div class="col-md-8"></div>
                        </div>
                        <div class="row">
                    
                            <div class="col-md-12">
                        
                                <p><b>I, <?PHP if($personal_declaration->gender=="FEMALE") {echo "Smt";} ?><?PHP if($personal_declaration->gender=="MALE"){echo "Sri";} ?> <span><?php echo $personal_declaration->employee_name; ?></span> <?PHP if($personal_declaration->gender=="FEMALE") {echo "D/O";} ?><?PHP if($personal_declaration->gender=="MALE") {echo "S/O";} ?> <span> <?php echo $personal_declaration->father_name; ?> </span> Residing at Vill: <?php echo $personal_declaration->c_address_1; ?>, PO: <?php echo $personal_declaration->c_address_1; ?>, PS: <?php echo $personal_declaration->c_address_2; ?>, Dist: <?php echo $personal_declaration->c_address_3; ?>, Sate: <?php echo $personal_declaration->state_name; ?>, Pin: <?php echo $personal_declaration->c_pincode; ?>. agree to join Premier Vigilance & Security Pvt Ltd at its site ( Client Name) ……………………………………. As a <?php echo $personal_declaration->desig_name; ?> with effect from <?php echo $personal_declaration->doj =  date('d.m.Y', strtotime($personal_declaration->doj));?>.</b></p>
                                <p><b>I understand that this is a contractual employment and is purely of temporary nature. The continuation of this job is solely dependent on Premier Vigilance & Security Pvt Ltd’s client at whose premises I shall be deployed. I have understood the SOP which I will follow while on duty.</b></p>
                                <p><b>I agree to follow all instructions given to me from time to time by Supervisor/ Site in Charge, Branch in Charge relating to my duty, posting, transfer and enforcement of discipline at my posting site. I also understand and agree failing which I shall be liable for dismissal or other disciplinary action.</b></p>
                                <p><b>I agree to go out on rotation or transfer to different sites and / or clients of Premier Vigilance & Security Private Limited and accept any place of posting on transfer. I fully aware that my appointment will be purely on temporary basis. My personal details as declared are true to the best of my knowledge.</b></p>
                                <p><b>I agree to remain fully alert during my duty time and protect the interest of Premier Vigilance & Security Private Ltd and its clients and be courteous and helpful all the time. I am absolute owner of Gun and having Genuine Gun Licence. I will keep my gun safety and as per bank guidelines.</b></p>
                                <p><b>I agree that if I am found sleeping or talking or watching video or playing games etc on my personal mobile phone, or engage in any other distraction or display slackness, I shall be liable to summary dismissal.</b></p>
                                <p><b>I do hereby giving undertaking that in case of any tangible or intangible loss is suffered by Company/Client or if the normal functioning of the company/client is hampered due to any trade union activities involving or alleged involvement of mine, I will make good of loss.</b></p>

                                <div class="dt pl-70">
                                    <div class="dt-1 dt-wd-1">
                                        <p><b>Date:</b> <span></span></p>
                                    </div>
                                    <div class="dt-2 dt-wd-2">
                                        <p> <b><?php echo $personal_declaration->employee_name; ?></b> </p>
                                        <p><b>Full Signature of  Employee.</b></p>
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