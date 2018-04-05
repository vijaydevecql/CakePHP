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
<div class="blog" style="margin-top: 50px;" >
                  <div class="">
                  <?php if(!empty($blog['Blog']['media'])){ ?>
                                        <img style="max-width:100%;" height="300px" src="<?php echo $this->webroot; ?>uploads/blogs/<?php echo $blog['Blog']['media'] ?>" alt="blog image">
                                    
                                    <?php } ?>
                                    </div>
                                    
                    <div class="date" style="float: left;
    border: 1px solid #cccccc;
    margin: 20px 0;
    width: 55px;
    text-align: center;
    color: #333;" >
                    <a href="#"><span class="fa fa-calendar calendar_icon"></span></a>
                    <h2><?php echo date('d',$blog['Blog']['created']) ?></h2>
                    <p><?php echo date('M',$blog['Blog']['created']) ?></p>                  
                    </div>
                    
                    
                  </div>
                  
                    <div class="blog_text">
                    <h2 class="r_text"><a   href="#" class="r_text"  ><?php echo $blog['Blog']['title'] ?></a></h2>
                    <p class="meta">
                                        <span><i class="fa fa-user"></i><?php echo $blog['Blog']['author_name'] ?></span>
                                        <span><i class="fa fa-user"></i><?php echo $blog['BlogCategory']['name'] ?></span>
                                        
                                    </p>
                                    <hr class="underline">
                                    <div class="clearfix"></div>
                    <p class="lead"><?php echo ($blog['Blog']['description']) ?></p>
                    
                   <!--  <button type="submit" class="btn btn-flat submit " data-loading-text="Please wait...">Read More</button> -->
                        <!-- <?php echo $this->Html->link(__('Read More'), array('action' => 'blog_detail',$blog['Blog']['id'])); ?>
 -->    
             
                   
                    
                    </div>
                    <div class="clearfix"></div>
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
 
