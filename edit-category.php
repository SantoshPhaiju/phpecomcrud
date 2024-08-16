<?php

require_once "./db/connection.php";
require_once './components/header.php';

$categoryId = $_GET['id'];
// echo $categoryId;

$sql = "SELECT * FROM category WHERE cid = '$categoryId'";
$result = mysqli_query($conn, $sql);


// now code for udpating the categoryname
if (!empty($_POST['category_name'])) {
    $category_name = $_POST['category_name'];
    $sql2 = "UPDATE category SET category_name = '$category_name' WHERE cid = '$categoryId'";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2) {
        header("location:show-category.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}




?>



<div class="container my-4">

    <h1>
        Edit category page
    </h1>


    <div class="form">
        <form action="" method="post">
            <div class="mb-3">
                <?php

                while ($row = mysqli_fetch_assoc($result)) {



                ?>
                    <label for="category_name" class="form-label">Category Name:-</label>
                    <input value="<?php echo $row['category_name'] ?>" type="text" class="form-control" name="category_name"
                        id="category_name">

                <?php } ?>

            </div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>




</div>


<?php require_once './components/footer.php' ?>