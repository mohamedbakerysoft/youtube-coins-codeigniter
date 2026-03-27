<?php if (option_get('recapatcha-api-key')) { ?>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
<script>
    var verifyCallback = function(response) {};

    var onloadCallback = function() {
        grecaptcha.render('recaptcha-video', {
            'sitekey': '<?php echo option_get('recapatcha-api-key') ?>',
            'callback': verifyCallback,
            'theme': 'dark'
        });
    };
</script>
<?php } ?>
