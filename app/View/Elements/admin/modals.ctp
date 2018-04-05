<?php

$controller = $this->params->params['controller'];
$action = $this->params->params['action'];

if (strtolower($controller) == 'quotes' && strtolower($action) == 'add') {
	?>
	

	<div class="modal fade" id="modal_map_from" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="false">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<h4 class="modal-title" id="largeModalHead">Pick site location</h4>
				</div>
				<div class="modal-body">
					<div class="col-md-6">
						<div class="page-subtitle page-subtitle-centralized">
							<h3>Site Select</h3>
							<p>Find Address / Aggregation point</p>
						</div>
						
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<script>


		//google.maps.event.addDomListener(window, 'load', google_map_search_from);
	</script>
	<script>
		$('#modal_map_from').on('shown.bs.modal', function(e) {
			//alert('Le bai');
			
		})
	</script>
	<?php

}
?>
