<?php
require 'src/sendHttpRequest.php';
session_start();

$_apiURI = $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . $_SERVER["PHP_SELF"];
$_apiURI = str_replace('index.php', '', $_apiURI);

// echo '<script>alert("' . $_apiURI . '");</script>';

if (isset($_SESSION['username'])) {

    $getUserUrl = $_apiURI . '/src/API/API/user_account/getUserAccountOnUsername.php?username=' . $_SESSION['username'];

    $getUserResponse = sendHttpRequest($getUserUrl, 'GET')['response'];
    $userJson = json_decode($getUserResponse);

    if (isset($userJson->username, $userJson->name, $userJson->last_name, $userJson->email, $userJson->tax_code, $userJson->mobile_number, $userJson->birth_date)) {
        $_SESSION['profilePicture'] = 'https://ui-avatars.com/api/?format=svg&background=ccdffc&name=' . $userJson->name . '+' . $userJson->last_name;
        $_SESSION['username'] = $userJson->username;
        $_SESSION['firstName'] = $userJson->name;
        $_SESSION['lastName'] = $userJson->last_name;
        $_SESSION['email'] = $userJson->email;
        $_SESSION['taxCode'] = $userJson->tax_code;
        $_SESSION['mobileNumber'] = $userJson->mobile_number;
        //create date object from birth date
        $birthDate = new DateTime($userJson->birth_date);
        $birthDate = $birthDate->format('Y-m-d');
        $_SESSION['birthDate'] = $birthDate;
    }
}

?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/rowreorder/1.3.3/css/rowReorder.bootstrap5.min.css">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="body-background">
    <?php
    include_once __DIR__ . '/src/navbar.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/rowreorder/1.3.3/js/dataTables.rowReorder.min.js"></script>
    <div class="container">
        <div id="main">
            <?php
            include_once __DIR__ . '/src/main.php';

            ?>
        </div>
    </div>

    <?php
    include_once __DIR__ . '/src/footer.php';
    ?>

    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

        // const tooltipTriggerList = document.querySelectorAll('.tooltip-trg')
        // const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
        // document.querySelectorAll('.tooltip-show-start').forEach((el) => {
        //     bootstrap.Tooltip.getOrCreateInstance(el).show();
        // });
    </script>

</body>

<style>
    * {
        font-family: 'Nunito', sans-serif;
    }

    .body-background {
        background-color: #cfe2ff;
    }
</style>

</html>