<?php
require_once '../../../core/config.php';
require_once '../../../core/session.php';
require_once '../../../core/response.php';
require_once '../../../core/request.php';
require_once '../../../core/db.php';
require_once '../../../helper/helpers.php';
?>

<?php
include '../../inc/header.php';

$my_categories = readDb('`categories`');



?>

<div class="container">
    <div class="row">
        <div class="col-10 mx-auto my-3 border p-3 rounded-2">
            <h1> All Products</h1>
            <a href="index.php" class="btn btn-primary">View All</a>
        </div>
    </div>


    <div class="row">
        <div class="col-10 mx-auto">
            <?php getFile(PREV_FOLDER . PREV_FOLDER . "inc/message"); ?>

            <form action="../../../handelers/products/add.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="cat-name"> Select Category</label>
                    <select name="category_id" class="form-select">
                        <?php foreach ($my_categories as $val ) : ?>
                            <option value="<?= $val["id"] ?>"><?= $val["name"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="cat-name"> Product Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="cat-name"> Price</label>
                    <input class="form-control" type="number" name="price">
                </div>
                <div class="mb-3">
                    <label for="cat-name"> Quantity</label>
                    <input class="form-control" name="quantity" type="number">
                </div>
                <div class="mb-3">
                    <input type="submit" value="Save" class="form-control bg-success text-white" name="submit">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../../inc/footer.php'; ?>