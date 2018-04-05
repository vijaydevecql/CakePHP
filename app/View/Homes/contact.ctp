 <section class="account" style="background: url('https://i5.walmartimages.com/asr/6fc7848f-dbc0-4c4f-a77a-6f62aa7999fc_1.ca8f64e6b1d160c25b78dd00a861fb39.jpeg')">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="Conatc_text">
								<h3> about</h3>
							<h2>get in touch </h2>
						</div>
					</div>
					
					
				</div>
			</div>
		</section>
		<section class="secod_cont">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
						<div class="text_left">
							<h3> get in touch</h3>
							<h2>House of Royality Rug </h2>
						</div>
					</div>
					<div class="col-md-6">
						<div class="text_right">
						<p>For any questions concerning Royalty Rug's exclusive collections or to schedule your visit to the House of Royalty Rug, please contact us by phone or email.</p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="call_us">
							<h3><i class="fa fa-clock-o" aria-hidden="true"></i></h3>
							<p> <b>open:</b> <?php echo $open_day; ?>-<?php echo $close_day; ?>  <?php echo $open_time; ?> - <?php echo $close_time?> </p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="call_us">
							<h3><i class="fa fa-phone" aria-hidden="true"></i></h3>
							<p> <b>phone:</b> <?php echo $phone; ?></p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="call_us">
							<h3><i class="fa fa-fax" aria-hidden="true"></i></h3>
							<p> <b>fax:</b><?php echo $fax; ?></p>
						</div>
					</div>
					<div class="col-md-3">
						<div class="call_us">
							<h3><i class="fa fa-envelope-o" aria-hidden="true"></i></h3>
							<p> <b>email:</b> <?php echo $admin_email; ?></p>
						</div>
					</div>
					<div class="col-md-12">
						<div class="map">
							<iframe style="width: 100%; height: 500px;" src="<?php  echo $Embed_Map; ?>&key=<?php echo MAP_API_KEY; ?>"></iframe>
							
						</div>
					</div>
			</div>
			<div class="row">
				<!-- <h2>Contact Us</h2> -->
				<br>
				<p>If you have any query, please contact us.</p>
				<div class=" ">
					<div class="col-md-6 col-md-offset-3 contc_form">
						<form method="post">
							<div class="form-group">
								<label class=""> Name:</label>
								<input type="text" class="form-control" required name="name" placeholder="Enter Your Name">
							</div>
							<div class="form-group">
								<label class=""> Email:</label>
								<input type="email" class="form-control" required name="email" placeholder="Enter Your Email">
							</div>
							<div class="form-group">
								<label class=""> Phone:</label>
									<input type="number" class="form-control" required name="phone" placeholder="Enter Your Phone Number">
							</div>
							<div class="form-group">
								<label class=""> Message:</label>
								<textarea class="form-control" rows="5" required name="message" placeholder="Enter Your Name"></textarea>
							</div>
							
							<div class="form-group">
								<input type="submit" class="form-control btn-warning btn_contact" name="submit" value="Send" >
							</div>
						</form>
					</div>
				</div>
			</div>

		</div>
		</section>