<?php

require_once "./db/connection.php";
require_once './components/header.php';


$sql = 'SELECT * FROM category';
$result = mysqli_query($conn, $sql);


?>

<div class="container my-4">

    <h1>
        Show Category page
    </h1>


    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">S.N.</th>
                <th scope="col">Category Id</th>
                <th scope="col">Category Name</th>
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
                        <th scope="row"><?php echo $row['cid'] ?></th>
                        <td><?php echo $row['category_name']; ?></td>
                        <td scope="row">
                            <!-- Button trigger modal -->
                            <a href="edit-category.php?id=<?php echo $row['cid'] ?>" class="btn btn-primary">
                                Edit
                            </a>

                            <a href="delete-category.php?id=<?php echo $row['cid'] ?>" type="button" class="btn btn-danger">
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