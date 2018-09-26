<?php include("../header.php"); ?>

    <h2>Add Year</h2>
    
    <div class="formContainer">
        <form action="index.php" method="post" class="mainForm">
            <input type="hidden" name="action" value="saveaddyear">

            <label for="year" class="formLabel">Year:</label>
            <input type="text" name="year" id="year" class="formInput submitButtonSpace" required>

            <br>
            <button type="submit" class="mainButton submitButton">Submit</button>

        </form>

        <form action="index.php" method="post">
            <input type="hidden" name="action" value="adminview">

            <button type="submit" class="mainButton">Cancel</button>

        </form>
    </div>

        
<?php include("../footer.php"); ?>