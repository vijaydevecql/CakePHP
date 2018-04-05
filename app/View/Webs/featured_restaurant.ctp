<?php //prx($Restaurants) ;?>
<section class="banenr panel_1">
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
      <div class="item active"> <img src="<?php echo $this->webroot ;?>aasets_web/images/banner.png" alt="">
        <div class="carousel-caption">
          <h1>Featured Restaurants</h1>
          <span><img src="<?php echo $this->webroot ;?>aasets_web/images/element.png"></span> </div>
      </div>
    </div>
  </div>
</section>
<section class="panel_4">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <form class="home_form  full padding_40 grey_bg" action="<?php echo $this->webroot; ?>webs/featured_restaurant"  method="post">
            <div class="col-sm-4 col-xs-12">
              <div class="row">
                <div class="col-sm-5 col-xs-12 text-right">
                  <strong class="Country full">Country</strong>
                </div>
                <div class="col-sm-7 col-xs-12 text-left">
                  
                  <select onchange="selectCity(this.options[this.selectedIndex].value)" class="full form-control" name="country"  >
                     <option value="-1">Select country</option>
                     <?php
                       foreach ($countrys as  $value) {
                     ?>
                       <option value="<?php echo $value['Restaurant']['country']?>">
                              <?php echo $value['Restaurant']['country'];?>
                       </option>
                     <?php
                     }
                     ?>
                  </select>
                </div>
              </div>
            </div>
              <div class="col-sm-4 col-xs-12">
              <div class="row">
                <div class="col-sm-5 col-xs-12 text-right">
                  <strong class="Country full">State</strong>
                </div>
                <div class="col-sm-7 col-xs-12 text-left">
                 
                  <select id="state_dropdown" name="state"
                       onchange="selectState(this.options[this.selectedIndex].value)" class="full form-control">
                  <option value="-1">Select state</option>
                  </select>
                  <span id="state_loader"></span>

                 
                  <span id="city_loader"></span>
                </div>
              </div>
            </div>
              <div class="col-sm-4 col-xs-12">
              <div class="row">
                <div class="col-sm-5 col-xs-12 text-right">
                  <strong class="Country full">City</strong>
                </div>
                <div class="col-sm-7 col-xs-12 text-left">
                
                  <select id="city_dropdown" name="city" class="full form-control">
                  <option value="-1">Select city</option>
                  </select>
                </div>
              </div>
            </div>
            
            <div class="col-sm-12">
              <div class=" pull-right margin-top20">
              <button type="submit"  class="btn btn-danger pull-right ">Set Filter</button>
              <!-- <a href="#" class="btn btn-danger pull-right " >Set Filter</a> -->
                <button  type="reset" class="btn btn-danger pull-right margin-right-20">Clear Filter</button>
                
              </div>
            </div>
             
          </form>
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
    <?php $_user_data=$this->Session->read('User');
    $whislist=[];
     ?>

    <?php foreach ($Restaurants as $Restaurant) { 
      // prx($Restaurant);
      ?>
    <div class="row">
    
     <div class="col-sm-6 col-xs-12">
     <div class="fea_col_in full">

      <a href="<?php echo $this->webroot ;?>restaurant-detail/<?php echo $Restaurant['Restaurant']['id']; ?>">
     <img src="<?php echo $this->webroot ;?>uploads/restaurants/<?php echo $Restaurant['Restaurant']['image'];  ?>" alt="" class="img-responsive custome_change">
      </a>  
     </div>
     
     </div>
    <div class="col-sm-6 col-xs-12 rit_c">
      <a href="<?php echo $this->webroot ;?>restaurant-detail/<?php echo $Restaurant['Restaurant']['id']; ?>">
    <h3 class="hnd_4"><?php echo $Restaurant['Restaurant']['name']; ?></h3>
      </a>  

    <p><?php echo $Restaurant['Restaurant']['description']; ?></p>
    <br><br><br>
    <p><?php echo $Restaurant['Restaurant']['address']; ?></p>
    <!-- <img src="<?php echo $this->webroot ;?>aasets_web/images/fav4.png"> -->
    <span class="col-sm-7 col-xs-12">
           <h3 class="col-md-6 text-left">
    <?php
          $starNumber=$Restaurant['Restaurant']['rating'];
          for($x=1;$x<=$starNumber;$x++) { ?>
              <img src="<?php echo $this->webroot;  ?>aasets_web/images/star-on.png" />
         <?php }
          if (strpos($starNumber,'.')) {?>
              <img src="<?php echo $this->webroot;  ?>aasets_web/images/star-half.png" />
              
           <?php 
            $x++;}
          while ($x<=5) {?>
              <img src="<?php echo $this->webroot;  ?>aasets_web/images/star-off.png" />
              
           <?php 
          $x++;
          }
    ?>
  </h3>
    </span>
    <span class="col-sm-5 col-xs-12">

      <a href="javascript:void(0);" class="bt2 heart_with_login" rel="<?php echo $Restaurant['Restaurant']['id'] ?>" data-type="event" data-fav = "<?php echo (in_array($_user_data['User']['id'],$whislist))? 1 : 0 ?>">
   
        <span ><i id="heart" class="heart <?php if (empty($Restaurant['Favourite']) || @$Restaurant['Favourite'][0]['status']==0 ){  echo 'fa fa-heart-o' ;}else{echo 'fa fa-heart';} ?> " style="font-size:48px;color:red"></i></span>
   
    </a>
  </span>
    <strong><span class="col-sm-6">$<?php echo $Restaurant['Restaurant']['min_delivery']; ?></span><a href="<?php echo $this->webroot; ?>webs/menu_listing/<?php echo $Restaurant['Restaurant']['id']; ?>"> Check Menu </a></strong>
    </div>
    
    </div>
    <?php } ?>
    
    
   
     
    
    </div>
  </div>
</section>
<script type="text/javascript">
  // $('#fill').hide();
        $(".heart_with_login").click(function () {

            // return false;
            var user_id = '<?php echo $_user_data["User"]["id"]; ?>';
            var _i = $(this).find('i');
           
            if (user_id != '') {
                _id = $(this).attr('rel');
                _fav = $(this).attr('data-fav');
                $.ajax({
                    url: "<?php echo $this->webroot . 'webs/update_favourite_status/' ?>",
                    type: 'post',
                    data: {'typeid': _id},
                    cache: false
                }).done(function (html) {
                    
                     if (html === 1 || html === '1' ) {
                      _i.addClass("fa-heart");
                      _i.removeClass("fa-heart-o");
                     } else {
                      _i.addClass("fa-heart-o");
                      _i.removeClass("fa-heart");
                     }
                });
            }

        });
</script>
<script type="text/javascript">

/*This function is called when state dropdown value change*/
function selectState(state_id){
  if(state_id!="-1"){
    loadData('city',state_id);
  }else{
    $("#city_dropdown").html("<option value='-1'>Select city</option>");
  }
}

/*This function is called when city dropdown value change*/
function selectCity(country_id){
 if(country_id!="-1"){
   loadData('state',country_id);
   $("#city_dropdown").html("<option value='-1'>Select city</option>");
 }else{
  $("#state_dropdown").html("<option value='-1'>Select state</option>");
   $("#city_dropdown").html("<option value='-1'>Select city</option>");
 }
}

/*This is the main content load function, and it will
     called whenever any valid dropdown value changed.*/
function loadData(loadType,loadId){
  var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
  $("#"+loadType+"_loader").show();
  $("#"+loadType+"_loader").fadeIn(400).
        html('Please wait... ');
  $.ajax({
     type: "POST",
     url: "<?php echo $this->webroot; ?>webs/data_get",
     data: dataString,
     cache: false,
     success: function(result){
       $("#"+loadType+"_loader").hide();
       $("#"+loadType+"_dropdown").
       html("<option value='-1'>Select "+loadType+"</option>");
       $("#"+loadType+"_dropdown").append(result);
     }
   });
}
</script>