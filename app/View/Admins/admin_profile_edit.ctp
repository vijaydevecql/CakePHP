<div class="page-header">
    <h1 class="page-title">
        Edit Profile
    </h1>
    <br />
    <div class="row">
        <div class="col-sm-9">
			<div class="row">
				<?php echo $this->Form->create('Admin', array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data')); ?>
				<!-- <div class="form-group">
					<label class="col-sm-3 control-label">Select Area *: </label>
					<div class="col-sm-9"> -->
						<?php
						/*echo $this->Form->input(
								'area_id', array(
							'label' => false,
							'div' => false,
							'required' => true,
							'empty' => '(Select one)',
							'class' => 'form-control',
							'placeholder' => 'Name',
							'autocomplete' => 'off',
								)
						); */
						?>
				<!-- 	</div> 
				</div> -->
				<div class="form-group">
					<label class="col-sm-3 control-label">Name : </label>
					<div class="col-sm-9">
						<?php
						echo $this->Form->input(
								'name', array(
							'label' => false,
							'div' => false,
							'required' => true,
							'class' => 'form-control',
							'placeholder' => 'Name',
							'autocomplete' => 'off',
								)
						);
						?>
					</div>
				</div>
				<!-- <div class="form-group">
					<label class="col-sm-3 control-label">Email : </label>
					<div class="col-sm-9">
						<?php
						/*echo $this->Form->input(
								'email', array(
							'label' => false,
							'div' => false,
							'required' => true,
							'class' => 'form-control',
							'placeholder' => 'email',
							'autocomplete' => 'off',
								)
						);*/
						?>
					</div>
				</div> -->
				<!-- <div class="form-group">
		<label class="col-sm-3 control-label">Password : </label>
		<div class="col-sm-9">
			<?php
			/*echo $this->Form->input(
				'password', array(
				'label' => false,
				'div' => false,
				'type' => 'password',
				'class' => 'form-control adminpassword',
				'placeholder' => 'Password',
				'autocomplete' => 'off',
				//'required' => true,
					)
			);*/
			?>
		</div>
	</div>  -->
	<!-- <div class="form-group">
		<label class="col-sm-3 control-label">&nbsp;</label>
		<div class="col-sm-9">
			<i class="icon wb-eye" id="show_password_icon"></i>
			<i class="icon wb-eye-close" id="hide_password_icon" style="display: none;"></i>
		</div>
	</div>
 -->
              <?php foreach ($data as $datas) {
              	
              } ?>
  

				<div class="form-group">
					<label class="col-sm-3 control-label">Image : </label>
					<div class="col-sm-9">
						<div class="input-group input-group-file">
							<input type="text"  class="form-control showname" readonly="">
							<span class="input-group-btn">
								<span class="btn btn-success btn-file">
									<i class="icon wb-upload" aria-hidden="true"></i>
									<input type="file" accept="image/*" id="file_e" name="data[Admin][image]" >
								</span>
							</span>
						</div>
					</div>
					<div class="col-sm-offset-3 col-sm-9">
						<img id="img_show"
							style="width: 150px;"126


							src="<?php echo $this->webroot . 'files/users/' . $datas['Admin']['image']; ?>">
					</div>
				</div>


               <div class="form-group">
					<label class="col-sm-3 control-label">Description * : </label>
					<div class="col-sm-9">
						<?php
						echo $this->Form->input(
								'description', array(
							'label' => false,
							'div' => false,
							'required' => true,
							'class' => 'form-control',
							'placeholder' => 'description',
							'autocomplete' => 'off',
								)
						);
						?>
					</div>
				</div>


              <!--  <div class="form-group">
					<label class="col-sm-3 control-label">Address * : </label>
					<div class="col-sm-9">
						<?php
						/*echo $this->Form->input(
								'address', array(
							'label' => false,
							'div' => false,
							'required' => true,
							'class' => 'form-control',
							'placeholder' => 'address',
							'autocomplete' => 'off',
								)
						);*/
						?>
					</div>
				</div> -->






			
				<div class="form-group">
					<div class="col-sm-9 col-sm-offset-3">
						<button type="submit" class="btn btn-primary">Update </button>
						<button type="reset" class="btn btn-default btn-outline">Reset</button>
						<a href="<?php echo $this->webroot . 'admin/dashboard' ?>" class='btn btn-primary'>Back </a>
					</div>
				</div>
				<?php echo $this->Form->end(); ?>
			</div>
		</div>
    </div>
</div>
<!-- <script>
	$(document).ready( function () {

		$('#show_password_icon').on('click', function () {
			$('.adminpassword').attr('type', 'text');
			$(this).hide();
			$('.hide_password_icon').show();
		});
		$('#hide_password_icon').on('click', function () {
			$('.adminpassword').attr('type', 'password');
			$(this).hide();
			$('#show_password_icon').show();
		});

	});
</script> -->
<script type="text/javascript">
	// $("#show_img").hide();
    $("#file_e").on('change', function () 
    {
        $('.showname').val($('#file_e').val());
        var insurances_id = '#img_show'
        readURL(this,insurances_id);
    });
    function readURL(input,id,type = 0)
        {

            // $("#show_img").show();
            if (input.files && input.files[0])
            {
                var reader = new FileReader();

                reader.onload = function (e)
                {
                        if(type == 1)
                        {
                             $(id).attr('href', e.target.result);
                        }
                        else {
                            $('.show_img').val('');
                            $(id).attr('src', e.target.result);
                        }


                }

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>









