<div class="uk-grid uk-margin-top" data-uk-grid-margin>
    <div class="uk-width-medium-3-4">
<h1>Questions Likes By: <a
        href="<?php echo site_url('users/profile/' . $user->user_username) ?>"><?php echo $user->user_username ?></a>
</h1>
<article class="uk-article">
    <div id="main" role="main">
        <?php
        $n = 0;
        foreach ($articles as $row) {
            $n++;
            ?>
            <dl class="uk-description-list-line uk-panel-box <?php echo ($row->ar_answered == 1) ? 'uk-alert-success' : 'uk-alert' ?>">
                <dt>
                    <a href="<?php echo base_url() ?>users/profile/<?php echo $row->user_username ?>">
                    <span class="uk-comment-avatar">
                    <img
                        src="<?php echo display_image_path($row->user_photo) ?>"
                        width="40"
                        title="<?php echo $row->user_username ?>"/>
                        <br/>
                        <div class="uk-text-success uk-text-center uk-text-bold"><?php echo $row->points ?><br/> point</div>
                    </span>

                        <?php echo $row->user_username ?>
                    </a>

                <div class="uk-float-right">
                    <?php if ($row->ar_answered == 1) { ?>
                        <span class=" uk-badge uk-badge-success">
                        <i class="<?php echo ($row->ar_answered == 1) ? 'uk-icon-check' : '' ?>"></i>
                        Answered
                    </span>
                    <?php } ?>
                    <span class="uk-text-success uk-margin-left">
                <i class="uk-icon-credit-card"></i> <?php echo $site->count_comments($row->ar_id) ?>
                        Answer
                </span>
                <span class="uk-margin-left uk-text-danger">
                <i class="uk-icon-thumbs-o-up"></i> <?php echo $site->count_likes($row->ar_id) ?>
                </span>
                <span class="uk-text-warning uk-margin-left"><i
                        class="uk-icon-eye"></i> <?php echo $site->count_views($row->ar_id) ?>
                    Views
                </span>
                    <small class="uk-margin-left uk-text-muted">
                        Since:
                        <?php echo time_elapsed_string($row->ar_created_date) ?>
                    </small>
                </div>
                </dt>
                <dt>
                    <a class="uk-h2" href="<?php echo site_url('articles/' . $row->ar_slug) ?>">
                        <?php echo $row->ar_title ?>
                    </a>
                </dt>
                <dd class="uk-margin-large-left">
                    <?php echo substr(strip_tags($row->ar_introduction), 0, 100) ?>
                    <a class=" uk-button uk-button-success uk-float-right"
                       href="<?php echo site_url('articles/' . $row->ar_slug) ?>">
                        Read more
                    </a><br/><br/>
                </dd>
                <dd class="uk-margin-large-left">
                    <i class="uk-icon-tags"></i> Tags
                    <?php
                    $tags = explode(',', $row->ar_tags) ?>
                    <?php foreach ($tags as $row) { ?>
                        <a class="uk-badge-danger uk-badge" href="<?php echo base_url() ?>site/tags/<?php echo $row ?>">
                            <?php echo $row ?>
                        </a>
                    <?php } ?>
                </dd>
            </dl>
            <?php $i++;
        }
        ?>
    </div>
</article>
</div>

<div class="uk-width-medium-1-4">
    <?php $this->load->view('user/template/' . $this->selected_theme . '/right-column') ?>
</div>
</div>