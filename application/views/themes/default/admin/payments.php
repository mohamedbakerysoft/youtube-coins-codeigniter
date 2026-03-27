<br />
<div class="content">
    <div class="wrap uk-width-10-10">
        <div class="single-page uk-animation-fade">
            <div class="single-page-artical">
                <div class="artical-content">
                    <h2><i class="uk-icon-list"></i> Manage Payments</h2>
                    <hr class="uk-article-divider">
                    <table class="uk-table uk-table-hover uk-table-striped uk-table-condensed">
                        <thead>
                            <tr class="uk-text-bold">
                                <th>id</th>
                                <th>Username</th>
                                <th>amount</th>
                                <th>statement</th>
                                <th>status</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($payments as $row) { ?>
                                <tr id="<?php echo $row['id'] ?>">
                                    <td class="uk-text-middle"><?php echo $row['id'] ?></td>

                                    <td class="uk-text-middle"><?php echo $row['username'] ?></td>
                                    <td class="uk-text-middle"><?php echo $row['amount'] ?></td>
                                    <td class="uk-text-middle">
                                        <img class="uk-align-center" src="<?php echo display_image_path($row['statement']) ?>" alt="" />
                                    </td>
                                    <td class="uk-text-middle"><?php echo $row['status'] ?></td>
                                    <td class="uk-text-middle">
                                        <!-- if status is pending show the actions  -->
                                        <?php if ($row['status'] == 'pending') { ?>
                                            <a class="uk-button uk-button-success" href="<?php echo base_url('Payment/approve/' . $row['id']) ?>">Approve</a>
                                            <a class="uk-button uk-button-danger" href="<?php echo base_url('Payment/reject/' . $row['id']) ?>">Reject</a>
                                        <?php } ?>
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