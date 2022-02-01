<?php
require_once '../../core/config.php';
require_once '../../core/session.php';
require_once '../../core/response.php';
require_once '../../core/request.php';
require_once '../../core/validations.php';
require_once '../../core/db.php';
require_once '../../helper/helpers.php';


if (getMethod() && requiredVal($_GET["id"])) {
    $id = $_GET["id"];

    $result = deleteDb('`products`', "`id`='$id'");
    if ($result > 0) {
        $_SESSION['success'] = "Product Deleted";
        header("location: ../../design/pages/products/index.php");
    } else {
        $_SESSION['errors'] = "Error in delete Product";
        header("location: ../../design/pages/products/index.php");
    }
}
