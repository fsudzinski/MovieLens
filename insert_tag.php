<?php require_once 'functions.php'; ?>
<?php

if (!isset($_POST["username"])) {
    echo "Username must be set";
} else if (!isset($_POST["tag"]) or empty($_POST["tag"])) {
    echo "Tag is required";
} else {
    $userId;
    if($_POST["username"] == ""){
        insert_null_user();
        $userId = mysqli_insert_id($conn);
    }
    else{
        $userId = get_userId_by_name($_POST["username"]);
    }

    insert_tag($userId, $_POST["id"], $_POST["tag"], time());
    header('Location: index.php');
}


?>