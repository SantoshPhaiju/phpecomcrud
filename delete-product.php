<?php

require_once './db/connection.php';

$id = $_GET['id'];

if (!empty($id)) {
    $sql = "DELETE FROM product WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('Location: show-product.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo 'Id not found';
}