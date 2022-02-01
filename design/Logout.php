<?php
 require_once '../core/config.php';
 require_once '../core/session.php';
 require_once '../core/response.php';
 require_once '../core/request.php';
 require_once '../core/db.php';
 require_once '../helper/helpers.php'; 

 removeSession('user');
 redirect('design/index');