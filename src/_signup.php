<?php

if (!isset($_POST['name'], $_POST['surname'], $_POST['username'], $_POST['phone_number'], $_POST['tax_code'], $_POST['email'], $_POST['password'], $_POST['birth_date'])) {
    echo 'no token';
} else {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $phone_number = $_POST['phone_number'];
    $tax_code = $_POST['tax_code'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password'], true);
    $birth_date = $_POST['birth_date'];
    $registration_date = date("d-m-Y");

    $url = $_apiURI . '/src/API/API/user_account/registration.php';
    $body = '{
        "name": "' . $name . '",
        "last_name": "' . $surname . '",
        "username": "' . $username . '",
        "email": "' . $email . '",
        "password": "' . $password . '",
        "tax_code": "' . $tax_code . '",
        "phone_number": "' . $phone_number . '",
        "birth_date": "' . $birth_date . '",
        "registration_date": "' . $registration_date . '"
    }';

    $response = sendHttpRequest($url, 'POST', $body);
    $httpcode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    if($httpcode == 200){
        $_SESSION['username'] = $username;
        echo '<script>window.location.href = \'?page=dashboard\';</script>';
    }
}

?>
<title>Paga Vise | Registrazione</title>
<main class="d-flex align-items-center mt-5">
    <div class="container text-center shadow-lg bg-white rounded-3 py-5">
        <div class="row g-2 mb-4">
            <h1 class="">Crea un nuovo account <strong>Vise</strong>!</h1>
            <h5 class="text-body-primary"> Inserisci le tue informazioni personali</h5>
        </div>

        <form method="POST" class="needs-validation" novalidate>
            <div class="row justify-content-center">
                <div class="col-10 col-md-6 col-lg-4">
                    <div class="form-floating" id="name-container">
                        <input type="text" name="name" class="form-control" id="name" placeholder=" " maxlength="30"
                            required>
                        <label for="name" class="form-label ms-1">Nome</label>
                        <div class="invalid-feedback">
                            Inserisci il tuo nome
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-10 col-md-6 col-lg-4 mt-4">
                    <div class="form-floating" id="last-name-container">
                        <input type="text" name="surname" class="form-control" id="last-name" placeholder=" "
                            maxlength="30" required>
                        <label for="last-name" class="form-label ms-1">Cognome</label>
                        <div class="invalid-feedback">
                            Inserisci il tuo cognome
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-10 col-md-6 col-lg-4 mt-4">
                    <div class="form-floating" id="username-container">
                        <input type="text" name="username" class="form-control" id="username" placeholder=" "
                            maxlength="30" required>
                        <label for="username" class="form-label ms-1">Username</label>
                        <div class="invalid-feedback">
                            Inserisci il tuo username
                        </div>
                    </div>
                </div>
            </div>

            <hr style="margin: 5vh 15vw 5vh 15vw;">

            <div class="row justify-content-center">
                <div class="col-10 col-md-6 col-lg-4">
                    <div class="form-floating" id="cell-number-container">
                        <input type="text" name="phone_number" inputmode="numeric" pattern="[0-9]*" class="form-control"
                            id="cell-number" maxlength="20" placeholder=" " required>
                        <label for="cell-number" class="form-label ms-1">Numero di Cellulare</label>
                        <div class="invalid-feedback">
                            Inserisci il tuo numero di cellulare
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-10 col-md-6 col-lg-4 mt-4">
                    <div class="form-floating" id="tax-code-container">
                        <input type="text" name="tax_code" class="form-control" id="tax-code" placeholder=" "
                            maxlength="16" required>
                        <label for="tax-code" class="form-label ms-1">Codice Fiscale</label>
                        <div class="invalid-feedback">
                            Inserisci il tuo codice fiscale
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-10 col-md-6 col-lg-4 mt-4">
                    <div class="form-floating" id="birth-date-container">
                        <input type="date" name="birth_date" class="form-control" id="birth-date" placeholder=" "
                            required>
                        <label for="birth-date" class="form-label ms-1">Data di Nascita</label>
                        <div class="invalid-feedback">
                            Inserisci la tua data di nascita
                        </div>
                    </div>
                </div>
            </div>

            <hr style="margin: 5vh 15vw 5vh 15vw;">

            <div class="row justify-content-center">
                <div class="col-10 col-md-6 col-lg-4">
                    <div class="form-floating" id="email-container">
                        <input type="email" name="email" class="form-control" id="email" placeholder=" " maxlength="60"
                            required>
                        <label for="email" class="form-label ms-1">Indirizzo Email</label>
                        <div class="invalid-feedback">
                            Inserisci il tuo indirizzo email
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-10 col-md-6 col-lg-4 mt-4">
                    <div class="form-floating" id="password-container">
                        <input type="password" name="password" class="form-control" id="password" placeholder=" "
                            maxlength="30" minlength="8" required>
                        <label for="password" class="form-label ms-1">Password</label>
                        <div class="invalid-feedback">
                            Inserisci la tua password
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-10 col-md-6 col-lg-4 mt-4">
                    <div class="form-floating" id="password-confirmation-container">
                        <input type="password" class="form-control" id="password-confirmation" placeholder=" "
                            maxlength="30" minlength="8" required>
                        <label for="password-confirmation" class="form-label ms-1">Conferma Password</label>
                        <div class="invalid-feedback">
                            Inserisci nuovamente la tua password
                        </div>
                    </div>
                </div>
            </div>


            <hr style="margin: 5vh 15vw 5vh 15vw;">

            <button id="send-button" type="submit" class="btn btn-primary col-2">
                Registrati
            </button>

            <small class="row mb-4 mt-3"><a href="?page=login">Torna al login</a></small>

        </form>


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