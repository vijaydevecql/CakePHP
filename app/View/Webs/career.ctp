
   <section class="banenr panel_1">
	  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
 	  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo $this->webroot ;?>aasets_web/images/banner.png" alt="">
      <div class="carousel-caption">
        <h1>Current Openings</h1>
         <span><img src="<?php echo $this->webroot ;?>aasets_web/images/element.png"></span>
         
      </div>
    </div>
     
   
  </div>
  
   
	 </div>
 </section>
  
  
  <section class="location_content career">
    <div class="container">
    <form class="jobs">
    <strong class="title1 full">Jobs</strong>
    <!-- <div class="select_form full">
    <div class="col-sm-6 col-xs-12">
    <div class="form-group full">
    <input type="text" placeholder="Keywords" class="form-control">
    </div>
    </div>
    
   <!--   <div class="col-sm-6 col-xs-12">
    <div class="form-group full">
    <input type="text" placeholder="Location" class="form-control">
    </div>
    </div> -->
  <!--   </div> -- -->
    <div class="job_options full">
   <!--  <div class="form-group">
    <input type="radio" name="full_time" id="full_time"><label for="full_time">Full Time</label>
    <input type="radio" name="full_time" id="Part_Time"><label for="Part_Time">Part Time</label>
    </div> -->


    <div class="form-group">
    <div class="col-sm-6 col-xs-12">
   <!--  <div class="job_img">
    <img src="<?php //echo $this->webroot ;?>aasets_web/images/fav_img.png" alt="" />
    </div> -->
    <strong><b style="color: red;">Name</b></strong>
    </div>
    
    <div class="col-sm-3 col-xs-12">
    <div class="locatin_icons"><!-- <img src="<?php //echo $this->webroot ;?>aasets_web/images/location1.png" alt="" /> --></div>
    <strong><b style="color: red;">Requirement</b></strong>
    </div>
    <div class="col-sm-2 col-xs-12">

     <strong class="btn pull-right green"><b style="color: red;">Vacancy</b></strong>
     </div>
     <div class="col-sm-2 col-xs-12">

     <strong class="btn pull-right green"><b style="color: red;">Action</b></strong>
     </div>
     
    </div>
    <?php 

     foreach ($Career as $value) {
          
   //  prx($value);


     ?>
    <div class="form-group">
    <div class="col-sm-6 col-xs-12">
   <!--  <div class="job_img">
    <img src="<?php //echo $this->webroot ;?>aasets_web/images/fav_img.png" alt="" />
    </div> -->
    <strong><?php echo $value['Career']['title'];?></strong>
    </div>
    
    <div class="col-sm-4 col-xs-12">
    <div class="locatin_icons"><!-- <img src="<?php //echo $this->webroot ;?>aasets_web/images/location1.png" alt="" /> --></div>
    <strong><?php echo $value['Career']['requirement'];?></strong>
    </div>
    <div class="col-sm-2 col-xs-12">
     <strong class="btn pull-right green"><?php echo $value['Career']['vacancy'];?></strong> 
     
     </div>
    <div class="col-sm-2 col-xs-12">
        <a class="btn menu pull-right" href="<?php echo $this->webroot; ?>webs/apply/<?php echo $value['Career']['id']; ?>"> Apply  </a>
    </div>
     
    </div>
    <?php } ?>
     </form>
      
 </div>
  </section>
 
 
  
