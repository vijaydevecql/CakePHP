<!DOCTYPE html>
<html>
    <head>
		<?php echo $this->Html->charset(); ?>
        <!-- meta section -->
        <title><?php echo APP_NAME ?>: <?php echo $this->fetch('title'); ?></title>

		<?php
		//echo $this->Html->meta('icon');

		//echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" >
        <meta http-equiv="X-UA-Compatible" content="IE=edge" >
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" >

        <link rel="icon" href="<?php echo $this->webroot.'img/kenxila-favicon.jpg' ?>" type="image/jpeg" >
        <!-- /meta section -->

        <!-- css styles -->
        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot ?>css/blue-white.css" id="dev-css">
        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot ?>css/de-custom-alerts.css" id="dev-css">
        <!-- ./css styles -->

        <!--[if lte IE 9]>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot ?>css/dev-other/dev-ie-fix.css">
        <![endif]-->

        <!-- javascripts -->
        <script type="text/javascript" src="<?php echo $this->webroot ?>js/plugins/modernizr/modernizr.js"></script>
        <!-- ./javascripts -->

        <style>.dev-page{visibility: hidden;}</style>
    </head>
	<body>

		<div class="dev-page dev-page-login dev-page-login-v2">
			<?php //echo $this->Flash->render(); ?>
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
        </div>
        <!-- ./page wrapper -->

        <!-- javascript -->
        <script type="text/javascript" src="<?php echo $this->webroot ?>js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot ?>js/plugins/bootstrap/bootstrap.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot ?>js/de-custom-alerts.js"></script>
        <!-- ./javascript -->
		<?php echo $this->element('sql_dump'); ?>
	</body>
</html>
