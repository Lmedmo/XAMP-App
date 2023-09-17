<?php include('../view/header.php'); ?>
<main>
    <section>
        <h1>Add Product</h1>
        <form action="index.php" method="POST" id="aligned">
            <input type="hidden" name="action" value="add_product" />
            <label>Code:</label>
            <input type="input" name="code"><br>
            <label>Name:</label>
            <input type="input" name="name"><br>
            <label>Version:</label>
            <input type="input" name="version"><br>
            <label>Release Date:</label>
            <input type="input" name="date">
            <label style="white-space: nowrap;">&nbsp;Use 'yyyy-mm-dd' format</label><br>
            <label>&nbsp;</label>
            <input type="submit" value="Add Product"><br>
        </form>
        <p class="last_paragraph">
            <a href="index.php?action=product_list_page">View Product List</a>
        </p>
    </section>
</main>
<?php include('../view/footer.php') ?>