<br/>
<div class="content">
    <div class="wrap uk-width-7-10">
        <div class="single-page uk-animation-fade">
            <div class="single-page-artical">
                <div class="artical-content">
                    <h2><i class="uk-icon-list"></i> Manage Languages</h2>
                    <hr class="uk-article-divider">
                    <a href="<?php echo site_url('admin/add_category') ?>" class="uk-button uk-button-success"><i
                            class="uk-icon-plus"></i> Add new Language</a>
                    <table class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
                        <thead>
                        <tr class="uk-text-bold">
                            <th>Language name</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($categories as $row) { ?>
                            <tr>
                                <td><?php echo $row->category_name ?></td>
                                <td>
                                    <a href="<?php echo base_url() . 'admin/edit_category/' . $row->category_id ?>"
                                       class="uk-button uk-button-primary"><i class="uk-icon-edit"></i> Edit</a>
                                    <a href="<?php echo site_url('admin/delete_category/' . $row->category_id) ?>"
                                       class="uk-button uk-button-danger"><i class="uk-icon-trash"></i> Delete</a>
                                    <a id="<?php echo $row->category_id ?>"
                                       href="<?php echo base_url() . 'admin/active_category/' . $row->category_id ?>"
                                       class="uk-button <?php echo ($row->category_active) ? 'uk-button-success' : '' ?>"><i
                                            class="uk-icon-<?php echo ($row->category_active) ? 'plus-circle' : 'minus-circle' ?>"></i>
                                        <?php echo ($row->category_active) ? 'Set Inactive' : 'Set Active' ?>
                                    </a>
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