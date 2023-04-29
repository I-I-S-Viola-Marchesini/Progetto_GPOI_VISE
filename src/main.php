<?php

if (!isset($_GET['p'])) {
    $page = 0;
}else{
    $page = $_GET['p'];
}

switch ($page) {
    case '0':
        include("login.php");
        break;
    case '1':
        include("checkout.php");
        break;
    case '2':
        include("add-card.php");
        break;
    default:
        include("error-404.php");
        break;
}
?>