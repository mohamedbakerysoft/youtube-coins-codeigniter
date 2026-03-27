<script>
  function initPayPalButton() {
    paypal.Buttons({
      style: {
        shape: 'rect',
        color: 'gold',
        layout: 'vertical',
        label: 'paypal',

      },

      createOrder: function(data, actions) {
        return actions.order.create({
          purchase_units: [{
            "amount": {
              "currency_code": "USD",
              "value": 1
            },
            "receiver": {
              "email": "partner@example.com"
            },
          }]
        });
      },

      onApprove: function(data, actions) {
        return actions.order.capture().then(function(orderData) {

          // Full available details
          console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
          $.post('<?php echo site_url('paypal/success') ?>');
          // Show a success message within this page, e.g.
          const element = document.getElementById('paypal-button-container');
          element.innerHTML = '';
          element.innerHTML = '<br/><h2>Thank you for your payment!</h2>';

          // Or go to another URL:  actions.redirect('thank_you.html');

        });
      },

      onError: function(err) {
        console.log(err);
      }
    }).render('#paypal-button-container');
  }
  initPayPalButton();
</script>