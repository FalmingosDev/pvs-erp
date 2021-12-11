<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!-- page title specific to the page -->
        <title><?php echo $this->config->item('website_name'); ?> | {title}</title>
        <!-- meta keywords specific to the page -->
        {_meta}
        <!-- common style sheets for every page -->
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap.min.css'; ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap-responsive.min.css'; ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/maruti-style.css'; ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/maruti-media.css'; ?>" class="skin-color">
        <!-- style sheets specific to the page -->
        {_styles}
		<script> var base_url = '<?php echo base_url(); ?>'</script>
    </head>
    <body>
		{header}
		<!-- <div class="clear"></div> -->
		{content}
		<!-- <div class="clear"></div> -->
		{footer}
		<!-- <div class="clear"></div> -->
        <!-- common js files for every page -->
		<script src="<?php echo base_url() . 'assets/js/jquery.min.js'; ?>"></script>
		<script src="<?php echo base_url() . 'assets/js/jquery.ui.custom.js'; ?>"></script>
		<script src="<?php echo base_url() . 'assets/js/bootstrap.min.js'; ?>"></script>
		<script src="<?php echo base_url() . 'assets/js/maruti.js'; ?>"></script>
        <!-- js files specific to the page -->
        {_scripts}
    </body>
</html>