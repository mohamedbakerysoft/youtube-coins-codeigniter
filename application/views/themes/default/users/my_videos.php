<?php

/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 4/15/2015
 * Time: 1:42 PM
 */
if (is_object($this->authority->user)) {
    $query = "SELECT * FROM articles";
    $query .= " JOIN users ON articles.ar_user_id = users.user_id ";
    $query .= " WHERE ar_user_id = '" . @$this->authority->user->user_id . "'";
    $query .= " ORDER BY ar_created_date DESC";
    $articles = $this->db->query($query)->result();
?>
    <div class="uk-grid uk-overflow-container">
        <?php
        if (count($articles) > 0) {
            foreach ($articles as $row) { ?>
                <div class="uk-width-large-1-5 uk-width-medium-1-3 uk-width-small-1-2">
                    <figure class="uk-overlay uk-overlay-hover">
                        <img class="uk-overlay-scale" src="<?php echo $row->ar_main_thumb ?>" alt="<?php echo $row->ar_title ?>" />
                        <figcaption class="uk-overlay-panel uk-ignore uk-overlay-background uk-overlay-bottom">
                            <p><?php echo $row->ar_title ?></p>
                        </figcaption>
                    </figure>
                    <a onclick="level_article_up(this); return false;" href="<?php echo base_url() ?>articles/level_article_up/<?php echo $row->ar_id ?>" class="uk-button uk-button-success uk-width-1-1 uk-text-center">
                        Level up this video
                    </a>

                </div>
            <?php
            }
        } else { ?>
            <div class="uk-text-center">
                <a class="uk-button uk-text-bold uk-button-danger" href="<?php echo base_url() ?>articles/create">
                    <i class="uk-icon-youtube-play uk-icon-medium uk-margin-right"></i>
                    ADD MY VIDEO
                    <span class="yellow-coin"> 10
                        <img alt="coin" width="19" height="20" src="<?php echo base_url() ?>assets/themes/default/images/coin.png" />
                    </span>
                </a>
            </div>

        <?php } ?>
    </div>

    <?php include_once('application/views/themes/default/users/my_videos.scripts.php') ?>

<?php } else { ?>
    <br />
    <div class="uk-panel-box uk-margin-left uk-margin-large-right uk-align-center">
        <span class="ccm_step_titre">I Sign Up <b>+20 C for Free</b></span>

        <p>Sign Up takes less than 15 seconds with Google Connect.</p>
        <a href="<?php echo site_url('users/login') ?>">
            <img src="<?php echo base_url(); ?>assets/themes/default/images/oauth-google.png" alt="" />
        </a>
    </div>
<?php } ?>