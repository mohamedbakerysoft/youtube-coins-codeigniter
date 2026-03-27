<br />
<div class="content">
    <div class="wrap uk-width-7-10">
        <div class="single-page uk-animation-fade">
            <div class="single-page-artical">
                <div class="artical-content">
                    <h2><i class="uk-icon-comments"></i> Manage Answer's</h2>
                    <hr class="uk-article-divider">
                    <table class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
                        <thead>
                            <tr class="uk-text-bold">
                                <th><i class="uk-icon-user"></i> Username</th>
                                <th><i class="uk-icon-edit"></i> Question</th>
                                <th><i class="uk-icon-comments"></i> Answer</th>
                                <th><i class="uk-icon-calendar"></i> since</th>
                                <th><i class="uk-icon-cog"></i> Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($comments as $row) { ?>
                                <tr id="<?php echo $row->user_id ?>">
                                    <td class="uk-text-middl width-15">
                                        <small><?php echo $row->user_username ?></small>
                                    </td>
                                    <td class="uk-text-middle width-18">
                                        <small><a href="<?php echo site_url('articles/' . $row->ar_slug . '#comment-' . $row->comment_id) ?>" target="_blank"><i class="uk-icon-external-link"></i> <?php echo $row->ar_title ?></a>
                                        </small>
                                    </td>
                                    <td class="uk-text-middle uk-text-success width-35">
                                        <small><?php echo $row->comment_content ?></small>
                                    </td>
                                    <td class="uk-text-middle width-15"><?php echo time_elapsed_string($row->comment_created_date) ?></td>
                                    <td class="uk-text-middle">
                                        <a href="<?php echo site_url('admin/delete_comment/' . $row->comment_id) ?>" class="uk-button uk-button-danger"><i class="uk-icon-trash"></i> Delete</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>