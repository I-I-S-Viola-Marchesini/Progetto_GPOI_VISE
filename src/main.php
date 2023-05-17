<?php

if (!isset($_GET['page']) || $_GET['page'] == '' || $_GET['page'] == null) {
    $page = 'landing';
} else {
    $page = $_GET['page'];
}

function onlyIfLoggedIn($page)
{
    if (!isset($_SESSION['username'])) {
        include_once('_notloggedin.php');
    } else {
        include_once($page);
    }
}

switch ($page) {
    case 'landing':
        include_once('_landing.php');
        break;
    case 'login':
        include_once('_login.php');
        break;
    case 'logout':
        include_once('_logout.php');
        break;
    case 'dashboard':
        onlyIfLoggedIn('_dashboard.php');
        break;
    case 'signup':
        include_once('_signup.php');
        break;
    case 'checkout':
        onlyIfLoggedIn('_checkout.php');
        break;
    case 'chisiamo':
        include_once('_chisiamo.php');
        break;
    case 'contatti':
        include_once('_contatti.php');
        break;
    case 'profilepage':
        onlyIfLoggedIn('_profilepage.php');
        break;
    case 'moneysending':
        include_once('_money_sending.php');
        break;
    default:
        include_once("_error_404.php");
        break;
}

?>