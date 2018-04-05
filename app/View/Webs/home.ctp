<section class="banenr panel_1 landings">
	  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
 	  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo $this->webroot ;?>aasets_web/images/banner.png" alt="">
       <div class="banner_content full">
       <div class="container">
       <div class="row">
       <div class="col-md-8 col-xs-12">
       <h2 class="title2">Your favorite place doesn’t deliver? <br>Now….it’s ToGo!</h2>
       <p>Save <a href="">Time & Money</a> dining out by letting us bring your favorite local restaurants right to <a href="">you </a>!</p>
       <div class="app_btn full">
       <a href="#"><img src="<?php echo $this->webroot ;?>aasets_web/images/down.png" class="pull-left">Download App Nowimg <img src="<?php echo $this->webroot ;?>aasets_web/images/android.png" class="pull-right"></a>
       <a href="#"><img src="<?php echo $this->webroot ;?>aasets_web/images/down.png" class="pull-left">Download App Nowimg <img src="<?php echo $this->webroot ;?>aasets_web/images/ios.png" class="pull-right"></a>
        
       </div>
       </div>
 		<div class="col-md-4 col-xs-12">
       <form class="full sign" action="<?php echo $this->webroot; ?>webs/home" method="post" >
       <strong class="full">SIGN UP</strong>
       <div class="col-sm-6 col-xs-12">
       <div class="form-group">
       <input type="text" class="form-control" placeholder="First name" name="data[User][first_name]" pattern="[A-Za-z]{1,15}" required></div>
       </div>

   <div class="col-sm-6 col-xs-12"><div class="form-group"><input type="text" class="form-control" placeholder="Last name" name="data[User][last_name]" pattern="[A-Za-z]{1,15}"  ></div></div>

   <div class="col-sm-12 col-xs-12"><div class="form-group"><input type="email" class="form-control" placeholder="Email" name="data[User][email]" required ></div></div>


 <div class="col-sm-12 col-xs-12"><div class="form-group"><input type="number" class="form-control" placeholder="Zipcode" name="data[User][zipcode]" required></div></div>


 <div class="col-sm-12 col-xs-12"><div class="form-group"><input type="number" class="form-control" placeholder="Phone" name="data[User][phone]" required></div></div>


 <div class="col-sm-12 col-xs-12"><div class="form-group">
 <input type="password" class="form-control" id="pass" placeholder="Password" name="data[User][password]" required></div></div>


 <div class="col-sm-12 col-xs-12"><div class="form-group">
 <input type="password" class="form-control" id="confirm_pass" placeholder="Confirm Password" required></div></div>
 <strong class="full">Card Detail</strong>

  <div class="col-sm-12 col-xs-12">
    <div class="form-group"><input type="text" class="form-control" placeholder="Name on Card" name="data[User][card_name]" pattern="[A-Za-z]{1,15}"  >
    </div>
  </div>

  <div class="col-sm-12 col-xs-12">
    <div class="form-group"><input type="number" class="form-control" placeholder="Card Number" name="data[User][card_number]"   >
    </div>
  </div>

 

  <div class="col-sm-6 col-xs-12">
    <div class="form-group">
    <select class="form-control" name="data[User][expiry_month]" id="expiry-month" required>
                <option value="" >Month</option>
                <option value="01">Jan (01)</option>
                <option value="02">Feb (02)</option>
                <option value="03">Mar (03)</option>
                <option value="04">Apr (04)</option>
                <option value="05">May (05)</option>
                <option value="06">June (06)</option>
                <option value="07">July (07)</option>
                <option value="08">Aug (08)</option>
                <option value="09">Sep (09)</option>
                <option value="10">Oct (10)</option>
                <option value="11">Nov (11)</option>
                <option value="12">Dec (12)</option>
              </select>
    </div>
  </div>

   <div class="col-sm-6 col-xs-12">
    <div class="form-group">
       <select class="form-control" name="data[User][expiry_year]" required> 
                <?php 

                for ($i=date('Y'); $i <= date('Y')+30 ; $i++) { ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
               
       </select>
    </div>
  </div>

  
 <div class="col-sm-12 col-xs-12"><div class="form-group"><input type="submit" class="btn btn btn-danger" value="CREATE ACCOUNT"></div></div>

       
       </form>
       </div>      
       </div>
       </div>
       </div>
    </div>
      
       
   
  </div>
 	 </div>
 </section>
 <section class="panel_2">
 <div class="container">
 	<div class="col-sm-4 col-xs-12">
 		<div class="icon_bars">
 			<img src="<?php echo $this->webroot ;?>aasets_web/images/icon.png" alt="">
 			
 		</div>
 		<span>Pick a Restaurant</span>
 	</div>
 	<div class="col-sm-4 col-xs-12">
 		<div class="icon_bars">
 			<img src="<?php echo $this->webroot ;?>aasets_web/images/icon1.png" alt="">
 			
 		</div>
 		<span>Place Your Order</span>
 	</div>
 	<div class="col-sm-4 col-xs-12">
 		<div class="icon_bars">
 			<img src="<?php echo $this->webroot ;?>aasets_web/images/icon2.png" alt="">
 			
 		</div>
 		<span>We Deliver</span>
 	</div>
 </div>	
 	
 </section>
  
<section class="video">  
<div class="container">
<div class="row">
<div class="col-md-4 col-xs-12 col-md-offset-4">
<img src="<?php echo $this->webroot ;?>aasets_web/images/v1.png" alt="" width="100%"/>
</div>


</div>
</div>
</section>


<section class="food_type">
<div class="container">
<div class="row">
<div class="col-sm-4 col-xs-12">
<div class="full food_type1">
<div class="food_img"><img src="<?php echo $this->webroot ;?>aasets_web/images/fav_img.png" /></div>
<strong>loreum ipsum</strong>
</div>
</div>
<div class="col-sm-4 col-xs-12">
<div class="full food_type1">
<div class="food_img"><img src="<?php echo $this->webroot ;?>aasets_web/images/fav_img.png" /></div>
<strong>loreum ipsum</strong>
</div>
</div>
<div class="col-sm-4 col-xs-12">
<div class="full food_type1">
<div class="food_img"><img src="<?php echo $this->webroot ;?>aasets_web/images/fav_img.png" /></div>
<strong>loreum ipsum</strong>
</div>
</div>
</div>
</div>
</section>

<section class="delivery_price">
<div class="container">
<div class="row">
<div class="col-xs-12">
<strong class="deli_title full">DELIVERY PRICES</strong>
</div>
<div class="col-lg-6 col-xs-12">
<div class="table-responsive">
<table class="table" cellpadding="0" cellspacing="1" style="text-align:center">
<thead>
<tr>
<th>
MEMBERS
</th>
<th>
PRICE
</th>
</tr>

<tr>
<th colspan="2">
( All Deliveries from featured Restaurant’s are only $2.75 )
</th>
 
</tr>
</thead>

<tbody>
<?php foreach ($member_charges as  $value) {
	// prx($value);
 ?>
<tr>
<td>
<strong><?php echo $value['Delivery']['title']; ?></strong>
<small>(<?php echo $value['Delivery']['time_range']; ?> min)</small>
</td>

<td>
<strong class="red_color">
$<?php echo $value['Delivery']['cost']; ?>
</strong>
</td>

</tr>

<?php } ?>




</tbody>

</table>
</div>
</div>

<div class="col-lg-6 col-xs-12 rite_table">
<div class="table-responsive">
<table class="table" cellpadding="0" cellspacing="1" style="text-align:center">
<thead>
<tr>
<th>
GUESTS
</th>
<th>
PRICE
</th>
</tr>

<tr>
 
 
</tr>
</thead>

<tbody>
<?php foreach ($non_member_charges as  $value) {
	// prx($value);
 ?>
<tr>
<td>
<strong><?php echo $value['Delivery']['title']; ?></strong>
<small>(<?php echo $value['Delivery']['time_range']; ?> min)</small>
</td>

<td>
<strong class="red_color">
$<?php echo $value['Delivery']['cost']; ?>
</strong>
</td>

</tr>

<?php } ?>




</tbody>

</table>
</div>
</div>
</div>
</div>
</section>


<section class="MEMBERSHIP_PACKAGES">
<div class="container">
<div class="row">
<div class="col-xs-12">
<strong class="deli_title full">MEMBERSHIP PACKAGES</strong>
</div>
<div class="full MEMBERSHIP_">
 <div class="table-responsive">
<table>
<thead>
<tr>
<th>
MEMBERSHIP PACKAGES
</th>
<th>BENEFITS</th>
<th>PRICE</th>
</tr>
</thead>

<tbody>
<tr>
<td>
<strong><?php  echo $MembershipPackage[0]['MembershipPackage']['title'] ?></strong>
<small>(<?php echo $MembershipPackage[0]['MembershipPackage']['star'] ?>)</small>
</td>

<td>
<ul>
<li>
Every 50 deliveries you get a $20 rebate
    or a free delivery or a free meal.
</li>
<li>
Household Membership Access.
</li>
<li>
Discounts,Free Deliveries and free meal.
</li>
<li>
General Membership Benefits.
</li>
 
 
</ul>

</td>

<td>
<strong class="red_color">$<?php echo $MembershipPackage[0]['MembershipPackage']['cost'] ?></strong>
<small>(<?php echo $MembershipPackage[0]['MembershipPackage']['duration'] ?> months)</small>
</td>
</tr>




</tbody>
</table>
 </div>
 </div>
</div>
</div>
</section>

<section class="General_Members">
<div class="container">
<div class="row">
<div class="col-sm-12">
<strong>General Members</strong>
<ul class="genral_members1">
<li>Online accessibility for all types of restaurant deliveries through the ToGo app/website</li>
<li> Discount deliveries from featured Restaurants ( members only ).</li>
<li> Fast deliveries to save your time in your busy schedule.</li>
<li>Debit/credit card, bank account, or other digital currencies are accepted no hand to 
hand money transactions.</li>
<li>Scheduling an delivery with us ahead of time by phone/app/website to plan your day
ahead.</li>
<li>Group oders.</li>
<li>The ability of customer to set general preferences with thier deliveries such as extra
napkins, no tomatoes, allergic to peanuts, or tp always get a side of ranch with your
meals.</li>
<li>Meals transported in oven heated bags to ensure food is hot and ready to eat.</li>
<li>Double checking food to make sure order is correct.</li>

</ul>
</div>
</div>
</div>
</section>

<script type="text/javascript">
  
  $(document).ready(function(){
    $("#confirm_pass").blur(function(){
      var pass=$('#pass').val();
      var c_pass=$('#confirm_pass').val();
      if(pass != c_pass)
      {
        // event.preventdefault();
        alert('Password and Confirm Password not match');
      }
    })
        
});
</script>