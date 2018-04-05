<div class="page-header">
	<h1 class="page-title">
		Edit Weaves
	</h1>
	<br />
	<div class="row">
            <div class="col-sm-9">
                <?php echo $this->Form->create('Weave', array('class' => 'form-horizontal')); ?>
                 
              
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
                        <button type="submit" class="btn btn-primary" id="setCropperData" >Update</button>
                        <a href="<?php echo $this->webroot;?>admin/weaves" type="reset" class="btn btn-default btn-outline">Cancel</a>
                    </div>
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

    
</script>    
