<?php

require_once './db/connection.php';

$id = $_GET['id'];

if (!empty($id)) {
    $sql = "DELETE FROM category WHERE cid = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: show-category.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo 'Id not found';
}
