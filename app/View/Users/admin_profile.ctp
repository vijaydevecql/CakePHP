
<div class="page-header">
	<h1 class="page-title">
		Edit Profile
	</h1>
	<br />
	<div class="row">
		<div class="col-sm-9">
	<div class="row">
	
	<form class="form-horizontal" action="<?php echo $this->webroot.'admin/users/profile'; ?>" method="post"  >
	<div class="form-group">
		<label class="col-sm-3 control-label">Name: </label>
		<div class="col-sm-9">
			
			<?php
			echo $this->Form->input(
					'name', array(
				'label' => false,
				'div' => false,
				'required' => true,
				'class' => 'form-control',
				'placeholder' => 'First Name',
				'autocomplete' => 'off',
				'value' => !empty($this->request->data['Admin']['name'])?$this->request->data['Admin']['name']:''
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
				'value' => !empty($this->request->data['Admin']['email'])?$this->request->data['Admin']['email']:''
					)
			);
			?>
		</div>
	</div>	
	<div class="form-group">
		<label class="col-sm-3 control-label">Old Password: </label>
		<div class="col-sm-9">
			<?php
			echo $this->Form->input(
					'old_password', array(
				'label' => false,
				'div' => false,
				'type' => 'password',
				'class' => 'form-control',
				'placeholder' => 'Old Password',
				'autocomplete' => 'off',
				 	
					)
			);
			?>
			<span style="color:red;" id="passerror"></span>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">New Password: </label>
		<div class="col-sm-9">
			<?php
			echo $this->Form->input(
					'new_password', array(
				'label' => false,
				'div' => false,
				'type' => 'password',
				//'type' => 'email',
				'class' => 'form-control',
				'placeholder' => 'New Password',
				'autocomplete' => 'off',
				
					)
			);
			?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Confirm Password: </label>
		<div class="col-sm-9">
			<?php
			echo $this->Form->input(
					'confirm_password', array(
				'label' => false,
				'div' => false,
				'class' => 'form-control',
				'type' => 'password',
				'placeholder' => 'Confirm Password',
				'autocomplete' => 'off',
				
					)
			);
			?>
			<input type="hidden" name="data[Admin][id]" value="<?php echo $_admin_data['id']; ?>">
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-9 col-sm-offset-3">
			<button type="submit" class="btn btn-primary">Update</button>
			<a href="<?php echo $this->webroot; ?>admin/dashboard" type="reset" class="btn btn-default btn-outline">Back</button>
		</div>
	</div>
	<?php echo $this->Form->end(); ?>
</div>
</div>
	</div>
</div>
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
</script>