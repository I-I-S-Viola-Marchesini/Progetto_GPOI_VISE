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
    default:
        include("error-404.php");
        break;
}
?>