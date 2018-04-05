<?php
?>
<div class="row">
	<?php echo $this->Form->create('Material', array('class' => 'form-horizontal', 'type' => 'GET')); ?>
	<div class="col-md-10 col-md-offset-1">
		<div class="row">
			<div class="col-md-2">
				<div class="form-group">
					<?php
					echo $this->Form->input('q', array(
						'div' => false,
						'label' => false,
						'class' => 'form-control',
						'autofocus' => 'autofocus',
						'placeholder' => 'Keyword...',
					));
					?>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<?php
					echo $this->Form->input('format', array(
						'div' => false,
						'label' => false,
						'required' => false,
						'options' => $material_formats,
						'class' => 'form-control',
						'empty' => 'All Formats',
					));
					?>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<?php
					echo $this->Form->input('type', array(
						'div' => false,
						'label' => false,
						'required' => false,
						'options' => $material_types,
						'class' => 'form-control',
						'empty' => 'All Types',
					));
					?>
				</div>
			</div>
			<div class="col-md-2">
				<div class="form-group">
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit"><span class="fa fa-search"></span> &nbsp; </button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php echo $this->Form->end(); ?>
</div>
