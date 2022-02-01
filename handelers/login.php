<?php

require_once '../core/config.php';
require_once '../helper/helpers.php';

getFile(PREV_FOLDER . "core/db");
getFile(PREV_FOLDER . "core/validations");
getFile(PREV_FOLDER . "core/session");
getFile(PREV_FOLDER . "core/response");
getFile(PREV_FOLDER . "core/request");



if (requiredVal($_POST['email']) && postMethod()) {

    // sinitizing inputs 
    $email = emailSan($_POST['email']);
    $password = strSan($_POST['password']);


    // validations 


    // email 
    if (!requiredVal($email)) {
        $errors[] = "email is required";
    } elseif (!emailVal($email)) {
        $errors[] = "email must be an email";
    }


    // password
    if (!requiredVal($password)) {
        $errors[] = " password is required";
    }




    if (empty($errors)) {
        // check if user is exist or not 
        $rows = readDb("`users`", "`email`='$email'", '*');
        if ($rows) {
            foreach ($rows as $row) :
                //die(dd($row['password']));

                $check_password = password_verify($password, $row['password']);

                if ($check_password) {
                    setSession('user', [
                        'user_name' => $row['name'],
                        'user_email' => $row['email'],
                        'user_type' => $row['type'],
                    ]);
                    redirect("design/index");
                } else {
                    setSession('errors', ['email or passsword not correct']);
                }
            endforeach;
        } else {
            setSession('errors', ['email or passsword not correct']);
        }
    } else {
        // define errors
        setSession('errors', $errors);
    }
    redirect("design/login");
}
