<?php

require_once "./db/connection.php";
require_once './components/header.php';

if (!empty($_POST['name']) && !empty($_POST['quantity']) && !empty($_POST['price']) && !empty($_POST['category'])) {
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $category = $_POST['category'];


    $sql = "INSERT INTO product(name, quantity, price, category_id) VALUES ('$name', '$quantity', '$price', '$category')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
?>

        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your product has been successfully added!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

<?php
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// 
?>

<div class="container my-4">

    <h1>
        Add product page
    </h1>


    <div class="form">
        <form action="" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Product Name:-</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
            <div class="mb-3">
                <label for="quantity" class="form-label">Quantity:-</label>
                <input type="number" class="form-control" name="quantity" id="quantity">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price:-</label>
                <input type="number" class="form-control" name="price" id="price">
            </div>

            <!-- insert a select menu option from category -->
            <div class="mb-3">
                <label for="category" class="form-label">Category:-</label>
                <select class="form-select" name="category" id="category">
                    <option selected>Select category</option>
                    <?php
                    $sql = 'SELECT * FROM category';
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                            <option value="<?php echo $row['cid']; ?>"><?php echo $row['category_name']; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>


            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>




</div>


<?php require_once './components/footer.php' ?>