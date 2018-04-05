<div class="page-header">
	<h1 class="page-title">
		Add Brand
	</h1>
	<br />
	<div class="row">
            <div class="col-sm-9">
                <?php echo $this->Form->create('Brand', array('class' => 'form-horizontal','enctype' => 'multipart/form-data')); ?>
                 
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
                        'placeholder' => 'Brand Name',
                        'autocomplete' => 'off',
                        )
                        );
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"> Image : </label>
                    <div class="col-sm-9">
                        <div class="input-group input-group-file">
                            <input type="text"  class="form-control showname"  readonly="">
                            <span class="input-group-btn">
                                <span class="btn btn-success btn-file">
                                    <i class="icon wb-upload" aria-hidden="true"></i>
                                    <input type="file" accept="image/*" id="file" name="data[Brand][image]" >
                                    
                                </span>
                            </span>
                        </div>
                    <img src="" name="image_1" id="image" height="100px" width="100px" >
                    </div>
                </div>
         <br>
               
               <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <button type="submit" class="btn btn-primary" id="setCropperData" >Save </button>
                        <button type="reset" class="btn btn-primary" id="setCropperData" > Reset </button>
                        <a href="<?php echo $this->webroot;?>admin/brands" type="reset" class="btn btn-default btn-outline">Back</a>
                    </div>
                </div>
            </div>
        </div>
</div>
<script>
   
    
    $('body').on('change','#banner_image',function(){

         $('#display_name').val(this.files && this.files.length ? this.files[0].name.split('.')[0] : '');
    });
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








$("#file1").on('change', function () {
        
         view1(this);
    });
 function view1(input) {
        $("#image1").show();
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#image1").attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }


   $("#file1").on('change', function () 
    {
        $('.showname1').val($('#file1').val());
        var insurances_id = '#image1'
        readURL(this,insurances_id);
    });



$("#file").on('change', function () 
    {
        $('.showname').val($('#file').val());
        var insurances_id = '#image'
        readURL(this,insurances_id);
    });

    
</script>    