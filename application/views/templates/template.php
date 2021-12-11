<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"> -->
        <!-- page title specific to the page -->
        <title><?php echo $this->config->item('website_name'); ?> | {title}</title>
        <!-- meta keywords specific to the page -->
        {_meta}
        <!-- common style sheets for every page -->

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url() . 'assets/css/style.css'; ?>">
        

    <!-- datepicker -->
  <!--   <link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css"> -->
    <!-- datepicker -->
		
        <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap2.min.css'; ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap-responsive.min.css'; ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/maruti-style.css'; ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/maruti-media.css'; ?>" class="skin-color"> -->
        <!-- style sheets specific to the page -->
		{_styles}
        
        <!-- jquery library common for all pages -->
		<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
		<script> var base_url = '<?php echo base_url(); ?>'</script>
    </head>
    <body>
		<?php //echo uri_string() . '<br />'; ?>
		{header}
		<!-- <div class="clear"></div> -->
		<?php if($this->session->flashdata('error_msg')): ?>
		<div class="alert alert-danger alert-dismissible fade show" role="alert" id="show_msg">
				<strong><?php echo $this->session->flashdata('error_msg'); ?></strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
		</div>
		<?php endif; ?>
		{content}
		<!-- <div class="clear"></div> -->
		{footer}
		<!-- <div class="clear"></div> -->
        <!-- common js files for every page -->
		<!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script> -->
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url() . 'assets/js/main.js'; ?>"></script>
        
        

        <!-- datepicker -->

        <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.js"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script> -->

        <!-- datepicker -->
		
        <!--js files specific to the page -->
        {_scripts}
    </body>
</html>