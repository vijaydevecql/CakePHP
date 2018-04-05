
   <section class="banenr panel_1">
	  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
 	  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo $this->webroot ;?>aasets_web/images/banner.png" alt="">
      <div class="carousel-caption">
        <h1>FAQs</h1>
        <span><img src="<?php echo $this->webroot ;?>aasets_web/images/element.png"></span>
      </div>
    </div>
     
   
  </div>
  
   
	 </div>
 </section>
  <section class="faq_Panel">
 <div class="container">
 <div class="row">
 <div class=" col-lg-12 full ">
 <h2 class="you_have">
 You have questions, we have answers
 </h2>
 
 <div class="faq_inner grey_bg full">
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
   <?php foreach ($faqs as $faq) { ?>
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="headingTwo">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo<?php echo  $faq['Faq']['id'] ; ?>" aria-expanded="false" aria-controls="collapseTwo<?php echo  $faq['Faq']['id'] ; ?>">
         <?php echo $faq['Faq']['question'];  ?>
          
        </a>
      </h4>
    </div>
    <div id="collapseTwo<?php echo  $faq['Faq']['id'] ; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        <?php echo $faq['Faq']['answer'];  ?>
      </div>
    </div>
  </div>
  <?php } ?>

</div>
 </div>
 </div>
 </div>
 </div>
 </section>
