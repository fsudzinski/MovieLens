<?php require_once 'functions.php'; 
    delete_tag($_GET["userId"], $_GET["movieId"], $_GET["tag"], $_GET["timestamp"]);
    header('Location: index.php');
?>