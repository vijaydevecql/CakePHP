<div class="page-header">
    <h1 class="page-title">
        Add New Promo
    </h1>
    <br />
    <div class="row">
        <div class="col-sm-9">
<div class="row">
    <?php echo $this->Form->create('Promo', array('class' => 'form-horizontal')); ?>
    <div class="form-group">
        <label class="col-sm-3 control-label">Title: </label>
        <div class="col-sm-9">
            <?php
            echo $this->Form->input(
                    'name', array(
                'label' => false,
                'div' => false,
                'required' => true,
                'class' => 'form-control',
                'placeholder' =>  'Title',
                'autocomplete' => 'off',
                )
            );
            ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Amount: </label>
        <div class="col-sm-9">
            <?php
            echo $this->Form->input(
                    'value', array(
                'label' => false,
                'div' => false,
                'required' => true,
                'class' => 'form-control',
                'placeholder' => 'Amount',
                'autocomplete' => 'off',
                )
            );
            ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Type: </label>
        <div class="col-sm-9">
            <select class="form-control" data-plugin="select2" name="data[Promo][type]" required>
                <option value="0">Choose Type</option>
                <option value="1">Amount in ($)</option>
                <option value="2">Amount in (%)</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-3 control-label">Expire: </label>
        <div class="col-sm-9">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="icon wb-calendar" aria-hidden="true"></i>
                </span>
                <input 
                    type="text" 
                    class="form-control" 
                    name="data[Promo][end_date]" 
                    required
                    id="datepicker"
                    >
            </div>
        </div>
    </div>
   
    <div class="form-group">
        <div class="col-sm-9 col-sm-offset-3">
            <button type="submit" class="btn btn-primary">Save</button>
            <a href="<?php echo $this->webroot; ?>admin/promos" class="btn btn-default btn-outline">Cancel</button>
        </div>
    </div>
    <?php echo $this->Form->end(); ?>
</div>
</div>
    </div>
</div>
<script type="text/javascript">
    var nowDate = new Date();
    var today = new Date(nowDate.getFullYear(), nowDate.getMonth(), nowDate.getDate(), 0, 0, 0, 0);
     $('#datepicker').datepicker({
        startDate: today,
        todayHighlight: true,
        autoclose: true,
    });
         
$(document).ready(function() {
    $("#PromoValue").keydown(function (e) {
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










