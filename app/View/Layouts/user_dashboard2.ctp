<!DOCTYPE html>
<html>
	<head>
		<?php echo $this->Html->charset(); ?>
		<title>
			<?php echo $this->fetch('title'); ?>
		</title>
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
        <!-- ./meta section -->

        <!-- css styles -->
        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/blue-white.css" id="dev-css">
        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot ?>css/de-custom-alerts.css" id="dev-css">
        <!-- ./css styles -->

        <!--[if lte IE 9]>
        <link rel="stylesheet" type="text/css" href="<?php echo $this->webroot; ?>css/dev-other/dev-ie-fix.css">
        <![endif]-->

        <!-- javascripts -->
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/plugins/modernizr/modernizr.js"></script>
        <!-- ./javascripts -->

        <style>
            .dev-page{visibility: hidden;}
        </style>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/plugins/jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/plugins/bootstrap/bootstrap.min.js"></script>
	</head>
	<body>
		<!--		<div id="container">
					<div id="content">
		
		<?php //echo $this->Flash->render(); ?>
		
		<?php //echo $this->fetch('content'); ?>
					</div>
				</div>-->
		<!-- set loading layer -->
        <div class="dev-page-loading preloader"></div>
        <!-- ./set loading layer -->

        <!-- page wrapper -->
        <div class="dev-page">

			<?php //echo $this->Element('user/header'); ?>
            <!-- ./page header -->

            <!-- page container -->
            <div class="dev-page-container">

				<?php echo $this->Element('user/sidebar'); ?>
                <!-- ./page sidebar -->
				<!-- page content -->
				<div class="dev-page-content">
					<!-- page content container -->
					<div class="container">

						<?php //echo $this->Element('user/content'); ?>
						<div class="wrapper">
							<?php
							//echo $this->Element('notify_flash');
							echo $this->Session->flash();
							?>
							<?php echo $this->fetch('content'); ?>
						</div>

						<!-- Copyright -->
						<div class="copyright">
							<div class="pull-left">
								&copy; <?php echo date('Y') ?> <strong><?php echo APP_NAME ?></strong>. All rights reserved.
							</div>
							<div class="pull-right">
								<!--				<a href="#">Terms of use</a> / <a href="#">Privacy Policy</a>-->
							</div>
						</div>
						<!-- ./Copyright -->
						<!-- ./page content -->
					</div>
				</div>
            </div>
            <!-- ./page container -->

			<?php echo $this->Element('user/modals') ?>
			<?php //echo $this->Element('user/right-bar') ?>
            <!-- ./right bar -->

			<?php //echo $this->Element('user/footer'); ?>
            <!-- ./page footer -->

			<?php //echo $this->Element('user/page-search'); ?>
            <!-- page search -->
        </div>
        <!-- ./page wrapper -->

        <!-- javascript -->

        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/plugins/moment/moment.js"></script>

        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/plugins/knob/jquery.knob.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/plugins/sparkline/jquery.sparkline.min.js"></script>

        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/plugins/bootstrap-select/bootstrap-select.js"></script>

        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/plugins/nvd3/d3.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/plugins/nvd3/nv.d3.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/plugins/nvd3/lib/stream_layers.js"></script>

        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/plugins/waypoint/waypoints.min.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/plugins/counter/jquery.counterup.min.js"></script>

<!--<script type="text/javascript" src="<?php echo $this->webroot; ?>js/dev-settings.js"></script>-->
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/dev-loaders.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/dev-layout-default.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/demo.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/dev-app.js"></script>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/demo-dashboard.js"></script>
		<script type="text/javascript" src="<?php echo $this->webroot ?>js/de-custom-alerts.js"></script>
        <!-- ./javascript -->

		<?php echo $this->element('sql_dump'); ?>
	</body>
</html>

