<?php //echo  $employee_id; exit;?>


 <section class="main-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-7">
                            <h1>HR FORMS FOR RECRUITMENT</h1>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="col-md-1">
                           
                        </div>
                    </div>
                    <div class="wrapper-box">
                        <table id="data_list" class="table table-striped table-bordered" style="width:100%">
                            <thead>
									<tr>
                                        <th>Detail Name</th>
                                        <th>View</th>
                                        <th>Download</th>
                                    </tr>
                                </thead>
                                <tbody>
									<tr class="gradeX">
										<td>APPOINTMENT LETTER MERGED</td>
										<td align = "center"><a class="vd-ed-2 " href="<?php echo base_url('employee/appointment_letter/'.$employee_id); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
										<td align = "center"><a class="vd-ed-2" href="<?php echo base_url('employee/appointment_letter_pdf/'.$employee_id); ?>"><i class="fa fa-download center" aria-hidden="true"></i></a></td>
									</tr>
									
									<tr class="gradeX">
										<td>BIODATA</td>
										<td align = "center"><a class="vd-ed-2 " href="<?php echo base_url('employee/biodata/'.$employee_id); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
										<td align = "center"><a class="vd-ed-2" href="<?php echo base_url('employee/biodata_pdf/'.$employee_id); ?>"><i class="fa fa-download center" aria-hidden="true"></i></a></td>
									</tr>
									
									<tr class="gradeX">
										<td>CONFIDENTIALITY DECLARATION</td>
										<td align = "center"><a class="vd-ed-2 " href="<?php echo base_url('employee/confidentiality_declaration/'.$employee_id); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
										<td align = "center"><a class="vd-ed-2" href="<?php echo base_url('employee/confidentiality_declaration_pdf/'.$employee_id); ?>"><i class="fa fa-download center" aria-hidden="true"></i></a></td>
									</tr>
									
									<tr class="gradeX">
										<td>EMPLOYMENT CARD</td>
										<td align = "center"><a class="vd-ed-2 " href="<?php echo base_url('employee/employment_card/'.$employee_id); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
										<td align = "center"><a class="vd-ed-2" href="<?php echo base_url('employee/employment_card_pdf/'.$employee_id); ?>"><i class="fa fa-download center" aria-hidden="true"></i></a></td>
									</tr>
									
									<tr class="gradeX">
										<td>E-PF FORM 2</td>
										<td align = "center"><a class="vd-ed-2 " href="<?php echo base_url('employee/epf/'.$employee_id); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
										<td align = "center"><a class="vd-ed-2" href="<?php echo base_url('employee/epf_pdf/'.$employee_id); ?>"><i class="fa fa-download center" aria-hidden="true"></i></a></td>
									</tr>
									
									<tr class="gradeX">
										<td>HOME VERIFICATION</td>
										<td align = "center"><a class="vd-ed-2 " href="<?php echo base_url('employee/home_verification/'.$employee_id); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
										<td align = "center"><a class="vd-ed-2" href="<?php echo base_url('employee/home_verification_pdf/'.$employee_id); ?>"><i class="fa fa-download center" aria-hidden="true"></i></a></td>
									</tr>
									
									<tr class="gradeX">
										<td>PENALTY CLAUSE</td>
										<td align = "center"><a class="vd-ed-2 " href="<?php echo base_url('employee/penalty_clause/'.$employee_id); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
										<td align = "center"><a class="vd-ed-2" href="<?php echo base_url('employee/penalty_clause_pdf/'.$employee_id); ?>"><i class="fa fa-download center" aria-hidden="true"></i></a></td>
									</tr>
									
									<tr class="gradeX">
										<td>PERSONAL DECLARATION BY CANDIDATE</td>
										<td align = "center"><a class="vd-ed-2 " href="<?php echo base_url('employee/personal_declaration/'.$employee_id); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
										<td align = "center"><a class="vd-ed-2" href="<?php echo base_url('employee/personal_declaration_pdf/'.$employee_id); ?>"><i class="fa fa-download center" aria-hidden="true"></i></a></td>
									</tr>
									
									<tr class="gradeX">
										<td>PF FORM 11</td>
										<td align = "center"><a class="vd-ed-2 " href="<?php echo base_url('employee/pf/'.$employee_id); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
										<td align = "center"><a class="vd-ed-2" href="<?php echo base_url('employee/pf_pdf/'.$employee_id); ?>"><i class="fa fa-download center" aria-hidden="true"></i></a></td>
									</tr>
									
									<tr class="gradeX">
										<td>PVS LWF</td>
										<td align = "center"><a class="vd-ed-2 " href="<?php echo base_url('employee/lwf/'.$employee_id); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
										<td align = "center"><a class="vd-ed-2" href="<?php echo base_url('employee/lwf_pdf/'.$employee_id); ?>"><i class="fa fa-download center" aria-hidden="true"></i></a></td>
									</tr>
									
									<tr class="gradeX">
										<td>SERVICE CERTIFICATE</td>
										<td align = "center"><a class="vd-ed-2 " href="<?php echo base_url('employee/service_certificate/'.$employee_id); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
										<td align = "center"><a class="vd-ed-2" href="<?php echo base_url('employee/service_certificate_pdf/'.$employee_id); ?>"><i class="fa fa-download center" aria-hidden="true"></i></a></td>
									</tr>
									
									<tr class="gradeX">
										<td>TRAINING CERTIFICATE</td>
										<td align = "center"><a class="vd-ed-2 " href="<?php echo base_url('employee/training_certificate/'.$employee_id); ?>"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
										<td align = "center"><a class="vd-ed-2" href="<?php echo base_url('employee/training_certificate_pdf/'.$employee_id); ?>"><i class="fa fa-download center" aria-hidden="true"></i></a></td>
									</tr>
									
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
          </div>
      </section>
<script>
	$(document).ready(function() {
		$('#data_list').DataTable({paging: false});
	} );
</script>