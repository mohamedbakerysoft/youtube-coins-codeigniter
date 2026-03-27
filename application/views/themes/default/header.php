<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/html" lang="en-US">

<head>
    <title><?php echo $title ?></title>
    <meta http-equiv="Content-Security-Policy" content="frame-ancestors https://preview.codecanyon.net">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?php echo link_tag('assets/themes/' . $this->selected_theme . '/css/style.css'); ?>
    <?php echo link_tag('assets/themes/' . $this->selected_theme . '/css/custom.css'); ?>
    <?php $selected_theme = $this->session->userdata('selected-theme'); ?>
    <?php echo link_tag('assets/themes/' . $this->selected_theme . '/' . UIKIT . '/css/' . $selected_theme); ?>
    <?php echo link_tag('assets/themes/' . $this->selected_theme . '/' . UIKIT . '/css/components/tooltip.css'); ?>
    <meta name="description" content="<?php echo strip_tags($description) ?>">
    <meta name="keywords" content="<?php echo strip_tags($keywords) ?>">
    <meta property="og:site_name" content="<?php echo $this->option->get('website-name') ?>" />
    <meta property="og:type" content="video/mp4" />
    <meta property="og:title" content="<?php echo $title ?>" />
    <meta property="og:description" content="<?php echo strip_tags($description) ?>" />
    <meta property="og:url" content="<?php echo current_url() ?>" />
    <meta property="og:image" content="<?php echo $this->option->get('site-logo') ?>" />
    <meta property="og:locale" content="en_US" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->option->get('favicon') ?>" />
    <script src="<?php echo base_url() ?>assets/themes/<?php echo $this->selected_theme ?>/js/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/themes/<?php echo $this->selected_theme . '/' . UIKIT  ?>/js/uikit.min.js"></script>
    <script src="<?php echo base_url() ?>assets/themes/<?php echo $this->selected_theme . '/' . UIKIT ?>/js/components/sticky.min.js"></script>
    <script src="<?php echo base_url() ?>assets/themes/<?php echo $this->selected_theme . '/' . UIKIT ?>/js/components/grid.min.js"></script>
    <script src="<?php echo base_url() ?>assets/themes/<?php echo $this->selected_theme . '/'  ?>js/timer.jquery.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans&display=swap' rel='stylesheet' type='text/css'>
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Indie+Flower&display=swap">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
        }

        .replace_animation {}

        .v1_more_bt_txt {
            color: rgba(0, 0, 0, 0.5);
            display: block;
            font-family: "Indie Flower", cursive;
            font-size: 20px;
            line-height: 1.2em;
            margin: 60px auto 0;
            text-align: center;
            width: 200px;
        }

        .replace_animation:hover .v1_more_bt_txt {
            color: rgba(0, 0, 0, 0.75);
            text-shadow: 0 1px 2px rgba(0, 0, 0, 0.25);
        }

        .v1_more_bt_txt_arrow2 {
            height: 40px;
            margin: -40px 0 0 60px;
            opacity: 0.4;
            position: absolute;
            width: 40px;
        }

        .v1_more_bt_txt_arrow1 {
            height: 70px;
            margin: -5px 0 0 -45px;
            opacity: 0.4;
            position: absolute;
            width: 70px;
        }

        .replace_animation:hover .v1_more_bt_txt_arrow1 {
            margin-left: -70px;
            opacity: 0.8;
        }

        .replace_animation:hover .v1_more_bt_txt_arrow2 {
            margin-top: -55px;
            opacity: 0.8;
        }

        .v1_more_title {
            background-color: rgba(255, 235, 120, 1);
            display: block;
            font-size: 24px;
            font-weight: bold;
            padding: 8px 0;
            text-align: center;
            text-transform: uppercase;
        }

        .v1_more {
            background-color: rgba(255, 235, 120, 0.2);
        }

        .deja_vu_txt {
            background-color: rgba(0, 0, 0, 0.6);
            border-bottom-left-radius: 2px;
            border-bottom-right-radius: 2px;
            color: #fff;
            font-size: 12px;
            padding: 3px 10px;
            position: absolute;
            right: 15px;
            text-transform: uppercase;
            top: 7px;
            z-index: 1001;
        }

        .viewed {
            background-color: rgba(0, 0, 0, 0.6);
            border-bottom-left-radius: 2px;
            border-bottom-right-radius: 2px;
            color: #fff;
            font-size: 12px;
            padding: 3px 10px;
            position: absolute;
            right: 15px;
            text-transform: uppercase;
            top: 50px;
            z-index: 1001;
        }

        .vignette_pos {
            left: 9px;
            position: absolute;
            top: 0;
            z-index: 992;
            background-color: #ddd;
            color: rgba(0, 0, 0, 0.75);
            display: inline-block;
            font-size: 18px;
            font-weight: bold;
            padding: 2px 10px;
        }

        .first-video-vignette {
            left: 0px;
            position: absolute;
            top: 0;
            z-index: 992;
            background-color: #ffeb78;
            color: rgba(0, 0, 0, 0.75);
            display: inline-block;
            font-size: 26px;
            font-weight: bold;
            padding: 15px 15px;
        }
    </style>
    <meta name="google-signin-client_id" content="<?= $this->option->get('google-client-id') ?>">
    <script>
        function onSignIn(googleUser) {
            var profile = googleUser.getBasicProfile();
            var data = {
                '<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>',
                'name': profile.getName(),
                'email': profile.getEmail(),
                'image': profile.getImageUrl()
            };
            $.post('/users/register-login-with-google', data).done(function() {
                window.location = "/";
            });
        }

        function onLoad() {
            gapi.signin2.render('signin2', {
                'scope': 'profile email',
                'width': 400,
                'height': 50,
                'longtitle': true,
                'theme': 'dark',
                'onsuccess': onSignIn,
            });
            gapi.load('auth2', function() {
                gapi.auth2.init();
            });
        }

        function signOut() {
            var auth2 = gapi.auth2.getAuthInstance();
            auth2.signOut().then(function() {
                window.location = "/users/sign_out";
            });
        }
    </script>
    <script src="https://apis.google.com/js/platform.js?onload=onLoad" async defer></script>
</head>

<body>
    <!---start-header---->
    <nav class="uk-navbar" style="z-index: 999999;" data-uk-sticky>
        <div class="uk-container uk-container-center">
            <a class="uk-float-left" href="<?php echo base_url() ?>">
                <img width="150" height="34" src="<?php echo $this->option->get('site-logo') ?>" alt="<?php echo $this->option->get('website-name') ?>" />
            </a>
            <ul class="uk-navbar-nav uk-hidden-small uk-hidden-medium">
                <li>
                    <a href="<?php echo base_url() ?>">
                        <i class="uk-icon-home"></i> Home
                    </a>
                </li>
                <li class="uk-active">
                    <a href="<?php echo site_url('paypal') ?>">
                        <span class="uk-text-warning">
                            <i class="uk-icon-paypal"></i>
                            <b>Buy <?php echo option_get('paypal-amount') ?></b>
                        </span>
                        <img alt="coin" width="19" height="20" src="<?php echo base_url() ?>assets/themes/default/images/coin.png" />
                    </a>
                </li>
                <li class="uk-active">
                    <a href="<?php echo site_url('paypal/withdraw') ?>">
                        <span class="uk-text-warning">
                            <i class="uk-icon-paypal"></i>
                            <b>Withdraw</b>
                        </span>
                    </a>
                </li>
            </ul>
            <a href="#my-id" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas="" aria-label="my-id"></a>
            <div class="uk-navbar-flip uk-hidden-small">
                <ul class="uk-navbar-nav">
                    <div class="uk-navbar-content">
                        <?php if (isset($this->authority->user->user_id) && is_object($this->authority->user)) { ?>
                            <li class="uk-display-inline">
                                <img alt="coin" width="19" height="20" title="Mes Coins restants" src="<?php echo base_url() ?>assets/themes/default/images/coin.png" />
                                <b id="main-coins"><?php echo $points ?></b>
                                |
                            </li>
                        <?php } ?>
                        <a class="uk-button uk-text-bold uk-button-danger" style="color:#fff" href="<?php echo base_url() ?>articles/create">
                            <i class="uk-icon-youtube-play"></i>
                            ADD MY VIDEO
                            <span style="color:#ffff00"> 10 <img alt="coin" width="19" height="20" src="<?php echo base_url() ?>assets/themes/default/images/coin.png" /></span>
                        </a>
                    </div>
                    <?php if (isset($this->authority->user->user_id) && is_object($this->authority->user)) { ?>
                        <li class="uk-active" data-uk-dropdown>
                            <a href='#' class="uk-navbar-nav">
                                <img width="28" height="28" class="uk-border-circle" src="<?php echo display_image_path($this->authority->user->user_photo) ?>" width="28" title="<?php echo $this->authority->user->user_username ?>" />
                                <?php echo $this->authority->user->user_username ?>
                                <i class="uk-icon-caret-down"></i>
                            </a>

                            <div class="uk-dropdown uk-dropdown-navbar uk-margin-top-remove">
                                <ul class="uk-nav uk-nav-navbar">
                                    <li>
                                        <a href="<?php echo base_url() ?>users/profile/<?php echo $this->authority->user->user_username ?>">
                                            <i class="uk-icon-user"></i> Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('transactions') ?>">
                                            <i class="uk-icon-money"></i> Transactions
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('videos') ?>">
                                            <i class="uk-icon-youtube-play"></i> Videos
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo site_url('users/sign_out') ?>">
                                            <i class="uk-icon-power-off"></i>
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    <?php } else { ?>
                        <li class="uk-display-inline">
                            <a href="<?php echo site_url('users/login') ?>">
                                Login
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <?php $this->load->view('themes/' . $this->selected_theme . '/side-bar') ?>
        </div>
    </nav>

    <div class="uk-text-center uk-margin-top-remove" style="z-index: 5000!important; position: fixed">
        <?php
        $attributes = array(
            'method' => 'post',
            'class' => 'uk-form uk-hidden uk-panel-box uk-panel-box-secondary uk-width-1-1',
            'id' => 'search-form'
        );
        echo form_open('articles/search', $attributes) ?>
        <input class="uk-form-large uk-width-1-2" name="keyword" value="<?php echo $this->input->post('keyword') ?>" type="text" /><input type="submit" value="Search" class="uk-margin-remove uk-button uk-button-large" />
        <?php echo form_close(); ?>
    </div>
    <!--End-header-->
    <div class="uk-container uk-container-center uk-margin-large-bottom">
        <?php $this->load->view('themes/' . $this->selected_theme . '/flash_data') ?>