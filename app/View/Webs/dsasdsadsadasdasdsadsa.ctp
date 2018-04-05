<?php //prx($Restaurants) ;?>
<section class="banenr panel_1">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
      <div class="item active"> <img src="<?php echo $this->webroot ;?>aasets_web/images/banner.png" alt="">
        <div class="carousel-caption">
          <h1>Restaurants</h1>
          <span><img src="<?php echo $this->webroot ;?>aasets_web/images/element.png"></span> </div>
      </div>
    </div>
  </div>
</section>
<section class="panel_2">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-xs-12 margin-bottom-30">
      <div class="fea_img_in full">
      <img src="<?php echo $this->webroot ;?>aasets_web/images/fea_img.png" alt="" class="img-responsive custome_change">
      </div>
      
      </div>
      <div class="col-md-8 col-xs-12  ">
      <div class="col-sm-6 col-xs-12">
      <div class="fea_img_rite_in full">
      <h2 class="top_hnd">
      <img src="<?php echo $this->webroot ;?>aasets_web/images/glass.png" >
      <span>FRESH DISHES</span>
      </h2>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
      </div>
      </div>
      <div class="col-sm-6 col-xs-12">
      <div class="fea_img_rite_in full">
      <h2 class="top_hnd">
      <img src="<?php echo $this->webroot ;?>aasets_web/images/spooon.png" >
      <span>VARIOUS MENU</span>
      </h2>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
      </div>
      </div>
      
      <div class="col-sm-6 col-xs-12">
      <div class="fea_img_rite_in full">
      <h2 class="top_hnd">
     <img src="<?php echo $this->webroot ;?>aasets_web/images/well_service.png" style="height: 37px;">
      <span>WELL SERVICE</span>
      </h2>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
      </div>
      </div>
      
      <div class="col-sm-6 col-xs-12">
      <div class="fea_img_rite_in full">
      <h2 class="top_hnd">
      <img src="<?php echo $this->webroot ;?>aasets_web/images/fast-deli.png" >
      <span>FAST DELIVERY</span>
      </h2>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy</p>
      </div>
      </div>
      </div>
    </div>
  </div>
</section>
<section class="panel_3 DELIVERY_history">
  <div class="container">
  <div class="over_flow_auto">
    <?php foreach ($Restaurants as $Restaurant) { ?>
    <div class="row">
    
     <div class="col-sm-6 col-xs-12">
     <div class="fea_col_in full">
     <img src="<?php echo $this->webroot ;?>uploads/restaurants/<?php echo $Restaurant['Restaurant']['image'];  ?>" alt="" class="img-responsive custome_change">
     </div>
     
     </div>
    <div class="col-sm-6 col-xs-12 rit_c">
    <h3 class="hnd_4"><?php echo $Restaurant['Restaurant']['name']; ?></h3>
    <p><?php echo $Restaurant['Restaurant']['description']; ?></p>
    <br><br><br>
    <p><?php echo $Restaurant['Restaurant']['address']; ?></p>

    <span class="col-sm-7 col-xs-12"><img src="<?php echo $this->webroot ;?>aasets_web/images/star.png"></span>
    <span class="col-sm-5 col-xs-12"><img src="<?php echo $this->webroot ;?>aasets_web/images/fav4.png"></span>
    <strong><span class="col-sm-6">$2.75</span><a href="#"> Check Menu </a></strong>
    </div>
    
    </div>
    <?php } ?>
    
    
   
     
    
    </div>
  </div>
</section>
