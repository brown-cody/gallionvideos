<?php

function get_videos_by_year($videoYear) {
    global $db;
    $query = 'SELECT * FROM video
              WHERE videoYear = :videoYear
              ORDER BY videoName';
    $statement = $db->prepare($query);
    $statement->bindValue(":videoYear", $videoYear);
    $statement->execute();
    $videos = $statement->fetchAll();
    $statement->closeCursor();
    return $videos;
}



function get_video($videoID) {
    global $db;
    $query = 'SELECT * FROM video
              WHERE videoId = :videoID';
    $statement = $db->prepare($query);
    $statement->bindValue(":videoID", $videoID);
    $statement->execute();
    $video = $statement->fetch();
    $statement->closeCursor();
    return $video;
}

function get_videos() {
    global $db;
    
    $query = 'SELECT * FROM video
              ORDER BY videoName';
    $statement = $db->prepare($query);
    $statement->execute();
    $videos = $statement->fetchAll();
    $statement->closeCursor();
    return $videos;
}

function sort_videos_by_year() {
    global $db;
    
    $query = 'SELECT * FROM video
              ORDER BY videoYear';
    $statement = $db->prepare($query);
    $statement->execute();
    $videos = $statement->fetchAll();
    $statement->closeCursor();
    return $videos;
}

function sort_videos_by_location() {
    global $db;
    $query = 'SELECT * FROM video
              ORDER BY videoLocation';
    $statement = $db->prepare($query);
    $statement->execute();
    $videos = $statement->fetchAll();
    $statement->closeCursor();
    return $videos;
}

function sort_videos_by_embed() {
    global $db;
    $query = 'SELECT * FROM video
              ORDER BY videoEmbed';
    $statement = $db->prepare($query);
    $statement->execute();
    $videos = $statement->fetchAll();
    $statement->closeCursor();
    return $videos;
}

function sort_videos_by_updated() {
    global $db;
    $query = 'SELECT * FROM video
              ORDER BY videoDateEdited DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $videos = $statement->fetchAll();
    $statement->closeCursor();
    return $videos;
}

function sort_videos_by_created() {
    global $db;
    $query = 'SELECT * FROM video
              ORDER BY videoDateAdded DESC';
    $statement = $db->prepare($query);
    $statement->execute();
    $videos = $statement->fetchAll();
    $statement->closeCursor();
    return $videos;
}



function get_videos_by_location($videoLocation) {
    global $db;
    $query = 'SELECT * FROM video
              WHERE videoLocation = :videoLocation
              ORDER BY videoName';
    $statement = $db->prepare($query);
    $statement->bindValue(":videoLocation", $videoLocation);
    $statement->execute();
    $videos = $statement->fetchAll();
    $statement->closeCursor();
    return $videos;
}
/*
function set_video_Embed($videoID, $videoEmbed) {
    global $db;
    $query = 'UPDATE video
              SET videoEmbed = :videoEmbed
              WHERE videoID = :videoID';
    $statement = $db->prepare($query);
    $statement->bindValue(':videoEmbed', $videoEmbed);
    $statement->bindValue(':videoID', $videoID);
    $statement->execute();
    $statement->closeCursor();
}*/

function add_video($videoName, $videoYear, $videoLocation, $videoEmbed, $videoPersonTag, $videoDescription) {
    global $db;
    $query = 'INSERT INTO video
                 (videoName, videoYear, videoLocation, videoEmbed, videoPersonTag, videoDescription, videoDateAdded, videoDateEdited)
              VALUES
                 (:videoName, :videoYear, :videoLocation, :videoEmbed, :videoPersonTag, :videoDescription, now(), now())';
    $statement = $db->prepare($query);
    $statement->bindValue(':videoName', $videoName);
    $statement->bindValue(':videoYear', $videoYear);
    $statement->bindValue(':videoLocation', $videoLocation);
    $statement->bindValue(':videoEmbed', $videoEmbed);
    $statement->bindValue(':videoPersonTag', $videoPersonTag);
    $statement->bindValue(':videoDescription', $videoDescription);
    $statement->execute();
    $statement->closeCursor();
}

function delete_video($videoID) {
    global $db;
    $query = 'DELETE FROM video
              WHERE videoID = :videoID';
    $statement = $db->prepare($query);
    $statement->bindValue(':videoID', $videoID);
    $statement->execute();
    $statement->closeCursor();
}

function edit_video($videoID, $videoName, $videoYear, $videoLocation, $videoEmbed, $videoPersonTag, $videoDescription) {
    global $db;
    $query = 'UPDATE video
              SET videoName = :videoName, videoYear = :videoYear, videoLocation = :videoLocation, videoEmbed = :videoEmbed, videoPersonTag = :videoPersonTag, videoDescription = :videoDescription, videoDateEdited = now()
              WHERE videoID = :videoID';
    $statement = $db->prepare($query);
    $statement->bindValue(':videoID', $videoID);    
    $statement->bindValue(':videoName', $videoName);
    $statement->bindValue(':videoYear', $videoYear);
    $statement->bindValue(':videoLocation', $videoLocation);
    $statement->bindValue(':videoEmbed', $videoEmbed);
    $statement->bindValue(':videoPersonTag', $videoPersonTag);
    $statement->bindValue(':videoDescription', $videoDescription);
    $success = $statement->execute();
    $statement->closeCursor();    
}