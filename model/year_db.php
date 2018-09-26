<?php

function get_years() {
    global $db;
    
    $query = 'SELECT * FROM year
              ORDER BY year';
    $statement = $db->prepare($query);
    $statement->execute();
    $years = $statement->fetchAll();
    $statement->closeCursor();
    return $years;
}

function get_year($yearID) {
    global $db;
    $query = 'SELECT * FROM year
              WHERE yearID = :yearID';
    $statement = $db->prepare($query);
    $statement->bindValue(":yearID", $yearID);
    $statement->execute();
    $year = $statement->fetch();
    $statement->closeCursor();
    return $year;
}

function edit_year($yearID, $year) {
    global $db;
    $query = 'UPDATE year
              SET year = :year
              WHERE yearID = :yearID';
    $statement = $db->prepare($query);
    $statement->bindValue(':yearID', $yearID);    
    $statement->bindValue(':year', $year);
    $success = $statement->execute();
    $statement->closeCursor();
}

function add_year($year) {
    global $db;
    $query = 'INSERT INTO year
                (year)
              VALUES
                (:year)';
    $statement = $db->prepare($query);
    $statement->bindValue(":year", $year);
    $statement->execute();
    $statement->closeCursor();
}

function delete_year($yearID) {
    global $db;
    $query = 'DELETE FROM year
              WHERE yearID = :yearID';
    $statement = $db->prepare($query);
    $statement->bindValue(':yearID', $yearID);
    $statement->execute();
    $statement->closeCursor();
}
