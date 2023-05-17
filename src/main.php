<?php

if (!isset($_GET['page']) || $_GET['page'] == '' || $_GET['page'] == null) {
    $page = 'landing';
} else {
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
        include_once('_landing.php');
        break;
    case 'login':
        include_once('_login.php');
        break;
    case 'logout':
        include_once('_logout.php');
        break;
    case 'dashboard':
<<<<<<< Updated upstream
        onlyIfLoggedIn('_dashboard.php');
=======
        include_once('_dashboard.php');
>>>>>>> Stashed changes
        break;
    case 'signup':
        include_once('_signup.php');
        break;
    case 'checkout':
<<<<<<< Updated upstream
        onlyIfLoggedIn('_checkout.php');
=======
        include_once('_checkout.php');
>>>>>>> Stashed changes
        break;
    case 'chisiamo':
        include_once('_chisiamo.php');
        break;
    case 'contatti':
        include_once('_contatti.php');
        break;
    case 'profilepage':
<<<<<<< Updated upstream
        onlyIfLoggedIn('_profilepage.php');
=======
        include_once('_profilepage.php');
        break;
    case 'moneysending':
        include_once('_money_sending.php');
>>>>>>> Stashed changes
        break;
    default:
        include_once("_error_404.php");
        break;
}

?>