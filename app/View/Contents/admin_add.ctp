<div class="page-header">
    <h1 class="page-title">
        Add New Language Value
    </h1>
    <br />
    <div class="row">
        <div class="col-sm-9">
<div class="row">
    <?php echo $this->Form->create('LanguageValue', array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data')); ?>
        
    <div class="form-group">
      <label class="col-sm-3 control-label">Language Key: </label>
      <div class="col-sm-9">
        <?php
        echo $this->Form->input(
            'language_key_id',
        array(
            'label' => false,
            'div' => false,
            'required' => true,
            'class' => 'form-control',
            'placeholder' => '',
            'autocomplete' => 'off',
        )
        );
        ?>
      </div>
    </div>

    <?php
        //prx($languages);
        foreach ($languages as $key => $value) {
    ?>

    <input type="hidden" name="LanguageValue[language_id][]" value="<?php echo $key;?>">

    <div class="form-group">
      <label class="col-sm-3 control-label"><?php echo $value.' Value';?>: </label>
      <div class="col-sm-9">
        <?php
        echo $this->Form->input(
        'value',
        array(
            'type' => 'text',
            'label' => false,
            'div' => false,
            'required' => true,
            'class' => 'form-control',
            'placeholder' => '',
            'autocomplete' => 'off',
            'name'=>'data[LanguageValue][value][]'
        )
        );
        ?>
      </div>
    </div>

    <?php  }  ?>
    <div class="form-group">
        <div class="col-sm-9 col-sm-offset-3">
            <button type="submit" class="btn btn-primary">Submit </button>
            <button type="reset" class="btn btn-default btn-outline">Reset</button>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
</div>
    </div>
</div>
