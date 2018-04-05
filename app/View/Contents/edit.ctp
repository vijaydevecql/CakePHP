<div class="page-header">
    <h1 class="page-title">
        Edit Language Key
    </h1>
    <br />
    <div class="row">
        <div class="col-sm-9">
<div class="row">
    <?php echo $this->Form->create('LanguageValue', array('class' => 'form-horizontal', 'enctype' => 'multipart/form-data')); ?>
        
        <?php //pr($languageValue); ?>

    <?php echo  $this->Form->hidden('id'); ?>
    <div class="form-group">
      <label class="col-sm-3 control-label">Language Key: </label>
      <div class="col-sm-9">
       <input type="text" class="form-control" readonly value="<?php echo $languageValue['LanguageKey']['name'];?>">
      </div>
    </div>

    <input type="hidden" name="LanguageValue[id]" value="<?php echo $languageValue['LanguageValue']['id'];?>">

    <div class="form-group">
      <label class="col-sm-3 control-label"><?php echo $languageValue['Language']['name'].' Value';?>: </label>
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
            'name'=>'data[LanguageValue][value]'
        )
        );
        ?>
          <?php echo  $this->Form->hidden('id'); ?>
      </div>
    </div>
    <div class="form-group">
        <div class="col-sm-9 col-sm-offset-3">
            <button type="submit" class="btn btn-primary">Update </button>
            <button type="reset" class="btn btn-default btn-outline">Reset</button>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
</div>
    </div>
</div>
<script type="text/javascript">

 function readURL(input,id)
{

    if (input.files && input.files[0])
    {
        var reader = new FileReader();

        reader.onload = function (e)
        {
            $(id).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }

}
//  var reader = new FileReader();
$('#photo_up').change(function()
{

   $('#showname').val($('#photo_up').val());

 var insurances_id='#show_img'
 readURL(this,insurances_id);

});

 $('#resetbtn').click(function(){

    $("#show_img").attr("src", "");
    });



</script>
