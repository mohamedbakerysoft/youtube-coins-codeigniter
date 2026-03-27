<?php if (isset($videos) && !empty($videos)) { ?>
    <table class="styled-table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Thumbnail</th>
                <th>Title</th>
                <th width="120px">Info</th>
                <th width="auto">Action</th>
                <th width="250px">Level UP</th>
            </tr>
        </thead>


        <tbody>
            <?php foreach ($videos as $video) { ?>
                <tr>
                    <td><?php echo $video->ar_id; ?></td>
                    <td><img class="thumb-img" src="<?php echo $video->ar_main_thumb; ?>" alt="<?php echo $video->ar_title; ?>"></td>
                    <td><?php echo $video->ar_title; ?></td>
                    <td>Cost: 2 Coins <br>Views : <?php echo $video->ar_views_counter; ?> <br> Remaining: <?php echo $video->first_balance / 2 - $video->ar_views_counter; ?> <br> Balance: <?php echo $video->current_balance; ?></td>
                    <td class="uk-flex">
                        <form method="POST" action="<?php echo base_url('Articles/un_active_video'); ?>">
                            <input type="hidden" name="article_id" value="<?php echo $video->ar_id; ?>">
                            <button type="submit" class="uk-button uk-margin-left" <?php if ($video->ar_active == 0) echo ('disabled') ?>> <i class="uk-icon-stop"></i></button>
                        </form>
                        <form method="POST" action="<?php echo base_url('Articles/active_video'); ?>">
                            <input type="hidden" name="article_id" value="<?php echo $video->ar_id; ?>">
                            <button type="submit" class="uk-button" <?php if ($video->ar_active == 1) echo ('disabled') ?>> <i class="uk-icon-play"></i></button>
                        </form>
                        <form method="POST" action="<?php echo base_url('Articles/delete_video'); ?>">
                            <input type="hidden" name="article_id" value="<?php echo $video->ar_id; ?>">
                            <button type="submit" class="uk-button uk-button-danger uk-margin-left"> Delete</button>
                        </form>
                    </td>
                    <td>
                        <button data-uk-toggle="{target:'#top-up-form-<?php echo $video->ar_id; ?>'} " type="button" class="uk-button uk-button-primary">Top Up</button>
                        <form style="display:flex;" method="POST" action="<?php echo base_url('Articles/level_up_video'); ?>" id="top-up-form-<?php echo $video->ar_id; ?>" class="uk-hidden uk-margin">
                            <input type="number" name="amount">
                            <input type="hidden" name="article_id" value="<?php echo $video->ar_id; ?>">
                            <button type="submit" class="uk-button uk-button-success uk-margin-left"> Top UP</button>
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>


    </table>

    <div class="pagination">
        <?php echo $this->pagination->create_links(); ?>
    </div>
<?php } else { ?>
    <div class="center">
        <div class="warning-message">
            <p>No videos found.</p>
        </div>
    </div>
<?php } ?>