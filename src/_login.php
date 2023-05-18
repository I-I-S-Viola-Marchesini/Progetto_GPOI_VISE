<?php

function getReturnPage()
{
    if (isset($_GET['returnTo'])) {
        return $_GET['returnTo'];
    } else {
        return 'dashboard';
    }
}

if (isset($_SESSION['username'])) {
    echo '<script>window.location.href = \'?page=' . getReturnPage() . '\';</script>';
}

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    echo "No token";
} else {
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password'], false);
    $url = $_apiURI . 'src/API/API/user_account/login.php';
    $body = '{
        "username_email":"' . $username . '",
        "password":"' . $password . '"
    }';

    $request = sendHttpRequest($url, 'POST', $body);
    $response = $request['response'];
    $httpcode = $request['code'];

    $arr = json_decode($response);
    if (isset($arr->username)) {
        echo $arr->username;
        $_SESSION['username'] = $arr->username;
        echo '<script>window.location.href = \'?page=' . getReturnPage() . '\';</script>';
    }
}
?>
<title>Paga Vise | Checkout</title>
<main class="d-flex align-items-center mt-5">
    <div class="container text-center shadow-lg bg-white bg-xs-transparent rounded-3 py-5">
        <div class="row g-2">
            <h1 class="display-3">Semplice... è Vise!</h1>
            <div class="row justify-content-center">
                <div class="col-6">
                    <?php if (isset($httpcode)) {
                        switch ($httpcode) {
                            case 200: ?>
                                <div class="alert alert-success">
                                    Login effettuato con <strong>successo</strong>.
                                </div>
                                <?php

                                break;
                            case 401: ?>
                                <div class="alert alert-danger">Email o password
                                    <strong>errati</strong>.
                                </div>
                                <?php

                                break;
                            case 500: ?>
                                <div class="alert alert-warning">
                                    <strong>Errore</strong> interno al server.
                                </div>
                                <?php
                                break;
                            default:
                                break;
                        }
                    } else if (isset($_GET['loggedOut'])): ?>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center">
                        <div class="alert alert-primary" style="width: 40%;" role="alert">
                            Logout effettuato con successo.<br>
                            Grazie per aver utilizzato <b>Vise</b>, Speriamo di rivederti presto!
                        </div>
                    </div>
            <?php endif; ?>
            <small class="text-body-primary">Bentornato, inserisci le tue credenziali per accedere alla
                piattaforma</small>
        </div>

        <div class="row justify-content-center">
            <div class="col-10 col-md-6 col-lg-4 mt-4">

                <form method="POST" class="needs-validation" novalidate>

                    <div class="mb-4 form-floating" id="username-container">
                        <input type="text" class="form-control" id="username" name="username"
                            placeholder="Inserisci il tuo username o email" required>
                        <label for="username" class="form-label ms-1">Username o Email</label>
                        <div class="invalid-feedback">
                            Inserisci il tuo username o la tua email
                        </div>
                    </div>

                    <div class="mb-4 form-floating" id="username-container">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Inserisci la password" required>
                        <label for="username" class="form-label ms-1">Password</label>
                        <div class="invalid-feedback">
                            Inserisci la tua password
                        </div>
                    </div>



                    <!-- <small class="row mb-2"><a href="">Hai dimenticato la password?</a></small> -->
                    <small class="row mb-4"><a href="?page=signup">Non hai un account?</a></small>

                    <button id="send-button" type="submit" class="btn btn-primary col-6 mb-3">
                        Accedi
                    </button>
                </form>
            </div>
        </div>

        <script>
            (() => {
                'use strict'

                const forms = document.querySelectorAll('.needs-validation')

                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
            })()
        </script>
    </div>
</main>