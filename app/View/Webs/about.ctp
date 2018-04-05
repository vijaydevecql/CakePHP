<?php
foreach ($contents as $content)
{
	switch (trim($content['Content']['slug']))
	{
	    case "about-us":
	    	$title=$content['Content']['title'];
	      $content = $content['Content']['content'];
	}
}
?>


 <section class="banenr panel_1">
	  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
 	  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo $this->webroot ;?>aasets_web/images/banner.png" alt="">
      <div class="carousel-caption">
        <h1><?php echo $title; ?></h1>
        <span><img src="<?php echo $this->webroot ;?>aasets_web/images/element.png"></span>
      </div>
    </div>


  </div>


	 </div>
 </section>
 <section class="panel_2">
 <div class="container">
 	<div class="col-sm-4 col-xs-12">
 		<div class="icon_bars img4">
 			 <img src="<?php echo $this->webroot ;?>aasets_web/images/img4.png" alt="" />

 		</div>

 	</div>
 	<div class="col-sm-4 col-xs-12">

 		<span class="fonder">THE   FOUNDERS</span>
 	</div>
 	<div class="col-sm-4 col-xs-12">

 		<span class="wills">William Davis II<br>
&<br>
Renee Davis</span>
 	</div>
 </div>

 </section>
 <section class="panel_3">
 <div class="container">
 	<div class="row">
 		<div class="col-sm-12">
			 <h1 class="our_jurny full">OUR  JOURNEY</h1>
 			 <img src="<?php echo $this->webroot ;?>aasets_web/images/main.png" width="100%" />
 		</div>
 	</div>

 </div>

 </section>
	<section class="panel_4 abouts">
		<div class="container">
			 <h1 class="our_jurny full"><?php echo $title; ?></h1>
			 <p>
<?php echo $content; ?></p>
		</div>
	</section>
