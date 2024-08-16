<?php

require_once "./db/connection.php";
require_once './components/header.php';

if (!empty($_POST['category_name'])) {
    $category_name = $_POST['category_name'];

    $sql = "INSERT INTO category(category_name) VALUES ('$category_name')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
?>

        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your category has been successfully added!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

<?php
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>

<div class="container my-4">

    <h1>
        Add category page
    </h1>


    <div class="form">
        <form action="" method="post">
            <div class="mb-3">
                <label for="category_name" class="form-label">Category Name:-</label>
                <input type="text" class="form-control" name="category_name" id="category_name">

            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>




</div>


<?php require_once './components/footer.php' ?>