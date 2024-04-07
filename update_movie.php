<?php require_once 'functions.php'; ?>
<?php

if (!isset($_POST["title"]) or empty($_POST["title"])) {
    echo "Title is required";
} else if (!isset($_POST["year"]) or empty($_POST["year"])) {
    echo "Year is required";
} else if ($_POST["year"] < 0 or !is_numeric($_POST["year"])) {
    echo "Incorrect year";
} else {
    $genres_str = "";
    foreach ($_POST["genres"] as $genre) {
        $genres_str = $genres_str . $genre . "|";
    }

    if ($genres_str == "") {
        $genres_str = "(no genres listed)";
        clear_genres($_POST["id"]);
        update_movie($_POST["id"], $_POST["title"] . " (" . $_POST["year"] . ")" , $genres_str);
        insert_movie_genre($_POST["id"], $genres_str);
    } else {
        $genres_str = rtrim($genres_str, "|");
        clear_genres($_POST["id"]);
        update_movie($_POST["id"], $_POST["title"] . " (" . $_POST["year"] . ")" , $genres_str);

        foreach ($_POST["genres"] as $genre) {
            insert_movie_genre($_POST["id"], $genre);
        }
    }

    header('Location: index.php');
}


?>