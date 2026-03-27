<?php include 'recaptcha.php' ?>

<style>
    body {
        background-image: url('<?php echo base_url() ?>assets/themes/default/images/1911159.jpg');
        background-repeat: no-repeat;
        background-size: cover;
        background-image: linear-gradient(bottom, rgba(0, 0, 0, .6), rgba(0, 0, 0, 0.51)), url("<?php echo base_url() ?>assets/themes/default/images/1911159.jpg");
        background-image: -moz-linear-gradient(top, rgba(0, 0, 0, .6), rgba(0, 0, 0, .6)), url("<?php echo base_url() ?>assets/themes/default/images/1911159.jpg");
        background-image: -o-linear-gradient(top, rgba(0, 0, 0, .6), rgba(0, 0, 0, .6)), url("<?php echo base_url() ?>assets/themes/default/images/1911159.jpg");
        background-image: -ms-linear-gradient(top, rgba(0, 0, 0, .6), rgba(0, 0, 0, .6)), url("<?php echo base_url() ?>assets/themes/default/images/1911159.jpg");
        background-image: -webkit-gradient(linear, left top, left bottom, from(rgba(0, 0, 0, .6)), to(rgba(0, 0, 0, 1))), url("<?php echo base_url() ?>assets/themes/default/images/1911159.jpg");
        background-image: -webkit-linear-gradient(top, rgba(0, 0, 0, .6), rgba(0, 0, 0, .6)), url("<?php echo base_url() ?>assets/themes/default/images/1911159.jpg");
    }
</style>
<div class="uk-vertical-align uk-text-center">
    <div class="uk-panel uk-vertical-align-bottom uk-margin-large-top">
        <div>
            <i class="uk-icon-user uk-heading-large text-white uk-icon-large"></i>
        </div>
        <?php if ($this->option->get('google-login-state') == '1') { ?>
            <br />
            <p class="text-white">Sign in with...</p>
            <div class="g-signin2" id="googleSignInBtn" data-onsuccess="onSignIn"></div>
        <?php } ?>
        <?php if ($this->option->get('facebook-login-state') == '1') { ?>
            <a href="<?php echo $login_url ?>" class="uk-button-primary uk-button uk-button-large uk-text-bold" role="button">
                <i class="uk-icon-facebook uk-icon-medium uk-margin-right uk-margin-top  uk-margin-bottom"></i> Facebook
            </a>
        <?php } ?>
        <p class="text-white">Sign in with your email address</p>
        <?php
        $attributes = array(
            'class' => 'uk-panel-box uk-form',
            'method' => 'post'
        );
        echo form_open('', $attributes);
        ?>
        <div class="uk-form-row">
            <?php echo form_error('email') ?>
            <input name="email" id="email" value="<?php echo set_value('email') ?>" class="uk-width-1-1" type="text" placeholder="Email address">
        </div>
        <div class="uk-form-row uk-form-password">
            <?php echo form_error('password') ?>
            <input name="password" id="password" class="" type="password">
            <a href="#" class="uk-form-password-toggle" data-uk-form-password>Show</a>
        </div>
        <?php if (option_get('recapatcha-api-key')) { ?>
        <div class="uk-text-center">
            <?php echo form_error('g-recaptcha-response') ?>
            <div id="recaptcha-video"></div>
        </div>
        <?php } ?>
        <div class="uk-form-row">
            <button class="uk-width-1-1 uk-button uk-button-primary uk-button-large" id="login">Login</button>
        </div>
        </form>
        <p class="text-white">
            Don't have an account <a href="<?php echo base_url() ?>users/sign_up" class=" yellow-coin ">Sign up</a>
        </p>
        <br />
        <br />
        <br />
        <br />
        <br />


    </div>

</div>
