<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    <?php
    require_once __DIR__ . '/vendor/twbs/bootstrap/dist/css/bootstrap.min.css';
    ?>
</style>

<body>

    <div class="container">
        <div id="main">
            <?php
            require_once __DIR__ . '/src/main.php';
            ?>
        </div>
    </div>

    <script>
        <?php
        require_once __DIR__ . '/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js';
        ?>
    </script>
</body>

</html>