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

$rows = readDb("`users`");

?>

<div class="container">
    <div class="row">
        <div class="col-10 mx-auto my-3">
            <h1> All Users</h1>
            <a href="add.php" class="btn btn-primary">Add New User</a>
        </div>
    </div>
    <div class="row">
        <div class="col-10 mx-auto"> <?php getFile(PREV_FOLDER.PREV_FOLDER."inc/message");?>
           

            <?php if (count($rows) > 0) : ?>
                <table class="table table-bordered">
                    <thead>
                        <th>#</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                        foreach ($rows as $row) : ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $row["name"] ?></td>
                                <td><?= $row["email"] ?></td>
                                <td>
                                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-info">Edit</a>
                                </td>
                                <td>
                                    <a href='../../../handelers/users/delete.php?id=<?= $row["id"] ?>' class="btn btn-danger">Delete</a>
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