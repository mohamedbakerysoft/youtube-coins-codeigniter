<div class="uk-grid uk-margin-top">
    <div class="uk-text-center uk-width-1-1">
        <h1 class="main-font-family">Rocket your Videos all over the World!</h1>
        <h2 class="main-font-family">Put your Video in <b>Level UP</b> and cross your Fingers<br>that it stays there as long as Possible!</h2>
        <?php if (!is_object($this->authority->user)) { ?>
            <div>
                <a class="uk-button-primary uk-button uk-button-large uk-text-bold" href="<?php echo base_url() ?>users/sign_up">
                    <b>I Sign Up</b>+20
                    <img alt="coin" width="19" height="20" src="<?php echo base_url() ?>assets/themes/default/images/coin.png" />
                    for Free
                </a>
            </div><br />
        <?php } ?>
        <?php echo $this->option->get('ads-header') ?>
    </div>
</div>
<br />
<div class="uk-grid uk-grid-collapse uk-margin-top-remove">
    <div class="uk-width-large-7-10 uk-width-medium-1-2 uk-width-small-1-1">
        <div class="uk-button-dropdown" data-uk-dropdown="">
            <a href="#" class="uk-button uk-button-primary uk-text-secondary">
                <i class="uk-icon-language"></i>
                Videos in
                <b><?php echo $this->session->userdata('category_name') ?></b>
                <i class="uk-icon-caret-down"></i>
            </a>
            <div class="uk-dropdown uk-dropdown-width-2">
                <div class="uk-grid uk-dropdown-grid">
                    <div class="uk-width-1-2">
                        <ul class="uk-nav uk-nav-dropdown uk-panel">
                            <li class="uk-text-secondary">
                                <a href="<?php echo base_url() ?>category/0">
                                    <i class="uk-icon-list"></i>
                                    All Language
                                </a>
                            </li>
                            <?php global $i;
                            $i = 1;
                            foreach ($categories as $row) {
                                if ($i <= 10) {
                            ?>
                                    <li>
                                        <a href="<?php echo site_url('category/' . $row->category_id) ?>">
                                            <?php echo $row->category_name ?>
                                        </a>
                                    </li>
                            <?php }
                                $i++;
                            } ?>
                        </ul>
                    </div>
                    <div class="uk-width-1-2">
                        <ul class="uk-nav uk-nav-dropdown uk-panel">
                            <?php $i = 1;
                            foreach ($categories as $row) {
                                if ($i > 10) {
                            ?>
                                    <li>
                                        <a href="<?php echo site_url('category/' . $row->category_id) ?>">
                                            <?php echo $row->category_name ?>
                                        </a>
                                    </li>
                                <?php }
                                $i++; ?>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div id="first-video" class="first_video">
            <?php $this->load->view('themes/default/site/first_video') ?>
        </div>
    </div>
    <div class="uk-width-large-3-10 uk-width-medium-1-2 uk-width-small-1-1">
        <div class="uk-text-right">
            <a href="<?php echo base_url('HowItWorks/index') ?>" class="uk-button uk-button-small">
                <i class="uk-icon-arrow-circle-o-left"></i>
                How It Works
            </a>
        </div>
        <div class="v1_more replace_animation uk-text-center">
            <div class="v1_more_title">Last Level UP</div>
            <p class="uk-margin-bottom-remove uk-text-small">Since</p>
            <h1 id="counter" class="uk-text-bold uk-margin-top-remove"></h1>
            <a href="#" data-uk-modal="{target:'#my-videos',center:true}" class="uk-button uk-button-danger uk-text-bold">
                LEVEL UP MY VIDEO
                <span class="yellow-coin"> 10
                    <img alt="coin" width="19" height="20" src="<?php echo base_url() ?>assets/themes/default/images/coin.png" />
                </span>
            </a>
            <br />
            <div class="v1_more_bt_txt replace_animation uk-hidden-small">
                <img alt="arrow up" class="v1_more_bt_txt_arrow2" src="<?php echo base_url() ?>assets/themes/default/images/arrow2.png">
                <img alt="arrow left" class="v1_more_bt_txt_arrow1" src="<?php echo base_url() ?>assets/themes/default/images/arrow1.png">
                Replace this Video<br>by Yours!
            </div>
            <br />
        </div>
    </div>
</div>
<br />
<div class="uk-grid uk-margin-top-remove" data-uk-grid="{gutter:10}">
    <?php $site->list_articles() ?>
</div>

<div class="uk-modal" id="play">
    <br />
    <br />
    <br />

    <div class="uk-modal-dialog uk-modal-dialog-lightbox uk-margin-large-top bg-black" id="current-play"></div>
</div>

<div class="uk-modal" id="my-videos">
    <br />
    <br />

    <div class="uk-modal-dialog uk-modal-dialog-large uk-margin-large-top">
        <h2 class="uk-modal-header"><i class="uk-icon-youtube-play"></i> My videos</h2>
        <?php $this->load->view('themes/default/users/my_videos') ?>
    </div>
</div>

<?php include_once('application/views/themes/default/site/index.scripts.php'); ?>