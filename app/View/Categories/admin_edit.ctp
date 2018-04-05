<div class="page-header">
	<h1 class="page-title">
		Edit Category
	</h1>
	<br />
	<div class="row">
            <div class="col-sm-9">
                <?php echo $this->Form->create('Category', array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data')); ?>
                 
                <div class="form-group">
                    <label class="col-sm-3 control-label">Category Photo : </label>
                    <div class="col-sm-9">
                        <div class="row">
                            <div class="col-sm-3">
                                <?php
                                    $image = 'default_categories.png';
                               
                                    if(!empty($this->request->data['Category']['image'])){
                                         
                                        $path = APP . 'webroot' . DS . 'files' . DS . 'categories_photo'. DS . $this->request->data['Category']['image'];
                                        if(file_exists($path)){
                                            $image = '100x100'.$this->request->data['Category']['image'];
                                        }
                                    }
                                ?>
                                <img src="<?php echo $this->webroot . 'files/categories_photo/' . $image; ?>" style="width: 100px;" id="display_image">
                            </div>
                            <div class="col-sm-9">
                                <div class="input-group input-group-file">
                                    <input type="text" class="form-control" readonly="" id="display_name">
                                    <span class="input-group-btn">
                                        <span class="btn btn-success btn-file">
                                            <i class="icon wb-upload" aria-hidden="true"></i>
                                            <input type="file" name="image" id="banner_image">
                                        </span>
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-3 control-label">Title : </label>
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
                    <label class="col-sm-3 control-label">Order : </label>
                    <div class="col-sm-9">
                        <?php
                        echo $this->Form->input(
                        'order', array(
                        'label' => false,
                        'div' => false,
                        'required' => true,
                        'class' => 'form-control',
                        'placeholder' => 'Order',
                        'autocomplete' => 'off',
                        )
                        );
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary" id="setCropperData" >Save </button>
                        <a href="<?php echo $this->webroot;?>admin/categories" type="reset" class="btn btn-default btn-outline">Cancel</a>
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
