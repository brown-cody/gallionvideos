<?php include("../header.php"); ?>

    <h2>Admin Console</h2>
    <h3 class="error"><?php if(isset($error)) echo $error; ?></h3>
    <h3><?php if(isset($success)) echo $success; ?></h3>
    <form action="index.php" method="post">
        <input type="hidden" name="action" value="addyear">
        <button type="submit" class="mainButton">Add Year</button>
    </form>
    
    <table class="yearTable">

        <?php foreach($years as $year): ?>
            <?php echo "<tr><td>"; ?>
            <form action="index.php" method="post">
                <input type="hidden" name="action" value="edityear">
                <input type="hidden" name="yearID" value="<?php echo $year['yearID'];?>">
                <button type="submit" class="editButton">Edit</button>
            </form>
            <?php echo "</td><td>"; ?>
            <?php echo '<a href="..\index.php?action=yearview&yearID='.$year['yearID'].'">'; ?>
            <?php echo $year['year']; ?>
            <?php echo '</a>'; ?>
            <?php echo "</td></tr>"; ?>
            
        <?php endforeach; ?>
    </table>

    <hr>

    <form action="index.php" method="post">
        <input type="hidden" name="action" value="addvideo">
        <button type="submit" class="mainButton">Add Video</button>
    </form>
    <h4>To add or change an image, click on the thumbnail, select the image, then click on the UP arrow.</h4>
    <br>

    <table class="videoTable">
        <tr id="headerRow">
            <th></th>
            <th><a href="index.php?subaction=videosort" class="sortHeading">Video</a></th>
            <th><a href="index.php?subaction=yearsort" class="sortHeading">Year</a></th>
            <th class="hideLocation"><a href="index.php?subaction=locationsort" class="sortHeading">Location</a></th>
            <th><a href="index.php?subaction=embedsort" class="sortHeading">Embed Code</a></th>
            <th class="hideDates"><a href="index.php?subaction=updatedsort" class="sortHeading">Updated</a></th>
            <th class="hideDates"><a href="index.php?subaction=createdsort" class="sortHeading">Added</a></th>
        </tr>
        <?php foreach($videos as $video): ?>
            <tr>
                <td>
                    <form action="index.php" method="post">
                        <input type="hidden" name="action" value="editvideo">
                        <input type="hidden" name="videoID" value="<?php echo $video['videoID'];?>">
                        <button type="submit" class="editButton">Edit</button>
                    </form>
                </td>
                <td>
                    <?php echo '<a href="..\index.php?action=videoview&videoID='.$video['videoID'].'">'; ?>
                    <?php echo $video['videoName']; ?>
                    <?php echo '</a>'; ?>
                </td>
                <td>
                    <?php
                        if ($video['videoYear'] == null) {
                            echo "<div style='background:red;'>ORPHAN</div>";    
                        } else foreach($years as $year) {
                            if ($video['videoYear'] == $year['yearID']) {
                                echo '<a href="..\index.php?action=yearview&yearID='.$year['yearID'].'">';
                                echo $year['year'];
                                echo '</a>';
                            }
                        }


                    ?>
                </td>
                <td  class="hideLocation">
                    <?php $locationEdited = str_replace(" ","+",$video['videoLocation']); ?>
                    <?php echo '<a href="..\index.php?action=locationview&videoLocation='.$locationEdited.'">'; ?>
                    <?php echo $video['videoLocation']; ?>
                    <?php echo '</a>'; ?>
                </td>
                <td>
                    <?php echo '<a href="https://www.youtube.com/watch?v='.$video['videoEmbed'].'" target="_blank">'; ?>
                    <?php echo $video['videoEmbed']; ?>
                    <?php echo '</a>'; ?>
                </td>
                <td class="hideDates">
                    <?php echo $video["videoDateEdited"]; ?>
                </td>
                <td class="hideDates">
                    <?php echo $video["videoDateAdded"]; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
        
<?php include("../footer.php"); ?>