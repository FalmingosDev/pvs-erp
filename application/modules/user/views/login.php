<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="PVS admin dashboard">
    <meta name="description" content="Admin login">
    <meta name="robots" content="noindex,nofollow">
    <title>PVS ERP System</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link href="<?php echo base_url() . 'assets/fontawesome/css/all.css'; ?>" rel="stylesheet"> <!--load all styles -->
	
    <!-- <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap.min.css'; ?>" />
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/bootstrap-responsive.min.css'; ?>" /> -->
    <link rel="stylesheet" href="<?php echo base_url() . 'assets/css/maruti-login.css'; ?>" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon.png">
</head>

<body>
    <div id="loginbox">
        <!-- <form id="loginform" class="form-vertical" action="" method="post"> -->
		<?php echo form_open( base_url( 'login' ), array( 'id' => 'loginform', 'class' => 'form-vertical' ) ); ?>
            <div class="control-group normal_text">
                <h3><img src="<?php echo base_url() . 'assets/img/logo.png'; ?>" alt="Logo" /></h3>
            </div>
			<?php if($this->session->flashdata('error_msg')){?>
			<div class="widget-box">
				<div class="alert alert-error alert-block">
					<a class="close" data-dismiss="alert" href="#">×</a>
					<?php echo $this->session->flashdata('error_msg'); ?>
				</div>
			</div>
			<?php } ?>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on"><i class="fas fa-user"></i></span>
						<input type="text" name="username" id="username" placeholder="Username" value="<?php echo set_value('username'); ?>" />
						<?php echo form_error('username', '<span class="error">', '</span>'); ?>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <div class="main_input_box">
                        <span class="add-on"><i class="fas fa-lock"></i></span>
						<input type="password" name="password" id="password" placeholder="Password" />
						<?php echo form_error('password', '<span class="error">', '</span>'); ?>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <!-- <span class="pull-left"><a href="#" class="flip-link btn btn-inverse" id="to-recover">Lost
                        password?</a></span> -->
                <span class="pull-right"><input type="submit" class="btn btn-success" value="Login" /></span>
            </div>
        <?php echo form_close(); ?>
		<!-- </form> -->
        <!-- <form id="recoverform" action="#" class="form-vertical">
            <p class="normal_text">Enter your e-mail address below and we will send you instructions how to recover a
                password.</p>

            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on"><i class="icon-envelope"></i></span><input type="text"
                        placeholder="E-mail address" />
                </div>
            </div>

            <div class="form-actions">
                <span class="pull-left"><a href="#" class="flip-link btn btn-inverse" id="to-login">&laquo; Back to
                        login</a></span>
                <span class="pull-right"><input type="submit" class="btn btn-info" value="Recover" /></span>
            </div>
        </form> -->
    </div>
	
	<script defer src="<?php echo base_url() . 'assets/fontawesome/js/all.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/jquery.min.js'; ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/maruti.login.js'; ?>"></script>
</body>

</html>