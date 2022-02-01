<?php
require_once '../../../core/config.php';
require_once '../../../core/session.php';
require_once '../../../core/response.php';
require_once '../../../core/request.php';
require_once '../../../core/db.php';
require_once '../../../helper/helpers.php';
?>


<?php include '../../inc/header.php'; ?>
<?php

$sql = "SELECT c.name AS 'category_name' , p.id , p.name , p.category_id , p.price , p.qty  FROM `products` AS `p` INNER JOIN `categories` AS `c` ON c.id = p.category_id";
$my_data = readWithQueryDb($sql);


?>

<div class="container">
    <div class="row">
        <div class="col-10 mx-auto my-3">
            <h1> All Products</h1>
            <a href="add.php" class="btn btn-primary">Add New Product</a>
        </div>
    </div>
    <div class="row">
        <div class="col-10 mx-auto">

            <?php getFile(PREV_FOLDER . PREV_FOLDER . "inc/message"); ?>

            <?php if (count($my_data) > 0) : ?>
                <table class="table table-bordered">
                    <thead>
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Category Name</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php
                        $temp = 1;
                        foreach ($my_data as $val) : ?>
                            <tr>
                                <td><?= $temp++ ?></td>
                                <td><?= $val["name"] ?></td>
                                <td><?= $val["price"] ?></td>
                                <td><?= $val["qty"] ?></td>
                                <td><?= $val["category_name"] ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $val['id'] ?>" class="btn btn-info">Edit</a>
                                </td>
                                <td>
                                    <a href='../../../handelers/products/delete.php?id=<?= $val["id"] ?>' class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach;
                        ?>
                    </tbody>

                </table>
            <?php else : ?>
                <div class="alert alert-primary" role="alert">
                    There is no data
                </div>
            <?php endif; ?>

        </div>
    </div>
</div>

<?php include '../../inc/footer.php'; ?>