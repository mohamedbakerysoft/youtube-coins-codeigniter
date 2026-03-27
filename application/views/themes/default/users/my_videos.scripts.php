<script>
    var modal = UIkit.modal("#my-videos");

    function level_article_up(a) {

        $.get(a.href);

        $.get('<?php echo base_url() ?>articles/add_points_to_users/0', function(data) {
            $('#main-coins').addClass('uk-animation-scale-up');
            $('#main-coins').html(data);
        }).done(function() {
            $('#first-video').load('<?php echo base_url() ?>articles/load_first_video');
            modal.hide();
            UIkit.modal.alert("<i class='uk-icon-check uk-text-success uk-icon-medium'></i> <b>!Congratulations</b> :) Your video now selected as first one");
            $('#counter').timer('reset');
        }).fail(function() {
            alert("error , please try again later");
        }).always(function() {

        });
        return false;
    }
</script>