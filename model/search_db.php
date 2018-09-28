<?php

function search_name($searchText) {
    global $db;
    
    $query = 'SELECT * FROM video
              WHERE videoName LIKE :searchText';
    $statement = $db->prepare($query);
    $statement->bindValue(":searchText", '%'.$searchText.'%');
    $statement->execute();
    $videos = $statement->fetchAll();
    $statement->closeCursor();
    return $videos;
}

function search_location($searchText) {
    global $db;
    
    $query = 'SELECT DISTINCT videoLocation
              FROM video
              WHERE videoLocation LIKE :searchText';
    $statement = $db->prepare($query);
    $statement->bindValue(":searchText", '%'.$searchText.'%');
    $statement->execute();
    $videos = $statement->fetchAll();
    $statement->closeCursor();
    return $videos;
}

function search_people($searchText) {
    global $db;
    
    $query = 'SELECT * FROM video
              WHERE videoPersonTag LIKE :searchText';
    $statement = $db->prepare($query);
    $statement->bindValue(":searchText", '%'.$searchText.'%');
    $statement->execute();
    $videos = $statement->fetchAll();
    $statement->closeCursor();
    return $videos;
}

function search_description($searchText) {
    global $db;
    
    $query = 'SELECT * FROM video
              WHERE videoDescription LIKE :searchText';
    $statement = $db->prepare($query);
    $statement->bindValue(":searchText", '%'.$searchText.'%');
    $statement->execute();
    $videos = $statement->fetchAll();
    $statement->closeCursor();
    return $videos;
}

?>