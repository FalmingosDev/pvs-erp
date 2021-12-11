	<!-- Top header -->
	<section class="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a href="<?php echo base_url(); ?>"><img src="<?php echo base_url() . 'assets/img/logo.png'; ?>" class="img-fluid"></a>
                </div>
                <div class="col-md-6">
                    <div class="header-right-menu">
                        <ul>
                            <li>
                                <a href="<?php echo base_url('user/change_password'); ?>"><i class="fa fa-key" style="color:#FF0000;"></i> Change Password</a>
                            </li>
                            <!-- <li class="nav-item dropdown" ngbDropdown>
                                <a class="nav-link h5 dropdown-toggle" id="navbarDropdown" ngbDropdownToggle>
                                      Messages</a>
                                    <div ngbDropdownMenu class="dropdown-menu">
                                        <a class="dropdown-item" href="#" ngbDropdownItem>new message</a>
                                        <a class="dropdown-item" href="#" ngbDropdownItem>inbox</a>
                                        <a class="dropdown-item" href="#" ngbDropdownItem>outbox</a>
                                        <a class="dropdown-item" href="#" ngbDropdownItem>trash</a>
                                    </div>
                                </li>
                            <li>
                                <a href="#">Profile</a>
                            </li> -->
                            <li>
                                <a href="<?php echo base_url('logout'); ?>"><i class="fa fa-power-off" style="color:#FF0000;"></i> Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>  
    </section>
	<!-- // Close Top header -->
	
	<!-- Top menu -->
	<section class="header-main"> 
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                      <!--<a class="navbar-brand" href="#">Navbar</a>-->
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
					  
					  <?php /*  ?>
					  <!-- MENU SECTION -->
                      <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                          <li class="nav-item active">
                            <a class="nav-link" href="<?php echo base_url(); ?>">Dashboard <span class="sr-only">(current)</span></a>
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Masters
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="<?php echo base_url('client'); ?>">Client</a>
								<a class="dropdown-item" href="<?php echo base_url('employee'); ?>">Recruitment</a>
								<a class="dropdown-item" href="<?php echo base_url('designation'); ?>">Designation</a>
								<a class="dropdown-item" href="<?php echo base_url('department'); ?>">Department</a>
								<a class="dropdown-item" href="<?php echo base_url('role'); ?>">Role</a>
								<a class="dropdown-item" href="<?php echo base_url('companybranch'); ?>">Company Branch</a>
								<a class="dropdown-item" href="<?php echo base_url('salary_head'); ?>">Salary Head</a>
								<a class="dropdown-item" href="<?php echo base_url('ptax'); ?>">Professional Tax</a>
								<a class="dropdown-item" href="<?php echo base_url('rating'); ?>">Rating</a>
								<a class="dropdown-item" href="<?php echo base_url('state'); ?>">State</a>
								<a class="dropdown-item" href="<?php echo base_url('city'); ?>">City</a>
								<a class="dropdown-item" href="<?php echo base_url('mw_type'); ?>">MW Type</a>
								<a class="dropdown-item" href="<?php echo base_url('gstcategory'); ?>">GST Category</a>
								<a class="dropdown-item" href="<?php echo base_url('gstservice'); ?>">GST Service Category</a>
								<a class="dropdown-item" href="<?php echo base_url('qualification'); ?>">Qualification</a>
								<a class="dropdown-item" href="<?php echo base_url('training_type'); ?>">Training Type</a>
								<a class="dropdown-item" href="<?php echo base_url('esi_organisation'); ?>">ESI Organisation</a>
								<a class="dropdown-item" href="<?php echo base_url('emp_doc_type'); ?>">Document Type</a>
								<a class="dropdown-item" href="<?php echo base_url('user_permission'); ?>">User Permission</a>
                            </div> 
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Transactions
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="#" ngbDropdownItem>Dummy Link</a>
                            </div>
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Reports
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="#" ngbDropdownItem>Dummy Link</a>
                            </div>
                          </li>
                        </ul>
                      </div> <!-- MENU SECTION --> <?php /* */ ?>
					  <?php echo user_menu(); ?>
                    </nav>
                </div>
            </div>
        </div>
    </section>
	<!-- //Close Top menu -->