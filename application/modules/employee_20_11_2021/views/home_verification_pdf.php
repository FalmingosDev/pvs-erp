<!DOCTYPE html>
<html lang="en">


<head>
   
    <title>PVS ERP System</title>
   
</head>

<body>
    
        <div class="container" style="border: 1px solid #000; padding: 0px 15px;">
           <div class="row">
                <div class="col-md-12">
                    <h6>PVS/HR/FORM- 108 </h6>  
                </div>
            </div>
            <div class="row">
                    <p style="text-align: center;font-weight: 600;"><b>HOME VERIFICATION CERTIFICATE</b></p>
                    <p><b>NAME OF THE CANDIDATE : <span></b><?php echo $home_verif->employee_name; ?></span></p>
                    <p><b>FATHER’s NAME : <span></b> <?php echo $home_verif->father_name; ?> </span></p>
                    <p><b>ADDRESS : <span></b> <?php echo $home_verif->c_address_1; ?>, <?php echo $home_verif->c_address_2; ?>, <?php echo $home_verif->c_address_3; ?>, <?php echo $home_verif->state_name; ?>, <?php echo $home_verif->c_pincode; ?> </span></p>
                    <p><b>VILL : <span></b><?php echo $home_verif->c_address_1; ?></span></p>
                    <p><b>P.O : <span></b><?php echo $home_verif->c_address_1; ?></span></p>
                    <p><b>P.S : <span></b><?php echo $home_verif->c_address_2; ?></span></p>
                    <p style="padding-bottom: 33px;"><b>DISTRICT : <span></b><?php echo $home_verif->c_address_3; ?></span><b>, Pin: </b><span><?php echo $home_verif->c_pincode; ?></span></p>  
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
        
  
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script defer src="<?php echo base_url() . 'assets/fontawesome/js/all.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/jquery.min.js'; ?>"></script>
</body>

</html>