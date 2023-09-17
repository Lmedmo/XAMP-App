<?php include('../view/header.php'); ?>
<main>
    <section>
        <h1>Add Technician</h1>
        <form action="index.php" method="POST" id="aligned">
            <input type="hidden" name="action" value="add_technician" />
            <label>First Name:</label>
            <input type="input" name="fname"><br>
            <label>Last Name:</label>
            <input type="input" name="lname"><br>
            <label>Email:</label>
            <input type="input" name="email"><br>
            <label>Phone:</label>
            <input type="input" name="phone"><br>
            <label>Password:</label>
            <input type="input" name="password"><br>
            <label>&nbsp;</label>
            <input type="submit" value="Add Technician"><br>
        </form>
        <p class="last_paragraph">
            <a href="index.php?action=technician_list_page">View Technician List</a>
        </p>
    </section>
</main>
<?php include('../view/footer.php') ?>