<div class="page-header">
	<h1 class="page-title">
		Add Weave
	</h1>
	<br />
	<div class="row">
            <div class="col-sm-9">
                <?php echo $this->Form->create('Weave', array('class' => 'form-horizontal', 'type' => 'file')); ?>
                 
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
                        'placeholder' => 'Weave Name',
                        'autocomplete' => 'off',
                        )
                        );
                        ?>
                    </div>
                </div>
               
               <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary" id="setCropperData" >Save </button>
                        <a href="<?php echo $this->webroot;?>admin/weaves" type="reset" class="btn btn-default btn-outline">Back</a>
                    </div>
                </div>
            </div>
        </div>
</div>
<script>
   
    
    $('body').on('change','#banner_image',function(){

         $('#display_name').val(this.files && this.files.length ? this.files[0].name.split('.')[0] : '');
    });
    
</script>    