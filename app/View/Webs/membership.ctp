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
      
       </div>
       </div>
       </div>
    </div>
      
       
   
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
<th>Action</th>

</tr>
</thead>

<tbody>
  <?php  foreach ($MembershipPackages as $MembershipPackage) {?>
<tr>
<td>

<strong><?php  echo $MembershipPackage['MembershipPackage']['title'] ?></strong>
<small>(<?php echo $MembershipPackage['MembershipPackage']['star'] ?>)</small>
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
<strong class="red_color">$<?php echo $MembershipPackage['MembershipPackage']['cost'] ?></strong>
<small>(<?php echo $MembershipPackage['MembershipPackage']['duration'] ?> months)</small>
</td>
<td>
<a href="<?php  echo $this->webroot;?>webs/subscribe/<?php echo $MembershipPackage['MembershipPackage']['cost'].'/'.$MembershipPackage['MembershipPackage']['id'];?>" class="btn btn-danger" >Subscribe</a>
</td>
</tr>
<?php  }?>



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