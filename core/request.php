<?php

function postMethod()
{

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        return true;
    }

    return false;
}

function getMethod()
{

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        return true;
    }

    return false;
}



function data()
{

    if (getMethod()) {
        return $_GET;
    }

    if (postMethod()) {
        return $_POST;
    }

    return false;
}

function getUrl()
{

    echo "<pre>";
    print_r($_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME']);
    echo "</pre>";
}

