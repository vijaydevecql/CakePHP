<?php
if($this->request->data){

  $data = $this->request->data;
  
}else{
  $data = [];
}
?>
<section class="account">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="acnt_text">
              <h2> Edit Payment Option </h2>
            </div>
          </div>
          
        </div>
      </div>
    </section>
<section>
  <div class="container">
   <div class="row">
    <div class="col-md-5">
     <div class="addrs_form">
      <?php echo $this->Form->create('payment');?>
      <div class="form-group">
        <label>Name: </label>
        <input class="form-control" name="data[PaymentOption][card_name]"  value="<?php echo (count($data) && !empty($data['PaymentOption']['card_name']))?ucfirst($data['PaymentOption']['card_name']) : ''; ?>" >
      </div>
      <div class="form-group">
        <label>Credit Card/Debit card Number: </label>
        <input class="form-control" name="data[PaymentOption][card_number]" id="card_number" required value="<?php echo (count($data) && !empty($data['PaymentOption']['card_number']))?$data['PaymentOption']['card_number'] : ''; ?>">
      </div>
      <div class="form-group">
        <label>Expire Month: </label>
        <select name="data[PaymentOption][expire_month]" required class="form-control payment_input date">
          <option value="">Choose Expire Month</option>
          <?php
          for ($i = 1; $i <= 12; $i++) {
            if ($i <= 9) {
              $i = sprintf("%02d", $i);
            }
            ?>
            <option value="<?php echo $i; ?>" <?php echo (count($data) && (trim($data['PaymentOption']['expire_month']) == $i ))?'selected': ''; ?>><?php echo $i; ?></option>
            <?php } ?> 
          </select>
        </div>
        <div class="form-group">
          <label>Card Type: </label>
          <select name="data[PaymentOption][type]" required class="form-control payment_input date" required>
            <option value="">Choose Card type</option>
            <option value="Visa" <?php echo (count($data) && (trim($data['PaymentOption']['type']) == 'Visa' ))?'selected': ''; ?>>Visa</option>
            <option value="MasterCard" <?php echo (count($data) && (trim($data['PaymentOption']['type']) == 'MasterCard' ))?'selected': ''; ?>>MasterCard</option>
            <option value="American Express" <?php echo (count($data) && (trim($data['PaymentOption']['type']) == 'American Express' ))?'selected': ''; ?>>American Express</option>
          </select>
        </div>
        <div class="form-group">
          <label>Expire Year: </label>
          <select name="data[PaymentOption][expire_year]" required class="form-control payment_input date">
            <option value="">Choose Expire Year</option>
            <?php for ($i = date('Y'); $i <= date('Y') + 20; $i++) { ?>
            <option value="<?php echo $i; ?>" <?php echo (count($data) && (trim($data['PaymentOption']['expire_year']) == $i ))?'selected': ''; ?>><?php echo $i; ?></option>
            <?php } ?> 
          </select>
        </div>
        
        <a href="<?php echo $this->webroot.'my_payment_option'?>" class="btn btn-default">Back</a>
        <button type="submit" class="btn btn-default submit">Save</button>

        <?php echo $this->Form->end(); ?>
      </div>
    </div>
  </div>
</div>
</section>
<script>
   $("#card_number").mask("9999-9999-9999-9999");
</script>