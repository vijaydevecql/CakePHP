<?php 
if(count($this->request->data)){
    $data = $this->request->data;
}else{
    $data = [];
}
//prx($data);
?>
<section class="account">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="acnt_text">
							<h2>Edit address</h2>
						</div>
					</div>
					
				</div>
			</div>
		</section>
		<section>
				<div class="container">
					<div class="row">
						<div class="col-md-5">
							<div class="addrs_form">
							<p>Be sure to click "Deliver to this address" when you've finished.</p>
								<?php echo $this->Form->create('address');?>
									  <div class="form-group">
										<label>Full name: </label>
										<input class="form-control" name="data[Address][fullname]" type="text" 
                                        value="<?php echo (count($data) && !empty($data['Address']['fullname']))?ucfirst($data['Address']['fullname']) : ''; ?>" >
									  </div>
									  <div class="form-group">
										<label>Mobile number: </label>
										<input class="form-control" name="data[Address][phone]" type="number" value="<?php echo (count($data) && !empty($data['Address']['phone']))?$data['Address']['phone'] : ''; ?>">
									  </div>
									   
									   <div class="form-group">
											<label>Address:  </label>
											<input type="text" class="form-control" name="data[Address][address]" placeholder="Location..." id="autocomplete" onFocus="geolocate()" value="<?php echo (count($data) && !empty($data['Address']['address']))?ucfirst($data['Address']['address']) : ''; ?>" required>
	                       					 <input type="hidden" class="form-control" name="data[Address][latitude]"  id="latitude" value="<?php echo (count($data) && !empty($data['Address']['latitude']))?$data['Address']['latitude'] : ''; ?>">
	                        				<input type="hidden" class="form-control" name="data[Address][longitude]"  id="longitude" value="<?php echo (count($data) && !empty($data['Address']['longitude']))?$data['Address']['longitude'] : ''; ?>">
									  </div>
									  <div class="form-group">
											<label>Landmark:   </label>
											<input class="form-control" type="text" name="data[Address][Landmark]" value="<?php echo (count($data) && !empty($data['Address']['Landmark']))?ucfirst($data['Address']['Landmark']) : ''; ?>">
									  </div>
									  <div class="form-group">
											<label>Town/City:   </label>
											<input type="text" class="form-control" name="data[Address][city]" placeholder="city" id="locality"  value="<?php echo (count($data) && !empty($data['Address']['city']))?ucfirst($data['Address']['city']) : ''; ?>" required>
									  </div>
									  <div class="form-group">
											<label>State:  </label>
											<input type="text" class="form-control" name="data[Address][state]" placeholder="State" id="administrative_area_level_1" value="<?php echo (count($data) && !empty($data['Address']['state']))?ucfirst($data['Address']['state']) : ''; ?>" required>
									  </div>
									  <div class="form-group">
											<label>Pincode:  </label>
											<input type="number" class="form-control" name="data[Address][zip]" placeholder="Postal Code" id="postal_code"   value="<?php echo (count($data) && !empty($data['Address']['zip']))?$data['Address']['zip'] : ''; ?>"  required>
									  </div>
									  <button type="submit" class="btn btn-default submit">Update Address</button>
                                      <a href="<?php echo $this->webroot.'my_address'?>" class="btn btn-default">Back</a>
								<?php echo $this->Form->end(); ?>
							</div>
						</div>
					</div>
				</div>
		</section>
		<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo MAP_API_KEY; ?>&libraries=places&callback=initAutocomplete"
async defer></script>
<script>
                            // This example displays an address form, using the autocomplete feature
                            // of the Google Places API to help users fill in the information.

                            // This example requires the Places library. Include the libraries=places
                            // parameter when you first load the API. For example:
                            // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

                            var placeSearch, autocomplete;
                            var componentForm = {
                               // route: 'long_name',
                                locality: 'long_name',
                                administrative_area_level_1: 'short_name',
                                //country: 'long_name',
                                postal_code: 'short_name'
                            };
                            //console.log(componentForm);

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
                                
                                for (var component  in  componentForm) {
                                    document.getElementById(component).value = '';
                                    document.getElementById(component).disabled = false;
                                }

                                // Get each component of the address from the place details
                                // and fill the corresponding field on the form.
                                for (var i = 0; i < place.address_components.length; i++) {
                                    var addressType = place.address_components[i].types[0];
                                    //console.log(addressType);
                                    if (componentForm[addressType]) {
                                        var val = place.address_components[i][componentForm[addressType]];
                                        document.getElementById(addressType).value = val;
                                    }
                                }
                                $("#latitude").val(place.geometry.location.lat());
                                $("#longitude").val(place.geometry.location.lng());
                            }

                            // Bias the autocomplete object to the user's geographical location,
                            // as supplied by the browser's 'navigator.geolocation' object.
                            function geolocate() {
                                if (navigator.geolocation) {
                                    navigator.geolocation.getCurrentPosition(function (position) {
                                        lat = position.coords.latitude;
                                        lng = position.coords.longitude;
                                        var geolocation = {
                                            lat: position.coords.latitude,
                                            lng: position.coords.longitude
                                        };
                                        $("#latitude").val(lat);
                                        $("#longitude").val(lng);
                                        var circle = new google.maps.Circle({
                                            center: geolocation,
                                            radius: position.coords.accuracy
                                        });
                                        autocomplete.setBounds(circle.getBounds());
                                    });
                                }
                            }
</script>