<div id="smart-button-container">
  <div class="text-align-center">
    <br />
    <h3>Every 1000 coins = $1</h3>
    <h3>Minimum withdrawal amount $100</h3>

    <form class="uk-form uk-form-stacked" method="post" action="<?php echo base_url('Users/paypal_email'); ?>" enctype="multipart/form-data" accept-charset="utf-8">
      <div class="uk-form-controls">
        <div class="uk-form-controls">
          <input class="uk-width-1-2 uk-form-large uk-margin-bottom" type="text" name="paypal_email" placeholder="paypal_email" value="<?php echo $paypal_email ?>">
        </div>
      </div>
      <div class="uk-form-controls">
        <button class="uk-button uk-button-large uk-button-success">Setup your PayPal account</button>
      </div>
      <br />
    </form>

    <form class="uk-form uk-form-stacked" method="post" action="<?php echo base_url('Paypal/withdraw_transaction'); ?>" enctype="multipart/form-data" accept-charset="utf-8">
      <div class="uk-form-controls">
        <div class="uk-form-controls">
          <input class="uk-width-1-2 uk-form-large uk-margin-bottom" type="number" name="withdraw_amount" placeholder="Withdraw Amount" value="">
        </div>
      </div>
      <div class="uk-form-controls">
        <button class="uk-button uk-button-large uk-button-success">Withdraw</button>
      </div>
      <br />
    </form>

    <a href="/transactions" target="_blank" rel="noopener noreferrer">See Transactions</a>
  </div>
</div>