<div class="page-header">
    <h1 class="page-title">
        Add New Page
    </h1>
    <br />
    <div class="row">
        <div class="col-sm-9">
<div class="row">
   <?php echo $this->Form->create('ContentMagement', array('class' => 'form-horizontal')); ?>
    <div class="form-group">
        <label class="col-sm-3 control-label">Title: </label>
        <div class="col-sm-9">
            <?php
            echo $this->Form->input(
                    'key', array(
                'label' => false,
                'div' => false,
                'required' => true,
                'class' => 'form-control',
                'placeholder' => 'Category Name',
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
                    'value', array(
                'label' => false,
                'div' => false,
                'required' => true,
                'class' => 'form-control',
                'placeholder' => 'Enter Description',
                'autocomplete' => 'off',
                'type' => 'textarea',
                  'id'=>'editor1'
                    )
            );
            ?>
        </div>
    </div>
   
    <div class="form-group">
        <div class="col-sm-9 col-sm-offset-3">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="<?php echo $this->webroot; ?>admin/ContentMagemnet/index" class="btn btn-default btn-outline">Cancel</a>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
</div>
    </div>
</div>
<script src="//cdn.ckeditor.com/4.5.8/standard/ckeditor.js"></script>
<script>
 $(document).ready(function(){
   CKEDITOR.replace( 'editor1' );
 })
 </script>
