
<section class="banenr panel_1">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
      <div class="item active"> <img src="<?php echo $this->webroot ;?>aasets_web/images/banner.png" alt="">
        <div class="carousel-caption">
          <h1>Favorites</h1>
          <span><img src="<?php echo $this->webroot ;?>aasets_web/images/element.png"></span> </div>
      </div>
    </div>
  </div>
</section>
<section class="panel_2">
  <div class="container">
    <div class="row">
      <?php foreach ($favs as  $value) {?>
      <!-- <a href="<?php echo $this->webroot; ?>restaurent-detail" > -->
      <a href="<?php echo $this->webroot ;?>restaurant-detail/<?php echo $value['Restaurant']['id']; ?>">
      <div class="col-sm-6 col-md-4 col-xs-12 margin-bottom-30">
        <div class="fav_img_in full">
          <div class="fav_img custom_size"> <img src="<?php echo $this->webroot ;?>uploads/restaurants/<?php echo $value['Restaurant']['image']; ?>" alt="" class="img-responsive " /> <span class="fav_img_content">MOST FREQUENTLY
            ORDERED MEAL</span> </div>
          <strong><?php echo $value['Restaurant']['name']; ?></strong> </div>
      </div>
    </a>
      <?php } ?>
      
    </div>
  </div>
</section>
<section class="panel_3 DELIVERY_history">
  <div class="container">
    <div class="row">
    <div class="col-sm-12"><h1 class="title1">DELIVERY HISTORY</h1>
    <div class="table-responsive">
    <table class="table">
    <thead>
    <tr>
    <th>Restaurant</th>
    <th>Meal</th>
    <th>Address</th>
    <th>Date & Time</th>
    <th>Total Cost</th>
    
    </tr>
    </thead>
    
    <tbody>
    <tr>
    <td>loreum ipsum</td>
    <td>pizza</td>
    <td>31,street road</td>
    <td>AUG 11th,2017 <br>5.00 pm</td>
    <td>$50</td>
    
    </tr>
    <tr>
    <td>loreum ipsum</td>
    <td>pizza</td>
    <td>31,street road</td>
    <td>AUG 11th,2017 <br>5.00 pm</td>
    <td>$50</td>
    
    </tr>
    <tr>
    <td>loreum ipsum</td>
    <td>pizza</td>
    <td>31,street road</td>
    <td>AUG 11th,2017 <br>5.00 pm</td>
    <td>$50</td>
    
    </tr>
    
    </tbody>
    
    </table>
    </div>
    
    </div>
    
    
    
    </div>
  </div>
</section>
