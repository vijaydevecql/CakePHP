<?php 

// prx($amount); ?>

  <section class="payment" style="
    margin: 130px 0 114px;
">
  <div class="content-section-b">

        <div class="container">
        <div class="col-md-8 col-md-offset-2">
  <form class="form-horizontal" action="<?php echo $this->webroot; ?>webs/payment" method="post" >
    <fieldset>
      <legend>Pay </legend>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-holder-name">Name on Card</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="card_holder_name" id="card-holder-name" placeholder="Card Holder's Name" required >
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-number">Card Number</label>
        <div class="col-sm-9">
          <input maxlength="16"  type="Number" class="form-control" name="card_no" id="card-number" placeholder="Debit/Credit Card Number" required >
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-xs-3">
              <select class="form-control col-sm-2" name="expiry_month" id="expiry-month" required>
                <option value="" >Month</option>
                <option value="01">Jan (01)</option>
                <option value="02">Feb (02)</option>
                <option value="03">Mar (03)</option>
                <option value="04">Apr (04)</option>
                <option value="05">May (05)</option>
                <option value="06">June (06)</option>
                <option value="07">July (07)</option>
                <option value="08">Aug (08)</option>
                <option value="09">Sep (09)</option>
                <option value="10">Oct (10)</option>
                <option value="11">Nov (11)</option>
                <option value="12">Dec (12)</option>
              </select>
            </div>
            <div class="col-xs-3">

              <select class="form-control" name="expiry_year" required> 
                <?php 

                for ($i=date('Y'); $i <= date('Y')+30 ; $i++) { ?>
                  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                <?php } ?>
               
              </select>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="cvv">Card CVV</label>
        <div class="col-sm-3">
          <input type="password" class="form-control" name="cvv" id="cvv" placeholder="Security Code" required>
        </div>
      </div>
       <!-- <div class="form-group"> -->
        <!-- <label class="col-sm-3 control-label" for="Amount">Amount</label> -->
        <!-- <div class="col-sm-3"> -->
          <input type="hidden" class="form-control" name="amount" id="Amount" placeholder="Amount" value="<?php  echo $amount;?>">
        <!-- </div> -->
      <!-- </div> -->
      <!-- <div class="form-group">
      <label class="col-sm-3 control-label" >Save card for faster transection.</label>
        <div class="col-sm-offset-3 col-sm-9">
          <input type="radio" name="save" value="1" > yes 
          <input type="radio" name="save" value="0" > No 
        </div>
      </div> -->
      <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
          <button type="submit" class="btn btn-success">Pay Now</button>
        </div>
      </div>
    </fieldset>
  </form>
  </div>
</div>
        <!-- /.container -->

    </div>
</section>