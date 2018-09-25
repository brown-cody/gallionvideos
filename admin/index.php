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
            case 'imagesort':
                $recipes = sort_recipes_by_image();
                break;
            case 'updatedsort':
                $recipes = sort_recipes_by_updated();
                break;
            case 'createdsort':
                $recipes = sort_recipes_by_created();
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
    
    //DELETE THIS CASE
    case 'deleteimage':
        $recipeID = filter_input(INPUT_POST, 'recipeID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        
        unlink('../images/'.$recipeID.'.jpg');
        set_recipe_image($recipeID, '0');
        $recipes = get_recipes();
        $categories = get_categories();
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
        
    //DELETE THIS CASE
    case 'upload':
        $recipeID = filter_input(INPUT_POST, 'recipeID', FILTER_VALIDATE_INT, FILTER_SANITIZE_NUMBER_INT);
        $recipeName = filter_input(INPUT_POST, 'recipeName', FILTER_SANITIZE_STRING);
        $recipes = get_recipes();
        $categories = get_categories();
        
        if(isset($_POST["SubmitBtn"])){
            
            $fileName=$_FILES["imageUpload".$recipeID]["name"];
            $fileSize=$_FILES["imageUpload".$recipeID]["size"]/1024;
            $fileType=$_FILES["imageUpload".$recipeID]["type"];
            $fileTmpName=$_FILES["imageUpload".$recipeID]["tmp_name"];  

            if ($fileName == null) {
                $error = "No file selected. Click the thumbnail to select an image.";
            } else if($fileType=="image/jpeg"){
                if($fileSize<=5000){

                //New file name
                //$random=rand(1111,9999);
                //$newFileName=$random.$fileName;

                $newFileName = $recipeID.'.jpg';

                //File upload path
                $uploadPath="../images/".$newFileName;

                //function for upload file
                    if(move_uploaded_file($fileTmpName,$uploadPath)){
                        $success = "Successful image upload for ".$recipeName;
                        set_recipe_image($recipeID, '1');
                    }
                } else {
                    $error = "Maximum upload file size limit is 5,000 kb";
                    include('view\adminview.php');
                    break;
                }
            } else {
                $error = "You can only upload a JPEG.";
                include('view\adminview.php');
                break;
            }  
            
        }
        
        include('view\adminview.php');
        break;

}
?>