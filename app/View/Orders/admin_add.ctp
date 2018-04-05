<div class="page-header">
    <h1 class="page-title">
        Add New Product
    </h1>
    <br />
    <div class="row">
            <div class="col-sm-9">
                <?php echo $this->Form->create('Product', array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data')); ?>
    <div class="row">
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
            <label class="col-sm-3 control-label">Quantity : </label>
            <div class="col-sm-9">

                <?php
                echo $this->Form->input(
                        'quantity', array(
                    'label' => false,
                    'div' => false,
                    'required' => true,
                    'type' => 'number',
                    'class' => 'form-control',
                    'placeholder' => 'Quantity',
                    'autocomplete' => 'off',
                    "min"=>"0"
                        )
                );
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Price : </label>
            <div class="col-sm-9">

                <?php
                echo $this->Form->input(
                        'price', array(
                    'label' => false,
                    'div' => false,
                    'required' => true,
                    'type' => 'number',
                    'class' => 'form-control',
                    'placeholder' => 'Price',
                    'autocomplete' => 'off',
                    "min"=>"0"
                        )
                );
                ?>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Discount Price (if any) : </label>
            <div class="col-sm-9">

                <?php
                echo $this->Form->input(
                        'discount', array(
                    'label' => false,
                    'div' => false,
                    'type' => 'number',
                    //'required' => true,
                    'class' => 'form-control',
                    'placeholder' => 'Discount Price',
                    'autocomplete' => 'off',
                    "min"=>"0"
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
                    'placeholder' => 'Description',
                    'autocomplete' => 'off',
                    'type' => 'textarea'
                        )
                );
                ?>
                
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Collection : </label>
            <div class="col-sm-9">
                <select class="form-control" data-plugin="select2" data-placeholder="Select Product Owner"
                        data-allow-clear="true" name = "data[Product][collection_id]" required >
                            <option value ="">Select Collection</option>
                            <?php
                            if (isset($collections) && count($collections) && is_array($collections)) {
                                foreach ($collections as $key => $value) {
                                    ?>
                            <option value ="<?php echo $value['Collection']['id']; ?>"><?php echo ucfirst($value['Collection']['title']); ?></option>
                        <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-3 control-label">Categories : </label>
            <div class="col-sm-9">
                <select class="form-control" data-plugin="select2" required name="data[Product][category_id]">
                    <option value ="">Select Category</option>
                    <?php foreach ($categories as $key => $value) { ?>
                        <option value="<?php echo $value['Category']['id']; ?>"><?php echo $value['Category']['title']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    
    <div class="form-group">
            <label class="col-sm-3 control-label">Colors : </label>
            <div class="col-sm-9">
                <select class="form-control" data-plugin="select2" required name="data[Product][color_id]">
                    <option value ="">Select Color</option>
                    <?php foreach ($colors as $key => $value) { ?>
                        <option value="<?php echo $value['Color']['id']; ?>"><?php echo $value['Color']['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>

     <div class="form-group">
            <label class="col-sm-3 control-label">Brands : </label>
            <div class="col-sm-9">
                <select class="form-control" data-plugin="select2" required name="data[Product][brand_id]">
                    <option value ="">Select Brand</option>
                    <?php foreach ($brands as $key => $value) { ?>
                        <option value="<?php echo $value['Brand']['id']; ?>"><?php echo $value['Brand']['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
   
     <div class="form-group">
            <label class="col-sm-3 control-label">Weaves : </label>
            <div class="col-sm-9">
                <select class="form-control" data-plugin="select2" required name="data[Product][weave_id]">
                    <option value ="">Select Weave</option>
                    <?php foreach ($weaves as $key => $value) { ?>
                        <option value="<?php echo $value['Weave']['id']; ?>"><?php echo $value['Weave']['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    
     <div class="form-group">
            <label class="col-sm-3 control-label">Patterns : </label>
            <div class="col-sm-9">
                <select class="form-control" data-plugin="select2" required name="data[Product][pattern_id]">
                    <option value ="">Select Pattern</option>
                    <?php foreach ($patterns as $key => $value) { ?>
                        <option value="<?php echo $value['Pattern']['id']; ?>"><?php echo $value['Pattern']['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
            <label class="col-sm-3 control-label">Sizes : </label>
            <div class="col-sm-9">
                <select class="form-control" data-plugin="select2" required name="data[Product][size]">
                    <option value ="">Select Size</option>
                    <?php 
                    $sizes = Configure::read('sizes');
                    foreach ($sizes as $key => $value) { ?>
                        <option value="<?php echo $key; ?>"><?php echo $value; ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-9 col-sm-offset-3">
            <button type="submit" class="btn btn-primary" id="setCropperData" >Save </button>
            <a href="<?php echo $this->webroot; ?>admin/products" type="reset" class="btn btn-default btn-outline">Cancel</a>
        </div>
    </div>


<?php echo $this->Form->end(); ?>
            </div>
        </div>
</div>
<script type="text/javascript">
    
    
$(document).ready(function() {
    
    $("#ItemAmount").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});
</script>

