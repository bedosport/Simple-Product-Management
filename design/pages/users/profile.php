<?php
require_once '../../../core/config.php';
require_once '../../../helper/helpers.php';
require_once '../../../core/session.php';

$user = getSession('user');
?>

<?php include_once '../../inc/header.php'; ?>
<h1 class="p-5 text-center">Profile</h1>

<div class="container">
    <div class="row">
        <div class="col-6 mx-auto">

            <div class="card" >
                <div class="card-header">Info</div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b> Name :  </b> <?= $user['user_name']?></li>
                        <li class="list-group-item"><b> Email : </b> <?= $user['user_email']?></li>
                        <li class="list-group-item"><b> Type :  </b> <?= $user['user_type']?></li>
                    </ul>
                </div>
            </div>
           
        </div>
    </div>
</div>

<?php include_once '../../inc/footer.php'; ?>