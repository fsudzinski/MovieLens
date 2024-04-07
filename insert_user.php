<?php require_once 'functions.php'; ?>
<?php

if (!isset($_POST["name"]) or empty($_POST["name"])) {
    echo "Name must be set";
} else if (!empty(get_userId_by_name($_POST["name"]))) {
    echo "Name is already taken";
} else {
    insert_user($_POST["name"]);
    header('Location: index.php');
}

?>