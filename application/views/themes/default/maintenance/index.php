<!doctype html>
<html>

<head>

    <title>Site Maintenance</title>
    <?php echo link_tag('assets/themes/custom/css/maintenance.css'); ?>

</head>

<article>
    <div style="text-align: center">
        <img src="<?php echo option_get('site-logo') ?>" alt="<?php echo option_get('website-name') ?>">

        <h1>We&rsquo;ll be back soon!</h1>

        <div>
            <p>Sorry for the inconvenience but we&rsquo;re performing some maintenance at the moment. If you need to you
                can always <a href="mailto:<?php echo option_get('website-email') ?>">contact us</a>, otherwise we&rsquo;ll
                be back online shortly!</p>

            <p>&mdash; The Team</p>
        </div>
    </div>
</article>

</html>