<div id="smart-button-container">
  <div style="text-align: center;">
    <div id="paypal-button-container"></div>
    <!-- add a a with uk button styles to redirect to paypal/withdraw-transaction  -->
    <h3>Or</h3>
    <div class="uk-form-controls">
      <a href="<?php echo site_url('payment/withdraw') ?>" class="uk-button uk-button-large uk-button-primary">Wire Transfer Payment</a>
    </div>
  </div>
</div>
<script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=USD" data-sdk-integration-source="button-factory"></script>
<?php include_once('application/views/themes/default/paypal/paypal.scripts.php'); ?>