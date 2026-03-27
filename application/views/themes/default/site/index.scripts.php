<script type="application/javascript">
    function start_play(a) {
        $('#current-play').load('<?php echo site_url('articles') ?>/' + a.id);
        $('#play').on({
            'hide.uk.modal': function() {
                clearInterval(counter);
                $('#current-play').html('');
                $('#first-video').load('<?php echo base_url() ?>articles/load_first_video');
            }
        });
    };

    var load_first = setInterval(load_first, 30000); //60,000 milliseconds

    function load_first() {
        $('#first-video').load('<?php echo base_url() ?>articles/load_first_video');
    }

    $('#counter').timer({
        <?php
        if ($this->option->get('main-seconds-count-up') != 0) {
            echo 'seconds: ' . ($this->option->get('main-seconds-count-up') + (time() - $this->option->get('last-seconds-count-up')));
        } else {
        ?>
            seconds: 0 //Specify start time in seconds
        <?php } ?>,
        duration: '5s',
        callback: function() {
            // increment seconds by 30
            $.get('<?php echo site_url('site/add_seconds') ?>/' + $('#counter').data('seconds') + '/<?php echo $first_video->ar_id ?>');
        },
        repeat: true //repeatedly call the callback
    });
    // to stop the counter
</script>