<!DOCTYPE html>
<html class="no-js before-run" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
		<meta name="description" content="bootstrap admin template">
		<meta name="author" content="">

		<title><?php echo APP_NAME ?> | Admin | Login </title>

		<link rel="apple-touch-icon" href="<?php echo $this->webroot.'assets' ?>/images/apple-touch-icon.png">
		<link rel="shortcut icon" href="<?php echo $this->webroot.'files/logo/fav.png' ?>">

		<!-- Stylesheets -->
		<link rel="stylesheet" href="<?php echo $this->webroot.'assets' ?>/css/bootstrap.min.css">
		<link rel="stylesheet" href="<?php echo $this->webroot.'assets' ?>/css/bootstrap-extend.min.css">
		<link rel="stylesheet" href="<?php echo $this->webroot.'assets' ?>/css/site.min.css">

		<link rel="stylesheet" href="<?php echo $this->webroot.'assets' ?>/vendor/animsition/animsition.css">
		<link rel="stylesheet" href="<?php echo $this->webroot.'assets' ?>/vendor/asscrollable/asScrollable.css">
		<link rel="stylesheet" href="<?php echo $this->webroot.'assets' ?>/vendor/switchery/switchery.css">
		<link rel="stylesheet" href="<?php echo $this->webroot.'assets' ?>/vendor/intro-js/introjs.css">
		<link rel="stylesheet" href="<?php echo $this->webroot.'assets' ?>/vendor/slidepanel/slidePanel.css">
		<link rel="stylesheet" href="<?php echo $this->webroot.'assets' ?>/vendor/flag-icon-css/flag-icon.css">
		<link rel="stylesheet" href="<?php echo $this->webroot.'assets' ?>/vendor/toastr/toastr.css">


		<!-- Page -->
		<link rel="stylesheet" href="<?php echo $this->webroot.'assets' ?>/css/pages/login.css">

		<!-- Fonts -->
		<link rel="stylesheet" href="<?php echo $this->webroot.'assets' ?>/fonts/web-icons/web-icons.min.css">
		<link rel="stylesheet" href="<?php echo $this->webroot.'assets' ?>/fonts/brand-icons/brand-icons.min.css">
		<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

		<script src="<?php echo $this->webroot.'assets' ?>/vendor/jquery/jquery.js"></script>
		<script src="<?php echo $this->webroot.'assets' ?>/vendor/bootstrap/bootstrap.js"></script>


		<!--[if lt IE 9]>
		  <script src="<?php echo $this->webroot.'assets' ?>/vendor/html5shiv/html5shiv.min.js"></script>
		  <![endif]-->

		<!--[if lt IE 10]>
		  <script src="<?php echo $this->webroot.'assets' ?>/vendor/media-match/media.match.min.js"></script>
		  <script src="<?php echo $this->webroot.'assets' ?>/vendor/respond/respond.min.js"></script>
		  <![endif]-->

		<!-- Scripts -->
		<script src="<?php echo $this->webroot.'assets' ?>/vendor/modernizr/modernizr.js"></script>
		<script src="<?php echo $this->webroot.'assets' ?>/vendor/breakpoints/breakpoints.js"></script>
		<script>
            Breakpoints();
		</script>
	</head>
	<body class="page-login layout-full">
		<!--[if lt IE 8]>
			  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
		  <![endif]-->


		<!-- Page -->
		<div class="page animsition vertical-align text-center" data-animsition-in="fade-in"
			 data-animsition-out="fade-out">>
			<div class="page-content vertical-align-middle">
				<div class="brand">
					<img class="brand-img" src="<?php echo $this->webroot.'files/logo/logo.png' ?>" alt="..." style="width: 40%">
					
				</div>
				<?php echo $this->Session->flash(); ?>
				<?php echo $this->fetch('content'); ?>
				<?php echo $this->element('admin/login-footer'); ?>
			</div>
		</div>
		<!-- End Page -->


		<!-- Core  -->
		<script src="<?php echo $this->webroot.'assets' ?>/vendor/animsition/jquery.animsition.js"></script>
		<script src="<?php echo $this->webroot.'assets' ?>/vendor/asscroll/jquery-asScroll.js"></script>
		<script src="<?php echo $this->webroot.'assets' ?>/vendor/mousewheel/jquery.mousewheel.js"></script>
		<script src="<?php echo $this->webroot.'assets' ?>/vendor/asscrollable/jquery.asScrollable.all.js"></script>
		<script src="<?php echo $this->webroot.'assets' ?>/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>

		<!-- Plugins -->
		<script src="<?php echo $this->webroot.'assets' ?>/vendor/switchery/switchery.min.js"></script>
		<script src="<?php echo $this->webroot.'assets' ?>/vendor/intro-js/intro.js"></script>
		<script src="<?php echo $this->webroot.'assets' ?>/vendor/screenfull/screenfull.js"></script>
		<script src="<?php echo $this->webroot.'assets' ?>/vendor/slidepanel/jquery-slidePanel.js"></script>

		<script src="<?php echo $this->webroot.'assets' ?>/vendor/jquery-placeholder/jquery.placeholder.js"></script>

		<!-- Scripts -->
		<script src="<?php echo $this->webroot.'assets' ?>/js/core.js"></script>
		<script src="<?php echo $this->webroot.'assets' ?>/js/site.js"></script>

		<script src="<?php echo $this->webroot.'assets' ?>/js/sections/menu.js"></script>
		<script src="<?php echo $this->webroot.'assets' ?>/js/sections/menubar.js"></script>
		<script src="<?php echo $this->webroot.'assets' ?>/js/sections/sidebar.js"></script>

		<script src="<?php echo $this->webroot.'assets' ?>/js/configs/config-colors.js"></script>
		<script src="<?php echo $this->webroot.'assets' ?>/js/configs/config-tour.js"></script>

		<script src="<?php echo $this->webroot.'assets' ?>/js/components/asscrollable.js"></script>
		<script src="<?php echo $this->webroot.'assets' ?>/js/components/animsition.js"></script>
		<script src="<?php echo $this->webroot.'assets' ?>/js/components/slidepanel.js"></script>
		<script src="<?php echo $this->webroot.'assets' ?>/js/components/switchery.js"></script>
		<script src="<?php echo $this->webroot.'assets' ?>/js/components/jquery-placeholder.js"></script>
		<script src="<?php echo $this->webroot.'assets' ?>/vendor/toastr/toastr.js"></script>
		<script src="<?php echo $this->webroot.'assets' ?>/js/components/toastr.js"></script>

		<script>
            (function (document, window, $) {
                'use strict';

                var Site = window.Site;
                $(document).ready(function () {
                    Site.run();
                });
            })(document, window, jQuery);
		</script>
		<script src="<?php echo $this->webroot.'assets' ?>/js/tweb.js"></script>

	</body>

</html>