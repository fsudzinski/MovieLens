
<?php require_once 'functions.php'; ?>
<?php

if (!isset($_POST["username"])) {
    echo "Username must be set";
} else if (!isset($_POST["rating"]) or empty($_POST["rating"])) {
    echo "Rating is required";
} else {
    $userId;
    if($_POST["username"] == ""){
        insert_null_user();
        $userId = mysqli_insert_id($conn);
    }
    else{
        $userId = get_userId_by_name($_POST["username"]);
    }

    insert_rating($userId, $_POST["id"], $_POST["rating"], time());
    header('Location: index.php');
}


?>