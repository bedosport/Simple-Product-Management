<?php
require_once '../../core/config.php';
require_once '../../core/session.php';
require_once '../../core/response.php';
require_once '../../core/request.php';
require_once '../../core/validations.php';
require_once '../../core/db.php';
require_once '../../helper/helpers.php';
?>

<?php

include_once '../../core/validations.php';
include_once '../../core/db.php';



if (postMethod() && requiredVal($_GET["id"])) {
    $id = $_GET["id"];
    $name = $_POST["name"];


    if (!requiredVal($name)) {
        $errors[] = "Please fill your name";
    } elseif (!minVal($name, 3)) {
        $errors[] = "the name must be greater than 3 chars";
    }

    if (empty($errors)) {


        $result = updateDb('`categories`', ["name" => $name], "`id`= $id");


        if ($result > 0) {
            $_SESSION['success'] = "Category Updated";
            header("location: ../../design/pages/categories/index.php");
        } else {
            $errors[] = "You have an error!";
            $_SESSION["errors"] = $errors;
            header("location: ../../design/pages/categories/edit.php?id=" . $id);
        }
    } else {
        $_SESSION["errors"] = $errors;
        header("location: ../../design/pages/categories/edit.php?id=" . $id);
    }
}
