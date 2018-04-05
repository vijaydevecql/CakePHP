<?php 
  // prx($contents);
foreach ($contents as $content) {

  switch (trim($content['Content']['slug'])) {
         case "contact-us-email":         
          $email=$content['Content']['content'];
         case "contact-us-number":         
          $number=$content['Content']['content'];
         case "contact-us-address":         
          $address=$content['Content']['content'];
         case "contact-us-top":         
          $top=$content['Content']['content'];
  }
}
?>
   <section class="banenr panel_1">
	  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
 	  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo $this->webroot ;?>aasets_web/images/banner.png" alt="">
      <div class="carousel-caption">
        <h1>Contact Us</h1>
        <span><img src="<?php echo $this->webroot ;?>aasets_web/images/element.png"></span>
      </div>
    </div>
     
   
  </div>
  
   
	 </div>
 </section>
  
  <section class="contact_panel margin-top20">
  <div class="container">
  <div class="row">
  <div class="col-sm-3 col-xs-12">
  <div class="pro_img">
  <img src="<?php echo $this->webroot ;?>aasets_web/images/man.png" alt="" />
  </div>
  </div>
  <div class="col-sm-9 col-xs-12">
  <p>
<?php echo $top; ?>
</p>
<p>
JOHN SMITH</p>
  </div>
  </div>
  </div>
  </section>
 
 <section class="OUR_LOCATION margin-top20">
 <div class="container">
 
 <div class="row">
 <div class="col-sm-12"><h1 class="contact_title full">OUR LOCATION</h1></div>
 <div class="col-xs-12 col-sm-4 text-center margin-bottom-30">
 <img src="<?php echo $this->webroot ;?>aasets_web/images/location_icon.png" width="140px" alt="" />
 <strong class="icons_hnd full"><?php echo $address; ?></strong>
 </div>
 <div class="col-xs-12 col-sm-4 text-center margin-bottom-30">
 <img src="<?php echo $this->webroot ;?>aasets_web/images/contact_icon.png" alt="" width="140px"  />
  <strong class="icons_hnd full"><?php echo $number; ?></strong>
 </div>
 <div class="col-xs-12 col-sm-4 text-center margin-bottom-30">
 <img src="<?php echo $this->webroot ;?>aasets_web/images/email_icons.png" alt="" width="140px"  />
  <strong class="icons_hnd full"><?php echo $email; ?></strong>
 </div>
 </div>
 </div>
 </section>
 
 <section class="TOUCH margin-top20">
 <div class="container">
 
 <div class="row">
 <div class="col-sm-12"><h1 class="contact_title full">GET IN TOUCH</h1></div>
 <form action="<?php echo $this->webroot; ?>contact" method="post" >
 <div class="form-group full ">
 <div class="col-sm-6 col-xs-12 margin-bottom-15">
 
 <input type="text" name="name" placeholder="Your Name" class="form-control" required />
 </div>
 
  <div class="col-sm-6 col-xs-12 margin-bottom-15">
 
 <input type="email" name="email" placeholder="Your Email" class="form-control" required/>
 </div>
  
 </div>
 
  <div class="form-group full ">
 <div class="col-sm-6 col-xs-12 margin-bottom-15">
 
 <input type="number" name="phone" placeholder="Your Phone Number" class="form-control" required/>
 </div>
 
  <div class="col-sm-6 col-xs-12 margin-bottom-15">
 
 <input type="text" name="subject" placeholder="Your Subject" class="form-control" required/>
 </div>
  
 </div>
 
  <div class="form-group full  margin-bottom-15">
  <div class="col-sm-12">
  <textarea placeholder="Your Question" class="form-control" name="message" ></textarea>
  </div>
  
  
  
  
 </div>
 <div class="form-group full  margin-bottom-15">
  <div class="col-sm-12">
  <button class="btn send">
  SEND MESSAGE
  </button>
  </div>
  
  </div>
 </div>
 </form>
 </section>
