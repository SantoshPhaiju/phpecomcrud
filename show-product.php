<?php

require_once "./db/connection.php";
require_once './components/header.php';


$sql = 'SELECT * from product LEFT JOIN category ON product.category_id = category.cid';
$result = mysqli_query($conn, $sql);


?>

<div class="container my-4">

    <h1>
        Show Product page
    </h1>


    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">S.N.</th>
                <th scope="col">Product Id</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                $i = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                        <th scope="row"><?= $i; ?></th>
                        <th scope="row"><?php echo $row['pid'] ?></th>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['quantity']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td><?php echo $row['category_name']; ?></td>
                        <td scope="row">
                            <!-- Button trigger modal -->
                            <a href="edit-product.php?id=<?php echo $row['pid'] ?>" class="btn btn-primary">
                                Edit
                            </a>

                            <a href="delete-product.php?id=<?php echo $row['pid'] ?>" type="button" class="btn btn-danger">
                                Delete
                            </a>

                        </td>
                    </tr>
                    <?php
                    $i++;
                }
            } else {
                echo 'No data found';
            }
            ?>
        </tbody>
    </table>

    <?php




    ?>





</div>


<?php require_once './components/footer.php' ?>