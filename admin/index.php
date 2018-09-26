<?php
// Get the database connection to recipe db
require('../model/database.php');

// Get the models
require('../model/year_db.php');
require('../model/video_db.php');

$action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if ($action == NULL) {
        $action = 'adminview';
    }
}  

switch ($action) {
    case 'adminview':
        $subaction = filter_input(INPUT_GET, 'subaction', FILTER_SANITIZE_STRING);
        $videos = get_videos();
        switch ($subaction) {
            case 'videosort':
                break;
            case 'yearsort':
                $videos = sort_videos_by_year();
                break;
            case 'locationsort':
                $videos = sort_videos_by_location();
                break;
            case 'embedsort':
                $videos = sort_videos_by_embed();
                break;
            case 'updatedsort':
                $videos = sort_videos_by_updated();
                break;
            case 'createdsort':
                $videos = sort_videos_by_created();
                break;
            default:
                break;
        }
        $years = get_years();
        include('view\adminview.php');
        break;
    case 'addyear':
        include('view\addyearview.php');
        break;
    case 'edityear':
        $yearID = filter_input(INPUT_POST, 'yearID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        if ($yearID == null) {
            $yearID = filter_input(INPUT_GET, 'yearID', FILTER_SANITIZE_STRING);
        }
        $year = get_year($yearID);
        include('view\edityearview.php');
        break;
    case 'saveedityear':
        $yearID = filter_input(INPUT_POST, 'yearID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_STRING);
        edit_year($yearID, $year);
        $videos = get_videos();
        $years = get_years();
        include('view\adminview.php');
        break;
    case 'saveaddyear':
        $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_STRING);
        add_year($year);
        $videos = get_videos();
        $years = get_years();
        include('view\adminview.php');
        break;
    case 'deleteyear':
        $yearID = filter_input(INPUT_POST, 'yearID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        delete_year($yearID);
        $videos = get_videos();
        $videos = get_videos();
        include('view\adminview.php');
        break;
    case 'addvideo':
        $years = get_years();
        include('view\addvideoview.php');
        break;
    case 'editvideo':
        $videoID = filter_input(INPUT_POST, 'videoID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        if ($videoID == null) {
            $videoID = filter_input(INPUT_GET, 'videoID', FILTER_SANITIZE_STRING);
        }
        $video = get_video($videoID);
        $years = get_years();
        include('view\editvideoview.php');
        break;
    case 'saveeditvideo':
        $videoID = filter_input(INPUT_POST, 'videoID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        $videoName = filter_input(INPUT_POST, 'videoName', FILTER_SANITIZE_STRING);
        $videoYear = filter_input(INPUT_POST, 'videoYear', FILTER_SANITIZE_STRING);
        $videoLocation = filter_input(INPUT_POST, 'videoLocation', FILTER_SANITIZE_STRING);
        $videoEmbed = filter_input(INPUT_POST, 'videoEmbed', FILTER_SANITIZE_STRING);
        
        $videoPersonTag = filter_input(INPUT_POST, 'videoPersonTag', FILTER_SANITIZE_STRING);
        
        $videoDescription = filter_input(INPUT_POST, 'videoDescription', FILTER_SANITIZE_STRING);
        
        edit_video($videoID, $videoName, $videoYear, $videoLocation, $videoEmbed, $videoPersonTag, $videoDescription);
        $videos = get_videos();
        $years = get_years();
        include('view\adminview.php');
        break;
    case 'saveaddvideo':
        $videoName = filter_input(INPUT_POST, 'videoName', FILTER_SANITIZE_STRING);
        $videoYear = filter_input(INPUT_POST, 'videoYear', FILTER_SANITIZE_STRING);
        $videoLocation = filter_input(INPUT_POST, 'videoLocation', FILTER_SANITIZE_STRING);
        $videoEmbed = filter_input(INPUT_POST, 'videoEmbed', FILTER_SANITIZE_STRING);
        
        $videoPersonTag = filter_input(INPUT_POST, 'videoPersonTag', FILTER_SANITIZE_STRING);
        
        $videoDescription = filter_input(INPUT_POST, 'videoDescription', FILTER_SANITIZE_STRING);
        
        add_video($videoName, $videoYear, $videoLocation, $videoEmbed, $videoPersonTag, $videoDescription);
        $videos = get_videos();
        $years = get_years();
        include('view\adminview.php');
        break;
    case 'deletevideo':
        $videoID = filter_input(INPUT_POST, 'videoID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        delete_video($videoID);
        $videos = get_videos();
        $years = get_years();
        include('view\adminview.php');
        break;
            
    case 'confirmation':
        $videoID = filter_input(INPUT_POST, 'videoID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        $videoName = filter_input(INPUT_POST, 'videoName', FILTER_SANITIZE_STRING);
        $yearID = filter_input(INPUT_POST, 'yearID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_STRING);
        $subaction = filter_input(INPUT_POST, 'subaction', FILTER_SANITIZE_STRING);
        
        include('view\confirmationview.php');
        break;

}
?>