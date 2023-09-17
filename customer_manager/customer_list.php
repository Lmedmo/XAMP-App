<?php include('../view/header.php'); ?>
<main>
    <section>
        <h1>Customer Search</h1>
        <?php include('../view/search.php'); ?>

        <h1>Results</h1>
        <table class="last_paragraph">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>City</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($customers as $customer) : ?>
                <tr>
                    <td>
                        <?php
                        $first = htmlspecialchars($customer->getFname());
                        $last = htmlspecialchars($customer->getLname());
                        echo "{$first} {$last}";
                        ?>
                    </td>
                    <td><?php echo htmlspecialchars($customer->getEmail()); ?></td>
                    <td><?php echo htmlspecialchars($customer->getCity()); ?></td>
                    <td>
                        <form class="edit_customer" action="index.php" method="post">
                            <input type="hidden" name="action" value="edit_customer">
                            <input type="hidden" name="customer_ID" value="<?php echo $customer->getID(); ?>">
                            <input type="submit" value="Select">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
</main>
<?php include('../view/footer.php') ?>