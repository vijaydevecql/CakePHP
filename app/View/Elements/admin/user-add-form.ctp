<div class="row">
	<?php echo $this->Form->create('User', array('class' => 'form-horizontal','enctype' => 'multipart/form-data' )); ?>
	<div class="form-group">
		<label class="col-sm-3 control-label">First Name: </label>
		<div class="col-sm-9">
			<?php
			echo $this->Form->input(
					'first_name', array(
				'label' => false,
				'div' => false,
				//'required' => true,
				'class' => 'form-control',
				'placeholder' => 'First Name',
				'autocomplete' => 'off',
				 'pattern' => "[a-zA-Z\s]+"
					)
			);
			?>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-sm-3 control-label">Profile Photo: </label>
		<div class="col-sm-9">
			<div class="row">
				<div class="col-sm-3">
					<img src="<?php echo $this->webroot.'files/users/default_user.png'; ?>" id="display_image" style="width: 100px">
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<div class="input-group input-group-file">
							<input type="text" class="form-control" readonly="" id="display_name">
							<span class="input-group-btn">
								<span class="btn btn-success btn-file">
									<i class="icon wb-upload" aria-hidden="true"></i>
									<input type="file" name="profile_photo" id="profile_photo">
								</span>
							</span>
						</div>
					
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div class="form-group">
        <label class="col-sm-3 control-label">Location: </label>
        <div class="col-sm-9">
            <div class="input-search">
                <!-- <button type = "button" class="input-search-btn">
                  <i class="icon wb-search" aria-hidden="true"></i>
                </button> -->
                <input type="text" class="form-control" name="data[User][area]" placeholder="Location..." id="pac-input">
                <input type="hidden" class="form-control" name="data[User][latitude]" placeholder="Location..." id="pac-lat">
                <input type="hidden" class="form-control" name="data[User][longitude]" placeholder="Location..." id="pac-lang">
            </div>
        </div>
    </div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Mobile: </label>
		<div class="col-sm-9">
			<?php
			echo $this->Form->input(
					'mobile', array(
				'label' => false,
				'div' => false,
				'class' => 'form-control',
				'placeholder' => 'Mobile',
				'autocomplete' => 'off',
				'pattern' => "\d*",
				'required' => true,
					)
			);
			?>
		</div>
	</div>	
	<div class="form-group">
		<label class="col-sm-3 control-label">Email: </label>
		<div class="col-sm-9">
			<?php
			echo $this->Form->input(
					'email', array(
				'label' => false,
				'div' => false,
				'type' => 'email',
				'class' => 'form-control',
				'placeholder' => 'Email',
				'autocomplete' => 'off',
				'required' => true,
					)
			);
			?>
		</div>
	</div>	
	<div class="form-group">
		<label class="col-sm-3 control-label">Gender: </label>
		<div class="col-sm-9">
			<div class="radio-custom radio-default radio-inline">
				<input required="required" type="radio" id="gender" value="male" name="data[User][gender]" checked/>
				<label for="gender">Male</label>
			</div>
			<div class="radio-custom radio-default radio-inline">
				<input required="required" type="radio" id="gender" value="female" name="data[User][gender]" 
					   />
				<label for="gender">Female</label>
			</div>
		</div>
	</div>	

	
	<div class="form-group">
		<label class="col-sm-3 control-label">&nbsp;</label>
		<div class="col-sm-9">
			<i class="icon wb-eye" id="show_password_icon"></i>
			<i class="icon wb-eye-close" id="hide_password_icon" style="display: none;"></i>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-9 col-sm-offset-3">
			<button type="submit" class="btn btn-primary">Save </button>
			<a href="<?php echo $this->webroot; ?>admin/users/index"class="btn btn-default btn-outline">Back</a>
		</div>
	</div>
	<?php echo $this->Form->end(); ?>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo MAP_API_KEY; ?>&libraries=places&callback=initAutocomplete"
         async defer></script>
<script>
	$(document).ready( function () {
		$('#UserDob').datepicker({
			autoclose:true
		});
		$('#show_password_icon').on('click', function () {
			$('#UserPassword').attr('type', 'text');
			$(this).hide();
			$('#hide_password_icon').show();
		});
		$('#hide_password_icon').on('click', function () {
			$('#UserPassword').attr('type', 'password');
			$(this).hide();
			$('#show_password_icon').show();
		});
		$('body').on('change','#profile_photo',function(e){

         	$('#display_name').val(this.files && this.files.length ? this.files[0].name.split('.')[0] : '');
         	readURL(this);
    	});
	});
	function readURL(input) {
	    if (input.files && input.files[0]) {
	        	var reader = new FileReader();
				reader.onload = function (e) {
	            $('#display_image').attr('src', e.target.result);
	        }
			reader.readAsDataURL(input.files[0]);
	    }
   }
   function initAutocomplete() {
        /*var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13,
          mapTypeId: 'roadmap'
        });*/

        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);

        /*map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);*/

        // Bias the SearchBox results towards current map's viewport.
       /* map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });*/

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();
          //console.log(places);
          $("#pac-lat").val(places[0].geometry.location.lat());
          $("#pac-lang").val(places[0].geometry.location.lng());
          if (places.length == 0) {
            return;
          }

          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
           /* markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));*/

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          //map.fitBounds(bounds);
        });
      }
</script>