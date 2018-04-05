	<?php if(count($my_payment_options)){ ?>
		<section class="account">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="acnt_text">
							<h2>Payment method</h2>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="text_box_adr multi_Addrs">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<?php foreach ($my_payment_options as $key => $value) { ?>
				
							<div class="col-md-4"  id = "payment-<?php echo $value['PaymentOption']['id']; ?>">
								<div class="adrs_btns">
									<h3><?php echo ucfirst($value['PaymentOption']['card_name']) ?></h3>
                                    <p><?php echo substr_replace($value['PaymentOption']['card_number'], str_repeat("X", 8), 4, 8); ?></p>
                                    <p><?php echo ucfirst($value['PaymentOption']['expire_month']) ?>/<?php echo ucfirst($value['PaymentOption']['expire_year']) ?></p>
                                    <p></p>
									<p><?php echo ucfirst($value['PaymentOption']['type']) ?></p>
									<div class="edit_btns">
									<a  href="<?php echo $this->webroot.'edit_payment_option/'.$value['PaymentOption']['id']; ?>" class="btn_e">Edit</a>
									<button class="btn_d delete" data-id="<?php echo $value['PaymentOption']['id']; ?>" msg="Payment Option"> Delete</button>
									</div> 
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</section>
	<?php }?>
	<section class="account">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="acnt_text">
							<h2> Add a new Payment Option </h2>
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
							     <?php echo $this->Form->create('payment');?>
                                      <div class="form-group">
                                        <label>Name: </label>
                                        <input class="form-control" name="data[PaymentOption][card_name]">
                                      </div>
                                      <div class="form-group">
                                        <label>Credit Card/Debit card Number: </label>
                                        <input class="form-control" name="data[PaymentOption][card_number]" id="card_number" required>
                                      </div>
                                      <div class="form-group">
                                        <label>Expire Month: </label>
                                        <select name="data[PaymentOption][expiry_month]" required class="form-control payment_input date">
                                                    <option value="">Choose Expire Month</option>
                                                    <?php
                                                    for ($i = 1; $i <= 12; $i++) {
                                                        if ($i <= 9) {
                                                            $i = sprintf("%02d", $i);
                                                        }
                                                        ?>
                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?> 
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label>Card Type: </label>
                                        <select name="data[PaymentOption][type]" required class="form-control payment_input date" required>
                                            <option value="">Choose Card type</option>
                                            <option value="Visa">Visa</option>
                                            <option value="MasterCard">MasterCard</option>
                                            <option value="American Express">American Express</option>
                                        </select>
                                      </div>
                                      <div class="form-group">
                                        <label>Expire Year: </label>
                                           <select name="data[PaymentOption][expiry_year]" required class="form-control payment_input date">
                                                    <option value="">Choose Expire Year</option>
                                                    <?php for ($i = date('Y'); $i <= date('Y') + 20; $i++) { ?>
                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?> 
                                                </select>
                                      </div>
                                      
                                      
                                    <button type="submit" class="btn btn-default submit">Save</button>
                                <?php echo $this->Form->end(); ?>
							</div>
						</div>
					</div>
				</div>
		</section>
		
<script>
	$(document).ready(function(){
        	$('body').on('click', '.delete', function () {
            var id =  $(this).attr("data-id");
            $(".showSweetAlert").find('p').text("lead text-muted");
            var table = $(this).attr("msg");
            swal({
                title: "Are you sure?",
                text: "You want to delete this " + table + " !",
                type: "warning",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel !",

                closeOnConfirm: false,
                closeOnCancel: false,
                showLoaderOnConfirm: true,
            }, function (isConfirm) {
                        if (isConfirm) {
                            $.ajax({
                                url: "<?php echo $this->webroot . 'users/my_payment_option_delete/'; ?>"+id,
                                type: "POST",
                                dataType: "html",
                                success: function ()
                                {

                                    $("#payment-"+ id).remove();

                                    //table1.ajax.reload();
                                    //table.ajax.reload();
                                    swal("Done!", "It was succesfully deleted!", "success");
                                },
                                error: function (xhr, ajaxOptions, thrownError) {
                                    swal("Error deleting!", "Please try again", "error");
                                }
                            });
                        } else
                        {
                            swal("Cancelled", table + " is safe :)", "error");
                        }
            });
        });



    });
   $("#card_number").mask("9999-9999-9999-9999");
</script>
