<?php require_once 'functions.php'; 
    delete_movie($_GET["id"]);
    header('Location: index.php');
?>