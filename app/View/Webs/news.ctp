<?php 
//prx($tags); ?>
   <section class="banenr panel_1">
	  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
 	  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo $this->webroot ;?>aasets_web/images/banner.png" alt="">
      <div class="carousel-caption">
        <h1>News</h1>
        <span><img src="<?php echo $this->webroot ;?>aasets_web/images/element.png"></span>
      </div>
    </div>
     
   
  </div>
  
   
	 </div>
 </section>
 <section class="news_panel">
 <div class="container">
 <div class="row">
 <div class="col-lg-9 col-md-8 col-xs-12 col-sm-7">
 <div class="row">
  <?php foreach ($blogs as $blog) { ?>
 <div class="col-lg-6 col-sm-12 margin-bottom-30">
 <div class="col-in full">
 <div class="news-img full">
 <img src="<?php echo $this->webroot ;?>uploads/blogs/<?php echo  $blog['Blog']['media'];  ?>"  class="img-responsive custome_change">
 </div>
 <div class="new_img_content full">
 <strong><?php echo date('d-m-y',$blog['Blog']['created']); ?> | <?php echo $blog['Blog']['author_name']; ?></strong>

<span><?php echo $blog['Blog']['title']; ?></span>

<p><?php  echo strip_tags(substr($blog['Blog']['description'],0,180));
   ?></p>
<a href="<?php echo $this->webroot; ?>webs/news_detail/<?php echo $blog['Blog']['id'] ; ?>" class="read_moer">Read More</a>
 </div>
 </div>
 </div>
 <?php } ?>

 
 </div>
 </div>
 
 <div class="col-lg-3 col-md-4 col-xs-12 col-sm-5">
 <!-- <div class="social full aside">
 <strong class="aside_hnd">Social Link</strong>
        <ul class="margin0">
          <li><a href="#"> <img src="<?php //echo $this->webroot ;?>aasets_web/images/y.png" alt=""> </a> </li>
          <li><a href="#"> <img src="<?php //echo $this->webroot ;?>aasets_web/images/b.png" alt=""> </a> </li>
          <li><a href="#"> <img src="<?php /////echo $this->webroot ;?>aasets_web/images/i.png" alt=""> </a> </li>
          <li><a href="#"> <img src="<?php //echo $this->webroot ;?>aasets_web/images/f.png" alt=""> </a> </li>
          <li><a href="#"> <img src="<?php //echo $this->webroot ;?>aasets_web/images/t.png" alt=""> </a> </li>
        </ul>
      </div> -->

      <div class="social full aside links">
 <strong class="aside_hnd">Most Categories</strong>
        <ul class="margin0">
 <?php foreach ($blogs as $blog) { ?>
          <li><a href="#"><?php echo $blog['BlogCategory']['name']; ?> </a> </li>
          <?php } ?>
           <!-- <li><a href="#">Lorem ipsum dolor </a> </li>
            <li><a href="#">Lorem ipsum dolor </a> </li>
             <li><a href="#">Lorem ipsum dolor </a> </li>
              <li><a href="#">Lorem ipsum dolor </a> </li> -->
           
        </ul>
      </div>
      <div class="social full aside Meals">
 <strong class="aside_hnd"> Blog Tag</strong>
        <ul class="margin0">
        <?php foreach ($tags as $value1) {
         //prx($value1);
        ?>
           <li><a href="#"><?php echo $value1['BlogTag']['name']; ?> </a> </li>

<?php } ?>


  <!--         <li><a href="#"><img src="<?php //echo $this->webroot ;?>aasets_web/images/fav_img5.png" alt="" class="custome_change"></a> </li>
          <li><a href="#"><img src="<?php //echo $this->webroot ;?>aasets_web/images/fav_img5.png" alt="" class="custome_change"></a> </li>
          
           <li><a href="#"><img src="<?php// echo $this->webroot ;?>aasets_web/images/fav_img5.png" alt="" class="custome_change"></a> </li>
          <li><a href="#"><img src="<?php /////echo $this->webroot ;?>aasets_web/images/fav_img5.png" alt="" class="custome_change"></a> </li>
          <li><a href="#"><img src="<?php// echo $this->webroot ;?>aasets_web/images/fav_img5.png" alt="" class="custome_change"></a> </li>
          
           <li><a href="#"><img src="<?php //echo $this->webroot ;?>aasets_web/images/fav_img5.png" alt="" class="custome_change"></a> </li>
          <li><a href="#"><img src="<?php //echo $this->webroot ;?>aasets_web/images/fav_img5.png" alt="" class="custome_change"></a> </li>
          <li><a href="#"><img src="<?php //echo $this->webroot ;?>aasets_web/images/fav_img5.png" alt="" class="custome_change"></a> </li> -->
           
           
        </ul>
      </div>
      
      <!-- <div class="social full aside links">
 <strong class="aside_hnd">Latest Tweets</strong>
        <ul class="margin0">
          <li><a href="#">Lorem ipsum dolor </a> </li>
           <li><a href="#">Lorem ipsum dolor </a> </li>
            <li><a href="#">Lorem ipsum dolor </a> </li>
             <li><a href="#">Lorem ipsum dolor </a> </li>
              <li><a href="#">Lorem ipsum dolor </a> </li>
           
        </ul>
      </div> -->
       
       
 </div>
 </div>
 </div>
 </section>
 
