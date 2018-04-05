<?php 
foreach ($contents as $content) {
	switch (trim($content['Content']['slug'])) {
	    case "rights":
	    	$title=$content['Content']['title'];
	       $content=$content['Content']['content'];
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
  
  
	 <section class="terms margin-top20">
	 <div class="container">
	<div class="row">
	 <div class="col-sm-12">
     <h3 class="title3"><?php echo $title; ?></h3>
     <p> <?php echo $content; ?></p>


     </div>
     </div>
     </div>
	 </section>
	 
	 
	 
	
	