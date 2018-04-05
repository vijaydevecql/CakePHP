<section class="content-header">
          <h1>
          Edit Content
          </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Content</a></li>
            <li class="active">Edit Content</li>
          </ol> -->
        </section>
<section class="content">
          <div class="row">
		<div class="col-xs-12">
              <!-- general form elements -->
              <div class="box box-primary">
                
<?php
// prx($this->request->data );
  echo $this->Html->script('ckeditor/ckeditor', array('inline' => false));
  echo $this->Form->create('Content', array('class' => 'form-horizontal','type' => 'file'), array('type' => 'file'));
  
  ?>
   <div class="box-body">
  <div class="form-group">
  <label>Name</label>
  
  <?php
  echo $this->Form->input(
  'name', array(
  'label' => false,
  'div' => false,
  // 'required'=>false,
   'readonly'=>true,
  'class' => 'form-control',
  'placeholder' => 'Name',
  )
  );
  ?>
  
  </div>
<?php if($this->request->data['Content']['type']==1 || $this->request->data['Content']['type']==3){  ?>

  <div class="form-group">
  <label>Name</label>
  
  <?php
  echo $this->Form->input(
  'title', array(
  'label' => false,
  'div' => false,
  // 'required'=>false,
   //'readonly'=>true,
  'class' => 'form-control',
  'placeholder' => 'Title',
  )
  );
  ?>
  
  </div>
  <?php } ?>

  <div class="form-group">
  <label>Content</label>

  <?php
  echo $this->Form->textarea(
  'content', array(
  'label' => false, 
  'html' => true,
  'required'=>false,
  'class' => 'form-control ckeditor',
  'placeholder' => 'Content',
  )
  );
  ?>
  
  </div>
 
  
  <div class="box-footer">
	<button type="submit" class="btn btn-primary">Submit</button>
  </div>
  </div>
  <?php echo $this->Form->end(); ?>
  </div>
  </div>

