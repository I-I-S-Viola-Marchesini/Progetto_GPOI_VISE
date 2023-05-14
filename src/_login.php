<?php
if(isset($_SESSION['id'])){
    header("Location: ?page=dashboard");
}

if (!isset($_POST['username']) || !isset($_POST['password'])) {
    echo "No token";
} else {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $curl = curl_init();

    curl_setopt_array(
        $curl,
        array(
            CURLOPT_URL => 'localhost/Progetto_GPOI_VISE/src/API/API/login.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => '{
                    "username_email":"' . $username . '",
                    "password":"' . $password . '"
                }',
            CURLOPT_HTTPHEADER => array(
                'Content-Type: text/plain'
            ),
        )
    );

    $response = curl_exec($curl);

    curl_close($curl);

    $json = json_decode($response);
    if(isset($json->id)){
        $_SESSION['id'] = $json->id;
    }
}

?>
<title>Paga Vise | Checkout</title>
<main class="d-flex align-items-center mt-5">
    <div class="container text-center shadow-lg bg-white bg-xs-transparent rounded-3 py-5">
        <div class="row g-2">
            <h1 class="display-3">Semplice... è Vise!</h1>
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