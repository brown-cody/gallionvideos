<?php
    $dsn = 'mysql:host=localhost;dbname=gallion_videos';
    $username = 'gallionvideos_user';
    $password = 'AJpC2HNZlsAjLkMI';

    try {
        $db = new PDO($dsn, $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('errors/database_error.php');
        exit();
    }
?>