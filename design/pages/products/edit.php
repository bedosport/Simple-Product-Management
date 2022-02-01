<?php
require_once '../../../core/config.php';
require_once '../../../core/session.php';
require_once '../../../core/response.php';
require_once '../../../core/request.php';
require_once '../../../core/validations.php';
require_once '../../../core/db.php';
require_once '../../../helper/helpers.php';
?>

<?php include '../../inc/header.php';



if (requiredVal($_GET["id"])) {
    $id = $_GET["id"];

    $mycategories = readDb("`categories`");

    $myproduct = readDb("`products`", "`id` = '$id'");

    if(count($myproduct)>0)
        $myproduct = $myproduct[0];
    else
        redirect("design/index");
    
} else {
    redirect("design/index");
}


?>
<div class="container">
    <div class="row">
        <div class="col-10 mx-auto my-3 border p-3">
            <h1> All Products</h1>
            <a href="index.php" class="btn btn-primary">View All</a>
        </div>
    </div>
    <div class="row">
        <div class="col-10 mx-auto">
            <?php getFile(PREV_FOLDER . PREV_FOLDER . "inc/message"); ?>
            <form action="../../../handelers/products/edit.php?id=<?= $_GET["id"] ?>" method="POST" enctype="multipart/form-data">
                <h3>Edit Info</h3>
                <div class="mb-3">
                    <label for="cat-name"> Select Category</label>
                    <select name="category_id" class="form-select">
                        <?php foreach ($mycategories as $val) : ?>

                            <option <?php if ($val["id"] == $myproduct["category_id"]) echo ' selected '; ?> value='<?= $val["id"] ?>'><?= $val["name"] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="cat-name"> Product Name</label>
                    <input type="text" value="<?= $myproduct["name"] ?>" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="cat-name"> Price</label>
                    <input class="form-control" value="<?= $myproduct["price"] ?>" type="number" name="price">
                </div>
                <div class="mb-3">
                    <label for="cat-name"> Quantity</label>
                    <input class="form-control" value="<?= $myproduct["qty"] ?>" name="quantity" type="number">
                </div>
                <div class="mb-3">
                    <input type="submit" value="Save" class="form-control bg-success text-white" name="submit">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../../inc/footer.php'; ?>