<section class="account">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="acnt_text">
							<h2>Edit Password</h2>
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
							
								<?php echo $this->Form->create('user');?>
									  <div class="form-group">
										<label>Old Password : </label>
										<input class="form-control" name="data[User][password]" type="password">
									  </div>
									  <div class="form-group">
										<label>New Passowrd: </label>
										<input class="form-control" name="data[User][new_password]" type="password">
									  </div>
									   
									  <div class="form-group">
											<label>Confirm Password:   </label>
											<input class="form-control" type="password" name="data[User][confirm_password]">
									  </div>
									  
                                      <a href="<?php echo $this->webroot.'account'?>" class="btn btn-default">Back</a>
                                      <button type="submit" class="btn btn-default submit">Update Password</button>
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