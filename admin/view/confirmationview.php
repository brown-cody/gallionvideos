<?php include("../header.php"); ?>

    <h2>Confirmation</h2>
    <br>
    <h3>
        Are you sure you want to delete this
        <?php
            
            switch ($subaction) {
                case 'deleteyear':
                    echo "year?"; 
                    break;
                case 'deletevideo':
                    echo "video?";
                    break;
            }
        
        ?>
        
    </h3>
    <br>
    <h3 class="delete"><?php echo $year; ?></h3>
    <h3 class="delete"><?php echo $videoName; ?></h3>


    <form action="index.php" method="post">
        <input type="hidden" name="action" value="<?php echo $subaction; ?>">
        
        <input type="hidden" name="yearID" value="<?php echo $yearID; ?>">
    
        <input type="hidden" name="videoID" value="<?php echo $videoID; ?>">
        
        <button type="submit" class="mainButton delete">Yes, Delete</button>

    </form>

    <form action="index.php" method="post">
        <input type="hidden" name="action" value="adminview">
                
        <button type="submit" class="mainButton">Cancel</button>

    </form>   
    

        
<?php include("../footer.php"); ?>