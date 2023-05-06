<?php

if (!isset($_GET['page']) || $_GET['page'] == '' || $_GET['page'] == null) {
    $page = 'landing';
}else{
    $page = $_GET['page'];
}

switch ($page) {
    case 'landing':
        include('_landing.php');
        break;
    case 'login':
        include('_login.php');
        break;
    case 'dashboard':
        include('_dashboard.php');
        break;
    case 'signup':
        include('_signup.php');
        break;
    default:
        include("_error_404.php");
        break;
}
?>