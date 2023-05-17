<title>Vise | Anagrafica</title>
<main class="d-flex align-items-center mt-5">
    <div class="container shadow-lg bg-white rounded-3 py-5">
        <div class="row g-2 text-center">
            <h1 class="">Visualizza i tuoi dati personali su <strong>Vise</strong>!</h1>
            <!-- <h5 class="text-body-primary"> Inserisci le tue informazioni personali</h5> -->
        </div>

        <hr class="my-4">

        <div class="row">
            <div class="col-md-6 text-center">
                <div class="row">
                    <img src="<?php
                    echo $_SESSION['profilePicture'];
                    ?>" alt="" style="width: auto; height: 150px;" class="mx-auto rounded-circle">
                </div>
                <div class="row mt-4">
                    <?php
                    echo '  
                    <h4 class="fw-bold">' . $_SESSION['firstName'] . ' ' . $_SESSION['lastName']  . '</h4>
                    <h6>' . $_SESSION['email']  . '</h6>
                    ';
                    ?>
                </div>
            </div>

            <div class="col-md-6">
                <form method="POST" class="needs-validation" novalidate>

                    <div class="row justify-content-center text-end">
                        <div class="col-lg-9 mt-4">
                            <button id="send-button" type="submit" class="btn btn-primary col-4">
                                Modifica ????
                            </button>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-9 mt-4">
                            <div class="form" id="name-container">
                                <label class="fw-bold mb-2">Nome:</label>
                                <input type="text" name="name" class="form-control" id="name" value="<?php echo $_SESSION['firstName']; ?>"
                                    maxlength="30" required disabled>
                                <div class="invalid-feedback">
                                    Inserisci il tuo nome
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-9 mt-4">
                            <div class="form" id="last-name-container">
                                <label class="fw-bold mb-2">Cognome:</label>
                                <input type="text" name="surname" class="form-control" id="last-name" value="<?php echo $_SESSION['lastName']; ?>"
                                    placeholder=" " maxlength="30" required disabled>
                                <div class="invalid-feedback">
                                    Inserisci il tuo cognome
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-9 mt-4">
                            <div class="form" id="username-container">
                                <label class="fw-bold mb-2">Username:</label>
                                <input type="text" name="username" class="form-control" id="username" value="<?php echo $_SESSION['username']; ?>"
                                    placeholder=" " maxlength="30" required disabled>
                                <div class="invalid-feedback">
                                    Inserisci il tuo username
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr style="margin: 5vh 15vw 5vh 15vw;">

                    <div class="row justify-content-center">
                        <div class="col-lg-9">
                            <div class="form" id="cell-number-container">
                                <label class="fw-bold mb-2">Numero di cellulare:</label>
                                <input type="text" name="phone_number" inputmode="numeric" pattern="[0-9]*"
                                    value="<?php echo $_SESSION['mobileNumber']; ?>" class="form-control" id="cell-number" maxlength="20"
                                    placeholder=" " required disabled>
                                <div class="invalid-feedback">
                                    Inserisci il tuo numero di cellulare
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-9 mt-4">
                            <div class="form" id="tax-code-container">
                                <label class="fw-bold mb-2">Codice fiscale:</label>
                                <input type="text" name="tax_code" class="form-control" id="tax-code" placeholder=" "
                                    maxlength="16" value="<?php echo $_SESSION['taxCode']; ?>" required disabled>
                                <div class="invalid-feedback">
                                    Inserisci il tuo codice fiscale
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-9 mt-4">
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
                        <div class="col-lg-9">
                            <div class="form" id="email-container">
                                <label class="fw-bold mb-2">Indirizzo email:</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder=" "
                                    maxlength="60" value="<?php echo $_SESSION['email']; ?>" required disabled>
                                <div class="invalid-feedback">
                                    Inserisci il tuo indirizzo email
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="row justify-content-center">
                        <div class="col-lg-9 mt-4">
                            <div class="form" id="password-container">
                                <label class="fw-bold mb-2">Password:</label>
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder=" " maxlength="30" minlength="8" value="<?php echo $_SESSION['password']; ?>" required disabled>
                                <div class="invalid-feedback">
                                    Inserisci la tua password
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- <div class="row justify-content-center">
                        <div class="col-lg-9 mt-4">
                            <div class="form" id="password-confirmation-container">
                                <input type="password" class="form-control" id="password-confirmation" placeholder=" "
                                    maxlength="30" minlength="8" required>
                                <label for="password-confirmation" class="form-label ms-1">Conferma Password</label>
                                <div class="invalid-feedback">
                                    Inserisci nuovamente la tua password
                                </div>
                            </div>
                        </div>
                    </div> -->
                </form>
            </div>
        </div>

    </div>
</main>