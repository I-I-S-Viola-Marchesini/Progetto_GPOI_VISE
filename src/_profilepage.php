<?php

if (!isset($_POST['name'], $_POST['surname'], $_SESSION['username'], $_POST['phone_number'], $_POST['tax_code'], $_POST['email'], $_POST['birth_date'])) {
    echo 'no token';
} else {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_SESSION['username'];
    $phone_number = $_POST['phone_number'];
    $tax_code = $_POST['tax_code'];
    $email = $_POST['email'];
    $birth_date = $_POST['birth_date'];

    $url = $_apiURI . '\src\API\API\user_account\modify_user.php';
    $body = '{
        "username":"' . $username . '",
        "name": "' . $name . '",
        "last_name": "' . $surname . '",
        "email": "' . $email . '",
        "tax_code": "' . $tax_code . '",
        "mobile_number": "' . $phone_number . '",
        "birth_date": "' . $birth_date . '"
    }';

    $request = sendHttpRequest($url, 'POST', $body);
    $response = $request['response'];
    echo '<script>window.location.href = \'?page=profilePage\';</script>';
}

?>
<title>Vise | Anagrafica</title>
<main class="d-flex align-items-center mt-5">
    <div class="container shadow-lg bg-white rounded-3 mx-5 py-5">
        <div class="row g-2 text-center">
            <h1 class="">Informazioni account</h1>
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

                        <div class="row px-5 justify-content-center">
                            <div class="col-6">
                                <div class="form" id="name-container">
                                    <label class="fw-bold mb-2">Nome:</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                        value="<?php echo $_SESSION['firstName']; ?>" maxlength="30" required disabled>
                                    <div class="invalid-feedback">
                                        Inserisci il tuo nome
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form" id="last-name-container">
                                    <label class="fw-bold mb-2">Cognome:</label>
                                    <input type="text" name="surname" class="form-control" id="last-name"
                                        value="<?php echo $_SESSION['lastName']; ?>" placeholder=" " maxlength="30"
                                        required disabled>
                                    <div class="invalid-feedback">
                                        Inserisci il tuo cognome
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr style="margin: 5vh 15vw 5vh 15vw;">

                        <div class="row px-5 justify-content-center">
                            <div class="col-6">
                                <div class="form" id="email-container">
                                    <label class="fw-bold mb-2">Indirizzo email:</label>
                                    <input type="email" name="email" class="form-control" id="email" placeholder=" "
                                        maxlength="60" value="<?php echo $_SESSION['email']; ?>" required disabled>
                                    <div class="invalid-feedback">
                                        Inserisci il tuo indirizzo email
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form" id="cell-number-container">
                                    <label class="fw-bold mb-2">Numero di cellulare:</label>
                                    <input type="text" name="phone_number" inputmode="numeric" pattern="[0-9]*"
                                        value="<?php echo $_SESSION['mobileNumber']; ?>" class="form-control"
                                        id="cell-number" maxlength="20" placeholder=" " required disabled>
                                    <div class="invalid-feedback">
                                        Inserisci il tuo numero di cellulare
                                    </div>
                                </div>
                            </div>
                        </div>


                        <hr style="margin: 5vh 15vw 5vh 15vw;">


                        <div class="row px-5 justify-content-center">
                            <div class="col-6">
                                <div class="form" id="tax-code-container">
                                    <label class="fw-bold mb-2">Codice fiscale:</label>
                                    <input type="text" name="tax_code" class="form-control" id="tax-code"
                                        placeholder=" " maxlength="16" value="<?php echo $_SESSION['taxCode']; ?>"
                                        required disabled>
                                    <div class="invalid-feedback">
                                        Inserisci il tuo codice fiscale
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form" id="birth-date-container">
                                    <label class="fw-bold mb-2">Data di nascita:</label>
                                    <input type="date" name="birth_date" class="form-control" id="birth-date"
                                        placeholder=" " value="<?php echo $_SESSION['birthDate']; ?>" required disabled>
                                    <div class="invalid-feedback">
                                        Inserisci la tua data di nascita
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr style="margin: 5vh 15vw 5vh 15vw;">
                        <div class="row justify-content-center">
                            <button type="submit" class="col-4 btn btn-primary" id="edit-button">Modifica le tue
                                informazioni</button>
                            <button type="submit" class="col-3 btn btn-primary mx-2" id="submit-button"
                                style="display:none">Conferma</button>
                            <button type="submit" class="col-3 btn btn-outline-secondary mx-2" id="cancel-button"
                                style="display:none">Annulla</button>

                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>

    <script>
        $(document).ready(function () {
            $("#edit-button").on("click", function (event) {
                event.preventDefault();
                $('#information-form input:disabled, select:disabled').each(function () {
                    $(this).prop('disabled', false);
                });

                $("#edit-button").hide();
                $("#submit-button").show();
                $("#cancel-button").show();
            });

            $("#cancel-button").on("click", function () {
                event.preventDefault();
                $('#information-form input, select').each(function () {
                    $(this).prop('disabled', true);
                });
                $("#information-form").trigger("reset");

                $("#edit-button").show();
                $("#submit-button").hide();
                $("#cancel-button").hide();
            });

        });


    </script>
    <script>
        $(document).ready(function () {
            $('#password').on('change', function () {
                $('#password-confirmation').attr("pattern", $("#password").val());
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