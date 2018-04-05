

  <?php $user= $this->Session->read('User'); ?>
  <section class="payments">
  <div class="container"
  <div class="row">
  <div class="col-sm-12">
  <h1 class="title1 full">PAYMENT INFORMATION</h1>
  <strong class="payment_hnd full">general info</strong>
  <div class="genral_i full">
  <form action="<?php echo $this->webroot; ?>webs/check_out" method="post" >

  <div class="row">
  <div class="col-sm-4 col-xs-12">
  <input type="text" class="form-control" placeholder="First Name" name="data[detail][first_name]" value="<?php echo $user['User']['first_name']; ?>" >
  
  </div>
    <div class="col-sm-4 col-xs-12">
  <input type="text" class="form-control" placeholder="Last Name" name="data[detail][last_name]" value="<?php echo $user['User']['last_name']; ?>">
  
  </div>
  
    <div class="col-sm-4 col-xs-12">
<input type="text" class="form-control" placeholder="Email" name="data[detail][email]" value="<?php echo $user['User']['email']; ?>">
  
  </div>
  </div>
  </div>
  <div class="billing full">
   
   <div class="row">
   <div class="col-sm-5 col-xs-12">
   <strong class="payment_hnd full">Shipping Address</strong>
   <div class="form-group">
    <input type="text" class="form-control" name="data[detail][address]" placeholder="Address" id="autocomplete"  >
    <!-- <textarea id="autocomplete" ></textarea> -->
    <input type="hidden" class="form-control" name="data[detail][latitude]" placeholder="Location..." id="pac-lat" value="" >
    <input type="hidden" class="form-control" name="data[detail][longitude]" placeholder="Location..." id="pac-lang" value="">
   </div>
   <!--  <div class="form-group"><input type="text" class="form-control" placeholder="Address 2">
   </div> -->
    <div class="form-group">
    <div class="row">
    <div class="col-sm-6 col-xs-12">
    
    <input type="text" class="form-control" name="data[detail][city]" placeholder="City" id='locality'>
    
    </div>

     <div class="col-sm-6 col-xs-12">
    
    <input type="text" class="form-control" placeholder="Zip Code" name="data[detail][zipcode]" id="postal_code">
    </div>

    <div class="col-sm-6 col-xs-12">
    
    <input type="text" class="form-control" placeholder="State" name="data[detail][state]" id="administrative_area_level_1">
    </div>
    <div class="col-sm-6 col-xs-12">
    
    <input type="text" class="form-control" placeholder="Country" name="data[detail][country]"  id="country">
    </div>
    </div>
   </div>
   </div>
   <input type="hidden" id="pay_t" name="data[detail][payment_method]">
   <!-- <div class="col-sm-5 col-xs-12 col-sm-offset-2">
  
   </div> -->
   </div>
  </div>

  <div class="add_payemnt_method full">
  <strong class="payment_hnd full">Payment Type</strong>
  <!-- <input type="button" class="btn btn_custom" value="1" name="data[detail][payment_method]"  > -->
  <button type="button" class="btn btn_custom" onclick="pay_method(1)" >
  Credit Card / Debit card
  </button>
  <button type="button" class="btn btn_custom margin_" onclick="pay_method(2)" >
  Pay Pal
  </button>
<!--   <button class="btn btn_custom">
  Bank Account
  </button> -->
  </div>
  
  <div class="save_payment full">
<!--   <button class="btn save_paymet">
  save payement method
  </button>
   <button class="btn save_paymet">
  Add Another Payment Method
  </button> -->
  <div class="col-sm-6 col-xs-12 Make">
  <input type="checkbox" class="checks" id="Make">
  <label for="Make">Make My Default Payment Method</label>
  
  </div>

  
  <div class="col-sm-6 col-xs-12 Make">
  <button type="submit" class="btn save_paymet">
    Proceed
  </button>
    </form>
 <!-- <a href="#">Debit Card / Credit Card / Pay Pal / Bank Account</a> -->
  
  </div>
  </div>
  
  </div>
  </div>
  </div>
  </section>
 
<script type="text/javascript">
 var placeSearch, autocomplete;

      var componentForm = {
        // street_number: 'short_name',
        // route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'long_name',
        country: 'long_name',
        postal_code: 'short_name'
      };
      function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
      }

      function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();
        console.log(place);
        for (var component in componentForm) {
          document.getElementById(component).value = '';
          document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
          var addressType = place.address_components[i].types[0];
          if (componentForm[addressType]) {
            var val = place.address_components[i][componentForm[addressType]];
            document.getElementById(addressType).value = val;
          }
        }
            $("#pac-lat").val(place.geometry.location.lat());
            $("#pac-lang").val(place.geometry.location.lng());

      }

      // Bias the autocomplete object to the user's geographical location,
      // as supplied by the browser's 'navigator.geolocation' object.
      function geolocate() {
        if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var geolocation = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

          

            var circle = new google.maps.Circle({
              center: geolocation,
              radius: position.coords.accuracy
            });
            autocomplete.setBounds(circle.getBounds());
          });
        }
      }
      function pay_method (type=0) {
        $('#pay_t').val(type);
      }

</script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDtYMExtdWonZI-S9IIW9nyHUd-mZqKL4g&libraries=places&callback=initAutocomplete"
        async defer></script>