<?php
  //prx($Restaurants ); ?>
   <section class="banenr panel_1">
	  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
 	  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo $this->webroot ;?>aasets_web/images/banner.png" alt="">
      <div class="carousel-caption">
        <h1>Restaurant</h1>
         <span><img src="<?php echo $this->webroot ;?>aasets_web/images/element.png"></span>
         
      </div>
    </div>
     
   
  </div>
  

	 </div>
 </section>
  <section class="panel_4">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <form class="home_form  full padding_40 grey_bg" action="<?php echo $this->webroot; ?>webs/restaurant"  method="post">
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
  
  <section class="partner">
   <div class="container">
   <div class="row">
    <?php foreach ($Restaurants as $Restaurant) { 
       //prx($Restaurant);
      ?>
   <a href="<?php echo $this->webroot ;?>restaurant-detail/<?php echo $Restaurant['Restaurant']['id']; ?>">
   <div class="partner_list full">
   <div class="col-xs-12 col-sm-4">
   <img src="<?php echo $this->webroot ;?>uploads/restaurants/<?php echo $Restaurant['Restaurant']['image']; ?>" alt="" >
   
   </div>
   
   <div class="col-xs-12 col-sm-4">
   <strong class="tile"><?php echo $Restaurant['Restaurant']['name']; ?></strong>
   <p class="deliv"><span>Min Delivery : $<?php 
    if(empty( $Restaurant['Restaurant']['name']['min_delivery']))
    {
      echo "10";
    } 
    else
    {
      echo $Restaurant['Restaurant']['name']['min_delivery'];
    }
        ?> </span>/<a href="#"> Open <?php echo $Restaurant['Timing'][0]['open'] ; ?>  TO  <?php echo $Restaurant['Timing'][0]['close'] ; ?></a></p>
        <br><br>
   <p class="deliv"><span> <?php echo $Restaurant['Restaurant']['address'] ; ?> </span></p>
   </div>
   </a>  
   
   <div class="col-sm-4 col-xs-12">
   <!-- <div class="st full"> -->
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
   <!-- </div> -->
   <div class="stq full">

    <a href="<?php echo $this->webroot; ?>webs/menu_listing/<?php echo $Restaurant['Restaurant']['id']; ?>" class="btn menu pull-right">Menu <i class="fa fa-angle-right" aria-hidden="true"></i></a>
  </div>
   
   </div>
   
   
   </div>
  
  <?php } ?>
   </div>
 </div>
 </section>
 
  


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
