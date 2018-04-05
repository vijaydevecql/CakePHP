
<style>
.time_revw{
  color:#ddd;
}

.left_tab{
  float:left;
  width:18%
  
}
.left_tab img{
  width:80px;
  
}
.right_tab{
  float:left;
  width:70%
  
}.ingrediant_reviews ul li {
border-bottom: 1px solid #ccc;
margin-bottom: 12px;
}
.details_hnd.full {
    font-size: 25px;
    margin: 0 0 15px;
    text-transform: uppercase;
}
@import url(//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css);

fieldset, label { margin: 0; padding: 0; }
body{ margin: 20px; }
h1 { font-size: 1.5em; margin: 10px; }

/****** Style Star Rating Widget *****/

.rating {   
  border: none;
  float: left;
}

.rating > input { display: none; } 
.rating > label:before { 
  margin: 5px;
  font-size: 1.25em;
  font-family: FontAwesome;
  display: inline-block;
  content: "\f005";
}

.rating > .half:before { 
  content: "\f089";
  position: absolute;
}

.rating > label { 
  color: #ddd; 
 float: right; 
}

/***** CSS Magic to Highlight Stars on Hover *****/

.rating > input:checked ~ label, /* show gold star when clicked */
.rating:not(:checked) > label:hover, /* hover current star */
.rating:not(:checked) > label:hover ~ label { color: #FFD700;  } /* hover previous stars in list */

.rating > input:checked + label:hover, /* hover current star when changing rating */
.rating > input:checked ~ label:hover,
.rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.rating > input:checked ~ label:hover ~ label { color: #FFED85;  } 
  
</style>
   <section class="banenr panel_1">
	  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
 	  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo $this->webroot ;?>aasets_web/images/banner.png" alt="">
      <div class="carousel-caption">
        <h1>Restaurent Details</h1>
        <span><img src="<?php echo $this->webroot ;?>aasets_web/images/element.png"></span>
      </div>
    </div>
     
   
  </div>
  
   
	 </div>
 </section>
 <?php // prx($restaurant); ?>
 <section class="news_panel product_details">
 <div class="container">
 <div class="row">
  <div class="col-sm-5 col-xs-12">
  <div class="colIn full">
  
  <div class="product_img full">
  <img src="<?php echo $this->webroot ;?>uploads/restaurants/<?php echo $restaurant['Restaurant']['image']; ?>" alt="" class="custome_change" />
  </div>

 </div>
  </div>
  


  <div class="col-sm-7 col-xs-12">
  <strong class="details_hnd full"><?php echo $restaurant['Restaurant']['name']; ?></strong>
  <div class="stars full">
    <h3 class="col-md-6 text-left">
    <?php
          $starNumber=$restaurant['Restaurant']['rating'];
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
  </div>
  <strong class="details_price full" style="font-size: 14px;	"><?php echo $restaurant['Restaurant']['address']; ?></strong>
  <div class="details_content full">
  <p><?php echo $restaurant['Restaurant']['description']; ?></p>
  </div>
 
  
  </div>
  <div class="row" style="width:100%;float:left;padding:80px 0px">
  <div class="col-sm-6 col-xs-12">
  <div class="full ingrediant_reviews">
  <strong class="details_hnd full">Reviews</strong>
  <ul>
    <?php foreach ($restaurant['Review'] as  $value) { ?>
  <li style="float:left;width:100%;">
	<div class="left_tab" style="">
		<img src="<?php echo $this->webroot;  ?>aasets_web/images/Unknown_Person.png" />
	</div>
	<div class="right_tab">
		<h4> <?php echo $value['User']['first_name'].' '.$value['User']['last_name']; ?> </h4>
		<span class="time_revw"><?php echo date('d-M-Y h:i',$value['created']); ?></span>
		<p> <?php echo $value['review']; ?></p>
	</div>
  </li>
  <?php  } ?>
 

  
 
  </ul>
  </div>
  </div>

  <div class="col-sm-6 col-xs-12">
  <form action="<?php echo $this->webroot; ?>webs/r_detail" method="post">
  <input type="hidden" value="<?php echo $restaurant['Restaurant']['id']; ?>" name="restaurant_id"  >
  <div class="add_review">
      <h3 class="col-md-6 g_text">Rating : </h3>
          <fieldset class="rating col-md-6 text-left">

              <input type="radio" id="star5" name="rating" value="5" required />
              <label class = "full" for="star5" title="Awesome - 5 stars"></label>

              <input type="radio" id="star4half" name="rating" value="4.5" required />
              <label class="half" for="star4half" title="Pretty good - 4.5 stars"></label>

              <input type="radio" id="star4" name="rating" value="4" required />
              <label class = "full" for="star4" title="Pretty good - 4 stars"></label>

              <input type="radio" id="star3half" name="rating" value="3.5" required />
              <label class="half" for="star3half" title="Meh - 3.5 stars"></label>

              <input type="radio" id="star3" name="rating" value="3" required />
              <label class = "full" for="star3" title="Meh - 3 stars"></label>

              <input type="radio" id="star2half" name="rating" value="2.5" required />
              <label class="half" for="star2half" title="Kinda bad - 2.5 stars"></label>

              <input type="radio" id="star2" name="rating" value="2" required />
              <label class = "full" for="star2" title="Kinda bad - 2 stars"></label>

              <input type="radio" id="star1half" name="rating" value="1.5" required />
              <label class="half" for="star1half" title="Meh - 1.5 stars"></label>

              <input type="radio" id="star1" name="rating" value="1" required />
              <label class = "full" for="star1" title="Sucks big time - 1 star"></label>
              <input type="radio" id="starhalf" name="rating" value=".5" required />
              <label class="half" for="starhalf" title="Sucks big time - 0.5 stars"></label>
          </fieldset>
        </div>
  <div class="add_review">
	<strong class="details_hnd full">Add Reviews</strong>

		  <div class="form-group">
			<label for="exampleFormControlTextarea1">Leave Your Precious Review Here</label>
			<textarea class="form-control" name="review"  id="exampleFormControlTextarea1" rows="6"></textarea>
		  </div>
		  <button type="submit" class="btn btn-danger">Submit</button>
</form>
  </div>
  </div>
  </div>
  
 
  
 
 </div>
 </div>
 </section>
 

<script>
$(document).ready(function(){
    $(".options").click(function(){
        $(".top_hader.full > ul,.top_hader.full").toggleClass("opn");
    });
});
</script>
