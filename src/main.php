<?php

if (!isset($_GET['page']) || $_GET['page'] == '' || $_GET['page'] == null) {
    $page = 'landing';
} else {
    $page = $_GET['page'];
}

function onlyIfLoggedIn($page)
{
    if (!isset($_SESSION['username'])) {
        return '_notLoggedIn.php';
    } else {
        return $page;
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
        include_once(onlyIfLoggedIn('_dashboard.php'));
        break;
    case 'signup':
        include_once('_signup.php');
        break;
    case 'checkout':
        include_once(onlyIfLoggedIn('_checkout.php'));
        break;
    case 'about':
        include_once('_about.php');
        break;
    case 'contactUs':
        include_once('_contactUs.php');
        break;
    case 'profilePage':
        include_once(onlyIfLoggedIn('_profilePage.php'));;
        break;
    case 'moneySending':
        include_once(onlyIfLoggedIn('_moneySending.php'));
        break;
    case 'changePassword':
        include_once(onlyIfLoggedIn('_changePassword.php'));
        break;
    default:
        include_once("_error404.php");
        break;
}

?>