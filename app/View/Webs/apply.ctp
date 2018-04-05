<?php 
// prx($this->params->params['pass'][0]);
?>
   <section class="banenr panel_1">
	  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
 	  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo $this->webroot ;?>aasets_web/images/banner.png" alt="">
      <div class="carousel-caption">
        <h1>Apply </h1>
        <span><img src="<?php echo $this->webroot ;?>aasets_web/images/element.png"></span>
      </div>
    </div>
     
   
  </div>
  
   
	 </div>
 </section>

 <section class="TOUCH margin-top20">
 <div class="container">
 
 <div class="row">
 <div class="col-sm-12"><h1 class="contact_title full"></h1></div>
 <form action="<?php echo $this->webroot; ?>webs/apply"  enctype="multipart/form-data"  method="post">
  <input type="hidden" name="career_id"  value="<?php echo $this->params->params['pass'][0]; ?>">
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
  <textarea placeholder="Your Message" class="form-control" name="message" ></textarea>
  </div>
  </div>
  <br>
  <div class="form-group  full">
   <div class="col-sm-6 col-xs-12 margin-bottom-15">
 
 <input type="file" name="data[file]"  class="form-control" required/>
 </div>
</div>
 <div class="form-group full  margin-bottom-15">
  <div class="col-sm-12">
  <button  type="submit" class="btn send">Submit </button>
  </div>
  
  </div>
 </div>
 </form>
 </section>
