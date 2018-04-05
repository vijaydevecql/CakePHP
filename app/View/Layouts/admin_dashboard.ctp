<!DOCTYPE html>
<html class="no-js before-run" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="description" content="bootstrap admin template">
        <meta name="author" content="">

        <title><?php echo APP_NAME ?> | Admin | Users </title>

        <link rel="apple-touch-icon" href="<?php echo $this->webroot . 'assets' ?>/images/apple-touch-icon.png">
        <link rel="shortcut icon" href="<?php echo $this->webroot . 'files' ?>/logo/fav.png">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="<?php echo $this->webroot . 'assets' ?>/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $this->webroot . 'assets' ?>/vendor/bootstrap-datepicker/bootstrap-datepicker.css">
        <link rel="stylesheet" href="<?php echo $this->webroot . 'assets' ?>/css/bootstrap-extend.min.css">
        <link rel="stylesheet" href="<?php echo $this->webroot . 'assets' ?>/css/site.min.css">

        <link rel="stylesheet" href="<?php echo $this->webroot . 'assets' ?>/vendor/animsition/animsition.css">
        <link rel="stylesheet" href="<?php echo $this->webroot . 'assets' ?>/vendor/asscrollable/asScrollable.css">
        <link rel="stylesheet" href="<?php echo $this->webroot . 'assets' ?>/vendor/switchery/switchery.css">
        <link rel="stylesheet" href="<?php echo $this->webroot . 'assets' ?>/vendor/intro-js/introjs.css">
        <link rel="stylesheet" href="<?php echo $this->webroot . 'assets' ?>/vendor/slidepanel/slidePanel.css">

        <link rel="stylesheet" href="<?php echo $this->webroot . 'assets' ?>/vendor/flag-icon-css/flag-icon.css">
        <link rel="stylesheet" href="<?php echo $this->webroot . 'assets' ?>/vendor/alertify-js/alertify.css">


        <!-- Fonts -->
        <link rel="stylesheet" href="<?php echo $this->webroot . 'assets' ?>/fonts/web-icons/web-icons.min.css">
        <link rel="stylesheet" href="<?php echo $this->webroot . 'assets' ?>/fonts/brand-icons/brand-icons.min.css">
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>
        <link rel="stylesheet" href="<?php echo $this->webroot . 'assets' ?>/vendor/toastr/toastr.css">
        <!-- <link rel="stylesheet" href="<?php echo $this->webroot . 'assets' ?>/pages/profile.css"> -->
        <link rel="stylesheet" href="<?php echo $this->webroot . 'assets' ?>/vendor/clockpicker/clockpicker.css">
        <link rel="stylesheet" href="<?php echo $this->webroot . 'assets' ?>/vendor/cropper/cropper.css">
        <link rel="stylesheet" href="<?php echo $this->webroot . 'assets' ?>/vendor/multi-select/multi-select.css">
        <link rel="stylesheet" href="<?php echo $this->webroot . 'assets' ?>/vendor/select2/select2.css">
        <link rel="stylesheet" href="<?php echo $this->webroot.'assets' ?>/vendor/bootstrap-sweetalert/sweet-alert.css">
         <link rel="stylesheet" href="<?php echo $this->webroot.'assets' ?>/vendor/datatables-bootstrap/dataTables.bootstrap.css">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
          <link rel="stylesheet" href="<?php echo $this->webroot.'assets' ?>/vendor/datatables-fixedheader/dataTables.fixedHeader.css">
          <link rel="stylesheet" href="<?php echo $this->webroot.'assets' ?>/vendor/datatables-responsive/dataTables.responsive.css">





        <script src="<?php echo $this->webroot . 'assets' ?>/vendor/jquery/jquery.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/vendor/bootstrap/bootstrap.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/vendor/clockpicker/bootstrap-clockpicker.min.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/vendor/cropper/cropper.min.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/vendor/multi-select/jquery.multi-select.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/vendor/select2/select2.min.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/vendor/alertify-js/alertify.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/vendor/bootstrap-datepicker/bootstrap-datepicker.js"></script>
        <script src="<?php echo $this->webroot.'assets' ?>/vendor/bootbox/bootbox.js"></script>
  		<script src="<?php echo $this->webroot.'assets' ?>/vendor/bootstrap-sweetalert/sweet-alert.js"></script>


        <!--
        <script src="<?php echo $this->webroot . 'assets' ?>/vendor/blueimp-file-upload/jquery.fileupload-ui.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/vendor/blueimp-file-upload/jquery.fileupload.js"></script>
        -->


        <!--[if lt IE 9]>
          <script src="<?php echo $this->webroot . 'assets' ?>/vendor/html5shiv/html5shiv.min.js"></script>
          <![endif]-->

        <!--[if lt IE 10]>
          <script src="<?php echo $this->webroot . 'assets' ?>/vendor/media-match/media.match.min.js"></script>
          <script src="<?php echo $this->webroot . 'assets' ?>/vendor/respond/respond.min.js"></script>
          <![endif]-->

        <!-- Scripts -->
        <script src="<?php echo $this->webroot . 'assets' ?>/vendor/modernizr/modernizr.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/vendor/breakpoints/breakpoints.js"></script>
        <script>
            Breakpoints();
        </script>
        <!-- Core  -->
        <script src="<?php echo $this->webroot . 'assets' ?>/vendor/animsition/jquery.animsition.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/vendor/asscroll/jquery-asScroll.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/vendor/mousewheel/jquery.mousewheel.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/vendor/asscrollable/jquery.asScrollable.all.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>

        <!-- Plugins -->
        <script src="<?php echo $this->webroot . 'assets' ?>/vendor/switchery/switchery.min.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/vendor/intro-js/intro.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/vendor/screenfull/screenfull.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/vendor/slidepanel/jquery-slidePanel.js"></script>

        <script src="<?php echo $this->webroot . 'assets' ?>/vendor/peity/jquery.peity.min.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/vendor/formatter-js/jquery.formatter.js"></script>

        <!-- Scripts -->
        <script src="<?php echo $this->webroot . 'assets' ?>/js/core.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/js/site.js"></script>
        
    </head>
    <body>
        <!--[if lt IE 8]>
                  <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
          <![endif]-->

        <?php echo $this->element('admin/nav') ?>
        <?php echo $this->Session->flash(); ?>
        <?php echo $this->element('admin/sidebar') ?>
        <?php //echo $this->element('admin/sidebar-grid-menu') ?>
        <!-- Page -->
        <div class="page animsition">
            <div class="page-content">
                <!-- Panel -->
                <?php echo $this->fetch('content'); ?>
            </div>
        </div>
        <!-- End Page -->


        <?php
        echo $this->element('admin/dashboard-footer');
        ?>

        <script src="<?php echo $this->webroot . 'assets' ?>/js/sections/menu.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/js/sections/menubar.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/js/sections/sidebar.js"></script>

        <script src="<?php echo $this->webroot . 'assets' ?>/js/configs/config-colors.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/js/configs/config-tour.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/js/components/clockpicker.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/js/components/asscrollable.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/js/components/animsition.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/js/components/slidepanel.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/js/components/switchery.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/js/components/peity.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/vendor/toastr/toastr.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/js/components/toastr.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/js/components/bootstrap-datepicker.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/js/components/multi-select.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/js/components/select2.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/js/components/panel.js"></script>
        <script src="<?php echo $this->webroot . 'assets' ?>/js/components/alertify-js.js"></script>
        <script src="<?php echo $this->webroot.'assets' ?>/vendor/datatables/jquery.dataTables.min.js"></script>
          <script src="<?php echo $this->webroot.'assets' ?>/vendor/datatables-fixedheader/dataTables.fixedHeader.js"></script>
          <script src="<?php echo $this->webroot.'assets' ?>/vendor/datatables-bootstrap/dataTables.bootstrap.js"></script>
          <script src="<?php echo $this->webroot.'assets' ?>/vendor/datatables-responsive/dataTables.responsive.js"></script>
          <script src="<?php echo $this->webroot.'assets' ?>/vendor/datatables-tabletools/dataTables.tableTools.js"></script>


        <script src="<?php echo $this->webroot . 'assets' ?>/js/components/formatter-js.js"></script>

        <script>
            (function (document, window, $) {
                'use strict';

                var Site = window.Site;

                $(document).ready(function ($) {
                    Site.run();
                });
            })(document, window, jQuery);
        </script>
        <script src="<?php echo $this->webroot . 'assets' ?>/js/tweb.js"></script>

    </body>

</html>
<style type="text/css">
    a {
        text-decoration: none !important;
    }
</style>