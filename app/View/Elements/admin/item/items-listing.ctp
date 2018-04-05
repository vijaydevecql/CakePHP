<div class="page-header">
    <h1 class="page-title">
		Orders
    </h1>
    <br />
</div>
<div class="panel">
    <div class="panel-body container-fluid">
        <div class="row row-lg">
            <div class="col-md-12 table-responsive">
                <!-- Example Basic -->
                <div class="example-wrap">
                    <div class="example">
                        <table class="table" id="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Product</th>
                                    <th>Buyer</th>
                                    <th>Delivery Status</th>
									<th>Status</th>
								</tr>
                            </thead>
                            <tbody>
								<?php
								
								if (isset($order_data) && count($order_data)) {
									foreach ($order_data as $req) {
										?>
										<tr>
											<td><?php echo $req['Order']['id']; ?></td>
											<td>
												<?php
                                                $image = 'default_product_photo.jpg';
                                                if(!empty($req['media']['image'])){
                                                     
                                                    $path = APP . 'webroot' . DS . 'files' . DS . 'item_other_photo'. DS . $req['media']['image'];
                                                    if(file_exists($path)){
                                                        $image = '100x100'.$req['media']['image'];
                                                    }
                                                }
                                            ?>
                                            <img src="<?php echo $this->webroot.'files/item_other_photo/'.$image;?>"  class="user_photo">
											</td>
											<td>
												<a href="<?php echo $this->webroot . 'admin/users/view/' . $req['User']['id'] ?>">
												<?php echo isset($req['User']['email'])?ucfirst($req['User']['email']):'--'; ?></a>
											</td>
											<td>
												<?php 
													if($req['Order']['delivery_status'] == 1){
														echo 'New';
													}elseif($req['Order']['delivery_status'] == 2){
														echo 'Dispatch';
													}elseif($req['Order']['delivery_status'] == 3){
														echo 'On The Way';
													}elseif($req['Order']['delivery_status'] == 4){
														echo 'Delivered';
													}else{
														echo '';
													}	
													
												 ?>
											</td>
											<td class="update_status">
												<?php
												echo $req['Order']['status'] == 1 ?
														$this->Html->link(
																'Active', '/orders/admin_update_status/' . $req['Order']['id'], array(
															'class' => 'label label-success',
															'rel' => $req['Order']['id']
																)
														) :
														$this->Html->link(
																'Inactive', '/orders/admin_update_status/' . $req['Order']['id'], array(
															'class' => 'label label-danger',
															'rel' => $req['Order']['id']
																)
														)
												;
												?>
											</td>
										</tr>
		<?php
	}
} else {
	?>
									<tr>
										<td colspan = "4" class="text-center">
											<span>No Record Found</span>
										</td>
									</tr>
<?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
	$(document).ready(function () {
		 table1 = $('#table').DataTable();
		$(document.body).on('click', '.update_status a', function (e) {
			e.preventDefault();
			_this = $(this);
			_id = _this.attr('rel');
			_this.addClass('disabled');
			$.ajax({
				url: "<?php echo $this->webroot . 'admin/borrowLends/update_status/' ?>" + _id,
				cache: false
			}).done(function (html) {
				if (html === '1') {
					_this.removeClass('label-danger');
					_this.addClass('label-success');
					_this.text('Active');
				}
				if (html === '2') {
					_this.removeClass('label-success');
					_this.addClass('label-danger');
					_this.text('Inactive');
				}
				_this.removeClass('disabled');
			});

		});
		// $('body').on('click', '.del', function () {
		//     var id = $(this).val();
		//     $(".showSweetAlert").find('p').text("lead text-muted");
		//     var table = $(this).attr("msg");
		//     swal({
		//         title: "Are you sure?",
		//         text: "You want to delete this Ads !",
		//         type: "warning",
		//         showCancelButton: true,
		//         confirmButtonClass: "btn-danger",
		//         confirmButtonText: "Yes, delete it!",
		//         cancelButtonText: "No, cancel !",

		//         closeOnConfirm: false,
		//         closeOnCancel: false,
		//         showLoaderOnConfirm: true,
		//     }, function (isConfirm) {
		//         if (isConfirm) {
		//             $.ajax({
		//                 url: "<?php echo $this->webroot . 'delete'; ?>",
		//                 type: "POST",
		//                 data: {
		//                     "id": id,
		//                     "table": table
		//                 },
		//                 dataType: "html",
		//                 success: function ()
		//                 {

		//                     $("#del_" + id).closest("tr").remove();

		//                     //table1.ajax.reload();
		//                     //table.ajax.reload();
		//                     swal("Done!", "It was succesfully deleted!", "success");
		//                 },
		//                 error: function (xhr, ajaxOptions, thrownError) {
		//                     swal("Error deleting!", "Please try again", "error");
		//                 }
		//             });
		//         } else
		//         {
		//             swal("Cancelled", table + " is safe :)", "error");
		//         }
		//     });
		// });
	});
</script>
<?php
//echo $this->Element('pagination');
