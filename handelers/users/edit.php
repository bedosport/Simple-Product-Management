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
    $name = trim(htmlspecialchars($_POST["name"]));
    $email = trim(htmlspecialchars($_POST["email"]));
    $password = trim(htmlspecialchars($_POST["password"]));

    if (!requiredVal($name)) {
        $errors[] = "Please fill your name";
    } elseif (!minVal($name, 3)) {
        $errors[] = "the name must be greater than 3 chars";
    }

    if (!requiredVal($email)) {
        $errors[] = "Please fill your email";
    } elseif (!emailVal($email)) {
        $errors[] = "Enter a valid email";
    }
    if ($password) {
        if (!requiredVal($password)) {
            $errors[] = "Please fill your password";
        } elseif (!minVal($password, 5)) {
            $errors[] = "the password must be greater than 5 chars";
        }
    }
    if (empty($errors)) {

        $data = ["name" => $name, "email" => $email];
        if ($password) {
            $password = hashVal($password);
            $data["password"] = $password;
        }


        $result = updateDb('`users`', $data, "`id`= $id");


        if ($result > 0) {
            $_SESSION['success'] = "User Updated";
            header("location: ../../design/pages/users/index.php");
        } else {
            $errors[] = "You have an error!";
            $_SESSION["errors"] = $errors;
            header("location: ../../design/pages/users/edit.php?id=" . $id);
        }
    } else {
        $_SESSION["errors"] = $errors;
        header("location: ../../design/pages/users/edit.php?id=" . $id);
    }
}
