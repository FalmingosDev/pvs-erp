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
            <div class="row">
                <div class="col-md-12 logo-secu">
                    <img src="<?php echo base_url() . 'assets/images/secu-logo.png'; ?>" class="img-fluid text-center">
                </div>
            </div>
            <div class="row" id="noprint">
            <div class="col-md-1 offset-md-8">
                     <div>
                        <input class="cr-a" type="button" value="Print" onclick="print();" />
                    </div>
                </div>

                <div class="col-md-2">
                    <a href="<?php echo base_url('employee/appointment_letter_pdf/'.$appointment_letter->employee_id); ?>" class="cr-a">PDF Download</a>
                </div>
                <div class="col-md-1">
                    <a href="<?php echo base_url('employee'); ?>" class="cr-a">Back</a>
                </div>
            </div>
            <p class="text-left"><b>Dated : <span>............................</span> </b></p>

            <div class="row">
                <div class="col-md-4 head-p">
                
                    <p><b>To,</b></p>
                    <p><b><?PHP if($appointment_letter->gender=="FEMALE") {echo "Mrs.";} ?> <?PHP if($appointment_letter->gender=="MALE") {echo "Mr.";} ?> <span><?php echo $appointment_letter->employee_name; ?></span></b></p>
                    <p><b>Vill : <span><?php echo $appointment_letter->c_address_1; ?></span></b>.  <b>PO : <span><?php echo $appointment_letter->c_address_1; ?></span></b>. </p>
                    <p><b>PS : <span><?php echo $appointment_letter->c_address_2; ?></span></b>. <b>Dist : <span><?php echo $appointment_letter->c_address_3; ?></span></b>.</p>
                    <p><b>STATE : <span><?php echo $appointment_letter->state_name; ?></span></b>. <b>Pin : <span><?php echo $appointment_letter->c_pincode; ?></span></b>.</p>
                </div>
                <div class="col-md-8"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <h6 class="text-center"><b><u>Sub: Fixed Term Appointment</u></b></h6>
                <p>Dear <?PHP if($appointment_letter->gender=="FEMALE") {echo "Smt,";} ?> <?PHP if($appointment_letter->gender=="MALE") {echo "Sri,";} ?> <span><?php echo $appointment_letter->employee_name; ?></span>
                    </p>
                    <p>With reference to your application and the subsequent interview you had with us, we are pleased to offer you a FIXED TERM EMPLOYMENT, as <span><?php echo $appointment_letter->desig_name; ?></span>. under the following terms and conditions:-</p>
                    <ol class="ap-l-ul">
                        <li>It is clearly understood and agreed by you that the FIXED TERM EMPLOYMENT being offered to you by this letter has arisen due to a contract awarded to us by our client. Consequently this FIXED TERM EMPLOYMENT will automatically come to an end ON THE CESSATION of our contract with our client or on expiry of a period of ONE year from the date of this appointment, which ever happens earlier.</li>
                        <li>Your FIXED TERM EMPLOYMENT will start from <span><?php echo $appointment_letter->doj =  date('d.m.Y', strtotime($appointment_letter->doj));?>,</span> and will  on completion of ONE YEAR  end on <span>...........................</span> or upon the completion of contract with the client whichever happens earlier. </li>
                        <li>Since your appointment is based on the contractual job work, you will neither have any right / lien on the job held by you nor you will claim regular employment with us, or with our client or in any other manner. </li>
                        <li> Your continuation in this FIXED TERM EMPLOYMENT is subject to your remaining physically and mentally fit. As and when required by us,  you will present yourself for  medical examination by a physician as nominated by us.  Your FIXED TERM EMPLOYMENT may be terminated if the physician finds you physically or mentally unfit for the job for which you have been appointed. </li>
                        <li>This FIXED TERM EMPLOYMENT may be terminated any time if your performance and conduct is found to be unsuitable by us. </li>
                        <li> Your FIXED TERM EMPLOYMENT can be transferred from one location of our client to another location of the same client or any other client anywhere in the country.  You will be required to take up new assignment within the specified number of days in case a Transfer Order is given to you. However if you do not report to the specified place by the required time, it will be considered as your refusal to take up such transfer, and a refusal to carry out instruction.  In such case your FIXED TERM EMPLOYMENT will AUTOMATICALLY COME TO AN END FROM THE DATE ON WHICH YOU WERE REQUIRED TO REPORT TO THE NEW LOCATION.   If you forcibly stay back in original posting place after a transfer order has been issued to you, such staying back will automatically be treated as TERMINATION of THIS FIXED TERM EMPLOYMENT CONTRACT.</li>
                        <li>You will be required to do the jobs as assigned and attached to your category and as directed by your superior and/or higher authority as the case may be. While on duty you have to carry valid ID card issued by us, and wear uniform issued by us, if any. You have also to mandatorily carry your valid gun / driving license / other license / gun fitness certificate / Police clearance certificate as applicable while on duty. You are required to use the operational phone application provided to you in your android phone.</li>
                        <li>If you are employed as an armed guard, you will carry your licensed gun in fit condition along with specified cartridges in such condition as may be specified to you.</li>
                        <li>You will be required to produce valid gun license and other licences as may be applicable, issued by the appropriate authority at any point of time for inspection during your employment with us. Inability to produce such a license will amount to AUTOMATIC TERMINATION of this FIXED TERM EMPLOYMENT.</li>
                        <li class="mn-ol-li">You may be posted in one of our Cash Vans, doing cash in transit duty for one of our client banks. In that case you will have the added responsibility  of ensuring the following depending upon your job as a Driver / Custodian / Armed Guard / Loader :
                            <ol>
                                <li>the Cash Van  is maintained properly and remains fit for duty at all times with proper running of all safety equipment like camera , hooter , auto dialer , GPS and you maintain mobile communication with the Bank and your supervisor ( Driver and  Custodian )</li>
                                <li>b.	You carry all required documents for cash movement and running of the vehicle,  ( Driver and Custodian )</li>
                                <li>safe driving of Cash Van, ( Driver )</li>
                                <li>There is no stoppage of Cash Van with cash on the road/ road side and place / places other than approved destination. ( Driver and Custodian )</li>
                                <li>While on duty you will remain alert all the time and keep all doors securely locked and chained. All cash boxes MUST be locked and also chained with the floor of the cashvan, before the Cash Van starts movement.  ( custodian and Loader and Armed Guards )</li>
                                <li>Obtain perfect cash receipt upon delivery of cash to the destination and completion of safe movement of the Cash.</li>
                                <li>All members have the responsibility to prevent any untoward incident, and also to inform bank / Head Office immediately in case of any untoward incident cannot be averted.</li>
                                <li>You are required to use the operational phone application provided to you by us to log details of the Cash Van operation.</li>
                                <li>While part of cash is escorted by one gunman, custodian and loader in the bank branch/chest, other gunman and driver will remain inside the cash van under lock and key, guarding the remaining cash.</li>
                                <li>You will be liable for Death/disability of your colleges, client and public due to mishandling of weapon.</li>
                                <li>This letter of appointment shall be governed by Rule 55 & 57 of COWA Rules, 2020.</li>
                                <li>You will reimbursed the value of theft/stolen item from the duty place</li>
                                <li>You will be summarily terminated from the services in case of accidental firing and will bear all the consequently losses and penalties and PVS management will not be held responsible for </li>
                                <li>Minimum fuel consumption average should be 10 KM / Litre. The excess consumption will be deducted from salary.</li>
                            </ol>
                        </li>
                        <li>You will abide by the shift timing and other regulatory procedures in force at client’s establishment where you will be posted. You will also observe   all operating and safety procedures applicable to such establishment.</li>
                        <li>You shall not engage yourself directly or indirectly in any other business, occupation or employment of any nature and shall not take any emoluments from any source during the tenure of your employment with us.</li>
                        <li>During the continuance of your employment and thereafter, you will keep all secrets concerning the business or affairs of the establishment and not divulge to any person whatsoever. Besides, you will not indulge in any activity detrimental to the interest of the company.</li>
                        <li>During your deployment for execution of our contract with our client, you shall not put any demand or raise claim in any nature whatsoever or raise any dispute against such client of ours, or claim employment with our client, either in your independent capacity or jointly with others.</li>
                        <li>If our client with whom you are deployed, decides to reduce manpower and inform us to withdraw manpower, your service shall stand automatically terminated and you shall have no claim for re-employment.</li>
                        <li>Your appointment is terminable either by the management or by yourself without assignment of any reason on either side, after one month’s notice or of one month’s salary in lieu thereof.</li>
                        <li>You will be bound by any rules and regulations enforced by the management from time to time in relation to conduct, discipline, on the matters relating to the service conditions which will be deemed as rules and regulations and order in the part of these terms of employment.</li>
                        <li>In case there is any change of your residential address you will intimate the same in writing to us within 3 (Three) days from the date of such change of address recorded. In case you fail to notify us of any change in your residential address, and if the same is found out by our inspection team, then your employment will be summarily terminable without any notice or pay.</li>
                        <li>For any service or notice or communication of whatever kind by us , you will be informed by speed post/registered post/e-mail or SMS as the case may be, at the address or in your mobile no. given by you at the time of employment or such other address which you may hereinafter intimated to the management. The management may also paste a copy of the letter on the notice board which shall be considered to be sufficient service on you. It will be your duty to intimate in writing to the management ever there is any change of your address.</li>
                        <li>The company reserves the right to furlough manpower including you to accommodate unexpected economic events during the tenure of your fixed term employment.</li>
                        <li>A furlough is the placing of an employee / you in temporary no-work, no-pay status because lack of work or funds or other extra ordinary situations beyond our control, and  include any act of GOD, civil commotion, strike, lockdown due to outbreak of any pandemic  like COVID 19, curfew, declared natural calamity including earthquake, cyclone, war, terrorism etc. In such cases we shall not be responsible for payment of wages or other relief or benefits or for continuation of your employment. No claim for restoration of employment will be entertained after such a situation returns to normalcy.</li>
                        <li>On termination of your employment for whatsoever reason, you will immediately hand over the vehicle, Cash Van, two wheeler, all documents, data, computer, laptop, printer, phone, camera, charger, all phone numbers and mail ID’s or any other article or property of the company / establishment entrusted to you to enable the management to settle your accounts.</li>
                        <li>For CORRECT and PROPER discharge of your duties, you will be entitled to wages & benefits as approved by the client from time to time. The details of which will be communicated to you in due course. There may be upward and /or downward revision of wages from time to time with the changes of minimum wages as notified by the appropriate authority. The wages may vary depending upon the grade in which you will work and the client where you are posted. You will not be entitled to wages on your refusal to assigned work or refusal to work at transferred place or stoppage of work.</li>
                        <li> You will be covered under the Employee’s State Insurance Act 1994 and also be covered under the Employees’ Provident Fund and Miscellaneous Provisions Act 1952 as amended time to time as per eligibility.</li>
                        <li>The remuneration payable to you would be subject to deduction of tax at source as per the rules of Income Tax and other statutes in force from time to time.</li>
                        <li>If you are willing to accept the appointment on the above terms and conditions please signify your acceptance of the same.</li>
                    </ol>
                   
                            <p class="pl-70">For <b>Premier Vigilance & Security Pvt. Ltd.</b></p>
                            <p class="pl-70"><b> (Authorized Signatory)</b></p>
                            <p class="pl-70"><span>________________________________________________________________________________</span></p>
                            <p class="pl-70" style="font-size: 14px;">The above terms and conditions of Fixed Term appointment have been read over and explained to me in Bengali / Hindi /own language and I have fully understood the terms and conditions of my employment and I am accepting the same without any reservation.</p>
                            <div class="dt pl-70">
                        <div class="dt-1 dt-wd-1">
                            <p><b>Date:</b> <span></span></p>
                        </div>
                        <div class="dt-2 dt-wd-2">
                        <p><span><u><?php echo $appointment_letter->employee_name; ?></u></span></p>
                        <p><b>Signature of  Employee.</b></p>
                        
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