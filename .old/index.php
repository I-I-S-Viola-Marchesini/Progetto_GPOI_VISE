<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VISE</title>
</head>
<style>
    <?php
    include_once __DIR__ . '/vendor/twbs/bootstrap/dist/css/bootstrap.min.css';
    ?>
</style>

<body>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>

    <div class="container">
        <div id="main">
            <?php
            include_once __DIR__ . '/src/main.php';
            ?>
        </div>
    </div>

    <script>
        <?php
        include_once __DIR__ . '/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js';
        ?>
    </script>


</body>

</html>