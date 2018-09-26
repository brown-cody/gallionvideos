<?php include("../header.php"); ?>

    <h2>Edit Year</h2>
    
    <div class="formContainer">
        <form action="index.php" method="post" class="mainForm">
            <input type="hidden" name="action" value="saveedityear">

            <input type="hidden" name="yearID" value="<?php echo $year['yearID']; ?>">

            <label class="formLabel" for="year">Year:</label>
            <input type="text" name="year" id="year" class="formInput submitButtonSpace" value="<?php echo $year['year']; ?>" required>
            <br>

            <button type="submit" class="mainButton submitButton">Submit</button>

        </form>

        <form action="index.php" method="post">
            <input type="hidden" name="action" value="adminview">

            <button type="submit" class="mainButton">Cancel</button>

        </form>

        <form action="index.php" method="post">
            <input type="hidden" name="action" value="confirmation">

            <input type="hidden" name="subaction" value="deleteyear">

            <input type="hidden" name="yearID" value="<?php echo $year['yearID']; ?>">

            <input type="hidden" name="year" value="<?php echo $year['year']; ?>">

            <button type="submit" class="mainButton delete">Delete Year</button>

        </form>
    </div>

        
<?php include("../footer.php"); ?>