<?php

/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 4/15/2015
 * Time: 6:14 AM
 */

$first_video = $this->db->query("SELECT ar_title,ar_tags,ar_id,ar_main_thumb FROM articles WHERE ar_first = '1' AND ar_active = '1'")->row();
if (is_object($first_video)) { ?>
    <input type="hidden" id="first-video-count-up" />
    <figure class="uk-overlay uk-overlay-hover">
        <?php if ($first_video->ar_tags == 'vimeo') { ?>
            <div class="deja_vu_txt">
                <i class="uk-icon-vimeo-square uk-icon-large"></i>
            </div>
        <?php } ?>
        <?php if ($first_video->ar_tags == 'youtube') { ?>
            <div class="deja_vu_txt">
                <i class="uk-icon-youtube uk-icon-large"></i>
            </div>
        <?php } ?>
        <?php if ($first_video->ar_tags == 'dailymotion') { ?>
            <div class="deja_vu_txt ">
                Daily Motion
            </div>
        <?php } ?>
        <?php if ($first_video->ar_tags == 'image') { ?>
            <div class="deja_vu_txt">
                <i class="uk-icon-image uk-icon-large"></i>
            </div>
        <?php } ?>
        <a href="#" data-uk-modal="{target:'#play'}" class="start-play" id="<?php echo $first_video->ar_id ?>">
            <div class="uk-overlay uk-overlay-hover uk-cover-background main-thumb" style="background-image: url('<?php echo $first_video->ar_main_thumb ?>');">
                <strong class="first-video-vignette">1</strong>
                <div class="text-white uk-heading-large uk-text-center uk-margin-large-top opacity-7">
                    <div class="uk-icon-play-circle-o uk-icon-large"></div>
                </div>
                <div class="uk-height-1-1 text-white uk-h2 uk-margin-top first-video">
                    <?php echo $this->option->get('infront-article-message') ?> <?php echo $first_video->ar_title ?>
                </div>
            </div>
        </a>
    </figure>
<?php } ?>
<script type="application/javascript">
    $('.start-play').click(function() {
        $('#current-play').load('<?php echo site_url('articles') ?>/' + this.id);
        $('#play').on({
            'hide.uk.modal': function() {
                clearInterval(counter);
                $('#current-play').html('');
                $('#first-video').load('<?php echo base_url() ?>articles/load_first_video');
            }
        });
    });
</script>

<?php include_once 'application/views/themes/default/site/first_video.scripts.php'; ?>