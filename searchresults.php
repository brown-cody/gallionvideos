<?php include("header.php"); ?>

    <h2>Search Results</h2>
    
    <?php if($searchName != null){echo '<br><h3>Videos</h3>';}?>
    <?php foreach ($searchName as $video): ?>
        <form action="index.php" method="get">
            <input type="hidden" name="action" value="videoview">
            <input type="hidden" name="videoID" value="<?php echo $video['videoID'];?>">
            <button class="videoButton" type="submit"><?php echo $video['videoName'];?></button>
        </form>
    <?php endforeach; ?>
    
    <?php if($searchPeople != null){echo '<br><h3>People</h3>';}?>
    <?php foreach ($searchPeople as $video): ?>
        <form action="index.php" method="get">
            <input type="hidden" name="action" value="videoview">
            <input type="hidden" name="videoID" value="<?php echo $video['videoID'];?>">
            <button class="videoButton" type="submit"><?php echo $video['videoName'];?></button>
        </form>



    <?php endforeach; ?>
    
    <?php if($searchDescription != null){echo '<br><h3>Description</h3>';}?>
    <?php foreach ($searchDescription as $video): ?>
        <form action="index.php" method="get">
            <input type="hidden" name="action" value="videoview">
            <input type="hidden" name="videoID" value="<?php echo $video['videoID'];?>">
            <button class="videoButton" type="submit"><?php echo $video['videoName'];?></button>
        </form>

        
    <?php endforeach; ?>
    
    <?php if($searchLocation != null){echo '<br><h3>Location</h3>';}?>
    <?php foreach ($searchLocation as $video): ?>
        <form action="index.php" method="get">
            <input type="hidden" name="action" value="contributorview">
            <input type="hidden" name="videoLocation" value="<?php echo $video['videoLocation'];?>">
            <button class="videoButton" type="submit"><?php echo $video['videoLocation'];?></button>
        </form>
        
    <?php endforeach; ?>

    <?php if($searchName == null && $searchPeople == null && $searchDescription == null && $searchLocation == null) {
        echo '<br><h3>No Results</h3>';
    } ?>

<?php include("footer.php"); ?>