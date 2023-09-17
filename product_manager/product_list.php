<?php include('../view/header.php'); ?>
<main>
    <section>
        <h1>Product List</h1>
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Version</th>
                <th>Release Date</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($product->getCode()); ?></td>
                    <td><?php echo htmlspecialchars($product->getName()); ?></td>
                    <td><?php echo htmlspecialchars($product->getVersion()); ?></td>
                    <td><?php echo htmlspecialchars($product->getReleaseDate()); ?></td>
                    <td>
                        <form class="delete_product" action="index.php" method="post">
                            <input type="hidden" name="action" value="delete_product">
                            <input type="hidden" name="product_code" value="<?php echo $product->getCode(); ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p class="last_paragraph">
            <a href="index.php?action=show_add_product">Add Product</a>
        </p>
    </section>
</main>
<?php include('../view/footer.php') ?>