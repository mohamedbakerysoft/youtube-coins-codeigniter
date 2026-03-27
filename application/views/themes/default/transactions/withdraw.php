<form class="uk-form uk-form-stacked uk-align-center" method="post" action="<?php echo base_url('Payment/save_payment'); ?>" enctype="multipart/form-data" accept-charset="utf-8">
    <h3 class="uk-form-label uk-margin-bottom uk-margin-top">Bank Information:</h3>

    <?php if (!empty($bank_info)) : ?>
        <!-- fetch with headers and text all the bank info with uk style class centered in the screen -->
        <table class="uk-table uk-table-striped uk-table-hover uk-table-middle uk-table-divider">
            <thead>
                <tr>
                    <th class="uk-text-center">Bank Name</th>
                    <th class="uk-text-center">Account Number</th>
                    <th class="uk-text-center">Routing Number</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="uk-text-center"><?php echo $bank_info['bank_name']; ?></td>
                    <td class="uk-text-center"><?php echo $bank_info['account_number']; ?></td>
                    <td class="uk-text-center"><?php echo $bank_info['routing_number']; ?></td>
                </tr>
            </tbody>
        </table>
    <?php endif; ?>

    <h3 class="uk-form-label uk-margin-bottom uk-margin-top">Wire transfer:</h3>

    <div class="uk-form-controls">
        <label class="uk-form-label">Amount:</label>
        <input class="uk-width-1-2 uk-form-large uk-margin-bottom" type="number" name="amount" placeholder="Statement Amount" value="">
    </div>
    <div class="uk-form-controls">
        <label class="uk-form-label">Upload Statement:</label>
        <div class="uk-form-controls">
            <input type="file" name="statement" id="statement">
        </div>
    </div>
    <div class="uk-form-controls uk-margin-bottom uk-margin-top">
        <button class="uk-button uk-button-large uk-button-success">Send Wire Transfer Payment</button>
    </div>
    <br />
</form>