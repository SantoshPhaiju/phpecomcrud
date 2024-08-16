<?php

require_once "./db/connection.php";
require_once './components/header.php';

$productId = $_GET['id'];
// echo $categoryId;

$sql = "SELECT * FROM product WHERE pid = '$productId'";
$result = mysqli_query($conn, $sql);


// now code for udpating the categoryname
if (!empty($_POST['name']) && !empty($_POST['quantity']) && !empty($_POST['price'])) {
    $product_name = $_POST['name'];
    $product_quantity = $_POST['quantity'];
    $product_price = $_POST['price'];
    $sql2 = "UPDATE product SET name = '$product_name', quantity = '$product_quantity', price = '$product_price' WHERE pid = '$productId'";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2) {
        header("location:show-product.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

?>



<div class="container my-4">

    <h1>
        Edit product page
    </h1>


    <div class="form">
        <form action="" method="post">
            <div class="mb-3">
                <?php

                while ($row = mysqli_fetch_assoc($result)) {



                    ?>
                    <label for="name" class="form-label">Product Name:-</label>
                    <input value="<?php echo $row['name'] ?>" type="text" class="form-control" name="name" id="name">
                    <br>
                    <label for="quantity" class="form-label">Product Quantity:-</label>
                    <input value="<?php echo $row['quantity'] ?>" type="text" class="form-control" name="quantity" id="quantity">
                    <br>
                    <label for="price" class="form-label">Product Price:-</label>
                    <input value="<?php echo $row['price'] ?>" type="text" class="form-control" name="price" id="price">
                    <br>

                <?php } ?>

            </div>


            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>




</div>


<?php require_once './components/footer.php' ?>