<?php
require_once '../../../core/config.php';
require_once '../../../core/session.php';
require_once '../../../core/response.php';
require_once '../../../core/request.php';
require_once '../../../core/db.php';
require_once '../../../helper/helpers.php';
?>

<?php include '../../inc/header.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-10 mx-auto my-3 border p-3">
            <h1> All Usres</h1>
            <a href="index.php" class="btn btn-primary">View All</a>
        </div>
    </div>


    <div class="row">
        <div class="col-10 mx-auto">
            <?php getFile(PREV_FOLDER . PREV_FOLDER . "inc/message"); ?>
            <div class="mx-auto my-3 border p-3 rounded = 5 text-center">
                <h1> Add New Usres</h1>
            </div>
            <form action="../../../handelers/users/add.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="cat-name"> User Name</label>
                    <input type="name" name="name" class="form-control" ">
                </div>
                <div class=" mb-3">
                    <label for="cat-name"> Email</label>
                    <input type="email" name="email" class="form-control" ">
                </div>
                <div class=" mb-3">
                    <label for="cat-name"> Password</label>
                    <input type="password" name="password" class="form-control" ">
                </div>
                <div class=" mb-3">
                    <input type="submit" value="Add" class="form-control bg-success text-white" name="submit">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../../inc/footer.php'; ?>