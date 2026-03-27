<?php if (option_get('recapatcha-api-key')) { ?>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
</script>
<?php } ?>
<?php echo link_tag('assets/themes/' . $this->selected_theme . '/' . UIKIT_VERSION . '/css/components/progress.almost-flat.min.css'); ?>

<?php
if ($this->authority->is_logged()) { ?>

    <?php
    $obj = new stdClass();
    $obj->ip = $this->authority->user->user_id;
    $obj->url = $article->ar_id;
    $this->db->where('url', $obj->url);
    $this->db->where('ip', $obj->ip);

    if ($this->db->count_all_results('analytics_views') == 0) { ?>
        <script>
            function awardVideoPoints() {
                $.get('<?php echo base_url() ?>articles/add_points_to_users/<?php echo $article->ar_id ?>', function(data) {
                    $('#main-coins').addClass('uk-animation-scale-up');
                    $('#main-coins').html(data);
                });

                $('#progress-bar')
                    .removeClass('uk-alert-danger')
                    .addClass('uk-alert-success')
                    .html('Congratulations You Have Earned <?php echo $this->option->get('earned-views-points') ?> coin');
                $('#main-coins').removeClass('uk-animation-scale-up');
            }
            var verifyCallback = function(response) {
                if (response) {
                    awardVideoPoints();
                    return;
                }
            };
            var onloadCallback = function() {
                videoTimer();
            };
            var count = 60;
            var counter = setInterval(videoTimer, 1000); //1000 will  run it every 1 second
            function videoTimer() {
                count = count - 1;

                if (count == 0) {
                    <?php if (option_get('recapatcha-api-key')) { ?>
                    grecaptcha.render('recaptcha-video', {
                        'sitekey': '<?php echo option_get('recapatcha-api-key') ?>',
                        'callback': verifyCallback,
                        'theme': 'dark'
                    });
                    <?php } else { ?>
                    awardVideoPoints();
                    <?php } ?>
                }
                if (count < 0) {
                    clearInterval(counter);
                    count = 0;
                    return;
                }

                document.getElementById("timer").innerHTML = count + " secs"; // watch for spelling
                //Do code for showing the number of seconds here
            }
        </script>
        <div id="progress-bar" class="uk-alert-large uk-alert-danger uk-text-bold">
            You will
            earn <?php echo $this->option->get('earned-views-points') ?> coin after
            <span id="timer"></span>
        </div>

    <?php } else { ?>
        <div id="progress-bar" class="uk-alert-large uk-alert-success uk-text-bold">
            You already viewed this video
        </div>
    <?php } ?>

<?php } else { ?>
    <div id="progress-bar" class="uk-alert-large uk-alert uk-text-bold">
        You have to click login to earn coins
    </div>
<?php } ?>
<div class="uk-text-center uk-margin-large-left">
    <?php if (option_get('recapatcha-api-key')) { ?>
    <div id="recaptcha-video" class="uk-margin-large-left"></div>
    <?php } ?>
</div>
<?php echo $article->ar_video ?>

<?php echo $this->option->get('ads-article') ?>
