<?php include("header.php"); ?>

        <h2>Main Menu</h2>
        <br>
        <form action="index.php" method="post" class="searchForm">
            <input type="hidden" name="action" value="search">
            <input type="text" name="searchText" class="searchField">
            <button type="submit" class="searchButton"><img src="view/search.png" class="icon"></button>
        </form>
<br>

        <?php foreach($years as $year): ?>
            <form action="index.php" method="get">
                <input type="hidden" name="action" value="yearview">
                <input type="hidden" name="yearID" value="<?php echo $year['yearID'];?>">
                <button class="yearButton" type="submit"><?php echo $year['year'];?></button>
            </form>
        <?php endforeach; ?>


<?php include("footer.php"); ?>