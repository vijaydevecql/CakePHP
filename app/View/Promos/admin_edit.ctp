<div class="page-header">
    <h1 class="page-title">
        Edit Promo
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
                'placeholder' => 'Title',
                'autocomplete' => 'off',
                    )
            );
            ?>
           <?php echo  $this->Form->hidden('id'); ?>
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
                <option value="1" <?php echo ($this->request->data['Promo']['type'] == 1)? 'selected':'';?>>Amount in ($)</option>
                <option value="2" <?php echo ($this->request->data['Promo']['type'] == 2)? 'selected':'';?>>Amount in (%)</option>
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
                    value="<?php echo !empty($this->request->data['Promo']['end_date'])? date('d/m/Y',$this->request->data['Promo']['end_date']):'';?>" 
                    >
            </div>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-9 col-sm-offset-3">
            <button type="submit" class="btn btn-primary">Submit </button>
            <a href="<?php echo $this->webroot.'admin/promos'; ?>" type="reset" class="btn btn-default btn-outline">Back</a>
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
</script>







