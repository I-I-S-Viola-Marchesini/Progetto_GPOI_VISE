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
            </div   >

            <div class="row">
                <div class="col-md-12">
                    <form method="POST" class="needs-validation" id="information-form" novalidate>

                        <div class="row px-5 justify-content-center">
                            <div class="col-4">
                                <div class="form" id="password-container">
                                    <label class="fw-bold mb-2">Password attuale:</label>
                                    <input type="password" name="oldPassword" class="form-control" id="oldPassword" required min="8">
                                    <div class="invalid-feedback">
                                        Inserisci la tua vecchia password:
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form" id="newPassword-container">
                                    <label class="fw-bold mb-2">Password nuova:</label>
                                    <input type="password" name="newPassword" class="form-control" id="newPassword" required min="8">
                                    <div class="invalid-feedback">
                                        Inserisci la tua nuova password:
                                    </div>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form" id="confirmNewPassword-container">
                                    <label class="fw-bold mb-2">Conferma password nuova:</label>
                                    <input type="password" name="confirmNewPassword" class="form-control" id="confirmNewPassword" required min="8">
                                    <div class="invalid-feedback">
                                        Conferma la tua vecchia password:
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-5 text-center">
                            <div class="col-6 mx-auto">
                                <button id="confirm-button" type="submit" class="btn btn-primary px-5">
                                    Conferma
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>

</main>