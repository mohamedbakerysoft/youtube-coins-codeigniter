<?php

if (count(@$articles) > 0) {

    foreach ($articles as $row) {
        $exists = fileExists($row->ar_main_thumb);
        if ($exists && $row->ar_title && $row->ar_tags) {
?>
            <div class="uk-width-large-1-4 uk-width-small-1-2 uk-width-medium-1-3 ">
                <strong class="vignette_pos"><?php echo $row->ar_ord ?></strong>
                <?php if ($row->ar_id == @$row->url) { ?>
                    <div class="viewed">Viewed</div>
                <?php } ?>

                <?php if ($row->ar_tags == 'vimeo') { ?>
                    <div class="deja_vu_txt">
                        <i class="uk-icon-vimeo-square uk-icon-large"></i>
                    </div>
                <?php } ?>
                <?php if ($row->ar_tags == 'youtube') { ?>
                    <div class="deja_vu_txt">
                        <i class="uk-icon-youtube uk-icon-large"></i>
                    </div>
                <?php } ?>
                <?php if ($row->ar_tags == 'dailymotion') { ?>
                    <div class="deja_vu_txt ">
                        Daily Motion
                    </div>
                <?php } ?>
                <?php if ($row->ar_tags == 'image') { ?>
                    <div class="deja_vu_txt">
                        <i class="uk-icon-image uk-icon-large"></i>
                    </div>
                <?php } ?>
                <a href="#" data-uk-modal="{target:'#play'}" onclick="start_play(this)" id="<?php echo $row->ar_id ?>">
                    <figure class="uk-overlay uk-overlay-hover">
                        <img width="275" height="206" class="uk-overlay-spin <?php echo ($row->ar_id == @$row->url) ? 'uk-overlay-fade' : '' ?>" src="<?php echo $row->ar_main_thumb ?>" alt="<?php echo $row->ar_title ?>" />
                        <figcaption class="uk-overlay-panel uk-ignore uk-overlay-background uk-overlay-bottom">
                            <p><?php echo $this->option->get('infront-article-message') ?><?php echo $row->ar_title ?></p>
                        </figcaption>
                    </figure>
                </a>
            </div>
<?php
        }
    }
} ?>