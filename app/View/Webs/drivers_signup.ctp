
   <section class="banenr panel_1">
	  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
 	  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="<?php echo $this->webroot ;?>aasets_web/images/banner.png" alt="">
      <div class="carousel-caption">
        <h1>Become a ToGo Driver</h1>
         
      </div>
    </div>
     
   
  </div>
  
   
	 </div>
 </section>
  
   <section class="driver_panel grey_bg">
 <div class="container">
 <div class="row">
 <div class="col-sm-6 col-xs-12">
 <img src="<?php echo $this->webroot ;?>aasets_web/images/v.png" alt="" width="100%" />
 </div>
 <div class="col-xs-12 col-sm-5 col-sm-offset-1">
 <strong class="togo_driver full">
 ToGo Driver Hiring Video
 </strong>
 
 </div>
 </div>
 </div>
  
 </section>
 
 <section class="driver_form">
 <div class="container">
 <div class="row">
 <div class="col-md-6 col-md-offset-3 col-xs-12">
 <form class="form_driver full" action="<?php echo $this->webroot; ?>webs/drivers_signup" method="post"  enctype="multipart/form-data"  >
 <div class="form-group full margin-bottom-30">
 <div class="col-sm-6 col-xs-12">
 <input type="radio" name="is_car" id="cars" value="1" required/><label for="cars">I have a car</label>
 </div>
 <div class="col-sm-6 col-xs-12">
 <input type="radio" name="is_car" id="cars1" value="0" required /><label for="cars1">I need a car</label>
 </div>
 </div>
 
 <div class="form-group full">
 <input type="email" placeholder="mrcomhead@gmail.com" name="email" class="form-control" required />
 
 </div>
  <div class="form-group full">
  <div class="col-md-6 margin0">
  <div class="row">
 <input type="text" placeholder="First Name" name="first_name" class="form-control"  required/>
 </div>
 </div>
  <div class="col-md-6 margin0">
  <div class="row">
 <input type="text" placeholder="Last Name" name="last_name" class="form-control" required />
 </div>
 </div>
 </div>
 
 <div class="form-group full">
 <input type="number" placeholder="Phone" name="contact_no" class="form-control" required/>
 
 </div>
 
  <div class="form-group full dates margin-bottom-30">
  <label class="">Date of birth</label>
  <input 
          type="text" 
          class="form-control" 
          id="datepicker"
        
          name="birthday" 
          required />
 
 </div>
  <div class="form-group">
  <input type="file"  name="data[image]" class="form-control" required  readonly />
  </div>
  <div class="form-group">
     <input type="text" name="address" id="pac-input" tabindex="1" class="form-control" placeholder="Enter Your location" value="" type="text" required>
    <input type="hidden" class="form-control" name="latitude" placeholder="Location..." id="pac-lat">
    <input type="hidden" class="form-control" name="longitude" placeholder="Location..." id="pac-lang">
  </div>
  <div class="form-group full">
 <input type="password" placeholder="Password" name="password" class="form-control" required/>
 
 </div>


 

 <div class="form-group full margin-top20">
 <div class="col-sm-6 col-xs-12">
 <input type="radio" name="full_time" id="time" value="1" required><label for="time">full time</label>
 </div>
 <div class="col-sm-6 col-xs-12">
 <input type="radio" name="full_time" id="time1" value="0" required ><label for="time1">Part time</label>
 </div>
 </div>
 <div>
   <input type="submit" name="" value="Submit" >
 </div>
 </form>
 </div>
 </div>
 </div>
 </section>
 
 
 <section class="requirment">
  <div class="container">
  <strong>REQUIREMENTS</strong>
  <div class="requirment_content full">
	<ul class="top_ctnt">
    <li>
     A valid drivers license.
    </li>
     <li>
      A vehicle that's in good working condition.
    </li>
     <li>
     A active smartphone.
    </li>
     <li>
     Great customer service skills.
    </li>
     <li>
     Have great time management skills.
    </li>
    </ul>
    
  </div>
  <p>As a company our main focus is to provide the fastest delivery possible, with the highest quality of customer service to our customers. To do that we understand that we have to attract and retain quality Drivers. That's why we've come up with a simple compensation plan that benefits the fastest ToGo drivers, with the greatest customer service skills, the most. In other words, the more deliveries you make per hour, the the more money you make per hour! And just so you know, we have no problem paying hard workers what their worth: part time or full time!</p>
  
  <div class="requirment_content full">
	<ul class="btm_ctnt">
    <li>
     A valid drivers license.
    </li>
     <li>
      A vehicle that's in good working condition.
    </li>
     <li>
     A active smartphone.
    </li>
     <li>
     Great customer service skills.
    </li>
     <li>
     Have great time management skills.
    </li>
    </ul>
    
  </div>
  </div>
  </section>
<script type="text/javascript">
$(document).ready( function () {
      var nowDate = new Date();
      var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
      $( "#datepicker" ).datepicker({  endDate: today });
});      
      

      function initAutocomplete() {
     
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('pac-input')),
            {types: ['geocode']});

        
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {

        var place = autocomplete.getPlace();
        $("#pac-lat").val(place.geometry.location.lat());
        $("#pac-lang").val(place.geometry.location.lng());
       
     
      }

      



</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtYMExtdWonZI-S9IIW9nyHUd-mZqKL4g&libraries=places&callback=initAutocomplete" async defer></script>
