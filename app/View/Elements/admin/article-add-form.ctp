<div class="row">
	<?php echo $this->Form->create('Article', array('class' => 'form-horizontal', 'type' => 'file')); ?>
	<div class="form-group">
		<label class="col-sm-3 control-label">Title: </label>
		<div class="col-sm-9">
			<?php
			echo $this->Form->input(
					'title', array(
				'label' => false,
				'div' => false,
				'required' => true,
				'class' => 'form-control',
				'placeholder' => 'Title',
				'autocomplete' => 'off',
					)
			);
			?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Description: </label>
		<div class="col-sm-9">
			<?php
			echo $this->Form->input(
					'description', array(
				'label' => false,
				'div' => false,
				'type' => 'textarea',
				'class' => 'form-control',
				'placeholder' => 'Description',
				'autocomplete' => 'off',
				'required' => true,
					)
			);
			?>
		</div>
	</div>
	<div class="form-group">
		<label class="col-sm-3 control-label">Photo: </label>
		<div class="col-sm-9">
			<?php
			echo $this->Form->input(
					'photo', array(
				'label' => false,
				'div' => false,
				'type' => 'file',
				'class' => 'form-control',
				'placeholder' => 'Photo',
				'autocomplete' => 'off',
				'required' => false,
					)
			);
			?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-9 col-sm-offset-3">
			<button type="submit" class="btn btn-primary">Submit </button>
			<button type="reset" class="btn btn-default btn-outline">Reset</button>
		</div>
	</div>
	<?php echo $this->Form->end(); ?>
</div>
<script>
	$(document).ready( function () {
		$('#show_password_icon').on('click', function () {
			$('#ArticlePassword').attr('type', 'text');
			$(this).hide();
			$('#hide_password_icon').show();
		});
		$('#hide_password_icon').on('click', function () {
			$('#ArticlePassword').attr('type', 'password');
			$(this).hide();
			$('#show_password_icon').show();
		});
	});
</script>