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
        <input class="form-control" name="data[PaymentOption][card_name]">
      </div>
      <div class="form-group">
        <label>Credit Card/Debit card Number: </label>
        <input class="form-control" name="data[PaymentOption][card_number]" id="card_number" required>
      </div>
      <div class="form-group">
        <label>Expire Month: </label>
        <select name="data[PaymentOption][expiry_month]" required class="form-control payment_input date">
          <option value="">Choose Expire Month</option>
          <?php
          for ($i = 1; $i <= 12; $i++) {
            if ($i <= 9) {
              $i = sprintf("%02d", $i);
            }
            ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?> 
          </select>
        </div>
        <div class="form-group">
          <label>Card Type: </label>
          <select name="data[PaymentOption][type]" required class="form-control payment_input date" required>
            <option value="">Choose Card type</option>
            <option value="Visa">Visa</option>
            <option value="MasterCard">MasterCard</option>
            <option value="American Express">American Express</option>
          </select>
        </div>
        <div class="form-group">
          <label>Expire Year: </label>
          <select name="data[PaymentOption][expiry_year]" required class="form-control payment_input date">
            <option value="">Choose Expire Year</option>
            <?php for ($i = date('Y'); $i <= date('Y') + 20; $i++) { ?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php } ?> 
          </select>
        </div>
        
        
        <button type="submit" class="btn btn-default submit">Save</button>
        <?php echo $this->Form->end(); ?>
      </div>
    </div>
  </div>
</div>
</section>