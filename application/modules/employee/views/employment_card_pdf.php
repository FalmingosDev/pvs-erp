<?php //echo $empCard->name_address; exit;?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="utf-8">
 <title>Welcome to CodeIgniter</title>
</head>
<body>
    <section class="per-section">
        <div class="container">
            
            <div class="row">
                <div class="col-md-12">
                    <h6>PVS FORM NO - 107</h6>  
                </div>
            </div>
            <div class="row">
                <p style="text-align: center;font-weight: 600;">CONTRACT LABOUR[R &amp; A] CENTRAL RULES</p>
                <p style="text-align: center;font-weight: 600;">[FORM- XIV [SEE RULE 76]</p>
                <p style="text-align: center;font-weight: 600;">EMPLOYMENT CARD</p>
                <div class="col-md-12 em-cd-p">    
                    <table class="table table-bordered table-sm tb-border-black mt-4" style="border: 1px solid #000;margin-top: 25px;">  
                        <tbody>
                          <tr>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">NAME & ADDRESS OF CONTRACTOR:</td>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;"><?php echo $empCard->name_address; ?></td>
                          </tr>
                          <tr>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">NATURE OF WORK & LOCATION OF WORK:</td>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;"><?php echo $empCard->designame; ?></td>
                          </tr>
                          <tr>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">NAME & ADDRESS OF ESTABLISHMENT UNDER WHICH CONTRACT IS CARRIED ON :</td>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                          </tr>
                            <tr>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">NAME & ADDRESS OF PRINCIPAL EMPLOYER:</td>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                          </tr>
                        </tbody>
                      </table>
                    <table class="table table-bordered table-sm tb-border-black mt-5" style="border: 1px solid #000;margin-top: 25px;">
                        <tbody>
                          <tr>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">NAME OF WORKMAN :</td>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                          </tr>
                          <tr>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">SL. NO IN REGISTER OF WORKMEN:</td>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                          </tr>
                          <tr>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">NATURE OF EMPLOYMENT/DESIGNATION</td>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                          </tr>
                            <tr>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">WAGE RATE:</td>  
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                          </tr>
                            <tr>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">WAGE PERIOD:</td>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                          </tr>
                            <tr>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">NATURE OF EMPLOYMENT:</td>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                          </tr>
                            <tr>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">REMARKS:</td>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>
                          </tr>
                            <tr>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">SIGNATURE OF CONTRACTOR :</td>
                            <td style="width: 50%;border: 1px solid #000;padding: 5px 15px;">&nbsp;</td>   
                          </tr>
                        </tbody>
                      </table>
                </div>
            </div>
            
        </div>
    </section>
    
	<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<script defer src="<?php echo base_url() . 'assets/fontawesome/js/all.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/jquery.min.js'; ?>"></script>
	
</body>
</html>