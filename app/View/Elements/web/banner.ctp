<section class="video_Sec">
	<?php if ($video == 1) { ?>
		<video autoplay onclick="this.play();" autobuffer muted loop id="myVideo">
				 <source src="<?php echo $this->webroot.'files/video/'.$video_url; ?>" type="video/mp4">
				 <source src="<?php echo $this->webroot.'files/video/Rug.ogv';?>" type="video/ogg">
				 <source src="<?php echo $this->webroot.'files/video/Rug.webm';?>" type="video/webm">
		</video>
	<?php } ?>
</section>




 