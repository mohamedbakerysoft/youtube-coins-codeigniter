<script type="application/javascript">
    $('.start-play').click(function() {
        $('#play').on({
            'hide.uk.modal': function() {
                clearInterval(counter);
                $('#current-play').html('');
                $('#first-video').load('<?php echo base_url() ?>articles/load_first_video');
            }
        });
    });
</script>