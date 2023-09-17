<?php include('../view/header.php'); ?>
<main>
    <h1>Register Product</h1>
    <form action="index.php" method="POST" id="aligned">
        <input type="hidden" name="action" value="register_product" />
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

        <label>&nbsp;</label>
        <input type="submit" value="Register Product">
    </form>
</main>
<?php include('../view/footer.php') ?>