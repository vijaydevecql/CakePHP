<section class="account">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="acnt_text">
							<h2>Select a delivery address  </h2>
						</div>
					</div>
					<div class="col-md-6">
						<div class="acnt_text">
							<h2>Add a new address  </h2>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<?php  //if(count($address_data)){ ?>
		 <section class="text_box_adr">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="acnt_text">
							<p>Is the address you'd like to use displayed below? If so, click the corresponding "Deliver to this <br>address" button. Or you can enter a new delivery address.   </p>						
						</div>
						<?php foreach ($address_data as $key => $value) { ?>
								<div class="col-md-10 col-md-offset-1">
									<div class="adrs_btns">
										<h3><?php echo ucfirst($value['Address']['fullname']); ?></h3>
										<p><?php echo ucfirst($value['Address']['address']); ?><br> <?php echo ucfirst($value['Address']['city']); ?>, <?php echo ucfirst($value['Address']['state']); ?>  <?php echo ucfirst($value['Address']['zip']); ?> </p>
										<a href="<?php echo $this->webroot.'payment/'.$value['Address']['id'];  ?>">Delivery to this address</a>
										<div class="edit_btns">
										<!-- <button  class="btn_e"> Edit</button>
										<button class="btn_d"> Delete</button> -->
										</div>
									</div>
								</div>	
						<?php } ?>
						
					</div>
					<!-- Add new address column start -->
						<div class="col-md-5">
							<div class="addrs_form">
							<p>Be sure to click "Deliver to this address" when you've finished.</p>
								<?php echo $this->Form->create('address');?>
									  <div class="form-group">
										<label>Full name: </label>
										<input class="form-control" name="data[Address][fullname]" type="text" required>
									  </div>
									  <div class="form-group">
										<label>Mobile number: </label>
										<input class="form-control" name="data[Address][phone]" type="number" required>
									  </div>
									   
									   <div class="form-group">
											<label>Address:  </label>
											<input type="text" class="form-control" name="data[Address][address]" placeholder="Location..." id="autocomplete" onFocus="geolocate()" required>
	                       					 <input type="hidden" class="form-control" name="data[Address][latitude]"  id="latitude">
	                        				<input type="hidden" class="form-control" name="data[Address][longitude]"  id="longitude">
									  </div>
									  <div class="form-group">
											<label>Landmark:   </label>
											<input class="form-control" type="text" name="data[Address][Landmark]" required>
									  </div>
									  <div class="form-group">
											<label>Town/City:   </label>
											<input type="text" class="form-control" name="data[Address][city]" placeholder="city" id="locality" disabled="true" required>
									  </div>
									  <div class="form-group">
											<label>State:  </label>
											<input type="text" class="form-control" name="data[Address][state]" placeholder="State" id="administrative_area_level_1" disabled="true" required>
									  </div>
									  <div class="form-group">
											<label>Pincode:  </label>
											<input type="text" class="form-control" name="data[Address][zip]" placeholder="Postal Code" id="postal_code" disabled="true" required>
									  </div>
									  <button type="submit" class="btn btn-default submit">Delivery to this address</button>
								<?php echo $this->Form->end(); ?>
							</div>
						</div>

				</div>
				
			</div>
		</section>
		<?php //} ?>
		<!-- <section class="account">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="acnt_text">
							<h2>Add a new address   </h2>
						</div>
					</div>
					
				</div>
			</div>
		</section> -->
		<!-- <section>
				<div class="container">
					<div class="row">
						<div class="col-md-5">
							<div class="addrs_form">
							<p>Be sure to click "Deliver to this address" when you've finished.</p>
								<?php //echo $this->Form->create('address');?>
									  <div class="form-group">
										<label>Full name: </label>
										<input class="form-control" name="data[Address][fullname]" type="text">
									  </div>
									  <div class="form-group">
										<label>Mobile number: </label>
										<input class="form-control" name="data[Address][phone]" type="number">
									  </div>
									   
									   <div class="form-group">
											<label>Address:  </label>
											<input type="text" class="form-control" name="data[Address][address]" placeholder="Location..." id="autocomplete" onFocus="geolocate()" required>
	                       					 <input type="hidden" class="form-control" name="data[Address][latitude]"  id="latitude">
	                        				<input type="hidden" class="form-control" name="data[Address][longitude]"  id="longitude">
									  </div>
									  <div class="form-group">
											<label>Landmark:   </label>
											<input class="form-control" type="text" name="data[Address][Landmark]">
									  </div>
									  <div class="form-group">
											<label>Town/City:   </label>
											<input type="text" class="form-control" name="data[Address][city]" placeholder="city" id="locality" disabled="true" required>
									  </div>
									  <div class="form-group">
											<label>State:  </label>
											<input type="text" class="form-control" name="data[Address][state]" placeholder="State" id="administrative_area_level_1" disabled="true" required>
									  </div>
									  <div class="form-group">
											<label>Pincode:  </label>
											<input type="text" class="form-control" name="data[Address][zip]" placeholder="Postal Code" id="postal_code" disabled="true" required>
									  </div>
									  <button type="submit" class="btn btn-default submit">Delivery to this address</button>
								<?php echo $this->Form->end(); ?>
							</div>
						</div>
					</div>
				</div>
		</section> -->
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