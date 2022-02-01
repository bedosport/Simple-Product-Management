<?php
require_once '../../core/config.php';
require_once '../../core/session.php';
require_once '../../core/response.php';
require_once '../../core/validations.php';
require_once '../../core/request.php';
require_once '../../core/db.php';
require_once '../../helper/helpers.php';
?>

<?php

if (postMethod()) {
    $name = trim(htmlspecialchars($_POST["name"]));

    if (!requiredVal($name)) {
        $errors[] = "Please fill your name";
    } elseif (!minVal($name, 3)) {
        $errors[] = "the name must be greater than 3 chars";
    }

    if (empty($errors)) {


        $result = insertDb('`categories`',["name"=>$name]);

        if ($result > 0) {
            $_SESSION['success'] = "Category Added Successfuly";
            header("location: ../../design/pages/categories/add.php");
        } else {
            $errors[] = "You have an error!";
            $_SESSION["errors"] = $errors;
            header("location: ../../design/pages/categories/add.php");
        }
    } else {
        $_SESSION["errors"] = $errors;
        header("location: ../../design/pages/categories/add.php");
    }
} else
    header("location: ../../design/pages/categories/index.php");
