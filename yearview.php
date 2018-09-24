<?php include("header.php"); ?>

    <h2>
        <?php
            foreach($years as $year) {
                if ($yearID == $year['yearID']) {
                    echo $year['year'];
                }
            }
        ?>
    </h2>

    
    
    <?php foreach($videos as $video): ?>
        <form action="index.php" method="get">
            <input type="hidden" name="action" value="videoview">
            <input type="hidden" name="videoID" value="<?php echo $video['videoID'];?>">
            <button class="videoButton" type="submit"><?php echo $video['videoName'];?></button>
        </form>
    <?php endforeach; ?>
  
<?php include("yearfooter.php"); ?>