<?php include('../view/header.php'); ?>
<main>
    <section>
        <h1>Technician List</h1>
        <table>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Password</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($technicians as $technician) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($technician->getFname()); ?></td>
                    <td><?php echo htmlspecialchars($technician->getLname()); ?></td>
                    <td><?php echo htmlspecialchars($technician->getEmail()); ?></td>
                    <td><?php echo htmlspecialchars($technician->getPhone()); ?></td>
                    <td><?php echo htmlspecialchars($technician->getPassword()); ?></td>
                    <td>
                        <form class="delete_technician" action="index.php" method="post">
                            <input type="hidden" name="action" value="delete_technician">
                            <input type="hidden" name="tech_ID" value="<?php echo $technician->getID(); ?>">
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p class="last_paragraph">
            <a href="index.php?action=show_add_technician">Add Technician</a>
        </p>
    </section>
</main>
<?php include('../view/footer.php') ?>