<?php

require_once './db/connection.php';

$id = $_GET['id'];

if (!empty($id)) {
    $sql = "DELETE FROM category WHERE cid = $id";
    $product = "SELECT * FROM product WHERE category_id = $id";
    $productResult = mysqli_query($conn, $product);
    $totalProduct = mysqli_num_rows($productResult);
    if ($totalProduct === 0) {
        $result = mysqli_query($conn, $sql);

        if ($result) {
            header('Location: show-category.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

    } else {
        echo 'You cannot delete this category because there are products associated with this category';
    }
} else {
    echo 'Id not found';
}
