<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>

<?php echo $this->Form->create('Quote'); ?>
<?php
$_product_id = 0;
if (isset($edit) && $edit === true) {
	echo $this->Form->input('id');
	$_product_id = $this->request->data['Quote']['product_id'];
}
?>
<div class="page-subtitle">
	<h3>New Quote</h3>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<?php
			echo $this->Form->input(
					'title', array(
				'class' => 'form-control',
				'placeholder' => 'Quote Name',
				'label' => false,
				'div' => false,
					)
			);
			?>
		</div>
	</div>
</div>
<div class="alert alert-info alert-dismissible" role="alert">
	<strong>Quote Builder!</strong>
	<br />
	You can build your Quote by adding products to it.
</div>
<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<ul style="max-width: 100px;">
				<?php
				$product_id = 0;
				$first = true;
				if (isset($products) && count($products)) {
					foreach ($products as $k => $product) {
						if($first) {
							$product_id = $k;
							$first = false;
						}
						echo "<li style=\"cursor: pointer; clear:both;\" id=\"$k\" class=\"btn btn-primary product_names\">"
								. "<span class=\"product_name\">{$product}</span>"
								. "<label class=\"switch\">
                                            <input 
											type=\"radio\" 
											required=\"required\" 
											". ((!$_product_id) ? '' : ($_product_id != $k ? '' : 'checked="checked" ')).
											"name=\"data[Quote][product_id]\" 
											value=\"$k\"/>
                                            <span></span>
                                        </label>"
								. "</li>";
					}
				}
				?>
			</ul>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="form-group">
			<?php
			echo $this->Form->input(
					'notes', array(
				'class' => 'form-control',
				'placeholder' => 'Notes/Comments',
				'label' => '*Notes / Comments',
					)
			);
			?>
			<!--<textarea class="form-control" placeholder="placeholder"></textarea>-->
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<div class="row">
		</div>
	</div>
	<div class="col-md-12">
		<div class="row">

			<div class="col-md-12">
				<div class="col-md-3">
					<!--<button class="btn btn-primary" data-toggle="modal" data-target="#modal_map_from">Site Location (From)</button>-->
				</div>
				<br />
				<div class="page-subtitle page-subtitle-centralized">
					<h3>Find Address / Aggregation point</h3>
					<br />
					<br />
				</div>
				<div class="map-wrapper">
					<div class="form-group map-wrapper-field">
						<div class="col-md-6">
							<!-- <input type="text" id="target_from" class="form-control"/> -->
							<?php
							echo $this->Form->input('from-address', array(
								'div' => false,
								'label' => false,
								'required' => true,
								'class' => 'form-control',
								'id' => 'target_from',
								'type' => 'text',
							));
							echo $this->Form->input('from-lat', array(
								'div' => false,
								'label' => false,
								'required' => false,
								'class' => 'form-control',
								'id' => 'from-lat',
								'type' => 'hidden',
							));
							echo $this->Form->input('from-long', array(
								'div' => false,
								'label' => false,
								'required' => false,
								'class' => 'form-control',
								'id' => 'from-long',
								'type' => 'hidden',
							));
							?>
						</div>
					</div>
					<div id="google_search_map_from" style="width: 100%; height: 400px;"></div>
				</div>
			</div>

			<div class="col-md-12">

				<div class="col-md-3">
					<!--<button class="btn btn-primary" data-toggle="modal" data-target="#modal_map_to">Site Location (To)</button>-->
				</div>
				<br />
				<div class="page-subtitle page-subtitle-centralized">
					<h3>Site Select</h3>
					<br />
					<br />
				</div>
				<div class="map-wrapper">
					<div class="form-group map-wrapper-field">
						<div class="col-md-6">
							<!--<input type="text" id="target_to" class="form-control"/> -->
							<?php
							echo $this->Form->input('to-address', array(
								'div' => false,
								'label' => false,
								'required' => true,
								'class' => 'form-control',
								'id' => 'target_to',
								'type' => 'text',
							));
							echo $this->Form->input('to-lat', array(
								'div' => false,
								'label' => false,
								'required' => false,
								'class' => 'form-control',
								'id' => 'to-lat',
								'type' => 'hidden',
							));
							echo $this->Form->input('to-long', array(
								'div' => false,
								'label' => false,
								'required' => false,
								'class' => 'form-control',
								'id' => 'to-long',
								'type' => 'hidden',
							));
							?>
						</div>
					</div>
					<div id="google_search_map_to" style="width: 100%; height: 400px;"></div>
				</div>

			</div>
		</div>
	</div>
	<div class="col-md-12">
		<?php
		echo $this->Form->submit('submit', array('class' => 'btn btn-danger'));
		?>
	</div>
</div>
<?php echo $this->Form->end(); ?>

<script>
	function google_map_search_from() {

		var gSearch = new google.maps.Map(document.getElementById('google_search_map_from'), {
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});

		var defaultBounds = new google.maps.LatLngBounds(
				new google.maps.LatLng(-33.8902, 151.1759),
				new google.maps.LatLng(-33.8474, 151.2631));

		gSearch.fitBounds(defaultBounds);

		var input = /** @type {HTMLInputElement} */(document.getElementById('target_from'));

		var searchBox = new google.maps.places.SearchBox(input);
		var markers = [];

		google.maps.event.addListener(searchBox, 'places_changed', function() {
			var places = searchBox.getPlaces();

			for (var i = 0, marker; marker = markers[i]; i++) {
				marker.setMap(null);
			}

			markers = [];
			var bounds = new google.maps.LatLngBounds();
			for (var i = 0, place; place = places[i]; i++) {
				var image = {
					url: place.icon,
					size: new google.maps.Size(71, 71),
					origin: new google.maps.Point(0, 0),
					anchor: new google.maps.Point(17, 34),
					scaledSize: new google.maps.Size(25, 25)
				};

				var marker = new google.maps.Marker({
					map: gSearch,
					icon: image,
					title: place.name,
					position: place.geometry.location
				});

				markers.push(marker);

				bounds.extend(place.geometry.location);
				$('#from-lat').val(place.geometry.location.lat());
				$('#from-long').val(place.geometry.location.lng());
			}

			gSearch.fitBounds(bounds);
		});

		google.maps.event.addListener(gSearch, 'bounds_changed', function() {
			var bounds = gSearch.getBounds();
			searchBox.setBounds(bounds);
		});
	}
	google.maps.event.addDomListener(window, 'load', google_map_search_from);

	function google_map_search_to() {

		var gSearch_to = new google.maps.Map(document.getElementById('google_search_map_to'), {
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});

		var defaultBounds_to = new google.maps.LatLngBounds(
				new google.maps.LatLng(-33.8902, 151.1759),
				new google.maps.LatLng(-33.8474, 151.2631));

		gSearch_to.fitBounds(defaultBounds_to);

		var input_to = /** @type {HTMLInputElement} */(document.getElementById('target_to'));

		var searchBox_to = new google.maps.places.SearchBox(input_to);
		var markers_to = [];

		google.maps.event.addListener(searchBox_to, 'places_changed', function() {
			var places_to = searchBox_to.getPlaces();

			for (var i = 0, marker_to; marker_to = markers_to[i]; i++) {
				marker_to.setMap(null);
			}

			markers_to = [];
			var bounds_to = new google.maps.LatLngBounds();
			for (var i = 0, place; place = places_to[i]; i++) {
				var image = {
					url: place.icon,
					size: new google.maps.Size(71, 71),
					origin: new google.maps.Point(0, 0),
					anchor: new google.maps.Point(17, 34),
					scaledSize: new google.maps.Size(25, 25)
				};

				var marker_to = new google.maps.Marker({
					map: gSearch_to,
					icon: image,
					title: place.name,
					position: place.geometry.location
				});

				markers_to.push(marker_to);

				bounds_to.extend(place.geometry.location);
				$('#to-lat').val(place.geometry.location.lat());
				$('#to-long').val(place.geometry.location.lng());
			}

			gSearch_to.fitBounds(bounds_to);
		});

		google.maps.event.addListener(gSearch_to, 'bounds_to_changed', function() {
			var bounds_to = gSearch_to.getBounds();
			searchBox_to.setBounds(bounds_to);
		});
	}

	google.maps.event.addDomListener(window, 'load', google_map_search_to);

</script>
