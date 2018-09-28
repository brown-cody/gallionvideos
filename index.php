<?php
// Get the database connection to recipe db
require('model/database.php');

// Get the models
require('model/year_db.php');
require('model/video_db.php');
require('model/search_db.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if ($action == NULL) {
        $action = 'menuview';
    }
}  

switch ($action) {
    case 'menuview':
        $years = get_years();
        include('menuview.php');
        break;
    case 'yearview':
        $years = get_years();
        $yearID = filter_input(INPUT_GET, 'yearID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        $videos = get_videos_by_year($yearID);
        include('yearview.php');
        break;
    case 'contributorview':
        $recipeContributor = filter_input(INPUT_GET, 'recipeContributor', FILTER_SANITIZE_STRING);
        $recipes = get_recipes_by_contributor($recipeContributor);
        include('contributorview.php');
        break;
    case 'videoview':
        $videoID = filter_input(INPUT_GET, 'videoID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        if ($videoID == 0 || $videoID == null) {
            $videoID = 1;
        }
        $video = get_video($videoID);
        $years = get_years();
        include('videoview.php');
        break;
    case 'search':
        $searchText = filter_input(INPUT_POST, 'searchText', FILTER_SANITIZE_STRING);
        
        $searchName = search_name($searchText);
        $searchLocation = search_location($searchText);
        $searchPeople = search_people($searchText);
        $searchDescription = search_description($searchText);
        
        include('searchresults.php');
        break;
}
?>