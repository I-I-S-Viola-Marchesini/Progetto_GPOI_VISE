<?php
if (!isset($_POST['oldPassword'], $_POST['newPassword'])) {
    echo 'failed';
} else {
    $url = $_apiURI . '\src\API\API\user_account\modify_password.php';
    $body = '{
        "username": "' . $_SESSION['username'] . '",
        "password_old": "' . hash('sha256', $_POST['oldPassword'], false) . '",
        "password_new": "' . hash('sha256', $_POST['newPassword'], false) . '"
    }';

    $request = sendHttpRequest($url, 'POST', $body);
    $httpcode = $request['code'];
}


?>
<title>Vise | Cambio password</title>
<main class="d-flex align-items-center mt-5">
    <div class="container shadow-lg bg-white rounded-3 mx-5 py-5">
        <div class="row g-2 text-center">
            <h1 class="">Cambia la tua password</h1>
            <!-- <h5 class="text-body-primary"> Inserisci le tue informazioni personali</h5> -->
        </div>

        <hr class="my-4">

        <div class="row">
            <div class="row">
                <div class="col text-center">
                    <img src="<?php
                    echo $_SESSION['profilePicture'];
                    ?>" alt="" style="width: auto; height: 150px;" class="mx-auto my-2 rounded-circle">
                    <?php
                    echo '  
                    <h4 class="fw-bold">' . $_SESSION['firstName'] . ' ' . $_SESSION['lastName'] . '</h4>
                    <h6 class="mb-4">' . '@' . $_SESSION['username'] . '</h6>
                    ';
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form method="POST" class="needs-validation" id="information-form" novalidate>

                        <div class="row g-3 px-5 justify-content-center">
                            <div class="col-12 col-md-4">
                                <div class="form" id="password-container">
                                    <label class="fw-bold mb-2">Password attuale:</label>
                                    <input type="password" name="oldPassword" class="form-control" id="old-password"
                                        required>
                                    <div class="invalid-feedback">
                                        Inserisci la tua vecchia password
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <div class="form" id="newPassword-container">
                                    <label class="fw-bold mb-2">Password nuova:</label>
                                    <input type="password" name="newPassword" class="form-control" id="new-password"
                                        required minlength="8">
                                    <div class="invalid-feedback">
                                        Inserisci la tua nuova password
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 col-md-4">
                                <div class="form" id="confirmNewPassword-container">
                                    <label class="fw-bold mb-2">Conferma password nuova:</label>
                                    <input type="password" id="password-confirmation" name="confirmNewPassword"
                                        class="form-control" id="confirmNewPassword" required minlength="8">
                                    <div class="invalid-feedback">
                                        Conferma la tua nuova password
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center mt-5">
                            <div class="col-6 text-center">
                                <?php
                                if (isset($httpcode)) {
                                    switch ($httpcode) {
                                        case 200: ?>
                                            <div class="alert alert-success">
                                                Password cambiata con <strong>successo</strong>.
                                            </div>
                                            <?php
                                            break;
                                        case 404: ?>
                                            <div class="alert alert-danger">La vecchia password inserita è
                                                <strong>errata</strong>.
                                            </div>';
                                            <?php
                                            break;
                                        case 500: ?>
                                            <div class="alert alert-warning">
                                                <strong>Errore</strong> interno al server.
                                            </div>
                                            <?php
                                            break;
                                        default: ?>
                                            <?php
                                            break;
                                    }
                                }
                                ?>
                            </div>
                        </div>

                        <div class="row mt-5 text-center">
                            <div class="col-8 col-md-6 mx-auto">
                                <button id="confirm-button" type="submit" class="btn btn-primary px-5">
                                    Conferma modifiche
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
    <script>
        $(document).ready(function () {
            $('#new-password').on('change', function () {
                $('#password-confirmation').attr("pattern", $("#new-password").val());
            });
        });
    </script>
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
</main>