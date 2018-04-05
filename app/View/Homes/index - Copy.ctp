
<section class="owner_sec">
	<div class="col-md-6 col-sm-8 dd">
		<div class="row">

			<div class="onr_img">
				<img src="<?php echo $this->webroot . 'files/images/' . $about_data['Content']['url']; ?>">
			</div>
		</div>
	</div>
	<div class="col-md-6 col-sm-4 dd">
		<div class="onr_text" style="text-transform: none;">
			<h3><?php echo $about_data['Content']['name']; ?></h3>
			<h2><?php echo $about_data['Content']['title']; ?></h2>
			<p><?php echo $about_data['Content']['short_description']; ?></p>
			<a href="<?php echo $this->webroot . 'about'; ?>">About Royalty Rug</a>
		</div>
	</div>
</section>
<?php if (count($collection_data)) { ?>
	<section class="loyi_section" id="collection_section">
		<div class="container-fluid">
			<div class="row">
				<?php foreach ($collection_data as $key => $value) { ?>


					<div class="col-md-4 col-sm-4 no_padding" style="overflow: hidden; height: 230px;">
						<div class="loyi_block">
							<?php
							$image = 'default.png';
							$_PATH = APP . 'webroot' . DS . 'files' . DS . 'collections' . DS . $value['Collection']['image'];
							if (file_exists($_PATH)) {

								$image = $value['Collection']['image'];
							}
							?>
							<img src="<?php echo $this->webroot . 'files/collections/' . $image; ?>" >
							<div class="title">
								<h2 style="
									cursor: pointer;
									"><?php echo $value['Collection']['title']; ?></h2>
								<a href="<?php echo $this->webroot . 'collection/' . $value['Collection']['id']; ?>">view collection</a>
							</div>
						</div>
					</div>



				<?php } ?>
			</div>
		</div>
	</section>
	<script>
		$('#collection_section .title h2').on('click', function () {
			window.location.href = $(this).parent().find('a').attr('href');
		});
	</script>

<?php } ?>

<div class="iiner_next" id="collection_section">
	<div class="col-md-4 col-md-offset-4">
		<div class="collect uper_colect">
			<h3>COLLECTION</h3>
			<h2>WEARABLE ART</h2>

			<a href="#" data-toggle="modal" data-target="#collections_record">view collection</a>
		</div>
	</div>
</div>
<section class="back_ds" style="display:none;">
	<div class="container">
		<div class="col-md-7">
			<div class="collect">
				<h3><?php echo $collection['Content']['title']; ?></h3>
				<h2><?php echo $collection['Content']['short_description']; ?></h2>

				<a href="#">view collection</a>
			</div>
		</div>
	</div>
</section>
<?php
/*
  ?>

  <section class="owner_sec">
  <div class="col-md-6 dd">
  <div class="onr_text">
  <h3><?php echo $owner_data['Content']['name']; ?></h3>
  <h2><?php echo $owner_data['Content']['title']; ?></h2>
  <p><?php echo $owner_data['Content']['short_description']; ?></p>



  <a href="<?php echo $this->webroot.'presses'?>">explore press</a>
  </div>
  </div>
  <div class="col-md-6 dd">
  <div class="row">
  <div class="onr_img">
  <img src="<?php echo $this->webroot; ?>files/images/<?php echo $owner_data['Content']['url']; ?>">
  </div>
  </div>
  </div>
  </section>
  <?php
 */
?>
<section class="loyi_section custom_height" id="collection_section2">
	<div class="container-fluid" style="position: relative; top: 50px;">
		<div class="row">
			<!-- Youtube -->
			<div class="col-md-4 col-sm-4 no_padding">
				<div class="loyi_block">

					<!-- <iframe width="100%" height="300" autoplay=false src="<?php echo $this->webroot.'files/default/'?>loyi1.mp4?autoplay=false"></iframe> -->
					<video width="100%" height="249"  poster="<?php echo $this->webroot.'files/default/'?>video1.png" src="<?php echo $this->webroot.'files/default/'?>loyi1.mp4" class = "myvideo"></video>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 no_padding">
				<div class="loyi_block">
					<!-- <iframe width="100%" height="300" src="https://www.youtube.com/embed/AKWHfWtMALg"></iframe> -->
					<video width="100%" height="249"  poster="<?php echo $this->webroot.'files/default/'?>video2.png" src="<?php echo $this->webroot.'files/default/'?>loyi2.mp4" class = "myvideo"></video>
				</div>
			</div>

			<div class="col-md-4 col-sm-4 no_padding">
				<div class="loyi_block">
					<!-- <iframe width="100%" height="300" src="https://www.youtube.com/embed/GLRygPViQWI"></iframe> -->
					<video width="100%" height="249"  poster="<?php echo $this->webroot.'files/default/'?>video3.png" src="<?php echo $this->webroot.'files/default/'?>loyi3.mp4" class = "myvideo"></video>

				</div>
			</div>

		</div>
	</div>
</section>

	<section class="about">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="about_text">
						<h3>ABOUT</h3>
						<h2>GET IN TOUCH</h2>
						<p>
							As the reigning expert in Persian Rugs, Royalty Rug is the most exclusive and the most influential designer in the world. To best serve our clientele, we welcome you to visit one of our locations in the world.
						</p>
						<a href="<?php echo $this->webroot . 'contact'; ?>"> Contact</a>
					</div>
				</div>
			</div>
		</div>
	</section> 

	<div id="collections_record" class="modal fade" role="dialog">
		<section class="collection_list">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="logo_pop">
							<a href="<?php echo $this->webroot;?>" ><img src="<?php echo $this->webroot . 'files/default/logo.png'; ?>"></a>
						</div>

						<a href="" class="close" data-dismiss="modal" ><div class="close_me"> Close <i class="fa fa-times" aria-hidden="true"></i></div></a>
					</div>
					<div class=" col-md-offset-1 col-md-6 col-sm-7">
						<div class="logo_side" style="padding-top: 0px;">
							<h3 class="hide1">
								<img class="_collexns_popup" src="<?php echo $this->webroot ?>files/images/firoozeh.jpg" style="
									width: 400px;
									height: 400px;
									display: none;
									text-align: center;
								">
							</h3>
							<?php
							
							if (count($collection_record)) {
								foreach ($collection_record as $key => $value) {
									?>
									<h2 class="hide1 _collexns" >&nbsp;</h2>
									<?php
								}
							} else {
								?>
								<h2 class="hide1">&nbsp;</h2>
							<?php }
							?>
						</div>
					</div>
					<div class="col-md-5 col-sm-5">
						<div class="logo_side" style="background: none;    text-align: left;
							 padding-top: 20px;">
							<h3 style="font-size: 48px;">collection</h3>
							<?php
							$_images = [
								2 => 'firoozeh.jpg',
								3 => 'karoba.jpeg',
								4 => 'zomorod.jpeg'
							];
							if (count($collection_record)) {
								foreach ($collection_record as $key => $value) {
									?>
									<h2>
										<a
											class="_collexns _collexns_link"
											data-image="<?php echo $this->webroot.'files/images/'.$_images[$value['Collection']['id']] ?>"
											href="<?php echo $this->webroot . 'collection/' . $value['Collection']['id']; ?>" >
												<?php echo ucfirst($value['Collection']['title']); ?>
										</a>
									</h2>
									<?php
								}
							} else {
								?>
								<h2><a href="javascript:void(0);" >No Collections</a></h2>
							<?php }
							?>
						</div>
					</div>
				</div>
			</div>
		</section>
	</div>


<script type="text/javascript">

	$(document).ready(function () {
		$("#Collection").click(function () {
			$('html, body').animate({
				scrollTop: $("#collection_section").offset().top
			}, 2000);
		});
		
		$(".myvideo").hover( hoverVideo, hideVideo );

		$('body').on('click','.myvideo', function () {
			this.paused ? this.play() : this.pause();
		});
		 
		


	});
	
	$('._collexns').hover( function () {
		$('._collexns_popup').attr('src', $(this).attr('data-image'));
		$('._collexns_popup').css('display', 'block');
	}, function () {
		$('._collexns_popup').attr('src', $(this).attr('data-image'));
		$('._collexns_popup').css('display', 'none');
	});

	
	
	function hoverVideo(e) {  
	    $(this).get(0).play(); 
	}

	function hideVideo(e) {
	    $(this).get(0).pause(); 
	}

	if ($(window).width() >= 768) {
        $("._collexns_link").addClass("_collexns");
    }else{

    	$('._collexns_link').on('click mouseover', function () {
	
			console.log($(this).attr('href'));
			window.location.href = $(this).attr('href');
		});

        $("._collexns_link").removeClass("_collexns");
    }

    $(window).on('resize', function(){
        var win = $(this); //this = window
        if(win.width() >= 768){

            $("._collexns_link").addClass("_collexns");
        }else{

        	$('._collexns_link').on('click mouseover', function () {
	
				console.log($(this).attr('href'));
				window.location.href = $(this).attr('href');
			});

         	$("._collexns_link").removeClass("_collexns");
        }
     });

</script>
