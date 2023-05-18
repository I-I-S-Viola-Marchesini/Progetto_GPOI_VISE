<?php
if (!isset($_GET['chapter'])) {
    $chapter = 1;
} else {
    $chapter = $_GET['chapter'];
}

switch ($chapter) {
    case 1:
        include_once('_chapter1.php');
        break;
    case 2:
        include_once('_chapter2.php');
        break;
    case 3:
        include_once('_chapter3.php');
        break;
    case 4:
        include_once('_chapter4.php');
        break;
    case 5:
        include_once('_chapter5.php');
        break;
    default:
        include_once("_error404.php");
        break;
}
?>
