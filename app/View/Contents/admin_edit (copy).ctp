<h1>
  Edit Content
</h1>
<div class="row">
  <!-- general form elements -->
  <?php

  echo $this->Html->script('ckeditor/ckeditor', array('inline' => false));
  echo $this->Form->create('Content', array('class' => 'form-horizontal','type' => 'file'), array('type' => 'file'));

  ?>


 <!--  <?php if ($content_data['Content']['type'] == 4 || $content_data['Content']['type'] == 1 || $content_data['Content']['type'] == 2 || $content_data['Content']['type'] == 3 ) {
   ?>
   <div class="form-group">
    <label class="col-sm-3 control-label">Name</label>
    <div class="col-sm-6">
      <?php
    /*  echo $this->Form->input(
        'name', array(
          'label' => false,
          'div' => false,
  // 'required'=>false,
          'readonly'=>true,
          'class' => 'form-control',
          'placeholder' => 'Name',
        )
      );*/
      ?>

    </div>
  </div>
  <?php } ?> -->

  <?php if ($content_data['Content']['type'] == 1 || $content_data['Content']['type'] == 2 || $content_data['Content']['type'] == 3) {
   ?>
   <div class="form-group">
    <label class="col-sm-3 control-label">Title</label>
    <div class="col-sm-6">
      <?php
      echo $this->Form->text(
        'title', array(
          'label' => false, 
          'html' => true,
          'required'=>false,
          'class' => 'form-control ckeditor',
          'placeholder' => 'Title',
        )
      );

      ?>

    </div>
  </div>
  <?php } ?>
  <?php if ($content_data['Content']['type'] == 4) {
   ?>
   <div class="form-group">
    <label class="col-sm-3 control-label">Video: </label>
    <div class="col-sm-6">
      <div class="input-group input-group-file">
        <input type="text"  class="form-control showname"  readonly="">
        <span class="input-group-btn">
          <span class="btn btn-success btn-file">
            <i class="icon wb-upload" aria-hidden="true"></i>
            <input type="file" accept="video/*" id="file" name="data[Content][url]" required >

          </span>
        </span>
      </div>
      <!-- <img src="" name="image_1" id="image" height="100px" width="100px" > -->
    </div>
  </div>
  <?php } ?>
  <br>
  <?php if ($content_data['Content']['type'] == 2 || $content_data['Content']['type'] == 3) {
   ?>
   <div class="form-group">
    <label class="col-sm-3 control-label"> Image: </label>
    <div class="col-sm-6">
      <div class="input-group input-group-file">
        <input type="text"  class="form-control showname " readonly="">
        <span class="input-group-btn">
          <span class="btn btn-success btn-file">
            <i class="icon wb-upload" aria-hidden="true"></i>
            <input type="file" accept="image/*" id="file" name="data[Content][url]">

          </span>
        </span>
      </div>
      <img src="<?php echo $this->webroot.'files/images'.$content_data['Content']['url']; ?>" name="image_1" id="image" height="100px" width="100px" > 
    </div>
  </div>
  <?php } ?>
  <br>
  <?php if ($content_data['Content']['type'] == 2  || $content_data['Content']['type'] == 3) {
   ?>
   <div class="form-group">
    <label class="col-sm-3 control-label">Description</label>
    <div class="col-sm-6">
      <?php
      echo $this->Form->textarea(
        'short_description', array(
          'label' => false, 
          'html' => true,
          'required'=>false,
          'class' => 'form-control ckeditor',
          'placeholder' => 'Description',

        )
      );
      ?>

    </div>
  </div>
  <?php } ?>
  
  <?php if ($content_data['Content']['page_type'] == 2  || $content_data['Content']['type'] == 3 ) {
    ?>
    <div class="form-group">
      <label class="col-sm-3 control-label">Year: </label>
      <div class="col-sm-6">
        <?php 
        $year = 1955;
        $year_data = [];
        for ($i=1; $i <=63 ; $i++) { 
         $year_data[$i] = $year;
         $year = $year + 1;
       }



       ?>
 <div class="form-group">
        <div class="col-sm-9 col-sm-offset-3">
            <button type="submit" class="btn btn-primary">Submit </button>
            <a href="<?php echo $this->webroot;?>admin/CMS" type="reset" class="btn btn-default btn-outline">Cancel</a>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
</div>
    </div>
</div>
<script>


  $('body').on('change','#banner_image',function(e){

   $('#display_name').val(this.files && this.files.length ? this.files[0].name.split('.')[0] : '');
   readURL(this);
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
  $("#file").on('change', function () {

   view(this);
 });
  function view(input) {
    $("#image").show();
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $("#image").attr('src', e.target.result);
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>