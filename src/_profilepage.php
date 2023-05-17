<title>Paga Vise | Anagrafica</title>
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
                        if (isset($getProfilePictureUrl)) {
                            echo $getProfilePictureUrl;
                        }
                    ?>" alt="" style="width: auto; height: 150px;" class="mx-auto rounded-circle">
                </div>
                <div class="row mt-4">
                    <?php
                    if (isset($userJson->name, $userJson->last_name, $userJson->email)) {
                        echo '  
                        <h4 class="fw-bold">' . $userJson->name . ' ' . $userJson->last_name . '</h4>
                        <h6>' . $userJson->email . '</h6>
                        ';
                    }
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
                                <input type="text" name="name" class="form-control" id="name" value="Mario"
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
                                <input type="text" name="surname" class="form-control" id="last-name" value="Rossi"
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
                                <input type="text" name="username" class="form-control" id="username" value="mariorossi"
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
                                <input type="text" name="phone_number" inputmode="numeric" pattern="[0-9]*"
                                    value="323 424 5724" class="form-control" id="cell-number" maxlength="20"
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
                                <input type="text" name="tax_code" class="form-control" id="tax-code" placeholder=" "
                                    maxlength="16" value="MRNDL894JR" required disabled>
                                <div class="invalid-feedback">
                                    Inserisci il tuo codice fiscale
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-9 mt-4">
                            <div class="form" id="birth-date-container">
                                <input type="date" name="birth_date" class="form-control" id="birth-date"
                                    placeholder=" " value="2004-04-04" required disabled>
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
                                <input type="email" name="email" class="form-control" id="email" placeholder=" "
                                    maxlength="60" value="mariorossi@gmail.com" required disabled>
                                <div class="invalid-feedback">
                                    Inserisci il tuo indirizzo email
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-9 mt-4">
                            <div class="form" id="password-container">
                                <input type="password" name="password" class="form-control" id="password"
                                    placeholder=" " maxlength="30" minlength="8" value="amongu" required disabled>
                                <div class="invalid-feedback">
                                    Inserisci la tua password
                                </div>
                            </div>
                        </div>
                    </div>

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