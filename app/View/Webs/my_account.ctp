<?php 
//prx($data); 
?>
<section class="banenr panel_1 landings">
	  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
 	  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo $this->webroot ;?>aasets_web/images/banner.png" alt="">
       <div class="banner_content full">
       <div class="container">
       
 		<div class="col-md-6 col-xs-12" style="margin-left: 287px;">
       <form class="full sign" action="<?php echo $this->webroot; ?>webs/update_account" method="post" style="margin-bottom: 190px;" >
       <strong class="full">My Account</strong>
       <?php 

               foreach ($data as $value) {
               // prx($value);
      
       ?>
       <div class="col-sm-6 col-xs-12">
       <div class="form-group">

       <input type="text" class="form-control" placeholder="First name" name="data[User][first_name]" pattern="[A-Za-z]{1,15}" value="<?php echo  $value['first_name'];?>" required></div>
       </div>

   <div class="col-sm-6 col-xs-12"><div class="form-group"><input type="text" class="form-control" placeholder="Last name" name="data[User][last_name]" pattern="[A-Za-z]{1,15}" value="<?php echo  $value['last_name'];?>"  ></div></div>

   <div class="col-sm-12 col-xs-12"><div class="form-group"><input type="email" class="form-control" placeholder="Email" name="data[User][email]" value="<?php echo  $value['email'];?>" required ></div></div>


 <div class="col-sm-12 col-xs-12"><div class="form-group"><input type="number" class="form-control" placeholder="Zipcode" name="data[User][zipcode]" value="<?php echo  $value['zipcode'];?>" required></div></div>


 <div class="col-sm-12 col-xs-12"><div class="form-group"><input type="number" class="form-control" placeholder="Phone" name="data[User][phone]" value="<?php echo  $value['phone'];?>" required></div></div>


 <!-- <div class="col-sm-12 col-xs-12"><div class="form-group">
 <input type="password" class="form-control" id="pass" placeholder="Password" name="data[User][password]" value="//<?php //echo  $value['phone'];?>"required></div></div> -->


 <!-- <div class="col-sm-12 col-xs-12"><div class="form-group">
 <input type="password" class="form-control" id="confirm_pass" placeholder="Confirm Password" required></div></div> -->

  
 <div class="col-sm-12 col-xs-12"><div class="form-group"><input type="submit" class="btn btn btn-danger" value="UPDATE ACCOUNT"></div></div>

       <?php } ?>
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