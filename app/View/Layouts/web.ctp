<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Royality Rug</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?php echo $this->webroot; ?>web_css/css/bootstrap.min.css">
	<!-- <link rel="stylesheet" href="<?php echo $this->webroot; ?>web_css/css/font-awesome.css"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet"> 
	<link rel="stylesheet" href="<?php echo $this->webroot; ?>web_css/css/style.css">
	<link rel="stylesheet" href="<?php echo $this->webroot; ?>web_css/css/xzoom.css">
	<link rel="shortcut icon" href="<?php echo $this->webroot . 'files' ?>/logo/fav.png">
	<link rel="stylesheet" href="<?php echo $this->webroot.'assets' ?>/vendor/bootstrap-sweetalert/sweet-alert.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="<?php echo $this->webroot.'assets' ?>/vendor/bootstrap-sweetalert/sweet-alert.css">
	<script src="<?php echo $this->webroot.'assets' ?>/vendor/bootbox/bootbox.js"></script>
	<script src="<?php echo $this->webroot.'assets' ?>/vendor/bootstrap-sweetalert/sweet-alert.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Alfa+Slab+One" rel="stylesheet"> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.13/jquery.mask.min.js"></script>
	<script src="<?php echo $this->webroot.'web_js/js/xzoom.min.js' ?>"></script>
	<script src="<?php echo $this->webroot.'assets' ?>/vendor/bootstrap-sweetalert/sweet-alert.js"></script>
	
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet"> 
</head>
<body>
	<?php echo $this->Session->flash(); 
		//echo $this->Flash->render();
	?>
	<?php 
	echo $this->element('web/header');
	echo $this->element('web/banner');
	echo $this->fetch('content');
	echo $this->fetch('web/contact');
	echo $this->element('web/about');
	echo $this->element('web/footer');
	?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="<?php echo $this->webroot; ?>web_js/js/bootstrap.min.js"></script>
	<script>
		var video = document.getElementById("myVideo");
		var btn = document.getElementById("myBtn");

		function myFunction() {
			if (video.paused) {
				video.play();
				btn.innerHTML = "Pause";
			} else {
				video.pause();
				btn.innerHTML = "Play";
			}
		}
	</script>
</body>
</html>

