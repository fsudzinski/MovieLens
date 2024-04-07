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
        insert_movie($_POST["title"] . " (" . $_POST["year"] . ")" , $genres_str);
        insert_movie_genre(mysqli_insert_id($conn), $genres_str);
    } else {
        $genres_str = rtrim($genres_str, "|");
        insert_movie($_POST["title"], $genres_str);
        $id = mysqli_insert_id($conn);

        foreach ($_POST["genres"] as $genre) {
            insert_movie_genre($id, $genre);
        }
    }

    header('Location: index.php');
}


?>