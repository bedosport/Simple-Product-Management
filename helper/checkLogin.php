<?php
require_once ('../core/config.php');
require_once ('../core/response.php');
require_once ('helpers.php');

if(!isset($_SESSION['user']))
{
    redirect('design/Login');
}