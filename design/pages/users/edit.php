<?php
require_once '../../../core/config.php';
require_once '../../../core/session.php';
require_once '../../../core/response.php';
require_once '../../../core/request.php';
require_once '../../../core/validations.php';
require_once '../../../core/db.php';
require_once '../../../helper/helpers.php';
?>
<?php include '../../inc/header.php'; ?>

<?php

if (requiredVal($_GET["id"])) {
    $id = $_GET['id'];
    $myuser = readDb("`users`", "`id` = '$id'");

    //check if the id is found
    if (count($myuser) == 0)
        redirect('design/index');
    $myuser = $myuser[0];
    // die(dd($myuser));
} else {
    redirect('design/index');
}


?>
<div class="container">
    <div class="row">
        <div class="col-10 mx-auto my-3 border p-3">
            <h1> All Users</h1>
            <a href="index.php" class="btn btn-primary">View All</a>
        </div>
    </div>
    <div class="row">
        <div class="col-10 mx-auto">
            <?php getFile(PREV_FOLDER . PREV_FOLDER . "inc/message"); ?>

            <form action="../../../handelers/users/edit.php?id=<?= $_GET["id"] ?>" method="POST" enctype="multipart/form-data">
                <h3>Edit Info</h3>
                <div class="mb-3">
                    <label for="name"> User Name</label>
                    <input type="name" value="<?= $myuser["name"] ?>" name="name" class="form-control" ">
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" value="<?= $myuser["email"] ?>" name="email" class="form-control"">
                </div>
                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control"">
                </div>
                <div class="mb-3">
                    <input type="submit" value="Update" class="form-control bg-success text-white" name="submit">
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../../inc/footer.php'; ?>