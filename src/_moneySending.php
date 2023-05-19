<?php
require(__DIR__ . '\API\API\Payment\paymentGateway.php');
use PaymentGateway\ViseGateway;

if (isset($_POST['user'], $_POST['amount'])) {
    $viseGateway = new ViseGateway($_POST['amount'], $_SESSION['username'], $_POST['user'], $_apiURI);
    $balance = $viseGateway->getUserBalance($_SESSION['username']);
    if ($balance >= $_POST['amount'] && strtolower($_POST['user']) != strtolower($_SESSION['username'])) {

        $viseGateway->useTransactionCode($viseGateway->createTransactionCode());
        $transaction = $viseGateway->addTransaction();

        $viseGateway->updateBalance();
    }

    unset($_POST['user'], $_POST['amount']);
}


?>
<title>Vise | Invia denaro</title>

<main class="d-flex align-items-center mt-5">
    <div class="container shadow-lg bg-white rounded-3 py-5">
        <div class="row g-2">
            <!-- colonna mittente -->
            <div class="col-md-6">
                <div class="row text-center">
                    <img src="<?php echo ($_SESSION['profilePicture']) ?>" alt="" style="width:auto; height:150px;"
                        class="rounded-circle mx-auto">
                    <h4 class="mt-4">Ciao, <span class="fw-bold">
                            <?php echo ($_SESSION['firstName'] . ' ' . $_SESSION['lastName']); ?>
                        </span>!</h4>
                    <h6>
                        <?php echo ($_SESSION['email']); ?>
                    </h6>
                </div>
            </div>
            <!-- /colonna mittente -->

            <!-- colonna destinatario -->
            <div class="col-md-6 text-center">
                <form method="POST" class="needs-validation">
                    <!-- riga email -->
                    <div class="row text-center">
                        <h4 class="fw-bold">A chi vuoi inviare denaro?</h4>
                        <h6 class="mt-4">Inserisci l'indirizzo email o l'username del destinatario</h6>

                        <div class="row justify-content-center">
                            <div class="col-md-9 mt-4">
                                <div class="form-floating" id="email-container">
                                    <input type="text" name="user" class="form-control" id="user" maxlength="30"
                                        required placeholder=" ">
                                    <label for="email" class="form-label ms-1">Indirizzo email o username</label>
                                    <div class="invalid-feedback">
                                        Inserisci un utente Vise esistente
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /riga email -->

                    <hr class="my-5 mx-5">

                    <!-- riga soldi -->
                    <div class="row text-center">
                        <h4 class="fw-bold">Inserisci la somma da inviare</h4>
                        <h6 class="mt-4">Inserisci la cifra esatta</h6>

                        <div class="row justify-content-center">
                            <div class="col-md-5 mt-4">
                                <div class="input-group" id="email-container">
                                    <span class="input-group-text">€</span>
                                    <input type="text" name="amount" class="form-control" id="amount" maxlength="7"
                                        required placeholder="10000.00" inputmode="numeric" pattern="^\d*(\.\d{0,2})?$">
                                    <div class="invalid-feedback">
                                        Inserisci un numero valido
                                    </div>
                                </div>
                            </div>

                            <small class="mt-3">Puoi inviare un massimo di €9999.99</small>
                            <small>Utilizza il punto come separatore dei decimali.</small>
                        </div>
                    </div>
                    <!-- /riga soldi -->

                    <hr class="my-5 mx-5">

                    <h6>Compila i campi e clicca su conferma, verrai reindirizzato ad una pagina di conferma.</h6>

                    <button id="send-button" type="submit" class="btn btn-primary col-2 mt-3">
                        Conferma
                    </button>
                </form>
            </div>
            <!-- /colonna destinatario -->
        </div>
    </div>
</main>