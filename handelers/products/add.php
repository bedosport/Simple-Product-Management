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
    $price = trim(htmlspecialchars($_POST["price"]));
    $quantity = trim(htmlspecialchars($_POST["quantity"]));
    $category_id = trim(htmlspecialchars($_POST["category_id"]));

    
    if (!requiredVal($name)) {
        $errors[] = "Please fill your name";
    } elseif (!minVal($name, 3)) {
        $errors[] = "the name must be greater than 3 chars";
    }
    if (!requiredVal($price)) {
        $errors[] = "Please fill your price";
    } elseif (!minVal($price, 1)) {
        $errors[] = "Enter a valid Price";
    }
    if (!requiredVal($quantity)) {
        $errors[] = "Please fill your quantity";
    } elseif (!minVal($quantity, 1)) {
        $errors[] = "Enter a valid quantity";
    }
    if (!requiredVal($category_id))
        $errors[] = "Choose your Category";

    if (empty($errors)) {

        $result = insertDb('`products`',["name"=>$name,"category_id"=>$category_id,"price"=>$price,"qty"=>$quantity]);

        if ($result > 0) {
            $_SESSION['success'] = "Product Added Successfuly";
            header("location: ../../design/pages/products/add.php");
        } else {
            $errors[] = "You have an error!";
            $_SESSION["errors"] = $errors;
            header("location: ../../design/pages/products/add.php");
        }
    } else {
        $_SESSION["errors"] = $errors;
        header("location: ../../design/pages/products/add.php");
    }
} else
    header("location: ../../design/pages/products/index.php");
