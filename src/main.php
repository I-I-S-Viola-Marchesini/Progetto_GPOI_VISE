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
        include("header.php");
        include("homepage.php");
        include("footer.php");
        break;
    default:
        include("error-404.php");
        break;
}
?>