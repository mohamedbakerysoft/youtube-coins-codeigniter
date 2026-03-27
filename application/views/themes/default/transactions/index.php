<?php if (isset($transactions) && !empty($transactions)) { ?>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Amount</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($transactions as $transaction) { ?>
                <tr>
                    <td><?php echo date("Y/m/d", strtotime($transaction->created_at)); ?></td>
                    <td><?php echo $transaction->amount; ?></td>
                    <td><?php echo $transaction->status; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } else { ?>
    <div class="center">
        <div class="warning-message">
            <p>No transactions found.</p>
        </div>
    </div>
<?php } ?>