<?php include('../view/header.php'); ?>
<main>
    <h1>Create Incident</h1>

    <?php if ($result == 'unset') : ?>
        <form action="index.php" method="POST" id="aligned">
            <input type="hidden" name="action" value="create_incident" />
            <input type="hidden" name="customerID" value="<?php echo $customerID ?>" />

            <label>Customer:</label>
            <label><?php echo htmlspecialchars($customer_name); ?></label><br>

            <label>Product:</label>
            <select name="productCode">
                <?php foreach ($products as $product) : ?>
                    <option value="<?php echo htmlspecialchars($product->getCode()); ?>">
                        <?php echo htmlspecialchars($product->getName()); ?>
                    </option>
                <?php endforeach; ?>
            </select><br>

            <label>Title:</label>
            <input type="input" name="title"><br>

            <label>Description:</label>
            <textarea name="description" rows="10"></textarea><br>

            <label>&nbsp;</label>
            <input type="submit" value="Create Incident">
        </form>
    <?php elseif ($result == 'added') : ?>
        <p>This incident was added to our database.</p>
    <?php endif; ?>

</main>
<?php include('../view/footer.php') ?>