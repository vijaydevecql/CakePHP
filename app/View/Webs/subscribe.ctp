<?php 

// prx($amount); ?>

  <section class="payment" style="
    margin: 130px 0 114px;
">
  <div class="content-section-b">

        <div class="container">
        <div class="col-md-8 col-md-offset-2">
  <form class="form-horizontal" action="<?php echo $this->webroot; ?>webs/subscribe" method="post" >
    <fieldset>
      <legend>Pay </legend>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-holder-name">Name on Card</label>
        <div class="col-sm-9">
          <input type="text" class="form-control" name="card_holder_name" id="card-holder-name" placeholder="Card Holder's Name" value="<?php echo $card['Card']['card_name']; ?>" required >
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="card-number">Card Number</label>
        <div class="col-sm-9">
          <input maxlength="16"  type="Number" class="form-control" name="card_no" id="card-number" placeholder="Debit/Credit Card Number" value="<?php echo $card['Card']['card_number']; ?>" required >
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
        <div class="col-sm-9">
          <div class="row">
            <div class="col-xs-3">
              <select class="form-control col-sm-2" name="expiry_month" id="expiry-month" required>
                <option value="" >Month</option>
                <option value="01" <?php if($card['Card']['expiry_month']==01){echo "selected";} ?> >Jan (01)</option>
                <option value="02" <?php if($card['Card']['expiry_month']==02){echo "selected";} ?>>Feb (02)</option>
                <option value="03" <?php if($card['Card']['expiry_month']==03){echo "selected";} ?>>Mar (03)</option>
                <option value="04" <?php if($card['Card']['expiry_month']==04){echo "selected";} ?>>Apr (04)</option>
                <option value="05" <?php if($card['Card']['expiry_month']==05){echo "selected";} ?>>May (05)</option>
                <option value="06" <?php if($card['Card']['expiry_month']==06){echo "selected";} ?>>June (06)</option>
                <option value="07" <?php if($card['Card']['expiry_month']==07){echo "selected";} ?>>July (07)</option>
                <option value="08" <?php if($card['Card']['expiry_month']==08){echo "selected";} ?>>Aug (08)</option>
                <option value="09" <?php if($card['Card']['expiry_month']==09){echo "selected";} ?>>Sep (09)</option>
                <option value="10" <?php if($card['Card']['expiry_month']==10){echo "selected";} ?>>Oct (10)</option>
                <option value="11" <?php if($card['Card']['expiry_month']==11){echo "selected";} ?>>Nov (11)</option>
                <option value="12" <?php if($card['Card']['expiry_month']==12){echo "selected";} ?>>Dec (12)</option>
              </select>
            </div>
            <div class="col-xs-3">

              <select class="form-control" name="expiry_year" required> 
                <?php 

                for ($i=date('Y'); $i <= date('Y')+30 ; $i++) { ?>
                  <option value="<?php echo $i; ?>" <?php if($card['Card']['expiry_year']==$i){echo "selected";} ?>><?php echo $i; ?></option>
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
           <input type="hidden" class="form-control" name="packageid"  value="<?php  echo $packageid;?>">
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