<?php

if (!isset($_GET['page']) || $_GET['page'] == '' || $_GET['page'] == null) {
    $page = 'landing';
}else{
    $page = $_GET['page'];
}

function onlyIfLoggedIn($page)
{
    if (!isset($_SESSION['username'])) {
        include('_notloggedin.php');
    } else {
        include($page);
    }
}

switch ($page) {
    case 'landing':
        include('_landing.php');
        break;
    case 'login':
        include('_login.php');
        break;
    case 'logout':
        include('_logout.php');
        break;
    case 'dashboard':
        onlyIfLoggedIn('_dashboard.php');
        break;
    case 'signup':
        include('_signup.php');
        break;
    case 'checkout':
        onlyIfLoggedIn('_checkout.php');
        break;
    case 'chisiamo':
        include('_chisiamo.php');
        break;
    case 'contatti':
        include('_contatti.php');
        break;
    case 'profilepage':
        onlyIfLoggedIn('_profilepage.php');
        break;
    default:
        include("_error_404.php");
        break;
}
?>