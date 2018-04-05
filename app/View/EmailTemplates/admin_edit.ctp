<div class="page-header">
    <h1 class="page-title">
        Edit Email Template
    </h1>
    <br />
    <div class="row">
        <div class="col-sm-9">
            <div class="row">
                <?php echo $this->Form->create('EmailTemplate', array('class' => 'form-horizontal')); ?>
                    <?php echo  $this->Form->hidden('id'); ?>
                    <div class="form-group">
                    <label class="col-sm-3 control-label">Subject: </label>
                    <div class="col-sm-9">
                        <?php
                        echo $this->Form->input(
                            'subject', array(
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
                        'required' => true,
                        'class' => 'form-control',
                        'placeholder' => 'First Name',
                        'autocomplete' => 'off',
                        'type' => 'textarea',
                        'id'=>'editor1'
                        //'pattern' => "[a-zA-Z\s]+"
                            )
                        );
                        ?>
                    </div>
                </div>
                <div class="form-group">
                        <div class="col-sm-9 col-sm-offset-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="<?php echo $this->webroot; ?>admin/email_templates" type="reset" class="btn btn-default btn-outline">Cancel</a>
                        </div>
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