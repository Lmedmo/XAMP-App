<form action="index.php" method="POST">
    <label><?php echo $searchBy; ?></label>
    <input type="hidden" name="action" value="show_results">
    <input type="search" name="keyword" placeholder="<?php echo $keyword; ?>">
    <input type="submit" value="<?php echo $buttonTxt; ?>"><br>
</form>