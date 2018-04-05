<section class="press_page" style="background: url('/dev/royalty_rug/files/images/press.jpg'); background-position: center center;background-attachment: fixed;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="press_details">
					<h3>about </h3>
					<h2>above & <br>beyond</h2>
				</div>
			</div>
		</div>
	</div>
</section> 
<section class="press_page_list">
	<div class="container">
		<div class="row">
			<?php 
				if(count($press)){
					foreach ($press as $key => $value) { ?>
					<div class="col-md-4">
						<div class="press_images">
							<?php
                           
                            $image = 'default_image.png';

                            if(strlen(trim($value['Press']['image']))){
                              $path = APP . 'webroot' . DS . 'files' . DS . 'press_photo'. DS . '300x300'.$value['Press']['image'];
                              if(file_exists($path)){
                                $image = '300x300'.$value['Press']['image'];
                              
                              }
                            } 
                        	?>  
							<img src="<?php echo $this->webroot.'files/press_photo/'.$image; ?>" >
						</div>
					</div>
				<?php }
				}
			?>
			
		</div>
		
	</div>
</section> 
<section class="about_more">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6">
				<div class="about_more" style=" background: url('http://bijan.com/images/bijan-about-bijan-viewmore-thumbnail.jpg'); background-position: center center;background-size: cover;"> 
					<h3>about </h3>
					<h2>Test</h2>
				</div>
			</div>
			<div class="col-md-6">
				<div class="about_more" style=" background: url('http://bijan.com/images/bijan-contact-viewmore-thumbnail.jpg'); background-position: center center;background-size: cover;"> 
					<h3>about </h3>
					<h2>get in touch</h2> 
				</div>
			</div>
		</div>
	</div>
</section>