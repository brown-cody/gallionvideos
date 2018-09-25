<?php include("header.php"); ?>

        <h2><?php echo $video['videoName']; ?></h2>
        <h3>
            <?php
                foreach($years as $year) {
                    if ($video['videoYear'] == $year['yearID']) {
                        echo '<a href="index.php?action=yearview&yearID='.$year['yearID'].'">';
                        echo $year['year'];
                        echo '</a>';
                    }
                }
            ?>
            
        </h3>
        
 

    <iframe class="video" src="https://www.youtube.com/embed/<?php echo $video['videoEmbed']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    
    <p class="description">
        Description:<br>
        <?php echo $video['videoDescription']; ?>
    </p>

    <p class="locationTag">
        Locations:<br>
        <?php echo $video['videoLocation']; ?>
    </p>

    <p class="personTag">
        People:<br>
        <?php echo $video['videoPersonTag']; ?>
    </p>
  
<?php include("videofooter.php"); ?>