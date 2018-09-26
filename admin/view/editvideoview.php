<?php include("../header.php"); ?>

    <h2>Edit Video</h2>
    
    <div class="formContainer">
        <form action="index.php" method="post" class="mainForm">
            <input type="hidden" name="action" value="saveeditvideo">

            <input type="hidden" name="videoID" value="<?php echo $video['videoID']; ?>">

            <label for="videoName" class="formLabel">Video Name:</label>
            <input type="text" id="videoName" name="videoName" class="formInput" value="<?php echo $video['videoName']; ?>" required>
            <br>

            <label for="videoYear" class="formLabel">Year</label>
            <select id="videoYear" name="videoYear" class="formInput">
                <?php foreach($years as $year): ?>
                    <option value="<?php echo $year['yearID']; ?>"  <?php if ($video['videoYear'] == $year['yearID']) {echo 'selected';} ?>>
                        <?php echo $year['year']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>

            <label for="videoEmbed" class="formLabel">Embed Code:</label>
            <input type="text" id="videoEmbed" name="videoEmbed" class="formInput" value="<?php echo $video['videoEmbed']; ?>" required>
            <br>   
            
            <label for="videoLocation" class="formLabel">Location:</label>
            <input type="text" id="videoLocation" name="videoLocation" class="formInput" value="<?php echo $video['videoLocation']; ?>" required>
            <br>        

            <label for="videoPersonTag" class="formLabel">People:</label>
            
            <input type="text" id="videoPersonTag" name="videoPersonTag" class="formInput" value="<?php echo $video['videoPersonTag']; ?>" required>
            
            
            
            
            <br>

            <label for="videoDescription" class="formLabel">Description:</label>
            <textarea rows="10" cols="30" id="videoDescription" name="videoDescription" class="formInput submitButtonSpace" required><?php echo str_replace("<br>", "\r",$video['videoDescription']); ?></textarea>
            <br>

            <button type="submit" class="mainButton submitButton">Submit</button>
        </form>

        <form action="index.php" method="post">
            <input type="hidden" name="action" value="adminview">

            <button type="submit" class="mainButton">Cancel</button>

        </form>





        <form action="index.php" method="post">
            <input type="hidden" name="action" value="confirmation">

            <input type="hidden" name="subaction" value="deletevideo">

            <input type="hidden" name="videoID" value="<?php echo $video['videoID']; ?>">

            <input type="hidden" name="videoName" value="<?php echo $video['videoName']; ?>">

            <button type="submit" class="mainButton delete">Delete Video</button>

        </form>
    </div>
<?php include("../footer.php"); ?>