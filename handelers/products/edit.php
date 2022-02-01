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

if (postMethod() && requiredVal($_GET["id"])) {
    $id = $_GET["id"];
    $name = $_POST["name"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $category_id = $_POST["category_id"];

    if (!requiredVal($name)) {
        $errors[] = "Please fill your name";
    } elseif (!minVal($name, 3)) {
        $errors[] = "the name must be greater than 3 chars";
    }
    if (!requiredVal($price)) {
        $errors[] = "Please fill your price";
    } elseif (!minVal($price, 1)) {
        $errors[] = "Enter valid price";
    }
    if (!requiredVal($quantity)) {
        $errors[] = "Please fill your quantity";
    } elseif (!minVal($quantity, 1)) {
        $errors[] = "Enter valid quantity";
    }

    if (empty($errors)) {

        $result = updateDb('`products`', ["name" => $name,"price" => $price,"qty" => $quantity], "`id`= $id");


        if ($result > 0) {
            $_SESSION['success'] = "Product Updated";
            header("location: ../../design/pages/products/index.php");
        } else {
            $errors[] = "You have an error!";
            $_SESSION["errors"] = $errors;
            header("location: ../../design/pages/products/edit.php?id=" . $id);
        }
    } else {
        $_SESSION["errors"] = $errors;
        header("location: ../../design/pages/products/edit.php?id=" . $id);
    }
}
