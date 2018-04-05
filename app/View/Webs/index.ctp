<?php 

 //prx($cuisines); ?>
 <section class="banenr panel_1">
	  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
 	  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo $this->webroot ;?>aasets_web/images/banner.png" alt="">
      <div class="carousel-caption">
        <h1>What Food Is Your Mood</h1>
        <span><img src="<?php echo $this->webroot ;?>aasets_web/images/element.png"></span>
      </div>
    </div>
     <div class="item ">
      <img src="<?php echo $this->webroot ;?>aasets_web/images/banner.png" alt="">
      <div class="carousel-caption">
        <h1>What Food Is Your Mood</h1>
        <span><img src="<?php echo $this->webroot ;?>aasets_web/images/element.png"></span>
      </div>
    </div>
      <div class="item ">
      <img src="<?php echo $this->webroot ;?>aasets_web/images/banner.png" alt="">
      <div class="carousel-caption">
        <h1>What Food Is Your Mood</h1>
        <span><img src="<?php echo $this->webroot ;?>aasets_web/images/element.png"></span>
      </div>
    </div>
   
  </div>
   <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
	 </div>
 </section>
 <section class="panel_2">
 <div class="container">
 	<div class="col-sm-4 col-xs-12">
 		<div class="icon_bars">
 			<img src="<?php echo $this->webroot ;?>aasets_web/images/icon.png" alt=""/>
 			
 		</div>
 		<span>Pick a Restaurant</span>
 	</div>
 	<div class="col-sm-4 col-xs-12">
 		<div class="icon_bars">
 			<img src="<?php echo $this->webroot ;?>aasets_web/images/icon1.png" alt=""/>
 			
 		</div>
 		<span>Place Your Order</span>
 	</div>
 	<div class="col-sm-4 col-xs-12">
 		<div class="icon_bars">
 			<img src="<?php echo $this->webroot ;?>aasets_web/images/icon2.png" alt=""/>
 			
 		</div>
 		<span>We Deliver</span>
 	</div>
 </div>	
 	
 </section>
 <section class="panel_3">
 <div class="container">
 	<div class="row">
 		<a href="<?php echo $this->webroot ;?>restaurant-detail/<?php echo $featured_restaurant['Restaurant']['id']; ?>">
 		<div class="col-sm-12">
 			
 			<img src="<?php echo $this->webroot ;?>uploads/restaurants/<?php echo $featured_restaurant['Restaurant']['image']; ?>" width="100%">
 			<div class="caption_img">
 				<h2>FEATURED RESTURANT</h2>

 				<h3><?php echo $featured_restaurant['Restaurant']['name']; ?></h3>
 				<!-- <span>$ 2.75 PER DELIVERY</span>
 				<span>(MEMBERS ONLY)</span> -->
 			</div>
 		</div>
 		</a>
 	</div>
 	
 </div>
 	
 </section>

	<?php

	$x=1;
	 foreach ($cuisines as  $value) {
	 //prx($value);

	 $x++; ?>

	
	<section class="American_food panel_5  <?php if($x % 2==0){echo "grey_bg";} ?> padding_40">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="title3">
						<?php echo $value['Cuisine']['name']; ?>
					</h3>
				</div>
				<div class="col-xs-12">

				<?php foreach ($value['Cuisine']['Item'] as  $value) { // prx($value); ?>
				<a href="<?php echo $this->webroot; ?>webs/item_detail/<?php  echo $value['Item']['id'];  ?>" >
					<div class="custom_col_3">
						<div class="img full">
							<img src="<?php echo $this->webroot ;?>uploads/menu-items/<?php echo $value['Item']['image'];  ?>" alt="" class="img-responsive" 
							style="max-width: 100%;
    						height: 191px;" >
						</div>
						<strong class="im_hading margin-top20 font-size20"><?php echo $value['Item']['name']; ?></strong>
					</div>
				</a>
				<?php } ?>
				
				</div>
			</div>
		</div>
	</section>
	<?php  }?>

	
	
	